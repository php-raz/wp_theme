<?php
/**
 * Template Name: Home
 *
 * Displays the Blog with Full Content Display.
 *
 */
get_header();
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

<!-- Banner -->

<?php if ( get_theme_mod( 'active_intro' ) == '' ) : ?>  

	<div id="banner-wrapper">
		<div class="inner">

			<?php if ( get_theme_mod( 'intro_textbox' ) ) : ?>
				<section id="banner" class="container">
					<p><?php echo wp_kses_post( get_theme_mod( 'intro_textbox' ) ); ?></p>  
				</section>
			<?php endif; ?>

		</div>
	</div>

<?php endif; ?>

<!-- Main -->
<div id="main-wrapper">
	<div id="main" class="container">
		
		<?php if ( is_active_sidebar( 'sidebar_home' ) ) : ?> 

			<div class="row">
				<?php if ( have_posts() ) : ?>
					<!-- Content -->
					<div id="content" class="8u 12u(mobile)">
						<?php
						while ( have_posts() ) : the_post();
							// Подключение файла контента
							// get_post_format() возвращает формат поста
							// get_template_part() подключает файл контента
							get_template_part( 'template-parts/content', 'page' );
							?>
						<?php endwhile; ?>
					</div>
					<?php
				endif;
				get_sidebar( 'home' );
				?>
			</div>
		<?php else : ?>

			<?php if ( have_posts() ) : ?>
				<!-- Content -->
				<div id="content">
					<?php
					while ( have_posts() ) : the_post();
						// Подключение файла контента
						// get_post_format() возвращает формат поста
						// get_template_part() подключает файл контента
						get_template_part( 'template-parts/content', 'page' );
						?>
					<?php endwhile; ?>
				</div>
				<?php
			endif;
			?>


		<?php endif; ?>
	</div>
</div>
<!--<div id = "footer-wrapper">-->
<?php
get_footer();
