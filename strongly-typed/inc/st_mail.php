<?php

if ( isset( $_POST['submitted'] ) ) {
	if ( trim( $_POST['contact_name'] ) === '' ) {
		$nameError = 'Введите ваше имя';
		$hasError = true;
	} else {
		$name = trim( $_POST['contact_name'] );
	}

	if ( trim( $_POST['contact_email'] ) === '' ) {
		$emailError = 'Введите e-mail';
		$hasError = true;
	} else if ( !eregi( "^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim( $_POST['contact_email'] ) ) ) {
		$emailError = 'Не верный адрес.';
		$hasError = true;
	} else {
		$email = trim( $_POST['contact_email'] );
	}

	if ( trim( $_POST['contact_comments'] ) === '' ) {
		$commentError = 'Введите сообщение';
		$hasError = true;
	} else {
		if ( function_exists( 'stripslashes' ) ) {
			$comments = stripslashes( trim( $_POST['contact_comments'] ) );
		} else {
			$comments = trim( $_POST['contact_comments'] );
		}
	}

	if ( !isset( $hasError ) ) {
		global $emailTo;
		$subject = 'Сообщение с сайта от ' . $name;
		$body = "Имя: $name \n\nE-mail: $email \n\nТема: $theme \n\nСообщение: $comments";
		$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email;
		mail( $emailTo, $subject, $body, $headers );
		$emailSent = true;
	}
}
