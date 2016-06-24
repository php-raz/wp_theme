<?php
/**
 * Template Name: No Sidebar
 *
 * Displays the Blog with Full Content Display.
 *
 */
?>

<?php get_header(); ?>

<!-- Main -->
<div id="main-wrapper">
	<div id="main" class="container">
			<?php if ( have_posts() ) : ?>
				<!-- Content -->
				<div id="content">
					<?php
					while ( have_posts() ) : the_post();
						// Подключение файла контента
						// get_post_format() возвращает формат поста
						// get_template_part() подключает файл контента
						get_template_part( 'template-parts/content', 'page' );
						?>
					<?php endwhile; ?>
				</div>
				<?php
			endif;
			?>
		</div>
	</div>

<?php
get_footer();