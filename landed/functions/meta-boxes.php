<?php
/**
 * Initialize the custom Meta Boxes.
 */
add_action('admin_init', 'custom_meta_boxes');

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes()
{

    $main_page = array(
        'id' => 'main_page_box',
        'title' => 'Настройки главной страницы',
        'desc' => '',
        'pages' => array('page'),
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'label' => 'Баннер',
                'id' => 'banner_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'banner_header',
                'label' => 'Напишите заголовок',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'banner_subtitle',
                'label' => 'Напишите подзаголовок',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'banner_upload',
                'label' => 'Загрузите картину',
                'desc' => '',
                'type' => 'upload',
            ),
            array(
                'label' => 'Блок_1',
                'id' => 'block_1_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'block_1_header',
                'label' => 'Напишите заголовок',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_1_subtitle',
                'label' => 'Напишите подзаголовок',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_1_kol_1',
                'label' => 'Колонка_1',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_1_kol_2',
                'label' => 'Колонка_2',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_1_upload',
                'label' => 'Загрузите картину',
                'desc' => '',
                'type' => 'upload',
            ),
            array(
                'label' => 'Блок_2',
                'id' => 'block_2_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'block_2_header',
                'label' => 'Напишите заголовок',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_2_subtitle',
                'label' => 'Напишите подзаголовок',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_2_text',
                'label' => 'Текст',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'label' => 'Показать кнопку',
                'id' => 'block_2_button',
                'type' => 'on-off',
                'desc' => 'Показывать или нет кнопку',
                'std' => 'on'
            ),
            array(
                'id' => 'block_2_button_header',
                'label' => 'Текст кнопки',
                'desc' => '',
                'type' => 'text',
                'condition' => 'block_2_button:is(on)',
            ),
            array(
                'id' => 'block_2_upload',
                'label' => 'Загрузите картину',
                'desc' => '',
                'type' => 'upload',
            ),
            array(
                'label' => 'Блок_3',
                'id' => 'block_3_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'block_3_header',
                'label' => 'Напишите заголовок',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_3_subtitle',
                'label' => 'Напишите подзаголовок',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_3_text',
                'label' => 'Текст',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'label' => 'Показать кнопку',
                'id' => 'block_3_button',
                'type' => 'on-off',
                'desc' => 'Показывать или нет кнопку',
                'std' => 'on'
            ),
            array(
                'id' => 'block_3_button_header',
                'label' => 'Текст кнопки',
                'desc' => '',
                'type' => 'text',
                'condition' => 'block_3_button:is(on)',
            ),
            array(
                'id' => 'block_3_upload',
                'label' => 'Загрузите картину',
                'desc' => '',
                'type' => 'upload',
            ),
            array(
                'label' => 'Блок_4',
                'id' => 'block_4_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'block_4_header',
                'label' => 'Напишите заголовок',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle',
                'label' => 'Напишите подзаголовок',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_4_header_1',
                'label' => 'Напишите заголовок 1',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle_1',
                'label' => 'Напишите подзаголовок 1',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_4_header_2',
                'label' => 'Напишите заголовок 2',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle_2',
                'label' => 'Напишите подзаголовок 2',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_4_header_3',
                'label' => 'Напишите заголовок 3',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle_3',
                'label' => 'Напишите подзаголовок 3',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_4_header_4',
                'label' => 'Напишите заголовок 4',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle_4',
                'label' => 'Напишите подзаголовок 4',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_4_header_5',
                'label' => 'Напишите заголовок 5',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle_5',
                'label' => 'Напишите подзаголовок 5',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_4_header_6',
                'label' => 'Напишите заголовок 6',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_4_subtitle_6',
                'label' => 'Напишите подзаголовок 6',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'label' => 'Показать кнопку',
                'id' => 'block_4_button',
                'type' => 'on-off',
                'desc' => 'Показывать или нет кнопку',
                'std' => 'on'
            ),
            array(
                'id' => 'block_4_button_header',
                'label' => 'Текст кнопки',
                'desc' => '',
                'type' => 'text',
                'condition' => 'block_4_button:is(on)',
            ),
            array(
                'label' => 'Блок_5',
                'id' => 'block_5_tab',
                'type' => 'tab'
            ),
            array(
                'id' => 'block_5_header',
                'label' => 'Напишите заголовок',
                'desc' => '',
                'type' => 'text',
            ),
            array(
                'id' => 'block_5_subtitle',
                'label' => 'Напишите подзаголовок',
                'desc' => '',
                'type' => 'textarea',
            ),
            array(
                'id' => 'block_5_short',
                'label' => 'Введите шорткод формы(Contact form 7)',
                'desc' => '',
                'type' => 'text',
            ),
            /*array(
                'label' => 'Показывать слайдер',
                'id' => 'main_slider_show',
                'type' => 'on-off',
                'desc' => 'Показывать или нет слайдер на главной странице',
                'std' => 'on'
            ),
              array(
                'id' => 'main_slider_list',
                'label' => 'Слайдер',
                'desc' => '',
                'std' => '',
                'type' => 'list-item',
                'condition' => 'main_slider_show:is(on)',
                'settings' => array(
                    array(
                        'id' => 'main_slider_list_header',
                        'label' => 'Напишите заголовок',
                        'desc' => '',
                        'type' => 'text',
                    ),
                    array(
                        'id' => 'main_slider_list_upload',
                        'label' => 'Загрузите слайд',
                        'desc' => '',
                        'type' => 'upload',
                    ),
                )
            ),*/
        )
    );


    /*$my_meta_box = array(
      'id'          => 'demo_meta_box',
      'title'       => __( 'Demo Meta Box', 'theme-text-domain' ),
      'desc'        => '',
      'pages'       => array( 'post' ),
      'context'     => 'normal',
      'priority'    => 'high',
      'fields'      => array(
        array(
          'label'       => __( 'Conditions', 'theme-text-domain' ),
          'id'          => 'demo_conditions',
          'type'        => 'tab'
        ),
        array(
          'label'       => __( 'Show Gallery', 'theme-text-domain' ),
          'id'          => 'demo_show_gallery',
          'type'        => 'on-off',
          'desc'        => sprintf( __( 'Shows the Gallery when set to %s.', 'theme-text-domain' ), '<code>on</code>' ),
          'std'         => 'off'
        ),
        array(
          'label'       => '',
          'id'          => 'demo_textblock',
          'type'        => 'textblock',
          'desc'        => __( 'Congratulations, you created a gallery!', 'theme-text-domain' ),
          'operator'    => 'and',
          'condition'   => 'demo_show_gallery:is(on),demo_gallery:not()'
        ),
        array(
          'label'       => __( 'Gallery', 'theme-text-domain' ),
          'id'          => 'demo_gallery',
          'type'        => 'gallery',
          'desc'        => sprintf( __( 'This is a Gallery option type. It displays when %s.', 'theme-text-domain' ), '<code>demo_show_gallery:is(on)</code>' ),
          'condition'   => 'demo_show_gallery:is(on)'
        ),
        array(
          'label'       => __( 'More Options', 'theme-text-domain' ),
          'id'          => 'demo_more_options',
          'type'        => 'tab'
        ),
        array(
          'label'       => __( 'Text', 'theme-text-domain' ),
          'id'          => 'demo_text',
          'type'        => 'text',
          'desc'        => __( 'This is a demo Text field.', 'theme-text-domain' )
        ),
        array(
          'label'       => __( 'Textarea', 'theme-text-domain' ),
          'id'          => 'demo_textarea',
          'type'        => 'textarea',
          'desc'        => __( 'This is a demo Textarea field.', 'theme-text-domain' )
        )
      )
    );*/

    /**
     * Register our meta boxes using the
     * ot_register_meta_box() function.
     */
    if (function_exists('ot_register_meta_box')) {
//        ot_register_meta_box($my_meta_box);
        $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : 0);
        $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
        if ($template_file == 'page-main.php') {
            ot_register_meta_box($main_page);
        }
    }
}