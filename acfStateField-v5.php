<?php

class acf_field_state extends acf_field {
				
	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function __construct()
	{
		// vars
		$this->name = 'state';
		$this->label = __('State', 'acf-state');
		$this->category = 'choice'; // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field. 
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			'state' => 'Alabama'
		);
		
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> __('Error! Please select a state.', 'acf-state'),
		);

		// do not delete!
    	parent::__construct();
    	
	}
		/*
	*  render_field_settings()
	*
	*  Create extra settings for your field. These are visible when editing a field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field_settings( $field ) {
		
		/*
		*  acf_render_field_setting
		*
		*  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
		*  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
		*
		*  More than one setting can be added by copy/paste the above code.
		*  Please note that you must also have a matching $defaults value for the field name (font_size)
		*/
		$states = $this->current_state_list();

		acf_render_field_setting( $field, array(
			'label'			=> __('State','acf-state'),
			'instructions'	=> __('Select a State','acf-state'),
			'type'			=> 'select',
			'name'			=> 'state',
			'value'		=>	'',
			'choices'	=>	$states
		));

	}
	
	
	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field (array) the $field being rendered
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field (array) the $field being edited
	*  @return	n/a
	*/
	
	function render_field( $field ) {
		
		
		/*
		*  Review the data of $field.
		*  This will show what data is available
		*/
		
		/*echo '<pre>';
			print_r( $field );
		echo '</pre>';
		*/
		
		/*
		*  Create a simple text input using the 'font_size' setting.
		*/
		
		
		$states = $this->current_state_list();
		$html = '<select id="' . $field['id'] . '" class="' . $field['class'] . '" name="' . $field['name'] . '">';

		foreach ($states as $state => $value) {
			$selected = '';
			if($field['value'] == $state){
				$selected = 'selected="selected"';
			} elseif ( !($field['value']) && $this->defaults == $state ) {
				$selected = 'selected="selected"';
			}
			$html .= '<option '.$selected.' value="'.$state.'">'.$value.'</option>';
		}

		$html .= '</select>';
		?>
		<div>
			<?php echo $html; ?>
		</div>
		<?php
	}
	
	

	/*
	*  load_value()
	*
		*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value found in the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$value - the value to be saved in the database
	*/
	
	function load_value( $value, $post_id, $field )
	{
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is updated in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value which will be saved in the database
	*  @param	$post_id - the $post_id of which the value will be saved
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$value - the modified value
	*/
	
	function update_value( $value, $post_id, $field )
	{
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  format_value()
	*
	*  This filter is applied to the $value after it is loaded from the db and before it is passed to the create_field action
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value( $value, $post_id, $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the $value?
		
		
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  format_value_for_api()
	*
	*  This filter is applied to the $value after it is loaded from the db and before it is passed back to the API functions such as the_field
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value_for_api( $value, $post_id, $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the $value?
		
		
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$field - the field array holding all the field options
	*/
	
	function load_field( $field )
	{
		// Note: This function can be removed if not used
		return $field;
	}
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*  @param	$post_id - the field group ID (post_type = acf)
	*
	*  @return	$field - the modified field
	*/

	/*
	*  delete_field()
	*
	*  This action is fired after a field is deleted from the database
	*
	*  @type	action
	*  @date	11/02/2014
	*  @since	5.0.0
	*
	*  @param	$field (array) the field array holding all the field options
	*  @return	n/a
	*/
	
	
	
	function delete_field( $field ) {
				
	}	


	function current_state_list() {

		$states = array(
			'AL'=>__("Alabama"), 
			'AK'=>__("Alaska"), 
			'AZ'=>__("Arizona"), 
			'AR'=>__("Arkansas"), 
			'CA'=>__("California"), 
			'CO'=>__("Colorado"), 
			'CT'=>__("Connecticut"), 
			'DE'=>__("Delaware"), 
			'DC'=>__("District Of Columbia"), 
			'FL'=>__("Florida"), 
			'GA'=>__("Georgia"), 
			'HI'=>__("Hawaii"), 
			'ID'=>__("Idaho"), 
			'IL'=>__("Illinois"), 
			'IN'=>__("Indiana"), 
			'IA'=>__("Iowa"), 
			'KS'=>__("Kansas"), 
			'KY'=>__("Kentucky"), 
			'LA'=>__("Louisiana"), 
			'ME'=>__("Maine"), 
			'MD'=>__("Maryland"), 
			'MA'=>__("Massachusetts"), 
			'MI'=>__("Michigan"), 
			'MN'=>__("Minnesota"), 
			'MS'=>__("Mississippi"), 
			'MO'=>__("Missouri"), 
			'MT'=>__("Montana"), 
			'NE'=>__("Nebraska"), 
			'NV'=>__("Nevada"), 
			'NH'=>__("New Hampshire"), 
			'NJ'=>__("New Jersey"), 
			'NM'=>__("New Mexico"), 
			'NY'=>__("New York"), 
			'NC'=>__("North Carolina"), 
			'ND'=>__("North Dakota"), 
			'OH'=>__("Ohio"), 
			'OK'=>__("Oklahoma"), 
			'OR'=>__("Oregon"), 
			'PA'=>__("Pennsylvania"), 
			'RI'=>__("Rhode Island"), 
			'SC'=>__("South Carolina"), 
			'SD'=>__("South Dakota"), 
			'TN'=>__("Tennessee"), 
			'TX'=>__("Texas"), 
			'UT'=>__("Utah"), 
			'VT'=>__("Vermont"), 
			'VA'=>__("Virginia"), 
			'WA'=>__("Washington"), 
			'WV'=>__("West Virginia"), 
			'WI'=>__("Wisconsin"), 
			'WY'=>__("Wyoming"),
			);

		return $states; 
	}
	
}


// create field
new acf_field_state();

?>
