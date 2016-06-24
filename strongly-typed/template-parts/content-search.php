<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Strongly_Typed
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php strongly_typed_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php strongly_typed_post_thumbnail(); ?>
	<p>
		<?php the_excerpt(); ?>
	</p>

	<footer class="entry-footer">
		<?php strongly_typed_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
