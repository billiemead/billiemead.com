<?php
/**
 * @package WordPress
 * @subpackage Carbon
**/

get_header(); carbon_print_menu(); $carbon_color_code = get_option("carbon_style_color");

	/* pagetitle options related. */
	$type = get_option("carbon_header_type");
	$thecolor = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_header_color"))); 
	$opacity = intval(str_replace("%","",get_option("carbon_header_opacity")))/100;
	$color = "rgba(".$thecolor[0].",".$thecolor[1].",".$thecolor[2].",".$opacity.")";
	$image = get_option("carbon_header_image"); 
	$pattern = is_string(get_option("carbon_header_pattern")) ? CARBON_PATTERNS_URL.get_option("carbon_header_pattern") : ""; 
	$custompattern = get_option("carbon_header_custom_pattern"); 
	$margintop = get_option("carbon_header_text_margin_top");	
	$banner = get_option("carbon_banner_slider");
	$showtitle = get_option("carbon_hide_pagetitle") == "on" ? true : false;
	$showsectitle = get_option("carbon_hide_sec_pagetitle") == "on" ? true : false;
	$tcolor = get_option("carbon".'_header_text_color');
	$tsize = intval(str_replace(" ", "", get_option("carbon".'_header_text_size')),10)."px";
	$tfont = get_option("carbon".'_header_text_font');
	$stcolor = get_option("carbon".'_secondary_title_text_color');
	$stsize = intval(str_replace(" ", "", get_option("carbon".'_secondary_title_text_size')),10)."px";
	$stfont = get_option("carbon".'_secondary_title_font');
	$stmargin = intval(str_replace(" ", "", get_option("carbon".'_header_sec_text_margin_top')),10)."px";
	$originalalign = get_option("carbon_header_text_alignment");
	$pt_parallax = get_option("carbon_pagetitle_image_parallax") == "on" ? true : false;
	$pt_overlay = get_option("carbon_pagetitle_image_overlay") == "on" ? true : false;
	$pt_overlay_type = get_option("carbon_pagetitle_overlay_type");
	$pt_overlay_the_color = carbon_hex2rgb(str_replace("__USE_THEME_MAIN_COLOR__", $carbon_color_code, get_option("carbon_pagetitle_overlay_color")));
	$pt_overlay_pattern = (is_string(get_option("carbon_pagetitle_overlay_pattern"))) ? CARBON_PATTERNS_URL.get_option("carbon_pagetitle_overlay_pattern") : "";
	$pt_overlay_opacity = intval(str_replace("%","",get_option("carbon_pagetitle_overlay_opacity")))/100;
	$pt_overlay_color = "rgba(".$pt_overlay_the_color[0].",".$pt_overlay_the_color[1].",".$pt_overlay_the_color[2].",".$pt_overlay_opacity.")";
	$breadcrumbs = get_option("carbon_breadcrumbs");
	$breadcrumbs_margintop = get_option('carbon_breadcrumbs_text_margin_top');
	$pagetitlepadding = get_option('carbon_page_title_padding');
	$height = "auto";
	$sidebar_scheme = get_option('carbon_search_archive_sidebar');
	$sidebar = carbon_convert_to_class(get_option('carbon_search_sidebars_available'));
	$textalign = $originalalign;
	if ($originalalign == "titlesleftcrumbsright") $textalign = "left";
	if ($originalalign == "titlesrightcrumbsleft") $textalign = "right";

	$carbon_import_fonts[] = $tfont;
	$principalfont = explode("|",$tfont);
	$principalfont[0] = $principalfont[0]."', 'Arial', 'sans-serif";
	if (!isset($principalfont[1])) $principalfont[1] = "";
		
	$carbon_import_fonts[] = $stfont;
	$secondaryfont = explode("|",$stfont);
	$secondaryfont[0] = $secondaryfont[0]."', 'Arial', 'sans-serif";
	if (!isset($secondaryfont[1])) $secondaryfont[1] = "";

	/* endof pagetitle options stuff. */
	
	/* search code related. counters and stuff. */
	$carbon_reading_option = get_option('carbon_blog_reading_type');
	$carbon_more = 0;

	$orderby="";
	$category="";
	$nposts = "";

	$pag = 1;
	$pag = $wp_query->query_vars['paged'];
	if (!is_numeric($pag)) $pag = 1;
 
	
	$se = get_option("carbon_enable_search_everything");

	if ($se == "on"){
		$args = array(
			'showposts' => get_option('posts_per_page'),
			'post_status' => 'publish',
			'paged' => $pag,
			's' => esc_html($_GET['s'])
		);
	    
	    $carbon_the_query = new WP_Query( $args );
	    
	    $args2 = array(
			'showposts' => -1,
			'post_status' => 'publish',
			's' => esc_html($_GET['s'])
		);
		
		$counter = new WP_Query($args2);
		
	} else {
		$args = array(
			'showposts' => get_option('posts_per_page'),
			'post_status' => 'publish',
			'paged' => $pag,
			'post_type' => 'post',
			's' => esc_html($_GET['s'])
		);
			
	    $carbon_the_query = new WP_Query( $args );
	    
	    $args2 = array(
			'showposts' => -1,
			'post_status' => 'publish',
			'post_type' => 'post',
			's' => esc_html($_GET['s'])
		);
		
		$counter = new WP_Query($args2);
	}
	/* endof search stuff. */
	
	if ($type != "without"){
		
		$ptitleaux = $bcaux = "";
		if ($originalalign == "titlesleftcrumbsright" || $originalalign == "titlesrightcrumbsleft"){
    		$ptitleaux .= "max-width: 50%;";
    		$bcaux .= "max-width: 50%;";
    		if ($originalalign == "titlesleftcrumbsright"){
				$ptitleaux .= "float:left;";
				$bcaux .= "float:right;";
			} else {
				$ptitleaux .= "float:right;";
				$bcaux .= "float:left;";
			}
		}
		$bcaux .= "margin-top:".intval($breadcrumbs_margintop,10)."px;";
		switch($originalalign){
			case "left": case "titlesrightcrumbsleft":
				$bcaux .= "text-align: left;";
			break;
			case "right": case "titlesleftcrumbsright":
				$bcaux .= "text-align:right;";
			break;
			case "center": 
				$bcaux .= "text-align:center;";
			break;
		}
		?>
		<div class="fullwidth-container <?php if ($type == "pattern") echo "bg-pattern"; ?> <?php if ($pt_parallax) echo "parallax"; ?><?php if (($type == "image" || $type == "pattern") && get_option('carbon_enable_grayscale') == 'on') echo " carbon_grayscale "; ?>" <?php if ($pt_parallax) echo 'data-stellar-ratio="0.5"'; ?> 
	    	<?php
		    	$carbon_output = ".fullwidth-container{";
		 		if ($height != "") $carbon_output.= "height: ". $height . ";";
				if ($type == "none") $carbon_output.= "background: none;"; 
				if ($type == "color") $carbon_output.= "background: " . $color . ";";
				if ($type == "image") $carbon_output.= "background: url(" . $image . ") no-repeat; background-size: 100% auto;";  
	 			if ($type == "pattern") $carbon_output.= "background: url('" . $pattern . "') 0 0 repeat;";
				$carbon_output .= "}";
				carbon_set_custom_inline_css($carbon_output);
				
				$background_position = 'center';
		
	    	?> <?php if ($type == "image" && !$pt_parallax) echo ' data-background-alignment="'. esc_attr( $background_position ) .'" '; ?>>
	    	<?php
		    	if ($type == "image" && $pt_overlay){
			    	$carbon_output = ".pagetitle_overlay{";
			    	echo '<div class="pagetitle_overlay"></div> '; 
			    	if ($pt_overlay_type == "color") $carbon_output.= 'background-color:'.$pt_overlay_color.' !important';
			    	else $carbon_output.= 'background:url('.$pt_overlay_pattern.') repeat;opacity:'.$pt_overlay_opacity.' !important;';
			    	$carbon_output .= "}";
					carbon_set_custom_inline_css($carbon_output);
		    	}
		    	if ($type === "banner"){
			    	?> 
			    	<div class="revBanner">
				    	<?php
					    	if (substr($banner, 0, 10) === "revSlider_"){
								if (!function_exists('putRevSlider')){
									echo esc_html__('Please install the missing plugin - Revolution Slider.', 'carbon');
								} else {
									putRevSlider(substr($banner, 10));
								}
							} 
							if (substr($banner, 0, 13) === "masterSlider_"){
								if (!function_exists('masterslider')){
									echo esc_html__('Please install the missing plugin - MasterSlider.', 'carbon');
								} else {
									echo do_shortcode( '[masterslider alias="'.substr($banner, 13).'"]' );
								}
							}
				    	?>
				    </div> 
				    <?php
		    	} else {
		    	?>
				<div class="container present-container <?php echo esc_attr($originalalign); ?>">
					<?php
						$carbon_output = ".present-container{padding: ".esc_attr($pagetitlepadding)." 15px;}";
						carbon_set_custom_inline_css($carbon_output);
					?>
					<div class="pageTitle">
					<?php
						$carbon_output = ".present-container .pageTitle{text-align: ".esc_attr($textalign).";".esc_attr($ptitleaux)."}";
						carbon_set_custom_inline_css($carbon_output);
						if ($showtitle){
							?>
							<h1 class="page_title">
								<?php
									if (function_exists('icl_t')){
										echo wp_kses_post($counter->post_count . " " . sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Search results for', get_option('carbon_search_results_text'))) . " &#8216;" . $_GET['s'] ."&#8217;");
									} else {
										echo wp_kses_post($counter->post_count . " " . sprintf(esc_html__("%s", "carbon"), get_option("carbon_search_results_text")) . " &#8216;" . $_GET['s'] ."&#8217;");
									}
								?>
							</h1>
							<?php
							$carbon_output = ".present-container h1.page_title{color: #$tcolor; font-size: $tsize; font-family: '{$principalfont[0]}';font-weight: {$principalfont[1]};";
							if ($margintop != "") $carbon_output .= esc_attr("margin-top: ".intval($margintop,10)."px;");
							$carbon_output .= "}";
							carbon_set_custom_inline_css($carbon_output);
						}
		    			if ($showsectitle){
			    			if (is_string(get_option("carbon_search_secondary_title")) && get_option("carbon_search_secondary_title") != ""){
						    	?>
							    <h2 class="secondaryTitle">
							    	<?php echo wp_kses_post(get_option("carbon_search_secondary_title")); ?>
							    </h2>
					    		<?php
					    	}
			    			$carbon_output = ".present-container .secondaryTitle{color: #$stcolor; font-size: $stsize; line-height: $stsize; font-family: '{$secondaryfont[0]}';font-weight:{$secondaryfont[1]}; margin-top:{$stmargin};}";
							carbon_set_custom_inline_css($carbon_output);
		    			}
		    		?>

		    		</div>
				</div>
		<?php }
		?>
		</div><!-- end of fullwidth section -->
		<?php 
	}
	
	if (!$sidebar) $sidebar = "defaultblogsidebar";
	switch ($sidebar_scheme){
		case "none":
			?>
			<div class="master_container master_container_bgwhite" >
				<div class="container">
					<section class="page_content">
						<?php carbon_print_search_results(); ?>
					</section>
				</div>
			</div>
			<?php
		break;
		case "left":
			?>
			<div class="master_container master_container_bgwhite" >
				<div class="container">
					<section class="page_content left sidebar col-xs-12 col-md-3">
						<?php 
						if ($sidebar === "defaultblogsidebar") $sidebar = 'sidebar-widgets';
						if ( function_exists('dynamic_sidebar') && is_active_sidebar( $sidebar )) { 
							ob_start();
							do_shortcode(dynamic_sidebar($sidebar));
							$html = ob_get_contents();
							ob_end_clean();
							$html = wp_kses_no_null( $html, array( 'slash_zero' => 'keep' ) );
							$html = wp_kses_normalize_entities($html);
							echo wp_kses_hook($html, 'post', array());  
						} else get_sidebar();
						wp_reset_postdata();
						?>
					</section>
					<section class="page_content right col-xs-12 col-md-9">
						<?php carbon_print_search_results(); ?>
					</section>
				</div>
			</div>
			<?php
		break;
		case "right":
			?>
			<div class="master_container master_container_bgwhite" >
				<div class="container">
					<section class="page_content left col-xs-12 col-md-9">
						<?php carbon_print_search_results(); ?>
					</section>
					<section class="page_content right sidebar col-xs-12 col-md-3">
						<?php 
						wp_reset_postdata();
						if ($sidebar === "defaultblogsidebar") $sidebar = 'sidebar-widgets';
						if ( function_exists('dynamic_sidebar') && is_active_sidebar( $sidebar )) { 
							ob_start();
							do_shortcode(dynamic_sidebar($sidebar));
							$html = ob_get_contents();
							ob_end_clean();
							$html = wp_kses_no_null( $html, array( 'slash_zero' => 'keep' ) );
							$html = wp_kses_normalize_entities($html);
							echo wp_kses_hook($html, 'post', array());  
						} else get_sidebar();
						?>
					</section>
				</div>
			</div>
			<?php
		break;
		default:
			?>
			<div class="master_container master_container_bgwhite" >
				<div class="container">
					<section class="page_content">
						<?php carbon_print_search_results(); ?>
					</section>
				</div>
			</div>
			<?php
		break;
	}
	
	function carbon_print_search_results(){
		global $carbon_the_query;
		if ($carbon_the_query->have_posts()){
		?> 
		
		<div class="post-listing">
			<?php			    
			    while ( $carbon_the_query->have_posts() ) : 
						
			    	$carbon_the_query->the_post();
		    		global $carbon_more;
			    		$carbon_more = 0;
					
					?>
			    	
			    	<article id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
				    	
				    	
				    	<div class="the_title"><h2><a href="<?php esc_url(the_permalink()); ?>"><?php wp_kses_post(the_title()); ?></a></h2></div>
    		
			    										
					<?php
						if (get_option("carbon_display_metas") == "on"){
							?>
							<div class="metas-container">
								<?php
					    			$metas = explode(",", get_option("carbon_metas_to_display"));
					    			if (!empty($metas)){
						    			$firstMeta = true;
						    			foreach ($metas as $meta){
							    			switch ($meta){
								    			case "date": 
								    				if (!$firstMeta){
										    			echo '<p class="metas-sep">|</p>';
									    			} else {
										    			$firstMeta = false;
									    			}
								    				?>
								    				<p class="blog-date"><?php echo get_the_date(); ?></p>
								    				<?php
								    			break;
								    			case "author":
								    				if (!$firstMeta){
										    			echo '<p class="metas-sep">|</p>';
									    			} else {
										    			$firstMeta = false;
									    			}
								    				?>
								    				<p data-rel="metas-author"><?php
									    				if (function_exists('icl_t')){
										    				printf(esc_html__("%s","carbon"), icl_t( 'carbon', 'by', get_option('carbon_by_text')));
									    				} else {
										    				printf(esc_html__("%s","carbon"), get_option("carbon_by_text"));
									    				}
								    				?>: <a class="the_author" href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"> <?php  esc_html(the_author_meta('nickname')); ?></a></p>
								    				<?php
								    			break;
								    			case "tags":
								    				$posttags = get_the_tags();
													if ($posttags) {
														if (!$firstMeta){
											    			echo '<p class="metas-sep">|</p>';
										    			} else {
											    			$firstMeta = false;
										    			}
														$first = true;
														echo '<p data-rel="metas-tags">';
														if (function_exists('icl_t')){
										    				printf(esc_html__("%s","carbon"), icl_t( 'carbon', 'by', get_option('carbon_tags_text')));
									    				} else {
										    				printf(esc_html__("%s","carbon"), get_option("carbon_tags_text"));
									    				}
														echo ': ';
														foreach($posttags as $tag) {
															if ($tag->name != "uncategorized"){
																if ($first){
																	echo "<a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>"; 
																	$first = false;
																} else {
																	echo "<span>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
																}
															}
													  	}
													  	echo '</p>';
													}
								    			break;
								    			case "categories":
								    				$postcats = get_the_category();
													if ($postcats) {
														if (!$firstMeta){
											    			echo '<p class="metas-sep">|</p>';
										    			} else {
											    			$firstMeta = false;
										    			}
														$first = true;
														echo '<p data-rel="metas-categories">';
														if (function_exists('icl_t')){
										    				printf(esc_html__("%s","carbon"), icl_t( 'carbon', 'by', get_option('carbon_categories_text')));
									    				} else {
										    				printf(esc_html__("%s","carbon"), get_option("carbon_categories_text"));
									    				}
														echo ': ';
														foreach($postcats as $cat) {
															if ($cat->name != "uncategorized"){
																if ($first){
																	echo "<a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																	$first = false;
																} else {
																	echo "<span>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																}	
															}
													  	}
													  	echo '</p>';
													}
								    			break;
								    			case "comments":
								    				if (!$firstMeta){
										    			echo '<p class="metas-sep">|</p>';
									    			} else {
										    			$firstMeta = false;
									    			}
								    				echo '<p data-rel="metas-comments">';
								    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
								    				echo '</p>';
								    			break;
								    			case "customtext":
								    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
										    			echo '<p class="metas-sep">|</p>';
										    			echo '<p data-rel="metas-customtext">'.wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) ).'</p>';
									    			} else {
										    			if (strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0){
											    			echo '<p data-rel="metas-customtext">'.wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) ).'</p>';
											    			$firstMeta = false;
										    			}
									    			}
								    			break;
							    			}
						    			}
					    			}
				    			?>
				    		</div>
							<?php
						}
				    ?> 
			    		
			    		<?php
			    		if (!is_sticky()){
				    		?>
						<div class="des-sc-dots-divider"></div>
				    		<?php
			    		}
			    		?>
						
				    </article> <!-- end of post -->
				    	
			    <?php endwhile; ?>
			    		
	    	</div> <!-- end of post-listing -->
					
			<div class="navigation">
				<?php
					$carbon_reading_option = get_option('carbon_blog_reading_type');
					if ($carbon_reading_option != "paged" && $carbon_reading_option != "dropdown"){ 
						$carbon_the_query = new WP_Query();
						if (function_exists('icl_t')){
							next_posts_link('<div class="next-posts">&laquo; ' . sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Previous results', get_option('carbon_previous_results'))).'</div>', $carbon_the_query->max_num_pages);
							previous_posts_link('<div class="prev-posts">'.sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Next results', get_option('carbon_next_results'))) . ' &raquo;</div>', $carbon_the_query->max_num_pages);
						} else {
							next_posts_link('<div class="next-posts">&laquo; ' . sprintf(esc_html__("%s", "carbon"), get_option("carbon_previous_results")).'</div>', $carbon_the_query->max_num_pages);
							previous_posts_link('<div class="prev-posts">'.sprintf(esc_html__("%s", "carbon"), get_option("carbon_next_results")) . ' &raquo;</div>', $carbon_the_query->max_num_pages);
						}
					} else { 
						carbon_wp_pagenavi();
					}
				?>
			</div>

									
		<?php  }  else { ?>
	
		<div class="post-listing">
			<div class="pageTitle">
				<h2 class="hsearchtitle"><?php
					if (function_exists('icl_t')){
						echo sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'No results found.', get_option('carbon_no_results_text')));
					} else {
						echo sprintf(esc_html__("%s", "carbon"), get_option("carbon_no_results_text"));
					}
				?></h2>
				<p class="titleSep"></p>
			</div>
		</div>
		
		
	<?php }
	}
	?>
	
<?php get_footer(); ?>