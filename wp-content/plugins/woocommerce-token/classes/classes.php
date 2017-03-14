<?php
class WooCommerce_Token 
{
	static private $tokens         = array();

    public function add_web_tokens($data) {
        global $wpdb;
        $web_tokens_data = array(
            'order_id'				=> $data['order_id'],
            'user_id'				=> $data['user_id'],
            'product_id'			=> $data['product_id'],
            'token'					=> $data['token'],
            'short_url'				=> $data['short_url'],
            'token_device_limit'	=> $data['token_device_limit'],
            'token_created_date'	=> $data['token_created_date'],
            'token_expiry_date'		=> $data['token_expiry_date'],
            'token_last_accessed'	=> $data['token_last_accessed'],
            'token_last_device'		=> $data['token_last_device']
        );

        $wpdb->insert( $wpdb->web_tokens, $data );

        $id = $wpdb->insert_id;
        return $id;
    }
    public function get_web_tokens($order_id = NULL) {
        global $wpdb;
        $sql = "SELECT tokens.*,posts.post_title as product FROM " . $wpdb->web_tokens." as tokens ";
        $sql .= "LEFT JOIN ".$wpdb->posts." as posts on posts.id = tokens.`product_id`";
        if(!is_null($order_id))
        {
            $sql .= " where order_id = ". $order_id;
        }
        $sql .= " ORDER BY id;";
        $web_tokens = $wpdb->get_results($sql);
        return $web_tokens;
    }
    public function get_web_token_by($token = NULL) {
        global $wpdb;
        $sql = "SELECT tokens.*,count(devices.id) as registered FROM " . $wpdb->web_tokens." as tokens ";
        $sql .= "LEFT JOIN {$wpdb->prefix}web_token_devices as devices on devices.token_id = tokens.id";
        //$sql = "SELECT * FROM " . $wpdb->web_tokens;
        $sql .= " where tokens.token = '". $token."'";
        $sql .= " GROUP BY tokens.id ORDER BY tokens.id;";
        $web_tokens = $wpdb->get_results($sql);
        return $web_tokens;
    }
    public function get_web_token_by_id($token = NULL) {
        global $wpdb;
        $sql = "SELECT tokens.*,posts.post_title as product,count(devices.id) as registered FROM " . $wpdb->web_tokens." as tokens ";
        $sql .= " LEFT JOIN {$wpdb->prefix}web_token_devices as devices on devices.token_id = tokens.id";
        $sql .= " LEFT JOIN {$wpdb->prefix}posts as posts on posts.ID = tokens.product_id";
        //$sql = "SELECT * FROM " . $wpdb->web_tokens;
        $sql .= " where tokens.id = '". $token."'";
        $sql .= " GROUP BY tokens.id ORDER BY tokens.id;";
        $web_tokens = $wpdb->get_row($sql);
        return $web_tokens;
    }
    public function get_web_token_devices_by($tid,$browser=NULL,$os=NULL,$device_type=NULL) {
        global $wpdb;
        $sql = "SELECT * FROM " . $wpdb->prefix."web_token_devices";
        $sql .= " where token_id = '". $tid."'";
        if(!is_null($os))
        {
            $sql .= " and device_os = '". $os."'";
        }
        if(!is_null($browser))
        {
            $sql .= " and browser = '". $browser."'";
        }
        if(!is_null($device_type))
        {
            $sql .= " and device_type = '". $device_type."'";
        }
        $sql .= " ORDER BY id;";
        $web_tokens = $wpdb->get_results($sql);
        return $web_tokens;
    }
    function get_domain($url)
    {
      $pieces = parse_url($url);
      $domain = isset($pieces['host']) ? $pieces['host'] : '';
      /*if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
        return $regs['domain'];
      }*/
      return $domain;
    }

