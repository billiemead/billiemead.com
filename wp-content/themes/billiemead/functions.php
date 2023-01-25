<?php
/**
 * @package WordPress
 * @subpackage Carbon
 */
	
	add_action( 'after_setup_theme', 'carbon_setup' );
	
	//body class
	function carbon_custom_body_class($classes, $class){
		if (is_singular() && get_post_meta(get_the_ID(), 'carbon_enable_custom_header_options_value', true)=='yes'){
			if (get_post_meta(get_the_ID(), 'carbon_content_to_the_top_value', true) == "off") $classes[] = "content_after_header";
		}
		else {
			if (get_option('carbon_content_to_the_top') == "off") $classes[] = "content_after_header";
		}
		return $classes;
	}
	
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	/* new gutenberg features */
	add_theme_support( 'align-wide' );
	
	add_filter( 'body_class', 'carbon_custom_body_class', 10, 2 );
	
	//under construction feature.
	function carbon_under_construction(){
		$carbon_uc_id = get_option('carbon_under_construction_page');
		require_once(get_template_directory().'/template-under-construction.php');
		exit;
	}
	
	function carbon_setup(){
		
		//remove notifications
		add_action( 'vc_before_init', 'carbon_vcSetAsTheme' );
		function carbon_vcSetAsTheme() {
		    vc_set_as_theme(true);
			update_option('wpb_js_gutenberg_disable',1);
		}
		if (function_exists( 'set_revslider_as_theme' )){
			add_action( 'init', 'carbon_set_revslider_as_theme' );
			function carbon_set_revslider_as_theme() {
				set_revslider_as_theme();
			}
		}
	
		/** 
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );
		
		/* Add theme-supported features. */
		add_theme_support( 'title-tag' );
			
		/**
		 * This theme uses post thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		
		/**
		 *	This theme supports woocommerce
		 */
		add_theme_support( 'woocommerce' );
			
		/**
		 *	This theme supports editor styles
		 */
		add_editor_style("/css/layout-style.css");
		
		/* Add custom actions. */
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 */
		load_theme_textdomain( 'carbon', get_template_directory() . '/languages' );
			
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );
		/*
	
		/**
		 * Set the content width based on the theme's design and stylesheet.
		 */
		if ( ! isset( $content_width ) )
			$content_width = 900;
		
		//WMPL
		/**
		 * register panel strings for translation
		 */
		if (function_exists ( 'icl_register_string' )){
			require_once (get_template_directory().'/inc/theme-wpml.php');
		}
		//\WMPL
		
		//declare some global variables that will be used everywhere
		global $carbon_new_meta_boxes,
		$carbon_new_meta_post_boxes,
		$carbon_new_meta_portfolio_boxes,
		$carbon_buttons,
		$carbon_data;
		$carbon_new_meta_boxes=array();
		$carbon_new_meta_post_boxes=array();
		$carbon_new_meta_portfolio_boxes=array();
		$carbon_buttons=array();
		$carbon_data=new stdClass();
		
		
		/*----------------------------------------------------------------
		 *  DEFINE THE MAIN CONSTANTS
		 *---------------------------------------------------------------*/
		//main theme info constants
		
		$my_theme = wp_get_theme();
		define("CARBON_VERSION", $my_theme->Version);
		//define the main paths and URLs
		define("CARBON_LIB_PATH", get_template_directory() . '/lib/');
		define("CARBON_LIB_URL", get_template_directory_uri().'/lib/');
		define("CARBON_JS_PATH", get_template_directory_uri().'/js/');
		define("CARBON_CSS_PATH", get_template_directory_uri().'/css/');
	
		define("CARBON_FUNCTIONS_PATH", CARBON_LIB_PATH . 'functions/');
		define("CARBON_FUNCTIONS_URL", CARBON_LIB_URL.'functions/');
		define("CARBON_CLASSES_PATH", CARBON_LIB_PATH.'classes/');
		define("CARBON_OPTIONS_PATH", CARBON_LIB_PATH.'options/');
		define("CARBON_SHORTCODES_PATH", CARBON_LIB_PATH.'shortcodes/');
		define("CARBON_PLUGINS_PATH", CARBON_LIB_PATH.'plugins/');
		define("CARBON_UTILS_URL", CARBON_LIB_URL.'utils/');
		
		define("CARBON_IMAGES_URL", CARBON_LIB_URL.'images/');
		define("CARBON_CSS_URL", CARBON_LIB_URL.'css/');
		define("CARBON_SCRIPT_URL", CARBON_LIB_URL.'script/');
		define("CARBON_PATTERNS_URL", get_template_directory_uri().'/images/carbon_patterns/');
		$uploadsdir=wp_upload_dir();
		define("CARBON_UPLOADS_URL", $uploadsdir['url']);
		define("CARBON_SEPARATOR", '|*|');
		define("CARBON_OPTIONS_PAGE", 'carbon_options');
		define("CARBON_STYLE_OPTIONS_PAGE", 'carbon_style_options');
		define("CARBON_DEMOS_PAGE", 'carbon_demos');
	
		/*----------------------------------------------------------------
		 *  INCLUDE THE FUNCTIONS FILES
		 *---------------------------------------------------------------*/
				
		require_once (CARBON_FUNCTIONS_PATH.'general.php');  //some main common functions
		require_once (CARBON_FUNCTIONS_PATH.'stylesheet.php');  //some main common functions
		add_action('wp_enqueue_scripts', 'carbon_style', 1);
		add_action('wp_enqueue_scripts', 'carbon_scripts', 10);
		
		require_once (CARBON_FUNCTIONS_PATH.'sidebars.php');  //the sidebar functionality
		if ( isset($_GET['page']) && $_GET['page'] == CARBON_OPTIONS_PAGE ){
			require_once (CARBON_CLASSES_PATH.'upper-options-manager.php');  //the theme options manager functionality
		}
		if ( isset($_GET['page']) && $_GET['page'] == CARBON_STYLE_OPTIONS_PAGE ){
			require_once (CARBON_CLASSES_PATH.'upper-style-options-manager.php');  //the theme options manager functionality
		}
		if ( isset($_GET['page']) && $_GET['page'] == CARBON_DEMOS_PAGE ){
			require_once (CARBON_CLASSES_PATH.'upper-demos-manager.php');  //the theme options manager functionality
		}
			
		require_once (CARBON_CLASSES_PATH.'upper-templater.php');  
		require_once (CARBON_CLASSES_PATH.'upper-custom-data-manager.php');  
		require_once (CARBON_CLASSES_PATH.'upper-custom-page.php');  
		require_once (CARBON_CLASSES_PATH.'upper-custom-page-manager.php');  
		require_once (CARBON_FUNCTIONS_PATH.'custom-pages.php');  //the comments functionality
		require_once (CARBON_FUNCTIONS_PATH.'comments.php');  //the comments functionality
		
		do_action( 'carbon_plugin_widgets_init' ); 
		
		require_once (CARBON_FUNCTIONS_PATH.'options.php');  //the theme options functionality
		
		if (is_admin()){
			require_once (CARBON_FUNCTIONS_PATH. 'meta.php');  //adds the custom meta fields to the posts and pages
			add_action('admin_enqueue_scripts','carbon_admin_style');
		}
		$functions_path = get_template_directory() . '/functions/';
		
		add_filter('woocommerce_add_to_cart_fragments' , 'carbon_woocommerce_header_add_to_cart_fragment' );
		
		// Declare sidebar widget zone
		if (function_exists('register_sidebar')) {
			register_sidebar(array(
				'name' => esc_html__( 'Blog Sidebar', 'carbon' ),
				'id'   => 'sidebar-widgets',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>'
			));
		}
		
		if (!function_exists('carbon_wp_pagenavi')){ 
			$including = $functions_path. 'wp-pagenavi.php';
		    require_once($including);
		}
		
		/* ------------------------------------------------------------------------ */
		/* Misc
		/* ------------------------------------------------------------------------ */
		// Post Thumbnail Sizes
		if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
		
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'carbon_blog', 1000, 563, true );				// Standard Blog Image
			add_image_size( 'carbon_mini', 80, 80, true ); 				// used for widget thumbnail
			add_image_size( 'carbon_portfolio', 600, 400, true );			// also for blog-medium
			add_image_size( 'carbon_regular', 500, 500, true ); 
			add_image_size( 'carbon_wide', 1000, 500, true ); 
			add_image_size( 'carbon_tall', 500, 1000, true );
			add_image_size( 'carbon_widetall', 1000, 1000, true ); 
		}
		
		/* tgm plugin activator */
		/**
		 * Include the TGM_Plugin_Activation class.
		 */
		require_once get_template_directory() . '/lib/functions/class-tgm-plugin-activation.php';
		
		add_action( 'tgmpa_register', 'carbon_register_required_plugins' );	
		
		if ( class_exists('VCExtendAddonClass')){
			// Finally initialize code
			new VCExtendAddonClass();
		}
		
		if (get_option("carbon_enable_smooth_scroll") == "on"){
			update_option('ultimate_smooth_scroll','enable');
		} else update_option('ultimate_smooth_scroll','disable');
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	}
	
	function carbon_admin_style(){
		wp_enqueue_style('carbon-fa-painel', CARBON_CSS_PATH .'font-awesome-painel.min.css');
		wp_enqueue_script( 'carbon-admin', CARBON_JS_PATH .'carbon-admin.js', array(), '1',$in_footer = true);
		wp_enqueue_script( 'jquery-ui-sortable', array('jquery') );
	}
	
	
	
	function carbon_wpml_filter_langs( $languages ) {
		foreach ( $languages as $k => $language ) {                                       
			$lang_code = explode ( '-' , $languages[$k]['language_code'] );
			$languages[$k]['native_name']     = ucfirst( $lang_code[0] );
			$languages[$k]['translated_name'] = ucfirst( $lang_code[0] );
		}	
		return $languages;
	}
	add_filter( 'icl_ls_languages', 'carbon_wpml_filter_langs' );
	add_filter('wpml_add_language_selector', 'carbon_wpml_filter_langs');
	

	/*-----------------------------------------------------------------------------------*/
	/*  THEME REQUIRES
	/*-----------------------------------------------------------------------------------*/
	require_once (get_template_directory().'/inc/theme-styles.php');
		
	function carbon_style() {
		$theme = wp_get_theme();
		wp_enqueue_style( 'carbon-style', get_template_directory_uri().'/style.css', array(), $theme->Version );
	}
	
	function carbon_slug_post_classes( $classes, $class, $post_id ) {
		$carbon_is_portfolio = array_search( 'type-portfolio', $classes );
		if ( is_single( $post_id ) && false !== $carbon_is_portfolio ) {
			$classes[] = 'container';
		}
		if (is_sticky( $post_id )) $classes[] = 'sticky';	 
		return $classes;
	}
	add_filter( 'post_class', 'carbon_slug_post_classes', 10, 3 );
	
	/*-----------------------------------------------------------------------------------*/
	/*  LOAD THEME SCRIPTS
	/*-----------------------------------------------------------------------------------*/
	function carbon_scripts(){
	
		if (!is_admin()){
			global $vc_addons_url, $wp_query, $post;
			
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
			
	  	    wp_enqueue_script( 'carbon-upper-modernizr', CARBON_JS_PATH .'utils/upper-modernizr.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-waypoint', CARBON_JS_PATH .'utils/upper-waypoint.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-stellar', CARBON_JS_PATH .'utils/upper-stellar.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-flex', CARBON_JS_PATH .'utils/upper-flex.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-iso', CARBON_JS_PATH .'utils/upper-iso.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-qloader', CARBON_JS_PATH .'utils/upper-qloader.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-tweet', CARBON_JS_PATH .'utils/upper-tweet.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-bootstrap', CARBON_JS_PATH .'utils/upper-bootstrap.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-dlmenu', CARBON_JS_PATH .'utils/upper-dlmenu.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-greyscale', CARBON_JS_PATH .'utils/upper-greyscale.js', array('jquery'),'1.0',$in_footer = true);
			wp_enqueue_script( 'carbon-upper-simpleselect', CARBON_JS_PATH .'utils/upper-simpleselect.js', array('jquery'),'1.0',$in_footer = true);
	  	    wp_enqueue_script( 'jquery-effects-core', array('jquery') );
	  	    wp_register_script( 'carbon-global', CARBON_JS_PATH .'global.js', array('jquery'), '1',$in_footer = true);
			
			if (is_archive() || is_single() || is_search() || is_page_template('blog-template.php') || is_page_template('blog-masonry-template.php') || is_page_template('blog-masonry-grid-template.php') || is_front_page()) {

				$nposts = get_option('posts_per_page'); $carbon_more = 0; $carbon_pag = 0; $max = 0; $orderby=""; $category=""; $nposts = ""; $order = "";
				$carbon_pag = $wp_query->query_vars['paged'];
				if (!is_numeric($carbon_pag)) $carbon_pag = 1;
				
				$carbon_reading_option = get_option('carbon_blog_reading_type');

				switch ($carbon_reading_option){
					case "scrollauto": 
							// Add code to index pages.
							if( !is_singular() ) {	
								if (is_search()){
									$se = get_option("carbon_enable_search_everything");
									$nposts = get_option('posts_per_page');
									$carbon_pag = $wp_query->query_vars['paged'];
									if (!is_numeric($carbon_pag)) $carbon_pag = 1;

									if ($se == "on"){
										$args = array( 'showposts' => get_option('posts_per_page'), 'post_status' => 'publish', 'paged' => $carbon_pag, 's' => esc_html($_GET['s']));
									    $carbon_the_query = new WP_Query( $args );
									    $args2 = array( 'showposts' => -1, 'post_status' => 'publish', 'paged' => $carbon_pag, 's' => esc_html($_GET['s']) );
										$counter = new WP_Query($args2);
									} else {
										$args = array('showposts' => get_option('posts_per_page'),'post_status' => 'publish','paged' => $carbon_pag,'post_type' => 'post','s' => esc_html($_GET['s']));
									    $carbon_the_query = new WP_Query( $args );
									    $args2 = array('showposts' => -1,'post_status' => 'publish','paged' => $carbon_pag,'post_type' => 'post','s' => esc_html($_GET['s']));
										$counter = new WP_Query($args2);
									}
									$max = ceil($counter->post_count / $nposts);
									$carbon_paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
								} else {
									$max = $wp_query->max_num_pages;
									$carbon_paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
								}
								$carbon_inline_script = '
									jQuery(document).ready(function($){
										"use strict";
										if (window.carbonOptions.reading_option === "scrollauto" && !jQuery("body").hasClass("single") && typeof carbon_monitorScrollTop == "function"){ 
											window.carbon_loadingPoint = 0;
											//monitor page scroll to fire up more posts loader
											window.clearInterval(window.carbon_interval);
											window.carbon_interval = setInterval("carbon_monitorScrollTop()", 1000 );
										}
									});
								';
								wp_add_inline_script('carbon-global', $carbon_inline_script, 'after');
							} else {
							    $args = array('showposts' => $nposts,'orderby' => $orderby,'order' => $order,'cat' => $category,'paged' => $carbon_pag,'post_status' => 'publish');
				    		    $carbon_the_query = new WP_Query( $args );
					    		$max = $carbon_the_query->max_num_pages;
					    		$carbon_paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
					    		$carbon_inline_script = '
									jQuery(document).ready(function($){
										"use strict";
										if (window.carbonOptions.reading_option === "scrollauto" && !jQuery("body").hasClass("single") && typeof carbon_monitorScrollTop == "function"){ 
											window.carbon_loadingPoint = 0;
											//monitor page scroll to fire up more posts loader
											window.clearInterval(window.carbon_interval);
											window.carbon_interval = setInterval("carbon_monitorScrollTop()", 1000 );
										}
									});
								';
								wp_add_inline_script('carbon-global', $carbon_inline_script, 'after');

				    		}
						break;
					case "scroll": 
							if( !is_singular() ) {	
								if (is_search()){
									$nposts = get_option('posts_per_page');
									$se = get_option("carbon_enable_search_everything");
									if ($se == "on"){
										$args = array('showposts' => get_option('posts_per_page'),'post_status' => 'publish','paged' => $carbon_pag,'s' => esc_html($_GET['s']));
									    $carbon_the_query = new WP_Query( $args );
									    $args2 = array('showposts' => -1,'post_status' => 'publish','paged' => $carbon_pag,'s' => esc_html($_GET['s']));
										$counter = new WP_Query($args2);
									} else {
										$args = array('showposts' => get_option('posts_per_page'),'post_status' => 'publish','paged' => $carbon_pag,'post_type' => 'post','s' => esc_html($_GET['s']));
									    $carbon_the_query = new WP_Query( $args );
									    $args2 = array('showposts' => -1,'post_status' => 'publish','paged' => $carbon_pag,'post_type' => 'post','s' => esc_html($_GET['s']));
										$counter = new WP_Query($args2);
									}
									$max = ceil($counter->post_count / $nposts);
									$carbon_pag = 1;
									$carbon_pag = $wp_query->query_vars['paged'];
									if (!is_numeric($carbon_pag)) $carbon_pag = 1;
								} else {
									$max = $wp_query->max_num_pages;
									$carbon_paged = $carbon_pag;
								}
							} else {
								$orderby = ""; $category = "";
							    $args = array('showposts' => $nposts,'orderby' => $orderby,'order' => $order,'cat' => $category,'post_status' => 'publish');
				    		    $carbon_the_query = new WP_Query( $args );
					    		$max = $carbon_the_query->max_num_pages;
					    		$carbon_pag = 1;
								$carbon_pag = $wp_query->query_vars['paged'];
								if (!is_numeric($carbon_pag)) $carbon_pag = 1;
				    		}
						break;
				}
			} 
			
			/* pass needed options values to JS */
			$carbonOptions = array(
				"templatepath" => esc_url(get_template_directory_uri())."/",
				"homePATH" => ABSPATH,
				"styleColor" => "#".esc_html(get_option("carbon_style_color")),
				"carbon_no_more_posts_text" => function_exists('icl_t') ? sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'No more posts to load.', get_option('carbon_no_more_posts_text'))) : sprintf(esc_html__("%s", "carbon"), get_option('carbon_no_more_posts_text')),
				"carbon_load_more_posts_text" => function_exists('icl_t') ? sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Load More Posts', get_option('carbon_load_more_posts_text'))) : sprintf(esc_html__("%s", "carbon"), get_option('carbon_load_more_posts_text')),
				"carbon_loading_posts_text" => function_exists('icl_t') ? sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Loading posts.', get_option('carbon_loading_posts_text'))) : sprintf(esc_html__("%s", "carbon"), get_option('carbon_loading_posts_text')),
				"searcheverything" => get_option("carbon_enable_search_everything"),
				"carbon_header_shrink" => get_option('carbon_fixed_menu') == 'on' && get_option('carbon_header_after_scroll') == 'on' && get_option('carbon_header_shrink_effect') == 'on' ? 'yes' : 'no',
				"carbon_header_after_scroll" => get_option('carbon_fixed_menu') == 'on' && get_option('carbon_header_after_scroll') == 'on' ? 'yes' : 'no',
				"carbon__portfolio_grayscale_effect" => get_option("carbon_enable_portfolio_grayscale"),
				"carbon__instagram_grayscale_effect" => get_option("carbon_enable_instagram_grayscale"),
				"carbon_enable_ajax_search" => get_option("carbon_enable_ajax_search"),
				"carbon_newsletter_input_text" => function_exists('icl_t') ? esc_html(icl_t( 'carbon', 'Enter your email here', get_option('carbon_newsletter_input_text'))) : esc_html(get_option('carbon_newsletter_input_text')),
				"carbon_update_section_titles" => get_option('carbon_update_section_titles'),
				"carbon_wpml_current_lang" => function_exists('icl_t') ? ICL_LANGUAGE_CODE : "",
				"reading_option" => isset($carbon_reading_option) ? $carbon_reading_option : "paged",
				"loader_startPage" => isset($carbon_pag) ? $carbon_pag : 0,
				"loader_maxPages" => isset($max) ? $max : 0,
				"carbon_grayscale_effect" => get_option("carbon_enable_grayscale")
			);
			
			wp_localize_script( 'carbon-global', 'carbonOptions', $carbonOptions );
			wp_enqueue_script( 'carbon-global' );
			add_action( 'wp_footer', 'carbon_set_import_fonts' );
			
	  	    wp_enqueue_script( 'carbon-jquery-twitter', CARBON_JS_PATH .'twitter/jquery.tweet.js', array(),'1.0',$in_footer = true);
	  	   
	  		wp_enqueue_script('cubeportfolio-jquery-js',$in_footer = false);
			wp_enqueue_style('cubeportfolio-jquery-css',$in_footer = false);
			
			if (class_exists('Ultimate_VC_Addons')) {
				wp_enqueue_script('ultimate-vc-addons-script', plugins_url().'/Ultimate_VC_Addons/assets/min-js/ultimate.min.js', array('jquery'),'3.19.11');
				wp_enqueue_style('ultimate-vc-addons-style-min', plugins_url().'/Ultimate_VC_Addons/assets/min-css/ultimate.min.css', '3.19.11');
			}

			if (is_single()){
				wp_enqueue_style( 'prettyphoto'); wp_enqueue_script( 'prettyphoto'); 
			}
			if (isset($post->ID)) $template = get_post_meta( $post->ID, '_wp_page_template' ,true );
						
			if (isset($template) && ( $template == 'template-blank.php' || $template == 'template-under-construction.php' || $template == 'template-home.php' ) || is_404()){
				if (class_exists('Ultimate_VC_Addons')) {
					wp_enqueue_script('ultimate-vc-addons-script', plugins_url().'/Ultimate_VC_Addons/assets/min-js/ultimate.min.js', array('jquery'),'3.19.11');
					wp_enqueue_style('ultimate-vc-addons-style-min', plugins_url().'/Ultimate_VC_Addons/assets/min-css/ultimate.min.css','3.19.11');
					wp_enqueue_script('ultimate-vc-addons-script');
					wp_enqueue_script('ultimate-vc-addons-params');
				}
			}
			
			if (isset($template) && ($template == 'one-page-template.php' || $template == 'template-home.php')){
				wp_enqueue_script('googleapis');
			}
			
			if ((isset($template) && ($template == 'blog-masonry-template.php' || $template == 'blog-template.php' || $template == 'blog-masonry-grid-template.php'|| $template == 'blog-template.php')) || is_archive() || is_front_page() || is_search()){
				wp_enqueue_script( 'carbon-blog', CARBON_JS_PATH .'blog.js', array('jquery'), '1',$in_footer = true);
			}
			
			wp_dequeue_style( 'wp-mediaelement' );
			wp_dequeue_script( 'wp-mediaelement' ); 
		}
	}


	/*-----------------------------------------------------------------------------------*/
	/*  FUNCTION FOR INSTALL AND REGISTER THEME PLUGINS
	/*-----------------------------------------------------------------------------------*/
	function carbon_register_required_plugins() {
	
		$plugins = array(
	
			// This is an example of how to include a plugin pre-packaged with a theme
				
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => true,
			),
			array(
				'name'      => 'Widget Importer & Exporter',
				'slug'      => 'widget-importer-exporter',
				'required'  => false,
			),
			array(
				'name'      => 'Really Simple CAPTCHA',
				'slug'      => 'really-simple-captcha',
				'required'  => false,
			),
			array(
				'name'          => 'WPBakery Visual Composer',
				'slug'          => 'js_composer',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/js_composer.zip',
				'required'      => true,
				'version'       => '6.9.0'
			),
			array(
				'name'      	=> 'Revolution Slider',
				'slug'     	 	=> 'revslider',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/revslider.zip',
				'required'  	=> true,
				'version'       => '6.5.25'
			),
			array(
				'name'          => 'Ultimate Addons for Visual Composer',
				'slug'          => 'Ultimate_VC_Addons',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/Ultimate_VC_Addons.zip',
				'required'      => true,
				'version'       => '3.19.11'
			),
			
			array(
				'name'      	=> 'Carbon Custom Post Types',
				'slug'     	 	=> 'carbon_custom_post_types',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/carbon_custom_post_types.zip',
				'required'  	=> true,
				'version'       => '2.5'
			),
			array(
				'name'          => 'Cube Portfolio',
				'slug'          => 'cubeportfolio',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/cubeportfolio.zip',
				'required'      => true,
				'version'       => '4.4'
			),
			array(
				'name'      	=> 'Envato Market',
				'slug'     	 	=> 'envato-market',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/envato-market.zip',
				'required'  	=> true,
				'version'       => '2.0.7'
			),
			
			array(
				'name'      	=> 'Master Slider',
				'slug'     	 	=> 'masterslider',
				'source'        => 'http://demos.upperthemes.com/plugins/carbon/masterslider.zip',
				'required'  	=> true,
				'version'       => '3.6.1'
			)
				

			
		);
	
		// Change this to your theme text domain, used for internationalising strings
		$config = array(
			'domain'       		=> 'carbon',         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',
			'parent_slug'  => 'themes.php',            			// Parent menu slug.
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> esc_html__( 'Install Required Plugins', 'carbon' ),
				'menu_title'                       			=> esc_html__( 'Install Plugins', 'carbon' ),
				'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'carbon' ), // %1$s = plugin name
				'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'carbon' ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'carbon' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'carbon' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'carbon' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'carbon' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'carbon' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'carbon' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'carbon' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'carbon' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'carbon' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'carbon' ),
				'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'carbon' ),
				'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'carbon' ),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'carbon' ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);
	
		tgmpa( $plugins, $config );
	
	}
	

	
	/*-----------------------------------------------------------------------------------*/
	/*  THEME REQUIRES
	/*-----------------------------------------------------------------------------------*/
 	if (file_exists(get_stylesheet_directory().'/inc/theme-intro.php')) require_once (get_stylesheet_directory().'/inc/theme-intro.php');
 	else require_once (get_template_directory().'/inc/theme-intro.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-header.php')) require_once (get_stylesheet_directory().'/inc/theme-header.php');
 	else require_once (get_template_directory().'/inc/theme-header.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-walker-menu.php')) require_once (get_stylesheet_directory().'/inc/theme-walker-menu.php');
 	else require_once (get_template_directory().'/inc/theme-walker-menu.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-homeslider.php')) require_once (get_stylesheet_directory().'/inc/theme-homeslider.php');
 	else require_once (get_template_directory().'/inc/theme-homeslider.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-breadcrumb.php')) require_once (get_stylesheet_directory().'/inc/theme-breadcrumb.php');
 	else require_once (get_template_directory().'/inc/theme-breadcrumb.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-menu.php')) require_once (get_stylesheet_directory().'/inc/theme-menu.php');
 	else require_once (get_template_directory().'/inc/theme-menu.php');
 	
 	if (file_exists(get_stylesheet_directory().'/inc/theme-woocart.php')) require_once (get_stylesheet_directory().'/inc/theme-woocart.php');
 	else require_once (get_template_directory().'/inc/theme-woocart.php');
 	
	
	/*-----------------------------------------------------------------------------------*/
	/*  FUNCTION FOR ONE CLICK FEATURE
	/*-----------------------------------------------------------------------------------*/
	function carbon_autoimport($url, $demo) {
		
		$os = ((strpos(strtolower(PHP_OS), 'win') === 0) || (strpos(strtolower(PHP_OS), 'cygwin') !== false)) ? 'win' : 'other';
		if (!function_exists('WP_Filesystem')){
			$abspath = ($os === "win") ? "\wp-admin\includes\file.php" : "/wp-admin/includes/file.php";
			require_once(ABSPATH.$abspath);
		}
		WP_Filesystem();
		global $wpdb, $wp_filesystem;
		
	    // get the file
	    require_once get_template_directory() . '/lib/classes/upper-content-import.php';
	
	    if ( ! class_exists( 'carbon_Auto_Importer' ) )
	        die( 'carbon_Auto_Importer not found' );
	
	    // call the function
		$upload_dir = wp_upload_dir();
		$demo_file = $url.$demo."/contents.xml";
		$tempfile = $upload_dir['basedir'] . '/temp.xml' ;
		$data = $wp_filesystem->get_contents($demo_file);
		if (!$data) $data = wp_remote_fopen($demo_file);
		$result = $wp_filesystem->put_contents($tempfile, $data, FS_CHMOD_FILE);
		
		if ($result){
			$args = array(
	            'file'        => $tempfile,
	            'map_user_id' => 0
	        );
	        carbon_auto_import( $args );
		}
	
	}


	/*-----------------------------------------------------------------------------------*/
	/*  HEX TO RGB
	/*-----------------------------------------------------------------------------------*/
	function carbon_hex2rgb($hex = "000000") {
		if (is_array($hex)) $hex = "000000";
		$hex = str_replace("#", "", $hex);
		
		if(strlen($hex) == 3) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);
		//return implode(",", $rgb); // returns the rgb values separated by commas
		return $rgb; // returns an array with the rgb values
	}



	function carbon_get_string_between($string, $start, $end){
	    $string = " ".$string;
	    $ini = strpos($string,$start);
	    if ($ini == 0) return "";
	    $ini += strlen($start);
	    $len = strpos($string,$end,$ini) - $ini;
	    return substr($string,$ini,$len);
	}
	
	/* Remove VC Modules */
	if (function_exists('vc_remove_element')){
		vc_remove_element('vc_carousel');
		vc_remove_element('vc_posts_slider');
		vc_remove_element('vc_gallery');
		vc_remove_element('vc_images_carousel');
		vc_remove_element('vc_button');
		vc_remove_element('vc_cta_button');
	}
	
	
	/*-----------------------------------------------------------------------------------*/
	/*  INCLUDE ADDONS IN CARBON THEME
	/*-----------------------------------------------------------------------------------*/
	function carbon_content_shortcoder($post_content, $loadglobally = false){
		
		$dependancy = array('jquery');
		global $vc_addons_url, $is_IE;

			
		if (isset($vc_addons_url) && $vc_addons_url != ""){
			
			$js_path = 'assets/min-js/';
			$css_path = 'assets/min-css/';
			$ext = '.min';
			$isAjax = true;
			$ultimate_smooth_scroll = get_option('ultimate_smooth_scroll');
	
			// register js
			wp_register_script('ultimate-vc-addons-script',$vc_addons_url.'assets/min-js/ultimate.min.js',array('jquery', 'jquery-ui-core' ), '3.19.11', false);
			wp_register_script('ultimate-vc-addons-appear',$vc_addons_url.$js_path.'jquery-appear'.$ext.'.js',array('jquery'), '3.19.11');
			wp_register_script('ultimate-vc-addons-custom',$vc_addons_url.$js_path.'custom'.$ext.'.js',array('jquery'), '3.19.11');
			wp_register_script('ultimate-vc-addons-params',$vc_addons_url.$js_path.'ultimate-params'.$ext.'.js',array('jquery'), '3.19.11');
			if($ultimate_smooth_scroll === 'enable') {
				$smoothScroll = 'SmoothScroll-compatible.min.js';
			}
			else {
				$smoothScroll = 'SmoothScroll.min.js';
			}
			if (!$is_IE) wp_register_script('ultimate-vc-addons-smooth-scroll',$vc_addons_url.'assets/min-js/'.$smoothScroll,array('jquery'),'3.19.11',true);
			wp_register_script("ultimate-modernizr",$vc_addons_url.$js_path.'modernizr-custom'.$ext.'.js',array('jquery'),'3.19.11');
			wp_register_script("ultimate-tooltip",$vc_addons_url.$js_path.'tooltip'.$ext.'.js',array('jquery'),'3.19.11');
	
			// register css
			wp_register_style('ultimate-vc-addons-animate',$vc_addons_url.$css_path.'animate'.$ext.'.css',array(),'3.19.11');
			wp_register_style('ultimate-vc-addons-style',$vc_addons_url.$css_path.'style'.$ext.'.css',array(),'3.19.11');
			wp_register_style('ultimate-vc-addons-style-min',$vc_addons_url.'assets/min-css/ultimate.min.css',array(),'3.19.11');
			wp_register_style('ultimate-vc-addons-tooltip',$vc_addons_url.$css_path.'tooltip'.$ext.'.css',array(),'3.19.11');
	
			$ultimate_smooth_scroll = get_option('ultimate_smooth_scroll');
			if($ultimate_smooth_scroll == "enable" || $ultimate_smooth_scroll === 'enable') {
				wp_enqueue_script('ultimate-vc-addons-smooth-scroll');
			}
	
			if(function_exists('vc_is_editor')){
				if(vc_is_editor()){
					wp_enqueue_style('vc-fronteditor',$vc_addons_url.'assets/min-css/vc-fronteditor.min.css');
				}
			}
	
			$ultimate_global_scripts = ($loadglobally) ? 'enable' : bsf_get_option('ultimate_global_scripts');

			if($ultimate_global_scripts === 'enable') {
				
				wp_enqueue_script('ultimate-vc-addons-modernizr');
				wp_enqueue_script('jquery_ui');
				wp_enqueue_script('masonry');
				if(defined('DISABLE_ULTIMATE_GOOGLE_MAP_API') && (DISABLE_ULTIMATE_GOOGLE_MAP_API == true || DISABLE_ULTIMATE_GOOGLE_MAP_API == 'true'))
					$load_map_api = false;
				else
					$load_map_api = true;
				if($load_map_api)
					wp_enqueue_script('ultimate-vc-addons-googleapis');
				wp_enqueue_script('ultimate-vc-addons-info-circle');
				wp_enqueue_script('ultimate-vc-addons-modal-all');
				wp_enqueue_script('jquery.shake',$vc_addons_url.$js_path.'jparallax'.$ext.'.js');
				wp_enqueue_script('jquery.vhparallax',$vc_addons_url.$js_path.'vhparallax'.$ext.'.js');
	
				wp_enqueue_style('ultimate-vc-addons-style-min');
				wp_enqueue_style("ult-icons");
				wp_enqueue_style('ultimate-vc-addons-vidcons',$vc_addons_url.'assets/fonts/vidcons.css');
				wp_enqueue_script('jquery.ytplayer',$vc_addons_url.$js_path.'mb-YTPlayer'.$ext.'.js');
	
				$Ultimate_Google_Font_Manager = new Ultimate_Google_Font_Manager;
				$Ultimate_Google_Font_Manager->enqueue_selected_ultimate_google_fonts();
	
				return false;
			}
	
			if(!is_404() && !is_search()){
	
				if(stripos($post_content, 'font_call:'))
				{
					preg_match_all('/font_call:(.*?)"/',$post_content, $display);
					if (function_exists('enquque_ultimate_google_fonts_optimzed')) enquque_ultimate_google_fonts_optimzed($display[1]);
				}
				
				if( stripos( $post_content, '[swatch_container') || 
				    stripos( $post_content, '[ultimate_modal'))
				{
					wp_enqueue_script('ultimate-vc-addons-modernizr');
				}

				if( stripos( $post_content, '[ultimate_exp_section') ||
					stripos( $post_content, '[info_circle') ) {
					wp_enqueue_script('jquery_ui');
					wp_enqueue_script('ultimate-vc-addons-params');
					wp_enqueue_script('ultimate-vc-addons-info-circle');
				}

				if( stripos( $post_content, '[icon_timeline') ) {
					wp_enqueue_script('masonry');
				}

				if($isAjax == true) { // if ajax site load all js
					wp_enqueue_script('masonry');
				}

				if( stripos( $post_content, '[ultimate_google_map') ) {
					if(defined('DISABLE_ULTIMATE_GOOGLE_MAP_API') && (DISABLE_ULTIMATE_GOOGLE_MAP_API == true || DISABLE_ULTIMATE_GOOGLE_MAP_API == 'true'))
						$load_map_api = false;
					else
						$load_map_api = true;
					if($load_map_api)
						wp_enqueue_script('ultimate-vc-addons-googleapis');
				}

				if( stripos( $post_content, '[ult_range_slider') ) {
					wp_enqueue_script('jquery-ui-mouse');
					wp_enqueue_script('jquery-ui-widget');
					wp_enqueue_script('jquery-ui-slider');
					wp_enqueue_script('ult_range_tick');
					wp_enqueue_script('ult_ui_touch_punch');
				}

				wp_enqueue_script('ultimate-vc-addons-script');

				if( stripos( $post_content, '[ultimate_modal') ) {
					wp_enqueue_script('ultimate-vc-addons-modal-all');
				}
				
				$ultimate_css = "enable";
	
				if ($ultimate_css == "enable"){
					wp_enqueue_style('ultimate-vc-addons-style-min');
					if( stripos( $post_content, '[ultimate_carousel') ) {
						wp_enqueue_style("ult-icons");
					}
				} 
				
				wp_enqueue_script( 'ultimate-vc-addons-row-bg', $vc_addons_url.$js_path . 'ultimate_bg' . $ext . '.js' );
			}
		}
	}	

	/*-----------------------------------------------------------------------------------*/
	/*  REQUIRED FOR WOOCOMMERCE CART
	/*-----------------------------------------------------------------------------------*/
	require_once (get_template_directory().'/inc/theme-woocart.php');
	
	
	function carbon_allowed_tags() {
		global $allowedtags, $allowedposttags;
		$allowedtags['option'] = array('style'=>array(), 'id'=>array(), 'name'=>array(), 'class'=>array(), 'value'=>array(), 'selected'=>array());
		$allowedtags['input'] = array('style'=>array(), 'id'=>array(), 'name'=>array(), 'class'=>array(), 'value'=>array(), 'selected'=>array(), 'type'=>array(), 'onchange'=>array(), 'placeholder'=>array());
		$allowedtags['label'] = array('for'=>array());
		$allowedtags['iframe'] = array('style'=>array(), 'src'=>array(), 'allowfullscreen'=>array());
		$allowedposttags['div']['aria-hidden'] = array();
		$allowedposttags['div']['style'] = array();
		$allowedtags = array_merge($allowedtags, $allowedposttags);
	}
	add_action('init', 'carbon_allowed_tags', 10);

	function carbon_get_the_woo(){
		global $woocommerce;
		return isset($woocommerce) ? $woocommerce : array(); 
	}

	/*-----------------------------------------------------------------------------------*/
	/*  LOAD GOOGLE FONTS
	/*-----------------------------------------------------------------------------------*/
	function carbon_fonts_url() {
		global $carbon_import_fonts;
		
		$carbon_import_fonts = carbon_get_import_fonts();
		if (!is_array($carbon_import_fonts) && is_string($carbon_import_fonts)) $carbon_import_fonts = explode("|",$carbon_import_fonts);
		
		$aux = array();
		foreach ($carbon_import_fonts as $font){
			$aux[] = str_replace("|", ":", str_replace(" ", "+", $font));
		}
		
		$aux = array_unique($aux);
		
		$http = (is_ssl( )) ? "https:" : "http:";
		
		$keys = array("Arial","Arial+Black","Helvetica+Neue","Helvetica","Courier+New","Georgia","Impact","Lucida+Sans","Times+New+Roman","Trebuchet+MS","Verdana");
		
		foreach ($keys as $key){
			if (($key_search = array_search($key, $aux)) !== false) {
			    unset($aux[$key_search]);
			}
		}
		
		$carbon_import_fonts = implode("|", $aux);
	    $font_url = '';
	    /*
	    Translators: If there are characters in your language that are not supported
	    by chosen font(s), translate this to 'off'. Do not translate into your own language.
	     */
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'carbon' ) ) {
	        $font_url = add_query_arg( 'family', $carbon_import_fonts, $http."//fonts.googleapis.com/css", array(), null, 'all' );
	    }
	    return $font_url;
	}
	
	function carbon_google_fonts_scripts() {
	    wp_enqueue_style( 'carbon-google-fonts', carbon_fonts_url(), '' );
	}
	
	function carbon_get_custom_inline_css(){
		global $carbon_inline_css;
		wp_enqueue_style('carbon-custom-style', CARBON_CSS_PATH .'carbon-custom.css',99);
		if (!$carbon_inline_css) $carbon_inline_css = "";
		$carbon_inline_css .= "body{visibility:visible;}";
		wp_add_inline_style('carbon-custom-style', $carbon_inline_css);
	}
	
	function carbon_set_custom_inline_css($css){
		global $carbon_inline_css;
		$upper_theme_main_color = "#".get_option('carbon_style_color');
		$carbon_inline_css .= str_replace( '__USE_THEME_MAIN_COLOR__', $upper_theme_main_color, $css );
	}
	
	function carbon_set_team_profiles_content($content){
		global $carbon_team_profiles;
		if (!isset($carbon_team_profiles)) $carbon_team_profiles = '';
		$carbon_team_profiles .= $content;
	}
	
	function carbon_get_team_profiles_content(){
		global $carbon_team_profiles;
		if (isset($carbon_team_profiles)){
			$carbon_team_profiles = wp_kses_no_null( $carbon_team_profiles, array( 'slash_zero' => 'keep' ) );
			$carbon_team_profiles = wp_kses_normalize_entities($carbon_team_profiles);
			echo wp_kses_hook($carbon_team_profiles, 'post', array());
		}
	}
	
	// ajax workers
	//front
	if (get_option('carbon_enable_search')=="on" && get_option('carbon_enable_ajax_search')=="on"){
		include_once get_template_directory() . '/ajaxsearch.php';
	}
	include_once get_template_directory() . '/js/twitter/index.php';
