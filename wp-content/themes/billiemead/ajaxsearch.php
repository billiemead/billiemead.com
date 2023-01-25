<?php
	
add_action ('wp_ajax_call_upper_search_ajax', 'upper_search_ajax') ;
add_action ('wp_ajax_nopriv_call_upper_search_ajax', 'upper_search_ajax') ;

function upper_search_ajax(){
	
	if (!isset($_POST)) wp_send_json_error('no direct access');	
	if (!wp_verify_nonce($_POST['security'],'carbon-theme-search')) return;
	
	$results = "";
	
	$args = explode("&",$_POST['query']);
	$aux_query = "";
	foreach ($args as $arg){
		if (substr($arg, 0, 2) == "s="){
			$aux_query = substr($arg, 2); 
			break;
		}
	}
	
	if ($_POST['se'] == "on"){
		$args = array(
			'showposts' => -1,
			'post_status' => 'publish',
			's' => $aux_query
		);
	} else {
		$args = array(
			'showposts' => -1,
			'post_status' => 'publish',
			'post_type' => 'post',
			's' => $aux_query
		);
	}
    
    $carbon_the_query = new WP_Query( $args );
    
	if ( $carbon_the_query->have_posts() ) {
		$first = true;
		$selected = "";
		while ( $carbon_the_query->have_posts() ) {
			$carbon_the_query->the_post();

			if ($first)	{
				$first = false;
				$selected = "selected";
			} else {
				$selected = "";
			}
			$results .= "<li class='".esc_attr($selected)."'><a href='".esc_url(get_permalink())."'><strong>".wp_kses_post(get_the_title())."</strong><span>";
			if (get_option("carbon_search_show_author") == "on") {
				if (function_exists('icl_t')){
					$results .=", ".sprintf(esc_html__("%s","carbon"), icl_t( 'carbon', 'by', get_option('carbon_by_text')))." ".get_the_author();
				} else {
					$results .=", ".sprintf(esc_html__("%s","carbon"), get_option("carbon_by_text"))." ".get_the_author();
				}
			}
			if (get_option("carbon_search_show_date") == "on")
			$results .= ", ".get_the_date();
			if (get_option("carbon_search_show_categories") == "on"){
				$categories = get_the_category();
				$firstcat = true;
				if ($categories){
					foreach($categories as $category) {
						if ($category->term_id != 1){
							if ($firstcat){
								if (function_exists('icl_t')){
									$results .= ", ".sprintf(esc_html__("%s","carbon"), icl_t( 'carbon', 'in', get_option('carbon_in_text')))." <i>";
								} else {
									$results .= ", ".sprintf(esc_html__("%s","carbon"), get_option("carbon_in_text"))." <i>";
								}
								$firstcat = false;
								$results .= $category->cat_name;
							} else {
								$results .= ", ".$category->cat_name;
							}	
						}
					}
				}
				if (!$firstcat) $results .= "</i>";
			}
			if (get_option("carbon_search_show_tags") == "on"){
				$tags = get_the_tags();
				$firsttag = true;
				if ($tags){
					foreach($tags as $tag) {
						if ($firsttag){
							if (function_exists('icl_t')){
								$results .= ", ".sprintf(esc_html__("%s","carbon"), icl_t( 'carbon', 'in', get_option('carbon_in_text')))." <i>";
							} else {
								$results .= ", ".sprintf(esc_html__("%s","carbon"), get_option("carbon_in_text"))." <i>";
							}
							$firsttag = false;
							$results .= $tag->name;
						} else {
							$results .= ", ".$tag->name;
						}
					}
				}
				if (!$firsttag) $results .= "</i>";
			}
			$results .= "</span></a></li>";
		}
	} else {
		if (function_exists('icl_t')){
			$results .= "<li><a>".sprintf(esc_html__("%s","carbon"), icl_t( 'carbon', 'No results found.', get_option('carbon_no_results_text')))."</a></li>";
		} else {
			$results .= "<li><a>".sprintf(esc_html__("%s","carbon"), get_option("carbon_no_results_text"))."</a></li>";
		}
	}
	
	echo wp_send_json_success($results);
	
	wp_die();
}

?>