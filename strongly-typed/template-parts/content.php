<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Strongly_Typed
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<!--<article class="box post">-->
	<header>
		<?php
		the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );
		?>
	</header>
	<?php strongly_typed_post_thumbnail(); ?>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
	<p>
		<?php the_excerpt(); ?>
	</p>
	<ul class="actions">
		<li>
			<a href="<?php the_permalink() ?>" class="button icon fa-file" title="<?php the_title(); ?>" >
				Читать далее...
			</a>
		</li>
	</ul>
</article>
