<?php
	
	/**
	 * Load the patterns into arrays.
	 */
	$patterns=array();
	$patterns[0]='none';
	for($i=1; $i<=10; $i++){
		$patterns[]='pattern'.$i.'.jpg';
	}
	
	$carbon_fonts_array = carbon_fonts_array_builder();
	
	$carbon_style_general_options= array( array(
		"name" => "Footer",
		"type" => "title",
	),
	
	array(
		"type" => "open",
		"subtitles"=>array(array("id"=>"style-footer", "name"=>"Footer"))
	),
	
	/* ------------------------------------------------------------------------*
	 * FOOTER
	 * ------------------------------------------------------------------------*/
	
	array(
		"type" => "subtitle",
		"id" => 'style-footer'
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Primary Footer</h3>'
	),
	
	array(
		"name" => "Show Primary Footer?",
		"id" => "carbon_show_primary_footer",
		"type" => "checkbox",
		"std" => 'on'
	),
	
	array(
		"name" => "Background Type",
		"id" => "carbon_footerbg_type",
		"type" => "select",
		"options" => array(array('id'=>'color','name'=>'Color'), array('id'=>'image','name'=>'Image'), array('id'=>'pattern','name'=>'Pattern'), array('id'=>'custom_pattern','name'=>'Custom Pattern')),
		"std" => 'color'
	),
	
	array(
		"name" => "Image",
		"id" => "carbon_footerbg_image",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the image for your footer.'
	),
	
	array(
		"name" => "Color",
		"id" => "carbon_footerbg_color",
		"type" => "color",
		"std" => '101010'
	),
	
	array(
		"name" => "Background Opacity",
		"id" => "carbon_footerbg_color_opacity",
		"type" => "opacity_slider",
		"std" => "100"
	),
	
	array(
		"name" => "Pattern",
		"id" => "carbon_footerbg_pattern",
		"type" => "pattern",
		"options" => $patterns,
		"desc" => 'Here you can choose the pattern for your footer.'
	),
	
	array(
		"name" => "Custom Pattern",
		"id" => "carbon_footerbg_custom_pattern",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the custom pattern for your footer. It will replace the pattern you choose above.'
	),
	
	array(
		"name" => "Borders Color",
		"id" => "carbon_footerbg_borderscolor",
		"type" => "color",
		"std" => '1d1d1d'
	),
	
	array(
		"name" => "Padding Top",
		"id" => "carbon_primary_footer_padding_top",
		"type" => "text",
		"std" => "140px"
	),
	
	array(
		"name" => "Padding Bottom",
		"id" => "carbon_primary_footer_padding_bottom",
		"type" => "text",
		"std" => "140px"
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Primary Footer - Text Colors</h3>'
	),
	
	array(
		"name" => "Links Color",
		"id" => "carbon_footerbg_linkscolor",
		"type" => "color",
		"std" => '929292'
	),
	
	array(
		"name" => "Paragraphs Color",
		"id" => "carbon_footerbg_paragraphscolor",
		"type" => "color",
		"std" => '929292'
	),
	
	array(
		"name" => "Headings Color",
		"id" => "carbon_footerbg_headingscolor",
		"type" => "color",
		"std" => 'f2f2f2'
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Secondary Footer</h3>'
	),
	
	array(
		"name" => "Show Secondary Footer?",
		"id" => "carbon_show_sec_footer",
		"type" => "checkbox",
		"std" => 'on'
	),
	
	array(
		"name" => "Background Type",
		"id" => "carbon_sec_footerbg_type",
		"type" => "select",
		"options" => array(array('id'=>'color','name'=>'Color'), array('id'=>'image','name'=>'Image'), array('id'=>'pattern','name'=>'Pattern'), array('id'=>'custom_pattern','name'=>'Custom Pattern')),
		"std" => 'color'
	),
	
	array(
		"name" => "Image",
		"id" => "carbon_sec_footerbg_image",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the image for your footer.'
	),
	
	array(
		"name" => "Color",
		"id" => "carbon_sec_footerbg_color",
		"type" => "color",
		"std" => 'f7f7f7'
	),
	
	array(
		"name" => "Background Opacity",
		"id" => "carbon_sec_footerbg_color_opacity",
		"type" => "opacity_slider",
		"std" => "100"
	),
	
	array(
		"name" => "Pattern",
		"id" => "carbon_sec_footerbg_pattern",
		"type" => "pattern",
		"options" => $patterns,
		"desc" => 'Here you can choose the pattern for your footer.'
	),
	
	array(
		"name" => "Custom Pattern",
		"id" => "carbon_sec_footerbg_custom_pattern",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the custom pattern for your footer. It will replace the pattern you choose above.'
	),
	
	array(
		"name" => "Padding Top",
		"id" => "carbon_secondary_footer_padding_top",
		"type" => "text",
		"std" => "80px"
	),
	
	array(
		"name" => "Padding Bottom",
		"id" => "carbon_secondary_footer_padding_bottom",
		"type" => "text",
		"std" => "80px"
	),
	
	array(
		"name" => "Social Icons Size",
		"id" => "carbon_sec_footer_social_icons_size",
		"type" => "text",
		"std" => "14px"
	),
	
	array(
		"name" => "Social Icons Color",
		"id" => "carbon_sec_footer_social_icons_color",
		"type" => "color",
		"std" => "101010"
	),
	
	array(
		"name" => "Social Icons Hover Color",
		"id" => "carbon_sec_footer_social_icons_hover_color",
		"type" => "color",
		"std" => "9d9d9d"
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