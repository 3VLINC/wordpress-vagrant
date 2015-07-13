<?php 

	namespace Theme;

?>

<!doctype html >
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		
		<meta charset="utf-8">
		
		<!-- Google Chrome Frame for IE -->
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!-- mobile meta -->
		
		<meta name="HandheldFriendly" content="True">
		
		<meta name="MobileOptimized" content="320">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, minimal-ui"/>
		
		<title><?php wp_title('| ',true,'right'); ?><?php bloginfo('name') ?></title>
		
		<link rel="apple-touch-icon" href="<?php echo Theme::getResourceUrl('images/apple-icon-touch.png'); ?>">
		
		<link rel="icon" href="<?php echo Theme::getResourceUrl('images/favicon.png'); ?>">
		
		<!--[if IE]>
		
			<link rel="shortcut icon" href="<?php echo Theme::getResourceUrl('images/favicon.ico'); ?>">
		
		<![endif]-->
		
		<!-- or, set /favicon.ico for IE10 win -->
		
		<meta name="msapplication-TileColor" content="#f01d4f">
		
		<meta name="msapplication-TileImage" content="<?php echo Theme::getResourceUrl('images/win8-tile-icon.png'); ?>">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php get_template_part('modules/accessibility-menu'); ?>

		<?php Theme::loadModule('page-header'); ?>

		<main class="page-main">

			<div class="page-content equalize">
