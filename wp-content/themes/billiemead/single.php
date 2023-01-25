<?php
/**
 * @package WordPress
 * @subpackage Carbon
 */

get_header(); carbon_print_menu(); ?>
	
	<?php 
		if (have_posts()) {
			the_post(); 
			$carbon_type = get_post_type();
			$carbon_portfolio_permalink = get_option("carbon_portfolio_permalink");
			switch ($carbon_type){
				case "post":
					get_template_part('post-single', 'single');
				break;
				case $carbon_portfolio_permalink:
					get_template_part('proj-single', 'single');
				break;
				default:
					the_content();
				break;
			}
		}
	?>
	
<?php get_footer(); ?>