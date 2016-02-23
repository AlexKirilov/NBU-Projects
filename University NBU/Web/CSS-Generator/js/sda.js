var raw_data = new Array() ;
var clicked_val;
function init(){
    
    $('#cssactions').children('li').click(function() {
        $('#operations').empty();
        $('#sample').empty();
        $('#finish_transformation').remove();
        $('#sample').css('border-left', '');
        $('#sample').css('border-right', '');
        $('#sample').css('width','30%');
        $('#sample').css('height','150px');
        $('#sample').css('border','0');
        $('#sample').css('background-color','#fff');
        $('#sample').removeClass('transition_hover_efect');
        $('#sample').css('font-weight', '');
        $('#sample').css('font-family', '');            
        $(this).each(function(i){
            var title_data = $(this).children('p').text();
            
            if(title_data == "RGBA" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<p><input type='text' id='color_R' />Color R </p><p><input type='text' id='color_G' />Color G </p>\n\
                    <p><input type='text' id='color_B' />Color B </p><p><input type='text' id='opacity_color' />Opacity (values allowed are 0 to 1(example 0.3))</p>");

                raw_data[0] = "RGBA";
                //opacitiy opravqne
            
                $('#color_R').focus();
                $('#opacity_color').focusout(function(){
                
                    raw_data[1] = parseInt($('#color_R').val());
                    raw_data[2] = parseInt($('#color_G').val());
                    raw_data[3] = parseInt($('#color_B').val());
                    raw_data[4] = parseInt($('#opacity_color').val());
               for(i=1;i <= 4;i++){
                        if (i < 4) {
                            if (raw_data[i] > 255) {
                                raw_data[i] = 255;
                            }
                        } else {
                            if (raw_data[i] > 1) {
                                raw_data[i] = 1;
                            }
                        }
                    }
               $('#sample').css('background-color',"rgba("+raw_data[1]+","+raw_data[2]+','+raw_data[3]+','+raw_data[4]+')');
                return_css_code_from_php(raw_data);
                });
               
            }else if(title_data == "Outline" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<p><input type='text' id='outline' /></p><p><select id='outline_select'><option id='none_outline' val='none'>None</option>\n\
                    <option id='hidden_outline' val='hidden'>Hidden</option><option id='dashed_outline' val='dashed'>Dashed</option><option id='dotted_outline' val='dotted'>Dotted</option><option id='solid_outline' val='solid'>Solid</option><option id='double_outline' val='double'>Double</option>\n\
<option id='groove_outline' val='groove'>groove</option><option id='ridge_outline' val='ridge'>Ridge</option><option id='inset_outline' val='inset'>Inset</option><option id='outset_outline' val='outset'>Outset</option><option id='inital_outline' val='initial'>Initial</option><option id='inherit_outline' val='inherit'>Inherit</option></select></div>");
                $('#sample').css('border','1px solid blue');
                $('#opp').hide();
                $('.visualization').css('width','100%');
               
                raw_data[0] = "outline";
                $('#outline').focus();
                $('#outline').focusout(function(){
                     $('#outline_select'),focus();
                });
                $('#outline_select').focusout(function(){
                    var outline_select = $('#outline_select').select().val().toLowerCase();
                    var outline_size = parseInt($('#outline').val());
                    var result = outline_size+'px '+outline_select+' red';
                    $('#sample').css('outline',result);
                    
                    raw_data[1] = outline_size;
                    raw_data[2] = outline_select;
                     return_css_code_from_php(raw_data);
                });
                
            }else if(title_data == "Font face" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<div id='font_face_selects'><input type='text' id='your_font_name' /> Enter your font name <select id='font_name'><option id='roboto' val='roboto'>Roboto</option><option id='montserrat' val='montserrat'>Montserrat</option><option id='bitter' val='bitter'>Bitter</option><option id='pt_sans' val='pt_sans'>PT Sans</option><option id='open_sans' val='open_sans'>Open Sans</option></select>\n\
                <select id='font_weight'><option>100</option><option>200</option><option>300</option><option>400</option><option>500</option><option>600</option><option>700</option><option>800</option><option>900</option></select></div>");
                $('#sample').css('width','100%').css('height','300px');
                $('#opp').hide();
                $('.visualization').css('width','100%');
                $('#sample').append('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.');
                
                raw_data[0] = "@font-face";
                $('#font_face_selects').focus();
                $('#font_weight').focusout(function(){
                    var your_font_name = $('#your_font_name').val();
                    var font_val = $('#font_name').select().val();
                    var font_weight = parseInt($('#font_weight').select().val());
                    $('#sample').css('font-weight',font_weight);
                    $('#sample').css('font-family',font_val);                    
                    raw_data[1] = your_font_name;
                    raw_data[2] = font_val;
                    raw_data[3] = font_weight;
                     return_css_code_from_php(raw_data);
                });
              
            }else if(title_data == "Transform" && clicked_val != title_data){
               
                clicked_val = title_data;
                $('#operations').html("<div id='transform_selects'><select id='transform_val'><option id='transform_matrix'>Matrix</option><option id='transform_translate'>Translate</option><option id='transform_scale'>Scale</option>\n\
                <option id='transform_rotate'>Rotate</option><option id='transform_skew'>Skew</option><option id='transform_prespective'>Prespective</option></select><div id='inner_transform'></div><div id='inputs_transform'></div></div>");
                $('#sample').css('background-color','blue');
                 $('#operations').append('<input type="button" id="finish_transformation" class="finish_transformation" value="Calculate..." />');
             
                $('#sample').css('border-left','2px solid red');
                $('#sample').css('border-right','2px solid yellow');
                raw_data[0] = "transform";
                var pix_deg = "";
                $('#transform_val').focus();
                $('#transform_val').focusout(function(){
                    var val_of_first_select = $(this).select().val().toLowerCase();
                    if(val_of_first_select == 'matrix'){
                       
                        $('#inner_transform').html("<select id='inner_transform_val'><option class='matrix'>(n,n,n,n,n,n)</option class='matrix3d'><option>3d(n,n,n,n,n,n,n,n,n,n,n,n,n,n,n,n)</option></select>");
                       raw_data[1] = "";
                       pix_deg = "";
                    }else if(val_of_first_select == 'translate'){
                          raw_data[1] = "";
                          pix_deg = "px";
                        $('#inner_transform').html("<select id='inner_transform_val'><option class='translate'>(x,y)</option><option class='translate3d'>3d(x,y,z)</option>\n\
                        <option class='translateX'>X(x)</option><option class='translateY'>Y(y)</option><option class='translateZ'>Z(z)</option></select>");
                    }else if(val_of_first_select == "scale"){
                        pix_deg = "";
                         $('#inner_transform').html("<select id='inner_transform_val'><option class='scale'>(x,y)</option><option class='scale3d'>3d(x,y,z)</option>\n\
                        <option class='scaleX'>X(x)</option><option class='scaleY'>Y(y)</option><option class='scaleZ'>Z(z)</option></select>");
                    raw_data[1] = "";
                    }else if(val_of_first_select == 'rotate'){
                        pix_deg = "deg";
                         $('#inner_transform').html("<select id='inner_transform_val'><option class='rotate'>(angle)</option><option class='rotate3d'>3d(x,y,z,angle)</option>\n\
                        <option class='rotateX'>X(angle)</option><option class='rotateY'>Y(angle)</option><option class='rotateZ'>Z(angle)</option></select>");
                    raw_data[1] = "";
                    }else if(val_of_first_select == 'skew'){
                        pix_deg = "deg";
                         $('#inner_transform').html("<select id='inner_transform_val'><option class='skew'>(x-angle,y-angle)</option><option class='skewX'>X(angle)</option>\n\
                        <option class='skewY'>Y(angle)</option></select>");
                        pix_deg = "";
                    }else if(val_of_first_select == 'prespective'){
                        raw_data[1] = "prespective";
                    }
                    $('#inner_transform_val').focus();
                    
                    
                $('#inner_transform_val').focusout(function(){
                    if(raw_data[1] != 'prespective'){
                    raw_data[1] = $('#inner_transform_val option:selected').attr('class');
                }
                
                        var inner_value = $('#inner_transform_val').select().val();
                        var number_of_inputs = inner_value.split('(');
                        var number_of_inner_values = number_of_inputs[1].split(',');
                        $('#inputs_transform').empty();
                        for(var i = 1;i <= number_of_inner_values.length;i++){
                           $('#inputs_transform').append('<input type="text" id="val_'+i+'" class="inputs" /> Value '+i); 
                        }
                        $('.inputs').first().focus();
                         
                    });
                       });
               
                $('.finish_transformation').on('click',function(){
                    
                    raw_data[2] = "(";
                    var inputs_length = $('.inputs').length;
                    $('.inputs').each(function(i){
                        
                        raw_data[2] += $(this).val() + pix_deg;
                        if(inputs_length != i+1 ){
                            
                            raw_data[2] += ",";
                        }
                        i++;
                    });
                        raw_data[2] += ")";
                        
                        $('#sample').css(raw_data[0],raw_data[1]+raw_data[2]);
                        
                  return_css_code_from_php(raw_data);
                  
                });
                
                
            }else if(title_data == "Transition" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<p><label for ='transition-delay' > transition-delay <input type='text' id='transition-delay' /></label></p><p><label for ='transition-duration' > transition-duration <input type='text' id='transition-duration' /></label></p><p><label for ='transition-property' > transition-property (such as 'width') <input type='text' id='transition-property' /></label></p><p><select id='transition-timing-function'><option class='ease'>ease</option><option class='linear'>linear</option><option class='ease-in'>ease-in</option><option class='ease-out'>ease-out</option><option class='ease-in-out'>ease-in-out</option><option class='cubic-bezier'>(n,n,n,n)</option></select></p><p><input type='button' id='button_for_transition' value='Calculate Transition'</p>");
                 $('#sample').css('background-color','blue');
                 
                $('#sample').css('border-left','2px solid red');
                $('#sample').css('border-right','2px solid yellow');
                $('#opp').hide();
                       
                 $('#button_for_transition').on('click',function(){
                raw_data[0] = "Transition";
                raw_data[1] = $('#transition-delay').val();
                raw_data[2] = $('#transition-duration').val();
                raw_data[3] = $('#transition-property').val();
                
                 if($('#transition-timing-function option:selected').text() == '(n,n,n,n)'){
                     raw_data[4] = "cubic-bezier(";
                     $('.cubic-bezier_values').each(function(i){
                         
                         if(i >= 3){
                            raw_data[4] += $(this).val();
                         }else{
                             raw_data[4] += $(this).val()+",";
                         }
                     });
                     raw_data[4] += ")";
                     }else{
                        raw_data[4] = $('#transition-timing-function option:selected').text();
                 
                    }
                   console.log(raw_data[1]);
                   $('#sample').css('transition-delay',""+raw_data[1]+'s');
                    console.log(raw_data[2]);
                    $('#sample').css('transition-duration',""+raw_data[2]+'s');
                    console.log(raw_data[3]);
//                   if($('#transition-timing-function option:selected').text() == '(n,n,n,n)'){
                         console.log(raw_data[4]);
//                    }else{
                        $('#sample').css('transition-timing-function',""+raw_data[4]);
//                    }
                return_css_code_from_php(raw_data);
                });
                $('#transition-timing-function ').click(function(){
                    if($('#transition-timing-function option:selected').text() != '(n,n,n,n)'){
                    $('#cubic_inputs_holder').remove();
                }
               });
              $('#transition-timing-function').click(function(){
                    console.log($('#transition-timing-function option:selected').text());
                 if($('#transition-timing-function option:selected').text() == '(n,n,n,n)'){
                    $('#transition-timing-function').parent().append("<div id='cubic_inputs_holder'><p>Values for cubic-bezier</p><input class='cubic-bezier_values' type='text'/><input class='cubic-bezier_values' type='text'/><input class='cubic-bezier_values' type='text'/><input class='cubic-bezier_values' type='text'/></div>");
                 }
                    
               
                 });
                $('#sample').css('transition-delay',raw_data[1]+'s');
                $('#sample').css('transition-duration',raw_data[2]+'s');
                $('#sample').addClass('transition_hover_efect');
                
                $('.transition_hover_efect').hover(function(){
                   
                     $('.transition_hover_efect').css(''+raw_data[3],'500px');
                 });
                         $('.transition_hover_efect').mouseout(function(){
                     $('.transition_hover_efect').css(''+raw_data[3],'150px');
                 });
                  return_css_code_from_php(raw_data);
               
            }else if(title_data == "Box sizing" && clicked_val != title_data){
                 clicked_val = title_data;
                $('#operations').html("<div id='box_sizing'>Enter width.(value is in %)<input type='text' id='width_box_sizing' value=''/><select id='box-sizing'><option class='content-box' val='content-box'>content-box</option><option class='border-box' val='border-box'>border-box</option></select><select id='box-sizing-float'><option class='float-left' val='left'>left</option><option class='float-right' val='right'>right</option></select></div>");
                $('#sample').css('width','100%').css('height','300px');
                $('#sample').html('<div class="box" style="background-color:red;width:100px;height:100px;border:1px solid black;"></div><div class="box" style="background-color:red;width:100px;height:100px;border:1px solid black;"></div>');
                $('#opp').hide();
                $('#width_box_sizing').focus();
                $('#width_box_sizing').focusout(function(){
                    $('#box-sizing').focus();
                });
                $('#box-sizing').focusout(function(){
                    $('#box-sizing-float').focus();
                });
                $('#box-sizing-float').focusout(function(){
                     raw_data[0] = "box-sizing";
                raw_data[1] = $('#width_box_sizing').val();
                
                raw_data[2] = $('#box-sizing option:selected').val();
                raw_data[3] = $('#box-sizing-float option:selected').val()   
                    console.log(raw_data[0]+"/"+raw_data[2]+"/"+raw_data[1]);
                    $('.box').css('width',raw_data[1]+"%");
                    $('.box').css(""+raw_data[0],""+raw_data[2]);
                    $('.box').css('float',raw_data[3]+"");
                    
                 return_css_code_from_php(raw_data);
                });
               
            }else if(title_data == "Box resize" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<p><select id='resize'><option class='both'>both</option><option  class='horizontal'>horizontal</option><option class='vertical'>vertical</option></select></p>");
                $('#sample').css('width','40%').css('height','80px').css('border','1px solid lightblue');
                $('#opp').hide();
                $('#sample').append('<p>This is the resizable div.To activate resizing make a choice of the type of resizing you want.</p>');
                $('.visualization').css('width','100%');
               
                raw_data[0] = "Box_resize";
                $('#sample').css('overflow','auto');
                
                $('#resize').click(function(){
                    raw_data[1] = $('#resize option:selected').val();
                    $('#sample').css('resize',raw_data[1]+'');
                    return_css_code_from_php(raw_data);
                });
                
                
            }else if(title_data == "Text shadow" && clicked_val != title_data){
               clicked_val = title_data;
                $('#operations').html("<div><p><input type='text' class='h-shadow-text' />Horizontal Text Shadow Value</p><p><input type='text' class='v-shadow-text' />Vertical Text Shadow Value</p>\n\
                <p><input type='text' id='blur-radius' />Blur Radius Value</p><div id='manual_color_text'></div><p><select id='text-shadow-color'><option class='text-red'>red</option>\n\
                <option class='text-blue'>blue</option><option class='text-green'>green</option><option class='text_insert_color_hex'>#color</option></select></p><p><input type'button' id='calculate_new_shadow' style='appearance:button;' value='Calculate New Shadow'</p></div>");
                 $('#sample').append('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.');
               
                $('#sample').css('width','80%').css('height','300px');
                $('#sample').css('border','1px solid lightblue');
                $('#opp').hide();
                $('.visualization').css('width','100%');
                raw_data[0] = "text-shadow";
                $('#text-shadow-color').click(function(){
                   
                     if($('#text-shadow-color option:selected').val() == '#color'){
                        if($('#manual_color').length == 0){
                      $('#manual_color_text').html("<p id='remove-id'><input type='text'  id='text_hex_color' value='' />Enter a Color.(example:#88888)</p>");
                        
                        }
                         raw_data[4] = $('#text_hex_color').val();
                     
                   }else{
                       $('#remove-id').remove();
                       raw_data[4] = $('#text-shadow-color option:selected').val();
                   }
                   
                   
                });
                $('#calculate_new_shadow').click(function(){
                     raw_data[1] = $('.h-shadow-text').val() +"px";
                    raw_data[2] = $('.v-shadow-text').val()+ "px";
                    raw_data[3] = $('#blur-radius').val() + 'px';
                     if($('#text-shadow-color option:selected').val() == '#color'){
                               raw_data[4] = $('#text_hex_color').val();
                     
                   }else{
                       $('#remove-id').remove();
                       raw_data[4] = $('#text-shadow-color option:selected').val();
                   }
                   
                     return_css_code_from_php(raw_data);
                   $('#sample').css(""+raw_data[0],""+raw_data[1]+" "+raw_data[2]+" "+raw_data[3]+ " "+ raw_data[4]);
                });
              
               
            }else if(title_data == "Multiple Columns" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<p><input type='text' id='mult_column' /></p>");
                $('#sample').css('width','100%').css('height','300px');
                $('#opp').hide();
                $('.visualization').css('width','100%');
                $('#sample').append('Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.');
                
                raw_data[0] = "Multiple Columns";
                $('#mult_column').focus();
                $('#mult_column').focusout(function(){
                    var mult_column = parseInt($('#mult_column').val());
                    $('#sample').css('column-count',mult_column);
                    if(mult_column > 10){
                        mult_column = 10;
                    }
                    raw_data[1] = mult_column;
                    return_css_code_from_php(raw_data);
                });
               
            }else if(title_data == "Box Shadow" && clicked_val != title_data){
                clicked_val = title_data;
                $('#operations').html("<div><select id='box-shadow-color'><option class='red'>red</option>\n\
                <option class='blue'>blue</option><option class='green'>green</option><option class='insert_color_hex'>#color</option></select><p><input type='text' class='h-shadow' />Horizontal Shadow Value</p><p><input type='text' class='v-shadow' />Vertical Shadow Value</p>\n\
                <p><input type='text' id='blur' />Blur Value</p><p><input type='text' id='spread'/>Spread Value</p><p><input type='checkbox' id='check_for_inset' name'check_for_inset'/>Check for Inset</p><p></p>\n\
                </div>");
                $('#sample').css('width','80%').css('height','300px');
                $('#sample').css('border','1px solid lightblue');
                $('#opp').hide();
                $('.visualization').css('width','100%');
                raw_data[0] = "box-shadow";
                $('#box-shadow-color').click(function(){
                    raw_data[1] = $('.h-shadow').val() +"px";
                    raw_data[2] = $('.v-shadow').val()+ "px";
                    raw_data[3] = $('#blur').val() + 'px';
                    raw_data[4] = $('#spread').val() + "px";
                   
                    if($('#check_for_inset').prop('checked')){
                        raw_data[6] = 'inset';
                    }else{
                        raw_data[6] = '';
                    }
                    if($('#box-shadow-color option:selected').val() == '#color'){
                        if($('#manual_color').length == 0){
                      $('#operations').prepend("<p id='manual_color'><input type='text' id='hex_color' value='' />Enter a Color.(example:#88888)</p>");
                        }
                         raw_data[5] = $('#hex_color').val();
                     
                   }else{
                       raw_data[5] = $('#box-shadow-color option:selected').val();
                   } 
                    $('#sample').css(''+raw_data[0],raw_data[1]+" "+raw_data[2]+" "+raw_data[3]+" "+raw_data[4]+" "+raw_data[5] + " " +raw_data[6]);
                return_css_code_from_php(raw_data);
                });
                $("#operations").append("<input type='button' id='calculate' value='Calculate' />");
                $('#calculate').click(function(){
                      raw_data[1] = $('.h-shadow').val() +"px";
                    raw_data[2] = $('.v-shadow').val()+ "px";
                    raw_data[3] = $('#blur').val() + 'px';
                    raw_data[4] = $('#spread').val() + "px";
                   
                    if($('#check_for_inset').prop('checked')){
                        raw_data[6] = 'inset';
                    }else{
                        raw_data[6] = '';
                    }
                    if($('#box-shadow-color option:selected').val() == '#color'){
                        if($('#manual_color').length == 0){
                      $('#operations').prepend("<p id='manual_color'><input type='text' id='hex_color' value='' />Enter a Color.(example:#88888)</p>");
                        }
                         raw_data[5] = $('#hex_color').val();
                     
                   }else{
                       raw_data[5] = $('#box-shadow-color option:selected').val();
                   } 
                    $('#sample').css(''+raw_data[0],raw_data[1]+" "+raw_data[2]+" "+raw_data[3]+" "+raw_data[4]+" "+raw_data[5] + " " +raw_data[6]);
                
                    return_css_code_from_php(raw_data);
                });
               
               
            }else if(title_data == 'Border radius' && clicked_val != title_data){
                clicked_val = title_data;
                $("#operations").html("<p><input type='text' id='bord_rad' /></p>");
                $('#sample').css('width','30%');
                
                $('#sample').css('border-style','solid').css('border-width','2px').css('border-color','black');
                raw_data[0] = "Border radius";
                $('#bord_rad').focus();
                $('#bord_rad').focusout(function(){
                    var bord_rad = parseInt($('#bord_rad').val());
                    $('#sample').css('border-radius',bord_rad+'%');
                    if(bord_rad > 100){
                        bord_rad = 100;
                    }
                    raw_data[1]=bord_rad;
                    
                   return_css_code_from_php(raw_data);
                });
                
            }
         
          
             
        });
    
        
      
    });
    
    
      function return_css_code_from_php(raw_data){
          console.log('da');
//          if(raw_data[0] == "RGBA"){
//          raw_data[1] = parseInt($('#color_R').val());
//                    raw_data[2] = parseInt($('#color_G').val());
//                     raw_data[3] = parseInt($('#color_B').val());
//                     raw_data[4] = parseInt($('#opacity_color').val());
//               for(i=1;i <= 4;i++){
//                   if(raw_data[i] > 255){
//                       raw_data[i] = 255;
//                   }
//               }      
//          }
           var data4 = {
                  'ajax_data_s': raw_data
                };
                $.post('php/ajaxPHP.php', data4, function (response) {
                    $('#code_view').html(response);
                });
        }
      $('.ajax').click(function(e){
    		$('#maincontent').load('editdetails.php');
    		return false;
    	});
        
};


