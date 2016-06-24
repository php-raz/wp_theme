<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strongly_Typed
 */
?>

	<div id = "copyright_2" class = "container">
		<ul class = "links">
			<li>&copy;
				Untitled. All rights reserved.</li><li>Design: <a href = "http://html5up.net">HTML5 UP</a></li>
		</ul>
	</div>

</div>

<!--[if lte IE 8]><script src="<?php
// Получает URL текущей темы. Не содержит закрывающий слэш.
echo esc_url( get_template_directory_uri() );
?>/assets/js/ie/respond.min.js"></script><![endif]-->
<?php wp_footer(); ?>

</body>
</html>
