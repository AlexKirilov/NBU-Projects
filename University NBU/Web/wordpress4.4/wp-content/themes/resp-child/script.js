jQuery(document).ready(function ($) {

if( ! $('body').hasClass('page-id-5') ){

    $('#container').append('<div class="inside1"></div><div class="inside2"></div><div class="inside3"></div><div class="inside4"></div><div class="inside5"></div><div class="inside6"></div>');
    var counter = 1;

    $('#container').bind('mousewheel', function (e) {
        var delta = parseInt(e.originalEvent.wheelDelta);
        var cont_width = $('.inside'+counter).width() + delta;
        
        if (delta > 0 && counter < 6) {
            var position = $('.inside' + (counter + 1)).position().left - delta;
            var first_pos = $('.inside' + counter).position().left - delta;
            if (position > 120) {
                $('.inside' + counter).css({'left': first_pos + 'px'});
                $('.inside' + counter).next().css({'left': position + 'px'});
            } else {
                position = 0;
                $('.inside' + counter).css({'left': first_pos + 'px'});
                $('.inside' + counter).next().css({'left': position + 'px'});
                counter++;
            }
        } else if (delta < 0 && counter > 1 && counter < 6 ) {
            var neg_position = $('.inside' + counter).position().left - delta;
            var neg_prev_pos = $('.inside' + (counter-1)).position().left - delta;
            var neg_next_pos = $('.inside' + (counter+1)).position().left - delta;
            
            if( neg_prev_pos < cont_width ){
                $('.inside'+counter).css({'left':neg_position});
                $('.inside'+counter).next().css({'left':neg_next_pos});
                $('.inside'+counter).prev().css({'left':neg_prev_pos});
            }else {
            //    fuck you you stupid js
            }
            
        }
        console.log(counter);
    });
}
});