<?php

// Регистрация виджета
function Strongly_Typed_Note() {
	register_widget( 'Strongly_Typed_Note' );
}

add_action( 'widgets_init', 'Strongly_Typed_Note' );


class Strongly_Typed_Note extends WP_Widget {

	/**
	 * Инициализация виджета
	 */
	public function __construct() {
		$widget_ops = array( 'classname' => 'widget_sp_image', 'description' => 'Виджет для вывода небольшой заметки/новости с картинкой' );
		$control_ops = array( 'id_base' => 'widget_sp_image' );
		parent::__construct( 'widget_sp_image', 'ST_Widget_Note', $widget_ops, $control_ops );

		add_action( 'sidebar_admin_setup', array( $this, 'admin_setup' ) );
		add_action( 'admin_head-widgets.php', array( $this, 'admin_head' ) );
	}

	/**
	 * Подключение скриптов и файлов необходимых для использования медиа API WordPress
	 */
	public function admin_setup() {
		wp_enqueue_media();
		wp_enqueue_script( 'tribe-image-widget', get_template_directory_uri() . '/js/st_note_widget.js', array( 'jquery', 'media-upload', 'media-views' ) );
		wp_localize_script( 'tribe-image-widget', 'TribeImageWidget', array(
			'frame_title' => __( 'Select an Image', 'image_widget' ),
			'button_title' => __( 'Insert Into Widget', 'image_widget' ),
		) );
	}

	/**
	 * Отоброжение виджета на сайте
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$instance = wp_parse_args( (array) $instance, self::get_defaults() );
		if ( !empty( $instance['imageurl'] ) || !empty( $instance['attachment_id'] ) ) {
			$instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title']  );
			$instance['description'] = apply_filters( 'widget_text', $instance['description'], $args, $instance );
			$instance['attachment_id'] = ( $instance['attachment_id'] > 0 ) ? $instance['attachment_id'] : $instance['image'];
			$instance['attachment_id'] = apply_filters( 'image_widget_image_attachment_id', abs( $instance['attachment_id'] ), $args, $instance );
			$instance['imageurl'] = apply_filters( 'image_widget_image_url', esc_url( $instance['imageurl'] ), $args, $instance );
			// No longer using extracted vars. This is here for backwards compatibility.
			extract( $instance );
			echo $before_widget;
			$html = '';
			$html .= '<ul class="divided">';
			$html .= '<li>';
			$html .= '<article class="box highlight">';
			if ( !empty( $title ) ) {
				$html .= $before_title . $title . $after_title;
			}
			$html .= $this->get_image_html( $instance );

			if ( !empty( $description ) ) {
				$html .= wpautop( $description );
			}
			$html .= '</article></li></ul>';
			echo $html;
			echo $after_widget;
		}
	}

	/**
	 * Обновление параметров виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, self::get_defaults() );
		$instance['title'] = strip_tags( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['description'] = $new_instance['description'];
		} else {
			$instance['description'] = wp_filter_post_kses( $new_instance['description'] );
		}
		// Reverse compatibility with $image, now called $attachement_id
		if ( $new_instance['attachment_id'] > 0 ) {
			$instance['attachment_id'] = abs( $new_instance['attachment_id'] );
		} elseif ( $new_instance['image'] > 0 ) {
			$instance['attachment_id'] = $instance['image'] = abs( $new_instance['image'] );
		}
		$instance['imageurl'] = $new_instance['imageurl']; // deprecated

		return $instance;
	}

	/**
	 * Отоброжение виджета в админке
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, self::get_defaults() );
		$id_prefix = $this->get_field_id( '' );
		?>
		<div class="uploader">
			   <input type="submit" class="button" name="<?php echo $this->get_field_name( 'uploader_button' ); ?>" id="<?php echo $this->get_field_id( 'uploader_button' ); ?>" value="<?php _e( 'Select an Image', 'image_widget' ); ?>" onclick="imageWidget.uploader('<?php echo $this->id; ?>', '<?php echo $id_prefix; ?>');
		                       return false;" />
			<div class="tribe_preview" id="<?php echo $this->get_field_id( 'preview' ); ?>">
				<?php echo $this->get_image_html( $instance ); ?>
			</div>
			<input type="hidden" id="<?php echo $this->get_field_id( 'attachment_id' ); ?>" name="<?php echo $this->get_field_name( 'attachment_id' ); ?>" value="<?php echo abs( $instance['attachment_id'] ); ?>" />
			<input type="hidden" id="<?php echo $this->get_field_id( 'imageurl' ); ?>" name="<?php echo $this->get_field_name( 'imageurl' ); ?>" value="<?php echo $instance['imageurl']; ?>" />
		</div>
		<br clear="all" />

		<div id="<?php echo $this->get_field_id( 'fields' ); ?>" <?php if ( empty( $instance['attachment_id'] ) && empty( $instance['imageurl'] ) ) { ?>style="display:none;"<?php } ?>>
			<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'image_widget' ); ?>:</label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( strip_tags( $instance['title'] ) ); ?>" /></p>

			<p><label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Caption', 'image_widget' ); ?>:</label>
				<textarea rows="8" class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo format_to_edit( $instance['description'] ); ?></textarea></p>	
		</div>
		<?php
	}

	/**
	 * Стили виджета в админке
	 */
	public function admin_head() {
		?>
		<style type="text/css">
			.uploader input.button {
				width: 100%;
				height: 34px;
				line-height: 33px;
				margin-top: 15px;
			}
			.tribe_preview .aligncenter {
				display: block;
				margin-left: auto !important;
				margin-right: auto !important;
			}
			.tribe_preview {
				overflow: hidden;
				max-height: 300px;
			}
			.tribe_preview img {
				margin: 10px 0;
				height: auto;
			}
		</style>
		<?php
	}

	/**
	 * Vассив значений по умолчанию.
	 */
	private static function get_defaults() {

		$defaults = array(
			'title' => '',
			'description' => '',
			'maxwidth' => '100%',
			'maxheight' => '',
			'image' => 0, // reverse compatible - now attachement_id
			'imageurl' => '', // reverse compatible.
		);
		$defaults['attachment_id'] = 0;

		return $defaults;
	}

	/**
	 * Вывод изображения.
	 */
	private function get_image_html( $instance ) {

		// Backwards compatible image display.
		if ( $instance['attachment_id'] == 0 && $instance['image'] > 0 ) {
			$instance['attachment_id'] = $instance['image'];
		}
		if ( abs( $instance['attachment_id'] ) > 0 ) {
			$src = image_get_intermediate_size( $instance['attachment_id'], 'strongly-min' );
			$output .= '<img src="' . $src[url] . '" class="image left" />';
		}
		return $output;
	}

}
