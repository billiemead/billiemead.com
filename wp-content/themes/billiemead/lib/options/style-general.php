<?php
	
	$colors = array('26ade4', '7dc771', 'F15A23', 'd63b33', 'EDB44D', 'FF005A', '9e4d9e', '5a7c96', '10b9b9', '50CCB3', '91683d', '3691ad', 'c1c1c1');
	
	$carbon_style_general_options= array( array(
		"name" => "General",
		"type" => "title"
	),
	
	array(
		"type" => "open",
		"subtitles"=>array(array("id"=>"general", "name"=>"General"))
	),
	
	/* ------------------------------------------------------------------------*
	 * GENERAL
	 * ------------------------------------------------------------------------*/
	
	array(
		"type" => "subtitle",
		"id" => 'general'
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Global Style Color</h3>'
	),
	
	array(
		"name" => "Suggested Color",
		"id" => "carbon_style_defcolor",
		"type" => "stylecolor",
		"options" => $colors
	),
	
	array(
		"name" => "Custom Style Color",
		"id" => "carbon_style_color",
		"type" => "color",
		"params" => "no-main-color",
		"std" => "c1c1c1"
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Layout Options</h3>"
	),
	
	array(
		"name" => "Layout Style",
		"id" => "carbon_body_type",
		"type" => "select",
		"options" => array(array('id'=>'body_wide','name'=>'Wide Layout'), array('id'=>'body_boxed','name'=>'Boxed Layout')),
		"std" => 'body_wide'
	),
	
	array(
		"name" => "Body Background Style",
		"id" => "carbon_bodybg_type",
		"type" => "select",
		"options" => array(array('id'=>'color','name'=>'Color'), array('id'=>'image','name'=>'Image')),
		"std" => 'color'
	),
	
	array(
		"name" => "Image",
		"id" => "carbon_bodybg_type_image",
		"type" => "upload_from_media",
	),
	
	array(
		"name" => "Color",
		"id" => "carbon_bodybg_type_color",
		"type" => "color",
		"std" => 'ffffff'
	),
	
	
	array(
		"type" => "close"
	),
	
	/*close array*/
	
	array(
		"type" => "close"
	));
	
	carbon_add_style_options($carbon_style_general_options);
	
?>