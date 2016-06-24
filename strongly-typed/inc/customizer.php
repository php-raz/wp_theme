<?php

/**
 * Strongly Typed Theme Customizer.
 *
 * @package Strongly_Typed
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function strongly_typed_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


// Создание сервисной панели
	$wp_customize->add_panel( 'services_panel', array(
		'priority' => 26,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'Блок сервиса',
		'description' => 'Настройте блок сервиса для Вашей страницы Home.',
	) );

// Создание сервисной секции, скрытие/показ секции, заголовок секции, 
// заголовок кнопки, ссылка при нажатии	
	
	$wp_customize->add_section( 'strongly_typed_services_section', array(
		'title' => 'Настройки',
		'priority' => 11,
		'description' => 'Задайте основные настройки для Сервисного блока.',
		'panel' => 'services_panel',
	) );


// Заголовок секции
	$wp_customize->add_setting( 'services_text', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'services_text', array(
		'label' => 'Заголовок секции',
		'section' => 'strongly_typed_services_section',
		'settings' => 'services_text',
		'priority' => 20
	) ) );

// Заголовок кнопки
	$wp_customize->add_setting( 'service_button_text', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_button_text', array(
		'label' => __( 'Заголовок кнопки', 'strongly_typed-wp' ),
		'section' => 'strongly_typed_services_section',
		'settings' => 'service_button_text',
		'priority' => 30
	) ) );

// Ссылка при нажатии на кнопку
	$wp_customize->add_setting( 'service_button_url', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'strongly_typedwp_sanitize_int'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_button_url', array(
		'label' => 'Ссылка кнопки',
		'section' => 'strongly_typed_services_section',
		'type' => 'dropdown-pages',
		'settings' => 'service_button_url',
		'priority' => 40
	) ) );


// Сервисная секция 1
	$wp_customize->add_section( 'strongly_typed_services_box_1', array(
		'title' => 'Блок 1',
		'priority' => 20,
		'description' => 'Настройте блок 1 вашей сервисной панели.',
		'panel' => 'services_panel',
	) );


// Service Icon 1
	$wp_customize->add_setting( 'service_icon_1', array(
		'default' => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service_icon_1', array(
		'label' => 'Миниатюра блока',
		'section' => 'strongly_typed_services_box_1',
		'settings' => 'service_icon_1',
		'priority' => 2
	) ) );

// Service Title 1
	$wp_customize->add_setting( 'service_title_1', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_title_1', array(
		'label' => 'Заголовок блока',
		'section' => 'strongly_typed_services_box_1',
		'settings' => 'service_title_1',
		'priority' => 3
	) ) );

// Service Text 1
	$wp_customize->add_setting( 'service_text_1', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_text_1', array(
		'label' => 'Текст блока',
		'section' => 'strongly_typed_services_box_1',
		'settings' => 'service_text_1',
		'type' => 'textarea',
		'priority' => 4
	) ) );

	
// Сервисная секция 2
	$wp_customize->add_section( 'strongly_typed_services_box_2', array(
		'title' => 'Блок 2',
		'priority' => 30,
		'description' => 'Настройте блок 2 вашей сервисной панели.',
		'panel' => 'services_panel',
	) );


// Service Icon 2
	$wp_customize->add_setting( 'service_icon_2', array(
		'default' => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service_icon_2', array(
		'label' => 'Миниатюра блока',
		'section' => 'strongly_typed_services_box_2',
		'settings' => 'service_icon_2',
		'priority' => 2
	) ) );

// Service Title 2
	$wp_customize->add_setting( 'service_title_2', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_title_2', array(
		'label' => 'Заголовок блока',
		'section' => 'strongly_typed_services_box_2',
		'settings' => 'service_title_2',
		'priority' => 3
	) ) );

// Service Text 2
	$wp_customize->add_setting( 'service_text_2', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_text_2', array(
		'label' => 'Текст блока',
		'section' => 'strongly_typed_services_box_2',
		'settings' => 'service_text_2',
		'type' => 'textarea',
		'priority' => 4
	) ) );
	
	
// Сервисная секция 3
	$wp_customize->add_section( 'strongly_typed_services_box_3', array(
		'title' => 'Блок 3',
		'priority' => 40,
		'description' => 'Настройте блок 3 вашей сервисной панели.',
		'panel' => 'services_panel',
	) );


// Service Icon 3
	$wp_customize->add_setting( 'service_icon_3', array(
		'default' => '',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'service_icon_3', array(
		'label' => 'Миниатюра блока',
		'section' => 'strongly_typed_services_box_3',
		'settings' => 'service_icon_3',
		'priority' => 2
	) ) );

// Service Title 3
	$wp_customize->add_setting( 'service_title_3', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_title_3', array(
		'label' => 'Заголовок блока',
		'section' => 'strongly_typed_services_box_3',
		'settings' => 'service_title_3',
		'priority' => 3
	) ) );

// Service Text 3
	$wp_customize->add_setting( 'service_text_3', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'service_text_3', array(
		'label' => 'Текст блока',
		'section' => 'strongly_typed_services_box_3',
		'settings' => 'service_text_3',
		'type' => 'textarea',
		'priority' => 4
	) ) );

	/*	 * ****************************************** */

// Создание панели заметки
	$wp_customize->add_panel( 'intro_panel', array(
		'priority' => 27,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'Блок заметки',
		'description' => 'Настройте блок заметки Вашей страницы Home.',
	) );

// Создание секции заметки
	$wp_customize->add_section( 'strongly_typed_intro_section', array(
		'title' => 'Настройка',
		'priority' => 10,
		'description' => 'Настройте блок заметки',
		'panel' => 'intro_panel',
	) );

// Скрытие/показ заметки
	$wp_customize->add_setting( 'active_intro', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( 'active_intro', array(
		'type' => 'checkbox',
		'label' => 'Скрыть блок заметки',
		'section' => 'strongly_typed_intro_section',
		'panel' => 'intro_panel',
		'priority' => 1
	) );

// Текст заметки
	$wp_customize->add_setting( 'intro_textbox', array(
		'sanitize_callback' => 'strongly_typedwp_sanitize_text',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'intro_textbox', array(
		'label' => 'Текст заметки',
		'section' => 'strongly_typed_intro_section',
		'settings' => 'intro_textbox',
		'type' => 'textarea',
		'priority' => 3
	) ) );
	
	wp_enqueue_script( 'strongly_typed_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}

add_action( 'customize_register', 'strongly_typed_customize_register' );

//Checkboxes
function strongly_typedwp_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function strongly_typedwp_sanitize_int( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

//Text
function strongly_typedwp_sanitize_text( $input ) {
// force_balance_tags() исправляет неправильные XHTML/HTML теги в тексте: не закрытые, не по-порядку, неправильный синтаксис
// wp_kses_post() очищает переданную строку, оставляя в ней HTML теги разрешенные для публикации в записи для текущего пользователя
	return wp_kses_post( force_balance_tags( $input ) );
}
