<?php get_header(); ?>

<!-- Content -->
<div id="content">
	<div class="inner">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title">
					<?php
					if ( is_category() ):
						single_cat_title( ' Рубрика: ' );
					elseif ( is_year() ):
						printf( __( 'Записи за: %s', 'striped' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );
					elseif ( is_month() ):
						printf( __( 'Записи за: %s', 'striped' ), '<span>' . get_the_date( _x( 'F, Y', 'monthly archives date format' ) ) . '</span>' );
					elseif ( is_day() ):
						printf( __( 'Записи за: %s', 'striped' ), '<span>' . get_the_date( 'F j, Y' ) . '</span>' );

					elseif ( is_tag() ) :
						single_tag_title( ' Метка: ' );
					elseif ( is_year() ):
						printf( __( 'Записи за: %s', 'striped' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format' ) ) . '</span>' );
					elseif ( is_month() ):
						printf( __( 'Записи за: %s', 'striped' ), '<span>' . get_the_date( _x( 'F, Y', 'monthly archives date format' ) ) . '</span>' );
					elseif ( is_day() ):
						printf( __( 'Записи за: %s', 'striped' ), '<span>' . get_the_date( 'F j, Y' ) . '</span>' );
					elseif ( is_author() ):
						printf( __( 'Author: %s', 'striped' ), '<span class="vcard">'
								. '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
					else :
						_e( 'Archives', 'striped' );
					endif;
					?>
				</h1>
				<?php
				if ( is_category() ) : // выводим описание только на странице рубрики
					if ( category_description() !== '' ) : // если есть описание, выведем его
						echo '<p>' . category_description() . '</p>';
					endif;
				endif;
				?>
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
