<?php
/*
Template Name: Blank Template (No header nor footer)
*/
get_header(); 
wp_enqueue_style('carbon-custom-style', CARBON_CSS_PATH .'carbon-custom.css',99);
$carbon_inline_css = "body{visibility:visible;}";
wp_add_inline_style('carbon-custom-style', $carbon_inline_css);
$theid = (isset($carbon_uc_id)) ? $carbon_uc_id : get_the_ID();
$post = get_post($theid);
if (class_exists('Ultimate_VC_Addons')) {
	if(stripos($post->post_content, 'font_call:')){
		preg_match_all('/font_call:(.*?)"/',$post->post_content, $display);
		if (function_exists('enquque_ultimate_google_fonts_optimzed')) enquque_ultimate_google_fonts_optimzed($display[1]);
	}
	carbon_google_fonts_scripts();
}
?>
<div class="page-template page-template-template-blank page-template-template-blank-php <?php echo esc_attr("the-id-is-$theid"); ?>">
	<div class="fullwindow_content container">
		<div class="tb-row">
			<div class="tb-cell">
				<?php 
					if (post_password_required()) echo get_the_password_form();
					else {
						if (is_preview()){
							wp_reset_postdata();
							the_content();
						} else {
							if (function_exists('wpb_js_remove_wpautop') == true)
								echo wpb_js_remove_wpautop($post->post_content);
							else echo wp_kses_post($post->post_content); 
							/* custom element css */
							$shortcodes_custom_css = get_post_meta( $theid, '_wpb_shortcodes_custom_css', true );
							if ( ! empty( $shortcodes_custom_css ) ) {
								carbon_set_custom_inline_css($shortcodes_custom_css);
							}
						}
					}
				?>
			</div>
		</div>
	</div>
	<?php carbon_get_custom_inline_css(); wp_footer(); ?>
</div>
