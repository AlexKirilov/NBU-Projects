<?php
/**
 * 	The template for displaying 404 page.
 *
 * 	@package ThemeIsle
 */
get_header();
?>
<div class="wrap cf">
	<div class="blog-title">
		<h3>
			<?php
			if ( get_theme_mod( 'mooveit_lite_404_title', 'Error' ) ) {
				echo esc_attr( get_theme_mod( 'mooveit_lite_404_title', 'Error' ) );
			}
			?>
		</h3>
	</div><!--/.blog-title-->
	<div class="error-subtitle">
		<?php
		if ( get_theme_mod( 'mooveit_lite_404_subtitle', 'The page you were looking for was not found.' ) ) {
			echo esc_attr( get_theme_mod( 'mooveit_lite_404_subtitle', 'The page you were looking for was not found.' ) );
		}
		?>
	</div><!--/.404-subtitle-->
	<div class="error-entry">
		<?php
		if ( get_theme_mod( 'mooveit_lite_404_entry', 'The page you are looking for does not exist, I can take you to the <a href="'. esc_url( home_url() ) .'" title="'. __( 'home page', 'mooveit_lite' ) .'">home page</a>.' ) ) {
			echo get_theme_mod( 'mooveit_lite_404_entry', 'The page you are looking for does not exist, I can take you to the <a href="'. esc_url( home_url() ) .'" title="'. __( 'home page', 'mooveit_lite' ) .'">home page</a>.' );
		}
		?>
	</div><!--/.error-entry-->
	<div class="error-message">
		<?php _e( '404', 'mooveit_lite' ); ?>
	</div><!--/.error-message-->
</div><!--/.wrap .cf-->
<?php get_footer(); ?>