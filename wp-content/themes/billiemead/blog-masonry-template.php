<?php
/*
Template Name: Blog Masonry Template
*/
get_header(); carbon_print_menu();

	$carbon_thisPostID = get_the_ID(); $carbon_color_code = get_option("carbon_style_color");

	if (get_post_meta($carbon_thisPostID, "carbon_enable_custom_pagetitle_options_value", true) == "no" || !get_post_meta($carbon_thisPostID, "carbon_enable_custom_pagetitle_options_value", true) || (defined('CARBON_IS_FIRST_PAGE') && CARBON_IS_FIRST_PAGE)){
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
	} else {
		$type = get_post_meta($carbon_thisPostID, "carbon_header_type_value", true);
		$thecolor = carbon_hex2rgb(get_post_meta($carbon_thisPostID, "carbon_header_color_value", true)); 
		$opacity = intval(str_replace("%","",get_post_meta($carbon_thisPostID, "carbon_header_color_opacity_value", true)))/100;
		$color = "rgba(".$thecolor[0].",".$thecolor[1].",".$thecolor[2].",".$opacity.")";
		$image = get_post_meta($carbon_thisPostID, "carbon_header_image_value", true);
		$image = explode('|!|',$image);
		if (isset($image[1])) $image = explode('|*|',$image[1]);
		$image = $image[0];
		$pattern = CARBON_PATTERNS_URL.get_post_meta($carbon_thisPostID, "carbon_header_pattern_value", true).".jpg";
		$custompattern = get_option("carbon_header_custom_pattern_value"); 
		$margintop = get_post_meta($carbon_thisPostID, "carbon_header_text_margin_top_value", true);
		$banner = get_post_meta($carbon_thisPostID, "carbon_banner_slider_value", true);
		$showtitle = get_post_meta($carbon_thisPostID, "carbon_hide_pagetitle_value", true) == "yes" ? true : false;
		$showsectitle = get_post_meta($carbon_thisPostID, "carbon_hide_sec_pagetitle_value", true) == "yes" ? true : false;
		$tcolor = get_post_meta($carbon_thisPostID, "carbon_header_text_color_value", true);
		$tsize = intval(str_replace(" ", "", get_post_meta($carbon_thisPostID, "carbon_header_text_size_value", true)),10)."px";
		$tfont = get_post_meta($carbon_thisPostID, "carbon_header_text_font_value", true);
		$stcolor = get_post_meta($carbon_thisPostID, "carbon_secondary_title_text_color_value", true);
		$stsize = intval(str_replace(" ", "", get_post_meta($carbon_thisPostID, "carbon_secondary_title_text_size_value", true)),10)."px";
		$stfont = get_post_meta($carbon_thisPostID, "carbon_secondary_title_font_value", true);
		$stmargin = intval(str_replace(" ", "", get_post_meta($carbon_thisPostID, "carbon_header_secondary_text_margin_top_value", true)),10)."px";
		$originalalign = get_post_meta($carbon_thisPostID, "carbon_header_text_alignment_value", true);
		$pt_parallax = get_post_meta($carbon_thisPostID, "carbon_pagetitle_image_parallax_value", true) == "on" ? true : false;
		$pt_overlay = get_post_meta($carbon_thisPostID, "carbon_pagetitle_image_overlay_value", true) == "on" ? true : false;
		$pt_overlay_type = get_post_meta($carbon_thisPostID, "carbon_pagetitle_overlay_type_value", true);
		$pt_overlay_the_color = carbon_hex2rgb(get_post_meta($carbon_thisPostID, "carbon_pagetitle_overlay_color_value", true));
		$pt_overlay_pattern = CARBON_PATTERNS_URL.get_post_meta($carbon_thisPostID, "carbon_pagetitle_overlay_pattern_value", true).".jpg";
		$pt_overlay_opacity = intval(str_replace("%","",get_post_meta($carbon_thisPostID, "carbon_pagetitle_overlay_opacity_value", true)))/100;
		$pt_overlay_color = "rgba(".$pt_overlay_the_color[0].",".$pt_overlay_the_color[1].",".$pt_overlay_the_color[2].",".$pt_overlay_opacity.")";
		$breadcrumbs = get_post_meta($carbon_thisPostID, "carbon_enable_breadcrumbs_value", true) == "yes" ? "on" : "off";
		$breadcrumbs_margintop = intval(str_replace(" ", "", get_post_meta($carbon_thisPostID, "carbon_breadcrumbs_margin_top_value", true)),10)."px";
		$pagetitlepadding = intval(str_replace(" ", "", get_post_meta($carbon_thisPostID, "carbon_page_title_padding_value", true)),10)."px";
	}
	$height = "auto";
	
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
				if (defined("CARBON_IS_FIRST_PAGE")) $carbon_output.= "margin-top:60px;";
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
								<?php if (is_front_page() && is_home()) echo wp_kses_post(get_option('carbon_blog_single_primary_title')); else echo wp_kses_post(get_the_title($carbon_thisPostID)); ?>
							</h1>
							<?php
							$carbon_output = ".present-container h1.page_title{color: #$tcolor; font-size: $tsize; font-family: '{$principalfont[0]}';font-weight: {$principalfont[1]};";
							if ($margintop != "") $carbon_output .= esc_attr("margin-top: ".intval($margintop,10)."px;");
							$carbon_output .= "}";
							carbon_set_custom_inline_css($carbon_output);
						}
		    			if ($showsectitle){
			    			if (get_post_meta($post->ID, 'secondaryTitle_value', true) != "" || get_option('carbon_blog_secondary_title') != ""){
						    	?>
							    <h2 class="secondaryTitle">
							    	<?php echo wp_kses_post(get_post_meta($post->ID, 'secondaryTitle_value', true)); ?>
							    </h2>
					    		<?php
						    	$carbon_output = ".present-container .secondaryTitle{color: #$stcolor; font-size: $stsize; line-height: $stsize; font-family: '{$secondaryfont[0]}';font-weight:{$secondaryfont[1]}; margin-top:{$stmargin};}";
								carbon_set_custom_inline_css($carbon_output);
					    	}
		    			}
		    		?>

		    		</div>
		    		<?php
		    		if ($breadcrumbs == "on"){
			    		?>
			    		<div class="carbon_breadcrumbs">
							<?php 
								carbon_the_breadcrumb(); 
								$carbon_output = ".carbon_breadcrumbs{".esc_attr($bcaux)."}";
								carbon_set_custom_inline_css($carbon_output);
							?>
			    		</div>
			    		<?php
					}
					?>
				</div>
		<?php }
		?>
		</div>
		<?php
	}
	
	$sidebar_scheme = get_post_meta($carbon_thisPostID, 'sidebar_for_default_value', true);
	$sidebar = carbon_convert_to_class(get_post_meta($carbon_thisPostID, 'sidebars_available_value', true));
	if (!$sidebar) $sidebar = "defaultblogsidebar";
	switch ($sidebar_scheme){
		case "none":
			if (!defined("CARBON_IS_FIRST_PAGE") && !post_password_required()){
				?>
				<div class="content-before-blog">
					<?php 
						carbon_content_shortcoder($post->post_content);
						echo do_shortcode($post->post_content); 
					?>
				</div>
				<?php
			}
			?>
			<div class="blog-default wideblog">
				<div class="master_container">
					<section class="page_content">
						<div class="container">
							<?php 
								if (post_password_required()) echo get_the_password_form();
								else carbon_print_masonry_blog();
							?>
						</div>
					</section>
				</div>
			</div>
			<?php
		break;
		case "left":
			if (!defined("CARBON_IS_FIRST_PAGE") && !post_password_required()){
				?>
				<div class="content-before-blog container">
					<?php 
						carbon_content_shortcoder($post->post_content);
						echo do_shortcode($post->post_content); 
					?>
				</div>
				<?php
			}
			?>
			<div class="blog-default">
				<div class="master_container container">
					<section class="page_content left sidebar col-xs-12 col-md-4">
						<div class="blog-sidebar-bg">
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
						?>
						</div>
					</section>
					<section class="page_content right col-xs-12 col-md-8">
						<?php 
							if (post_password_required()) echo get_the_password_form();
							else carbon_print_masonry_blog();
						?>
					</section>
				</div>
			</div>
			<?php
		break;
		case "right":
			if (!defined("CARBON_IS_FIRST_PAGE") && !post_password_required()){
				?>
				<div class="content-before-blog container">
					<?php 
						carbon_content_shortcoder($post->post_content);
						echo do_shortcode($post->post_content); 
					?>
				</div>
				<?php
			}
			?>
			<div class="blog-default">
				<div class="master_container container">
					<section class="page_content left col-xs-12 col-md-9">
						<?php 
							if (post_password_required()) echo get_the_password_form();
							else carbon_print_masonry_blog();
						?>
					</section>
					<section class="page_content right sidebar col-xs-12 col-md-3">
						<div class="blog-sidebar-bg">
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
							?>
						</div>
					</section>
				</div>
			</div>
			<?php
		break;
		default:
			if (!defined("CARBON_IS_FIRST_PAGE") && !post_password_required()){
				?>
				<div class="content-before-blog">
					<?php 
						carbon_content_shortcoder($post->post_content);
						echo do_shortcode($post->post_content); 
					?>
				</div>
				<?php
			}
			?>
			<div class="blog-default wideblog">
				<div class="master_container">
					<section class="page_content">
						<div class="container">
							<?php 
								if (post_password_required()) echo get_the_password_form();
								else carbon_print_masonry_blog();
							?>
						</div>
					</section>
				</div>
			</div>
			<?php
		break;
	}
	
	if (!post_password_required()){
		$carbon_inline_script = '
			jQuery(document).ready(function(){
				"use strict";
				var forceGutter = 50; // change to false to return to the normal behavior.
				(function(e){"use strict";e.Isotope.prototype._getMasonryGutterColumns=function(){var e=this.options.masonry&&this.options.masonry.gutterWidth||0;var t=this.element.width();this.masonry.columnWidth=this.options.masonry&&this.options.masonry.columnWidth||this.$filteredAtoms.outerWidth(true)||t;this.masonry.columnWidth+=e;this.masonry.cols=Math.floor((t+e)/this.masonry.columnWidth);this.masonry.cols=Math.max(this.masonry.cols,1)};e.Isotope.prototype._masonryReset=function(){this.masonry={};this._getMasonryGutterColumns();var e=this.masonry.cols;this.masonry.colYs=[];while(e--){this.masonry.colYs.push(0)}};e.Isotope.prototype._masonryResizeChanged=function(){var e=this.masonry.cols;this._getMasonryGutterColumns();return this.masonry.cols!==e};e(document).ready(function(){"use strict";var t=e(".journal");var n=0;var r=0;var i=function(){var e=parseInt(t.data("columns"));var i=t.data("gutterSpace");var s=t.width();var o=0;if(isNaN(i)){i=.02}else if(i>.05||i<0){i=.02}if(s<568){e=1}else if(s<768){e-=2}else if(s<991){e-=1;if(e<2){e=2}}if(e<1){e=1}r=forceGutter!=false ? forceGutter : Math.floor(s*i);var u=r*(e-1);var a=s-u;n=Math.floor(a/e);o=r;if(1==e){o=20}t.children(".journal-post").css({width:n+"px",marginBottom:o+"px"})};i();window.iso = t.isotope({itemSelector:".journal-post",resizable:false,masonry:{columnWidth:n,gutterWidth:r}});t.imagesLoaded(function(){i();t.isotope({itemSelector:".journal-post",resizable:true,masonry:{columnWidth:n,gutterWidth:r}})});e(window).smartresize(function(){i();t.isotope({masonry:{columnWidth:n,gutterWidth:r}})});var s=e(".wc-shortcodes-filtering .wc-shortcodes-term");s.on("click",function(i){i.preventDefault();s.removeClass("wc-shortcodes-term-active");e(this).addClass("wc-shortcodes-term-active");var o=e(this).attr("data-filter");t.isotope({filter:o,masonry:{columnWidth:n,gutterWidth:r}});return false})})})(jQuery);
				
				jQuery(".flexslider").flexslider({
					animation: "fade",
					slideshow: true,
					slideshowSpeed: 3500,
					animationDuration: 1000,
					directionNav: true,
					controlNav: true,
					smootheHeight:false,
					start: function(slider) {
					  slider.removeClass("loading").css("overflow","");
					}
					
				});
				
				jQuery(".gallery_container").css("opacity",0);
			});
			jQuery(window).on("load", function(){ jQuery(window).resize(); jQuery(".gallery_container").css("opacity",1); });
		';
		wp_add_inline_script('carbon-global', $carbon_inline_script, 'after');
	}
	
	function carbon_print_masonry_blog(){
		
		$pag = 1;
		global $wp_query;
		$pag = $wp_query->query_vars['paged'];
		if ($pag=="" && isset($wp_query->query['paged'])) $pag = $wp_query->query['paged'];

		$cattype = "category__in";
		if (strpos(get_post_meta(get_the_ID(), 'posts_filter_categories_value', true), ',') !== false){
			$categories = explode(',',get_post_meta(get_the_ID(), 'posts_filter_categories_value', true));	
		} else {
			$cattype = "cat";
			$categories = get_post_meta(get_the_ID(), 'posts_filter_categories_value', true);
		}
		
		$tagtype = "tag__in";
		if (strpos(get_post_meta(get_the_ID(), 'posts_filter_tags_value', true), ',') !== false){
			$tags = explode(",",get_post_meta(get_the_ID(), 'posts_filter_tags_value', true));	
		} else {
			$tagtype = "tag_id";
			$tags = get_post_meta(get_the_ID(), 'posts_filter_tags_value', true);
		}
		$authortype = "author__in";
		if (strpos(get_post_meta(get_the_ID(), 'posts_filter_authors_value', true), ',') !== false){
			$authors = explode(",",get_post_meta(get_the_ID(), 'posts_filter_authors_value', true));
		} else {
			$authortype = "author";
			$authors = get_post_meta(get_the_ID(), 'posts_filter_authors_value', true);
		}
		$orderby = get_post_meta(get_the_ID(), 'posts_filter_orderby_value', true);
		$order = get_post_meta(get_the_ID(), 'posts_filter_order_value', true);
		
		if (!isset($nposts)) $nposts = get_option('posts_per_page');
		$args = array(
			'showposts' => $nposts,
	    	'orderby' => $orderby,
	    	'order' => $order,
	    	$cattype => $categories,
	    	$tagtype => $tags,
	    	$authortype => $authors,
	    	'post_status' => 'publish',
	    	'paged' => $pag
	    );
	    	    
	    global $post, $wp_query, $carbon_the_query, $carbon_import_fonts;
	    
	    $carbon_the_query = new WP_Query( $args );
	    				    
	    if ($carbon_the_query->have_posts()){ 
	    
	    	if (get_post_meta(get_the_ID(), 'posts_add_category_filter_value', true) == 'yes' && is_array($categories) && count($categories) > 2){
		    	?>
		    	<ul class="posts_category_filter">
			    	<li class="showall selected"><?php esc_html_e('All','carbon'); if (get_post_meta(get_the_ID(), 'posts_add_category_filter_counter_value', true) == 'yes'){ ?>
							<span class="counter"></span>
							<?php
							}
							?></li>
			    	<?php
				    	foreach($categories as $cat){
					    	$thiscat = get_category($cat);
							if (isset($thiscat)){
						    	?>
						    	<li class="<?php echo "cat-".esc_attr($thiscat->slug); ?>" ><?php echo wp_kses_post($thiscat->name);
								if (get_post_meta(get_the_ID(), 'posts_add_category_filter_counter_value', true) == 'yes'){ ?>
								<span class="counter"></span>
								<?php
								}
								?> 
						    	</li>
						    	<?php
							}
				    	}
			    	?>
		    	</ul>
		    	
		    	<?php	
			    $carbon_inline_script = '
			    	jQuery(document).ready(function(){
				    	"use strict";
				    	jQuery(".posts_category_filter .showall .counter").text(" ("+jQuery("article").length+")");
						jQuery(".posts_category_filter li:not(.showall)").each(function(){
							jQuery(this).find(".counter").text(" ("+jQuery("article."+jQuery(this).attr("class")).length+")");
						});
						
						jQuery(document).on("click", ".posts_category_filter li.showall", function(){
							window.iso.isotope({filter:"*"});jQuery(this).addClass("selected").siblings().removeClass("selected");
						}).on("click", ".posts_category_filter li:not(.showall)", function(){
							let thisclass = jQuery(this).attr("class").replace(" selected","");
							window.iso.isotope({filter:"."+thisclass});jQuery(this).addClass("selected").siblings().removeClass("selected");
						});
			    	});
			    ';
			    wp_add_inline_script('carbon-global', $carbon_inline_script, 'after');
	    	}
	    
			?> 
	    
	    	<div class="post-listing journal isotope" data-columns="3" data-gutter-space="60" >
		    	
	    	<?php
		    	
		    	$carbon_import_fonts[] = get_option('carbon_blog_masonry_title_font');
				$titlefont = explode("|",get_option('carbon_blog_masonry_title_font'));
				$titlefont[0] = $titlefont[0]."', 'Arial', 'sans-serif";
				if (!isset($titlefont[1])) $titlefont[1] = "";
				$titlecolor = intval(get_option('carbon_blog_masonry_title_color'),10);
				$titlesize = get_option('carbon_blog_masonry_title_size');
		    	
			    while ($carbon_the_query->have_posts()){
				    $carbon_the_query->the_post();
				    $postid = get_the_ID();
				    
				    $post_categories = wp_get_post_categories( $postid );
				    $post_categories_class = array();
				    foreach ($post_categories as $cat){
					    $thisCat = get_category($cat);
					    $post_categories_class[] = "cat-".$thisCat->slug;
				    }
				    
				    ?>
				    <article id="<?php echo esc_attr("post-".get_the_ID()); ?>" class="post journal-post isotope-item <?php echo esc_attr(get_post_meta(get_the_ID(), 'posttype_value', true)); if (is_sticky()) echo esc_attr(" sticky"); echo " ".implode(" ", $post_categories_class); ?>">
						
						<div class="blog-default-bg-masonry">
							
								<div class="post-content fadeInUpBig">
							    <?php
								    $posttype = get_post_meta(get_the_ID(), 'posttype_value', true);
								    switch($posttype){
							    		case "image":
							    		
							    			if (wp_get_attachment_url( get_post_thumbnail_id($postid))){
											?>
												<div class="featured-image">
													<a href="<?php esc_url(the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>">
														<img alt="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($postid))); ?>" title="<?php the_title_attribute(); ?>"/>
														<span class="post_overlay">
															<i class="fa fa-plus" aria-hidden="true"></i>
														</span>
													</a>
												</div>
												<div class="padding-box-masonry">
													<div class="the_title"><h2><a href="<?php esc_attr(the_permalink()); ?>"><?php wp_kses_post(the_title()); ?></a></h2></div>
													<?php
													$carbon_output = "#post-".$postid." .the_title h2{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
													carbon_set_custom_inline_css($carbon_output);
													?>
													<div class="post-summary"><?php wp_kses_post(the_excerpt()); ?></div>
													
													<?php
													if (get_post_meta( $wp_query->queried_object->ID , 'upper_single_display_metas_value' , true ) == "yes"){
														?>
														<div class="metas">
															<div class="align-metas-center">
															<?php
												    			$metas = explode(",", get_post_meta( $wp_query->queried_object->ID , 'upper_single_metas_value' , true ));
												    			if (!empty($metas)){
													    			$firstMeta = true;
													    			foreach ($metas as $meta){
														    			switch ($meta){
															    			case "date": 
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				?>
															    				<p class="blog-date"><?php echo get_the_date(); ?></p>
															    				<?php
															    			break;
															    			case "author":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																							}	
																						}
																				  	}
																				  	echo '</p>';
																				}
															    			break;
															    			case "comments":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				echo '<p data-rel="metas-comments">';
															    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
															    				echo '</p>';
															    			break;
															    			case "customtext":
															    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
																	    			echo '<p>|</p>';
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
											    		</div>
														<?php
													}
											    ?>
												</div>
												<?php 
											}
							    			
							    		break;
		
							    		case "slider": 
											$randClass = rand(0,1000);
											?>
												<div class="light">
													<div class="flexslider <?php echo esc_attr($posttype); ?>">
														<ul class="slides">
															<?php
																$sliderData = get_post_meta($postid, "sliderImages_value", true);
																$slide = explode("|*|",$sliderData);
															    foreach ($slide as $s){
															    	if ($s != ""){
															    		$params = explode("|!|",$s);
															    		$attachment = get_post( $params[0] );
															    		$title = isset($attachment->post_excerpt) ? $attachment->post_excerpt : "";
															    		echo "<li>";
															    		echo "<img src='".esc_url($params[1])."' alt='".esc_url($title)."' title='".esc_url($title)."'>";
															    		echo "</li>";	
															    	}
															    }
															?>
														</ul>
													</div>
												</div>
												
												<div class="padding-box-masonry">
													<div class="the_title"><h2><a href="<?php esc_url(the_permalink()); ?>"><?php wp_kses_post(the_title()); ?></a></h2></div>
													<?php
													$carbon_output = "#post-".$postid." .the_title h2{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
													carbon_set_custom_inline_css($carbon_output);
													?>
													<div class="post-summary"><?php wp_kses_post(the_excerpt()); ?></div>
													<?php
													if (get_post_meta( $wp_query->queried_object->ID , 'upper_single_display_metas_value' , true ) == "yes"){
														?>
														<div class="metas">
															<div class="align-metas-center">
															<?php
												    			$metas = explode(",", get_post_meta( $wp_query->queried_object->ID , 'upper_single_metas_value' , true ));
												    			if (!empty($metas)){
													    			$firstMeta = true;
													    			foreach ($metas as $meta){
														    			switch ($meta){
															    			case "date": 
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				?>
															    				<p class="blog-date"><?php echo get_the_date(); ?></p>
															    				<?php
															    			break;
															    			case "author":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																							}	
																						}
																				  	}
																				  	echo '</p>';
																				}
															    			break;
															    			case "comments":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				echo '<p data-rel="metas-comments">';
															    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
															    				echo '</p>';
															    			break;
															    			case "customtext":
															    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
																	    			echo '<p>|</p>';
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
											    		</div>
														<?php
													}
													?>
												</div>
											<?php
							    		break;
		
							    		case "audio":
											?>
											
											<div class="audioContainer">
												<?php
													if (get_post_meta($postid, 'audioSource_value', true) == 'embed') echo get_post_meta($postid, 'audioCode_value', true); 
													else {
														$audio = explode("|!|",get_post_meta($postid, 'audioMediaLibrary_value', true));
														if (isset($audio[1])) {
															$ext = explode(".",$audio[1]);
															if (isset($ext)) $ext = $ext[count($ext)-1];
															?>
															<audio controls="controls"><source type="audio/<?php echo esc_attr($ext); ?>" src="<?php echo esc_url($audio[1]); ?>"></audio>
															<?php
														}
													}
												?>
											</div>
												
											<div class="padding-box-masonry">
													
												<div class="the_title"><h2><a href="<?php the_permalink(); ?>"><?php wp_kses_post(the_title()); ?></a></h2></div>
												<?php
												$carbon_output = "#post-".$postid." .the_title h2{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
												carbon_set_custom_inline_css($carbon_output);
												?>
												<div class="post-summary"><?php wp_kses_post(the_excerpt()); ?></div>
												<?php
													if (get_post_meta( $wp_query->queried_object->ID , 'upper_single_display_metas_value' , true ) == "yes"){
														?>
														<div class="metas">
															<div class="align-metas-center">
															<?php
												    			$metas = explode(",", get_post_meta( $wp_query->queried_object->ID , 'upper_single_metas_value' , true ));
												    			if (!empty($metas)){
													    			$firstMeta = true;
													    			foreach ($metas as $meta){
														    			switch ($meta){
															    			case "date": 
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				?>
															    				<p class="blog-date"><?php echo get_the_date(); ?></p>
															    				<?php
															    			break;
															    			case "author":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																							}	
																						}
																				  	}
																				  	echo '</p>';
																				}
															    			break;
															    			case "comments":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				echo '<p data-rel="metas-comments">';
															    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
															    				echo '</p>';
															    			break;
															    			case "customtext":
															    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
																	    			echo '<p>|</p>';
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
											    		</div>
														<?php
													}
												?>
											</div>
											<?php
							    		break;
							    		
							    		case "video":
							    			?>
							    			
							    			
								    			<div class="post-video <?php echo get_post_meta($postid, "videoSource_value", true); ?>">
													<div class="vendor">
													<?php
														$videosType = get_post_meta($postid, "videoSource_value", true);
														if ($videosType != "embed"){
															$videos = get_post_meta($postid, "videoCode_value", true);
															$videos = preg_replace( '/\s+/', '', $videos );
															$vid = explode(",",$videos);
														}
														switch (get_post_meta($postid, "videoSource_value", true)){
															case "media":
																$video = explode("|!|",get_post_meta($postid, 'videoMediaLibrary_value', true));
																if (isset($video[1])) {
																	$ext = explode(".",$video[1]);
																	if (isset($ext)) $ext = $ext[count($ext)-1];
																	?>
																	<video controls="controls" class="video-controls"><source type="video/<?php echo esc_attr($ext); ?>" src="<?php echo esc_url($video[1]); ?>"></video>
																	<?php
																}
															break;
															case "youtube":
																if (isset($vid[0])) echo "<iframe src='//www.youtube.com/embed/".esc_attr($vid[0])."' frameborder='0' allowfullscreen></iframe>";
																break;
															case "vimeo":
																if (isset($vid[0])) echo '<iframe src="https://player.vimeo.com/video/'.esc_attr($vid[0]).'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
																break;
														}						
													?>
													</div>
								    			</div>
											
											
											<div class="padding-box-masonry">
											
												<div class="the_title"><h2><a href="<?php the_permalink(); ?>"><?php wp_kses_post(the_title()); ?></a></h2></div>
												<?php
												$carbon_output = "#post-".$postid." .the_title h2{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
												carbon_set_custom_inline_css($carbon_output);
												?>
												<div class="post-summary"><?php wp_kses_post(the_excerpt()); ?></div>
												<?php
													if (get_post_meta( $wp_query->queried_object->ID , 'upper_single_display_metas_value' , true ) == "yes"){
														?>
														<div class="metas">
															<div class="align-metas-center">
															<?php
												    			$metas = explode(",", get_post_meta( $wp_query->queried_object->ID , 'upper_single_metas_value' , true ));
												    			if (!empty($metas)){
													    			$firstMeta = true;
													    			foreach ($metas as $meta){
														    			switch ($meta){
															    			case "date": 
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				?>
															    				<p class="blog-date"><?php echo get_the_date(); ?></p>
															    				<?php
															    			break;
															    			case "author":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																							}	
																						}
																				  	}
																				  	echo '</p>';
																				}
															    			break;
															    			case "comments":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				echo '<p data-rel="metas-comments">';
															    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
															    				echo '</p>';
															    			break;
															    			case "customtext":
															    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
																	    			echo '<p>|</p>';
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
											    		</div>
														<?php
													}
												?>
											</div>
											<?php
							    		break;
							    		
							    		case "gallery":
											$slider = get_post_meta($postid,'gallery_slider_value',true);
											if ($slider != '-1'){
												if (substr($slider, 0, 10) === "revSlider_"){
													?>
													<div class="gallery_container">
														<?php
															if (!function_exists('putRevSlider')){
																echo 'Please install the missing plugin - Revolution Slider.';
															} else {
																putRevSlider(substr($slider, 10));
															}
														?>
													</div>
													<?php
												} else {
													?>
													<div class="gallery_container">
														<?php
															if (!function_exists('masterslider')){
																echo 'Please install the missing plugin - MasterSlider.';
															} else {
																echo do_shortcode( '[masterslider alias="'.substr($slider, 13).'"]' );
															}
														?>
													</div>
													<?php
												}
											}
											?>
											<div class="padding-box-masonry">
												<div class="the_title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
												<?php
												$carbon_output = "#post-".$postid." .the_title h2{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
												carbon_set_custom_inline_css($carbon_output);
												?>
												<div class="post-summary"><?php wp_kses_post(the_excerpt()); ?></div>
												<?php
													if (get_post_meta( $wp_query->queried_object->ID , 'upper_single_display_metas_value' , true ) == "yes"){
														?>
														<div class="metas">
															<div class="align-metas-center">
															<?php
												    			$metas = explode(",", get_post_meta( $wp_query->queried_object->ID , 'upper_single_metas_value' , true ));
												    			if (!empty($metas)){
													    			$firstMeta = true;
													    			foreach ($metas as $meta){
														    			switch ($meta){
															    			case "date": 
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				?>
															    				<p class="blog-date"><?php echo get_the_date(); ?></p>
															    				<?php
															    			break;
															    			case "author":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																							}	
																						}
																				  	}
																				  	echo '</p>';
																				}
															    			break;
															    			case "comments":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				echo '<p data-rel="metas-comments">';
															    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
															    				echo '</p>';
															    			break;
															    			case "customtext":
															    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
																	    			echo '<p>|</p>';
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
											    		</div>
														<?php
													}
												?>
											</div>
											<?php
										break;
							    		
							    		case "quote":
							    			?>
							    			<a href="<?php the_permalink(); ?>">
								    			<div class="post-quote">
						                        	<blockquote><i class="fa fa-quote-left"></i> <?php echo wp_kses_post(get_post_meta($postid, 'quote_text_value', true)); ?><i class="fa fa-quote-right"></i></blockquote><span class="author-quote"><?php echo wp_kses_post(get_post_meta($postid, 'quote_author_value', true)); ?></span>
						                        </div>
					                        </a>

							    			<?php
							    		break;
		
										case "link":
											?>
											<div class="padding-box-masonry">
												<h2 class="post-title post-link">
													<?php
														$linkurl = get_post_meta($postid, 'link_url_value', true) != '' ? get_post_meta($postid, 'link_url_value', true) : get_permalink();
														$linktext = get_post_meta($postid, 'link_text_value', true) != '' ? get_post_meta($postid, 'link_text_value', true) : $linkurl;
														$carbon_output = "#post-".$postid." .post-link{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
														carbon_set_custom_inline_css($carbon_output);
													?>
													<a href="<?php echo esc_url($linkurl); ?>" target="_blank"><?php echo esc_html($linktext); ?></a>
						                        </h2>
						                        
											</div>
											<?php
										break;
							    		
							    		case "text": default:
							    			?>
							    			
							    			<div class="padding-box-masonry">
							    				<div class="the_title no-feature"><h2><a href="<?php the_permalink(); ?>"><?php wp_kses_post(the_title()); ?></a></h2></div>
												<?php
												$carbon_output = "#post-".$postid." .the_title h2{color: #$titlecolor; font-size: $titlesize; font-family: '{$titlefont[0]}'; font-weight: {$titlefont[1]};}";
												carbon_set_custom_inline_css($carbon_output);
												?>
												<div class="post-summary"><?php wp_kses_post(the_excerpt()); ?></div>
												<?php
													if (get_post_meta( $wp_query->queried_object->ID , 'upper_single_display_metas_value' , true ) == "yes"){
														?>
														<div class="metas">
															<div class="align-metas-center">
															<?php
												    			$metas = explode(",", get_post_meta( $wp_query->queried_object->ID , 'upper_single_metas_value' , true ));
												    			if (!empty($metas)){
													    			$firstMeta = true;
													    			foreach ($metas as $meta){
														    			switch ($meta){
															    			case "date": 
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				?>
															    				<p class="blog-date"><?php echo get_the_date(); ?></p>
															    				<?php
															    			break;
															    			case "author":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($tag) )."'>".esc_html($tag->name)."</a>";
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
																		    			echo '<p>|</p>';
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
																								echo "<span class='tags-on-icons'>, </span><a href='".esc_url( get_term_link($cat) )."'>".esc_html($cat->name)."</a>"; 
																							}	
																						}
																				  	}
																				  	echo '</p>';
																				}
															    			break;
															    			case "comments":
															    				if (!$firstMeta){
																	    			echo '<p>|</p>';
																    			} else {
																	    			$firstMeta = false;
																    			}
															    				echo '<p data-rel="metas-comments">';
															    				printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'carbon' ), number_format_i18n( get_comments_number() ) );
															    				echo '</p>';
															    			break;
															    			case "customtext":
															    				if (!$firstMeta && strlen(wp_kses_post( get_post_meta( $postid , 'upper_single_meta_custom_text_value' , true ) )) > 0 ){
																	    			echo '<p>|</p>';
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
											    		</div>
														<?php
													}
												?>
							    			</div>
							    			
							    			<?php
							    		break;
						    		}
								    ?>
							</div>
						</div>
				    </article>
				    <?php
			    }
			    
			    ?>
	    	</div>
	    	
	    	<div class="navigation">
			<?php
				$carbon_reading_option = get_option('carbon_blog_reading_type');
				wp_reset_postdata();
				if ($carbon_reading_option != "paged" && $carbon_reading_option != "dropdown"){ 
					if (function_exists('icl_t')){
						next_posts_link( '<div class="next-posts"><i class="fa fa-angle-left"></i>'.sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Previous posts', get_option('carbon_previous_text'))).'</div>', $carbon_the_query->max_num_pages);  
						previous_posts_link('<div class="prev-posts">'.sprintf(esc_html__("%s", "carbon"), icl_t( 'carbon', 'Next posts', get_option('carbon_next_text'))).'<i class="fa fa-angle-right"></i></div>', $carbon_the_query->max_num_pages);
					} else {
						next_posts_link( '<div class="next-posts"><i class="fa fa-angle-left"></i>'.sprintf(esc_html__("%s", "carbon"), get_option("carbon_previous_text")).'</div>', $carbon_the_query->max_num_pages);  
						previous_posts_link('<div class="prev-posts">'.sprintf(esc_html__("%s", "carbon"), get_option("carbon_next_text")).'<i class="fa fa-angle-right"></i></div>', $carbon_the_query->max_num_pages);
					}
				} else {
					carbon_wp_pagenavi();
				}
			?>	
		</div>
	    <?php
		}
		
	}
	
get_footer(); ?>