    public function verify_tokens($request) 
    {
        global $wpdb;
        $registered = 0;
        $params = $request->get_params();
        $token = $params['token'];
        $useragent = $params['useragent'];
        $ip = $params['ip'];
        $url = $this->get_domain($params['url']);
        $browserdet = get_browser($useragent);
        $browser = $browserdet->browser;
        $os = $browserdet->platform;
        $device_type = $browserdet->device_type;
        $tokenobj = $this->get_web_token_by($token);
        $success = 0;
        $status = "verifying";
        if(count($tokenobj) > 0 && $this->get_domain($tokenobj[0]->long_url) == $url) 
        {
            $domain_url = $this->get_domain($tokenobj[0]->long_url);
            $tid = $tokenobj[0]->id;
            $devicecount = $tokenobj[0]->token_device_limit;
            $token_expiry_date = $tokenobj[0]->token_expiry_date;
            $datetime1 = new DateTime($token_expiry_date);
            $datetime2 = new DateTime();
            if($datetime1 >= $datetime2 || $token_expiry_date == "0000-00-00 00:00:00")
            {
                $devices = $this->get_web_token_devices_by($tid,$browser,$os,$device_type);
                if(count($devices) > 0)
                {
                    $token_data = [];
                    $token_data['token_last_device'] = $devices[0]->id;
                    $token_data['token_last_accessed'] = (new DateTime())->format('Y-m-d H:i:s');
                    $device_id = $this->update_token($token_data,$tid);
                    $success = 1;
                    $status = "Verified";
                    $device_data = [];
                    $device_data['device_last_accessed'] = (new DateTime())->format('Y-m-d H:i:s');
                    $device_data['access_ip'] = $ip;
                    $device_id = $this->update_device($device_data,$devices[0]->id);

                    $device_history_data = [];
                    $device_history_data['token_id'] = $tid;
                    $device_history_data['device_id'] = $devices[0]->id;
                    $device_history_data['access_date'] = (new DateTime())->format('Y-m-d H:i:s');
                    $device_history_data['access_ip'] = $ip;
                    $device_id = $this->add_device_history($device_history_data);


                }
                else
                {
                   $devices = $this->get_web_token_devices_by($tid);
                   if(count($devices) >= $devicecount && $devicecount > 0)
                   {
                        $success = 0;
                        $status = "LimitCrossed";
                   }
                   else
                   {
                        $success = 1;
                        $status = "New";
                        $registered = $tokenobj[0]->registered;
                   }
                   
                }
            }
            else
            {
                $success = 0;
                $status = "Expired";
            }
        }   
        else
        {
            $success = 0;
            $status = "InvalidToken";
        }
        $data = array( 
            'success'=>$success,
            'status'=> $status,
            'registered'=> $registered
        );

        // Create the response object
        $response = new WP_REST_Response( $data );
        // Add a custom status code
        $response->set_status( 201 );
        // Add a custom header
        $response->header( 'Location', 'https://decker.com/' );
        return $response;
    }
    public function add_new($request) 
    {
        global $wpdb;

        $data = [];
        $params = $request->get_params();
        $token = $params['token'];
        $useragent = $params['useragent'];
        $ip = $params['ip'];
        $url = $this->get_domain($params['url']);
        $browserdet = get_browser($useragent);
        $browser = $browserdet->browser;
        $os = $browserdet->platform;
        $device_type = $browserdet->device_type;
        $tokenobj = $this->get_web_token_by($token);
        if(count($tokenobj) > 0  && $this->get_domain($tokenobj[0]->long_url) == $url) 
        {
            $tid = $tokenobj[0]->id;
            $devicecount = $tokenobj[0]->token_device_limit;
            $token_expiry_date = $tokenobj[0]->token_expiry_date;
            $datetime1 = new DateTime($token_expiry_date);
            $datetime2 = new DateTime();
            if($datetime1 >= $datetime2 || $token_expiry_date == "0000-00-00 00:00:00")
            {
                $tid = $tokenobj[0]->id;
                $devices = $this->get_web_token_devices_by($tid,$browser,$os,$device_type);
                if(count($devices) > 0)
                {
                    $device_history_data = [];
                    $device_history_data['token_id'] = $tid;
                    $device_history_data['device_id'] = $devices[0]->id;
                    $device_history_data['access_date'] = (new DateTime())->format('Y-m-d H:i:s');
                    $device_history_data['access_ip'] = $ip;
                    $device_id = $this->add_device_history($device_history_data);

                    $success = 1;
                    $status = "Verified";
                }
                else
                {
                   $devices = $this->get_web_token_devices_by($tid);
                   if(count($devices) >= $devicecount && $devicecount > 0)
                   {
                        $success = 0;
                        $status = "LimitCrossed";
                   }
                   else
                   {
                        $data['browser'] = $browser;
                        $data['device_os'] = $os;
                        $data['device_type'] = $device_type;
                        $data['user_agent'] = $useragent;
                        $data['token_id'] = $tid;
                        $data['device_create_date'] = (new DateTime())->format('Y-m-d H:i:s');
                        $data['device_last_accessed'] = (new DateTime())->format('Y-m-d H:i:s');
                        $data['access_ip'] = $ip;
                        $device_id = $this->add_device($data);
                        $token_data = [];
                        $token_data['token_last_device'] = $device_id;
                        $token_data['token_last_accessed'] = (new DateTime())->format('Y-m-d H:i:s');
                        $this->update_token($token_data,$tid);

                        $device_history_data = [];
                        $device_history_data['token_id'] = $tid;
                        $device_history_data['device_id'] = $device_id;
                        $device_history_data['access_date'] = (new DateTime())->format('Y-m-d H:i:s');
                        $device_history_data['access_ip'] = $ip;
                        $device_history_data_id = $this->add_device_history($device_history_data);
                        $success = 1;
                        //$status ="DeviceAdded";
                        $status ="Verified";
                   }
                   
                }
            }
            else
            {
                $success = 0;
                $status = "Expired";
            }
        }
        else
        {
            $success = 0;
            $status ="InvalidToken";
        }
        $data = array( 
            'success'=>$success,
            'status'=> $status
        );

        // Create the response object
        $response = new WP_REST_Response( $data );
        // Add a custom status code
        $response->set_status( 201 );
        // Add a custom header
        $response->header( 'Location', 'http://decker.com/' );
        return $response;
    }
    public function add_device($data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'web_token_devices';
        $wpdb->insert( $table_name, $data);
        return $wpdb->insert_id;
    }
    public function add_device_history($data)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'web_device_history';
        $wpdb->insert( $table_name, $data);
        return $wpdb->insert_id;
    }
    public function update_token($data,$id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'web_tokens';
        $where = array('id'=>$id);
        return $wpdb->update( $table_name,$data,$where);
    }
    public function update_device($data,$id)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'web_token_devices';
        $where = array('id'=>$id);
        return $wpdb->update( $table_name,$data,$where);
    }
}