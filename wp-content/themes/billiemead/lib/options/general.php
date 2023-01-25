<?php
	
$underconstructionpages = array();
$getunderconstructionpages = get_pages(array(
	'post_type' => 'page',
	'meta_key' => '_wp_page_template',
	'meta_value' => 'template-under-construction.php',
	'post_status' => 'publish'
));
if (!empty($getunderconstructionpages)){
	foreach ($getunderconstructionpages as $page){
		array_push($underconstructionpages, array("id"=>$page->ID, "name"=>$page->post_title));
	}
} else {
	$underconstructionpages = array(array("id"=>"0", "name"=>"You have no published Under Construction pages."));
}

$sides = get_option('carbon_sidebar_name_names');
if (is_string($sides)) $sides = explode(CARBON_SEPARATOR, $sides);
$outputsidebars = array(array("id"=>"defaultblogsidebar", "name" => "Blog Sidebar"));
if (!empty($sides)){
	foreach ($sides as $s){
		if ($s != ""){
			array_push($outputsidebars, array("id"=>$s, "name"=>$s));
		}
	}	
}

$ultimate_gf = array();
$querygf = get_option('ultimate_selected_google_fonts');
if (isset($querygf) && is_array($querygf)){
	foreach (get_option('ultimate_selected_google_fonts') as $font){
		array_push($font, $ultimate_gf);
	}	
}

$page_on_front = 0;
if (get_option('show_on_front') == "page") $page_on_front = get_option('page_on_front');

$google_fonts = carbon_get_all_google_fonts();

$carbon_fonts_array = carbon_fonts_array_builder();
$carbon_portfolio_types = carbon_portfolio_types();
$carbon_projects = carbon_get_proj();

