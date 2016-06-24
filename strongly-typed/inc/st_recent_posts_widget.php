<?php

/**
 * Sets up the default arguments.
 */
function st_default_args() {

	$defaults = array(
		'title' => '',
		'limit' => 5,
		'length' => 10,
	);

	return $defaults;
}

/**
 * Generates the posts markup.
 */
function st_recent_posts( $args = array() ) {

// Set up a default, empty variable.
	$html = '';

// Merge the input arguments and the defaults.
	$args = wp_parse_args( $args, st_default_args() );

// Extract the array to allow easy use of variables.
	extract( $args );

// Get the posts query.
	$posts = st_get_posts( $args );

	if ( $posts->have_posts() ) :

// Recent posts wrapper
		$html .= '<ul class="divided">';
		while ( $posts->have_posts() ) : $posts->the_post();

			$html .= '<li>';
			$html .= '<article class="box highlight">';

			// Вывод заголовка
			$html .= '<header><h3>';
			$html .= '<a href="' . esc_url( get_permalink() ) . '">' . esc_attr( get_the_title() ) . '</a>';
			$html .= '</h3></header>';

			// Вывод миниатюры
			if ( has_post_thumbnail() ) :
				$html .= '<a href="' . esc_url( get_permalink() ) . '" class="image left">' . get_the_post_thumbnail( null, 'strongly-min' ) . '</a>';
			endif;

			// Вывод поста
			$html .= '<p>' . wp_trim_words( get_the_content(), $args['length'] ) . ' </p>';

			$html .= '<ul class="actions">';

			// Вывод "Читать далее..."
			$html .= '<li><a href="' . esc_url( get_permalink() ) . '" class="button icon fa-file">Читать далее...</a></li>';
			$html .= '</ul></article></li>';
		endwhile;
		$html .= ' </ul> ';

	endif;

// Restore original Post Data.
	wp_reset_postdata();

// Return the  posts markup.
	return $html;
}

/**
 * The posts query.
 */
function st_get_posts( $args = array() ) {

	$posts = new WP_Query( apply_filters( 'st_query_arguments', array(
				'posts_per_page' => $args['limit'],
				'no_found_rows' => true,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true
			) ) );
	return $posts;
}

class Strongly_Typed_Recent_Posts extends WP_Widget {

	/**
	 * Sets up the widgets.
	 */
	function __construct() {

		/* Set up the widget options. */
		$widget_options = array(
			'classname' => 'st_recent_posts',
			'description' => 'Виджет для вывода последних постов с миниатюрой и цитатой'
		);

		$control_options = array(
			'width' => 250,
			'height' => 350
		);

		/* Create the widget. */
		parent::__construct(
				'st_recent_posts_widget', // $this->id_base
				'ST_Widget_Recent_Post', // $this->name
				$widget_options, // $this->widget_options
				$control_options  // $this->control_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		$recent = st_recent_posts( $instance );

		if ( $recent ) {

			// Output the theme's $before_widget wrapper.
			echo $before_widget;

			// If both title and title url is not empty, display it.
			if ( !empty( $instance['title_url'] ) && !empty( $instance['title'] ) ) {
				echo $before_title . '<a href="' . esc_url( $instance['title_url'] ) . '" title="' . esc_attr( $instance['title'] ) . '">' . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . '</a>' . $after_title;

				// If the title not empty, display it.
			} elseif ( !empty( $instance['title'] ) ) {
				echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;
			}

			// Get the recent posts query.
			echo $recent;

			// Close the theme's widget wrapper.
			echo $after_widget;
		}
	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['limit'] = (int) ( $new_instance['limit'] );
		$instance['length'] = (int) ( $new_instance['length'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 */
	function form( $instance ) {

		// Merge the user-selected arguments with the defaults.
		$instance = wp_parse_args( (array) $instance, st_default_args() );

		// Extract the array to allow easy use of variables.
		extract( $instance );

		// Loads the widget form.
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>">Количество записей:</label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" step="1" min="-1" value="<?php echo (int) ( $instance['limit'] ); ?>" size="3"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'length' ); ?>">Длина поста( кол-во слов ):</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'length' ); ?>" name="<?php echo $this->get_field_name( 'length' ); ?>" type="number" step="1" min="0" value="<?php echo (int) ( $instance['length'] ); ?>" />
		</p>

		<?php
	}

}

function Strongly_Typed_Recent_Posts() {
	register_widget( 'Strongly_Typed_Recent_Posts' );
}

add_action( 'widgets_init', 'Strongly_Typed_Recent_Posts' );
