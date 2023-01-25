<?php

function theme_enqueue_styles() {
	wp_enqueue_style( 'billiemead-child-style', get_bloginfo( 'stylesheet_url' ), array(), '1' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
