<?php

function myform_action_callback() {

	if ( trim( $_POST['contact_name'] ) === '' ) {
		$nameError = 'Введите ваше имя';
	} else {
		$name = trim( $_POST['contact_name'] );
	}

	if ( trim( $_POST['contact_email'] ) === '' ) {
		$emailError = 'Введите e-mail';
	} else if ( !eregi( "^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim( $_POST['contact_email'] ) ) ) {
		$emailError = 'Не верный адрес.';
	} else {
		$email = trim( $_POST['contact_email'] );
	}

	if ( trim( $_POST['contact_comments'] ) === '' ) {
		$commentError = 'Введите сообщение';
	} else {
		if ( function_exists( 'stripslashes' ) ) {
			$comments = stripslashes( trim( $_POST['contact_comments'] ) );
		} else {
			$comments = trim( $_POST['contact_comments'] );
		}
	}

	$nonce = $_POST['contact_nonce'];
	$name = $_POST['contact_name'];
	$mess = $_POST['contact_mess'];
	$email = $_POST['contact_email'];
	$ser_name = $_SERVER['SERVER_NAME'];
	$rtr = '';
	if ( !wp_verify_nonce( $nonce, 'myform_action-nonce' ) ){
		wp_die( '{"error":"Error. Spam"}' );
	}
	$message = "";
	$to = get_option( 'admin_email' ); // заменить на свою почту
	$headers = "Content-type: text/html; charset=utf-8 \r\n";
	$headers.= "From: " . $ser_name . " \r\n";
	$subject = "Сообщение с сайта " . $ser_name;
	do_action( 'plugins_loaded' );
	if ( !empty( $name ) && !empty( $mess ) && !empty( $email ) ) {
		$message.="Имя: " . $name;
		$message.="<br/>E-mail: " . $email;
		$message.="<br/>Сообщение:<br/>" . nl2br( $mess );
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			$rtr = '{"work":"Сообщение отправлено!","error":""}';
		} else {
			$rtr = '{"error":"Ошибка сервера."}';
		}
	} else {
		$rtr = '{"error":"Все поля обязательны к заполнению!"}';
	}
	echo $rtr;
	exit;
}

add_action( 'wp_ajax_nopriv_myform_send_action', 'myform_action_callback' );
add_action( 'wp_ajax_myform_send_action', 'myform_action_callback' );

function myform_stylesheet() {
	wp_enqueue_style( "myform_style_templ", get_template_directory_uri() . "/css/styleform.css", "0.1.2", true );
	wp_enqueue_script( "myform_script_temp", get_template_directory_uri() . "/js/scriptform.js", array( 'jquery' ), "0.1.2", true );
	wp_localize_script( "myform_script_temp", "myform_Ajax", array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce( 'myform_action-nonce' )
			)
	);
}

add_action( 'wp_enqueue_scripts', 'myform_stylesheet' );

function formZak() {
	$rty = '<div class="form">';
	$rty.='<div class="line"><input id="contact_name" type="text" placeholder="Имя"/></div>';
	$rty.='<div class="line"><input id="contact_email" type="text" placeholder="Почта"/></div>';
	$rty.='<div class="line"><textarea id="contact_mess" placeholder="Сообщение"></textarea></div>';
	$rty.='<div class="line"><input type="submit" onclick="myform_ajax_send(\'#contact_name\',\'#contact_email\',\'#contact_mess\'); return false;" value="Отправить"/></div>';
	$rty.='</div>';
	return $rty;
}

add_shortcode( 'formZak', 'formZak' );
