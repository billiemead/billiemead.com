<?php
	
/*-----------------------------------------------------------------------------------*/
/*  Carbon Theme Styles
/*-----------------------------------------------------------------------------------*/

function carbon_custom_style() {
	
	global $carbon_custom, $carbon_styleColor, $post, $carbon_import_fonts, $carbon_header_bgstyle_pre, $carbon_header_bgstyle_after;
	$carbon_theid = get_the_ID();
	$carbon_styleColor = "#".get_option("carbon_style_color");
	if ("#".get_option("carbon_style_color") != $carbon_styleColor) $carbon_styleColor = "#".get_option("carbon_style_color");
	$carbon_color_code = substr($carbon_styleColor,1);
	$carbon_styleColor_rgb = carbon_hex2rgb($carbon_styleColor);

	$carbon_headerType = get_option("carbon_header_type");
	
	$carbon_header_bgstyle_pre = get_option('carbon_header_style_light_dark', 'light') == 'light' ? 'light' : 'dark';
	$carbon_header_bgstyle_after = get_option('carbon_header_after_scroll_style_light_dark', 'light') == 'light' ? 'light' : 'dark';
	
	if (is_singular() && get_post_meta($carbon_theid, 'carbon_enable_custom_header_options_value', true) == 'yes'){
		$carbon_header_bgstyle_pre = get_post_meta($carbon_theid, 'carbon_custom_header_pre_value', true);
		$carbon_header_bgstyle_after = get_post_meta($carbon_theid, 'carbon_custom_header_after_value', true);
	}
	
	$carbon_header_style_pre = $carbon_header_bgstyle_pre == 'dark' ? 'light' : 'dark';
	$carbon_header_style_after = $carbon_header_bgstyle_after == 'dark' ? 'light' : 'dark';
	
	global $carbon_import_fonts;
	
	$carbon_style_data = "";
	
	$carbon_style_data .= ".widget li a:after, .widget_nav_menu li a:after, .custom-widget.widget_recent_entries li a:after{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_p_color"))).";
	}
	body, p, .lovepost a, .widget ul li a, .widget p, .widget span, .widget ul li, .the_content ul li, .the_content ol li, #recentcomments li, .custom-widget h4, .widget.des_cubeportfolio_widget h4, .widget.des_recent_posts_widget h4, .custom-widget ul li a, .aio-icon-description, li, .smile_icon_list li .icon_description p{
		";
		$font = get_option('carbon_p_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "" ;
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."' ,sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_p_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_p_color"))).";
	}
	
	.map_info_text{
		";
		$font = get_option('carbon_p_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."' ,sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_p_size')), 10)."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_p_color")))." !important;
	}
	
	a.pageXofY .pageX, .pricing .bestprice .name, .filter li a:hover, .widget_links ul li a:hover, #contacts a:hover, .title-color, .ms-staff-carousel .ms-staff-info h4, .filter li a:hover, .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, a.go-about:hover, .text_color, .navbar-nav .dropdown-menu a:hover, .profile .profile-name, #elements h4, #contact li a:hover, #agency-slider h5, .ms-showcase1 .product-tt h3, .filter li a.active, .contacts li i, .big-icon i, .navbar-default.dark .navbar-brand:hover,.navbar-default.dark .navbar-brand:focus, a.p-button.border:hover, .navbar-default.light-menu .navbar-nav > li > a.selected, .navbar-default.light-menu .navbar-nav > li > a.hover_selected, .navbar-default.light-menu .navbar-nav > li > a.selected:hover, .navbar-default.light-menu .navbar-nav > li > a.hover_selected:hover, .navbar-default.light-menu .navbar-nav > li > a.selected, .navbar-default.light-menu .navbar-nav > li > a.hover_selected, .navbar-default.light-menu .navbar-nav > .open > a,.navbar-default.light-menu .navbar-nav > .open > a:hover, .navbar-default.light-menu .navbar-nav > .open > a:focus, .light-menu .dropdown-menu > li > a:focus, a.social:hover:before, .symbol.colored i, .icon-nofill, .slidecontent-bi .project-title-bi p a:hover, .grid .figcaption a.thumb-link:hover, .tp-caption a:hover, .btn-1d:hover, .btn-1d:active, #contacts .tweet_text a, #contacts .tweet_time a, .social-font-awesome li a:hover, h2.post-title a:hover, .tags a:hover, .carbon-button-color span, #contacts .form-success p, .nav-container .social-icons-fa a i:hover, .the_title h2 a:hover, .widget ul li a:hover, .des-pages .postpagelinks, .widget_nav_menu .current-menu-item > a, .team-position, .nav-container .carbon_minicart li a:hover, .metas-container i, .header_style2_contact_info .telephone-contact .email, .special_tabs.icontext .label.current i, .special_tabs.icontext .label.current a, .special_tabs.text .label.current a, .widget-contact-content i{
	  color: ".esc_html($carbon_styleColor).";
	}
	.testimonials.style1 .testimonial span a{
		color: ".esc_html($carbon_styleColor)." !important;
	}
	.testimonials .cover-test-img{background:rgba(".$carbon_styleColor_rgb[0].",".$carbon_styleColor_rgb[1].",".$carbon_styleColor_rgb[2].",.8);}
	.aio-icon-read, .tp-caption a.text_color{color: ".esc_html($carbon_styleColor)." !important;}
	
	#big_footer .social-icons-fa a i{color:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sec_footer_social_icons_color"))).";}
	#big_footer .social-icons-fa a i:hover{color:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sec_footer_social_icons_hover_color"))).";}
	
	.homepage_parallax .home-logo-text a.light:hover, .homepage_parallax .home-logo-text a.dark:hover, .widget li a:hover:before, .widget_nav_menu li a:hover:before, .footer_sidebar ul li a:hover:before, .custom-widget li a:hover:before, .single-portfolio .social-shares ul li a:hover i{
		color: ".esc_html($carbon_styleColor)." !important;
	}
	
	
	a.sf-button.hide-icon, .tabs li.current, .readmore:hover, .navbar-default .navbar-nav > .open > a,.navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus, a.p-button:hover, a.p-button.colored, .light #contacts a.p-button, .tagcloud a:hover, .rounded.fill, .colored-section, .pricing .bestprice .price, .pricing .bestprice .signup, .signup:hover, .divider.colored, .services-graph li span, .no-touch .hi-icon-effect-1a .hi-icon:hover, .hi-icon-effect-1b .hi-icon:hover, .no-touch .hi-icon-effect-1b .hi-icon:hover, .symbol.colored .line-left, .symbol.colored .line-right, .projects-overlay #projects-loader, .panel-group .panel.active .panel-heading, .double-bounce1, .double-bounce2, .carbon-button-color-1d:after, .container1 > div, .container2 > div, .container3 > div, .cbp-l-caption-buttonLeft:hover, .cbp-l-caption-buttonRight:hover, .post-content a:hover .post-quote, .post-listing .post a:hover .post-quote, .carbon-button-color-1d:after, .woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range, .btn-contact-left input, .single #commentform .form-submit #submit, a#send-comment, .errorbutton, .modal-popup-link .tooltip-content, .woocommerce span.onsale, .woocommerce-page span.onsale, .des-button-dark{
		background-color:".esc_html($carbon_styleColor).";
	}
	.aio-icon-tooltip .aio-icon:hover:after{box-shadow:0 0 0 1px ".esc_html($carbon_styleColor)." !important;}
	.just-icon-align-left .aio-icon:hover, .aio-icon-tooltip .aio-icon:hover, .btn-contact-left.inversecolor input:hover{
		background-color:".esc_html($carbon_styleColor)." !important;
	}
	.aio-icon-tooltip .aio-icon.none:hover{background-color: transparent !important;}
	
	.widget .slick-dots li.slick-active i{color: ".esc_html($carbon_styleColor)." !important;opacity: 1;}
	
	
	.woocommerce #content input.button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-page #content input.button, .woocommerce-page #respond input#submit, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce #content div.product form.cart .button, .woocommerce div.product form.cart .button, .woocommerce-page #content div.product form.cart .button, .woocommerce-page div.product form.cart .button, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale, .top-bar .phone-mail li.text_field,
		#primary_footer input[type='submit']{
		background-color:".esc_html($carbon_styleColor).";
		color: #fff !important;
	}
	.nav-container a.button.carbon_minicart_checkout_but:hover, .nav-container a.button.carbon_minicart_cart_but:hover{
		background-color: ".esc_html($carbon_styleColor)." !important;
		color: #fff !important;
		border: 1px solid ".esc_html($carbon_styleColor)." !important;
		opacity: 1;
	}
	.carbon-button-color-1d:hover, .carbon-button-color-1d:active{
		border: 1px double ".esc_html($carbon_styleColor).";
	}
	
	.carbon-button-color{
		background-color:".esc_html($carbon_styleColor).";
		color: ".esc_html($carbon_styleColor).";
	}
	.cbp-l-caption-alignCenter .cbp-l-caption-buttonLeft:hover, .cbp-l-caption-alignCenter .cbp-l-caption-buttonRight:hover {
	    background-color:".esc_html($carbon_styleColor)." !important;
	    border:1px solid ".esc_html($carbon_styleColor)." !important;
	    color: #fff !important;
	}
	.widget_posts .tabs li.current{border: 1px solid ".esc_html($carbon_styleColor).";}
	.hi-icon-effect-1 .hi-icon:after{box-shadow: 0 0 0 3px ".esc_html($carbon_styleColor).";}
	.colored-section:after {border: 20px solid ".esc_html($carbon_styleColor).";}
	.filter li a.active, .filter li a:hover, .panel-group .panel.active .panel-heading{border:1px solid ".esc_html($carbon_styleColor).";}
	.navbar-default.light-menu.border .navbar-nav > li > a.selected:before, .navbar-default.light-menu.border .navbar-nav > li > a.hover_selected:before, .navbar-default.light-menu.border .navbar-nav > li > a.selected:hover, .navbar-default.light-menu.border .navbar-nav > li > a.hover_selected:hover, .navbar-default.light-menu.border .navbar-nav > li > a.selected, .navbar-default.light-menu.border .navbar-nav > li > a.hover_selected{
		border-bottom: 1px solid ".esc_html($carbon_styleColor).";
	}
	
	
	
	.doubleborder{
		border: 6px double ".esc_html($carbon_styleColor).";
	}
	
	
	.special_tabs.icon .current .carbon_icon_special_tabs{
		border: 1px solid transparent;
	}
	.carbon-button-color, .des-pages .postpagelinks, .tagcloud a:hover{
		border: 1px solid ".esc_html($carbon_styleColor).";
	}
	
	.navbar-collapse ul.menu-depth-1 li:not(.carbon_mega_hide_link) a, .dl-menuwrapper li:not(.carbon_mega_hide_link) a, .gosubmenu, .nav-container .carbon_minicart ul li {";
		$font = get_option('carbon_sub_menu_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."', sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_sub_menu_font_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color'))).";";
		if (get_option('carbon_sub_menu_uppercase') === 'on') $carbon_style_data .= "text-transform: uppercase;\n";
		$carbon_style_data .= "letter-spacing: ".esc_html(intval(get_option('carbon_sub_menu_letter_spacing'),10))."px;
	}
	.dl-back{color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color')).";}
	
	.navbar-collapse ul.menu-depth-1 li:not(.carbon_mega_hide_link):hover > a, .dl-menuwrapper li:not(.carbon_mega_hide_link):hover > a, .dl-menuwrapper li:not(.carbon_mega_hide_link):hover > a, .dl-menuwrapper li:not(.carbon_mega_hide_link):hover > .gosubmenu, .dl-menuwrapper li.dl-back:hover, .navbar-nav .dropdown-menu a:hover i, .dropdown-menu li.menu-item-has-children:not(.carbon_mega_hide_link):hover > a:before{
		color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color_hover')).";
	}
		
	
	
	.menu-simple ul.menu-depth-1, .menu-simple ul.menu-depth-1 ul, .menu-simple ul.menu-depth-1, .menu-simple #dl-menu ul{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}
	
	
	
	.navbar-collapse .carbon_mega_menu ul.menu-depth-2, .navbar-collapse .carbon_mega_menu ul.menu-depth-2 ul {background-color: transparent !important;} 
	
	.dl-menuwrapper li:not(.carbon_mega_hide_link):hover > a{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color_hover")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}
	
	.menu-simple li:not(.carbon_mega_menu) li.menu-item-depth-1:hover > a, .menu-simple li.menu-item-depth-2:hover > a, .menu-simple li.menu-item-depth-3:hover > a{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color_hover")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}
	
	.menu-square li:not(.carbon_mega_menu) li.menu-item-depth-1:hover > a, .menu-square li.menu-item-depth-2:hover > a, .menu-square li.menu-item-depth-3:hover > a{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color_hover")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}
	
	
	
	.navbar-collapse li:not(.carbon_mega_menu) ul.menu-depth-1 li:not(:first-child){
		border-top: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
	}
	
	
	
	.navbar-collapse li.carbon_mega_menu ul.menu-depth-2{
		border-right: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
	}
	.rtl .navbar-collapse li.carbon_mega_menu ul.menu-depth-2{
		border-left: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
	}
		
	#dl-menu ul li:not(:last-child) a, .carbon_sub_menu_border_color{
		border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
	}
	
	.navbar-collapse ul.navbar-nav > li > a, .navbar-collapse > .header_style2_menu > ul > li > a{";
		$font = get_option('carbon_menu_font_pre_'.$carbon_header_style_pre); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."', sans-serif;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_menu_font_size_pre_'.$carbon_header_style_pre),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_pre_'.$carbon_header_style_pre))).";";
		if (get_option('carbon_menu_uppercase_pre_'.$carbon_header_style_pre) === 'on') $carbon_style_data .= "text-transform: uppercase;\n"; else $carbon_style_data .= "text-transform:none;\n";
		$carbon_style_data .= "letter-spacing: ".esc_html(intval(get_option('carbon_menu_letter_spacing_pre_'.$carbon_header_style_pre),10))."px;
	}
	
	.navbar-collapse > .header_style2_menu > ul > li > a:hover, 
	.navbar-collapse > .header_style2_menu > ul > li.current-menu-ancestor > a, 
	.navbar-collapse > .header_style2_menu > ul > li.current-menu-item > a, 
	.navbar-collapse > .header_style2_menu > ul > li > a.selected,
	.navbar-collapse > .header_style2_menu > ul > li > a.hover_selected,
	.navbar-collapse ul.navbar-nav > li > a:hover, 
	.navbar-collapse ul.navbar-nav > li.current-menu-ancestor > a, 
	.navbar-collapse ul.navbar-nav > li.current-menu-item > a, 
	.navbar-collapse ul.navbar-nav > li > a.selected,
	.navbar-collapse ul.navbar-nav > li > a.hover_selected{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_pre_'.$carbon_header_style_pre)))." !important;
	}
	
	
	.header.navbar .navbar-collapse ul li:hover a 
	{
		background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_pre_'.$carbon_header_style_pre))).";
		color: #fff !important;
	}
	
	";	
	if (get_option('carbon_menu_add_border_pre_'.$carbon_header_style_pre) == "on"){
		$carbon_style_data .= ".navbar-collapse ul.menu-depth-1, .nav-container .carbon_minicart{border-top:1px solid #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_border_color_pre_'.$carbon_header_style_pre))." !important;}";
	}
	
	$carbon_style_data .= "
	
	
	header.style2 .navbar-nav > li, .navbar-default.menu-square.style2 .navbar-nav > li {padding-top:0px;}
	header.style2{
		padding-bottom:".esc_html(intval(get_option('carbon_menu_margin_top_pre_'.$carbon_header_style_pre),10))."px;
	}
	
	
	.navbar-default .navbar-nav > li > a{
		padding-right:".esc_html(intval(get_option('carbon_menu_side_margin_pre_'.$carbon_header_style_pre),10))."px;
		padding-left:".esc_html(intval(get_option('carbon_menu_side_margin_pre_'.$carbon_header_style_pre),10))."px;
		padding-top:".esc_html(intval(get_option('carbon_menu_margin_top_pre_'.$carbon_header_style_pre),10))."px;
		padding-bottom:".esc_html(intval(get_option('carbon_menu_padding_bottom_pre_'.$carbon_header_style_pre),10))."px;
	}
	
	
	header .search_trigger, header .menu-controls, header .carbon_dynamic_shopping_bag, header .header_social_icons.with-social-icons{
		padding-top:".esc_html(intval(get_option('carbon_menu_margin_top_pre_'.$carbon_header_style_pre),10))."px;
		padding-bottom:".esc_html(intval(get_option('carbon_menu_padding_bottom_pre_'.$carbon_header_style_pre),10))."px;
	}
	
	header.style2 .header_style2_menu{
		border-top: 1px solid #".esc_html(get_option('carbon_sub_menu_bg_color')).";
		border-bottom: 1px solid #".esc_html(get_option('carbon_sub_menu_bg_color')).";

	}
	
	header:not(.header_after_scroll) .navbar-nav > li > ul{
		margin-top:".esc_html(intval(get_option('carbon_menu_padding_bottom_pre_'.$carbon_header_style_pre),10))."px;
	}

	header:not(.header_after_scroll) .dl-menuwrapper button:after{
		background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_pre_'.$carbon_header_style_pre))).";
		box-shadow: 0 6px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_pre_'.$carbon_header_style_pre))).", 0 12px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_pre_'.$carbon_header_style_pre))).";
	}

	.carbon_minicart_wrapper{
		padding-top: ".esc_html(intval(get_option('carbon_menu_padding_bottom_pre_'.$carbon_header_style_pre),10))."px;
	}
	
	li.carbon_mega_hide_link > a, li.carbon_mega_hide_link > a:hover{";
		$font = get_option('carbon_label_menu_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."' !important;
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_label_menu_font_size'),10))."px !important;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_label_menu_color')))." !important;";
		if (get_option('carbon_label_menu_uppercase') === 'on') $carbon_style_data .= "text-transform: uppercase !important;\n";
		$carbon_style_data .= "letter-spacing: ".esc_html(intval(get_option('carbon_label_menu_letter_spacing'),10))."px !important;
	}
	
	.nav-container .carbon_minicart li a{";
		$font = get_option('carbon_sub_menu_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_sub_menu_font_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color'))).";";
		if (get_option('carbon_sub_menu_uppercase') === 'on') $carbon_style_data .= "text-transform: uppercase;\n";
		$carbon_style_data .= "letter-spacing: ".esc_html(intval(get_option('carbon_sub_menu_letter_spacing')),10)."px;
	}
	
	.dl-trigger{";
		$font = get_option('carbon_menu_font_pre_'.$carbon_header_style_pre); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."' !important;
		font-weight: ".esc_html($font[1])." !important;
		font-size: ".esc_html(intval(get_option('carbon_menu_font_size_pre_'.$carbon_header_style_pre),10))."px;";
		if (get_option('carbon_menu_uppercase_pre_'.$carbon_header_style_pre) === 'on') $carbon_style_data .= "text-transform: uppercase;\n";
		$carbon_style_data .= "letter-spacing: ".esc_html(intval(get_option('carbon_menu_letter_spacing_pre_'.$carbon_header_style_pre),10))."px;
	}
	
	.carbon_minicart{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}
	
	.page_content a, header a, #big_footer a{";
		$font = get_option('carbon_links_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_links_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_links_color")))."
	}
	
	
	.archive .the_title h2 a, .page-template-blog-template .the_title h2 a, .home.blog .blog-default.wideblog .container .the_title h2 a{";
		$font = get_option('carbon_blog_normal_title_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1])." !important;
		font-size: ".esc_html(intval(get_option('carbon_blog_normal_title_size'), 10))."px !important;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_blog_normal_title_color")))."
	}
	
	
	.blog-default-bg-masonry .the_title h2 a{";
		$font = get_option('carbon_blog_masonry_title_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1])." !important;
		font-size: ".esc_html(intval(get_option('carbon_blog_masonry_title_size'), 10))."px !important;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_blog_masonry_title_color")))."
	}
	
	.page_content a:hover, header a:hover, #big_footer a:hover, .page-template-blog-masonry-template .posts_category_filter li:active,.page-template-blog-masonry-template .posts_category_filter li:focus,.metas-container a:hover{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_links_color_hover"))).";
		background-color: #".esc_html( is_array(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_links_bg_color_hover"))) ? "" : str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_links_bg_color_hover")) ).";
	}
	
	h1{";
		$font = get_option('carbon_h1_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_h1_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_h1_color"))).";
	}
	
	h2{";
		$font = get_option('carbon_h2_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_h2_size'), 10))."px;
		color: #".esc_html(get_option('carbon_h2_color')).";
	}
	
	h3{";
		$font = get_option('carbon_h3_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_h3_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_h3_color"))).";
	}
	
	h4{";
		$font = get_option('carbon_h4_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_h4_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_h4_color"))).";
	}
	
	.ult-item-wrap .title h4{font-size: 16px !important;}
	.wpb_content_element .wpb_accordion_header.ui-accordion-header-active a{color: ".esc_html($carbon_styleColor).";}
	h5{";
		$font = get_option('carbon_h5_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_h5_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_h5_color"))).";
	}
	
	h6{";
		$font = get_option('carbon_h6_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option('carbon_h6_size'), 10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_h6_color"))).";
	}
		
	header.navbar{";
		switch (get_option('carbon_headerbg_type_'.$carbon_header_bgstyle_pre)){
			case "color":
				$color = carbon_hex2rgb( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_headerbg_color_".$carbon_header_bgstyle_pre) ));
				$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_headerbg_opacity_".$carbon_header_bgstyle_pre)))/100).");";
			break;
			case "image":
				$carbon_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
				$carbon_style_data .= "background: url(" . esc_url(get_option("carbon_headerbg_image_".$carbon_header_bgstyle_pre)) . ") no-repeat fixed !important; background-size: cover !important;";  
			break;
			case "pattern":
				$carbon_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/carbon_patterns/" . get_option("carbon_headerbg_pattern_".$carbon_header_bgstyle_pre) . "') 0 0 repeat !important;";
			break;
			case "custom_pattern":
				$carbon_style_data .= "background: url('" . esc_url(get_option("carbon_headerbg_custom_pattern_".$carbon_header_bgstyle_pre)) . "') 0 0 repeat !important;";
			break;
		}
	$carbon_style_data .= "
	}
	
	body#boxed_layout{";
		switch (get_option("carbon_bodybg_type")){
			case "image":
				$carbon_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;width: 100%;height: 100%;
	background-attachment: fixed !important;";
				$carbon_style_data .= "background: url(" . esc_url(get_option("carbon_bodybg_type_image")) . ") no-repeat;";  
			break;
			case "color":
	 			$carbon_style_data .= "background-color: #" . esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_bodybg_type_color"))) . ";";
			break;
		}
	$carbon_style_data .= "
	}
	
	header .header_style2_contact_info{";
		if (get_option("carbon_logo_margin_top")) 
			$carbon_style_data .= "margin-top: " . str_replace(" ", "", get_option("carbon_logo_margin_top")) . " !important;margin-bottom: " . str_replace(" ", "", get_option("carbon_logo_margin_top")) . " !important;
	}
	
	header .navbar-header, header.style4 .nav-container .navbar-header .navbar-brand{";
		if (get_option("carbon_logo_margin_top")) 
			$carbon_style_data .= "margin-top: " . str_replace(" ", "", get_option("carbon_logo_margin_top")) . ";margin-bottom: " . str_replace(" ", "", get_option("carbon_logo_margin_top")) . ";"; 
		if (get_option("carbon_logo_margin_left")) $carbon_style_data .= "margin-left: " . str_replace(" ", "", get_option("carbon_logo_margin_left")) . ";"; 
		if (get_option("carbon_logo_height")) $carbon_style_data .= "height:" . get_option("carbon_logo_height") . ";";
	$carbon_style_data .= "
	}
	header a.navbar-brand img{max-height: ".esc_html(intval(get_option('carbon_logo_height'),10))."px;}";
			
	$header_after_scroll = false;
	if (get_option('carbon_fixed_menu') == 'on'){
		if (get_option('carbon_header_after_scroll') == 'on'){
			$header_after_scroll = true;
			$carbon_style_data .= "
			header.navbar.header_after_scroll, header.header_after_scroll .navbar-nav > li.carbon_mega_menu > .dropdown-menu, header.header_after_scroll .navbar-nav > li:not(.carbon_mega_menu) .dropdown-menu{";
				switch (get_option('carbon_headerbg_after_scroll_type_'.$carbon_header_bgstyle_after)){
					case "color":
						$color = carbon_hex2rgb( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_headerbg_after_scroll_color_".$carbon_header_bgstyle_after) ));
						$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_headerbg_after_scroll_opacity_".$carbon_header_bgstyle_after)))/100).")";
					break;
					case "image":
						$carbon_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
						$carbon_style_data .= "background: url(" . esc_url(get_option("carbon_headerbg_after_scroll_image_".$carbon_header_bgstyle_after)) . ") no-repeat fixed !important; background-size: cover !important;";  
					break;
					case "pattern":
						$carbon_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/carbon_patterns/" . get_option("carbon_headerbg_after_scroll_pattern_".$carbon_header_bgstyle_after) . "') 0 0 repeat !important;";
					break;
					case "custom_pattern":
						$carbon_style_data .= "background: url('" . esc_url(get_option("carbon_headerbg_after_scroll_custom_pattern_".$carbon_header_bgstyle_after)) . "') 0 0 repeat !important;";
					break;
				}
			$carbon_style_data .= "
			}
			";
			$header_shrink = false;
			if (get_option('carbon_fixed_menu') == 'on'){
				if (get_option('carbon_header_after_scroll') == 'on'){
					if (get_option('carbon_header_shrink_effect') == 'on'){
						$header_shrink = true;
						$carbon_style_data .= "header.header_after_scroll a.navbar-brand img.logo_after_scroll{max-height: ". esc_html(intval(get_option('carbon_logo_reduced_height'),10))."px;}";
					}
				}
			}
			
			$carbon_style_data .= "
			header.header_after_scroll .navbar-collapse ul.menu-depth-1 li:not(.carbon_mega_hide_link) a, header.header_after_scroll .dl-menuwrapper li:not(.carbon_mega_hide_link) a, header.header_after_scroll .gosubmenu {
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color'))).";
			}
			header.header_after_scroll .dl-back{color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color'))).";}
			
			header.header_after_scroll .navbar-collapse ul.menu-depth-1 li:not(.carbon_mega_hide_link):hover > a, header.header_after_scroll .dl-menuwrapper li:not(.carbon_mega_hide_link):hover > a, header.header_after_scroll .dl-menuwrapper li:not(.carbon_mega_hide_link):hover > a, header.header_after_scroll .dl-menuwrapper li:not(.carbon_mega_hide_link):hover > header.header_after_scroll .gosubmenu, header.header_after_scroll .dl-menuwrapper li.dl-back:hover, header.header_after_scroll.navbar .nav-container .dropdown-menu li:hover{
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_color_hover'))).";
			}
			
			header ul.menu-depth-1,
			header ul.menu-depth-1 ul,
			header ul.menu-depth-1 ul li,
			header #dl-menu ul,
			header.header_after_scroll ul.menu-depth-1,
			header.header_after_scroll ul.menu-depth-1 ul,
			header.header_after_scroll ul.menu-depth-1 ul li,
			header.header_after_scroll #dl-menu ul{";
				$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color")));
				$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
			}
			
			header.header_after_scroll .navbar-collapse .carbon_mega_menu ul.menu-depth-2, header.header_after_scroll .navbar-collapse .carbon_mega_menu ul.menu-depth-2 ul {background-color: transparent !important;} 
			

			header li:not(.carbon_mega_menu) ul.menu-depth-1 li:hover, header li.carbon_mega_menu li.menu-item-depth-1 li:hover, header #dl-menu ul li:hover
			,header.header_after_scroll li:not(.carbon_mega_menu) ul.menu-depth-1 li:hover, header.header_after_scroll li.carbon_mega_menu li.menu-item-depth-1 li:hover, header.header_after_scroll #dl-menu ul li:hover{";
				$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color_hover")));
				$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
			}

			
			header.header_after_scroll .navbar-collapse li:not(.carbon_mega_menu) ul.menu-depth-1 li:not(:first-child){
				border-top: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
			}
			header.header_after_scroll .navbar-collapse li.carbon_mega_menu ul.menu-depth-2{
				border-right: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
			}
			header.header_after_scroll #dl-menu li:not(:last-child) a, header.header_after_scroll #dl-menu ul li:not(:last-child) a{
				border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_sub_menu_border_color'))).";
			}
			
			.header_after_scroll .navbar-collapse ul.navbar-nav > li > a, .header_after_scroll .navbar-collapse > .header_style2_menu > ul > li > a{";
				$font = get_option('carbon_menu_font_after_'.$carbon_header_style_after); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
				$carbon_style_data .= "
				font-family: '".wp_kses_post($font[0])."';
				font-weight: ".esc_html($font[1]).";
				font-size: ".esc_html(intval(get_option('carbon_menu_font_size_after_'.$carbon_header_style_after),10))."px;
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_after_'.$carbon_header_style_after))).";";
				if (get_option('carbon_menu_uppercase_after_'.$carbon_header_style_after) === 'on') $carbon_style_data .= "text-transform: uppercase;\n"; else $carbon_style_data .= "text-transform:none;\n";
				$carbon_style_data .= "letter-spacing: ".esc_html(intval(get_option('carbon_menu_letter_spacing_after_'.$carbon_header_style_after),10))."px;
			}
			
			.header_after_scroll .navbar-collapse > .header_style2_menu > ul > li > a:hover,
			.header_after_scroll .navbar-collapse > .header_style2_menu > ul > li.current-menu-ancestor > a,
			.header_after_scroll .navbar-collapse > .header_style2_menu > ul > li.current-menu-item > a,
			.header_after_scroll .navbar-collapse > .header_style2_menu > ul > li > a.selected,
			.header_after_scroll .navbar-collapse > .header_style2_menu > ul > li > a.hover_selected,
			.header_after_scroll .navbar-collapse ul.navbar-nav > li > a:hover,
			.header_after_scroll .navbar-collapse ul.navbar-nav > li.current-menu-ancestor > a,
			.header_after_scroll .navbar-collapse ul.navbar-nav > li.current-menu-item > a,
			.header_after_scroll .navbar-collapse ul.navbar-nav > li > a.selected, .header_after_scroll .navbar-collapse ul.navbar-nav > li > a.hover_selected{
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_after_'.$carbon_header_style_after)))." !important;
			}
			
			.header_after_scroll .dl-menuwrapper button:after{
				background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_after_'.$carbon_header_style_after))).";
				box-shadow: 0 6px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_after_'.$carbon_header_style_after))).", 0 12px 0 #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_color_hover_after_'.$carbon_header_style_after))).";
			}";
			
			if (get_option('carbon_menu_add_border_after_'.$carbon_header_style_after) == "on"){
				$carbon_style_data .= ".header_after_scroll .navbar-collapse ul.menu-depth-1, .header_after_scroll .nav-container .carbon_minicart{border-top:3px solid #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option('carbon_menu_border_color_after_'.$carbon_header_style_after))." !important;}";
			}
			$carbon_style_data .= "
			header.header_after_scroll li.carbon_mega_hide_link > a, header.header_after_scroll li.carbon_mega_hide_link > a:hover{
				color: #".esc_html(get_option('carbon_label_menu_after_scroll_color'))." !important;
			}";
			
			$header_shrink = false;
			if (get_option('carbon_fixed_menu') == 'on'){
				if (get_option('carbon_header_after_scroll') == 'on'){
					if (get_option('carbon_header_shrink_effect') == 'on'){
						$header_shrink = true;
						$carbon_style_data .= "
						header.header_after_scroll.navbar-default .navbar-nav > li > a {
							padding-right:".esc_html(intval(get_option('carbon_menu_side_margin_after_'.$carbon_header_style_after),10))."px;
							padding-left:".esc_html(intval(get_option('carbon_menu_side_margin_after_'.$carbon_header_style_after),10))."px;
							padding-top:".esc_html(intval(get_option('carbon_menu_margin_top_after_'.$carbon_header_style_after),10))."px;
							padding-bottom:".esc_html(intval(get_option('carbon_menu_padding_bottom_after_'.$carbon_header_style_after),10))."px;
						}
						
						
						
						header.header_after_scroll.style2 .navbar-nav > li, .navbar-default.menu-square.style2 .navbar-nav > li {padding-top:0px;}
						header.header_after_scroll.style2{
							padding-bottom:".esc_html(intval(get_option('carbon_menu_margin_top_pre_'.$carbon_header_style_after),10))."px;
						}
						header.header_after_scroll.style2 .header_style2_menu{
							margin-top:".esc_html(intval(get_option('carbon_menu_margin_top_pre_'.$carbon_header_style_after),10))."px !important;
						}
						
						header.header_after_scroll .search_trigger, header.header_after_scroll .menu-controls, header.header_after_scroll .carbon_dynamic_shopping_bag, header.header_after_scroll .header_social_icons.with-social-icons{
							padding-top:".esc_html(intval(get_option('carbon_menu_margin_top_after_'.$carbon_header_style_after),10))."px;
							padding-bottom:".esc_html(intval(get_option('carbon_menu_padding_bottom_after_'.$carbon_header_style_after),10))."px;
						}
						
						header.header_after_scroll .navbar-nav > li > ul{
							margin-top:".esc_html(intval(get_option('carbon_menu_padding_bottom_after_'.$carbon_header_style_after),10))."px;
						}
					
						header.header_after_scroll .carbon_minicart_wrapper{
							padding-top:".esc_html(intval(get_option('carbon_menu_padding_bottom_after_'.$carbon_header_style_after),10))."px;
						}
						";
					}
				}
			}
		}
	}
		
		
	$header_shrink = false;
	if (get_option('carbon_fixed_menu') == 'on'){
		if (get_option('carbon_header_after_scroll') == 'on'){
			if (get_option('carbon_header_shrink_effect') == 'on'){
				$header_shrink = true;
				$carbon_style_data .= "
				header.header_after_scroll .header_style2_contact_info{";
					if (get_option("carbon_logo_after_scroll_margin_top")) $carbon_style_data .= "margin-top: " . str_replace(" ", "", get_option("carbon_logo_after_scroll_margin_top")) . " !important;margin-bottom: " . str_replace(" ", "", get_option("carbon_logo_after_scroll_margin_top")) . " !important;
				}
				header.header_after_scroll .navbar-header, header.style4.header_after_scroll .nav-container .navbar-header .navbar-brand{";
					if (get_option("carbon_logo_after_scroll_margin_top")) $carbon_style_data .= "margin-top: " . str_replace(" ", "", get_option("carbon_logo_after_scroll_margin_top")) . ";margin-bottom: " . str_replace(" ", "", get_option("carbon_logo_after_scroll_margin_top")) . ";"; 
					if (get_option("carbon_logo_after_scroll_margin_left")) $carbon_style_data .= "margin-left: " . str_replace(" ", "", get_option("carbon_logo_after_scroll_margin_left")) . ";"; 
					if (get_option("carbon_logo_reduced_height")) $carbon_style_data .= "height:" . get_option("carbon_logo_reduced_height") . ";"; 
					else {
						if (get_option("carbon_logo_height")) $carbon_style_data .= "height:" . get_option("carbon_logo_height") . ";";
					}
				$carbon_style_data .= "
				}
				header.header_after_scroll a.navbar-brand h1{
					font-size: " . str_replace(" ", "", get_option("carbon_logo_after_scroll_size")) . " !important;
				}
				";
			}
		}
	}
	
	if (get_option("carbon_info_above_menu") == "on"){
		$color = carbon_hex2rgb( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_bg_color") ));
		$carbon_style_data .= "
		header .top-bar .top-bar-bg, header .top-bar #lang_sel a.lang_sel_sel, header .top-bar #lang_sel > ul > li > ul > li > a{
			background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_topbar_bg_opacity")))/100).");
		}
		header .top-bar ul.phone-mail li, header .top-bar ul.phone-mail li i{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_text_color") )).";
		}
		header .top-bar a, header .top-bar ul.phone-mail li a{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_links_color") ))." !important;
		}
		header .top-bar a:hover, header .top-bar ul.phone-mail li a:hover{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_links_hover_color") ))." !important;
		}
		header .top-bar .social-icons-fa li a{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_social_color") ))." !important;
		}
		header .top-bar .social-icons-fa li a:hover{
			color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_social_hover_color") ))." !important;
		}
		header .top-bar *{
			border-color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_borders_color") ))." !important;
		}
		header .top-bar .down-button{
			border-color: transparent rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_topbar_bg_opacity")))/100).") transparent transparent !important;
		}
		header .top-bar.opened .down-button{
			border-color: transparent #fff transparent transparent !important;
		}
		";
	}
	$carbon_style_data .= "
	#primary_footer > .container, #primary_footer > .no-fcontainer{
		padding-top:".esc_html(intval(get_option('carbon_primary_footer_padding_top'),10))."px;
		padding-bottom:".esc_html(intval(get_option('carbon_primary_footer_padding_bottom'),10))."px;
	}
	#primary_footer{";
		switch (get_option("carbon_footerbg_type")){
			case "image":
				$carbon_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
				$carbon_style_data .= "background: url(" . esc_url(get_option("carbon_footerbg_image")) . ") no-repeat; background-size: cover !important;";  
			break;
			case "color":
				$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_color")));
				$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_footerbg_color_opacity")))/100).");";
			break;
			case "pattern":
				$carbon_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/carbon_patterns/" . esc_html(get_option("carbon_footerbg_pattern")) . "') 0 0 repeat !important;";
			break;
			case "custom_pattern":
				$carbon_style_data .= "background: url('" . esc_url(get_option("carbon_footerbg_custom_pattern")) . "') 0 0 repeat !important;";
			break;
		}
	$carbon_style_data .= "
	}
	
	#primary_footer input, #primary_footer textarea{";
		switch (get_option("carbon_footerbg_type")){
			case "image": case "pattern": case "custom_pattern":
				$carbon_style_data .= "background: transparent;";  
			break;
			case "color":
				$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_color")));
				$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_footerbg_color_opacity")))/100).");";
			break;
		}
	$carbon_style_data .= "
	}
	header.header_not_fixed ul.menu-depth-1,
	header.header_not_fixed ul.menu-depth-1 ul,
	header.header_not_fixed ul.menu-depth-1 ul li,
	header.header_not_fixed #dl-menu ul{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}

	header.header_not_fixed li:not(.carbon_mega_menu) ul.menu-depth-1 li:hover, header.header_not_fixed li.carbon_mega_menu li.menu-item-depth-1 li:hover, header.header_not_fixed #dl-menu ul li:hover{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sub_menu_bg_color_hover")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sub_menu_bg_opacity")))/100).") !important;
	}

	#primary_footer input, #primary_footer textarea{
		border: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_borderscolor")))." !important;
	}

	
	.footer_sidebar table td, .footer_sidebar table th, .footer_sidebar .wp-caption{
		border: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_borderscolor"))).";
	}
	#primary_footer a, .widget-contact-info-content{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_linkscolor"))).";
	}
	
	#primary_footer, #primary_footer p, #big_footer input, #big_footer textarea{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_paragraphscolor"))).";
	}
	
	#primary_footer .footer_sidebar > h4, #primary_footer .footer_sidebar > .widget > h4 {
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_footerbg_headingscolor"))).";
	}
	
	#secondary_footer{";
		switch (get_option("carbon_sec_footerbg_type")){
			case "image":
				$carbon_style_data .= "background-repeat:no-repeat; background-position:center center; -o-background-size: cover !important; -moz-background-size: cover !important; -webkit-background-size: cover !important; background-size: cover !important;";
				$carbon_style_data .= "background: url(" . esc_url(get_option("carbon_sec_footerbg_image")) . ") no-repeat fixed !important; background-size: cover !important;";  
			break;
			case "color":
				$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sec_footerbg_color")));
				$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_sec_footerbg_color_opacity")))/100).");";
			break;
			case "pattern":
				$carbon_style_data .= "background: url('" . esc_url(get_template_directory_uri()) . "/images/carbon_patterns/" . esc_html(get_option("carbon_sec_footerbg_pattern")) . "') 0 0 repeat !important;";
			break;
			case "custom_pattern":
				$carbon_style_data .= "background: url('" . esc_url(get_option("carbon_sec_footerbg_custom_pattern")) . "') 0 0 repeat !important;";
			break;
		}
		$carbon_style_data .= "
		padding-top:".esc_html(intval(get_option('carbon_secondary_footer_padding_top'),10))."px;
		padding-bottom:".esc_html(intval(get_option('carbon_secondary_footer_padding_bottom'),10))."px;
	}";
	
	if (get_option("carbon_show_sec_footer") == "on"){
		if (get_option("carbon_footer_display_logo") == "on"){
			if (get_option('carbon_footer_logo_type') == "text"){
				$carbon_style_data .= "
				#secondary_footer .footer_logo .logo{";
					$font = get_option('carbon_sec_footer_logo_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
					$carbon_style_data .= "
					font-family: '".wp_kses_post($font[0])."';
					font-weight: ".esc_html($font[1]).";
					font-size: ".esc_html(intval(get_option('carbon_sec_footer_logo_font_size'), 10))."px;
					color: #".esc_html(get_option('carbon_sec_footer_logo_font_color')).";
				}
				#secondary_footer .footer_logo .logo:hover{
					color: #".esc_html(get_option('carbon_sec_footer_logo_font_hover_color')).";
				}";
			}
		}
	}
	$carbon_style_data .= "
	
	#secondary_footer .social-icons-fa a i{
		font-size: ".esc_html(intval(get_option('carbon_sec_footer_social_icons_size'),10))."px;
		line-height: ".esc_html(intval(get_option('carbon_sec_footer_social_icons_size'),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sec_footer_social_icons_color"))).";
	}
	#secondary_footer .social-icons-fa a i:before{
		font-size: ".esc_html(intval(get_option('carbon_sec_footer_social_icons_size'),10))."px;
	}
	#secondary_footer .social-icons-fa a:hover i{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sec_footer_social_icons_hover_color"))).";
	}
	
	header.style2 .search_input{
		height: calc(100% + ".esc_html(intval(get_option('carbon_menu_margin_top_pre_'.$carbon_header_style_pre),10))."px);
	}
	
	header .search_input{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_input_background_color")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_search_input_background_opacity")))/100).");
	}
	header .search_input input.search_input_value{";
		$font = get_option("carbon_search_input_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; 	if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
	}
	header .search_input input.search_input_value, header .search_close{
		font-size: ".esc_html(intval(get_option("carbon_search_input_font_size"),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_input_font_color"))).";
	}
	
	header .search_input input.search_input_value::placeholder{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_input_font_color"))).";
	}
	
	
	header .search_input input.search_input_value::-webkit-input-placeholder, header .search_input input.search_input_value::-moz-placeholder, header .search_input input.search_input_value:-ms-input-placeholder, header .search_input input.search_input_value:-moz-placeholder, header .search_input input.search_input_value::placeholder{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_input_font_color"))).";
	}
	
	
	header .search_input .ajax_search_results ul{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_result_background_color")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_search_result_background_opacity")))/100).");
	}
	header .search_input .ajax_search_results ul li.selected{";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_selected_result_background_color")));
		$carbon_style_data .= "background-color: rgba(".esc_html($color[0].",".$color[1].",".$color[2].",".intval(str_replace("%","",get_option("carbon_search_result_background_opacity")))/100).");
	}
	header .search_input .ajax_search_results ul li{
		border-bottom: 1px solid #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_result_borders"))).";
	}
	header .search_input .ajax_search_results ul li a{";
		$font = get_option("carbon_search_input_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; 	if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option("carbon_search_result_font_size"),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_result_font_color")))."
	}
	header .search_input .ajax_search_results ul li.selected a{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_selected_result_font_color")))."
	}
	header .search_input .ajax_search_results ul li a span, header .search_input .ajax_search_results ul li a span i{";
		$font = get_option("carbon_search_result_details_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		font-size: ".esc_html(intval(get_option("carbon_search_result_details_font_size"),10))."px;
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_result_details_font_color")))."
	}
	header .search_input .ajax_search_results ul li.selected a span{
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_search_selected_result_details_font_color")))."
	}";
	
	if (is_user_logged_in() && get_option("carbon_fixed_menu") == "on"){
		global $wpdb;
		$res = $wpdb->get_results( $wpdb->prepare("SELECT meta_value FROM $wpdb->usermeta WHERE user_id=%d AND meta_key=%s", get_current_user_id(), 'show_admin_bar_front'), OBJECT );
		
		if ($res && $res[0]->meta_value == "true"){
			$carbon_style_data .= "
			body:not(.vc_editor) header:not(.headerclone) { top:32px !important; }
			@media screen and (max-width:782px) {
				body:not(.vc_editor) header:not(.headerclone), body:not(.vc_editor) header:not(.headerclone) .down-button {
					top:45px !important;
				}

				#wpadminbar{position: fixed;}
			}
			";
		}
	}
	
	$loader = (is_page_template() && get_post_meta(get_the_ID(), 'carbon_enable_custom_header_options_value', true) == "yes") ? get_post_meta(get_the_ID(), 'carbon_enable_website_loading_value', true) : get_option("carbon_enable_website_loader");
	if ($loader == "on"){
		$carbon_style_data .= "
		body #carbon_website_load, #carbon_website_load .load2 .loader:before, #carbon_website_load .load2 .loader:after, #carbon_website_load .load3 .loader:after{background: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_background"))).";}
		
		.ball-pulse>div, .ball-pulse-sync>div, .ball-scale>div, .ball-rotate>div, .ball-rotate>div:before, .ball-clip-rotate>div, .ball-clip-rotate-pulse>div:first-child, .ball-beat>div, .ball-scale-multiple>div, .ball-triangle-path>div, .ball-pulse-rise>div, .ball-grid-beat>div, .ball-grid-pulse>div, .ball-spin-fade-loader>div, .ball-zig-zag>div, .ball-zig-zag-deflect>div, .line-scale>div, .line-scale-party>div, .line-scale-pulse-out>div, .line-scale-pulse-out-rapid>div, .line-spin-fade-loader>div, .square-spin>div, .pacman>div:nth-child(3),.pacman>div:nth-child(4),.pacman>div:nth-child(5),.pacman>div:nth-child(6), .cube-transition>div, .ball-rotate>div:after, .ball-rotate>div:before, #carbon_website_load .load3 .loader:before, #carbon_website_load .load3 .loader:before{background-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}

		.ball-clip-rotate>div{border-top-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";border-left-color: #". esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";border-right-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}

		.ball-clip-rotate-pulse>div:last-child, .ball-clip-rotate-multiple>div:last-child{border-top-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";border-bottom-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}
		
		.ball-clip-rotate-multiple>div{border-right-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";border-left-color:#". esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}

		.ball-triangle-path>div, .ball-scale-ripple>div, .ball-scale-ripple-multiple>div{border-color:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}
		
		.pacman>div:first-of-type, .pacman>div:nth-child(2){border-top-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";border-left-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";border-bottom-color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}
		
		.load2 .loader{box-shadow:inset 0 0 0 1em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}";
		$color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color")));
		$carbon_style_data .= "
		.load3 .loader{background:#".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";background:-moz-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:-webkit-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:-o-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:-ms-linear-gradient(left, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);background:linear-gradient(to right, #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color")))." 10%, rgba(".esc_html($color[0].",".$color[1].",".$color[2]).", 0) 42%);}
			
		.load6 .loader{font-size:50px;text-indent:-9999em;overflow:hidden;width:1em;height:1em;border-radius:50%;position:relative;-webkit-transform:translateZ(0);-ms-transform:translateZ(0);transform:translateZ(0);-webkit-animation:load6 1.7s infinite ease;animation:load6 1.7s infinite ease}@-webkit-keyframes 'load6'{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}5%,95%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}10%,59%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.087em -0.825em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.173em -0.812em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.256em -0.789em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.297em -0.775em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}20%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.338em -0.758em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.555em -0.617em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.671em -0.488em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.749em -0.34em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}38%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.377em -0.74em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.645em -0.522em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.775em -0.297em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.82em -0.09em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}}@keyframes 'load6'{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}5%,95%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}10%,59%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.087em -0.825em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.173em -0.812em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.256em -0.789em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.297em -0.775em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}20%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.338em -0.758em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.555em -0.617em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.671em -0.488em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.749em -0.34em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}38%{box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.377em -0.74em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.645em -0.522em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.775em -0.297em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", -0.82em -0.09em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg);box-shadow:0 -0.83em 0 -0.4em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.42em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.44em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.46em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).", 0 -0.83em 0 -0.477em #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_color"))).";}}";
		
		if (get_option("carbon_enable_website_loader_percentage") == "on"){
			$carbon_style_data .= "
			body #carbon_website_load .percentage{";
				$font = get_option("carbon_loader_percentage_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
				$carbon_style_data .= "
				font-family: '".wp_kses_post($font[0])."', sans-serif;
				font-weight: ".esc_html($font[1]).";
				font-size: ".esc_html(intval(get_option("carbon_loader_percentage_font_size"),10))."px;
				color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_loader_percentage_font_color"))).";
			}
			";
		}
	}
	
	$carbon_style_data .= "
	.carbon_breadcrumbs, .carbon_breadcrumbs a, .carbon_breadcrumbs span{";
		$font = get_option("carbon_breadcrumbs_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; 		if (!isset($font[1])) $font[1] = "";
		$carbon_style_data .= "
		font-family: '".wp_kses_post($font[0])."';
		font-weight: ".esc_html($font[1]).";
		color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_breadcrumbs_color"))).";
		font-size: ".esc_html(intval(get_option("carbon_breadcrumbs_size"),10))."px;
	}

	#menu_top_bar > li ul{background: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_submenu_bg_color")).";}
	#menu_top_bar > li ul li:hover{background: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_submenu_bg_hover_color")).";}
	#menu_top_bar > li ul a{color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_submenu_text_color"))." !important;}
	#menu_top_bar > li ul a:hover, #menu_top_bar > li ul li:hover > a{color: #".esc_html(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_topbar_submenu_text_hover_color")))." !important;}
	
	
	
	header.navbar .nav-container .carbon_right_header_icons  i, header .menu-controls i{color: #". str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_header_icons_color_".$carbon_header_bgstyle_pre) )." !important;}
	
	header.navbar .nav-container .carbon_right_header_icons i:hover, header .menu-controls .carbon_right_header_icons i:hover{color: #". str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_header_icons_hover_color_".$carbon_header_bgstyle_pre) )." !important;}
	
	header.header_after_scroll.navbar .nav-container .carbon_right_header_icons i, header .menu-controls .carbon_right_header_icons i{color: #". str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_header_after_scroll_icons_color_".$carbon_header_bgstyle_after) )." !important;}
	
	header.header_after_scroll.navbar .nav-container .carbon_right_header_icons i:hover, header .menu-controls .carbon_right_header_icons i:hover{color: #".esc_html( str_replace( "__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_header_after_scroll_icons_hover_color_".$carbon_header_bgstyle_after) ))." !important;}";
	
	
	
	//sliding panel
	$carbon_style_data .= "
		.carbon-push-sidebar.carbon-push-sidebar-right{background-color:#".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sliding_panel_background_color"))." !important;}
		
		.carbon-push-sidebar .widget h2 > .widget_title_span, .carbon-push-sidebar .wpb_content_element .wpb_accordion_header a, .carbon-push-sidebar .custom-widget h4, .carbon-push-sidebar .widget.des_cubeportfolio_widget h4, .carbon-push-sidebar .widget.des_recent_posts_widget h4, .carbon-push-sidebar, .carbon-push-sidebar .widget h4{
			";
			$font = get_option("carbon_sliding_panel_titles_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$carbon_style_data .= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sliding_panel_titles_color"))." !important;
			font-size: ".esc_html(intval(get_option("carbon_sliding_panel_titles_font_size"),10))."px;
		}
		
		.carbon-push-sidebar a:not(.vc_btn3 a){
			";
			$font = get_option("carbon_sliding_panel_links_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$carbon_style_data .= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sliding_panel_links_color"))." !important;
			font-size: ".esc_html(intval(get_option("carbon_sliding_panel_links_font_size"),10))."px;
		}
		
		.carbon-push-sidebar a:not(.vc_btn3):hover{
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sliding_panel_links_color_hover"))." !important;
		}
		
		.carbon-push-sidebar p, .carbon-push-sidebar a:not(.vc_btn3), .carbon-push-sidebar .widget ul li, .carbon-push-sidebar .widget span{
			";
			$font = get_option("carbon_sliding_panel_p_font"); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$carbon_style_data .= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_sliding_panel_p_color"))." !important;
			font-size: ".esc_html(intval(get_option("carbon_sliding_panel_p_font_size"),10))."px;
		}
	";
	
	/* new typography stuffs */
	$carbon_style_data .= "
		.widget h2 > .widget_title_span, .custom-widget h4, .widget.des_cubeportfolio_widget h4, .widget.des_recent_posts_widget h4{
			";
			$font = get_option('carbon_widgets_sidebars_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$carbon_style_data.= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			color: #".str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_widgets_sidebars_color")).";
			font-size: ".esc_html(intval(get_option("carbon_widgets_sidebars_size"),10))."px;
			text-transform: uppercase;
			letter-spacing: 2px;
		}
		
		#big_footer .widget h2 > .widget_title_span, #big_footer .custom-widget h4, #big_footer .widget.des_cubeportfolio_widget h4, #big_footer .widget.des_recent_posts_widget h4, #primary_footer .footer_sidebar > h4, #primary_footer .widget h4{
			";
			$font = get_option('carbon_widgets_footer_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$carbon_style_data.= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			font-size: ".esc_html(intval(get_option("carbon_widgets_footer_size"),10))."px !important;
			letter-spacing: 4px !important;
		}
		
		#carbon-push-sidebar-content .widget h2 > .widget_title_span, #carbon-push-sidebar-content .custom-widget h4, #carbon-push-sidebar-content .widget.des_cubeportfolio_widget h4, #carbon-push-sidebar-content .widget.des_recent_posts_widget h4{
			";
			$font = get_option('carbon_widgets_sliding_panel_font'); $carbon_import_fonts[] = $font; $font = explode("|",$font); $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
			$carbon_style_data.= "
			font-family: '".wp_kses_post($font[0])."';
			font-weight: ".esc_html($font[1]).";
			font-size: ".esc_html(intval(get_option("carbon_widgets_sliding_panel_size"),10))."px;
		}
	";
	
	if (get_option("enable_custom_css") == "on"){
		$carbon_customcss = get_option("carbon_custom_css");
		if (gettype($carbon_customcss) === "string" && $carbon_customcss != "") {
			$carbon_style_data .= stripslashes($carbon_customcss);
		}
	}

	wp_add_inline_style('carbon-style', $carbon_style_data);
	
}
add_action( 'wp_enqueue_scripts', 'carbon_custom_style', 2 );

?>