<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Strongly_Typed
 */
get_header();
?>

<!-- Main -->
<div id="main-wrapper">
	<div id="main" class="container">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<!-- Content -->
				<div id="content" class="8u 12u(mobile)">
					<?php
					while ( have_posts() ) : the_post();
						// Подключение файла контента
						// get_post_format() возвращает формат поста
						// get_template_part() подключает файл контента
						get_template_part( 'template-parts/content', get_post_format() );
						?>
					<?php endwhile; ?>
				</div>
			<?php
			else :
				get_template_part( 'content', 'none' );
			endif;
			get_sidebar();
			?>
		</div>
	</div>
</div>
<?php
get_footer();
