<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Strongly_Typed
 */
get_header();
?>

<div id="main-wrapper">
	<div id="main" class="container">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<!-- Content -->
				<div id="content" class="8u 12u(mobile)">

					<header>
						<h2><?php printf( esc_html__( 'Search Results for: %s', 'strongly-typed' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div>
		</div>
	</div>
	<?php
	get_sidebar();
	get_footer();
	