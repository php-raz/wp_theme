<?php get_header(); ?>

<!-- Content -->
<div id="content">
	<div class="inner">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content' ) ?>
			<?php endwhile; ?>
			<?php
			if ( function_exists( 'my_pagenavi' ) )
				my_pagenavi();
			else
				posts_nav_link();
			?>
		<?php else : ?>
		<?php endif; ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
