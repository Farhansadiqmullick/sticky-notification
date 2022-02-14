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
	'field' => 'popupcreator_discount_background',
	'label' => 'Discount Background Color',
	'conditions' => array(
		array(
			'field' => 'popupcreator_display',
			'value' => 1,
		   )
		),
));
//display different popup

piklist('field', array(
	'type'    => 'radio',
	'field'   => 'popupcreator_display',
	'label'   => __('PopUp Display', 'popupcreator'),
	'value'   => 1,
	'choices' => array(
		0 => __('Display Only Image', 'popupcreator'),
		1 => __('Display with the MetaData Popup', 'popupcreator')
	)
));
