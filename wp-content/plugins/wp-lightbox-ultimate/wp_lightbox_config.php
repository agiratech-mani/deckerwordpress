<?php
class WP_Lightbox_Config
{
    var $configs;
    static $_this;

    function loadConfig(){
        $this->configs = get_option('wp_lightbox_configs_v2');
        if(empty($this->configs)){
        $lbu_raw_configs = get_option('wp_lightbox_configs');    
            if(is_string($lbu_raw_configs))
                    $this->configs = unserialize($lbu_raw_configs);
            else
                    $this->configs = unserialize((string)$lbu_raw_configs);
        }
        if(empty($this->configs)){$this->configs = array();}
    }
	
    function getValue($key){
    	return isset($this->configs[$key])?$this->configs[$key] : '';    	
    }
    
    function setValue($key, $value){
    	$this->configs[$key] = $value;
    }
    function saveConfig(){
    	update_option('wp_lightbox_configs', serialize($this->configs) );
    	update_option('wp_lightbox_configs_v2', $this->configs);
    }
    function addValue($key, $value){
    	if (array_key_exists($key, $this->configs))
    	{
    		//Don't update the value for this key
    	}
    	else
    	{
    		//It is save to update the value for this key
    		$this->configs[$key] = $value;
    	}
    }
    static function getInstance(){
    	if(empty(self::$_this)){
    		self::$_this = new WP_Lightbox_Config();
    		self::$_this->loadConfig();
    		return self::$_this;
    	}
    	return self::$_this;
    } 
}
