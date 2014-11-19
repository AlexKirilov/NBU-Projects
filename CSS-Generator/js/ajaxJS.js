function init(){
    var raw_data = new Array() ;
    var clicked_val;
    $('#ul_for_li').children('li').click(function() {
        
        $(this).each(function(i){
            var title_data = $(this).children('p').text();
            if(title_data == " RGBA" && clicked_val != title_data){
                clicked_val = title_data;
                $('#input_text').append("<p><input type='text' id='color_R' />Color R </p>");
                $('#input_text').append("<p><input type='text' id='color_G' />Color G </p>");
                $('#input_text').append("<p><input type='text' id='color_B' />Color B </p>");
                $('#input_text').append("<p><input type='text' id='opacity_color' />Opacity </p>");
                var RGB_values = Array();
                RGB_values[0] = "RGBA";
                //opacitiy opravqne
                raw_data = RGB_values;
                $('#color_R').focus();
                $('#opacity_color').focusout(function(){
                
                    RGB_values[1] = parseInt($('#color_R').val());
                    RGB_values[2] = parseInt($('#color_G').val());
                    RGB_values[3] = parseInt($('#color_B').val());
                    RGB_values[4] = parseInt($('#opacity_color').val());
               for(i=1;i <= 4;i++){
                   if(RGB_values[i] > 255){
                       RGB_values[i] = 255;
                   }
               }
               $('#the_example').css('background-color',"rgb("+RGB_values[1]+","+RGB_values[2]+','+RGB_values[3]+')');
                });
                
            }else if(title_data == " Multiple Columns" && clicked_val != title_data){
                clicked_val = title_data;
                $('#input_text').append("<p><input type='text' id='mult_column' /></p>");
                $('#the_example').css('width','100%').css('height','300px');
                $('#opp').hide();
                $('.visualization').css('width','100%');
                $('#the_example').append('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.');
                
                raw_data[0] = "Multiple Columns";
                $('#mult_column').focus();
                $('#mult_column').focusout(function(){
                    var mult_column = parseInt($('#mult_column').val());
                    $('#the_example').css('column-count',mult_column);
                    if(mult_column > 10){
                        mult_column = 10;
                    }
                    raw_data[1] = mult_column;
                });
            }else if(title_data == ' Border radius' && clicked_val != title_data){
                clicked_val = title_data;
                $("#input_text").append("<p><input type='text' id='bord_rad' /></p>");
                $('#the_example').css('border-style','solid').css('border-width','2px').css('border-color','black');
                raw_data[0] = "Border radius";
                $('#bord_rad').focus();
                $('#bord_rad').focusout(function(){
                    var bord_rad = parseInt($('#bord_rad').val());
                    $('#the_example').css('border-radius',bord_rad+'%');
                    if(bord_rad > 100){
                        bord_rad = 100;
                    }
                    raw_data[1]=bord_rad;
                });
            }
           
        });
     
        
       
    });
    
      $('#saveThisSht').click(function(){
          if(raw_data[0] == "RGBA"){
          raw_data[1] = parseInt($('#color_R').val());
                    raw_data[2] = parseInt($('#color_G').val());
                     raw_data[3] = parseInt($('#color_B').val());
                     raw_data[4] = parseInt($('#opacity_color').val());
               for(i=1;i <= 4;i++){
                   if(raw_data[i] > 255){
                       raw_data[i] = 255;
                   }
               }      
          }
          $.ajax({
            url: '../CSS-Generator/php/ajaxPHP.php',
            type: 'post',
            data: { ajax_data_s: raw_data },
            success: function(data) {
                alert(data);
            }
        });
        });
        
};
