<?php

/*
Plugin Name: ACF State Field
Plugin URI: https://github.com/mykebates/ACF-State-Field
Description: Adds a new ACF field option that lists all US states.
Version: 2.0
Author: Myke Bates
Author URI: http://mykebates.com/
Author Email: contact@mykebates.com
License:

  Copyright 2013 Myke Bates (contact@mykebates.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  
*/


function register_fields_state() {
	
	include_once('acfStateField-v4.php');
	
}

add_action('acf/register_fields', 'register_fields_state');	



	
?>