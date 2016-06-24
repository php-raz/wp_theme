<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Strongly_Typed
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php the_title( '<h2>', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<?php strongly_typed_post_thumbnail(); ?>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
	<p>
		<?php
		the_content();
		?>
	</p>

</article><!-- #post-## -->
