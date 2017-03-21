	<?php
/**
 * Token Page
 *
 * @author   WooThemes
 * @category Admin
 * @package  WooCommerce/Admin
 * @version  2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once ABSPATH . 'wp-includes/PHPExcel/Classes/PHPExcel/IOFactory.php';

/**
 * WC_Admin_Tokens Class.
 */
class WC_Admin_Tokens {
	/**
	 * Handles output of the addons page in admin.
	**/
	public static function output() {
		self::table_list_output();
		//include_once( 'views/html-admin-page-coupons.php' );
	}
	private static function generate_tokens($fileid,$userid,$product_id,$data,$token_send_email = 0)
	{
		$bitly_login = get_option( 'woocommerce_bitly_login', '' );
    	$bitly_api_key = get_option( 'woocommerce_bitly_api_key', '' );
		$product = wc_get_product($product_id);
		$courseurl = $product->get_course_url();
        $devices_limit = 1;//$_product->get_devices_limit();
        $token_expiry = $data['validity'];
        $product_type = $product->get_type();
        $dateobj = new DateTime();
        $createdate = $dateobj->format('Y-m-d H:i:s');
        if($token_expiry != '' && $token_expiry > 0)
        {
            $dateobj->add(new DateInterval('P'.$token_expiry.'D'));
            $expirydate = $dateobj->format('Y-m-d H:i:s');
        }
        else
        {
            $expirydate = '';
        }
        if($product->exists() && $product_type == "course")
        {
			$token = uniqid();
			$long_url = $courseurl.'?token='.$token;
			$short_url = get_bitly_short_url($long_url,$bitly_login,$bitly_api_key);
			$token_data = array(
				'order_id'              => $fileid,
				'order_type'              => 'Upload',
				'user_id'               => $userid,
				'product_id'            => $product_id,
				'token'                 => $token,
				'short_url'             => trim($short_url),
				'long_url'              => $long_url,
				'token_device_limit'    => $devices_limit,
				'token_created_date'    => $createdate,
				'token_expiry_date'     => $expirydate,
				'token_last_accessed'   => '',
				'token_last_device'     => ''
			);
			$tokenid =wootokens_add_web_tokens($token_data);

			//Commended Token Generetad mail code based on client instruction - March 17 2017
			if($token_send_email)
			{
				do_action( 'woocommerce_token_generated',$tokenid);
			}
        }
	}
	private static function table_list_output() {
		global $wpdb;
		if(!empty($_GET) && isset($_GET['import']))
		{
			if(!empty($_POST))
			{
				$error = [];
				$csverror = [];
				$errrow = [];
				$token_send_email = 0;
				$token_report_email = "";
				if(!empty($_POST['token_send_email']))
				{
					$token_send_email = 1;
				}
				if(!empty($_POST['token_report_email']))
				{
					$token_report_email = $_POST['token_report_email'];
				}
				if(empty($_POST['token_product']))
				{
					$error[] = "Please select Product.";
				}
				if(empty($_FILES['token_file']['tmp_name']))
				{
					$error[] = "Please select License sheet.";
				}
				$product_id = $_POST['token_product'];
				if(empty($error))
				{
					$target_dir = get_home_path()."wp-content/uploads/imports/";
					if(!is_dir($target_dir))
					{
						mkdir($target_dir,0777,true);
					}
					$target_file = $target_dir . basename($_FILES["token_file"]["name"]);
					$uploadOk = 1;
					$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
					$validTypes = array('xlsx','xls','csv');
					if(in_array(strtolower($fileType), $validTypes))
					{

						$filename = "uploads_".(new DateTime())->format("YmdHis").".".$fileType;;

						move_uploaded_file($_FILES["token_file"]["tmp_name"],$target_dir.$filename);
				        $table_name = $wpdb->prefix . 'web_imports';
				        $data = [];
				        $data['file'] = $filename;
				        $data['user_id'] = get_current_user_id();
				        $data['send_email'] = $token_send_email;
				        $data['report_to_email'] = $_POST['token_report_email'];
				        $data['created'] = (new DateTime())->format("Y-m-d H:i:s");
				        $wpdb->insert( $table_name, $data);
				        $fileid = $wpdb->insert_id;
				        $arrResult  = 0;
				        $objPHPExcel = PHPExcel_IOFactory::load($target_dir.$filename);
						$results = $objPHPExcel->getSheet(0)->toArray();
						if(!empty($results))
						{
							foreach ($results as $data) {
								if(!empty($data[0]))
						    	{
						    		$arrResult++;
						    		if(filter_var($data[0], FILTER_VALIDATE_EMAIL))
						    		{
								        $csvdata = [];
								        $csvdata['import_id'] = $fileid;
								        $csvdata['first_name'] = $data[1];
								        $csvdata['last_name'] = $data[2];
								        $csvdata['email'] = $data[0];
								        $csvdata['company'] = $data[3];
								        $csvdata['validity'] = ($data[4]>0?$data[4]:1);
								        $csvdata['created'] = (new DateTime())->format("Y-m-d H:i:s");
								        $wpdb->insert( $wpdb->prefix . 'web_import_users', $csvdata);
								        $userid = $wpdb->insert_id;
								        self::generate_tokens($fileid,$userid,$product_id,$csvdata,$token_send_email);
								    }
								    else
								    {
								    	//$csverror[] = "Email is not valid in Row {$arrResult}({$data[0]})";
								    	$errrow[] = $arrResult;

								    }
							    }
							}
						}
						/*else
						{
							$csverror[] = "License sheet is empty.";
						}*/
					}
					else
					{
						$error[] = "License sheet should xls, xlsx or csv.";
					}

					/*$handle     = fopen($filename, "r");
					if(empty($handle) === false) {
					    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
					    	if(!empty($data[0]))
					    	{
					    		$arrResult++;
					    		if(filter_var($data[0], FILTER_VALIDATE_EMAIL))
					    		{
							        $csvdata = [];
							        $csvdata['import_id'] = $fileid;
							        $csvdata['first_name'] = $data[1];
							        $csvdata['last_name'] = $data[2];
							        $csvdata['email'] = $data[0];
							        $csvdata['company'] = $data[3];
							        $csvdata['validity'] = ($data[4]>0?$data[4]:1);
							        $csvdata['created'] = (new DateTime())->format("Y-m-d H:i:s");
							        $wpdb->insert( $wpdb->prefix . 'web_import_users', $csvdata);
							        $userid = $wpdb->insert_id;
							        self::generate_tokens($fileid,$userid,$product_id,$csvdata,$token_send_email);
							    }
							    else
							    {
							    	$csverror[] = "Email is not valid in Row {$arrResult}";
							    }
						    }
					    }
					    fclose($handle);
					}*/
					if(count($errrow) > 0)
					{	
						if(count($errrow) < $arrResult)
						{
							$csverror[] = "Licenses generated successfully.";
						}
						$csverror[] = "Row ".implode(',', $errrow)." failed. Please fix only the failed rows and upload again.";
					}
					else if($arrResult <= 0 && empty($error))
					{
						$error[] = "License sheet is empty.";
					}
					else if(empty($error) && empty($csverror))
					{
						//wp_redirect("admin.php?page=wc-tokens");
						$csverror[] = "Licenses generated successfully.";
						if($token_report_email)
						{
							do_action( 'woocommerce_web_token_report',$fileid);
						}
					}
				}
			}
			// $args     = array( 'post_type' => 'product', 'tax_query' => array(
			// 	'posts_per_page' => -1,
			//        array(
			//            'taxonomy'      => 'product_cat',
			//            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
			//            'terms'         => 2448,
			//            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
			//        ),
			//        array(
			//           	'taxonomy'      => 'product_type',
			//            'field' => 'name', //This is optional, as it defaults to 'term_id'
			//            'terms'         => "course",//2458
			//            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
			//        ),
			//    ));

			$args = array(
			    'posts_per_page' => -1,
			    'tax_query' => array(
			        'relation' => 'AND',
			        array(
			            'taxonomy' => 'product_cat',
			            'field' => 'slug',
			            'terms' => 'decker-digital'
			        ),
			        array(
			           	'taxonomy'      => 'product_type',
			            'field' => 'name', //This is optional, as it defaults to 'term_id'
			            'terms'         => "course",//2458
			            'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
			        ),
			    ),
			    'post_type' => 'product',
			    'orderby' => 'title',
			);
			//$the_query = new WP_Query( $args );

			$products = get_posts( $args ); 
			echo "<div class='wrap'>";
			echo '<h2>' . __( 'Import Licenses', 'woocommerce' ).'</h2>';
			include( 'settings/views/html-imports-token-users.php' );
			echo "</div>";
		}
		else if(!empty($_GET) && isset($_GET['token_id']) && $_GET['token_id'] > 0)
		{
			echo "<div class='wrap'>";
			echo '<h2>' . __( 'Token Devices', 'woocommerce' ).'</h2>'.' <a href="admin.php?page=wc-tokens">Back</a>';
			$tokens_table_list = new WC_Admin_Tokens_Device_Table_List();
			$tokens_table_list->prepare_items();
			echo '<input type="hidden" name="page" value="wc-tokens" />';
			echo '<input type="hidden" name="section" value="tokens" />';
			$tokens_table_list->views();
			//$tokens_table_list->search_box( __( 'Search Token', 'woocommerce' ), '	token' );
			$tokens_table_list->display();
			echo "</div>";
		}
		else if(!empty($_GET) && isset($_GET['device_id']) && $_GET['device_id'] > 0)
		{
			echo "<div class='wrap'>";
			echo '<h2>' . __( 'Device Access History', 'woocommerce' ).'</h2>'.' <a href="admin.php?page=wc-tokens">Back</a>';
			$tokens_table_list = new WC_Admin_Device_Histories_Table_List();
			$tokens_table_list->prepare_items();
			echo '<input type="hidden" name="page" value="wc-tokens" />';
			echo '<input type="hidden" name="section" value="tokens" />';
			$tokens_table_list->views();
			//$tokens_table_list->search_box( __( 'Search Token', 'woocommerce' ), '	token' );
			$tokens_table_list->display();
			echo "</div>";
		}
		else
		{
			echo "<div class='wrap'>";
			echo '<h1>' . __( 'Tokens', 'woocommerce' ).' <a href="admin.php?page=wc-tokens&import=token" class="page-title-action">Import Tokens</a>' . '</h2>';
			//echo '<h1>' . __( 'Tokens', 'woocommerce' ). '</h2>';
			$tokens_table_list = new WC_Admin_Tokens_Table_List();
			$tokens_table_list->prepare_items();
			echo '<input type="hidden" name="page" value="wc-tokens" />';
			echo '<input type="hidden" name="section" value="tokens" />';
			$tokens_table_list->views();
			//$tokens_table_list->search_box( __( 'Search Token', 'woocommerce' ), '	token' );
			$tokens_table_list->display();
			echo "</div>";
		}
		

	}
}
