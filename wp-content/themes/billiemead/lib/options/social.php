<?php
	
	$carbon_general_options= array( array(
		"name" => "Twitter and Social Icons",
		"type" => "title",
		"img" => CARBON_IMAGES_URL."icon_general.png"
	),
	
	( defined('CARBON_PLG_ACTIVE') === true ? 
		array(
			"type" => "open",
			"subtitles"=>array(array("id"=>"social", "name"=>"Social Icons"), array("id"=>"twitter", "name" => "Twitter"))
		)
		:
		array(
			"type" => "open",
			"subtitles"=>array(array("id"=>"social", "name"=>"Social Icons"))
		)
	),
	
	/* ------------------------------------------------------------------------*
	 * Top Panel
	 * ------------------------------------------------------------------------*/
	
	array(
		"type" => "subtitle",
		"id"=>'social'
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Social Icons</h3>"
	),
	
	array(
		"name" => "Facebook Icon",
		"id" => "carbon_icon-facebook",
		"type" => "text",
		"desc" => "Enter full url   ex: http://facebook.com/UpperThemes",
		"std" => ""
	),
	array(
		"name" => "Twitter Icon",
		"id" => "carbon_icon-twitter",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Tumblr Icon",
		"id" => "carbon_icon-tumblr",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Stumble Upon Icon",
		"id" => "carbon_icon-stumbleupon",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Flickr Icon",
		"id" => "carbon_icon-flickr",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "LinkedIn Icon",
		"id" => "carbon_icon-linkedin",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Delicious Icon",
		"id" => "carbon_icon-delicious",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Skype Icon",
		"id" => "carbon_icon-skype",
		"type" => "text",
		"desc" => "For a directly call to your Skype, add the following code.  skype:username?call",
		"std" => ""
	),
	array(
		"name" => "Digg Icon",
		"id" => "carbon_icon-digg",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Google Icon",
		"id" => "carbon_icon-google-plus",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Vimeo Icon",
		"id" => "carbon_icon-vimeo-square",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "DeviantArt Icon",
		"id" => "carbon_icon-deviantart",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Behance Icon",
		"id" => "carbon_icon-behance",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Instagram Icon",
		"id" => "carbon_icon-instagram",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Blogger Icon",
		"id" => "carbon_icon-blogger",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Wordpress Icon",
		"id" => "carbon_icon-wordpress",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Youtube Icon",
		"id" => "carbon_icon-youtube",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Reddit Icon",
		"id" => "carbon_icon-reddit",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "RSS Icon",
		"id" => "carbon_icon-rss",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "SoundCloud Icon",
		"id" => "carbon_icon-soundcloud",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Pinterest Icon",
		"id" => "carbon_icon-pinterest",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Dribbble Icon",
		"id" => "carbon_icon-dribbble",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "Dribbble Icon",
		"id" => "carbon_icon-dribbble",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "VK Icon",
		"id" => "carbon_icon-vk",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "Yelp Icon",
		"id" => "carbon_icon-yelp",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "Twitch Icon",
		"id" => "carbon_icon-twitch",
		"type" => "text",
		"std" => ""
	),
	array(
		"name" => "Houzz Icon",
		"id" => "carbon_icon-houzz",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "Foursquare Icon",
		"id" => "carbon_icon-foursquare",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "Slack Icon",
		"id" => "carbon_icon-slack",
		"type" => "text",
		"std" => ""
	),
	
	array(
		"name" => "Whatsapp Icon",
		"id" => "carbon_icon-whatsapp",
		"type" => "text",
		"std" => ""
	),

	array(
		"type" => "close"
	),
	
	/* twitter options */ 
	array(
		"type" => "subtitle",
		"id"=>'twitter'
	),
	
	array(
		"type" => "documentation",
		"text" => "<h3>Twitter Scroller</h3>"
	),
	
	array(
		"name" => "Twitter Username",
		"id" => "carbon_twitter_username",
		"type" => "text",
		"std" => ''
	),
	
	array(
		"name" => "Twitter App Consumer Key",
		"id" => "twitter_consumer_key",
		"type" => "text"
	),
	
	array(
		"name" => "Twitter App Consumer Secret",
		"id" => "twitter_consumer_secret",
		"type" => "text"
	),
	
	array(
		"name" => "Twitter App Access Token",
		"id" => "twitter_user_token",
		"type" => "text"
	),
	
	array(
		"name" => "Twitter App Access Token Secret",
		"id" => "twitter_user_secret",
		"type" => "text"
	),
	
	array(
		"name" => "Number Tweets",
		"id" => "carbon_twitter_number_tweets",
		"type" => "text",
		"std" => '5'
	),
	
	array( "type" => "close" ),
	
		
	/*close array*/
	
	array(
		"type" => "close"
	));
	
	carbon_add_options($carbon_general_options);
	
?>