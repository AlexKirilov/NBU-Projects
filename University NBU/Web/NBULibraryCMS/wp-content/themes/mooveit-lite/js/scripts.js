/**
 *	Ready Function
 */
jQuery(document).ready(function($) {
	// Responsive Menu
	$('.openresponsivemenu').click(function() {
		$('.navigation ul').toggleClass("responsivemenu");
	});

	// Masonry
	var $container = $('.gallery');
	$container.imagesLoaded( function(){
		$container.masonry({
			itemSelector : 'dl.gallery-item'
		});
	});

	// Nivo Lightbox
	$(document).ready(function(){
	    $('a.nivo-lightbox').nivoLightbox();
	});

	// Match Height
	var byRow = $('body').hasClass('matchheight');
    $('.latest-posts').each(function() {
        $(this).children('.latest-post').matchHeight(byRow);
    });

});

// Limit Menu
var full_width = 0;
jQuery("nav ul:first > li").each(function( index ) {
	if((jQuery(this).width() + full_width) > 730) {
		jQuery(this).remove();
	}
	full_width = full_width + jQuery(this).width();
});