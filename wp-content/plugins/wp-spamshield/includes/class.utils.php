<?php
/**
 *  WP-SpamShield Utilities
 *  File Version 1.9.9.8.9
 */

if( !defined( 'ABSPATH' ) || !defined( 'WPSS_VERSION' ) ) {
	if( !headers_sent() ) { @header($_SERVER['SERVER_PROTOCOL'].' 403 Forbidden',TRUE,403); @header('X-Robots-Tag: noindex',TRUE); }
	die( 'ERROR: Direct access to this file is not allowed.' );
}

if( TRUE !== WPSS_DEBUG && TRUE !== WP_DEBUG ) { @ini_set( 'display_errors', 0 ); @error_reporting( 0 ); } /* Prevents error display, but will display errors if WP_DEBUG turned on. */



class WPSS_Utils {

	/**
	 *  WP-SpamShield Utility Class
	 *  Common utility functions
	 *  Child classes: WPSS_PHP, ...
	 *  @since	1.9.9.8.2
	 */

	/* Initialize Class Variables */
	static private		$pref				= 'WPSS_';
	static private		$debug_server		= '.redsandmarketing.com';
	static private		$dev_url			= 'https://www.redsandmarketing.com/';
	static public		$_ENV				= array();
	static protected	$ip_dns_params		= array( 'server_hostname' => WPSS_SERVER_HOSTNAME, 'server_addr' => WPSS_SERVER_ADDR, 'server_name' => WPSS_SERVER_NAME, 'domain' => WPSS_SITE_DOMAIN );
	static protected	$php_version		= PHP_VERSION;
	static protected	$wp_ver				= WPSS_WP_VERSION;
	static protected	$plugin_name		= WPSS_PLUGIN_NAME;
	static protected	$rgx_tld			= WPSS_RGX_TLD;
	static protected	$web_host			= NULL;
	static protected	$web_host_proxy		= NULL;
	static protected	$ip_addr			= NULL;
	static protected	$rev_dns_cache		= NULL;
	static protected	$fwd_dns_cache		= NULL;

	function __construct() {
		/**
		 *  Do nothing...for now
		 */
	}

	/**
	 *  @alias of 		WP_SpamShield::is_wp_ver()
	 *	@used by		get_web_host(), get_web_proxy()
	 *	@since			1.9.9.8.2
	 */
	static public function is_wp_ver( $ver ) {
		return WP_SpamShield::is_wp_ver( $ver );
	}

	/**
	 *  @alias of 		WP_SpamShield::is_php_ver()
	 *	@used by		WPSS_Utils::ksort_array(), 
	 *  @since			1.9.9.8.2
	 */
	static public function is_php_ver( $ver ) {
		return WP_SpamShield::is_php_ver( $ver );
	}

	/**
	 *  @alias of 		WP_SpamShield::get_option()
	 *	@used by		...
	 *  @since			1.9.9.8.2
	 */
	static public function get_option( $option = 'all', $decrypt = FALSE ) {
		return WP_SpamShield::get_option( $option, $decrypt );
	}

	/**
	 *  @alias of 		WP_SpamShield::update_option()
	 *	@used by		...
	 *  @since			1.9.9.8.2
	 */
	static public function update_option( $arr, $update = TRUE, $params = array() ) {
		return WP_SpamShield::update_option( $arr, $update, $params );
	}

	/**
	 *  @alias of 		WP_SpamShield::delete_option()
	 *	@used by		...
	 *  @since			1.9.9.8.2
	 */
	static public function delete_option( $arr, $update = TRUE, $params = array() ) {
		return WP_SpamShield::delete_option( $arr, $update, $params );
	}

	/**
	 *  @alias of 		WP_SpamShield::format_bytes()
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
	static public function format_bytes( $size, $precision = 2 ) {
		return WP_SpamShield::format_bytes( $size, $precision );
	}

	/**
	 *  @alias of 		WP_SpamShield::sanitize_ip()
	 *	@used by		...
	 *	@since			1.9.9.8.7
	 */
	static public function sanitize_ip( $ip_in ) {
		return WP_SpamShield::sanitize_ip( $ip_in );
	}

	/**
	 *  @alias of 		WP_SpamShield::get_ip_addr()
	 *	@used by		...
	 *	@since			1.9.9.8.7
	 */
	static public function get_ip_addr() {
		return WP_SpamShield::get_ip_addr();
	}

	/**
	 *  @alias of 		WP_SpamShield::is_valid_ip()
	 *	@used by		WPSS_Utils::get_web_proxy(), ...
	 *	@since			1.9.9.8.7
	 */
	static public function is_valid_ip( $ip, $incl_priv_res = FALSE, $ipv4_c_block = FALSE ) {
		return WP_SpamShield::is_valid_ip( $ip, $incl_priv_res, $ipv4_c_block );
	}

	/**
	 *  @alias of 		WP_SpamShield::preg_match()
	 *	@used by		WPSS_Utils::get_web_host(),WPSS_Utils::get_web_proxy()
	 *	@since			1.9.9.8.8
	 */
	static public function preg_match( $pattern, $subject, &$matches = NULL, $flags = 0, $offset = 0 ) {
		return WP_SpamShield::preg_match( $pattern, $subject, $matches, $flags, $offset );
	}

	/**
	 *  @alias of 		WP_SpamShield::append_log_data()
	 *	@used by		...
	 *	@since			1.9.9.8.7
	 */
	static public function append_log_data( $var_name = NULL, $var_val = '', $str = NULL, $line = NULL, $func = NULL, $meth = NULL, $class = NULL, $file = NULL ) {
		return WP_SpamShield::append_log_data( $var_name, $var_val, $str, $line, $func, $meth, $class, $file );
	}

	/**
	 *  @alias of 		rs_wpss_get_reverse_dns()
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
	static public function get_reverse_dns( $ip ) {
		return rs_wpss_get_reverse_dns( $ip );
	}

	/**
	 *  @alias of 		rs_wpss_get_forward_dns()
	 *	@used by		...
	 *	@since			1.9.9.8.7
	 */
	static public function get_forward_dns( $domain ) {
		return rs_wpss_get_forward_dns( $domain );
	}

	/**
	 *  @alias of 		rs_wpss_get_server_name()
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
	static public function get_server_name() {
		return rs_wpss_get_server_name();
	}

	/**
	 *  @alias of 		rs_wpss_get_server_addr()
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
	static public function get_server_addr() {
		return rs_wpss_get_server_addr();
	}

	/**
	 *  @alias of 		rs_wpss_get_server_hostname()
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
	static public function get_server_hostname( $sanitize = FALSE, $server_hostname = NULL ) {
		return rs_wpss_get_server_hostname( $sanitize, $server_hostname );
	}

	/**
	 *  @alias of 		rs_wpss_get_ns()
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
	static public function get_ns( $domain ) {
		return rs_wpss_get_ns( $domain );
	}

	/**
	 *  @alias of 		rs_wpss_is_user_admin()
	 *	@used by		WPSS_Utils::get_web_proxy()
	 *	@since			1.9.9.8.2
	 */
	static public function is_user_admin() {
		return rs_wpss_is_user_admin();
	}

	/**
	 *  @alias of 		rs_wpss_substr_count()
	 *	@used by		...
	 *	@since			1.9.9.8.6
	 */
	static public function substr_count( $haystack, $needle, $offset = 0, $length = NULL ) {
		return rs_wpss_substr_count( $haystack, $needle, $offset, $length );
	}

	/**
	 *  static public function get_real_ip_addr() {
	 * 		// In Development
	 *	}
	 */

