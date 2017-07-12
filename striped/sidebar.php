<div id="sidebar">
	<h1 id="logo">
		<a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?>
		</a>
	</h1>


	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'container' => 'nav',
        'menu' => 'primary',
		'container_class' => ' ',
		'container_id' => 'nav' ) );
	?>


	<?php if ( is_active_sidebar( "sidebar" ) ) : ?>

		<?php dynamic_sidebar( "sidebar" ); ?>

	<?php endif; ?>

	<ul id="copyright">
		<?php
            echo get_theme_mod( 'copyright_textbox', 'Текст копирайта еще не придумали' );
		?>
	</ul>
</div>


