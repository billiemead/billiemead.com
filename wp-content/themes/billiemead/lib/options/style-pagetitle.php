<?php
	
	$revsliders = carbon_get_created_camera_sliders();

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
		"name" => "Page Title",
		"type" => "title",
	),
	
	array(
		"type" => "open",
		"subtitles"=>array(array("id"=>"pagetitle", "name"=>"Page Title"), array("id"=>"shop_pagetitle", "name"=>"WooCommerce Page Title"))
	),
	
	/* ------------------------------------------------------------------------*
	 * Page Title
	 * ------------------------------------------------------------------------*/
	
	array(
		"type" => "subtitle",
		"id" => 'pagetitle'
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Page Title Background</h3>'
	),
	
	array(
		"name" => "Background Type",
		"id" => "carbon_header_type",
		"type" => "select",
		"options" => array(array('id'=>'without', 'name'=>'Without Page Title'), array('id'=>'color','name'=>'Color'), array('id'=>'image','name'=>'Image'), array('id'=>'pattern','name'=>'Pattern'), array('id'=>'custom_pattern','name'=>'Custom Pattern'), array('id' => 'banner', 'name' => 'Banner Slider')),
		"std" => 'color'
	),
	
	array(
		"name" => "Image",
		"id" => "carbon_header_image",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the image for your header.',
		"std" => ""
	),
	
	array(
		"name" => "Parallax ?",
		"id" => "carbon_pagetitle_image_parallax",
		"type" => "checkbox",
		"std" => "off",
	),
	
	array(
		"name" => "Overlay ?",
		"id" => "carbon_pagetitle_image_overlay",
		"type" => "checkbox",
		"std" => "off"
	),
	
	array(
		"name" => "Overlay Type",
		"id" => "carbon_pagetitle_overlay_type",
		"type" => "select",
		"options" => array(array('id'=>'color', 'name'=>'Color'), array('id'=>'pattern','name'=>'Pattern')),
		"std" => 'color',
	),
	
	array(
		"name" => "Overlay Color",
		"id" => "carbon_pagetitle_overlay_color",
		"type" => "color",
		"std" => ""
	),
	
	array(
		"name" => "Overlay Pattern",
		"id" => "carbon_pagetitle_overlay_pattern",
		"type" => "pattern",
		"options" => $patterns,
	),
	
	array(
		"name" => "Overlay Opacity",
		"id" => "carbon_pagetitle_overlay_opacity",
		"type" => "opacity_slider",
		"std" => "100"
	),
	
	array(
		"name" => "Color",
		"id" => "carbon_header_color",
		"type" => "color",
		"std" => "f2f2f2"
	),
	
	array(
		"name" => "Background Opacity",
		"id" => "carbon_header_opacity",
		"type" => "opacity_slider",
		"std" => "100"
	),
	
	array(
		"name" => "Pattern",
		"id" => "carbon_header_pattern",
		"type" => "pattern",
		"options" => $patterns,
		"desc" => 'Here you can choose the pattern for your header.',
		"std" => "pattern5.jpg"
	),
	
	array(
		"name" => "Custom Pattern",
		"id" => "carbon_header_custom_pattern",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the custom pattern for your header. It will replace the pattern you choose above.'
	),
	
	array(
		"name" => "Banner Slider",
		"id" => "carbon_banner_slider",
		"type" => "select",
		"options" => $revsliders
	),
	
	array(
		"name" => "Page Title Padding",
		"id"=> "carbon_page_title_padding",
		"type" => "text",
		"std" => "150px",
		"desc" => 'Value for the padding must be set in pixels'
	),
	
	array(
		"name" => "Elements Alignment",
		"id"=> "carbon_header_text_alignment",
		"type" => "select",
		"std" => "center",
		"options" => array(array("id"=>"left", "name"=>"Left"), array("id"=>"center", "name"=>"Center"), array("id"=>"right", "name"=>"Right"), array("id"=>"titlesleftcrumbsright", "name"=>"Left: Titles, Right: Breadcrumbs"), array("id"=>"titlesrightcrumbsleft", "name"=>"Left: Breadcrumbs, Right: Titles"))
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Primary Title</h3>'
	),
	
	array(
		"name" => "Display Title",
		"id" => "carbon_hide_pagetitle",
		"type" => "checkbox",
		"std" => "on"
	),
	
	array(
		"name" => "Primary Title Font",
		"id" => "carbon_header_text_font",
		"type" => "select",
		"options" => $carbon_fonts_array,
		"desc" => 'You can select one of the fonts that the theme goes with or you can add google fonts (Style Options > Fonts).',
		"std" => 'Helvetica Neue'
	),
	
	array(
		"name" => "Primary Title Color",
		"id" => "carbon_header_text_color",
		"type" => "color",
		"std" => "383838"
	),
	
	array(
		"name" => "Primary Title Size",
		"id" => "carbon_header_text_size",
		"type" => "slider",
		"std" => "40px"
	),
	
	array(
		"name" => "Primary Title Margin",
		"id" => "carbon_header_text_margin_top",
		"type" => "text",
		"std" => "50px"
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Secondary Title</h3>'
	),
	
	array(
		"name" => "Display Title",
		"id" => "carbon_hide_sec_pagetitle",
		"type" => "checkbox",
		"std" => "on"
	),
	
	array(
		"name" => "Secondary Title Font",
		"id" => "carbon_secondary_title_font",
		"type" => "select",
		"options" => $carbon_fonts_array,
		"desc" => 'You can select one of the fonts that the theme goes with or you can add google fonts (Style Options > Fonts).',
		"std" => 'Helvetica Neue'
	),
	
	array(
		"name" => "Secondary Title Text Color",
		"id" => "carbon_secondary_title_text_color",
		"type" => "color",
		"std" => "A0A0A2"
	),
	
	array(
		"name" => "Secondary Title Text Size",
		"id" => "carbon_secondary_title_text_size",
		"type" => "slider",
		"std" => "17px"
	),
	
	array(
		"name" => "Secondary Title Margin",
		"id" => "carbon_header_sec_text_margin_top",
		"type" => "text",
		"std" => "15px"
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Breadcrumbs</h3>'
	),
	
	array(
		"name" => "Breadcrumbs",
		"id" => "carbon_breadcrumbs",
		"type" => "checkbox",
		"std" => "off"
	),
	
	array(
		"name" => "Breadcrumbs Font",
		"id" => "carbon_breadcrumbs_font",
		"type" => "select",
		"options" => $carbon_fonts_array,
		"desc" => 'You can select one of the fonts that the theme goes with or you can add google fonts (Style Options > Fonts).',
		"std" => 'Helvetica Neue'
	),
	
	array(
		"name" => "Breadcrumbs Text Color",
		"id" => "carbon_breadcrumbs_color",
		"type" => "color",
		"std" => "ffffff"
	),
	
	array(
		"name" => "Breadcrumbs Text Size",
		"id" => "carbon_breadcrumbs_size",
		"type" => "slider",
		"std" => "12px"
	),
	
	array(
		"name" => "Breadcrumbs Margin Top",
		"id" => "carbon_breadcrumbs_text_margin_top",
		"type" => "text",
		"std" => "30px"
	),
	
	array(
		"type" => "close"
	),
	
	
	
	
	
	/* ------------------------------------------------------------------------*
	 * Page Title
	 * ------------------------------------------------------------------------*/
	
	array(
		"type" => "subtitle",
		"id" => 'shop_pagetitle'
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>WooCommerce Page Title Background</h3>'
	),
	
	array(
		"name" => "Background Type",
		"id" => "carbon_header_type_shop",
		"type" => "select",
		"options" => array(array('id'=>'without', 'name'=>'Without Page Title'), array('id'=>'color','name'=>'Color'), array('id'=>'image','name'=>'Image'), array('id'=>'pattern','name'=>'Pattern'), array('id'=>'custom_pattern','name'=>'Custom Pattern'), array('id' => 'banner', 'name' => 'Banner Slider')),
		"std" => 'color'
	),
	
	array(
		"name" => "Image",
		"id" => "carbon_header_image_shop",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the image for your header.',
		"std" => ""
	),
	
	array(
		"name" => "Parallax ?",
		"id" => "carbon_pagetitle_image_parallax_shop",
		"type" => "checkbox",
		"std" => "off",
	),
	
	array(
		"name" => "Overlay ?",
		"id" => "carbon_pagetitle_image_overlay_shop",
		"type" => "checkbox",
		"std" => "off"
	),
	
	array(
		"name" => "Overlay Type",
		"id" => "carbon_pagetitle_overlay_type_shop",
		"type" => "select",
		"options" => array(array('id'=>'color', 'name'=>'Color'), array('id'=>'pattern','name'=>'Pattern')),
		"std" => 'color',
	),
	
	array(
		"name" => "Overlay Color",
		"id" => "carbon_pagetitle_overlay_color_shop",
		"type" => "color",
		"std" => ""
	),
	
	array(
		"name" => "Overlay Pattern",
		"id" => "carbon_pagetitle_overlay_pattern_shop",
		"type" => "pattern",
		"options" => $patterns,
	),
	
	array(
		"name" => "Overlay Opacity",
		"id" => "carbon_pagetitle_overlay_opacity_shop",
		"type" => "opacity_slider",
		"std" => "100"
	),
	
	array(
		"name" => "Color",
		"id" => "carbon_header_color_shop",
		"type" => "color",
		"std" => "f5f5f5"
	),
	
	array(
		"name" => "Background Opacity",
		"id" => "carbon_header_opacity_shop",
		"type" => "opacity_slider",
		"std" => "100"
	),
	
	array(
		"name" => "Pattern",
		"id" => "carbon_header_pattern_shop",
		"type" => "pattern",
		"options" => $patterns,
		"desc" => 'Here you can choose the pattern for your header.'
	),
	
	array(
		"name" => "Custom Pattern",
		"id" => "carbon_header_custom_pattern_shop",
		"type" => "upload_from_media",
		"desc" => 'Here you can choose the custom pattern for your header. It will replace the pattern you choose above.'
	),
	
	array(
		"name" => "Banner Slider",
		"id" => "carbon_banner_slider_shop",
		"type" => "select",
		"options" => $revsliders
	),
	
	array(
		"name" => "Page Title Padding",
		"id"=> "carbon_page_title_padding_shop",
		"type" => "text",
		"std" => "150px",
		"desc" => 'Value for the padding must be set in pixels'
	),
	
	array(
		"name" => "Elements Alignment",
		"id"=> "carbon_header_text_alignment_shop",
		"type" => "select",
		"std" => "center",
		"options" => array(array("id"=>"left", "name"=>"Left"), array("id"=>"center", "name"=>"Center"), array("id"=>"right", "name"=>"Right"), array("id"=>"titlesleftcrumbsright", "name"=>"Left: Titles, Right: Breadcrumbs"), array("id"=>"titlesrightcrumbsleft", "name"=>"Left: Breadcrumbs, Right: Titles"))
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Primary Title</h3>'
	),
	
	array(
		"name" => "Display Title",
		"id" => "carbon_hide_pagetitle_shop",
		"type" => "checkbox",
		"std" => "on"
	),
	
	array(
		"name" => "Primary Title Font",
		"id" => "carbon_header_text_font_shop",
		"type" => "select",
		"options" => $carbon_fonts_array,
		"desc" => 'You can select one of the fonts that the theme goes with or you can add google fonts (Style Options > Fonts).',
		"std" => 'Helvetica Neue'
	),
	
	array(
		"name" => "Primary Title Color",
		"id" => "carbon_header_text_color_shop",
		"type" => "color",
		"std" => "383838"
	),
	
	array(
		"name" => "Primary Title Size",
		"id" => "carbon_header_text_size_shop",
		"type" => "slider",
		"std" => "40px"
	),
	
	array(
		"name" => "Primary Title Margin",
		"id" => "carbon_header_text_margin_top_shop",
		"type" => "text",
		"std" => "50px"
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Secondary Title</h3>'
	),
	
	array(
		"name" => "Display Title",
		"id" => "carbon_hide_sec_pagetitle_shop",
		"type" => "checkbox",
		"std" => "on"
	),
	
	array(
		"name" => "Secondary Title Font",
		"id" => "carbon_secondary_title_font_shop",
		"type" => "select",
		"options" => $carbon_fonts_array,
		"desc" => 'You can select one of the fonts that the theme goes with or you can add google fonts (Style Options > Fonts).',
		"std" => 'Helvetica Neue'
	),
	
	array(
		"name" => "Secondary Title Text Color",
		"id" => "carbon_secondary_title_text_color_shop",
		"type" => "color",
		"std" => "A0A0A2"
	),
	
	array(
		"name" => "Secondary Title Text Size",
		"id" => "carbon_secondary_title_text_size_shop",
		"type" => "slider",
		"std" => "17px"
	),
	
	array(
		"name" => "Secondary Title Margin",
		"id" => "carbon_header_sec_text_margin_top_shop",
		"type" => "text",
		"std" => "25px"
	),
	
	array(
		"type" => "documentation",
		"text" => '<h3>Breadcrumbs</h3>'
	),
	
	array(
		"name" => "Breadcrumbs",
		"id" => "carbon_breadcrumbs_shop",
		"type" => "checkbox",
		"std" => "off"
	),
	
	array(
		"name" => "Breadcrumbs Font",
		"id" => "carbon_breadcrumbs_font_shop",
		"type" => "select",
		"options" => $carbon_fonts_array,
		"desc" => 'You can select one of the fonts that the theme goes with or you can add google fonts (Style Options > Fonts).',
		"std" => 'Helvetica Neue'
	),
	
	array(
		"name" => "Breadcrumbs Text Color",
		"id" => "carbon_breadcrumbs_color_shop",
		"type" => "color",
		"std" => "ffffff"
	),
	
	array(
		"name" => "Breadcrumbs Text Size",
		"id" => "carbon_breadcrumbs_size_shop",
		"type" => "slider",
		"std" => "12px"
	),
	
	array(
		"name" => "Breadcrumbs Margin Top",
		"id" => "carbon_breadcrumbs_text_margin_top_shop",
		"type" => "text",
		"std" => "30px"
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