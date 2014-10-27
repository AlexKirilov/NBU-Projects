jQuery(document).ready(function($) {
    var raw_data ;
    $('#ul_for_li').children('li').click(function() {
        $(this).each(function(i){
            var title_data = $(this).children('p').text();
            if(title_data == " RGBA"){
                $('#input_text').append("<p><input type='text' id='color_R' />Color R </p>");
                $('#input_text').append("<p><input type='text' id='color_G' />Color G </p>");
                $('#input_text').append("<p><input type='text' id='color_B' />Color B </p>");
                var RGB_values = Array();
                if($('#color_R').length > 0){
                    RGB_values[0] = $('#color_R').val();
                }else if($('#color_G').length > 0){
                     RGB_values[1] = $('#color_G').val();
                }else if($('#color_B').length > 0){
                    RGB_values[2] = $('#color_B').val();
                }
                raw_data = RGB_values;
            }
           
        });
       
    });
    
      /*$('#BANANI').click(function(){
        $.ajax({
            url: '../CSS-Generator/php/ajaxPHP.php',
            type: 'post',
            data: { ajax_data_s: },
            success: function(data) {
                console.log(data);
            }
        });
        });
        
});*/
