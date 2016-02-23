<?php
/**
 * 	The template for displaying Index.
 *
 * 	@package ThemeIsle
 */
get_header();
?>
<section class="cf">
	<div class="subheader-wrap cf">
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
	</div><!--/.wrap-->
</section><!--/#subheader-->
<div class="wrap cf">
	<div class="blog-title">
		<h3><?php _e( 'Our New Blog', 'mooveit_lite' ); ?></h3>
	</div><!--/.blog-title-->
	<?php
	if ( !is_active_sidebar( 'general_sidebar' ) ) {
		$contentleft_class = 'content-left content-left-fullwidth';
	} else {
		$contentleft_class = 'content-left';
	}
	?>
	<div class="<?php echo $contentleft_class; ?>">
		<?php

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h2>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a><!--/a-->
						</h2><!--/h2-->
						<ul class="meta-post cf">
							<li class="author-icon">
								<?php the_author_posts_link(); ?>
							</li><!--/li .author-icon-->
							<li class="calendar-icon">
								<?php echo the_time( get_option( 'date_format' ) ); ?>
							</li><!--/li .calendar-icon-->
							<li class="comments-icon">
								<a href="<?php the_permalink(); ?>#comments" title="<?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?>">
									<?php comments_number( 'No Comments', 'One Comment', '% Comments' ); ?>
								</a><!--/a-->
							</li><!--/li .comments-icon-->
							<li class="category-icon">
								<?php the_category( ', ' ); ?>
							</li><!--/li .category-icon-->
						</ul><!--/ul .meta-post-->
						<?php
						if ( $featured_image != NULL ) { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article-image">
								<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
							</a><!--/a-->
						<?php }
						?>
						<div class="post-entry">
							<?php the_excerpt(); ?>
						</div><!--/.post-entry-->
						<a href="<?php the_permalink(); ?>" title="<?php _e( 'Read More', 'mooveit_lite' ); ?>" class="post-read-more">
							<?php _e( 'Read More', 'mooveit_lite' ); ?>
						</a><!--/a .post-read-more-->
					</article><!--/article-->

				<?php }
			} else {
				echo __( 'No posts found.', 'mooveit_lite' );
			}
		?>
		<div class="posts-navigation">
			<ul>
				<?php
				if ( get_previous_posts_link() )
					printf( '<div class="posts-navigation-previous">%s</div>' . "\n", get_previous_posts_link( 'previous' ) );

				if ( get_next_posts_link() )
					printf( '<div class="posts-navigation-next">%s</div>' . "\n", get_next_posts_link( 'next' ) );
				?>
			</ul>
		</div><!--/.post-navigation-->
	</div><!--/.content-left-->
	<?php get_sidebar(); ?>
</div><!--/.wrap .cf-->
<?php get_footer(); ?>