// 	//back
	if ( is_admin() && current_user_can( 'manage_options' ) ) {
		require_once get_template_directory() . '/lib/functions/queryprojectsforcube.php';
		require_once get_template_directory() . '/lib/script/loadSettings.php';
		require_once get_template_directory() . '/lib/functions/carbon_demo_installer.php';
		require_once get_template_directory() . '/lib/utils/upload-handler.php';
		$carbon_imported_ids = get_option('carbon_imported_ids');
		if (!$carbon_imported_ids){
			$carbon_imported_ids = array();
			update_option('carbon_imported_ids', $carbon_imported_ids);
		}
		$carbon_imported_ids;
	}

	if (!function_exists('carbon_get_imported_ids')){
		function carbon_get_imported_ids(){
			global $carbon_imported_ids;
			return $carbon_imported_ids;
		}
	}

	if (!function_exists('carbon_set_imported_ids')){
		function carbon_set_imported_ids($ids){
			global $carbon_imported_ids;
			$carbon_imported_ids = $ids;
			update_option('carbon_imported_ids', $carbon_imported_ids);
		}
	}

	if (!function_exists('carbon_add_imported_id')){
		function carbon_add_imported_id( $id, $revs = false ){
			$aux = get_option('carbon_imported_ids');
			$output = "";
			if ($revs){
				if ( !array_search( $id, $aux ) ){
					array_push( $aux, $id );
					carbon_set_imported_ids($aux);
					return true;
				} else {
					return false;
				}
			} else {
				if ( !array_search( intval($id), $aux ) ){
					array_push( $aux, (int)$id );
					carbon_set_imported_ids($aux);
					return true;
				} else {
					return false;
				}
			}
		}
	}