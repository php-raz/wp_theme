<?php

/**
 * Strongly Typed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Strongly_Typed
 */
if ( !function_exists( 'strongly_typed_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function strongly_typed_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Strongly Typed, use a find and replace
		 * to change 'strongly-typed' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'strongly-typed', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		 add_image_size( 'strongly-min', 180, 180, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'strongly-typed' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'strongly_typed_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}

endif;
add_action( 'after_setup_theme', 'strongly_typed_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function strongly_typed_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strongly_typed_content_width', 640 );
}

add_action( 'after_setup_theme', 'strongly_typed_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function strongly_typed_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'strongly-typed' ),
		'id' => 'main_sidebar',
		'description' => 'Main sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Home sidebar', 'strongly-typed' ),
		'id' => 'sidebar_home',
		'description' => 'Home sidebar',
		'before_widget' => '<section><ul class="divided"><li><article class="box excerpt">',
		'after_widget' => '</article></li></ul></section>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'strongly_typed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function strongly_typed_scripts() {
	wp_enqueue_style( 'strongly-typed-style', get_stylesheet_uri() );

	wp_enqueue_script( 'strongly-typed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'strongly-typed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	// wp_enqueue_style('1', '2', '3', '4') регистрирует файл стилей
	// '1' название файла стилей (идентификатор)
	// '2' УРЛ к файлу стилей
	// '3' массив идентификаторов других стилей, от которых зависит подключаемый файл стилей
	// '4' строка определяющая версию стилей, если установить null, то никакая версия не будет установлена
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), null );



	// wp_enqueue_script() правильно подключает JavaScript файл на страницу
	// '1' название скрипта (рабочее название)
	// '2' УРЛ к файлу скрипта
	// '3' массив названий скриптов от которых зависит этот скрипт
	// '4' строка указывающая версию скрипта
	// '5' если указать true, то скрипт будет подключен перед тегом </body>
	// get_template_directory_uri() получает URL текущей темы
	wp_enqueue_script( 'jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20150330', true );
	wp_enqueue_script( 'jquery.dropotron.min', get_template_directory_uri() . '/assets/js/jquery.dropotron.min.js', array(), '20150330', true );
	wp_enqueue_script( 'skel.min', get_template_directory_uri() . '/assets/js/skel.min.js', array(), '20150330', true );
	wp_enqueue_script( 'skel-viewport.min', get_template_directory_uri() . '/assets/js/skel-viewport.min.js', array(), '20150330', true );
	wp_enqueue_script( 'util', get_template_directory_uri() . '/assets/js/util.js', array(), '20150330', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '20150330', true );
	wp_enqueue_script( 'contact', get_template_directory_uri() . '/js/contact.js', array(), '20150330', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'strongly_typed_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function new_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Загрузка виджета Strongly Typed
 */
require get_template_directory() . '/inc/st_recent_posts_widget.php';
require get_template_directory() . '/inc/st_note_widget.php';

/****************************************************************************************/

function myform_action_callback() {
	global $wpdb;
	global $mail;
	$nonce = $_POST['contact_nonce'];
	$name = $_POST['contact_name'];
	$mess = $_POST['contact_mess'];
	$email = $_POST['contact_email'];
	$rtr = '';
	if ( !wp_verify_nonce( $nonce, 'myform_action-nonce' ) )
		wp_die( '{"error":"Error. Spam"}' );
	$message = "";
	$to = get_option( 'admin_email' ); // заменить на свою почту
	$headers = "Content-type: text/html; charset=utf-8 \r\n";
	$headers.= "From: " . $_SERVER['SERVER_NAME'] . " \r\n";
	$subject = "Сообщение с сайта " . $_SERVER['SERVER_NAME'];
	do_action( 'plugins_loaded' );
	if ( !empty( $name ) && !empty( $mess ) && !empty( $email ) ) {
		$message.="Имя: " . $name;
		$message.="<br/>E-mail: " . $email;
		$message.="<br/>Сообщение:<br/>" . nl2br( $mess );
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			$rtr = '{"work":"Сообщение отправлено!","error":""}';
		} else {
			$rtr = '{"error":"Ошибка сервера."}';
		}
	} else {
		$rtr = '{"error":"Все поля обязательны к заполнению!"}';
	}
	echo $rtr;
	wp_die();
}

add_action( 'wp_ajax_nopriv_myform_send_action', 'myform_action_callback' );
add_action( 'wp_ajax_myform_send_action', 'myform_action_callback' );

function myform_stylesheet() {
	wp_enqueue_style( "myform_style_templ", get_template_directory_uri() . "/css/styleform.css", "0.1.2", true );
	wp_enqueue_script( "myform_script_temp", get_template_directory_uri() . "/js/scriptform.js", array( 'jquery' ), "0.1.2", true );
	wp_localize_script( "myform_script_temp", "myform_Ajax", array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'myform_action-nonce' )
			)
	);
}

add_action( 'wp_enqueue_scripts', 'myform_stylesheet' );

function formZak() {
	$rty = '<div class="form">';
	$rty.='<div class="line"><input id="contact_name" type="text" placeholder="Имя"/></div>';
	$rty.='<div class="line"><input id="contact_email" type="text" placeholder="Почта"/></div>';
	$rty.='<div class="line"><textarea id="contact_mess" placeholder="Сообщение"></textarea></div>';
	$rty.='<div class="line"><input type="submit" onclick="myform_ajax_send(\'#contact_name\',\'#contact_email\',\'#contact_mess\'); return false;" value="Отправить"/></div>';
	$rty.='</div>';
	return $rty;
}

add_shortcode( 'formZak', 'formZak' );