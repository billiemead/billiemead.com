<?php
	
	function carbon_print_intro($id, $video = false){
		global $carbon_import_fonts;
	?>
		<div class="home-text-wrapper<?php echo esc_attr($video) ? "-video" : ""; ?> notready">
		
		<?php if ($video) { ?><div class="home-text-wrapper-video-contents"><?php } ?>
						
		<?php
			$type = get_post_meta($id, 'introLogo_value', true);
			if ($type !== "none"){
				?>
				<div class="home-logo-<?php echo esc_attr($type); ?> home-logo">
					<?php
						switch($type){
							case "text":
								$font = get_post_meta($id,'introLogoFont_value',true); $carbon_import_fonts[] = $font; $font = explode("|",$font); if ($font[0] == "Helvetica" || $font[0] == "Helvetica Neue") $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
								$fontsize = get_post_meta($id,'introLogoFontSize_value',true);
								$variation = get_post_meta($id,'introLogoTextStyle_value',true);
								$border = get_post_meta($id,'introLogoBorder_value',true);
								$link = get_post_meta($id,'introLogoLink_value',true);
								?>
								<a href="<?php if ($link === "") $link = "#"; echo esc_url($link); ?>" class="nav-to <?php echo esc_attr($variation); ?>" ><?php echo wp_kses_post(get_post_meta($id,'introLogoText_value',true)); ?>
								<?php
								$carbon_output = ".home-logo a.nav-to{font-family:".esc_attr($font[0]).";font-weight:".esc_attr($font[1]).";font-size:".(int) preg_replace('/\D/', '', $fontsize)."px;";
								if ($border === "yes") $carbon_output.= "padding: 5px 25px 5px;border: 3px solid;letter-spacing: 3px;";
								$carbon_output .= "}";
								carbon_set_custom_inline_css($carbon_output);
							break;
							
							case "image":
								$imageurl = get_post_meta($id,'introLogoImageURL_value',true);
								$imageurl = explode("|!|", $imageurl);
								$height = get_post_meta($id,'introLogoImageHeight_value',true);
								$link = get_post_meta($id,'introLogoLink_value',true);
								?>
								<a href="<?php if ($link === "") $link = "#"; echo esc_url($link); ?>" class="nav-to">
									<img src="<?php echo esc_url($imageurl[1]); ?>" alt="logo" />
								</a>
								<?php
								$carbon_output = ".home-logo a img{height:".(int) preg_replace('/\D/', '', $height)."px;}";
								carbon_set_custom_inline_css($carbon_output);
							break;
						}
					?>
					</a>
				</div>  		
				<?php
			}
			
			if (get_post_meta($id, 'introCaptionsEnable_value', true) === "yes" && get_post_meta($id,'introCaptionsList_value', true) !== ""){
				?>
				<div id="home-slider" class="flexslider">			
					<ul class="slides styled-list">
						<?php
							$slides = get_post_meta($id,'introCaptionsList_value', true);
							$slides = explode("|!|", $slides);
							foreach($slides as $s){
								if ($s != ""){
									$font = get_post_meta($id,'introCaptionsFont_value',true); $carbon_import_fonts[] = $font; $font = explode("|",$font); if ($font[0] == "Helvetica" || $font[0] == "Helvetica Neue") $font[0] = $font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
									?>
									<li class="home-slide">
										<p class="home-slide-content">
											<?php echo wp_kses_post($s); ?>
										</p>
									</li>
									<?php
									$carbon_output = "#home-slider.flexslider li p.home-slide-content{font-family:'".esc_attr($font[0])."';font-weight:".esc_attr($font[1]).";color:#".esc_attr(get_post_meta($id,'introCaptionsTextStyle_value',true)).";}";
									carbon_set_custom_inline_css($carbon_output);
								}
							}
						?>
					</ul>
				</div>
				<?php
			}
						
			if (get_post_meta($id, 'introContinueEnable_value', true) === "yes"){
				$link = get_post_meta($id,'introLogoLink_value',true);
				?>
				<div class="intro_continue intro_continue_<?php echo esc_attr(get_post_meta($id, 'introContinueType_value', true)); ?>">
					<a href="<?php if ($link === "") $link = "#"; echo esc_url($link); ?>" class="nav-to">
					<?php
						if (get_post_meta($id, 'introContinueType_value', true) === "text"){
							$font = get_post_meta($id,'introContinueFont_value',true); $carbon_import_fonts[] = $font; $font = explode("|",$font); if ($font[0] == "Helvetica" || $font[0] == "Helvetica Neue") $font[0] = "'".$font[0]."', 'Arial', 'sans-serif"; if (!isset($font[1])) $font[1] = "";
							$fontsize = (int) preg_replace('/\D/', '', get_post_meta($id, 'introContinueSize_value', true));
							$fontcolor = get_post_meta($id, 'introContinueColor_value', true);
							$fontbgcolor = get_post_meta($id, 'introContinueBgColor_value', true);
							echo "<p>".wp_kses_post(get_post_meta($id, 'introContinueText_value', true)).'</p>';
							$carbon_output = ".intro_continue p{font-family:".esc_attr($font[0]).";font-weight:".$font[1].";font-size:".esc_attr($fontsize)."px;color:#".esc_attr($fontcolor)."background:#".esc_attr($fontbgcolor).";}";
							carbon_set_custom_inline_css($carbon_output);
						} else {
							?>
							<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/next-section.png" />
							<?php
						}
					?>
					</a>
				</div>
				<?php
			}
		?>
		
		<?php if ($video) { ?></div><?php } ?>
		
	</div>
	<?php
	$carbon_inline_script = '
		jQuery(document).on("click", ".home-text-wrapper .home-logo a, .home-text-wrapper .intro_continue a", function(e){
			if (jQuery(this).attr("href") === "#"){
				e.preventDefault();
				jQuery("html, body").animate({ scrollTop: jQuery("header").offset().top }, 1300, "easeInOutCirc");
			}
		});
	';
	wp_add_inline_script('carbon-global', $carbon_inline_script, 'after');
}

?>