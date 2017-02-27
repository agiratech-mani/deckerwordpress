<?php
/*
Plugin Name: Portfolio Slideshow Pro
Plugin URI: http://momnt.co/downloads/portfolio-slideshow-pro
Description: A flexible and easy to use slideshow plugin.
Author: momnt
Version: 1.9.1
Author URI: http://momnt.co
.
Copyright 2013 George Gecewicz (email : hi@momnt.co)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA. */


define( 'PORTFOLIO_SLIDESHOW_PRO_PATH', plugin_dir_path( __FILE__ ) );
define( 'PORTFOLIO_SLIDESHOW_PRO_LOCATION', plugin_basename(__FILE__) );
define( 'PORTFOLIO_SLIDESHOW_PRO_URL', plugins_url( '' ,  __FILE__ ) );
define( 'PORTFOLIO_SLIDESHOW_PRO_VERSION', '1.9.1' );

/* for auto-updating via eddSL  */ 
define( 'MOMNT_PSP_STORE_URL', 'http://momnt.co' );
define( 'MOMNT_PSP_ITEM_NAME', 'Portfolio Slideshow Pro' );

load_plugin_textdomain( 'portfolio-slideshow-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );

/* Load our main functions file */
require ( PORTFOLIO_SLIDESHOW_PRO_PATH . 'inc/functions.php'); 

/* Get the admin page if necessary */
if ( is_admin() ) { 
	require( PORTFOLIO_SLIDESHOW_PRO_PATH . 'admin/portfolio-slideshow-admin.php' );
}

if( !class_exists( 'PSP_EDD_SL_Plugin_Updater' ) ) {
    include( PORTFOLIO_SLIDESHOW_PRO_PATH . 'admin/EDD_SL_Plugin_Updater.php' );
}

// retrieve our license key from the DB
$psp_license_key = trim( get_option( 'portfolio_slideshow_pro_license_key' ) );

// setup the updater
$psp_edd_updater = new PSP_EDD_SL_Plugin_Updater( MOMNT_PSP_STORE_URL, __FILE__, array( 
        'version'   => '1.9.1',
        'license'   => $psp_license_key,
        'item_name' => MOMNT_PSP_ITEM_NAME,
        'author'    => 'momnt'
)); ?>