$carbon_general_options= array( array(
	"name" => "General",
	"type" => "title",
	"img" => CARBON_IMAGES_URL."icon_general.png"
),

( defined('CARBON_PLG_ACTIVE') === true ? 
	array(
		"type" => "open",
		"subtitles"=>array(array("id"=>"main", "name"=>"Main Settings"), array("id"=>"projects", "name"=>"Projects"), array("id"=>"blog", "name"=>"Blog"), array("id"=>"archives", "name"=>"Archives"), array("id"=>"shop", "name"=>"Shop"), array("id"=>"underconstruction", "name"=>"Under Construction Mode"))
	) 
	:
	array("type" => "open",
		"subtitles"=>array(array("id"=>"main", "name"=>"Main Settings"), array("id"=>"blog", "name"=>"Blog"), array("id"=>"archives", "name"=>"Archives"), array("id"=>"shop", "name"=>"Shop"))
	)
),

/* ------------------------------------------------------------------------*
 * MAIN SETTINGS
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'main'
),

array(
	"type" => "documentation",
	"text" => "<h3>Website Loading</h3>"
),

array(
	"name" => "Enable Website Loading",
	"id" => "carbon_enable_website_loader",
	"type" => "checkbox",
	"std" => 'off'
),

array(
	"id" => "carbon_website_loader",
	"name" => "Loader Type",
	"type" => "website_loaders",
	"options" => array(array("id"=>"ball-pulse", "name"=>"Ball Pulse"),array("id"=>"ball-grid-pulse", "name"=>"Ball Grid Pulse"),array("id"=>"ball-clip-rotate", "name"=>"Ball Clip Rotate"),array("id"=>"ball-clip-rotate-pulse", "name"=>"Ball Clip Rotate Pulse"),array("id"=>"square-spin", "name"=>"Square Spin"),array("id"=>"ball-clip-rotate-multiple", "name"=>"Ball Clip Rotate Multiple"),array("id"=>"ball-pulse-rise", "name"=>"Ball Pulse Rise"),array("id"=>"ball-rotate", "name"=>"Ball Rotate"),array("id"=>"cube-transition", "name"=>"Cube Transition"),array("id"=>"ball-zig-zag", "name"=>"Ball Zig Zag"),array("id"=>"ball-triangle-path", "name"=>"Ball Triangle Path"),array("id"=>"ball-scale", "name"=>"Ball Scale"),array("id"=>"line-scale", "name"=>"Line Scale"),array("id"=>"line-scale-party", "name"=>"Line Scale Party"),array("id"=>"ball-scale-multiple", "name"=>"Ball Scale Multiple"),array("id"=>"ball-pulse-sync", "name"=>"Ball Pulse Sync"),array("id"=>"ball-beat", "name"=>"Ball Beat"),array("id"=>"line-scale-pulse-out", "name"=>"Line Scale Pulse Out"),array("id"=>"line-scale-pulse-out-rapid", "name"=>"Line Scale Pulse Out Rapid"),array("id"=>"ball-scale-ripple", "name"=>"Ball Scale Ripple"),array("id"=>"ball-scale-ripple-multiple", "name"=>"Ball Scale Ripple Multiple"),array("id"=>"ball-spin-fade-loader", "name"=>"Ball Spin Fade Loader"),array("id"=>"line-spin-fade-loader", "name"=>"Line Spin Fade Loader"),array("id"=>"pacman","name"=>"Pacman"),array("id"=>"load2","name"=>"Load 2"),array("id"=>"load3","name"=>"Load 3"),array("id"=>"load6","name"=>"Load 6")),
	"std" => "ball-pulse"
),

array(
	"name" => "Show Loading Percentage ?",
	"id" => "carbon_enable_website_loader_percentage",
	"type" => "checkbox",
	"std" => 'off'
),

array(
	"type" => "documentation",
	"text" => "<h3>Smooth Scroll</h3>"
),

array(
	"name" => "Enable Smooth Scroll",
	"id" => "carbon_enable_smooth_scroll",
	"type" => "checkbox",
	"std" => 'on'
),

array(
	"type" => "documentation",
	"text" => "<h3>Update Address on Scroll</h3>"
),

array(
	'name' => 'Update Address ?',
	'type' => 'checkbox',
	'id' => "carbon_update_section_titles",
	'std' => 'off',
	'desc' => 'Updates the Address with the Sections Title (on One Pages). Ex.: httpx://xxxxx.xxx/#About'
),


array(
	"type" => "documentation",
	"text" => "<h3>Go To Top</h3>"
),

array(
	"name" => "Enable Go To Top button",
	"id" => "carbon_enable_gotop",
	"type" => "checkbox",
	"std" => 'on'
),

array(
	"type" => "documentation",
	"text" => "<h3>Images with Grayscale Effect</h3>"
),

array(
	"name" => "Enable Grayscale Effect on Images",
	"id" => "carbon_enable_grayscale",
	"type" => "checkbox",
	"std" => 'off'
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * Projects
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'archives'
),


array(
	"type" => "documentation",
	"text" => "<h3>HomePage with Posts Listing</h3>"
),

array(
	"name" => "Primary Title",
	"id" => "carbon_index_primary_title",
	"type" => "text"
),

array(
	"name" => "Secondary Title",
	"id" => "carbon_index_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),

array(
	"type" => "documentation",
	"text" => "<h3>Blog Archive</h3>"
),

array(
	"name" => "Secondary Title",
	"id" => "carbon_archive_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),

array(
	"name" => "Sidebar ?",
	"id" => "carbon_blog_archive_sidebar",
	"type" => "select",
	"options" => array(array("id"=>"none", "name"=>"None"), array("id"=>"left", "name"=>"Left"), array("id"=>"right", "name"=>"Right")),
	"std"=>"none"
),

array(
	"name" => "Choose your Sidebar",
	"id" => "carbon_blog_archive_sidebars_available",
	"type" => "select",
	"options" => $outputsidebars
),

array(
	"name" => "Blog Style",
	"id" => "carbon_blog_archive_style",
	"type" => "select",
	"options" => array(array("id"=>"normal","name"=>"Normal style"), array("id"=>"masonry","name"=>"Masonry style")),
	"std" => "normal"
),

array(
	"name" => "Display Metas ?",
	"id" => "carbon_display_metas",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Metas to Display",
	"id" => "carbon_metas_to_display",
	"type" => "multicheck",
	"options" => array(array("id"=>"date","name"=>"Date"),array("id"=>"author","name"=>"Author"),array("id"=>"tags","name"=>"Tags"),array("id"=>"categories","name"=>"Categories"),array("id"=>"comments","name"=>"Comments"),array("id"=>"customtext","name"=>"Custom Text")),
	"sortable" => true,
	"desc" => "Here you can define what metas appear on the Blog Archives and their order. Drag the metas to sort them.",
	"std" => "date,author,tags,categories"
),

array(
"type" => "close"),

/* ------------------------------------------------------------------------*
 * Blog
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'blog'
),

array(
	"type" => "documentation",
	"text" => "<h3>Blog Reading Option</h3>"
),

array(
	"name" => "Reading Type",
	"id" => "carbon_blog_reading_type",
	"type" => "select",
	"options" => array(array('id'=>'default','name'=>'Default'), array('id'=>'paged','name'=>'Pagination'), array('id'=>'dropdown', 'name'=>'Pagination Dropdown List'), array('id'=>'scroll','name'=>'Load More'), array('id'=>'scrollauto','name'=>'Auto Load More')),
	"std" => 'paged'
),

array(
	"type" => "documentation",
	"text" => "<h3>Blog - Single Post Options</h3>"
),

array(
	"name" => "Primary Title",
	"id" => "carbon_blog_single_primary_title",
	"type" => "text",
	"std" => "Blog"
),

array(
	"name" => "Secondary Title",
	"id" => "carbon_blog_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),


array(
	"name" => "Sidebar ?",
	"id" => "carbon_blog_single_sidebar",
	"type" => "select",
	"options" => array(array("id"=>"none", "name"=>"None"), array("id"=>"left", "name"=>"Left"), array("id"=>"right", "name"=>"Right")),
	"std"=>"right"
),

array(
	"name" => "Choose your Sidebar",
	"id" => "carbon_sidebars_available",
	"type" => "select",
	"options" => $outputsidebars
),

array(
	"name" => "Enlarge Images on Single Post",
	"id" => "carbon_enlarge_images",
	"type" => "checkbox",
	"std" => 'off',
	"desc" => 'If "ON" PrettyPhoto effect will be available.'
),

array(
	"name" => "Show Social Shares ?",
	"id" => "carbon_post_single_social_shares",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Socials",
	"id" => "carbon_post_single_socials",
	"type" => "multicheck",
	"options" => array(array("id"=>"facebook", "name"=>"Facebook"), array("id"=>"twitter","name"=>"Twitter"), array("id"=>"linkedin", "name"=>"LinkedIn"), array("id"=>"pinterest", "name"=>"Pinterest"), array("id"=>"tumblr","name"=>"Tumblr"), array("id"=>"email", "name"=>"Email")),
	"class" => "",
	"std" => "facebook,twitter,linkedin,pinterest,tumblr,email"
),

array(
	"name" => "Show 'About Author' section ?",
	"id" => "carbon_post_enable_about_author",
	"type" => "checkbox",
	"std" => "on"
),

array(
"type" => "close"),


/* ------------------------------------------------------------------------*
 * Projects
 * ------------------------------------------------------------------------*/

array(
	"type" => "subtitle",
	"id"=>'projects'
),

array(
	"type" => "documentation",
	"text" => "<h3>Projects Display</h3>"
),


array(
	"name" => "Portfolio Permalink",
	"id" => "carbon_portfolio_permalink",
	"type" => "text",
	"std" => "portfolio",
	"desc" => "Change the \"/portfolio/\" bit of the projects' permalink. <br/><strong>Max. 20 characters, can not contain capital letters or spaces.</strong>"
),

array(
	"name" => "Project Single Layout Option",
	"id" => "carbon_single_layout",
	"type" => "select",
	"options" => array(array('id'=>'left_media', 'name'=>'Media on the Left'),array('id'=>'full_media', 'name'=>'Media occupies the container\'s full length'), array('id'=>'fullwidth_media', 'name'=>'Media occupies the window\'s length')),
	"std" => 'full_media'
),

array(
	"name" => "Show Social Shares ?",
	"id" => "carbon_project_single_social_shares",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Socials",
	"id" => "carbon_project_single_socials",
	"type" => "multicheck",
	"options" => array(array("id"=>"facebook", "name"=>"Facebook"), array("id"=>"twitter","name"=>"Twitter"), array("id"=>"linkedin", "name"=>"LinkedIn"), array("id"=>"pinterest", "name"=>"Pinterest"), array("id"=>"tumblr","name"=>"Tumblr"), array("id"=>"email", "name"=>"Email")),
	"class" => "",
	"std" => "facebook,twitter,linkedin,pinterest,tumblr,email"
),

array(
	"type" => "close"
),

/* shop */
array(
	"type" => "subtitle",
	"id" => "shop"
),

array(
	"type" => "documentation",
	"text" => "<h3>WooCommerce Shop</h3><br/><p class='margin-top-20px'>These titles will appear on Product Pages (either single products and categories/tags)</p>"
),

array(
	"name" => "Shop Primary Title",
	"id" => "carbon_shop_primary_title",
	"type" => "text",
	"std" => "Shop"
),

array(
	"name" => "Shop Secondary Title",
	"id" => "carbon_shop_secondary_title",
	"type" => "text",
	"desc" => "If set, will display this as a secondary title."
),

array(
	"name" => "Sidebar ?",
	"id" => "carbon_woo_sidebar_scheme",
	"type" => "select",
	"options" => array(array("id"=>"none", "name"=>"None"), array("id"=>"left", "name"=>"Left"), array("id"=>"right", "name"=>"Right")),
	"std"=>"right"
),

array(
	"name" => "Choose your Sidebar",
	"id" => "carbon_woo_sidebar",
	"type" => "select",
	"options" => $outputsidebars
),

array(
	"type" => "documentation",
	"text" => "<h3>Product Features</h3>"
),

array(
	"name" => "Enable Zoom ?",
	"id" => "carbon_woo_zoom",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Enable Lightbox ?",
	"id" => "carbon_woo_lightbox",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"name" => "Enable Slider ?",
	"id" => "carbon_woo_slider",
	"type" => "checkbox",
	"std" => "on"
),

array(
	"type" => "close"
),

/* under construction mode */
array(
	"type" => "subtitle",
	"id" => "underconstruction"
),

array(
	"type" => "documentation",
	"text" => "<h3>Under Construction Mode</h3>"
),

array(
	"name" => "Under Construction Mode",
	"id" => "carbon_enable_under_construction",
	"type" => "checkbox",
	"std" => "off",
	"desc" => "If set to ON, non-logged-in users will be redirected to an Under Construction Page of your choosing."
),

array(
	"name" => "Under Construction Page",
	"id" => "carbon_under_construction_page",
	"type" => "select",
	"options" => $underconstructionpages
),

array(
	"name" => "xxxxxxxx",
	"id" => 'ultimate_selected_google_fonts',
	"type" => "fakeinput",
	"std" => $ultimate_gf
),

array(
	"name" => "xxxxxxxxy",
	"id" => 'page_on_front',
	"type" => "fakeinput",
	"std" => $page_on_front,
	"el_class" => "show_on_front"
),

array(
	"type" => "close"
),

array(
"type" => "close"));

carbon_add_options($carbon_general_options);