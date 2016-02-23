<?php
/**
 * 	The template for displaying Page Blog.
 *
 * 	@package ThemeIsle
 *
 *	Template Name: Blog
 */
get_header();
?>
<?php get_template_part( 'includes/subheader' ); ?>
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

			$args = array (
				'post_type'              => 'post',
				'pagination'             => true,
				'paged'					 => $paged,
			);

			$wp_query = new WP_Query( $args );

			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
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
								<a href="<?php the_permalink(); ?>#comments" title="<?php comments_number( __( 'No Comments', 'mooveit_lite' ), __( 'One Comment', 'mooveit_lite' ), __( '% Comments', 'mooveit_lite' ) ); ?>">
									<?php comments_number( __( 'No Comments', 'mooveit_lite' ), __( 'One Comment', 'mooveit_lite' ), __( '% Comments', 'mooveit_lite' ) ); ?>
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
						<div class="post-entry cf">
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
			wp_reset_postdata();
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