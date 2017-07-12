<?php

if (!function_exists('striped_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function striped_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Striped, use a find and replace
         * to change 'striped' to the name of your theme in all the template files.
         */
        load_theme_textdomain('striped', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('primary', 'striped'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('striped_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // striped_setup
add_action('after_setup_theme', 'striped_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function striped_content_width()
{
    $GLOBALS['content_width'] = apply_filters('striped_content_width', 640);
}

add_action('after_setup_theme', 'striped_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function striped_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'striped'),
        'id' => 'sidebar',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<header><h2>',
        'after_title' => '</h2></header>',
    ));
}

add_action('widgets_init', 'striped_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function striped_scripts()
{
    wp_enqueue_style('striped-style', get_stylesheet_uri());

    wp_enqueue_script('striped-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    wp_enqueue_script('striped-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'striped_scripts');

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

function load_style_script()
{

    wp_enqueue_script('jquery.min', get_template_directory_uri() . '/assets/js/jquery.min.js');
    wp_enqueue_script('skel.min', get_template_directory_uri() . '/assets/js/skel.min.js');
    wp_enqueue_script('util', get_template_directory_uri() . '/assets/js/util.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js');

    /*Post rating script*/
    wp_enqueue_script('like_post', get_template_directory_uri() . '/assets/js/post-like.js', array('jquery'), '1.0', true);
    wp_localize_script('like_post', 'ajax_var', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce')
    ));


    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
}

add_action('wp_enqueue_scripts', 'load_style_script');


/*
 * Pagination
 */

// $range - сколько страниц выводить до и после текущей страницы, я поставила 3
function my_pagenavi($pages = '', $range = 3)
{
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;

        // $pages - это общее число страницы, запомним это, дальше оно нам понадобится
        $pages = $wp_query->max_num_pages;

        if (!$pages) {
            $pages = 1;
        }
    }

    // здесь начинается вывод навигации
    if (1 != $pages) {

        // я изменила название класса на pager
        echo "<div class='pagination'>";

        // изменен порядок вывода кнопок со ссылками на первую страницу и на предыдущую
        // добавлен класс button previous для кнопки со ссылкой на предыдущую страницу
        if ($paged > 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged - 1) . "' class='button previous'> " . __('Вперед', 'striped') . " </a>";

        // добавлена строка с <div class='pages'> - внутри него будут кнопки со страницами
        echo "<div class='pages'>";

        // кнопка первой страницы
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<a href='" . get_pagenum_link(1) . "'>1</a>";

        // вывод всех остальных страниц
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                // к текущей странице добавим класс active
                echo ($paged == $i) ? "<a class='active'>" . $i . "</a>" : "<a href='" . get_pagenum_link($i) . "' >" . $i . "</a>";
            }
        }

        // перед выводом кнопки с последней страницей добавлен <span> с многоточием
        // текстом ссылки будет общее количество страниц: $pages
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<span>…</span><a href='" . get_pagenum_link($pages) . "'> $pages </a>";

        // закроем div со страницами
        echo "</div>";

        // выведем кнопку со следующей страницей
        if ($paged < $pages && $showitems < $pages)
            echo "<a href='" . get_pagenum_link($paged + 1) . "' class='button next'>" . __('Назад', 'striped') . "</a>";

        echo "</div>\n";
    }
}

/*Post rating*/

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function post_like()
{
    // Check for nonce security
    $nonce = $_POST['nonce'];

    if (!wp_verify_nonce($nonce, 'ajax-nonce')) {
        die;
    }

    if (isset($_POST['post_like'])) {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];
        $class_a = $_POST['class_a'];

        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];

        if (!is_array($voted_IP)) {
            $voted_IP = array();
        }

        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);

        // Use has already voted ?
        $voted_IP[$ip] = time();

        if (in_array($ip, array_keys($voted_IP))) {
            $voice = get_post_meta($post_id, "voice");
            $voice = $voice[0];
        } else {
            $voice = '';
        }

        if ($class_a == 'up' and $class_a != $voice) {
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "voice", 'up');
            update_post_meta($post_id, "votes_count", ++$meta_count);
            echo $meta_count;
        } elseif ($class_a == 'down' and $class_a != $voice) {
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "voice", 'down');
            update_post_meta($post_id, "votes_count", --$meta_count);
            if ($meta_count < 0) {
                $meta_count = 0;
                update_post_meta($post_id, "votes_count", $meta_count);
            }
            echo $meta_count;
        } else {
            echo $meta_count;
        }

    }
    exit;
}

function getPostLikeLink($post_id)
{
    $vote_count = get_post_meta($post_id, "votes_count", true);
    if (empty($vote_count) or $vote_count < 0) {
        $vote_count = 0;
    }

    $output = '<p class="post-like">';

    $output .= '<a href="#" data-post_id="' . $post_id . '" class="up"><img src="http://test-work-hardkod/wp-content/uploads/2017/07/up.png"></a>';

    $output .= '<span class="count">' . $vote_count . '</span>';

    $output .= '<a href="#" data-post_id="' . $post_id . '" class="down"><img src="http://test-work-hardkod/wp-content/uploads/2017/07/down.png"></a>';

    $output .= '</p>';

    return $output;
}
