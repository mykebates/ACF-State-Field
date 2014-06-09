<?php

class acf_field_state extends acf_field {
	
	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options
		
		
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
		$this->label = __('State');
		$this->category = __("Choice",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field. 
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			//'preview_size' => 'thumbnail'
		);
		
		
		// do not delete!
    	parent::__construct();
    	
    	
    	// settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.0.0'
		);

	}
	
	
	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like below) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/
	
	function create_options( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// key is needed in the field names to correctly save the data
		$key = $field['name'];
		
		// Create Field Options HTML
		?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Default State",'acf'); ?></label>
			</td>
			<td>
				<?php
				$states = $this->current_state_list();

				do_action('acf/create_field', array(
					'type'		=>	'select',
					'name'		=>	'fields['.$key.'][default_state]',
					'value'		=>	$field['default_state'],
					'choices'	=>	$states
				));
				
				?>
			</td>
		</tr>
				<?php
		// No further options needed yet
	}
	
	
	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/
	
	function create_field( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the markup?
		
		
		// create Field HTML
		$states = $this->current_state_list();
		$html = '<select id="' . $field['id'] . '" class="' . $field['class'] . '" name="' . $field['name'] . '">';

		foreach ($states as $state => $value) {
			$selected = '';
			if($field['value'] == $state){
				$selected = 'selected="selected"';
			} elseif ( !($field['value']) && $field['default_state'] == $state ) {
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

	function update_field( $field, $post_id )
	{
		// Note: This function can be removed if not used
		return $field;
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
