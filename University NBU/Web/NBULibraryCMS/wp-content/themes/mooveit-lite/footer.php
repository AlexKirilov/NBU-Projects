<?php
/**
 * 	The template for displaying Footer.
 *
 * 	@package ThemeIsle
 */
?>
<footer>
	<?php
	if ( is_active_sidebar( 'footer_sidebar' ) ) {

		echo '<div class="footer-one cf">';
		echo '<div class="footer-one-container cf">';
		dynamic_sidebar( 'footer_sidebar' );
		echo '</div><!--/.footer-one-container .cf-->';
		echo '</div><!--/.footer-one .cf-->';

	}
	?>
	</div><!--/.footer-one .cf-->
	<div class="footer-two cf">
		<div class="wrap">
			<div class="footer-left">
				<?php echo get_theme_mod( 'mooveit_lite_general_subheader_copyright', 'Copyright '.get_bloginfo('name') ); ?>
			</div><!--/.footer-left-->
			<div class="footer-right">
				 <a href="https://themeisle.com/themes/mooveit-lite/" target="_blank" rel="nofollow"><?php _e( 'Mooveit Lite', 'mooveit_lite' ); ?></a><?php _e( ' Proudly powered by', 'mooviet_lite' ); ?> <a href="http://www.wordpress.org" title="<?php _e( 'WordPress', 'mooviet_lite' ); ?>" target="_blank" rel="nofollow"><?php _e( 'WordPress', 'mooviet_lite' ); ?></a>
			</div><!--/.footer-right-->
		</div><!--/.wrap-->
	</div><!--/.footer-two-->
</footer><!--/footer-->

	<?php wp_footer(); ?>
	</body>
</html>