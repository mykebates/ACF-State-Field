<?php
 /*
Plugin Name: ACF State Field
Plugin URI: https://github.com/mykebates/ACF-State-Field
Description: Adds a new ACF field option that lists all US states.
Version: 1.0
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

if( !class_exists( 'acf_State_Field' ) && class_exists( 'acf_Field' ) ) :

class acf_State_Field extends acf_Field
{

	/*--------------------------------------------------------------------------------------
	*
	*	Constructor
	*	- This function is called when the field class is initalized on each page.
	*	- Here you can add filters / actions and setup any other functionality for your field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function __construct($parent)
	{
		// do not delete!
    	parent::__construct($parent);
    	
    	// set name / title
    	$this->name = 'state'; // variable name (no spaces / special characters / etc)
		$this->title = __("State",'acf'); // field label (Displayed in edit screens)
		
   	}

	
	/*--------------------------------------------------------------------------------------
	*
	*	create_options
	*	- this function is called from core/field_meta_box.php to create extra options
	*	for your field
	*
	*	@params
	*	- $key (int) - the $_POST obejct key required to save the options to the field
	*	- $field (array) - the field object
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_options($key, $field)
	{	
		$field['message'] = isset($field['message']) ? $field['message'] : '';
		?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Message",'acf'); ?></label>
				<p class="description"><?php _e("eg. Show extra content",'acf'); ?></a></p>
			</td>
			<td>
				<?php 
				do_action('acf/create_field', array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][message]',
					'value'	=>	$field['message'],
				));
				?>
			</td>
		</tr>

		<?php
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	create_field
	*	- this function is called on edit screens to produce the html for this field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_field($field)
	{
		$states = array('AL'=>"Alabama", 'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas", 'CA'=>"California", 'CO'=>"Colorado", 'CT'=>"Connecticut", 'DE'=>"Delaware", 'DC'=>"District Of Columbia", 'FL'=>"Florida", 'GA'=>"Georgia", 'HI'=>"Hawaii", 'ID'=>"Idaho", 'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa", 'KS'=>"Kansas", 'KY'=>"Kentucky", 'LA'=>"Louisiana", 'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan", 'MN'=>"Minnesota", 'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana", 'NE'=>"Nebraska", 'NV'=>"Nevada", 'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina", 'ND'=>"North Dakota", 'OH'=>"Ohio", 'OK'=>"Oklahoma", 'OR'=>"Oregon", 'PA'=>"Pennsylvania", 'RI'=>"Rhode Island", 'SC'=>"South Carolina", 'SD'=>"South Dakota", 'TN'=>"Tennessee", 'TX'=>"Texas", 'UT'=>"Utah", 'VT'=>"Vermont", 'VA'=>"Virginia", 'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 'WY'=>"Wyoming");
		$html = '<select id="' . $field['id'] . '" class="' . $field['class'] . '" name="' . $field['name'] . '">';

		foreach ($states as $state => $value) {
			$selected = '';
			if($field['value'] == $state){
				$selected = 'selected="selected"';
			}
			$html .= '<option '.$selected.' value="'.$state.'">'.$value.'</option>';
		}

		$html .= '</select>';

		echo $html;
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value_for_api
	*	- called from your template file when using the API functions (get_field, etc). 
	*	This function is useful if your field needs to format the returned value
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value_for_api($post_id, $field)
	{
		// get value
		$value = $this->get_value($post_id, $field);
		
		// format value
		
		// return value
		return $value;

	}
	
}
endif; //class_exists 'acf_State_Field'


if( !class_exists( 'acf_State_Field_Helper' ) ) :

/*
 * Advanced Custom Fields - Sate Field Helper
 * 
 *
 */
class acf_State_Field_Helper {
	/*
	 * Singleton instance
	 * @var acf_State_Field_Helper
	 *
	 */
	private static $instance;

	/*
	 * Returns the acf_State_Field_Helper singleton
	 * 
	 * <code>$obj = acf_State_Field_Helper::singleton();</code>
	 * @return acf_State_Field_Helper
	 *
	 */
	public static function singleton() 
	{
		if( !isset( self::$instance ) ) 
		{
			$class = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/*
	 * Prevent cloning of the acf_State_Field_Helper object
	 * @internal
	 *
	 */
	private function __clone() 
	{

	}

	/*
	 * Language directory path
	 * 
	 * Used to build the path for WordPress localization files.
	 * @var string
	 *
	 */
	private $lang_dir;

	/*
	 * Constructor
	 *
	 */
	private function __construct() 
	{
		add_action( 'init', array( &$this, 'register_field' ),  5, 0 );
	}

	/*
	 * Registers the Field with Advanced Custom Fields
	 *
	 */
	public function register_field() 
	{
		if( function_exists( 'register_field' ) ) 
		{
			register_field( 'acf_State_Field', __FILE__ );
		}
	}
}
endif; //class_exists 'acf_State_Field_Helper'

//Instantiate the Addon Helper class
acf_State_Field_Helper::singleton();

?>