	/**
	 *  Get reverse block pattern of IP (IPv4 only)
	 *  If IP comes in AA.BB.CC.DD format, return: DD.CC.BB.AA
	 *  @dependencies	WP_SpamShield::is_valid_ip()
	 *	@used by		spammy_domain_chk()
	 *  @since			1.9.9.8.2
	 */
	static public function get_ipv4_dcba( $ip ) {
		if( empty( $ip ) || FALSE === strpos( $ip, '.' ) || !self::is_valid_ip( $ip ) ) { return $ip; }
		$ip_blocks_arr = explode( '.', $ip ); krsort( $ip_blocks_arr ); $ip_dcba = implode( '.', $ip_blocks_arr );
		return $ip_dcba;
	}

	/**
	 *  Check if all blocks of an IP exist within a string (IPv4 only)
	 *  IP comes in AA.BB.CC.DD format
	 *  @dependencies	WP_SpamShield::is_valid_ip(), WP_SpamShield::preg_match()
	 *	@used by		spammy_domain_chk()
	 *  @since			1.9.9.8.6
	 */
	static public function substr_ipv4_blocks( $ip, $str ) {
		if( empty( $ip ) || FALSE === strpos( $ip, '.' ) || !self::is_valid_ip( $ip ) ) { return $ip; }
		$blocks = explode( '.', $ip );
		$a = $blocks[0]; $b = $blocks[1]; $c = $blocks[2]; $d = $blocks[3];
		return
		(
			WP_SpamShield::preg_match( "~(^|[a-z]?[\-\.][a-z]?)".$a."[a-z]?[\-\.][a-z]?~i", $str )
			&&
			WP_SpamShield::preg_match( "~(^|[a-z]?[\-\.][a-z]?)".$b."[a-z]?[\-\.][a-z]?~i", $str )
			&&
			WP_SpamShield::preg_match( "~(^|[a-z]?[\-\.][a-z]?)".$c."[a-z]?[\-\.][a-z]?~i", $str )
			&&
			WP_SpamShield::preg_match( "~(^|[a-z]?[\-\.][a-z]?)".$d."[a-z]?[\-\.][a-z]?~i", $str )
		) ? TRUE : FALSE;
	}

	/**
	 *	Convert Object to Multidimensional Associative Array
	 *	@dependencies	WPSS_PHP::json_encode()
	 *	@used by		...
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.4
	 */
	static public function obj_to_arr( $obj ) {
		if( !is_object( $obj ) && !is_array( $obj ) ) { return $obj; }
		$arr = json_decode( self::json_encode( $obj ), TRUE );
		return ( !is_array( $arr ) ) ? (array) $arr : $arr;
	}

