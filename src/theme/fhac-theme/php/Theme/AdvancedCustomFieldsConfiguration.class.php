<?php 

namespace Theme;

class AdvancedCustomFieldsConfiguration
{

	const HIDE_ACF_UI = true;

	public function __construct()
	{

		if(!function_exists("register_field_group")) return;
		
		if(self::HIDE_ACF_UI)
		{	
		
			define( 'ACF_LITE' , true );
		
		}

		if(function_exists("register_field_group"))
		{
			register_field_group(array (
				'id' => 'acf_about-us',
				'title' => 'About Us',
				'fields' => array (
					array (
						'key' => 'field_5584707cbb36f',
						'label' => 'Doctors',
						'name' => 'doctors',
						'type' => 'repeater',
						'sub_fields' => array (
							array (
								'key' => 'field_55847096bb370',
								'label' => 'First Name',
								'name' => 'first_name',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_558470a8bb371',
								'label' => 'Last Name',
								'name' => 'last_name',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_558470b0bb372',
								'label' => 'Credentials',
								'name' => 'credentials',
								'type' => 'text',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_558470bdbb373',
								'label' => 'Photo',
								'name' => 'photo',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_5584710dbb375',
								'label' => 'Bio',
								'name' => 'bio',
								'type' => 'textarea',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => '',
								'formatting' => 'br',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
					array (
						'key' => 'field_558470cbbb374',
						'label' => 'Technicians',
						'name' => 'technicians',
						'type' => 'repeater',
						'sub_fields' => array (
							array (
								'key' => 'field_55847130bb376',
								'label' => 'First Name',
								'name' => 'first_name',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5584713abb377',
								'label' => 'Last Name',
								'name' => 'last_name',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5584714fbb379',
								'label' => 'Photo',
								'name' => 'photo',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_55847141bb378',
								'label' => 'Bio',
								'name' => 'bio',
								'type' => 'textarea',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => '',
								'formatting' => 'br',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
					array (
						'key' => 'field_5584719ef2932',
						'label' => 'Support Team',
						'name' => 'support_team',
						'type' => 'repeater',
						'sub_fields' => array (
							array (
								'key' => 'field_5584719ef2933',
								'label' => 'First Name',
								'name' => 'first_name',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5584719ef2934',
								'label' => 'Last Name',
								'name' => 'last_name',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_5584719ef2935',
								'label' => 'Photo',
								'name' => 'photo',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_5584719ef2936',
								'label' => 'Bio',
								'name' => 'bio',
								'type' => 'textarea',
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => '',
								'formatting' => 'br',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'table',
						'button_label' => 'Add Row',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'template-about-us.php',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => 0,
			));
		}

		if(function_exists("register_field_group"))
		{
			register_field_group(array (
				'id' => 'acf_page-sections',
				'title' => 'Page Sections',
				'fields' => array (
					array (
						'key' => 'field_559ebed1e516f',
						'label' => 'Page Sections',
						'name' => 'page-sections',
						'type' => 'repeater',
						'instructions' => 'Add page sections',
						'sub_fields' => array (
							array (
								'key' => 'field_559ebee7e5170',
								'label' => 'Title',
								'name' => 'title',
								'type' => 'text',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_559ec0a9b1cb6',
								'label' => 'Banner',
								'name' => 'banner',
								'type' => 'image',
								'column_width' => '',
								'save_format' => 'object',
								'preview_size' => 'thumbnail',
								'library' => 'all',
							),
							array (
								'key' => 'field_559ebefce5171',
								'label' => 'Anchor',
								'name' => 'anchor',
								'type' => 'text',
								'instructions' => 'All lowercase letters, with no spaces, hyphens allowed.',
								'required' => 1,
								'column_width' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'formatting' => 'html',
								'maxlength' => '',
							),
							array (
								'key' => 'field_559ebf3de5172',
								'label' => 'Content',
								'name' => 'content',
								'type' => 'wysiwyg',
								'column_width' => '',
								'default_value' => '',
								'toolbar' => 'full',
								'media_upload' => 'yes',
							),
						),
						'row_min' => '',
						'row_limit' => '',
						'layout' => 'row',
						'button_label' => 'Add Section',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'template-parent-page.php',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => 0,
			));
		}


	}

}

?>
