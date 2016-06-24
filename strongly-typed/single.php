<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Strongly_Typed
 */
get_header();
?>

<div id="main-wrapper">
	<div id="main" class="container">
		<div class="row">
			<div id="content" class="8u 12u(mobile)">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-single', get_post_format() );
					
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</div>
			<?php
			get_sidebar();
			?>
		</div>
	</div>
</div>

<?php
get_footer();