	/**
	 *	Detect if Array is Associative
	 *	@dependencies	WPSS_Utils::obj_to_arr()
	 *	@used by		...
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.4
	 */
	static public function is_array_assoc( $arr = array() ) {
		if( empty( $arr ) ) { return FALSE; }
		if( !is_array( $arr ) && !is_object( $arr ) ) { return FALSE; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		foreach( array_keys( $arr ) as $k ) {
			if( !is_int( $k ) ) { return TRUE; }
		}
		return FALSE;
	}

	/**
	 *	Detect if Array is Multidimensional
	 *	@dependencies	WPSS_Utils::obj_to_arr()
	 *	@used by		WPSS_Utils::vsort_array(), WPSS_Utils::ksort_array(), WPSS_Utils::sort_unique(), 
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.5
	 */
	static public function is_array_multi( $arr = array() ) {
		if( empty( $arr ) ) { return FALSE; }
		if( !is_array( $arr ) && !is_object( $arr ) ) { return FALSE; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		foreach( array_keys( $arr ) as $k => $v ) {
			if( is_array( $v ) ) { return TRUE; }
		}
		return FALSE;
	}

	/**
	 *	Detect if Array is Numerical
	 *	@dependencies	WPSS_Utils::obj_to_arr(), WPSS_Utils::is_array_assoc()
	 *	@used by		...
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.5
	 */
	static public function is_array_num( $arr = array() ) {
		if( empty( $arr ) ) { return FALSE; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		if( is_array( $arr ) && FALSE === self::is_array_assoc( $arr ) ) {
			foreach( array_keys( $arr ) as $k ) {
				if( is_int( $k ) ) { return TRUE; }
			}
		}
		return FALSE;
	}

	/**
	 *  Removes duplicates and orders the array. Single-dimensional Numeric Arrays only.
	 *	@dependencies	WPSS_Utils::obj_to_arr(), WPSS_Utils::is_array_multi(), WPSS_Utils::msort_array()
	 *	@used by		...
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.4
	 */
	static public function sort_unique( $arr = array() ) {
		if( empty( $arr ) ) { return $arr; }
		if( !is_array( $arr ) && !is_object( $arr ) ) { return (array) $arr; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		$arr_tmp = array_unique( $arr );
		if( self::is_array_multi( $arr_tmp ) ) { $arr_tmp = self::msort_array( $arr_tmp ); }
		@natcasesort( $arr_tmp );
		$new_arr = array_values( $arr_tmp );
		return $new_arr;
	}

	/**
	 *  Orders the array by value without removing duplicates. Numeric Arrays only.
	 *	@dependencies	WPSS_Utils::obj_to_arr(), WPSS_Utils::is_array_multi(), WPSS_Utils::msort_array()
	 *	@used by		...
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.5
	 */
	static public function vsort_array( $arr = array() ) {
		if( empty( $arr ) ) { return $arr; }
		if( !is_array( $arr ) && !is_object( $arr ) ) { return (array) $arr; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		$arr_tmp = (array) $arr;
		if( self::is_array_multi( $arr_tmp ) ) { $arr_tmp = self::msort_array( $arr_tmp ); }
		@natcasesort( $arr_tmp );
		$new_arr = array_values( $arr_tmp );
		return $new_arr;
	}

	/**
	 *  Orders the array by key. Associative Arrays only.
	 *	@dependencies	WPSS_Utils::obj_to_arr(), WPSS_Utils::is_array_multi(), WPSS_Utils::msort_array()
	 *	@used by		WPSS_Utils::msort_array()
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.5
	 */
	static public function ksort_array( $arr = array() ) {
		if( empty( $arr ) ) { return $arr; }
		if( !is_array( $arr ) && !is_object( $arr ) ) { return (array) $arr; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		$arr_tmp = (array) $arr;
		if( self::is_php_ver( '5.4' ) ) {
			if( self::is_array_multi( $arr_tmp ) ) { $arr_tmp = self::msort_array( $arr_tmp ); }
			@ksort( $arr_tmp, SORT_NATURAL | SORT_FLAG_CASE );
		} else {
			if( self::is_array_multi( $arr_tmp ) ) { $arr_tmp = self::msort_array( $arr_tmp ); }
			@ksort( $arr_tmp, SORT_REGULAR );
		}
		$new_arr = $arr_tmp;
		return $new_arr;
	}

	/**
	 *  Sorts the array, multidimensional.
	 *  Sorts Numeric arrays by Value, and Associative arrays by Key
	 *	@dependencies	WPSS_Utils::obj_to_arr(), WPSS_Utils::wp_memory_used(), WPSS_Utils::is_array_num(), WPSS_Utils::vsort_array(), WPSS_Utils::ksort_array()
	 *	@used by		...
	 *	@func_ver		RSSD.20170111.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.4
	 */
	static public function msort_array( $arr = array(), $i = 0 ) {
		if( empty( $arr ) ) { return $arr; }
		if( !is_array( $arr ) && !is_object( $arr ) ) { return (array) $arr; }
		if( is_object( $arr ) ) { $arr = self::obj_to_arr( $arr ); }
		$arr_tmp = $arr;
		$i++; $m = 5; /* $m = max */
		if( $i === $m || self::wp_memory_used( FALSE, TRUE ) > 64 * MB_IN_BYTES ) {
			$new_arr = array_multisort( $arr_tmp );
		} else {
			if( self::is_array_num( $arr_tmp ) ) { /* Numeric Arrays - Orders the array, by value. */
				$arr_tmp = self::vsort_array( $arr_tmp );
				foreach( $arr_tmp as $k => $v ) {
					if( is_array( $v ) || is_object( $v ) ) {
						if( is_object( $v ) ) { $v = self::obj_to_arr( $v ); }
						$arr_tmp[$k] = self::msort_array( $v, $i );
					} else { $arr_tmp[$k] = $v; }
				}
			} else { /* Associative Arrays - Orders the array, by key. */
				$arr_tmp = self::ksort_array( $arr_tmp );
				foreach( $arr_tmp as $k => $v ) {
					if( is_array( $v ) || is_object( $v ) ) {
						if( is_object( $v ) ) { $v = self::obj_to_arr( $v ); }
						$arr_tmp[$k] = self::msort_array( $v, $i );
					} else { $arr_tmp[$k] = $v; }
				}
			}
			$new_arr = $arr_tmp;
		}
		return $new_arr;
	}

	/**
	 *  Get IP/DNS Params
	 *  @dependencies	none
	 *  @used by		WPSS_Utils::get_web_host(), WPSS_Utils::get_web_proxy()
	 *  @since			WPSS 1.9.9.8.2, RSSD 1.0.6
	 */
	static public function get_ip_dns_params() {
		self::$ip_dns_params =
			array(
				'server_hostname'	=> WPSS_SERVER_HOSTNAME,
				'server_addr'		=> WPSS_SERVER_ADDR,
				'domain'			=> WPSS_SITE_DOMAIN,
			);
		return self::$ip_dns_params;
	}

	/**
	 *	Attempt to detect and identify web host
	 *	As of RSSD.20170122.01, web hosts detected: 97+
	 *	@dependencies	WPSS_Utils::get_option(), WPSS_Utils::update_option(), WPSS_Utils::get_server_hostname(), WPSS_Utils::get_ip_dns_params(), WPSS_Utils::get_reverse_dns(), WP_SpamShield::is_valid_ip(), WPSS_Utils::get_ns(), WPSS_Utils::sort_unique()
	 *	@used by		...
	 *	@func_ver		RSSD.20170122.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.3
	 */
	static public function get_web_host( $params = array() ) {
		if( !empty( self::$web_host ) ) { return self::$web_host; }
		self::$web_host = self::get_option( 'web_host' );
		if( !empty( self::$web_host ) ) { return self::$web_host; }
		if( empty( $params ) || !is_array( $params ) ) { $params = self::get_ip_dns_params(); }
		extract( $params );
		self::$web_host					= FALSE;
		$server_hostname				= ( !empty( $server_hostname ) ) ? self::get_server_hostname( TRUE, $server_hostname ) : '';
		/* $_SERVER and $_ENV Variables */
		$web_hosts_ev = array(
			'DreamHost'					=> array( 'slug' => 'dreamhost', 'webhost' => 'DreamHost', 'envars' => 'DH_USER', 'deps' => 'ABSPATH', ), 
			'GoDaddy'					=> array( 'slug' => 'godaddy', 'webhost' => 'GoDaddy', 'envars' => 'GD_PHP_HANDLER,GD_ERROR_DOC', ), 
		);
		/* PHP Constants */
		$web_hosts_cn = array(
			'Pagely'					=> array( 'slug' => 'pagely', 'webhost' => 'Pagely', 'constants' => 'PAGELYBIN', ),
			'WP Engine'					=> array( 'slug' => 'wp-engine', 'webhost' => 'WP Engine', 'constants' => 'WPE_APIKEY', ),
		);
		/* Classes */
		$web_hosts_cl = array(
			'WP Engine'					=> array( 'slug' => 'wp-engine', 'webhost' => 'WP Engine', 'classes' => 'WPE_API,WpeCommon', ),
		);
		/**
		 *	Strings
		 *	Nameservers, Internal Server Names, or RevDNS of Website IP
		 *	Test $site_ns, $server_hostname, & $server_rev_dns
		 */
		$web_hosts_st = array(
			'100TB'						=> array( 'slug' => '100tb', 'webhost' => '100TB', 'domains' => '100tb.com', 'parent' => 'uk2', ), 
			'1and1 Internet'			=> array( 'slug' => '1and1', 'webhost' => '1and1 Internet', 'domains' => '1and1.co.uk,1and1-dns.biz,1and1-dns.com,1and1-dns.de,1and1-dns.org', ), 
			'A Small Orange'			=> array( 'slug' => 'a-small-orange', 'webhost' => 'A Small Orange', 'domains' => 'asmallorange.com,asodns.com,asonoc.com,asoshared.com', ), 
			'A2 Hosting'				=> array( 'slug' => 'a2-hosting', 'webhost' => 'A2 Hosting', 'domains' => 'a2hosting.com', ), 
			'Altervista'				=> array( 'slug' => 'altervista', 'webhost' => 'Altervista', 'domains' => 'altervista.com,altervista.org,altervista.it', 'tags' => 'freehost' ), 
			'Amazon Web Services (AWS)'	=> array( 'slug' => 'amazon-aws', 'webhost' => 'Amazon Web Services (AWS)', 'domains' => 'amazonaws.com', ), 
			'Amen'						=> array( 'slug' => 'amen', 'webhost' => 'Amen', 'domains' => 'amen.fr', ), 
			'Arvixe'					=> array( 'slug' => 'arvixe', 'webhost' => 'Arvixe', 'domains' => 'arvixe.com,arvixeshared.com,arvixevps.com', ), 
			'Automattic'				=> array( 'slug' => 'automattic', 'webhost' => 'Automattic', 'domains' => 'automattic.com', ), 
			'BigScoots'					=> array( 'slug' => 'bigscoots', 'webhost' => 'BigScoots', 'domains' => 'bigscoots.com', ), 
			'Bluehost'					=> array( 'slug' => 'bluehost', 'webhost' => 'Bluehost', 'domains' => 'bluehost.com', 'tags' => 'top' ), 
			'Cloudways'					=> array( 'slug' => 'cloudways', 'webhost' => 'Cloudways', 'domains' => 'cloudways.,cloudwaysapps.', ), 
			'Cogeco Peer 1'				=> array( 'slug' => 'cogeco-peer-1', 'webhost' => 'Cogeco Peer 1', 'domains' => 'peer1.net', ), 
			'ColoCrossing'				=> array( 'slug' => 'colocrossing', 'webhost' => 'ColoCrossing', 'domains' => 'colocrossing.com,vsnx.net', ), 
			'DigitalOcean'				=> array( 'slug' => 'digitalocean', 'webhost' => 'DigitalOcean', 'domains' => 'digitalocean.com', ), 
			'Doteasy'					=> array( 'slug' => 'doteasy', 'webhost' => 'Doteasy', 'domains' => 'doteasy.com', ), 
			'DreamHost'					=> array( 'slug' => 'dreamhost', 'webhost' => 'DreamHost', 'domains' => 'dreamhost.com', ), 
			'eHost'						=> array( 'slug' => 'ehost', 'webhost' => 'eHost', 'domains' => 'ehost.com', ), 
			'Enzu'						=> array( 'slug' => 'enzu', 'webhost' => 'Enzu', 'domains' => 'scalabledns.com', ), 
			'EuHost'					=> array( 'slug' => 'euhost', 'webhost' => 'EuHost', 'domains' => 'euhost.co.uk', ), 
			'eUKhost'					=> array( 'slug' => 'eukhost', 'webhost' => 'eUKhost', 'domains' => 'eukhost.com', ), 
			'Fasthosts'					=> array( 'slug' => 'fasthosts', 'webhost' => 'Fasthosts', 'domains' => 'fast-hosts.org,fasthosts.co.uk,fasthosts.net.uk', ), 
			'FatCow'					=> array( 'slug' => 'fatcow', 'webhost' => 'FatCow', 'domains' => 'fatcow.com', ), 
			'Gandi'						=> array( 'slug' => 'gandi', 'webhost' => 'Gandi', 'domains' => 'gandi.net', ), 
			'Globat'					=> array( 'slug' => 'globat', 'webhost' => 'Globat', 'domains' => 'dnsjunction.com,globat.com', ), 
			'GlowHost'					=> array( 'slug' => 'glowHost', 'webhost' => 'GlowHost', 'domains' => 'glowhost.com', ), 
			'GoDaddy'					=> array( 'slug' => 'godaddy', 'webhost' => 'GoDaddy', 'domains' => 'godaddy.com,secureserver.net', ), 
			'Google Cloud Platform'		=> array( 'slug' => 'google-cloud', 'webhost' => 'Google Cloud Platform', 'domains' => 'bc.googleusercontent.com,googledomains.com,googleusercontent.com', ), 
			'GreenGeeks'				=> array( 'slug' => 'greengeeks', 'webhost' => 'GreenGeeks', 'domains' => 'greengeeks.com', ), 
			'Heart Internet'			=> array( 'slug' => 'heart-internet', 'webhost' => 'Heart Internet', 'domains' => 'heartinternet.co.uk,heartinternet.uk', ), 
			'Hetzner'					=> array( 'slug' => 'hetzner', 'webhost' => 'Hetzner', 'domains' => 'hetzner.,host-h.net,your-server.de', ), 
			'HostDime'					=> array( 'slug' => 'hostdime', 'webhost' => 'HostDime', 'domains' => 'dimenoc.com', ), 
			'HostEurope'				=> array( 'slug' => 'hosteurope', 'webhost' => 'HostEurope', 'domains' => 'hosteurope.de', ), 
			'HostGator'					=> array( 'slug' => 'hostgator', 'webhost' => 'HostGator', 'domains' => 'hostgator.com,websitewelcome.com', 'tags' => 'top' ), 
			'HostIndia.net'				=> array( 'slug' => 'hostindia', 'webhost' => 'HostIndia.net', 'domains' => 'hostindia.net', ), 
			'HostingCentre'				=> array( 'slug' => 'hostingcentre', 'webhost' => 'HostingCentre', 'domains' => 'hostingcentre.in', ), 
			'HostingRaja'				=> array( 'slug' => 'hostingraja', 'webhost' => 'HostingRaja', 'domains' => 'hostingraja.in', ), 
			'HostMetro'					=> array( 'slug' => 'hostmetro', 'webhost' => 'HostMetro', 'domains' => 'hostmetro.com', ), 
			'HostMonster'				=> array( 'slug' => 'hostmonster', 'webhost' => 'HostMonster', 'domains' => 'hostmonster.com', ), 
			'HostNine'					=> array( 'slug' => 'hostnine', 'webhost' => 'HostNine', 'domains' => 'hostnine.com', ), 
			'HostPapa'					=> array( 'slug' => 'hostpapa', 'webhost' => 'HostPapa', 'domains' => 'hostpapa.com', ), 
			'Hostway'					=> array( 'slug' => 'hostway', 'webhost' => 'Hostway', 'domains' => 'hostway.net', ), 
			'Hostwinds'					=> array( 'slug' => 'hostwinds', 'webhost' => 'Hostwinds', 'domains' => 'hostwinds.com,hostwindsdns.com', ), 
			'Infomaniak'				=> array( 'slug' => 'infomaniak', 'webhost' => 'Infomaniak', 'domains' => 'infomaniak.ch', ), 
			'InMotion Hosting'			=> array( 'slug' => 'inmotion-hosting', 'webhost' => 'InMotion Hosting', 'domains' => 'inmotionhosting.com', 'tags' => 'top' ), 
			'IO Zoom'					=> array( 'slug' => 'io-zoom', 'webhost' => 'IO Zoom', 'domains' => 'iozoom.com', ), 
			'iPage'						=> array( 'slug' => 'ipage', 'webhost' => 'iPage', 'domains' => 'ipage.com', ), 
			'IPOWER'					=> array( 'slug' => 'ipower', 'webhost' => 'IPOWER', 'domains' => 'ipower.com,ipowerdns.com,ipowerweb.net', ), 
			'IX Web Hosting'			=> array( 'slug' => 'ix-web-hosting', 'webhost' => 'IX Web Hosting', 'domains' => 'cloudbyix.com,cloudix.com,ecommerce.com,hostexcellence.com,ixwebhosting.com,ixwebsites.com,opentransfer.com,webhost.biz', 'parent' => 'Ecommerce Corporation', ), 
			'JustHost'					=> array( 'slug' => 'justhost', 'webhost' => 'JustHost', 'domains' => 'justhost.com', ), 
			'LeaseWeb'					=> array( 'slug' => 'leaseweb', 'webhost' => 'LeaseWeb', 'domains' => 'leaseweb.com,leaseweb.net,leaseweb.nl,lswcdn.com', ), 
			'Linode'					=> array( 'slug' => 'linode', 'webhost' => 'Linode', 'domains' => 'linode.com', ), 
			'Liquid Web'				=> array( 'slug' => 'liquid-web', 'webhost' => 'Liquid Web', 'domains' => 'liquidweb.com', ), 
			'Lunarpages'				=> array( 'slug' => 'lunarpages', 'webhost' => 'Lunarpages', 'domains' => 'lunarfo.com,lunarpages.com,lunarservers.com', ), 
			'Media Temple'				=> array( 'slug' => 'media-temple', 'webhost' => 'Media Temple', 'domains' => 'mediatemple.com,mediatemple.net', ), 
			'Microsoft Azure'			=> array( 'slug' => 'microsoft-azure', 'webhost' => 'Microsoft Azure', 'domains' => 'azuredns-cloud.net,azurewebsites.net', ),
			'Midphase'					=> array( 'slug' => 'midphase', 'webhost' => 'Midphase', 'domains' => 'midphase.com,us2.net', 'parent' => 'uk2', ),
			'My Wealthy Affiliate'		=> array( 'slug' => 'my-wealthy-affiliate', 'webhost' => 'My Wealthy Affiliate', 'domains' => 'mywahosting.com', ), 
			'MyHosting.com'				=> array( 'slug' => 'myhosting', 'webhost' => 'MyHosting.com', 'domains' => 'myhosting.com', ), 
			'NetFirms'					=> array( 'slug' => 'netfirms', 'webhost' => 'NetFirms', 'domains' => 'netfirms.com', ), 
			'Nexcess'					=> array( 'slug' => 'nexcess', 'webhost' => 'Nexcess', 'domains' => 'nexcess.net', ), 
			'NFrance'					=> array( 'slug' => 'nfrance', 'webhost' => 'NFrance', 'domains' => 'slconseil.com', ), 
			'Omnis'						=> array( 'slug' => 'omnis', 'webhost' => 'Omnis', 'domains' => 'omnis.com,omnisdns.net', ), 
			'One.com'					=> array( 'slug' => 'one-com', 'webhost' => 'One.com', 'domains' => 'b-one.net,b-one-dns.net,one.com', ), 
			'Online.net'				=> array( 'slug' => 'online-net', 'webhost' => 'Online.net', 'domains' => 'online.net,poneytelecom.eu', ), 
			'OVH Hosting'				=> array( 'slug' => 'ovh-hosting', 'webhost' => 'OVH Hosting', 'domains' => 'anycast.me,ovh.co.uk,ovh.com,ovh.net', ), 
			'Pagely'					=> array( 'slug' => 'pagely', 'webhost' => 'Pagely', 'domains' => 'pagely.com', ), 
			'Pair Networks'				=> array( 'slug' => 'pair-networks', 'webhost' => 'Pair Networks', 'domains' => 'ns0.com,pair.com', ), 
			'PHPNET'					=> array( 'slug' => 'phpnet', 'webhost' => 'PHPNET', 'domains' => 'phpnet.org', ), 
			'PlusServer'				=> array( 'slug' => 'plusserver', 'webhost' => 'PlusServer', 'domains' => 'plusserver.com', ), 
			'PowWeb'					=> array( 'slug' => 'powweb', 'webhost' => 'PowWeb', 'domains' => 'powweb.com', ), 
			'Pressable'					=> array( 'slug' => 'pressable', 'webhost' => 'Pressable', 'domains' => 'zippykid.com', ), 
			'QuadraNet'					=> array( 'slug' => 'quadranet', 'webhost' => 'QuadraNet', 'domains' => 'quadranet.com', ), 
			'Rackspace'					=> array( 'slug' => 'rackspace', 'webhost' => 'Rackspace', 'domains' => 'hostingmatrix.net,rackspace.com,stabletransit.com', ), 
			'Register.com'				=> array( 'slug' => 'register-com', 'webhost' => 'Register.com', 'domains' => 'register.com', ), 
			'SingleHop'					=> array( 'slug' => 'singlehop', 'webhost' => 'SingleHop', 'domains' => 'singlehop.com', ), 
			'Site5'						=> array( 'slug' => 'site5', 'webhost' => 'Site5', 'domains' => 'site5.com', ), 
			'SiteGround'				=> array( 'slug' => 'siteground', 'webhost' => 'siteground', 'domains' => 'siteground.', 'tags' => 'top' ), 
			'SiteRubix'					=> array( 'slug' => 'siterubix', 'webhost' => 'SiteRubix', 'domains' => 'siterubix.com', 'parent' => 'my-wealthy-affiliate', ), 
			'SoftLayer'					=> array( 'slug' => 'softlayer', 'webhost' => 'SoftLayer', 'domains' => 'networklayer.com,static.sl-reverse.com,softlayer.net', ), 
			'Superb'					=> array( 'slug' => 'superb', 'webhost' => 'Superb', 'domains' => 'superb.net', ), 
			'Triple C Cloud Computing'	=> array( 'slug' => 'triple-c', 'webhost' => 'Triple C Cloud Computing', 'domains' => 'ccc.net.il,ccccloud.com', ), 
			'UK2'						=> array( 'slug' => 'uk2', 'webhost' => 'UK2', 'domains' => 'uk2.net', ), 
			'UnoEuro'					=> array( 'slug' => 'unoeuro', 'webhost' => 'UnoEuro', 'domains' => 'unoeuro.com', ), 
			'VHosting Solution'			=> array( 'slug' => 'vhosting', 'webhost' => 'VHosting Solution', 'domains' => 'vhosting-it.com', ), 
			'VPS.net'					=> array( 'slug' => 'vps-net', 'webhost' => 'VPS.net', 'domains' => 'vps.net', 'parent' => 'uk2', ), 
			'Web Hosting Hub'			=> array( 'slug' => 'web-hosting-hub', 'webhost' => 'Web Hosting Hub', 'domains' => 'webhostinghub.com', ), 
			'Web.com'					=> array( 'slug' => 'web-com', 'webhost' => 'Web.com', 'domains' => 'web.com', ), 
			'WebFaction'				=> array( 'slug' => 'webfaction', 'webhost' => 'WebFaction', 'domains' => 'webfaction.com', ), 
			'WebHostingBuzz'			=> array( 'slug' => 'webhostingbuzz', 'webhost' => 'WebHostingBuzz', 'domains' => 'fastwhb.com,webhostingbuzz.com', ), 
			'Webs'						=> array( 'slug' => 'webs', 'webhost' => 'Webs', 'domains' => 'webs.com', ), 
			'WebSynthesis'				=> array( 'slug' => 'websynthesis', 'webhost' => 'WebSynthesis', 'domains' => 'websynthesis.com,wsynth.net', ), 
			'Weebly'					=> array( 'slug' => 'weebly', 'webhost' => 'Weebly', 'domains' => 'weebly.com', 'tags' => 'diy' ), 
			'WestHost'					=> array( 'slug' => 'westhost', 'webhost' => 'WestHost', 'domains' => 'westhost.net', 'parent' => 'uk2', ), 
			'Wix'						=> array( 'slug' => 'wix', 'webhost' => 'Wix', 'domains' => 'wix.com', 'tags' => 'diy' ), 
			'WordPress.com'				=> array( 'slug' => 'wordpress-com', 'webhost' => 'WordPress.com', 'domains' => 'wordpress.com', ), 
			'WP Engine'					=> array( 'slug' => 'wp-engine', 'webhost' => 'WP Engine', 'domains' => 'wpengine.com', ), 
		);
		/* RegEx - Nameservers, Internal Server Names, or RevDNS of Website IP - Test $site_ns, $server_hostname, & $server_rev_dns */
		$web_hosts_rg = array(
			'1and1 Internet'			=> array( 'slug' => '1and1', 'webhost' => '1and1 Internet', 'domainsrgx' => "~(^|\.)(ns[0-9]*[\.\-])?(1and1([\.\-]ui)?(\-dns)?)(\.[a-z]{2,3}){1,2}[a-z]*$~i", ), 
			'Amazon Web Services (AWS)'	=> array( 'slug' => 'amazon-aws', 'webhost' => 'Amazon Web Services (AWS)', 'domainsrgx' => "~(^|\.)ns[\.\-][0-9]+\.awsdns\-[0-9]+(\.[a-z]{2,3}){1,2}[a-z]*$~i", ), 
			'Cloudways'					=> array( 'slug' => 'cloudways', 'webhost' => 'Cloudways', 'domainsrgx' => "~(^|\.)cloudways(apps)?(\.[a-z]{2,3}){1,2}[a-z]*$~i", ), 
			'HostGator'					=> array( 'slug' => 'hostgator', 'webhost' => 'HostGator', 'domainsrgx' => "~(^|\.)(hostgator|websitewelcome)\.com~i", ), 
			'Hetzner'					=> array( 'slug' => 'hetzner', 'webhost' => 'Hetzner', 'domainsrgx' => "~(^|\.)(hetzner\.|host\-h\.net|your\-server\.de)~i", ), 
			'SiteGround'				=> array( 'slug' => 'siteground', 'webhost' => 'SiteGround', 'domainsrgx' => "~(^|\.)(siteground|sg(srv|ded|vps)|clev)([0-9]+)?(\.[a-z]{2,3}){1,2}[a-z]*$~i", ), 
			'WebHostFace'				=> array( 'slug' => 'webhostface', 'webhost' => 'WebHostFace', 'domainsrgx' => "~(^|\.)(webhost(ing)?face([a-z0-9]+)?|face(ds|reseller|shared|vps)[a-z]{2,10}[0-9]|whf(star|web))(\.[a-z]{2,3}){1,2}[a-z]*$~i", ), 
		);
		$web_hosts_ns = $web_hosts_st;

		/* Start Tests*/
		foreach( $web_hosts_ev as $wh => $data ) {
			$envars = explode( ',', $data['envars'] );
			foreach( $envars as $ev ) {
				if( empty( $_SERVER[$ev] ) ) { continue; }
				if( empty( $data['deps'] ) ) {
					self::$web_host = $data['webhost'];
				} elseif( FALSE !== strpos( $data['deps'], $_SERVER[$ev] ) ) {
					self::$web_host = $data['webhost'];
				}
			}
		}
		foreach( $web_hosts_cn as $wh => $data ) {
			if( !empty( self::$web_host ) ) { break; }
			$constants = explode( ',', $data['constants'] );
			foreach( $constants as $cn ) {
				if( defined( $cn ) ) {
					self::$web_host = $data['webhost'];
				}
			}
		}
		foreach( $web_hosts_cl as $wh => $data ) {
			if( !empty( self::$web_host ) ) { break; }
			$classes = explode( ',', $data['classes'] );
			foreach( $classes as $cl ) {
				if( class_exists( $cl ) ) {
					self::$web_host = $data['webhost'];
				}
			}
		}
		$server_rev_dns = self::get_reverse_dns( $server_addr );
		$server_rev_dns = ( !self::is_valid_ip( $server_rev_dns ) ) ? $server_rev_dns : ''; /* If IP, will skip the check */
		foreach( $web_hosts_st as $wh => $data ) {
			if( !empty( self::$web_host ) ) { break; }
			if( empty( $server_hostname ) && empty( $server_rev_dns ) ) { break; }
			$domains = explode( ',', $data['domains'] );
			foreach( $domains as $st ) {
				if( !empty( $server_hostname ) && FALSE !== strpos( $server_hostname, '.'.$st ) ) {
					self::$web_host = $data['webhost'];
				} elseif( !empty( $server_rev_dns ) && FALSE !== strpos( $server_rev_dns, '.'.$st ) ) {
					self::$web_host = $data['webhost'];
				}
			}
		}
		foreach( $web_hosts_rg as $wh => $data ) {
			if( !empty( self::$web_host ) ) { break; }
			if( empty( $server_hostname ) && empty( $server_rev_dns ) ) { break; }
			$rg = $data['domainsrgx'];
			if( !empty( $server_hostname ) && self::preg_match( $rg, $server_hostname ) ) {
				self::$web_host = $data['webhost'];
			} elseif( !empty( $server_rev_dns ) && self::preg_match( $rg, $server_rev_dns ) ) {
				self::$web_host = $data['webhost'];
			}
		}
		$site_ns = self::get_ns( $domain );
		$site_ns = ( !empty( $site_ns ) && is_array( $site_ns ) ) ? implode( '  |  ', self::sort_unique( $site_ns ) ) : 'Not Detected';
		foreach( $web_hosts_ns as $wh => $data ) {
			if( !empty( self::$web_host ) ) { break; }
			if( empty( $site_ns ) && empty( $server_hostname ) && empty( $server_rev_dns ) ) { break; }
			$domains = explode( ',', $data['domains'] );
			foreach( $domains as $st ) {
				if( !empty( $site_ns ) && FALSE !== strpos( $site_ns, '.'.$st ) ) {
					self::$web_host = $data['webhost'];
				} elseif( !empty( $server_hostname ) && FALSE !== strpos( $server_hostname, '.'.$st ) ) {
					self::$web_host = $data['webhost'];
				} elseif( !empty( $server_rev_dns ) && FALSE !== strpos( $server_rev_dns, '.'.$st ) ) {
					self::$web_host = $data['webhost'];
				}
			}
		}
		foreach( $web_hosts_rg as $wh => $data ) {
			if( !empty( self::$web_host ) ) { break; }
			if( empty( $site_ns ) ) { break; }
			$rg = $data['domainsrgx'];
			if( !empty( $site_ns ) && self::preg_match( $rg, $site_ns ) ) {
				self::$web_host = $data['webhost']; 
			}
		}
		if( !empty( self::$web_host ) ) {
			$options = array( 'web_host' => self::$web_host, );
			self::update_option( $options );
		}
		return self::$web_host;
	}

	/**
	 *	Try to identify web host proxies: Proxies, CDNs, Web Application Firewalls (WAFs), etc.
	 *	@dependencies	WPSS_Utils::get_option(), WPSS_Utils::update_option(), WPSS_Utils::get_server_hostname(), WPSS_Utils::get_ip_dns_params(), WPSS_Utils::get_reverse_dns(), WP_SpamShield::is_valid_ip(), WPSS_Utils::get_ns(), WPSS_Utils::is_user_admin(), WPSS_Utils::sort_unique()
	 *	@used by		...
	 *	@func_ver		RSSD.20170122.01
	 *	@since			WPSS 1.9.9.8.2, RSSD 1.0.3
	 */
	static public function get_web_proxy( $params = array() ) {
		if( NULL !== self::$web_host_proxy ) { return self::$web_host_proxy; }
		self::$web_host_proxy = self::get_option( 'web_proxy' );
		if( NULL !== self::$web_host_proxy ) { return self::$web_host_proxy; }
		if( empty( $params ) || !is_array( $params ) ) { $params = self::get_ip_dns_params(); }
		extract( $params );
		self::$web_host_proxy			= FALSE;
		$server_hostname				= ( !empty( $server_hostname ) ) ? self::get_server_hostname( TRUE, $server_hostname ) : '';
		$server_rev_dns					= self::get_reverse_dns( $server_addr );
		$server_rev_dns					= ( !self::is_valid_ip( $server_rev_dns ) ) ? $server_rev_dns : ''; /* If IP, will skip the check */
		/* $_SERVER and $_ENV Variables */
		$web_proxies_ev = array(
			'Cloudflare'				=> array( 'slug' => 'cloudflare', 'webproxy' => 'Cloudflare', 'envars' => 'HTTP_CF_CONNECTING_IP,HTTP_CF_IPCOUNTRY,HTTP_CF_RAY,HTTP_CF_VISITOR,HTTP_X_AMZ_CF_ID', ), 
			'Incapsula'					=> array( 'slug' => 'incapsula', 'webproxy' => 'Incapsula', 'envars' => 'HTTP_INCAP_CLIENT_IP', ), 
			'Sucuri CloudProxy'			=> array( 'slug' => 'sucuri-cloudproxy', 'webproxy' => 'Sucuri CloudProxy', 'envars' => 'HTTP_X_SUCURI_CLIENTIP', ), 
		);
		$web_proxies_px = array(			/* Proxies, CDNs, Web Application Firewalls (WAFs), etc. - Test $site_ns, $server_hostname, & $server_rev_dns */
			'Cloudflare'				=> array( 'slug' => 'cloudflare', 'webproxy' => 'Cloudflare', 'domains' => 'cloudflare.com,ns.cloudflare.com', ), /* HTTP Headers: HTTP:CF-Connecting-IP / $_SERVER['HTTP_CF_CONNECTING_IP'] */
			'Incapsula'					=> array( 'slug' => 'incapsula', 'webproxy' => 'Incapsula', 'domains' => 'incapdns.net', ), /* HTTP Headers: HTTP:Incap-Client-IP / $_SERVER['HTTP_INCAP_CLIENT_IP'] */
			'Sucuri CloudProxy'			=> array( 'slug' => 'sucuri-cloudproxy', 'webproxy' => 'Sucuri CloudProxy', 'domains' => 'mycloudproxy.com,sucuridns.com', ), /* HTTP Headers: HTTP:X-Sucuri-Client-IP / $_SERVER['HTTP_X_SUCURI_CLIENTIP'] */
		);
		$web_proxies_rg = array(			/* RegEx - Internal Server Names or RevDNS of Website IP - Test $server_hostname & $server_rev_dns */
			'Sucuri CloudProxy'			=> array( 'slug' => 'sucuri-cloudproxy', 'webproxy' => 'Sucuri CloudProxy', 'domainsrgx' => "~^cloudproxy[0-9]+\.sucuri\.net$~i", ), 
		);
		/* if( !empty( $_SERVER['HTTP_X_SUCURI_CLIENTIP'] ) ) { $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_SUCURI_CLIENTIP']; } */
		$options = array( 'surrogate' => FALSE, );
		$site_ns = self::get_ns( $domain );
		$site_ns = ( !empty( $site_ns ) && is_array( $site_ns ) ) ? implode( '  |  ', self::sort_unique( $site_ns ) ) : $site_ns;
		foreach( $web_proxies_ev as $wp => $data ) {
			$envars = explode( ',', $data['envars'] );
			foreach( $envars as $ev ) {
				if( empty( $_SERVER[$ev] ) ) { continue; }
				if( 0 !== strpos( $ev, 'HTTP_' ) ) {
					self::$web_host_proxy = $data['webproxy'];
				} elseif( is_admin() && self::is_user_admin() ) {
					self::$web_host_proxy = $data['webproxy'];
				}
			}
		}
		foreach( $web_proxies_px as $px => $wp ) {
			if( !empty( self::$web_host_proxy ) ) { break; }
			if( empty( $site_ns ) && empty( $server_hostname ) && empty( $server_rev_dns ) ) { break; }
			if( !empty( $site_ns ) && FALSE !== strpos( $site_ns, $px ) ) {
				self::$web_host_proxy = $wp;
			} elseif( !empty( $server_hostname ) && FALSE !== strpos( $server_hostname, $px ) ) {
				self::$web_host_proxy = $wp;
			} elseif( !empty( $server_rev_dns ) && FALSE !== strpos( $server_rev_dns, $px ) ) {
				self::$web_host_proxy = $wp;
			}
		}
		foreach( $web_proxies_rg as $wp => $data ) {
			if( !empty( self::$web_host_proxy ) ) { break; }
			if( empty( $site_ns ) && empty( $server_hostname ) && empty( $server_rev_dns ) ) { break; }
			$rg = $data['domainsrgx'];
			if( !empty( $site_ns ) && self::preg_match( $rg, $site_ns ) ) {
				self::$web_host_proxy = $data['webproxy'];
			} elseif( !empty( $server_hostname ) && self::preg_match( $rg, $server_hostname ) ) {
				self::$web_host_proxy = $data['webproxy'];
			} elseif( !empty( $server_rev_dns ) && self::preg_match( $rg, $server_rev_dns ) ) {
				self::$web_host_proxy = $data['webproxy'];
			}
		}
		if( !empty( self::$web_host_proxy ) ) {
			$options = array( 'surrogate' => TRUE, 'ubl_cache_disable' => TRUE, 'web_proxy' => self::$web_host_proxy, );
			self::update_option( $options );
		}
		return self::$web_host_proxy;
	}

	/**
	 *  Detect https/http
	 *  Use instead of WP function is_ssl(), as this is more accurate
	 *  @dependencies	none
	 *  @used by		rs_wpss_get_url(), rs_wpss_get_rewrite_base(), rs_wpss_gf_spam_check(), WPSS_Compatibility::misc_form_bypass()
	 *  @since			...
	 */
	static public function is_https() {
		if( !empty( $_SERVER['HTTPS'] )						&& 'off'	!==	$_SERVER['HTTPS'] )						{ return TRUE; }
		if( !empty( $_SERVER['SERVER_PORT'] )				&& '443'	 ==	$_SERVER['SERVER_PORT'] )				{ return TRUE; }
		if( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] )	&& 'https'	===	$_SERVER['HTTP_X_FORWARDED_PROTO'] )	{ return TRUE; }
		if( !empty( $_SERVER['HTTP_X_FORWARDED_SSL'] )		&& 'off'	!==	$_SERVER['HTTP_X_FORWARDED_SSL'] )		{ return TRUE; }
		return FALSE;
	}

	/**
	 *  Get the URL of current page/post/etc
	 *	@dependencies	WPSS_Utils::is_https()
	 *	@used by		constant 'WPSS_THIS_URL'
	 *	@since			1.9.9.8.2, replaced rs_wpss_get_url()
	 */
	static public function get_url( $safe = FALSE, $server_name = WPSS_SERVER_NAME ) {
		$url  = self::is_https() ? 'https://' : 'http://';
		$url .= $server_name.$_SERVER['REQUEST_URI'];
		if( TRUE === $safe ) { $url = esc_url( $url ); }
		return $url;
	}

	/**
	 *  Get the amount of memory currently used by WordPress
	 *	@dependencies	WPSS_Utils::format_bytes()
	 *	@used by		...
	 *	@since			1.9.9.8.2, replaced rs_wpss_wp_memory_used()
	 */
	static public function wp_memory_used( $peak = FALSE, $raw = FALSE ) {
		$mem = 0;
		if( TRUE === $peak && function_exists( 'memory_get_peak_usage' ) ) {
			$mem = memory_get_peak_usage( TRUE );
		} elseif( function_exists( 'memory_get_usage' ) ) {
			$mem = memory_get_usage();
		}
		return ( !empty( $mem ) && FALSE === $raw ) ? self::format_bytes( $mem ) : $mem;
	}

	/**
	 *  Check HTTP Status - Returns 3-digit response code
	 *	@dependencies	RS_System_Diagnostic::get_headers(), 
	 *  @since			1.9.9.8.8
	 */
	static public function get_http_status( $url = NULL ) {
		return self::get_headers( $url, 'status' );
	}

	/**
	 *  Drop-in replacement for native PHP function get_headers(), with a few tweaks
	 *  Get HTTP Headers of a URL
	 *  Can return an array of headers, an associative array of headers, status code, or all
	 *  @usage			"RS_System_Diagnostic::get_headers( $url )" mimics behavior of native PHP "get_headers( $url )"
	 *  @params			$url, 	$type	default|assoc|status|all
	 *	@dependencies	...
	 *	@used by		...
	 *  @since			... as 
	 *  @modified		1.9.9.8.8 Switched from PHP get_headers() to WP HTTP API: wp_remote_head() for compatibility
	 */
	static public function get_headers( $url = NULL, $type = 'default' ) {
		$response	= wp_remote_head( $url );
		if( is_wp_error( $response ) || empty( $response['headers'] ) ) { return array(); }
		$headers	= ( self::is_wp_ver( '4.6' )					)	? $response['headers']->getAll()	: $response['headers']	;
		$code		= ( !empty( $response['response']['code'] )		)	? $response['response']['code']		: ''					;
		foreach( $headers as $k => $v ) {
			if( is_array( $v ) ) { unset( $headers[$k] ); }
		}
		if( 'assoc' === $type ) {
			/* Return associative array */
			return $headers;
		} else {
			/* Return numeric array (standard headers array) */
			$std_headers = array();
			foreach( $headers as $k => $v ) {
				$std_headers[] = $k.': '.$v;
			}
			$headers = $std_headers;
			if( 'status' === $type || 'all' === $type ) {
				$status = !empty( $code ) ? $code : 200;
				if( 'status' === $type ) { return $status; }
				$hdr_data = compact( 'headers', 'status' );
				return $hdr_data;
			}
			return $headers;
		}
	}

	static public function is_csp_report() {
	/**
	 *	Check if current request is a CSP Report
	 *	@dependencies	...
	 *	@used by		...
	 *	@since			1.9.9.8.2
	 */
		return ( 'POST' === $_SERVER['REQUEST_METHOD'] && !empty( $_SERVER['CONTENT_TYPE'] ) && 'application/csp-report' === $_SERVER['CONTENT_TYPE'] ) ? TRUE : FALSE;
	}

}



class WPSS_PHP extends WPSS_Utils {

	/**
	 *  WP-SpamShield PHP Function Replacements Class
	 *  Child class of WPSS_Util
	 *  Replacements for certain PHP functions
	 *  Child classes: WPSS_Func, 
	 *  @since	1.9.9.8.2
	 */

	function __construct() {
		/**
		 *  Do nothing...for now
		 */
	}

	/**
	 *  Convert case using multibyte version (superior) if available, if not, use defaults
	 *  Replaces PHP functions strtolower(), strtoupper(), ucfirst(), ucwords()
	 *  Usage:
	 *  - WPSS_PHP::casetrans( 'lower', $string ); // Ver 1.9.9.8.2+
	 *  Replaces:
	 *  - rs_wpss_casetrans( 'lower', $string ); // Ver 1.8.4 - 1.9.9.8.1
	 *	@dependencies	...
	 *	@used by		...
	 *  @since		1.8.4 as rs_wpss_casetrans()
	 *  @moved		1.9.9.8.2 to WPSS_PHP class
	 */
	static public function casetrans( $type, $string ) {
		if( empty( $string ) || empty( $type ) || !is_string( $string ) || !is_string( $type ) ) { return $string; }
		switch( $type ) {
			case 'upper':
				return function_exists( 'mb_strtoupper' ) ? mb_strtoupper( $string, 'UTF-8' ) : strtoupper( $string );
			case 'lower':
				return function_exists( 'mb_strtolower' ) ? mb_strtolower( $string, 'UTF-8' ) : strtolower( $string );
			case 'ucfirst':
				if( function_exists( 'mb_strtoupper' ) && function_exists( 'mb_substr' ) ) {
					$strtmp = mb_strtoupper( mb_substr( $string, 0, 1, 'UTF-8' ), 'UTF-8' ) . mb_substr( $string, 1, NULL, 'UTF-8' );
					/* 1.9.5.1 - Added workaround for strange PHP bug in mb_substr() on some servers */
					return rs_wpss_strlen( $string ) === rs_wpss_strlen( $strtmp ) ? $strtmp : ucfirst( $string );
				} else { return ucfirst( $string ); }
			case 'ucwords':
				return function_exists( 'mb_convert_case' ) ? mb_convert_case( $string, MB_CASE_TITLE, 'UTF-8' ) : ucwords( $string );
				/**
				 *  Note differences in results between ucwords() and this.
				 *  ucwords() will capitalize first characters without altering other characters, whereas this will lowercase everything, but capitalize the first character of each word.
				 *  This works better for our purposes, but be aware of differences.
				 */
			default:
				return $string;
		}
	}

	/**
	 *  Drop-in replacement for native PHP function chmod()
	 *  Provides built-in error correction for $mode
	 *  $mode is input as octal integers to match standard file permissions (644, 755, etc.)
	 *  @dependencies	none
	 *  @used by		...
	 *  @since			1.9.9.8.8
	 *  @reference		http://php.net/manual/en/function.chmod.php
	 */
	static public function chmod( $file, $mode ) {
		@chmod( $file, octdec( $mode ) );
	}

	/**
	 *  Drop-in replacement for native PHP function fileperms()
	 *  Provides built-in error correction for $mode
	 *	@dependencies	none
	 *  @used by		...
	 *  @since			1.9.9.8.8
	 *	@return			integer
	 *  @reference		http://php.net/manual/en/function.fileperms.php
	 *  @reference		https://codex.wordpress.org/Changing_File_Permissions
	 */
	static public function fileperms( $path, $clear_cache = TRUE ) {
		if( FALSE !== $clear_cache ) { @clearstatcache(); }
		return (int) decoct( @fileperms( $path ) & 0777 );
	}

	/**
	 *  Use this function instead of json_encode() for compatibility, especially with non-UTF-8 data.
	 *  wp_json_encode() was added in WP ver 4.1
	 *  @dependencies	WPSS_Utils::is_wp_ver()
	 *  @used by		...
	 *  @since			1.9.8.4 as rs_wpss_json_encode()
	 *  @moved			1.9.9.8.2 to WPSS_PHP class
	 *  @reference		http://php.net/manual/en/function.fileperms.php
	 *  @reference		https://developer.wordpress.org/reference/functions/wp_json_encode/
	 */
	static public function json_encode( $data, $options = 0, $depth = 512 ) {
		return ( function_exists( 'wp_json_encode' ) && self::is_wp_ver('4.1') ) ? wp_json_encode( $data, $options, $depth ) : json_encode( $data, $options );
	}

}



class WPSS_Func extends WPSS_PHP {

	/**
	 *  WP-SpamShield Utility Functions Alias Class
	 *  Aliases of PHP function replacements
	 *  Child class of WPSS_PHP; Grandchild class of WPSS_Util
	 *  Child classes: ... 
	 *  @since	1.9.9.8.2
	 */

	function __construct() {
		/**
		 *  Do nothing...for now
		 */
	}

	/**
	 *  Alias of WPSS_PHP::casetrans( 'lower', $string )
	 *  Replaces PHP function strtolower()
	 *  @dependencies	WPSS_PHP::casetrans()
	 *  @used by		...
	 *  @usage			WPSS_Func::lower( $str )
	 *  @since			1.9.9.8.2
	 */
	static public function lower( $str ) {
		return WPSS_PHP::casetrans( 'lower', $str );
	}

	/**
	 *  Alias of WPSS_PHP::casetrans( 'upper', $string )
	 *  Replaces PHP function strtoupper()
	 *  @dependencies	WPSS_PHP::casetrans()
	 *  @used by		...
	 *  @usage			WPSS_Func::upper( $str )
	 *  @since			1.9.9.8.2
	 */
	static public function upper( $str ) {
		return WPSS_PHP::casetrans( 'upper', $str );
	}

	/**
	 *  Alias of WPSS_PHP::casetrans( 'upper', $string )
	 *  Replaces PHP function ucfirst()
	 *  @dependencies	WPSS_PHP::casetrans()
	 *  @used by		...
	 *  @usage			WPSS_Func::ucfirst( $str )
	 *  @since			1.9.9.8.2
	 */
	static public function ucfirst( $str ) {
		return WPSS_PHP::casetrans( 'ucfirst', $str );
	}

	/**
	 *  Alias of WPSS_PHP::casetrans( 'upper', $string )
	 *  Replaces PHP function ucwords()
	 *  @dependencies	WPSS_PHP::casetrans()
	 *  @used by		...
	 *  @usage			WPSS_Func::ucwords( $str )
	 *  @since			1.9.9.8.2
	 */
	static public function ucwords( $str ) {
		return WPSS_PHP::casetrans( 'ucwords', $str );
	}

}

