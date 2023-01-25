<?php
function carbon_styles(){

	 if (!is_admin()){
		
		wp_enqueue_style('carbon-blog', CARBON_CSS_PATH .'blog.css'); 
	 	wp_enqueue_style('carbon-bootstrap', CARBON_CSS_PATH .'bootstrap.css');
		wp_enqueue_style('carbon-icons', CARBON_CSS_PATH .'icons-font.css');
		wp_enqueue_style('carbon-component', CARBON_CSS_PATH .'component.css');
		
		wp_enqueue_style('carbon-IE', CARBON_CSS_PATH .'IE.css');	
		wp_style_add_data('carbon-IE','conditional','IE');
		
		wp_enqueue_style('carbon-editor', get_template_directory_uri().'/editor-style.css');
		wp_enqueue_style('carbon-woo-layout', CARBON_CSS_PATH .'carbon-woo-layout.css');
		wp_enqueue_style('carbon-woo', CARBON_CSS_PATH .'carbon-woocommerce.css');
		wp_enqueue_style('carbon-ytp', CARBON_CSS_PATH .'mb.YTPlayer.css');
		wp_enqueue_style('carbon-retina', CARBON_CSS_PATH .'retina.css');
		
		
	}
}
add_action('wp_enqueue_scripts', 'carbon_styles', 1);

?>