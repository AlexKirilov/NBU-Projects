<?php
/**
 * 	The template for displaying Header.
 *
 * 	@package ThemeIsle
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="cf">
			<div class="wrap cf">
				<?php
				if ( !display_header_text() ) {

					echo '<a href="'. esc_url( home_url() ) .'" title="'. get_bloginfo( 'name' ) .'" class="logo-box">';
					echo '<img src="'. esc_url( get_header_image() ) .'" title="'. get_bloginfo( 'name' ) .'" alt="'. get_bloginfo( 'name' ) .'" />';
					echo '</a><!--/.logo-box-->';

				} else {

					$header_textcolor = get_header_textcolor();
					if ( empty( $header_textcolor ) ) {
						$header_logo_style = '';
					} else {
						$header_textcolor = ' style="color: #'. $header_textcolor .';"';
					}

					echo '<a href="'. esc_url( home_url() ) .'" title="'. get_bloginfo( 'name' ) .'" class="no-logo-box">';
					echo '<div class="no-logo-box-title"'. $header_textcolor .'>';
					echo get_bloginfo( 'name' );
					echo '</div><!--/.no-logo-box-title-->';
					echo '<div class="no-logo-box-description"'. $header_textcolor .'>';
					echo get_bloginfo( 'description' );
					echo '</div><!--/.no-logo-box-description-->';
					echo '</a><!--/.no-logo-box-->';
				}

				if ( get_theme_mod( 'mooveit_lite_general_header_telephonenumber', '+1 234 546 545' ) ) { ?>

					<div class="call-us-box">
						<?php
						if ( get_theme_mod( 'mooveit_lite_general_header_title', 'Call us now' ) ) {
	    					echo '<span>'. esc_attr( get_theme_mod( 'mooveit_lite_general_header_title', 'Call us now' ) ) .'</span>';
	    				}

	    				if ( get_theme_mod( 'mooveit_lite_general_header_telephonenumber', '+1 234 546 545' ) ) {
	    					echo '<a href="tel:'. esc_attr( get_theme_mod( 'mooveit_lite_general_header_telephonenumber', '+1 234 546 545' ) ) .'" title="Tel: '. esc_attr( get_theme_mod( 'mooveit_lite_general_header_telephonenumber', '+1 234 546 545' ) ) .'">'. esc_attr( get_theme_mod( 'mooveit_lite_general_header_telephonenumber', '+1 234 546 545' ) ) .'</a>';
	    				}
						?>
					</div><!--/.call-us-box-->

				<?php }
				?>
			</div><!--/.wrap .cf-->
		</header><!--/header-->