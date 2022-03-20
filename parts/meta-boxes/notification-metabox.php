<?php
/*
Title: Sticky Topbar Settings
Post Type: sticky-topbar
*/
piklist('field', array(
	'type' => 'file', 'field' => 'sticky_topbar_left_image_field', 'scope' => 'post_meta', 'label' => 'Left Image', 'options' => array(
		'modal_title' => 'Upload Image(s)', 'button' => 'Upload'
	)
));

piklist('field', array(
	'type' => 'file', 'field' => 'sticky_topbar_right_image_field', 'scope' => 'post_meta', 'label' => 'Right Image', 'options' => array(
		'modal_title' => 'Upload Image(s)', 'button' => 'Upload'
	)
	));

piklist('field', array(
	'type' => 'file', 'field' => 'sticky_token1_image', 'scope' => 'post_meta', 'label' => 'Token 1 Image', 'options' => array(
		'modal_title' => 'Upload Image(s)', 'button' => 'Upload'
	)
));

piklist('field', array(
	'type' => 'file', 'field' => 'sticky_token2_image', 'scope' => 'post_meta', 'label' => 'Token 2 Image', 'options' => array(
		'modal_title' => 'Upload Image(s)', 'button' => 'Upload'
	)
));

piklist('field', array(
	'type' => 'file', 'field' => 'offer_sticker1', 'scope' => 'post_meta', 'label' => 'Offer Sticker1 Image', 'options' => array(
		'modal_title' => 'Upload Image(s)', 'button' => 'Upload'
	)
));

piklist('field', array(
	'type' => 'file', 'field' => 'offer_sticker2', 'scope' => 'post_meta', 'label' => 'Offer Sticker2 Image', 'options' => array(
		'modal_title' => 'Upload Image(s)', 'button' => 'Upload'
	)
));



piklist('field', array(
    'type' => 'url',
    'field' => 'sticky_topbar_offer_url',
    'label' => 'Offer URL',
  ));

piklist('field', array(
	'type'  => 'text',
	'field' => 'popupcreator_discount_text',
	'label' => __('Discount Text', 'popupcreator'),
	'conditions' => array(
		array(
			'field' => 'popupcreator_display',
			'value' => 1,
		   )
		),
));

piklist('field', array(
	'type' => 'colorpicker',
	'field' => 'sticky_bg_color',
	'label' => 'Sticky Left Color',
	'conditions' => array(
		array(
			'field' => 'sticky_metadata_display',
			'value' => 1,
		   )
		),
));

piklist('field', array(
	'type' => 'colorpicker',
	'field' => 'sticky_middle_color',
	'label' => 'Sticky Middle Color',
	'conditions' => array(
		array(
			'field' => 'sticky_metadata_display',
			'value' => 1,
		   )
		),
));


piklist('field', array(
	'type' => 'colorpicker',
	'field' => 'sticky_right_bg_color',
	'label' => 'Sticky Right Color',
	'conditions' => array(
		array(
			'field' => 'sticky_metadata_display',
			'value' => 1,
		   )
		),
));
piklist('field', array(
	'type' => 'colorpicker',
	'field' => 'sticky_topbar_timer_color',
	'label' => 'Sticky Topbar Timer Color',
	'conditions' => array(
		array(
			'field' => 'sticky_metadata_display',
			'value' => 1,
		   )
		),
));



//display different popup

piklist('field', array(
	'type'    => 'radio',
	'field'   => 'sticky_metadata_display',
	'label'   => __('PopUp Display', 'popupcreator'),
	'value'   => 1,
	'choices' => array(
		0 => __('Display Only Image', 'popupcreator'),
		1 => __('Display with the MetaData Popup', 'popupcreator')
	)
));
