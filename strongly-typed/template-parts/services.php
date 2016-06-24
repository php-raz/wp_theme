<?php
/**
 * Template Name: Services
 */
get_header();
?>

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
		// $emailTo = get_option( 'admin_email' );
		$emailTo = '';
		$subject = 'Сообщение с сайта от ' . $name;
		$body = "Имя: $name \n\nE-mail: $email \n\nТема: $theme \n\nСообщение: $comments";
		$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n" . 'Reply-To: ' . $email;
		wp_mail( $emailTo, $subject, $body, $headers );
		$emailSent = true;
	}
}
?>

<!-- Features -->
<div id="features-wrapper">
	<section id="features" class="container">

		<?php if ( get_theme_mod( 'services_text' ) ) : ?>

			<header>
				<h2><?php echo wp_kses_post( get_theme_mod( 'services_text' ) ); ?></h2>
			</header>

		<?php endif; ?>

		<div class="row">
			<div class="4u 12u(mobile)">
				<section>

					<?php if ( get_theme_mod( 'service_icon_1' ) && 0 < count( strlen( $service_icon_1 = get_theme_mod( 'service_icon_1' ) ) ) ) : ?>
						<a href="<?php echo esc_url( get_page_link( get_theme_mod( 'service_button_url' ) ) ) ?>" class="image featured">
							<img src="<?php echo esc_html( $service_icon_1 ); ?>" />
						</a>  
					<?php endif; ?> 

					<?php if ( get_theme_mod( 'service_title_1' ) ) : ?>
						<header><h3><?php echo wp_kses_post( get_theme_mod( 'service_title_1' ) ); ?></h3></header>
					<?php endif; ?> 

					<?php if ( get_theme_mod( 'service_text_1' ) ) : ?>
						<p><?php echo wp_kses_post( get_theme_mod( 'service_text_1' ) ); ?></p>
					<?php endif; ?>

				</section>
			</div>

			<div class="4u 12u(mobile)">
				<section>

					<?php if ( get_theme_mod( 'service_icon_2' ) && 0 < count( strlen( $service_icon_2 = get_theme_mod( 'service_icon_2' ) ) ) ) : ?>
						<a href="<?php echo esc_url( get_page_link( get_theme_mod( 'service_button_url' ) ) ) ?>" class="image featured">
							<img src="<?php echo esc_html( $service_icon_2 ); ?>" />
						</a>  
					<?php endif; ?> 

					<?php if ( get_theme_mod( 'service_title_2' ) ) : ?>
						<header><h3><?php echo wp_kses_post( get_theme_mod( 'service_title_2' ) ); ?></h3></header>
					<?php endif; ?> 

					<?php if ( get_theme_mod( 'service_text_2' ) ) : ?>
						<p><?php echo wp_kses_post( get_theme_mod( 'service_text_2' ) ); ?></p>
					<?php endif; ?>

				</section>
			</div>

			<div class="4u 12u(mobile)">
				<section>

					<?php if ( get_theme_mod( 'service_icon_3' ) && 0 < count( strlen( $service_icon_3 = get_theme_mod( 'service_icon_3' ) ) ) ) : ?>
						<a href="<?php echo esc_url( get_page_link( get_theme_mod( 'service_button_url' ) ) ) ?>" class="image featured">
							<img src="<?php echo esc_html( $service_icon_3 ); ?>" />
						</a>  
					<?php endif; ?> 

					<?php if ( get_theme_mod( 'service_title_3' ) ) : ?>
						<header><h3><?php echo wp_kses_post( get_theme_mod( 'service_title_3' ) ); ?></h3></header>
					<?php endif; ?> 

					<?php if ( get_theme_mod( 'service_text_3' ) ) : ?>
						<p><?php echo wp_kses_post( get_theme_mod( 'service_text_3' ) ); ?></p>
					<?php endif; ?>

				</section>
			</div>
		</div>

		<?php if ( get_theme_mod( 'service_button_text' ) && get_theme_mod( 'service_button_url' ) ) : ?>

			<ul class="actions">
				<li>
					<a href="<?php echo esc_url( get_page_link( get_theme_mod( 'service_button_url' ) ) ) ?>" class="button icon fa-file"> 

						<?php echo wp_kses_post( get_theme_mod( 'service_button_text' ) ); ?> 

					</a>
				</li>
			</ul>

		<?php endif; ?>

	</section>
</div>

