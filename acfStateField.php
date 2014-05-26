<?php

/*
Plugin Name: Advanced Custom Fields State
Plugin URI: http://github.com/drebbits/acf-child_field
Description: A field type for ACF populates drop down with states.
Version: 1.0.0
Author: Dreb Bits & Myke Bates
Author URI: http://drebbits.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


function register_fields_state() {
	
	include_once('acfStateField-v4.php');
	
}

add_action('acf/register_fields', 'register_fields_state');	



	
?>