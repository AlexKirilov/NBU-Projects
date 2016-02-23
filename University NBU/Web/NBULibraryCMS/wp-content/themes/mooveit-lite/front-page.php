<?php
/**
 *	Template name: Home
 *
 * 	The template for displaying Front Page.
 *
 * 	@package ThemeIsle
 */
get_header();

if ( get_option( 'show_on_front' ) == 'page' ) {

	if ( is_page_template( 'page-blog.php' ) ) {
		get_template_part( 'page-blog' );
	} else if ( is_page_template( 'page-contact' ) ) {
		get_template_part( 'page-contact' );
	} else {
		get_template_part( 'page' );
	}

} else { ?>

	<?php
	get_template_part( 'includes/subheader' );

	if ( !get_theme_mod( 'ti_header_contactform7_shortcode' ) ) {
		$h3_class = 'class="h3-no-contact-form"';
	} else {
		$h3_class = '';
	}
	?>
	<section id="features-two">
		<div class="wrap">
			<h3 <?php echo $h3_class; ?>>
				<?php
				if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_title', 'Our services' ) != false ) {
					echo esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_title', 'Our services' ) );
				}
				?>
			</h3>
			<div class="features-two-container cf">
				<div class="features-box">
					<div class="features-box-icon">
					</div><!--/.features-box-icon-->
					<?php
					if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box1title', 'Professional services' ) ) {
						echo '<h4>'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box1title', 'Professional services' ) ) .'</h4>';
					}

					if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box1entry', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete .' ) ) {
						echo '<div class="features-box-entry">'. esc_textarea( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box1entry', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete.' ) ) .'</div>';
					}
					?>
				</div><!--/.features-box-->
				<div class="features-box">
					<div class="features-box-icon">
					</div><!--/.features-box-icon-->
					<?php
					if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box2title', 'Lowest price' ) ) {
						echo '<h4>'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box2title', 'Lowest price' ) ) .'</h4>';
					}

					if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box2entry', 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.' ) ) {
						echo '<div class="features-box-entry">'. esc_textarea( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box2entry', 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it.' ) ) .'</div>';
					}
					?>
				</div><!--/.features-box-->
				<div class="features-box">
					<div class="features-box-icon">
					</div><!--/.features-box-icon-->
					<?php
					if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box3title', 'Free estimate' ) ) {
						echo '<h4>'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box3title', 'Free estimate' ) ) .'</h4>';
					}

					if ( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box3entry', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.' ) ) {
						echo '<div class="features-box-entry">'. esc_textarea( get_theme_mod( 'mooveit_lite_frontpage_featuresbox_box3entry', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus.' ) ) .'</div>';
					}
					?>
				</div><!--/.features-box-->
			</div><!--/.features-two-container.cf-->
		</div><!--/.wrap-->
	</section><!--/#features-two-->
	<div class="wrap">
		<article id="content-article" class="cf">
			<div class="content-article-image">
				<?php
				if ( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_image' ) ) {
					echo '<img src="'. esc_url( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_image' ) ) .'" alt="'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_title', 'About our services' ) ) .'" title="'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_title', 'About our services' ) ) .'" />';
				} else {
					echo '<img src="'. get_template_directory_uri() .'/images/index-article-image.png" alt="'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_title', 'About our services' ) ) .'" title="'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_title', 'About our services' ) ) .'" />';
				}
				?>
			</div><!--/.content-article-image-->
			<h2>
				<?php
				if ( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_title', 'About our services' ) != false ) {
					echo esc_attr( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_title', 'About our services' ) );
				}
				?>
			</h2>
			<p>
				<?php
				if ( get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_entry', '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p> <p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection.</p>' ) != false ) {
					echo get_theme_mod( 'mooveit_lite_frontpage_featuredarticle_entry', '<p>These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p> <p>But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection.</p>' );
				}
				?>
			</p>
		</article><!--/#content-article-->
	</div><!--/.wrap-->
	<?php
	if ( !get_theme_mod( 'mooveit_lite_frontpage_latestnews_hide' ) ) {

		$args = array (
			'post_type'              => 'post',
		);

		$wp_query = new WP_Query( $args );

		if ( $wp_query->have_posts() ) { ?>

			<div class="wrap">
				<div id="latest-posts">
					<div class="title-border">
						<?php
						if ( get_theme_mod( 'mooveit_lite_frontpage_latestnews_title', 'Latest News' ) ) {
							echo '<h3>'. esc_attr( get_theme_mod( 'mooveit_lite_frontpage_latestnews_title', 'Latest News' ) ) .'</h3>';
						}
						?>
					</div><!--/.title-border-->
					<div class="latest-posts cf">

						<?php
						while ( $wp_query->have_posts() ) {
							$wp_query->the_post(); ?>

							<div id="post-<?php the_ID(); ?>" <?php post_class( 'latest-post' ); ?>>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="latest-post-title">
									<?php the_title(); ?>
								</a><!--/.latest-post-title-->
								<div class="latest-post-entry">
									<?php the_excerpt(); ?>
								</div><!--/.latest-post-entry-->
							</div><!--/.latest-post-->

						<?php }
						?>

					</div><!--/.latest-posts.cf-->
				</div><!--/#latest-posts-->
			</div><!--/.wrap-->

		<?php }

		wp_reset_postdata();

	}
	?>

<?php }
get_footer(); ?>