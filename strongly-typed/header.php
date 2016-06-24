<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strongly_Typed
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lte IE 8]><script src="<?php
		// Получает URL текущей темы. Не содержит закрывающий слэш.
		echo esc_url( get_template_directory_uri() );
		?>/assets/js/ie/html5shiv.js"></script><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="<?php
		// Получает URL текущей темы. Не содержит закрывающий слэш.
		echo esc_url( get_template_directory_uri() );
		?>/assets/css/ie8.css" /><![endif]-->

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div id="page-wrapper">

			<!-- Header -->
			<div id="header-wrapper">
				<div id="header" class="container">
					
					<h1 id="logo">
						<a href="<?php
						// home_url() возвращает УРЛ главной страницы сайта
						echo esc_url( home_url( '/' ) );
						?>" rel="home"><?php
							   // выводит на экран название блога
							   bloginfo( 'name' );
							   ?>
						</a>
					</h1>
					
					<?php
					// get_bloginfo() возвращает информацию о блоге, которая хранится в настройках, описание, фильтр
					$description = get_bloginfo( 'description', 'display' );
					// is_customize_preview() true, если сайт просматривается с помощью предварительного просмотра
					// Если (есть описание) ИЛИ если (сайт просматривается с помощью предварительного просмотра), 
					// то вывести описание
					if ( $description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif;
					?>


					<?php
					// has_nav_menu() проверяет подключено ли меню 'primary', если да, то true 
					if ( has_nav_menu( 'primary' ) ) :
						?>
						<nav id="nav">
							<?php
							// wp_nav_menu() выводит меню
							// 'menu_class' значение атрибута class у тега ul
							// 'theme_location' расположение меню в шаблоне
							wp_nav_menu( array(
								'container' => false,
								'link_before' => '<span>',
								'link_after' => '</span>',
								'theme_location' => 'primary',
							) );
							?>
						</nav><!-- .main-navigation -->
						<?php endif; ?>

				</div>
			</div>