<?php get_header(); ?>

<!-- Content -->
<div id="content">
	<div class="inner">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single' ) ?>
				<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				?>
			<?php endwhile; ?>
		<?php else : ?>
<?php endif; ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
