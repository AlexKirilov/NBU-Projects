<?php

/**
 *	Excerpt Limit Words
 */
function mooveit_lite_excerpt_limit_words($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
}

/**
 *	Comments List
 */
if ( ! function_exists( 'mooveit_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since ti 1.0
 */
function mooveit_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'mooveit_lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'mooveit_lite' ), ' ' ); ?></p>
    <?php
            break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

        <article id="comment-<?php comment_ID(); ?>" class="comments-list cf">
        	<div class="comments-list-left">
        		<?php echo get_avatar( $comment, 62 ); ?>
        		<div class="comments-author-name">
        			<?php printf( __( '%s', 'mooveit_lite' ), sprintf( '%s', get_comment_author_link() ) ); ?> <?php edit_comment_link( __( 'Edit', 'mooveit_lite' ), '- ' ); ?>
        		</div><!--/div .comments-author-name-->
        		<div class="comments-author-entry">
        			<?php comment_text(); ?>
        		</div><!--/div .comments-author-entry-->
        		<?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="awaiting-moderation cf"><?php _e( 'Your comment is awaiting moderation.', 'mooveit_lite' ); ?></em><br />
                <?php endif; ?>
        	</div><!--/div .comments-list-left-->
        	<div class="comments-list-meta">
        		<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="<?php comment_time( 'c' ); ?>"><?php printf( __( '%1$s at %2$s', 'mooveit_lite' ), get_comment_date(), get_comment_time() ); ?></a></span>
        		<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        	</div><!--/div .comments-list-meta-->
        </article><!--/article .comments-list .cf-->

    <?php
            break;
    endswitch;
}
endif;

?>