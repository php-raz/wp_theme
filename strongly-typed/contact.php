<?php
/*
 get_header(); 
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

	if ( trim( $_POST['contact_theme'] ) === '' ) {
		$themeError = 'Введите тему ';
		$hasError = true;
	} else {
		$theme = trim( $_POST['contact_theme'] );
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
		$emailTo = get_option( 'tz_email' );
		if ( !isset( $emailTo ) || ($emailTo == '') ) {
			$emailTo = get_option( 'admin_email' );
		}
		$subject = 'Сообщение с сайта от ' . $name;
		$body = "Имя: $name \n\nE-mail: $email \n\nТема: $theme \n\nСообщение: $comments";
		$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail( $emailTo, $subject, $body, $headers );
		$emailSent = true;
	}
}*/




 while ( have_posts() ) : the_post(); ?>


	<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php the_title( '<h2>', '</h2>' ); ?>
		</header><!-- .entry-header -->

		<?php strongly_typed_post_thumbnail(); ?>
		<p>
			<?php
			the_content();
			?>
		</p>
		<div id="contact_form">
			<?php if ( isset( $emailSent ) && $emailSent == true ) { ?>
				<div class="contact_message">Ваше сообщение успешно отправлено!</div>
			<?php } else { ?>
				<?php if ( isset( $hasError ) || isset( $captchaError ) ) { ?>

				<?php } ?>

				<form action="<?php the_permalink(); ?>" id="contactForm" method="post">

					<div class="contact_left">
						<div class="contact_name">
							<input type="text" placeholder="Ваше имя" name="contact_name" id="contact_name" value="<?php if ( isset( $_POST['contact_name'] ) ) echo $_POST['contact_name']; ?>" class="required requiredField" />
							<?php if ( $nameError != '' ) { ?>
								<div class="errors"><?= $nameError; ?></div>
							<?php } ?>
						</div>
						<div class="contact_email">
							<input type="text" placeholder="Ваш email" name="contact_email" id="contact_email" value="<?php if ( isset( $_POST['contact_email'] ) ) echo $_POST['contact_email']; ?>" class="required requiredField email" />
							<?php if ( $emailError != '' ) { ?>
								<div class="errors"><?= $emailError; ?></div>
							<?php } ?>
						</div>
						<div class="contact_theme">
							<input type="text" placeholder="Тема" name="contact_theme" id="contact_theme" value="<?php if ( isset( $_POST['contact_theme'] ) ) echo $_POST['contact_theme']; ?>" class="required requiredField" />
							<?php if ( $themeError != '' ) { ?>
								<div class="errors"><?= $themeError; ?></div>
							<?php } ?>
						</div>
					</div>

					<div class="contact_right">
						<div class="contact_textarea">
							<textarea placeholder="Сообщение" name="contact_comments" id="commentsText" rows="12" cols="56" class="required requiredField"><?php
								if ( isset( $_POST['contact_comments'] ) ) {
									if ( function_exists( 'stripslashes' ) ) {
										echo stripslashes( $_POST['contact_comments'] );
									} else {
										echo $_POST['contact_comments'];
									}
								}
								?></textarea>
							<?php if ( $commentError != '' ) { ?>
								<div class="errors"><?= $commentError; ?></div>
							<?php } ?>
						</div>

						<button type="submit" class="contact_submit">Отправить</button>
						<input type="hidden" name="submitted" id="submitted" value="true" />
					</div>
				</form>
			<?php } ?>
		</div>
	</article><!-- #post-## -->
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
endwhile; // End of the loop.
get_footer();
