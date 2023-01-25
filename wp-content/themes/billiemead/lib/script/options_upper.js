jQuery(document).ready(function($){ 
	"use strict";
	/* custom css */
	var _default_custom_css = jQuery('#enable_custom_css').val();
	jQuery('#enable_custom_css').change(function(){
		if (jQuery('#enable_custom_css').val() == "on"){
			jQuery('#enable_custom_css').closest('.option').next().next().fadeIn(500);
		} else {
			jQuery('#enable_custom_css').closest('.option').next().next().fadeOut(500);
		} 
	}).trigger('change');
	
	/* website loader options */
	var _default_website_loader = jQuery('#carbon_enable_website_loader').val();
	jQuery('#carbon_enable_website_loader').change(function(){
		if (jQuery('#carbon_enable_website_loader').val() == "on"){
			jQuery('.loaders-styles-holder').removeAttr('hidden');
			jQuery('#carbon_website_loader').closest('.option').add(jQuery('#carbon_enable_website_loader_percentage').closest('.option')).fadeIn(500);
		} else {
			jQuery('#carbon_website_loader').closest('.option').add(jQuery('#carbon_enable_website_loader_percentage').closest('.option')).fadeOut(500);
		}
	}).trigger('change');
	
	
	/* body boxed layout options */
	jQuery('#carbon_bodybg_type').change(function(){
		if (jQuery(this).val() == 'image') {
			jQuery('#upload-carbon_bodybg_type_image').closest('.option').fadeIn(500);
			jQuery('#carbon_bodybg_type_color').closest('.option').fadeOut(500);
		} else {
			jQuery('#upload-carbon_bodybg_type_image').closest('.option').fadeOut(500);
			jQuery('#carbon_bodybg_type_color').closest('.option').fadeIn(500);
		}
	}).trigger('change');
	
	jQuery('#carbon_body_type').change(function(){
		if (jQuery(this).val() == 'body_boxed'){
			jQuery('#carbon_bodybg_type').trigger('change').closest('.option').fadeIn(500);
		} else {
			jQuery(this).closest('.option').nextAll().fadeOut(500);
		}
	}).trigger('change');
	
	/* footer custom text editor */
	var submiter = jQuery('.textarea_wysiwyg_container input#submit');
		submiter.css('display','none');
	jQuery(document).on('click', 'input.save-button', function(){ submiter.trigger('click'); });
		
	/* headers and menus */
	if (jQuery('.carbon_fixed_menu').html() == 'on' && jQuery('.carbon_header_shrink_effect').html() == 'on' && jQuery('.carbon_header_after_scroll').html() == 'on'){
		jQuery('#carbon_logo_after_scroll_size').closest('.option').prev().nextAll().addBack().css('display','block');
		jQuery('#carbon_logo_font').closest('.option').nextUntil(jQuery('#carbon_logo_margin_top').closest('.option')).addBack()
			.add(jQuery('#carbon_logo_after_scroll_size').closest('.option').nextUntil(jQuery('#carbon_logo_after_scroll_margin_top').closest('.option')).addBack())
			.css('display','none');
	} else {
		jQuery('#carbon_logo_after_scroll_size').closest('.option').prev().nextAll().addBack().css('display','none');
		if (jQuery('.carbon_header_after_scroll').html() == 'on'){

		} else {
			jQuery('#carbon_headerbg_after_scroll_type_light').closest('.option').prev().nextAll().addBack().css('display','none');
			jQuery('#carbon_headerbg_after_scroll_type_dark').closest('.option').prev().nextAll().addBack().css('display','none');

		}
	}
	
	/* logo type */
/* 	if (jQuery('.carbon_logo_type.hidden').html() != 'text') */ jQuery('#carbon_logo_font').closest('.option').nextUntil(jQuery('#carbon_logo_margin_top').closest('.option')).addBack()
		.add(jQuery('#carbon_logo_after_scroll_size').closest('.option').nextUntil(jQuery('#carbon_logo_after_scroll_margin_top').closest('.option')).addBack())
		.css('display','none');
	
	if (jQuery('.carbon_header_after_scroll').html() == 'on'){
		//menu
		if (jQuery('.carbon_header_shrink_effect').html() == 'off'){
			jQuery('#carbon_menu_after_scroll_font_size').closest('.option')
				.add(jQuery('#carbon_menu_after_scroll_margin_top').closest('.option'))
				.add(jQuery('#carbon_menu_after_scroll_padding_bottom').closest('.option'))
			.css('display','none');
		}
		//background afterscroll options
		jQuery('#carbon_headerbg_after_scroll_type').change(function(){
			switch (jQuery('#carbon_headerbg_after_scroll_type').val()){
				case "color":
					jQuery('#carbon_headerbg_after_scroll_color').closest('.option')
						.add(jQuery('#carbon_headerbg_after_scroll_opacity').closest('.option'))
					.css('display','block');
					jQuery('#carbon_headerbg_after_scroll_image').closest('.option')
						.add(jQuery('#carbon_headerbg_after_scroll_pattern').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_custom_pattern').closest('.option'))
					.css('display','none');
				break;
				case "image":
					jQuery('#carbon_headerbg_after_scroll_image').closest('.option').css('display','block');
					jQuery('#carbon_headerbg_after_scroll_color').closest('.option')
						.add(jQuery('#carbon_headerbg_after_scroll_pattern').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_custom_pattern').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_opacity').closest('.option'))
					.css('display','none');
				break;
				case "pattern":
					jQuery('#carbon_headerbg_after_scroll_pattern').closest('.option').css('display','block');
					jQuery('#carbon_headerbg_after_scroll_color').closest('.option')
						.add(jQuery('#carbon_headerbg_after_scroll_image').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_custom_pattern').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_opacity').closest('.option'))
					.css('display','none');
				break;
				case "custom_pattern":
					jQuery('#carbon_headerbg_after_scroll_pattern').closest('.option').css('display','block');
					jQuery('#carbon_headerbg_after_scroll_color').closest('.option')
						.add(jQuery('#carbon_headerbg_after_scroll_image').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_custom_pattern').closest('.option'))
						.add(jQuery('#carbon_headerbg_after_scroll_opacity').closest('.option'))
					.css('display','none');
				break;
			}	
		});
		jQuery('#carbon_headerbg_after_scroll_type').trigger('change');	
	} else {
		// no after scroll neither shrink 
		jQuery('#carbon_menu_after_scroll_font_size').closest('.option').prev().nextAll().addBack().css('display','none');
	}

	jQuery('#carbon_social_icons_style_four').closest('.option').next().find('p').appendTo(jQuery('#carbon_social_icons_style_four').closest('.option'));
	jQuery('#carbon_social_icons_style_four').closest('.option').next().remove();
	jQuery('#carbon_social_icons_style_four').siblings('p').css({'clear':'both','float':'left'});

	/*limit portfolio custom permalink*/
	jQuery('#carbon_portfolio_permalink').attr('maxlength',20);
	jQuery('#carbon_portfolio_permalink').closest('.option').next().css({
		'margin-top': '-15px',
		'z-index': 81,
		'background': 'white',
		'border-bottom': '1px solid #EDEDED',
		'color':'#999'
	});

	/* header style type */
	jQuery('#carbon_header_style_type').closest('.option').css('display','none');
	jQuery('#carbon_header_style_type option').each(function(e){
		var alt = "";
		switch(e){
			case 0:
				alt = "ESQ: logo ---- DIR: menu + socials";
			break;
			case 1:
				alt = "ESQ: logo + icons ---- DIR: socials";
			break;
			case 2:
				alt = "CENTER: logo + menu + socials possivelmente (tudo centrado)";
			break;
			case 3:
				alt = "CENTER: metade menu + logo + metade menu";
			break;
		}
		if (jQuery(this).is(':selected')){
			jQuery(this).parents('.sub-navigation-container').append('<div class="screenshot_container selected"><img class="style-'+e+'" src="" alt="'+alt+'" /></div>');
		} else {
			jQuery(this).parents('.sub-navigation-container').append('<div class="screenshot_container"><img class="style-'+e+'" src="" alt="'+alt+'" /></div>');
		}
	});
	jQuery('#carbon_header_style_type').parents('.sub-navigation-container').on("click", "img", function(){
		var idx = jQuery(this).attr('class').split('le-');
		jQuery('#carbon_header_style_type').val( jQuery('#carbon_header_style_type option').eq(idx[1]).val() );
		jQuery(this).parent().addClass('selected').siblings().removeClass('selected');
	});
	/* endof header style type */

	var def_sidebars = jQuery('#sidebar_name_list').html();

	jQuery('#tab_navigation-9-customcss textarea').keydown(function(e) {
	    if(e.keyCode === 9) { // tab was pressed
	        // get caret position/selection
	        var start = this.selectionStart;
	        var end = this.selectionEnd;
	
	        var $this = $(this);
	        var value = $this.val();
	
	        $this.val(value.substring(0, start)
	                    + "\t"
	                    + value.substring(end));
	
	        this.selectionStart = this.selectionEnd = start + 1;
	        e.preventDefault();
	    }
	});

	jQuery('#carbon_export_options_button, #carbon_export_style_options_button').css('top',0).closest('.option').find('br').remove();

	/*panel options*/
	jQuery('#carbon_import_options_button').closest('.option').append('<a class="carbon-button custom-option-button" style="position: relative; float: left; clear: both; margin-top: 20px;" id="carbon_apply_imported_settings_button" ><span>Apply Settings</span></a>');
	jQuery('#carbon_import_options_button').siblings('.carbon-button').on("click", function(){
		var confirm = window.confirm("This will replace all your panel options.\n\rAre you sure?");
		if (confirm==true){
		 	var xmlPath = jQuery('#carbon_import_options').val();
			jQuery.ajax({
				url: "admin-ajax.php",
				dataType: "json",
				type: 'POST',
				data: {
					xmlPath: xmlPath,
					thepath: jQuery('#homePATH').html()!=""?jQuery('#homePATH').html():jQuery('#homePATH2').html(),
					action: 'call_upper_load_settings',
					security: jQuery('#carbon-theme-options').val()
				},
				error: function () {
				
				},
				success: function (c) {
					window.location = window.location;
				}
			});
		}
	});
	jQuery('#carbon_reset_options_button').unbind().css({
		'position':'relative',
		'float':'left',
		'display':'inline-block',
		'clear':'both'
	});
	jQuery('#carbon_reset_options_button').siblings('ul').css('display','none');
	jQuery(document).on('click', '#carbon_reset_options_button', function(e){
		e.stopPropagation();
		e.preventDefault();
		var confirm = window.confirm("Are you sure?");
		if (confirm == true){
		 	var xmlPath = jQuery('#templatepath').html()+"/carbon_original_panel_options.xml";
			jQuery.ajax({
				url: "admin-ajax.php",
				dataType: "json",
				type: 'POST',
				data: {
					xmlPath: xmlPath,
					thepath: jQuery('#homePATH').html()!=""?jQuery('#homePATH').html():jQuery('#homePATH2').html(),
					action: 'call_upper_load_settings',
					upper_action: 'reset',
					security: jQuery('#carbon-theme-options').val()
				},
				error: function () {
				
				},
				success: function (c) {
					window.location = window.location;
				}
			});
	        jQuery(this).siblings('ul').remove();
		} else {
			return false;
		}
	});
	
	/*panel style options*/
	jQuery('#carbon_import_style_options_button').closest('.option').append('<a class="carbon-button custom-option-button" style="position: relative; float: left; clear: both; margin-top: 20px;" id="carbon_apply_imported_style_settings_button" ><span>Apply Settings</span></a>');
	jQuery('#carbon_import_style_options_button').siblings('.carbon-button').on("click", function(){
		var confirm = window.confirm("This will replace all your panel options.\n\rAre you sure?");
		if (confirm==true){
		 	var xmlPath = jQuery('#carbon_import_style_options').val();
			jQuery.ajax({
				url: "admin-ajax.php",
				dataType: "json",
				type: 'POST',
				data: {
					xmlPath: xmlPath,
					thepath: jQuery('#homePATH').html()!=""?jQuery('#homePATH').html():jQuery('#homePATH2').html(),
					action: 'call_upper_load_settings',
					security: jQuery('#carbon-theme-style-options').val()
				},
				error: function () {
				
				},
				success: function (c) {
					window.location = window.location;
				}
			});
		}
	});
	jQuery('#carbon_reset_style_options_button').unbind().css({
		'position':'relative',
		'float':'left',
		'display':'inline-block',
		'clear':'both'
	});
	jQuery('#carbon_reset_style_options_button').siblings('ul').css('display','none');
	jQuery(document).on('click', '#carbon_reset_style_options_button', function(e){
		e.stopPropagation();
		e.preventDefault();
		var confirm = window.confirm("Are you sure?");
		if (confirm == true){
		 	var xmlStylePath = jQuery('#templatepath').html()+"/carbon_original_panel_style_options.xml";
			jQuery.ajax({
				url: "admin-ajax.php",
				dataType: "json",
				type: 'POST',
				data: {
					xmlStylePath: xmlStylePath,
					thepath: jQuery('#homePATH').html()!=""?jQuery('#homePATH').html():jQuery('#homePATH2').html(),
					action: 'call_upper_load_settings',
					upper_action: 'reset',
					security: jQuery('#carbon-theme-style-options').val()
				},
				error: function () {
				
				},
				success: function (c) {
					window.location = window.location;
				}
			});
	        jQuery(this).siblings('ul').remove();
		} else {
			return false;
		}
	});
	
	var _default_menu_add_border = jQuery('#carbon_menu_add_border').val();
	jQuery('#carbon_menu_add_border').change(function(){
		if (jQuery(this).val() == "on"){
			jQuery('#carbon_menu_border_color').closest('.option').fadeIn(500);
		} else {
			jQuery('#carbon_menu_border_color').closest('.option').fadeOut(500);
		}
	}).trigger('change');
	
	var _default_ajax_search = jQuery('#carbon_enable_ajax_search').val();
	jQuery('#carbon_enable_ajax_search').change(function(){
		if (jQuery(this).val() == "on"){
			jQuery('#carbon_search_show_author').closest('.option').prev().nextAll().addBack().fadeIn(500);
		} else jQuery('#carbon_search_show_author').closest('.option').prev().nextAll().addBack().fadeOut(500);
	}).trigger('change');
	
	var _default_search = jQuery('#carbon_enable_search').val();
	jQuery('#carbon_enable_search').change(function(){
		if (jQuery(this).val() == "on" ){
			jQuery(this).closest('.option').nextUntil(jQuery('#carbon_search_sidebars_available').closest('.option').next()).fadeIn(500);
			jQuery('#carbon_enable_ajax_search').trigger('change');
		} else jQuery(this).closest('.option').nextAll().fadeOut(500);
	}).trigger('change');
	
	var _default_footer_display_social_icons = jQuery('#carbon_footer_display_social_icons').val();
	jQuery('#carbon_footer_display_social_icons').change(function(){
		if (jQuery(this).val() == 'on'){
			jQuery('#carbon_footer_social_icons_alignment').closest('.option').fadeIn(500);
		} else {
			jQuery('#carbon_footer_social_icons_alignment').closest('.option').fadeOut(500);
		}
	}).trigger('change');
	
	var _default_footer_display_custom_text = jQuery('#carbon_footer_display_custom_text').val();
	jQuery('#carbon_footer_display_custom_text').change(function(){
		if (jQuery(this).val() == 'on'){
			jQuery('#carbon_footer_custom_text').closest('.option').add(jQuery('#carbon_footer_custom_text_alignment').closest('.option')).fadeIn(500);
		} else {
			jQuery('#carbon_footer_custom_text').closest('.option').add(jQuery('#carbon_footer_custom_text_alignment').closest('.option')).fadeOut(500);
		}
	}).trigger('change');
	
	var _default_footer_display_logo = jQuery('#carbon_footer_display_logo').val();
	jQuery('#carbon_footer_display_logo').change(function(){
		if (jQuery(this).val() == 'on'){
			jQuery(this).closest('.option').nextUntil(jQuery('#carbon_footer_display_social_icons').closest('.option')).css('display','block');
		} else {
			jQuery(this).closest('.option').nextUntil(jQuery('#carbon_footer_display_social_icons').closest('.option')).css('display','none');
		}
	}).trigger('change');
	


	
	var _default_under_construction = jQuery('#carbon_enable_under_construction').val();
	if (_default_under_construction === "on"){
		jQuery('#carbon_under_construction_page').closest('.option').fadeIn(500);
	} else {
		jQuery('#carbon_under_construction_page').closest('.option').fadeOut(500);
	}
	jQuery('#carbon_enable_under_construction').change(function(){
		if (_default_under_construction === "on"){
			jQuery('#carbon_under_construction_page').closest('.option').fadeIn(500);
		} else {
			jQuery('#carbon_under_construction_page').closest('.option').fadeOut(500);
		}		
	});
	
	var _default_animate_thumbnails = jQuery('#carbon_animate_thumbnails').val();
	if (_default_animate_thumbnails === "on"){
		jQuery('#carbon_thumbnails_effect').closest('.option').fadeIn(500);
	} else {
		jQuery('#carbon_thumbnails_effect').closest('.option').fadeOut(500);
	}
	jQuery('#carbon_animate_thumbnails').change(function(){
		if (_default_animate_thumbnails === "on"){
			jQuery('#carbon_thumbnails_effect').closest('.option').fadeIn(500);
		} else {
			jQuery('#carbon_thumbnails_effect').closest('.option').fadeOut(500);
		}
	});
	
	var _default_body_shadow = jQuery('#carbon_body_shadow').val();
	if (_default_body_shadow === "on"){
		jQuery('#carbon_body_shadow').closest('.option').next().fadeIn(500).removeClass('optoff');
	} else {
		jQuery('#carbon_body_shadow').closest('.option').next().fadeOut(500).addClass('optoff');
	}
	jQuery('#carbon_body_shadow').change(function(){
		if (_default_body_shadow === "on"){
			jQuery('#carbon_body_shadow').closest('.option').next().fadeIn(500).removeClass('optoff');
		} else {
			jQuery('#carbon_body_shadow').closest('.option').next().fadeOut(500).addClass('optoff');
		}
	});
	
	//body background type
	var _default_body_background = jQuery('#carbon_body_type').val();
	switch(_default_body_background){
		case "image":
			jQuery('#carbon_body_type').closest('.option').next().next().next().next().fadeOut(500).addClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().next().next().fadeOut(500).addClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().next().fadeOut(500).addClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().fadeIn(500).removeClass('optoff');
			break;
		case "color":
			jQuery('#carbon_body_type').closest('.option').next().next().next().next().fadeOut(500).addClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().next().next().fadeOut(500).addClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().next().fadeIn(500).removeClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().fadeOut(500).addClass('optoff');
			break;
		case "pattern": case "custom_pattern":
			jQuery('#carbon_body_type').closest('.option').next().next().next().next().fadeIn(500).removeClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().next().next().fadeIn(500).removeClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().next().fadeOut(500).addClass('optoff');
			jQuery('#carbon_body_type').closest('.option').next().fadeOut(500).addClass('optoff');
			break;
	}
	jQuery('#carbon_body_type').change(function(){
		var _default_body_background = jQuery('#carbon_body_type').val();
		switch(_default_body_background){
			case "image":
				jQuery('#carbon_body_type').closest('.option').next().next().next().next().fadeOut(500).addClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().next().next().fadeOut(500).addClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().next().fadeOut(500).addClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().fadeIn(500).removeClass('optoff');
				break;
			case "color":
				jQuery('#carbon_body_type').closest('.option').next().next().next().next().fadeOut(500).addClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().next().next().fadeOut(500).addClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().next().fadeIn(500).removeClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().fadeOut(500).addClass('optoff');
				break;
			case "pattern": case "custom_pattern":
				jQuery('#carbon_body_type').closest('.option').next().next().next().next().fadeIn(500).removeClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().next().next().fadeIn(500).removeClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().next().fadeOut(500).addClass('optoff');
				jQuery('#carbon_body_type').closest('.option').next().fadeOut(500).addClass('optoff');
				break;
		}
	});	
	
	var _default_headerbg_type_light = jQuery('#carbon_headerbg_type_light').val();
	switch (_default_headerbg_type_light){
		case "color":
			jQuery('#carbon_headerbg_image_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_color_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_opacity_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_headerbg_image_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_color_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_headerbg_image_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_color_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "custom_pattern":
			jQuery('#carbon_headerbg_image_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_color_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);		
		break;
	}
	jQuery('#carbon_headerbg_type_light').change(function(){
		switch (_default_headerbg_type_light){
			case "color":
				jQuery('#carbon_headerbg_image_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_color_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_opacity_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_headerbg_image_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_color_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_headerbg_image_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_color_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "custom_pattern":
				jQuery('#carbon_headerbg_image_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_color_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_custom_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);		
			break;
		}
	});


	var _default_headerbg_after_scroll_type_light = jQuery('#carbon_headerbg_after_scroll_type_light').val();
	switch (_default_headerbg_after_scroll_type_light){
		case "color":
			jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "custom_pattern":
			jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);		
		break;
	}
	jQuery('#carbon_headerbg_after_scroll_type_light').change(function(){
		switch (_default_headerbg_after_scroll_type_light){
			case "color":
				jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "custom_pattern":
				jQuery('#carbon_headerbg_after_scroll_image_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_color_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_light').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_light').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_light').closest('.option').removeClass('optoff').fadeIn(500);		
			break;
		}
	});

	
	var _default_headerbg_type_dark = jQuery('#carbon_headerbg_type_dark').val();
	switch (_default_headerbg_type_dark){
		case "color":
			jQuery('#carbon_headerbg_image_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_color_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_opacity_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_headerbg_image_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_color_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_headerbg_image_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_color_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "custom_pattern":
			jQuery('#carbon_headerbg_image_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_color_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);		
		break;
	}
	jQuery('#carbon_headerbg_type_dark').change(function(){
		switch (_default_headerbg_type_dark){
			case "color":
				jQuery('#carbon_headerbg_image_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_color_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_opacity_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_headerbg_image_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_color_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_headerbg_image_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_color_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "custom_pattern":
				jQuery('#carbon_headerbg_image_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_color_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_custom_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);		
			break;
		}
	});
	
	var _default_headerbg_after_scroll_type_dark = jQuery('#carbon_headerbg_after_scroll_type_dark').val();
	switch (_default_headerbg_after_scroll_type_dark){
		case "color":
			jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "custom_pattern":
			jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);		
		break;
	}
	jQuery('#carbon_headerbg_after_scroll_type_dark').change(function(){
		switch (_default_headerbg_after_scroll_type_dark){
			case "color":
				jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "custom_pattern":
				jQuery('#carbon_headerbg_after_scroll_image_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_color_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_opacity_dark').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_pattern_dark').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_headerbg_after_scroll_custom_pattern_dark').closest('.option').removeClass('optoff').fadeIn(500);		
			break;
		}
	});
	
	
	var _default_toppanelbg_type = jQuery('#carbon_toppanelbg_type').val();
	switch (_default_toppanelbg_type){
		case "color":
			jQuery('#carbon_toppanelbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_toppanelbg_color').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_toppanelbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_toppanelbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_toppanelbg_image').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_toppanelbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_toppanelbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_toppanelbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_toppanelbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_toppanelbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_toppanelbg_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_toppanelbg_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
		break;
	}
	jQuery('#carbon_toppanelbg_type').change(function(){
		switch (_default_toppanelbg_type){
			case "color":
				jQuery('#carbon_toppanelbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_toppanelbg_color').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_toppanelbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_toppanelbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_toppanelbg_image').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_toppanelbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_toppanelbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_toppanelbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_toppanelbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_toppanelbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_toppanelbg_pattern').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_toppanelbg_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			break;
		}
	});
	
	var _default_sec_footerbg_type = jQuery('#carbon_sec_footerbg_type').val();
	switch (_default_sec_footerbg_type){
		case "color":
			jQuery('#carbon_sec_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_color').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_sec_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_sec_footerbg_image').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_sec_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_sec_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "custom_pattern":
			jQuery('#carbon_sec_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_pattern').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
		break;
	}
	jQuery('#carbon_sec_footerbg_type').change(function(){
		switch (_default_sec_footerbg_type){
			case "color":
				jQuery('#carbon_sec_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_color').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_sec_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_sec_footerbg_image').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_sec_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_sec_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_pattern').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "custom_pattern":
				jQuery('#carbon_sec_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_pattern').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_sec_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_sec_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
			break;
		}
	});
	
	
	var _default_footerbg_type = jQuery('#carbon_footerbg_type').val();
	switch (_default_footerbg_type){
		case "color":
			jQuery('#carbon_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_color').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_footerbg_image').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeOut(500);
		break;
		case "custom_pattern":
			jQuery('#carbon_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_pattern').closest('.option').removeClass('optoff').fadeOut(500);
			jQuery('#carbon_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
		break;
	}
	jQuery('#carbon_footerbg_type').change(function(){
		switch (_default_footerbg_type){
			case "color":
				jQuery('#carbon_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_color').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_footerbg_image').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_pattern').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeOut(500);
			break;
			case "custom_pattern":
				jQuery('#carbon_footerbg_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_color_opacity').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_pattern').closest('.option').removeClass('optoff').fadeOut(500);
				jQuery('#carbon_footerbg_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			break;
		}
	});
	
	var _default_twitter_newsletter_type = jQuery('#carbon_twitter_newsletter_type').val();
	switch (_default_twitter_newsletter_type){
		case "color":
			jQuery('#carbon_twitter_newsletter_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_twitter_newsletter_color').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_twitter_newsletter_pattern').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_twitter_newsletter_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "image":
			jQuery('#carbon_twitter_newsletter_image').closest('.option').removeClass('optoff').fadeIn(500);
			jQuery('#carbon_twitter_newsletter_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_twitter_newsletter_pattern').closest('.option').addClass('optoff').fadeOut(500);	
			jQuery('#carbon_twitter_newsletter_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
		break;
		case "pattern":
			jQuery('#carbon_twitter_newsletter_image').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_twitter_newsletter_color').closest('.option').addClass('optoff').fadeOut(500);
			jQuery('#carbon_twitter_newsletter_pattern').closest('.option').removeClass('optoff').fadeIn(500);		
			jQuery('#carbon_twitter_newsletter_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
		break;
	}
	jQuery('#carbon_twitter_newsletter_type').change(function(){
		switch (_default_twitter_newsletter_type){
			case "color":
				jQuery('#carbon_twitter_newsletter_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_twitter_newsletter_color').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_twitter_newsletter_pattern').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_twitter_newsletter_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "image":
				jQuery('#carbon_twitter_newsletter_image').closest('.option').removeClass('optoff').fadeIn(500);
				jQuery('#carbon_twitter_newsletter_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_twitter_newsletter_pattern').closest('.option').addClass('optoff').fadeOut(500);	
				jQuery('#carbon_twitter_newsletter_custom_pattern').closest('.option').addClass('optoff').fadeOut(500);
			break;
			case "pattern":
				jQuery('#carbon_twitter_newsletter_image').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_twitter_newsletter_color').closest('.option').addClass('optoff').fadeOut(500);
				jQuery('#carbon_twitter_newsletter_pattern').closest('.option').removeClass('optoff').fadeIn(500);		
				jQuery('#carbon_twitter_newsletter_custom_pattern').closest('.option').removeClass('optoff').fadeIn(500);
			break;
		}
	});
	
	//style > body - body layout type
	var _default_body_layout_type = jQuery('#carbon_body_layout_type').val();
	if (_default_body_layout_type === "full"){
		jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().next().fadeOut(500);
		jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().fadeOut(500);
		jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().fadeOut(500);
		jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().fadeOut(500);
		jQuery('#carbon_body_layout_type').closest('.option').next().next().next().fadeOut(500);
		jQuery('#carbon_body_layout_type').closest('.option').next().next().fadeOut(500);
		jQuery('#carbon_body_layout_type').closest('.option').next().fadeOut(500);
	} else {
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().next().fadeIn(500);
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().fadeIn(500);
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().fadeIn(500);
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().fadeIn(500);
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().fadeIn(500);
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().next().fadeIn(500);
		if (!jQuery('#carbon_body_layout_type').closest('.option').next().hasClass('optoff'))
			jQuery('#carbon_body_layout_type').closest('.option').next().fadeIn(500);
	}
	jQuery('#carbon_body_layout_type').change(function(){
		if (_default_body_layout_type === "full"){
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().next().fadeOut(500);
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().fadeOut(500);
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().fadeOut(500);
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().fadeOut(500);
			jQuery('#carbon_body_layout_type').closest('.option').next().next().next().fadeOut(500);
			jQuery('#carbon_body_layout_type').closest('.option').next().next().fadeOut(500);
			jQuery('#carbon_body_layout_type').closest('.option').next().fadeOut(500);
		} else {
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().next().fadeIn(500);
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().next().fadeIn(500);
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().next().fadeIn(500);
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().next().next().next().fadeIn(500);
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().next().next().fadeIn(500);
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().next().fadeIn(500);
			if (!jQuery('#carbon_body_layout_type').closest('.option').next().hasClass('optoff'))
				jQuery('#carbon_body_layout_type').closest('.option').next().fadeIn(500);
		}
	});
	
	var _default_overlay_type = jQuery('#carbon_pagetitle_overlay_type').val();
	jQuery('#carbon_pagetitle_overlay_type').change(function(){
		_default_overlay_type = jQuery('#carbon_pagetitle_overlay_type').val();
		if (jQuery('#carbon_pagetitle_overlay_type').val() == "color"){
			jQuery('#carbon_pagetitle_overlay_color').closest('.option').fadeIn(500);
			jQuery('#carbon_pagetitle_overlay_pattern').closest('.option').fadeOut(500);
		} else {
			jQuery('#carbon_pagetitle_overlay_color').closest('.option').fadeOut(500);
			jQuery('#carbon_pagetitle_overlay_pattern').closest('.option').fadeIn(500);
		}
	}).trigger('change');
	
	var _default_overlay_type_shop = jQuery('#carbon_pagetitle_overlay_type_shop').val();
	jQuery('#carbon_pagetitle_overlay_type_shop').change(function(){
		_default_overlay_type_shop = jQuery('#carbon_pagetitle_overlay_type_shop').val();
		if (jQuery('#carbon_pagetitle_overlay_type_shop').val() == "color"){
			jQuery('#carbon_pagetitle_overlay_color_shop').closest('.option').fadeIn(500);
			jQuery('#carbon_pagetitle_overlay_pattern_shop').closest('.option').fadeOut(500);
		} else {
			jQuery('#carbon_pagetitle_overlay_color_shop').closest('.option').fadeOut(500);
			jQuery('#carbon_pagetitle_overlay_pattern_shop').closest('.option').fadeIn(500);
		}
	}).trigger('change');
	
	var _default_overlay_enable = jQuery('#carbon_pagetitle_image_overlay').val();
	jQuery('#carbon_pagetitle_image_overlay').change(function(){
		_default_overlay_enable = jQuery('#carbon_pagetitle_image_overlay').val();
		if (jQuery('#carbon_pagetitle_image_overlay').val() == "on"){
			jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').add(jQuery('#carbon_pagetitle_overlay_type').closest('.option')).fadeIn(500);
			jQuery('#carbon_pagetitle_overlay_type').change();
		} else {
			jQuery('#carbon_pagetitle_overlay_type').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').next()).addBack().fadeOut(500);
		}
	}).trigger('change');
	
	var _default_overlay_enable_shop = jQuery('#carbon_pagetitle_image_overlay_shop').val();
	jQuery('#carbon_pagetitle_image_overlay_shop').change(function(){
		_default_overlay_enable_shop = jQuery('#carbon_pagetitle_image_overlay_shop').val();
		if (jQuery('#carbon_pagetitle_image_overlay_shop').val() == "on"){
			jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').add(jQuery('#carbon_pagetitle_overlay_type_shop').closest('.option')).fadeIn(500);
			jQuery('#carbon_pagetitle_overlay_type_shop').change();
		} else {
			jQuery('#carbon_pagetitle_overlay_type_shop').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').next()).addBack().fadeOut(500);
		}
	}).trigger('change');
	
	//style > header - background type
	var _default_header_bkg = jQuery('#carbon_header_type').val();
	jQuery('#carbon_header_type').change(function(){
		var _default_header_bkg = jQuery('#carbon_header_type').val();
		switch (_default_header_bkg){
			case "without": 			
				jQuery('#carbon_header_type').closest('.option').nextAll().fadeOut(500);
			break;
			case "none": case "border":
				jQuery('#carbon_header_text_alignment').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs').closest('.option').prev().addBack())
				.fadeIn(500);
				
				
				
				jQuery('#upload-carbon_header_image').closest('.option')
					.add(jQuery('#carbon_header_color').closest('.option')).add(jQuery('#carbon_header_opacity').closest('.option'))
					.add(jQuery('#carbon_header_pattern').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern').closest('.option'))
				.fadeOut(500);
				
				jQuery('#carbon_pagetitle_image_parallax').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').next()).addBack().fadeOut();
				
			break;
			case "image":
				jQuery('#carbon_header_text_alignment').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs').closest('.option').prev().addBack())
				.fadeIn(500);
				
				jQuery('#upload-carbon_header_image').closest('.option').fadeIn(500);
				
				jQuery('#carbon_header_color').closest('.option').add(jQuery('#carbon_header_opacity').closest('.option'))
					.add(jQuery('#carbon_header_pattern').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern').closest('.option'))
					.add(jQuery('#carbon_banner_slider').closest('.option'))
				.fadeOut(500);
				
				jQuery('#carbon_pagetitle_image_parallax').closest('.option').add(jQuery('#carbon_pagetitle_image_overlay').closest('.option')).fadeIn(500);
				jQuery('#carbon_pagetitle_image_overlay').change();
				
			break;
			case "color":
				jQuery('#carbon_header_text_alignment').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax').closest('.option'))
				.fadeIn(500);
				
				jQuery('#carbon_header_color').closest('.option')
					.add(jQuery('#carbon_header_opacity').closest('.option'))
				.fadeIn(500);
				
				jQuery('#upload-carbon_header_image').closest('.option')
					.add(jQuery('#carbon_header_pattern').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern').closest('.option'))
					.add(jQuery('#carbon_banner_slider').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').next()).fadeOut();
				
			break;
			case "pattern":
				jQuery('#carbon_header_text_alignment').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax').closest('.option'))
				.fadeIn(500);
				
				jQuery('#carbon_header_pattern').closest('.option').fadeIn(500);
				
				jQuery('#upload-carbon_header_image').closest('.option')
					.add(jQuery('#carbon_header_color').closest('.option')).add(jQuery('#carbon_header_opacity').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern').closest('.option'))
					.add(jQuery('#carbon_banner_slider').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').next()).fadeOut();
				
			break;
			case "custom_pattern":
				jQuery('#carbon_header_text_alignment').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax').closest('.option'))
				.fadeIn(500);
				
				jQuery('#upload-carbon_header_custom_pattern').closest('.option').fadeIn(500);
				
				jQuery('#upload-carbon_header_image').closest('.option')
					.add(jQuery('#carbon_header_color').closest('.option')).add(jQuery('#carbon_header_opacity').closest('.option'))
					.add(jQuery('#carbon_header_pattern').closest('.option'))
					.add(jQuery('#carbon_banner_slider').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').next()).fadeOut();
				
			break;
			case "banner":
			
				jQuery('#carbon_header_text_alignment').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax').closest('.option'))
				.fadeIn(500);
				
				jQuery('#carbon_banner_slider').closest('.option').fadeIn(500);
				
				jQuery('#upload-carbon_header_image').closest('.option')
					.add(jQuery('#carbon_header_color').closest('.option')).add(jQuery('#carbon_header_opacity').closest('.option'))
					.add(jQuery('#carbon_header_pattern').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity').closest('.option').next()).fadeOut();
				
			break;
		}
		if (_default_header_bkg == "border" || _default_header_bkg == "image" || _default_header_bkg == "pattern" || _default_header_bkg == "custom_pattern" || _default_header_bkg == "banner" || _default_header_bkg == "color"){
			jQuery('#carbon_header_height').closest('.option').fadeIn(500);
			jQuery('#carbon_header_text_alignment').closest('.option').fadeIn(500);
			jQuery('#carbon_hide_pagetitle').add(jQuery('#carbon_hide_sec_pagetitle')).add(jQuery('#carbon_breadcrumbs')).trigger('change');
		}
	}).trigger('change');
	
	
	var _default_header_bkg_shop = jQuery('#carbon_header_type_shop').val();
	jQuery('#carbon_header_type_shop').change(function(){
		var _default_header_bkg_shop = jQuery('#carbon_header_type_shop').val();
		switch (_default_header_bkg_shop){
			case "without": 			
				jQuery('#carbon_header_type_shop').closest('.option').nextAll().fadeOut(500);
			break;
			case "none": case "border":
				jQuery('#carbon_header_text_alignment_shop').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs_shop').closest('.option').prev().addBack())
				.fadeIn(500);
				
				
				
				jQuery('#upload-carbon_header_image_shop').closest('.option')
					.add(jQuery('#carbon_header_color_shop').closest('.option')).add(jQuery('#carbon_header_opacity_shop').closest('.option'))
					.add(jQuery('#carbon_header_pattern_shop').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern_shop').closest('.option'))
				.fadeOut(500);
				
				jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').next()).addBack().fadeOut();
				
			break;
			case "image":
				jQuery('#carbon_header_text_alignment_shop').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs_shop').closest('.option').prev().addBack())
				.fadeIn(500);
				
				jQuery('#upload-carbon_header_image_shop').closest('.option').fadeIn(500);
				
				jQuery('#carbon_header_color_shop').closest('.option').add(jQuery('#carbon_header_opacity_shop').closest('.option'))
					.add(jQuery('#carbon_header_pattern_shop').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern_shop').closest('.option'))
					.add(jQuery('#carbon_banner_slider_shop').closest('.option'))
				.fadeOut(500);
				
				jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option').add(jQuery('#carbon_pagetitle_image_overlay_shop').closest('.option')).fadeIn(500);
				jQuery('#carbon_pagetitle_image_overlay_shop').change();
				
			break;
			case "color":
				jQuery('#carbon_header_text_alignment_shop').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option'))
				.fadeIn(500);
				
				jQuery('#carbon_header_color_shop').closest('.option')
					.add(jQuery('#carbon_header_opacity_shop').closest('.option'))
				.fadeIn(500);
				
				jQuery('#upload-carbon_header_image_shop').closest('.option')
					.add(jQuery('#carbon_header_pattern_shop').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern_shop').closest('.option'))
					.add(jQuery('#carbon_banner_slider_shop').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').next()).fadeOut();
				
			break;
			case "pattern":
				jQuery('#carbon_header_text_alignment_shop').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option'))
				.fadeIn(500);
				
				jQuery('#carbon_header_pattern_shop').closest('.option').fadeIn(500);
				
				jQuery('#upload-carbon_header_image_shop').closest('.option')
					.add(jQuery('#carbon_header_color_shop').closest('.option')).add(jQuery('#carbon_header_opacity_shop').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern_shop').closest('.option'))
					.add(jQuery('#carbon_banner_slider_shop').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').next()).fadeOut();
				
			break;
			case "custom_pattern":
				jQuery('#carbon_header_text_alignment_shop').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option'))
				.fadeIn(500);
				
				jQuery('#upload-carbon_header_custom_pattern_shop').closest('.option').fadeIn(500);
				
				jQuery('#upload-carbon_header_image_shop').closest('.option')
					.add(jQuery('#carbon_header_color_shop').closest('.option')).add(jQuery('#carbon_header_opacity_shop').closest('.option'))
					.add(jQuery('#carbon_header_pattern_shop').closest('.option'))
					.add(jQuery('#carbon_banner_slider_shop').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').next()).fadeOut();
				
			break;
			case "banner":
			
				jQuery('#carbon_header_text_alignment_shop').closest('.option').prev().addBack()
					.add(jQuery('#carbon_hide_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_breadcrumbs_shop').closest('.option').prev().addBack())
					.add(jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option'))
				.fadeIn(500);
				
				jQuery('#carbon_banner_slider_shop').closest('.option').fadeIn(500);
				
				jQuery('#upload-carbon_header_image_shop').closest('.option')
					.add(jQuery('#carbon_header_color_shop').closest('.option')).add(jQuery('#carbon_header_opacity_shop').closest('.option'))
					.add(jQuery('#carbon_header_pattern_shop').closest('.option'))
					.add(jQuery('#upload-carbon_header_custom_pattern_shop').closest('.option'))
				.fadeOut(500);
				
							jQuery('#carbon_pagetitle_image_parallax_shop').closest('.option').nextUntil(jQuery('#carbon_pagetitle_overlay_opacity_shop').closest('.option').next()).fadeOut();
				
			break;
		}
		if (_default_header_bkg_shop == "border" || _default_header_bkg_shop == "image" || _default_header_bkg_shop == "pattern" || _default_header_bkg_shop == "custom_pattern" || _default_header_bkg_shop == "banner" || _default_header_bkg_shop == "color"){
			jQuery('#carbon_header_height_shop').closest('.option').fadeIn(500);
			jQuery('#carbon_header_text_alignment_shop').closest('.option').fadeIn(500);
			jQuery('#carbon_hide_pagetitle_shop').add(jQuery('#carbon_hide_sec_pagetitle_shop')).add(jQuery('#carbon_breadcrumbs_shop')).trigger('change');
		}
	}).trigger('change');
	
	
	var _default_seo_options = jQuery('#carbon_enable_theme_seo').val();
	if (_default_seo_options === "on"){
		jQuery('#carbon_enable_theme_seo').closest('.option').siblings().not(jQuery('#carbon_enable_theme_seo').closest('.option').prev()).fadeIn(500);
	} else {
		jQuery('#carbon_enable_theme_seo').closest('.option').siblings().not(jQuery('#carbon_enable_theme_seo').closest('.option').prev()).fadeOut(500);
	}
	jQuery('#carbon_enable_theme_seo').change(function(e){
		if (_default_seo_options === "on"){
			jQuery('#carbon_enable_theme_seo').closest('.option').siblings().not(jQuery('#carbon_enable_theme_seo').closest('.option').prev()).fadeIn(500);
		} else {
			jQuery('#carbon_enable_theme_seo').closest('.option').siblings().not(jQuery('#carbon_enable_theme_seo').closest('.option').prev()).fadeOut(500);
		}
	});
	
	//google fonts
	var _default_google_fonts = jQuery('#carbon_enable_google_fonts').val();
	if (_default_google_fonts === "on"){
		jQuery('#carbon_enable_google_fonts').closest('.option').next().fadeIn(500);
	} else {
		jQuery('#carbon_enable_google_fonts').closest('.option').next().fadeOut(500);
	}
	jQuery('#carbon_enable_google_fonts').change(function(){
		if (_default_google_fonts === "on"){
			jQuery('#carbon_enable_google_fonts').closest('.option').next().fadeIn(500);
		} else {
			jQuery('#carbon_enable_google_fonts').closest('.option').next().fadeOut(500);
		}		
	});
	
	//General > Projects > Enlarge pics
	var _default_proj_layout = jQuery('#carbon_single_layout').val(); 
	if (_default_proj_layout === "fullwidth_slider"){
		jQuery('#carbon_projects_enlarge_images').parent('.option').fadeOut(500);
	} else {
		jQuery('#carbon_projects_enlarge_images').parent('.option').fadeIn(500);
	}
	jQuery('#carbon_single_layout').change(function(e){
		if (_default_proj_layout === "fullwidth_slider"){
			jQuery('#carbon_projects_enlarge_images').parent('.option').fadeOut(500);
		} else {
			jQuery('#carbon_projects_enlarge_images').parent('.option').fadeIn(500);
		}
	});
	
	
	// social shares on projects
	var _default_project_single_social = jQuery('#carbon_project_single_social_shares').val();
	if (_default_project_single_social == "on") jQuery('#carbon_project_single_socials').closest('.option').fadeIn(500);
	else jQuery('#carbon_project_single_socials').closest('.option').fadeOut(500);
	jQuery('#carbon_project_single_social_shares').change(function(){
		if (jQuery(this).val() == "on")
			jQuery('#carbon_project_single_socials').closest('.option').fadeIn(500);
		else jQuery('#carbon_project_single_socials').closest('.option').fadeOut(500);
	});
	
	// social shares on posts
	var _default_post_single_social = jQuery('#carbon_post_single_social_shares').val();
	if (_default_post_single_social == "on") jQuery('#carbon_post_single_socials').closest('.option').fadeIn(500);
	else jQuery('#carbon_post_single_socials').closest('.option').fadeOut(500);
	jQuery('#carbon_post_single_social_shares').change(function(){
		if (jQuery(this).val() == "on")
			jQuery('#carbon_post_single_socials').closest('.option').fadeIn(500);
		else jQuery('#carbon_post_single_socials').closest('.option').fadeOut(500);
	});
	
	//General > Projects > Open|Close Cats
	var _default_enable_open_close_categories = jQuery('#carbon_enable_open_close_categories').val();
	if (_default_enable_open_close_categories === "on"){
		jQuery('#carbon_categories_initial_state').closest('.option').fadeIn(500).removeClass('optoff');
	} else {
		jQuery('#carbon_categories_initial_state').closest('.option').fadeOut(500).addClass('optoff');
	}
	jQuery('#carbon_enable_open_close_categories').change(function(e){
		var _default_enable_open_close_categories = jQuery('#carbon_enable_open_close_categories').val();
		if (_default_enable_open_close_categories === "on"){
			jQuery('#carbon_categories_initial_state').closest('.option').fadeIn(500).removeClass('optoff');
		} else {
			jQuery('#carbon_categories_initial_state').closest('.option').fadeOut(500).addClass('optoff');
		}	
	});
	
	//FOOTER RIGHT CONTENT OPTIONS
	var _default_footer_right = jQuery('#carbon_footer_right_content').val();
	if (_default_footer_right === "text"){
		jQuery('#carbon_footer_right_text').parent('.option').fadeIn(500);
	} else {
		jQuery('#carbon_footer_right_text').parent('.option').fadeOut(500);
	}
	jQuery('#carbon_footer_right_content').change(function(e){
		if (_default_footer_right === "text"){
			jQuery('#carbon_footer_right_text').parent('.option').fadeIn(500);
		} else {
			jQuery('#carbon_footer_right_text').parent('.option').fadeOut(500);
		}	
	});
	
	var tp_cols_default = jQuery('#carbon_toppanel_number_cols').val();	  
 	if(tp_cols_default == "three"){
 		jQuery("#carbon_toppanel_columns_order").closest('.option').fadeIn(500);
 		jQuery("#carbon_toppanel_columns_order_four").closest('.option').fadeOut(500);
 	} else if (tp_cols_default == "four"){
 		jQuery("#carbon_toppanel_columns_order_four").closest('.option').fadeIn(500);
 		jQuery("#carbon_toppanel_columns_order").closest('.option').fadeOut(500);
 	} else {
 		jQuery("#carbon_toppanel_columns_order").closest('.option').fadeOut(500);
 		jQuery("#carbon_toppanel_columns_order_four").closest('.option').fadeOut(500);
 	}
 	
	jQuery('#carbon_toppanel_number_cols').change(function(e){
		if(tp_cols_default == "three"){
	 		jQuery("#carbon_toppanel_columns_order").closest('.option').fadeIn(500);
	 		jQuery("#carbon_toppanel_columns_order_four").closest('.option').fadeOut(500);
	 	} else if (tp_cols_default == "four"){
	 		jQuery("#carbon_toppanel_columns_order_four").closest('.option').fadeIn(500);
	 		jQuery("#carbon_toppanel_columns_order").closest('.option').fadeOut(500);
	 	} else {
	 		jQuery("#carbon_toppanel_columns_order").closest('.option').fadeOut(500);
	 		jQuery("#carbon_toppanel_columns_order_four").closest('.option').fadeOut(500);
	 	}
 	});
 	
 	//WIDGETS AREA
	var _default_widgets_area = jQuery('#carbon_enable_widgets_area').val();
	var indexWidget = parseInt(jQuery('#carbon_enable_widgets_area').parents('.option').index(),10);
	if (_default_widgets_area === "on"){
		for (var i=1; i<4; i++){
			jQuery('#carbon_enable_widgets_area').parents('.sub-navigation-container').find('.option:eq('+(indexWidget+i)+')').fadeIn(500);	
		}
		jQuery('#carbon_toppanel_number_cols').change();
	} else {
		for (var i=1; i<4; i++){
			jQuery('#carbon_enable_widgets_area').parents('.sub-navigation-container').find('.option:eq('+(indexWidget+i)+')').fadeOut(500);	
		}
	}
	jQuery('#carbon_enable_widgets_area').change(function(e){
		if (_default_widgets_area === "on"){
			for (var i=1; i<4; i++){
				jQuery('#carbon_enable_widgets_area').parents('.sub-navigation-container').find('.option:eq('+(indexWidget+i)+')').fadeIn(500);	
			}
			jQuery('#carbon_toppanel_number_cols').change();
		} else {
			for (var i=1; i<4; i++){
				jQuery('#carbon_enable_widgets_area').parents('.sub-navigation-container').find('.option:eq('+(indexWidget+i)+')').fadeOut(500);	
			}
		}
	});
	
	//breadcrumbs
	var _default_breadcrumbs = jQuery('#carbon_breadcrumbs').val();
	if (_default_breadcrumbs === "on"){
		jQuery('#carbon_breadcrumbs').closest('.option').nextAll().fadeIn(500);
	} else {
		jQuery('#carbon_breadcrumbs').closest('.option').nextAll().fadeOut(500);
	}
	jQuery('#carbon_breadcrumbs').change(function(e){
		if (_default_breadcrumbs === "on"){
			jQuery('#carbon_breadcrumbs').closest('.option').nextAll().fadeIn(500);
		} else {
			jQuery('#carbon_breadcrumbs').closest('.option').nextAll().fadeOut(500);
		}
	});
	
	//pagetitle
	var _default_hide_pagetitle = jQuery('#carbon_hide_pagetitle').val();
	if (_default_hide_pagetitle === "on"){
		jQuery('#carbon_hide_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle').closest('.option').next().next().next().next().next()).fadeIn(500);
	} else {
		jQuery('#carbon_hide_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle').closest('.option').next().next().next().next().next()).fadeOut(500);
	}
	jQuery('#carbon_hide_pagetitle').change(function(e){
		if (_default_hide_pagetitle === "on"){
			jQuery('#carbon_hide_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle').closest('.option').next().next().next().next().next()).fadeIn(500);
		} else {
			jQuery('#carbon_hide_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle').closest('.option').next().next().next().next().next()).fadeOut(500);
		}		
	});
	
	//secondary title 
	var _default_hide_sec_pagetitle = jQuery('#carbon_hide_sec_pagetitle').val();
	if (_default_hide_sec_pagetitle === "on"){
		jQuery('#carbon_hide_sec_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle').closest('.option').next().next().next().next().next()).fadeIn(500);
	} else {
		jQuery('#carbon_hide_sec_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle').closest('.option').next().next().next().next().next()).fadeOut(500);
	}
	jQuery('#carbon_hide_sec_pagetitle').change(function(e){
		if (_default_hide_sec_pagetitle === "on"){
			jQuery('#carbon_hide_sec_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle').closest('.option').next().next().next().next().next()).fadeIn(500);
		} else {
			jQuery('#carbon_hide_sec_pagetitle').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle').closest('.option').next().next().next().next().next()).fadeOut(500);
		}		
	});
	
	
	
	//breadcrumbs
	var _default_breadcrumbs_shop = jQuery('#carbon_breadcrumbs_shop').val();
	if (_default_breadcrumbs_shop === "on"){
		jQuery('#carbon_breadcrumbs_shop').closest('.option').nextAll().fadeIn(500);
	} else {
		jQuery('#carbon_breadcrumbs_shop').closest('.option').nextAll().fadeOut(500);
	}
	jQuery('#carbon_breadcrumbs_shop').change(function(e){
		if (_default_breadcrumbs_shop === "on"){
			jQuery('#carbon_breadcrumbs_shop').closest('.option').nextAll().fadeIn(500);
		} else {
			jQuery('#carbon_breadcrumbs_shop').closest('.option').nextAll().fadeOut(500);
		}
	});
	
	//pagetitle
	var _default_hide_pagetitle_shop = jQuery('#carbon_hide_pagetitle_shop').val();
	if (_default_hide_pagetitle_shop === "on"){
		jQuery('#carbon_hide_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeIn(500);
	} else {
		jQuery('#carbon_hide_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeOut(500);
	}
	jQuery('#carbon_hide_pagetitle_shop').change(function(e){
		if (_default_hide_pagetitle_shop === "on"){
			jQuery('#carbon_hide_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeIn(500);
		} else {
			jQuery('#carbon_hide_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeOut(500);
		}		
	});
	
	//secondary title 
	var _default_hide_sec_pagetitle_shop = jQuery('#carbon_hide_sec_pagetitle_shop').val();
	if (_default_hide_sec_pagetitle_shop === "on"){
		jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeIn(500);
	} else {
		jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeOut(500);
	}
	jQuery('#carbon_hide_sec_pagetitle_shop').change(function(e){
		if (_default_hide_sec_pagetitle_shop === "on"){
			jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeIn(500);
		} else {
			jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').nextUntil(jQuery('#carbon_hide_sec_pagetitle_shop').closest('.option').next().next().next().next().next()).fadeOut(500);
		}		
	});
	
	
	
	//pagetitle shadow
	var _default_page_title_shadow = jQuery('#carbon_page_title_shadow').val();
	if (_default_page_title_shadow === "on"){
		jQuery('#carbon_page_title_shadow').closest('.option').next().fadeIn(500);
	} else {
		jQuery('#carbon_page_title_shadow').closest('.option').next().fadeOut(500);
	}
	jQuery('#carbon_page_title_shadow').change(function(e){
		if (_default_page_title_shadow === "on"){
			jQuery('#carbon_page_title_shadow').closest('.option').next().fadeIn(500);
		} else {
			jQuery('#carbon_page_title_shadow').closest('.option').next().fadeOut(500);
		}
	});
	
  	//SOCIAL ICONS 
  	var _default_enable_socials = jQuery('#carbon_enable_socials').val();
  	if (_default_enable_socials === "on"){
		jQuery('#carbon_enable_socials').parents('.option').find('~ .option').each(function(){
			jQuery(this).fadeIn(500);
		});
  	} else {
	  	jQuery('#carbon_enable_socials').parents('.option').find('~ .option').each(function(){
			jQuery(this).fadeOut(500);
		});
  	}
	jQuery('#carbon_enable_socials').change(function(e){
		var _default_enable_socials = jQuery('#carbon_enable_socials').val();
	  	if (_default_enable_socials === "on"){
			jQuery('#carbon_enable_socials').parents('.option').find('~ .option').each(function(){
				jQuery(this).fadeIn(500);
			});
	  	} else {
		  	jQuery('#carbon_enable_socials').parents('.option').find('~ .option').each(function(){
				jQuery(this).fadeOut(500);
			});
	  	}
	});

	// TOP PANEL & SOCIAL BAR MAMBO JAMBO
	var _default_top_panel = jQuery('#carbon_enable_top_panel').val();
	if (_default_top_panel === "on"){
		for (var i=jQuery('#carbon_enable_top_panel').closest('.option').index()+1; i< jQuery('#carbon_toppanel_headingscolor').closest('.option').index()+1; i++){
			if (!jQuery('#tab_navigation-1-header').children().eq(i).hasClass('optoff')) jQuery('#tab_navigation-2-header').children().eq(i).fadeIn(500);
		}
	} else {
		for (var i=jQuery('#carbon_enable_top_panel').closest('.option').index()+1; i< jQuery('#carbon_toppanel_headingscolor').closest('.option').index()+1; i++){
			jQuery('#tab_navigation-1-header').children().eq(i).fadeOut(500);
		}
  	}
	jQuery('#carbon_enable_top_panel').change(function(e){
	  	if (_default_top_panel === "on"){
			for (var i=jQuery('#carbon_enable_top_panel').closest('.option').index()+1; i< jQuery('#carbon_toppanel_headingscolor').closest('.option').index()+1; i++){
				if (!jQuery('#tab_navigation-1-header').children().eq(i).hasClass('optoff')) jQuery('#tab_navigation-1-header').children().eq(i).fadeIn(500);
			}
		} else {
			for (var i=jQuery('#carbon_enable_top_panel').closest('.option').index()+1; i< jQuery('#carbon_toppanel_headingscolor').closest('.option').index()+1; i++){
				jQuery('#tab_navigation-1-header').children().eq(i).fadeOut(500);
			}
	  	}
	});
	
	
	//suggested colors
	jQuery('#tab_navigation-1-general a.style-box').each(function(){
		jQuery(this).on("click", function(){
			jQuery('#carbon_style_color')
				.attr('value',jQuery(this).attr('title'))
				.siblings('.color-preview').css('background-color', '#'+jQuery(this).attr('title'));
		});
	});
	
	jQuery('.styles-holder a.style-box[title='+jQuery('#carbon_style_color').val()+']').closest('.option').addClass('selected-style');
	
  	// 404
	var def_notfound = jQuery('#carbon_404_error_image').val();
	if (def_notfound == "off")	
		jQuery('#carbon_404_error_image_url').closest('.option').fadeOut(500);
	else
		jQuery('#carbon_404_error_image_url').closest('.option').fadeIn(500);

	jQuery('#carbon_404_error_image').change(function(e){
		if (def_notfound == "off")	
			jQuery('#carbon_404_error_image_url').closest('.option').fadeOut(500);
		else
			jQuery('#carbon_404_error_image_url').closest('.option').fadeIn(500);
 	});
 	
 	//HOMEPAGE LAYOUT
 	jQuery("#carbon_homepage_static_image_url").closest('.option').fadeOut(500);
 	
 	jQuery('#carbon_homepage_slider').change(function(e){
 		if(jQuery(this).val() == 'static')
 			jQuery("#carbon_homepage_static_image_url").closest('.option').fadeIn(500);
 		else
 			jQuery("#carbon_homepage_static_image_url").closest('.option').fadeOut(500);
 			
 	});
 	 	
 	//CONTACT FORM TEXTAREA
 	jQuery("textarea[name=walker_contacts_email_default_content]").css("width", "440px").css("height", "270px");
 	
 	
 	//FOOTER
 	var cols_default  = jQuery('#carbon_footer_number_cols').val();
	switch(cols_default){
		case "one": case "two":
	 		jQuery("#carbon_footer_columns_order").closest('.option').fadeOut(500);
	 		jQuery("#carbon_footer_columns_order_four").closest('.option').fadeOut(500);				
		break;
		case "three":
			jQuery("#carbon_footer_columns_order").closest('.option').fadeIn(500);
			jQuery("#carbon_footer_columns_order_four").closest('.option').fadeOut(500);
		break;
		case "four":
			jQuery("#carbon_footer_columns_order_four").closest('.option').fadeIn(500);
			jQuery("#carbon_footer_columns_order").closest('.option').fadeOut(500);	
		break;
	}
	 	
	jQuery('#carbon_footer_number_cols').change(function(e){
		switch(cols_default){
			case "one": case "two":
		 		jQuery("#carbon_footer_columns_order").closest('.option').fadeOut(500);
		 		jQuery("#carbon_footer_columns_order_four").closest('.option').fadeOut(500);				
			break;
			case "three":
				jQuery("#carbon_footer_columns_order").closest('.option').fadeIn(500);
				jQuery("#carbon_footer_columns_order_four").closest('.option').fadeOut(500);
			break;
			case "four":
				jQuery("#carbon_footer_columns_order_four").closest('.option').fadeIn(500);
				jQuery("#carbon_footer_columns_order").closest('.option').fadeOut(500);	
			break;
		}
 	});
  

	//show twitter newsletter footer options
	var _default_show_twitter_newsletter_footer = jQuery('#carbon_show_twitter_newsletter_footer').val();
	if (_default_show_twitter_newsletter_footer === "on"){
		for (var i= jQuery('#carbon_show_twitter_newsletter_footer').closest('.option').index(); i<jQuery('#carbon_twitter_newsletter_borderscolor').closest('.option').index(); i++){
			if (!jQuery('#carbon_show_twitter_newsletter_footer').closest('.sub-navigation-container').find('.option').eq(i).hasClass('optoff')) jQuery('#carbon_show_twitter_newsletter_footer').closest('.sub-navigation-container').find('.option').eq(i).fadeIn(500);
		}
	} else {
		for (var i= jQuery('#carbon_show_twitter_newsletter_footer').closest('.option').index(); i<jQuery('#carbon_twitter_newsletter_borderscolor').closest('.option').index(); i++){
			jQuery('#carbon_show_twitter_newsletter_footer').closest('.sub-navigation-container').find('.option').eq(i).fadeOut(500);
		}
	}
	jQuery('#carbon_show_twitter_newsletter_footer').change(function(){
		if (_default_show_twitter_newsletter_footer === "on"){
			for (var i= jQuery('#carbon_show_twitter_newsletter_footer').closest('.option').index(); i<jQuery('#carbon_twitter_newsletter_borderscolor').closest('.option').index(); i++){
				if (!jQuery('#carbon_show_twitter_newsletter_footer').closest('.sub-navigation-container').find('.option').eq(i).hasClass('optoff')) jQuery('#carbon_show_twitter_newsletter_footer').closest('.sub-navigation-container').find('.option').eq(i).fadeIn(500);
			}
		} else {
			for (var i= jQuery('#carbon_show_twitter_newsletter_footer').closest('.option').index(); i<jQuery('#carbon_twitter_newsletter_borderscolor').closest('.option').index(); i++){
				jQuery('#carbon_show_twitter_newsletter_footer').closest('.sub-navigation-container').find('.option').eq(i).fadeOut(500);
			}
		}
	});
	
	
  var _default_after_scroll_header = jQuery('#carbon_header_after_scroll').val();
  if (_default_after_scroll_header == 'on'){
	  jQuery('#carbon_header_shrink_effect').closest('.option').prev().addBack()
	  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
	  .fadeIn(500);
  } else {
	  jQuery('#carbon_header_shrink_effect').closest('.option').prev().addBack()
	  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
	  .fadeOut(500);
  }
  jQuery('#carbon_header_after_scroll').change(function(){
	  if (_default_after_scroll_header == 'on'){
		  jQuery('#carbon_header_shrink_effect').closest('.option').prev().addBack()
		  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
		  .fadeIn(500);
	  } else {
		  jQuery('#carbon_header_shrink_effect').closest('.option').prev().addBack()
		  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
		  .fadeOut(500);
	  }
  });
  
  
  var _default_fixed_menu = jQuery('#carbon_fixed_menu').val();
  if (_default_fixed_menu == 'on'){
	  jQuery('#carbon_header_after_scroll').trigger('change').closest('.option').prev().addBack()
  	  	.add(jQuery('#carbon_header_hide_on_start').closest('.option'))
	  	.add(jQuery('#carbon_content_to_the_top').closest('.option'))
	  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
	  .fadeIn(500);
  } else {
	  jQuery('#carbon_header_after_scroll').closest('.option').prev().addBack()
	  	.add(jQuery('#carbon_header_shrink_effect').closest('.option').prev().addBack())
	  	.add(jQuery('#carbon_header_hide_on_start').closest('.option'))
	  	.add(jQuery('#carbon_content_to_the_top').closest('.option'))
	  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
	  .fadeOut(500);  
  }
  jQuery('#carbon_fixed_menu').change(function(){
	  if (_default_fixed_menu == 'on'){
		  jQuery('#carbon_header_after_scroll').trigger('change').closest('.option').prev().addBack()
		  	.add(jQuery('#carbon_header_hide_on_start').closest('.option'))
		  	.add(jQuery('#carbon_content_to_the_top').closest('.option'))
		  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
		  .fadeIn(500);
	  } else {
		  jQuery('#carbon_header_after_scroll').closest('.option').prev().addBack()
		  	.add(jQuery('#carbon_header_shrink_effect').closest('.option').prev().addBack())
		  	.add(jQuery('#carbon_header_hide_on_start').closest('.option'))
		  	.add(jQuery('#carbon_content_to_the_top').closest('.option'))
		  	.add(jQuery('#carbon_header_after_scroll_style_light_dark').closest('.option'))
		  .fadeOut(500);  
	  }	  
  });
  
  //show primary footer options
	var _default_show_primary_footer = jQuery('#carbon_show_primary_footer').val();
	jQuery('#carbon_show_primary_footer').change(function(){
		if (_default_show_primary_footer === "on"){
			jQuery('#carbon_show_primary_footer').closest('.option').nextUntil(jQuery('#carbon_footerbg_headingscolor').closest('.option').next()).fadeIn(500);
			jQuery('#carbon_footerbg_type').trigger('change');
		} else {
			jQuery('#carbon_show_primary_footer').closest('.option').nextUntil(jQuery('#carbon_footerbg_headingscolor').closest('.option').next()).fadeOut(500);
		}
	}).trigger('change');
	
	//show secondary footer options
	var _default_show_secondary_footer = jQuery('#carbon_show_sec_footer').val();
	jQuery('#carbon_show_sec_footer').change(function(){
		if (_default_show_secondary_footer === "on"){
			jQuery('#carbon_show_sec_footer').closest('.option').nextAll().fadeIn(500);
			jQuery('#carbon_sec_footerbg_type').trigger('change');
		} else {
			jQuery('#carbon_show_sec_footer').closest('.option').nextAll().fadeOut(500);
		}
	}).trigger('change');
	
	/* display metas */
	var _default_display_metas = jQuery('#carbon_display_metas').val();
	jQuery('#carbon_display_metas').change(function(){
		if (_default_display_metas === "on"){
			jQuery('#carbon_metas_to_display').parent().fadeIn(500);
		} else {
			jQuery('#carbon_metas_to_display').parent().fadeOut(500);			
		}
	}).trigger('change');
  
  // continuous check for changed value
  setInterval(function () {
	  
	  //custom css
	  if (jQuery('#enable_custom_css').val() != _default_custom_css){
		  _default_custom_css = jQuery('#enable_custom_css').val();
		  jQuery('#enable_custom_css').change();
	  }
	  
	if (jQuery('#carbon_menu_add_border').val() != _default_menu_add_border){
		_default_menu_add_border = jQuery('#carbon_menu_add_border').val();
		jQuery('#carbon_menu_add_border').change();
	}

  	if (jQuery('#carbon_footer_display_logo').val() != _default_footer_display_logo){
		_default_footer_display_logo = jQuery('#carbon_footer_display_logo').val();
		jQuery('#carbon_footer_display_logo').change();
	}
	
	if (jQuery('#carbon_footer_display_social_icons').val() != _default_footer_display_social_icons){
		_default_footer_display_social_icons = jQuery('#carbon_footer_display_social_icons').val();
		jQuery('#carbon_footer_display_social_icons').change();
	}
	if (jQuery('#carbon_footer_display_custom_text').val() != _default_footer_display_custom_text){
		_default_footer_display_custom_text = jQuery('#carbon_footer_display_custom_text').val();
		jQuery('#carbon_footer_display_custom_text').change();
	}
	  
	if (jQuery('#carbon_enable_theme_seo').val() != _default_seo_options){
		_default_seo_options = jQuery('#carbon_enable_theme_seo').val();
		jQuery('#carbon_enable_theme_seo').change();
	}
  
	// under construction
	if (jQuery('#carbon_enable_under_construction').val() != _default_under_construction){
		_default_under_construction = jQuery('#carbon_enable_under_construction').val();
		jQuery('#carbon_enable_under_construction').change();
	}

	//fixed menu
	if (jQuery('#carbon_fixed_menu').val() != _default_fixed_menu){
	  	_default_fixed_menu = jQuery('#carbon_fixed_menu').val();
	  	jQuery('#carbon_fixed_menu').change();
  	}
  	
  	//after scroll menu
  	if (jQuery('#carbon_header_after_scroll').val() != _default_after_scroll_header){
	  	_default_after_scroll_header = jQuery('#carbon_header_after_scroll').val();
	  	jQuery('#carbon_header_after_scroll').trigger('change');
  	}


	//breadcrumbs
	if (jQuery('#carbon_breadcrumbs').val() != _default_breadcrumbs){
		_default_breadcrumbs = jQuery('#carbon_breadcrumbs').val();
		jQuery('#carbon_breadcrumbs').change();
	}

	//display secondary page title
	if (jQuery('#carbon_hide_sec_pagetitle').val() != _default_hide_sec_pagetitle){
		_default_hide_sec_pagetitle = jQuery('#carbon_hide_sec_pagetitle').val();
		jQuery('#carbon_hide_sec_pagetitle').change();
	}
	
	//display page title
	if (jQuery('#carbon_hide_pagetitle').val() != _default_hide_pagetitle){
		_default_hide_pagetitle = jQuery('#carbon_hide_pagetitle').val();
		jQuery('#carbon_hide_pagetitle').change();
	}
	
	
	//breadcrumbs_shop
	if (jQuery('#carbon_breadcrumbs_shop').val() != _default_breadcrumbs_shop){
		_default_breadcrumbs_shop = jQuery('#carbon_breadcrumbs_shop').val();
		jQuery('#carbon_breadcrumbs_shop').change();
	}

	//display secondary page title
	if (jQuery('#carbon_hide_sec_pagetitle_shop').val() != _default_hide_sec_pagetitle_shop){
		_default_hide_sec_pagetitle_shop = jQuery('#carbon_hide_sec_pagetitle_shop').val();
		jQuery('#carbon_hide_sec_pagetitle_shop').change();
	}
	
	//display page title
	if (jQuery('#carbon_hide_pagetitle_shop').val() != _default_hide_pagetitle_shop){
		_default_hide_pagetitle_shop = jQuery('#carbon_hide_pagetitle_shop').val();
		jQuery('#carbon_hide_pagetitle_shop').change();
	}

	//pagetitle shadow
	if (jQuery('#carbon_page_title_shadow').val() != _default_page_title_shadow){
		_default_page_title_shadow = jQuery('#carbon_page_title_shadow').val();
		jQuery('#carbon_page_title_shadow').change();
	}

	//show secondary footer options
  	if (jQuery('#carbon_show_sec_footer').val() != _default_show_secondary_footer){
	  	_default_show_secondary_footer = jQuery('#carbon_show_sec_footer').val();
	  	jQuery('#carbon_show_sec_footer').change();
  	}
	
	//show primary footer options
  	if (jQuery('#carbon_show_primary_footer').val() != _default_show_primary_footer){
	  	_default_show_primary_footer = jQuery('#carbon_show_primary_footer').val();
	  	jQuery('#carbon_show_primary_footer').change();
  	}
  
  	//show twitter newsletter footer options
  	if (jQuery('#carbon_show_twitter_newsletter_footer').val() != _default_show_twitter_newsletter_footer){
	  	_default_show_twitter_newsletter_footer = jQuery('#carbon_show_twitter_newsletter_footer').val();
	  	jQuery('#carbon_show_twitter_newsletter_footer').change();
  	}
  	
  	// header type light
  	if (jQuery('#carbon_headerbg_type_light').val() != _default_headerbg_type_light){
	  	_default_headerbg_type_light = jQuery('#carbon_headerbg_type_light').val();
	  	jQuery('#carbon_headerbg_type_light').change();
  	}
  	
  	// header type dark
  	if (jQuery('#carbon_headerbg_type_dark').val() != _default_headerbg_type_dark){
	  	_default_headerbg_type_dark = jQuery('#carbon_headerbg_type_dark').val();
	  	jQuery('#carbon_headerbg_type_dark').change();
  	}
  	
  	// header after scroll type light
  	if (jQuery('#carbon_headerbg_after_scroll_type_light').val() != _default_headerbg_after_scroll_type_light){
	  	_default_headerbg_after_scroll_type_light = jQuery('#carbon_headerbg_after_scroll_type_light').val();
	  	jQuery('#carbon_headerbg_after_scroll_type_light').change();
  	}
  	
  	// header after scroll type dark
  	if (jQuery('#carbon_headerbg_after_scroll_type_dark').val() != _default_headerbg_after_scroll_type_dark){
	  	_default_headerbg_after_scroll_type_dark = jQuery('#carbon_headerbg_after_scroll_type_dark').val();
	  	jQuery('#carbon_headerbg_after_scroll_type_dark').change();
  	}

  	// show header & top contents type
  	if (jQuery('#carbon_toppanelbg_type').val() != _default_toppanelbg_type){
	  	_default_toppanelbg_type = jQuery('#carbon_toppanelbg_type').val();
	  	jQuery('#carbon_toppanelbg_type').change();
  	}
  	
  	// secondary footer type opts
  	if (jQuery('#carbon_sec_footerbg_type').val() != _default_sec_footerbg_type){
	  	_default_sec_footerbg_type = jQuery('#carbon_sec_footerbg_type').val();
	  	jQuery('#carbon_sec_footerbg_type').change();
  	}
  	
  	// primary footer type opts
  	if (jQuery('#carbon_footerbg_type').val() != _default_footerbg_type){
	  	_default_footerbg_type = jQuery('#carbon_footerbg_type').val();
	  	jQuery('#carbon_footerbg_type').change();
  	}
  	
  	// twitter newsletter type opts 
  	if (jQuery('#carbon_twitter_newsletter_type').val() != _default_twitter_newsletter_type){
	  	_default_twitter_newsletter_type = jQuery('#carbon_twitter_newsletter_type').val();
	  	jQuery('#carbon_twitter_newsletter_type').change();
  	}
  	
  	// thumbails animate
  	if (jQuery('#carbon_animate_thumbnails').val() != _default_animate_thumbnails){
	  	_default_animate_thumbnails = jQuery('#carbon_animate_thumbnails').val();
	  	jQuery('#carbon_animate_thumbnails').change();
  	}
  	
  	//body shadow
  	if (jQuery('#carbon_body_shadow').val() != _default_body_shadow){
	  	_default_body_shadow = jQuery('#carbon_body_shadow').val();
	  	jQuery('#carbon_body_shadow').change();
  	}
  
  	//body background type
  	if (jQuery('#carbon_body_type').val() != _default_body_background){
	  	_default_body_background = jQuery('#carbon_body_type').val();
	  	jQuery('#carbon_body_type').change();
  	}
  
  	//body layout page
  	if (jQuery('#carbon_body_layout_type').val() != _default_body_layout_type){
	  	_default_body_layout_type = jQuery('#carbon_body_layout_type').val();
	  	jQuery('#carbon_body_layout_type').change();
  	}
  
  	//header background type
  	if (jQuery('#carbon_header_type').val() != _default_header_bkg){
	  	_default_header_bkg = jQuery('#carbon_header_type').val();
	  	jQuery('#carbon_header_type').change();
  	}
  	
  	//header background type _shop
  	if (jQuery('#carbon_header_type_shop').val() != _default_header_bkg_shop){
	  	_default_header_bkg_shop = jQuery('#carbon_header_type_shop').val();
	  	jQuery('#carbon_header_type_shop').change();
  	}
  
  	//google fonts
  	if (jQuery('#carbon_enable_google_fonts').val() != _default_google_fonts){
	  	_default_google_fonts = jQuery('#carbon_enable_google_fonts').val();
	  	jQuery('#carbon_enable_google_fonts').change();
  	}
  
  	//projects enlarge pics
  	if (jQuery('#carbon_single_layout').val() != _default_proj_layout){
	 	_default_proj_layout = jQuery('#carbon_single_layout').val();
	 	jQuery('#carbon_single_layout').change();
  	}
  	
  	//projects open|close
  	if (jQuery('#carbon_enable_open_close_categories').val() != _default_enable_open_close_categories){
	 	_default_enable_open_close_categories = jQuery('#carbon_enable_open_close_categories').val();
	 	jQuery('#carbon_enable_open_close_categories').change();
  	}
  
  	//FOOTER RIGHT CONTENT
    if (jQuery('#carbon_footer_right_content').val() != _default_footer_right){
	    _default_footer_right = jQuery('#carbon_footer_right_content').val();
	    jQuery('#carbon_footer_right_content').change();
    }
    
    //TOPPANEL
    if ( jQuery('#carbon_enable_top_panel').val() != _default_top_panel ) {
    	_default_top_panel = jQuery('#carbon_enable_top_panel').val();
		jQuery('#carbon_enable_top_panel').change();    
    }
    
    //WIDGETS AREA
    if (jQuery('#carbon_enable_widgets_area').val() != _default_widgets_area){
	    _default_widgets_area = jQuery('#carbon_enable_widgets_area').val();
	    jQuery('#carbon_enable_widgets_area').change();
    }
    
    //SOCIAL ICONS
    if (jQuery('#carbon_enable_socials').val() != _default_enable_socials){
	    _default_enable_socials = jQuery('#carbon_enable_socials').val();
	    jQuery('#carbon_enable_socials').change();
    }
    
    //404
    if (jQuery('#carbon_404_error_image').val() != def_notfound){
		def_notfound = jQuery('#carbon_404_error_image').val();
		jQuery('#carbon_404_error_image').change();
    }
    
    //SIDEBAR
    if (jQuery('#sidebar_name_list').html() != def_sidebars){
	    var sidebars = "";
	    jQuery('#sidebar_name_list li').each(function(){
		    sidebars += jQuery(this).children('span').html()+"|*|";
	    });
	    jQuery('input#carbon_sidebar_name_names').val(sidebars);
	    def_sidebars = jQuery('#sidebar_name_list').html();
    }
    
    //FOOTER
    if ( jQuery('#carbon_footer_number_cols').val() != cols_default ) {
    	cols_default  = jQuery('#carbon_footer_number_cols').val();
		jQuery('#carbon_footer_number_cols').change();    
    }
    
    //TOP PANEL
    if ( jQuery('#carbon_toppanel_number_cols').val() != tp_cols_default ) {
    	tp_cols_default  = jQuery('#carbon_toppanel_number_cols').val();
		jQuery('#carbon_toppanel_number_cols').change();  
    }
    
    if (jQuery('#carbon_enable_ajax_search').val() != _default_ajax_search){
	    _default_ajax_search = jQuery('#carbon_enable_ajax_search').val();
	    jQuery('#carbon_enable_ajax_search').change();
    }
    
    if (jQuery('#carbon_enable_search').val() != _default_search){
	 	_default_search = jQuery('#carbon_enable_search').val();
	 	jQuery('#carbon_enable_search').change();
    }
    
    if (jQuery('#carbon_enable_website_loader').val() != _default_website_loader){
	    _default_website_loader = jQuery('#carbon_enable_website_loader').val();
	    jQuery('#carbon_enable_website_loader').change();
    }
    
    if (jQuery('#carbon_pagetitle_image_overlay').val() != _default_overlay_enable){
	    _default_overlay_enable = jQuery('#carbon_pagetitle_image_overlay').val();
	    jQuery('#carbon_pagetitle_image_overlay').change();
    }
    
    if (jQuery('#carbon_pagetitle_image_overlay_shop').val() != _default_overlay_enable_shop){
	    _default_overlay_enable_shop = jQuery('#carbon_pagetitle_image_overlay_shop').val();
	    jQuery('#carbon_pagetitle_image_overlay_shop').change();
    }
        
    if (jQuery('#carbon_pagetitle_overlay_type').val() != _default_overlay_type){
	    _default_overlay_type = jQuery('#carbon_pagetitle_overlay_type').val();
	    jQuery('#carbon_pagetitle_overlay_type').change();
    }
    
    if (jQuery('#carbon_pagetitle_overlay_type_shop').val() != _default_overlay_type_shop){
	    _default_overlay_type_shop = jQuery('#carbon_pagetitle_overlay_type_shop').val();
	    jQuery('#carbon_pagetitle_overlay_type_shop').change();
    }
    
    //project single socials
	if (jQuery('#carbon_project_single_social_shares').val() != _default_project_single_social){
		_default_project_single_social = jQuery('#carbon_project_single_social_shares').val();
		jQuery('#carbon_project_single_social_shares').change();
	}
	
	//post single socials
	if (jQuery('#carbon_post_single_social_shares').val() != _default_post_single_social){
		_default_post_single_social = jQuery('#carbon_post_single_social_shares').val();
		jQuery('#carbon_post_single_social_shares').change();
	}
	
	//metas
	if (jQuery('#carbon_display_metas').val() != _default_display_metas){
		_default_display_metas = jQuery('#carbon_display_metas').val();
		jQuery('#carbon_display_metas').change();
	}
    
  }, 1000);

});