<div id = "footer-wrapper">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id = "post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div id = "footer" class = "container">
				<header>
					<?php the_title( '<h2>', '</h2>' ); ?>
				</header><!-- .entry-header -->

				<p>
					<?php
					the_content();
					?>
				</p>
				<div class = "row">

					<div class = "6u 12u(mobile)">
						<section>
							<?php 
							global $emailSent, $hasError;
							if ( isset( $emailSent ) && $emailSent == true ) { ?>
								<div class="contact_message">Ваше сообщение успешно отправлено!</div>
							<?php } else { ?>
								<?php if ( isset( $hasError ) || isset( $captchaError ) ) { ?>

								<?php } ?>
								<form id="contactForm_2" action = "" method = "post">
									<div id="note_2"></div>
									<div id="fields_2">
									<div class = "row 50%">

										<div class = "6u 12u(mobile)">
											<input type="text" name="contact_name" id="contactName" value="<?php if ( isset( $_POST['contact_name'] ) ) echo $_POST['contact_name']; ?>" placeholder = "Ваше имя" />
											<?php if ( $nameError != '' ) { ?>
												<span class="error"><?= $nameError; ?></span>
											<?php } ?>
										</div>

										<div class = "6u 12u(mobile)">
											<input type="text" name="contact_email" id="email" value="<?php if ( isset( $_POST['contact_email'] ) ) echo $_POST['contact_email']; ?>" placeholder = "Ваш e-mail" />
											<?php if ( $emailError != '' ) { ?>
												<span class="error"><?= $emailError; ?></span>
											<?php } ?>
										</div>

									</div>
									<div class = "row 50%">

										<div class = "12u">
											<textarea name="contact_comments" id="commentsText" placeholder = "Сообщение"><?php
												if ( isset( $_POST['contact_comments'] ) ) {
													if ( function_exists( 'stripslashes' ) ) {
														echo stripslashes( $_POST['contact_comments'] );
													} else {
														echo $_POST['contact_comments'];
													}
												}
												?></textarea>
											<?php if ( $commentError != '' ) { ?>
												<span class="error"><?= $commentError; ?></span>
											<?php } ?>
										</div>

									</div>
									<div class = "row 50%">

										<div class = "12u">
											<p>
												<button type="submit" id="submit" class="form-button-submit button icon fa-envelope">Отправить</button>
											</p>
										</div>

									</div>
									<input type="hidden" name="submitted" id="submitted" value="true" />
									</div>
								</form>
							<?php } ?>
						</section>
					</div>

					<div class = "6u 12u(mobile)">
						<section>
							<p>Erat lorem ipsum veroeros consequat magna tempus lorem ipsum consequat Phaselamet
								mollis tortor congue. Sed quis mauris sit amet magna accumsan tristique. Curabitur
								leo nibh, rutrum eu malesuada.</p>
							<div class = "row">
								<div class = "6u 12u(mobile)">
									<ul class = "icons">
										<li class = "icon fa-home">
											1234 Somewhere Road<br />
											Nashville, TN 00000<br />
											USA
										</li>
										<li class = "icon fa-phone">
											(000) 000-0000
										</li>
										<li class = "icon fa-envelope">
											<a href = "#">info@untitled.tld</a>
										</li>
									</ul>
								</div>
								<div class = "6u 12u(mobile)">
									<ul class = "icons">
										<li class = "icon fa-twitter">
											<a href = "#">@untitled-tld</a>
										</li>
										<li class = "icon fa-instagram">
											<a href = "#">instagram.com/untitled-tld</a>
										</li>
										<li class = "icon fa-dribbble">
											<a href = "#">dribbble.com/untitled-tld</a>
										</li>
										<li class = "icon fa-facebook">
											<a href = "#">facebook.com/untitled-tld</a>
										</li>
									</ul>
								</div>
							</div>
						</section>
					</div>

				</div>
			</div>

		</article><!-- #post-## -->
	<?php endwhile; // End of the loop. ?>

	<div id = "copyright" class = "container">
		<ul class = "links">
			<li>&copy;
				Untitled. All rights reserved.</li><li>Design: <a href = "http://html5up.net">HTML5 UP</a></li>
		</ul>
	</div>

</div>

</div>

<!--[if lte IE 8]><script src="<?php
// Получает URL текущей темы. Не содержит закрывающий слэш.
echo esc_url( get_template_directory_uri() );
?>/assets/js/ie/respond.min.js"></script><![endif]-->
<?php wp_footer(); ?>

</body>
</html>