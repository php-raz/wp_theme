<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Strongly_Typed
 */
if ( !function_exists( 'strongly_typed_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function strongly_typed_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
				esc_html_x( 'Posted on %s', 'post date', 'strongly-typed' ), '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
				esc_html_x( 'by %s', 'post author', 'strongly-typed' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}

endif;

if ( !function_exists( 'strongly_typed_entry_footer' ) ) :

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function strongly_typed_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'strongly-typed' ) );
			if ( $categories_list && strongly_typed_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'strongly-typed' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'strongly-typed' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'strongly-typed' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'strongly-typed' ), esc_html__( '1 Comment', 'strongly-typed' ), esc_html__( '% Comments', 'strongly-typed' ) );
			echo '</span>';
		}

		edit_post_link(
				sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'strongly-typed' ), the_title( '<span class="screen-reader-text">"', '"</span>', false )
				), '<span class="edit-link">', '</span>'
		);
	}

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function strongly_typed_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'strongly_typed_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields' => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number' => 2,
				) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'strongly_typed_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so strongly_typed_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so strongly_typed_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in strongly_typed_categorized_blog.
 */
function strongly_typed_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'strongly_typed_categories' );
}

add_action( 'edit_category', 'strongly_typed_category_transient_flusher' );
add_action( 'save_post', 'strongly_typed_category_transient_flusher' );



if ( !function_exists( 'strongly_typed_post_thumbnail' ) ) :

	// Вывод миниатюр постов, если они есть
	function strongly_typed_post_thumbnail() {

		// Если запись защищена паролем, ИЛИ текущая страница, страница вложения, ИЛИ
		// запись не имеет миниатюры, прекратить выполнение функции
		// post_password_required() проверяет защищен пост паролем или нет, если да, то true
		// is_attachment() проверка является ли текущая страница, страницей вложения
		// has_post_thumbnail() условный тег, проверяющий имеет ли пост картинку миниатюру
		if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
			return;
		}
		?>

		<?php
		// is_singular() условный тег срабатывает, когда пользователь находится на любых отдельных
		// типах страниц: пост, постоянная страница, вложение или произвольный тип записи
		if ( is_singular() ) :
			?>

			<div class="image featured">
				<?php
				// the_post_thumbnail() выводит на экран html код картинки
				the_post_thumbnail();
				?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="image featured" href="<?php
			   // the_permalink() выводит ссылку (УРЛ) на пост
			   the_permalink();
			   ?>" aria-hidden="true">
				   <?php
				   // the_post_thumbnail('1', '2') выводит на экран html код картинки
				   // '1' размер миниатюры, '2' массив атрибутов, которые нужно добавить получаемому html тегу img
				   // get_the_title()возвращает заголовок записи
				   the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
				   ?>
			</a>

		<?php
		endif; // End is_singular()
	}






 
endif;