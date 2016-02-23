<?php
/**
 * 	The template for displaying Sidebar.
 *
 * 	@package ThemeIsle
 */
?>
<?php
if ( is_active_sidebar( 'general_sidebar' ) ) {

	echo '<div class="sidebar">';
	dynamic_sidebar( 'general_sidebar' );
	echo '</div><!--/.sidebar-->';

}
?>