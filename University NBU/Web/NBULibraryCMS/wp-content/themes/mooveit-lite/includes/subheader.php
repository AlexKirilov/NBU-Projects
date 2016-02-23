<?php
/**
 *	The template for displaying Subheader.
 *
 *	@package ThemeIsle
 */

if ( is_home() ) {
	if ( get_theme_mod( 'mooveit_lite_frontpage_subheader_articletitle', 'Finibus Bonorum et Malorum' ) || get_theme_mod( 'mooveit_lite_frontpage_subheader_articleentry', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.' ) || get_theme_mod( 'mooveit_lite_frontpage_subheader_articlebuttonlink', '#' ) ) {
		$subheader_id = 'subheader';
	} else {
		$subheader_id = 'no-subheader';
	}
} else {
	$subheader_id = '';
}
?>
<section id="<?php echo $subheader_id; ?>" class="cf">
	<div class="subheader-wrap cf">
		<?php
		if ( is_home() ) {

			if ( get_theme_mod( 'mooveit_lite_frontpage_subheader_articletitle', 'Finibus Bonorum et Malorum' ) || get_theme_mod( 'mooveit_lite_frontpage_subheader_articleentry', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.' ) || get_theme_mod( 'mooveit_lite_frontpage_subheader_articlebuttonlink', '#' ) ) {
				echo '<div class="subheader-background">';
				echo '</div>';
			}
		}
		?>
		<nav>
			<?php

			if ( ( get_theme_mod( 'mooveit_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) || get_theme_mod( 'mooveit_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) || get_theme_mod( 'mooveit_lite_general_socialslink_googlepluslink', 'http://www.google.com' ) || get_theme_mod( 'mooveit_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) == NULL ) { ?>

				<style>
					.navigation {
						width: 100% !important;
					}
				</style>

			<?php } ?>
			<div class="openresponsivemenu">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="32" height="32" viewBox="0 0 32 32">
					<path d="M0 12h22v4h-22v-4zM0 6h22v4h-22v-4zM0 18h22v4h-22v-4zM0 24h22v4h-22v-4zM24 18l4 6 4-6h-8zM32 16l-4-6-4 6h8z" fill="#fff" />
				</svg>
			</div><!--/.openresponsivemenu-->
			<?php
			wp_nav_menu( array(
					'theme_location'	=> 'header-menu',
					'menu_class'		=> 'navigation cf',
					'container'			=> '',
					'container_class'	=> ''
				)
			);

			if ( get_theme_mod( 'mooveit_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) || get_theme_mod( 'mooveit_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) || get_theme_mod( 'mooveit_lite_general_socialslink_googlepluslink', 'http://www.google.com' ) || get_theme_mod( 'mooveit_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) { ?>

				<div class="socials-box">
					<?php
					if ( get_theme_mod( 'mooveit_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) ) {
						echo '<a href="'. esc_url( get_theme_mod( 'mooveit_lite_general_socialslink_youtubelink', 'http://www.youtube.com' ) ) .'" title="'. __( 'YouTube', 'mooveit_lite' ) .'" target="_blank" class="youtube-icon"></a>';
					}

					if ( get_theme_mod( 'mooveit_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) ) {
						echo '<a href="'. esc_url( get_theme_mod( 'mooveit_lite_general_socialslink_facebooklink', 'http://www.facebook.com' ) ) .'" title="'. __( 'Facebook', 'mooveit_lite' ) .'" target="_blank" class="facebook-icon"></a>';
					}

					if ( get_theme_mod( 'mooveit_lite_general_socialslink_googlepluslink', 'http://www.google.com' ) ) {
						echo '<a href="'. esc_url( get_theme_mod( 'mooveit_lite_general_socialslink_googlepluslink', 'http://www.google.com' ) ) .'" title="'. __( 'Google+', 'mooveit_lite' ) .'" target="_blank" class="googleplus-icon"></a>';
					}

					if ( get_theme_mod( 'mooveit_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) {
						echo '<a href="'. esc_url( get_theme_mod( 'mooveit_lite_general_socialslink_twitterlink', 'http://www.twitter.com' ) ) .'" title="'. __( 'Twitter', 'mooveit_lite' ) .'" target="_blank" class="twitter-icon"></a>';
					}
					?>
				</div><!--/.socials-box-->

			<?php }
			?>
		</nav>
		<?php
		if ( is_home() ) {

			if ( get_theme_mod( 'mooveit_lite_frontpage_subheader_articletitle', 'Finibus Bonorum et Malorum' ) || get_theme_mod( 'mooveit_lite_frontpage_subheader_articleentry', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.' ) || get_theme_mod( 'mooveit_lite_frontpage_subheader_articlebuttonlink', '#' ) ) {

				echo '<div class="subheader-wrap-content">';

				if ( get_theme_mod( 'mooveit_lite_frontpage_subheader_articletitle', 'Finibus Bonorum et Malorum' ) ) {
					echo '<h3>'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_subheader_articletitle', 'Finibus Bonorum et Malorum' ) ) .'</h3>';
				}

				if ( get_theme_mod( 'mooveit_lite_frontpage_subheader_articleentry', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.' ) ) {
					echo '<p>'. esc_textarea( get_theme_mod( 'mooveit_lite_frontpage_subheader_articleentry', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.' ) ) .'</p>';
				}

				if ( get_theme_mod( 'mooveit_lite_frontpage_subheader_articlebuttonlink', '#' ) ) {
					echo '<a href="'. esc_url( get_theme_mod( 'mooveit_lite_frontpage_subheader_articlebuttonlink', '#' ) ) .'" title="'. __( 'Read More', 'mooveit_lite' ) .'">'. __( 'Read more', 'mooveit_lite' ) .'</a>';
				}

				echo '</div><!--/.subheader-wrap-content-->';

			}

		}
		?>
	</div><!--/.wrap-->
</section><!--/#subheader-->