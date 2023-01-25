<?php get_header(); carbon_print_menu(); $carbon_color_code = get_option("carbon_style_color"); ?>

	<div class="container">
		<div class="entry-header">
			<div class="error-c">
				<img src="<?php echo esc_url(get_template_directory_uri() . "/images/error.png");?>" title="404"/>
				<br>
				<h1 class="heading-error"><?php
					if (function_exists('icl_t')){
						wp_kses_post(printf(esc_html__( "%s", "carbon" ), stripslashes_from_strings_only(icl_t( 'carbon', 'Oops! There is nothing here...', get_option('carbon_404_heading')))));
					} else {
						wp_kses_post(printf(esc_html__( "%s", "carbon" ), stripslashes_from_strings_only(get_option('carbon_404_heading'))));
					}
				?></h1>
							
				<p class="text-error"><?php
					if (function_exists('icl_t')){
						wp_kses_post(printf(esc_html__( "%s", "carbon" ), stripslashes_from_strings_only(icl_t( 'carbon', "It seems we can't find what you're looking for. Perhaps searching one of the links in the above menu, can help.", get_option('carbon_404_text')))));
					} else {
						wp_kses_post(printf(esc_html__( "%s", "carbon" ), stripslashes_from_strings_only(get_option('carbon_404_text'))));
					}
				?></p>
				
				<a href="<?php echo esc_url(home_url("/")); ?>" class="errorbutton"><?php
					if (function_exists('icl_t')){
						printf(esc_html__("%s","carbon"), icl_t( 'carbon', 'GO TO HOMEPAGE', get_option('carbon_404_button_text')));
					} else {
						printf(esc_html__("%s","carbon"), get_option('carbon_404_button_text'));
					}
				?></a>
			</div>
			
		</div>
	</div>
<?php
	if ( function_exists('wp_nonce_field') ){
		wp_nonce_field('carbon-theme-twitter','carbon-theme-twitter');
	}
	carbon_get_custom_inline_css(); wp_footer(); 
?>