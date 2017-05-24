<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); wp_title('|');?></title>

    <!--[if lte IE 8]>
    <script src="<?php echo get_template_directory_uri() ?>/js/ie/html5shiv.js"></script>
    <![endif]-->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri() ?>/css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="<?php  echo get_template_directory_uri() ?>/css/ie8.css"/>
    <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page-wrapper">

    <!-- Header -->
    <header id="header">

        <h1 id="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"
               rel="home">
                <?php bloginfo('name'); ?>
            </a>
        </h1>

        <nav id="nav">

            <?php wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu' => '',
                    'container' => 'false',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => '',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul>%3$s</ul>',
                    'depth' => 0,
                    'walker' => '',
                )
            ); ?>

        </nav>
    </header>




