<?php
/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter('ot_theme_mode', '__return_true');
add_filter('ot_show_new_layout', '__return_false');
add_filter('ot_show_pages', '__return_false');///__return_false

function theme_options_parent($parent)
{
    $parent = '';
    return $parent;
}

add_filter('ot_theme_options_parent_slug', 'theme_options_parent', 20);

/**
 * Required: include OptionTree.
 */
require(trailingslashit(get_template_directory()) . '/option-tree/ot-loader.php');
require(trailingslashit(get_template_directory()) . '/functions/meta-boxes.php');
require(trailingslashit(get_template_directory()) . '/functions/theme-options.php');


function test_them_setup()
{
    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => 'Главное',
    ));

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support('customize-selective-refresh-widgets');

}

add_action('after_setup_theme', 'test_them_setup');

function test_them_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'test_them'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'test_them'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section><hr/>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'test_them_widgets_init');

function test_them_style()
{
    wp_enqueue_style('test_them-style', get_stylesheet_uri());
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('fonts.googleapis', 'https://fonts.googleapis.com/css?family=Roboto:100,300,100italic,300italic');
}

add_action('wp_enqueue_scripts', 'test_them_style');

function test_them_scripts()
{
    wp_enqueue_script('jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery.scrolly', get_template_directory_uri() . '/js/jquery.scrolly.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery.dropotron', get_template_directory_uri() . '/js/jquery.dropotron.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery.scrollex', get_template_directory_uri() . '/js/jquery.scrollex.min.js', array('jquery'), '', true);
    wp_enqueue_script('skel', get_template_directory_uri() . '/js/skel.min.js', array('jquery'), '', true);
    wp_enqueue_script('util', get_template_directory_uri() . '/js/util.js', array('jquery'), '', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);

}

add_action('wp_enqueue_scripts', 'test_them_scripts');


function remove_body_class($classes)
{
    $classes = array();
    if (is_page_template('main-page.php')) {
        $classes[] = 'landing';
        return $classes;
    }
    return $classes;
}

add_filter('body_class', 'remove_body_class');


// удаляет H2 из шаблона пагинации

function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );