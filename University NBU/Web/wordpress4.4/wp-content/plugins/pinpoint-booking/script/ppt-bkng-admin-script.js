jQuery(document).ready(function ($) {
    clicky_clicks();
    var salon_two = '<div class="step_dos"><p>Choose rendered services</p><br/><input type="checkbox" value="haircut" >Haircut</input><br/><input type="checkbox" value="manicure" >Manicure</input><br/><input type="text" value="Other"></input><input type="button" value="Add more"></input>' +
            '<input type="submit" value="Update"></input><br/></div>';
    var other_two = '<div class="step_dos"><p>Choose rendered services</p><br/><input type="text" value="Other"></input><input type="button" value="Add more"></input><input type="submit" value="Update"></input><br/></div>';
    var bar_two = '<div class="step_dos"><p>Choose rendered services</p><br/><input type="checkbox" value="table" >Table Reservation</input><br/><input type="checkbox" value="bar" >Bar reservation</input><br/><input type="text" value="Other"></input><input type="button" value="Add more"></input>' +
            '<input type="submit" value="Update"></input><br/></div>';
    var hotel_two = '<div class="step_dos"><p>Choose rendered services</p><br/><input type="checkbox" value="one_bed" >One bed apartment</input><br/><input type="checkbox" value="two_bed" >Two bed apartment</input><br/><input type="checkbox" value="delux" >Delux apartment</input><br/><input type="text" value="Other"></input><input type="button" value="Add more"></input>' +
            '<input type="submit" value="Update"></input><br/></div>';

    $(document).on('focus', 'input', function () {
        // clears input fields on click
        if ($(this).attr('type') == 'text') {

            var focus_val = $(this).val();

            if (focus_val != '') {
                $(this).val('');
                $(this).on('focusout', function () {

                    if ($(this).val() == '') {

                        $(this).val(focus_val);
                    }
                });
            }
        }
    });
    var selected = new Array;

    function step_dos(sel) {
        $('.step_uno input, .step_uno select').attr('disabled', 'disabled');
        if (sel[0] == 'select_other') {

            $('.wrap').append(other_two);
            clicky_clicks();

        } else if (sel[0] == 'beauty_salon') {

            $('.wrap').append(salon_two);
            clicky_clicks();

        } else if (sel[0] == 'bar_restaurant') {

            $('.wrap').append(bar_two);
            clicky_clicks();

        } else if (sel[0] == 'hotel') {

            $('.wrap').append(hotel_two);
            clicky_clicks();
        }
    }

    function step_three(sel) {

        var lngth = sel.length;

        $('.wrap').append('<div class="step_three">' +
                '<p>Enter your employee names</p>' +
                '<br/><input type="text" value="Other"></input><select></select><input type="button" value="Add more"></input>' +
                '<input type="submit" value="Update"></input><br/>' +
                '</div>');

        for (var i = 0; i < lngth; i++) {
            $('.step_three select').append('<option value="' + sel[i] + '">' + sel[i] + '</option>');
        }

        clicky_clicks();
    }

    function step_quatro(sel) {
        $('.step_three input, .step_three select').attr('disabled', 'disabled');

        $('.wrap').append(
                '<div class="step_quatro">' +
                '<p>Enter your working hours for each employee position.<br/>If it is the same you still need to input it seperately.</p><br/>' +
                '<input type="text" name="from" value="From:"></input><input type="text" name="to" value="To:"></input><p>For the position of :</p><select class="pos_sel">'+$('.step_three select').html()+'</select>' +
                '<input type="button" value="Add more"></input><input type="submit" value="Update"></input><br/>' +
                '</div>'
                );

        clicky_clicks();
    }
    
    function save_data(sel){
        $('.step_quatro input, .step_quatro select').attr('disabled', 'disabled');
        var json_arr = JSON.stringify(sel);
        
        
        $.ajax({
            type: 'POST',
            url: pipointVars.ajaxUrlz,
            data: {action: 'save_settings', settings: json_arr},
            success: function (data) {
                data = data.slice(0,-1);
                var deita = jQuery.parseJSON(data);
                saving(deita);
            },
            error: function (errorThrown) {
                alert(errorThrown);
            }
        });
    }
    
    function edit_page (dt) {
        var count_holder = new Array;
        dt.each(function( index , value ){
            count_holder.push(index);
            alert(count_holder);
        });
        
        $('.wrap').append(
                '<div class="edit_page">'+
                ''
                );
        
    }
    
    function saving (dtt) {
        
        $('.wrap').append('<div class="saving"><p>Saving your data</p></div>');
        setTimeout(function(){
            $('.wrap').html('');
        },1000);
        edit_page(dtt);
    }
    

    function clicky_clicks() {

        $('input').on('click', function (e) {
            //click handlers
            e.preventDefault();

            var parent;

            var thiss = $(this).val();
            var this_class = $(this).attr('class');
            parent = $(this).parent().attr('class');

            if (parent == 'step_uno' && thiss == 'Update') {
                var step_one = new Array;

                if (parent == 'step_uno') {

                    var selected1 = $('option:selected').attr('class');
                    step_one.push(selected1);
                    step_dos(selected);

                    $('.' + parent + ' input[type="text"]').each(function () {
                        var dddsssaaa = $(this).val();
                        step_one.push(dddsssaaa);
                    });
                    selected.push(step_one);
                    step_dos(step_one);
                }
            }

            //check if possible and create new fields on some options
            if (parent == 'step_dos') {
                if (thiss == 'Add more' && $(this).attr('type') == 'button') {
                    new_field(parent);
                }
            } else if (parent == 'step_three' || parent == 'step_quatro' ) {
                if (thiss == 'Add more' && $(this).attr('type') == 'button') {
                    new_field_select(parent);
                }
            }
            //updates the current option and sends it to the back-end
            //only the options that have more then one input field get into an array
            if (thiss == 'Update' && parent == 'step_dos') {
                var step_duo = new Array;
                $('.step_dos input, .step_dos select').attr('disabled', 'disabled');
                $('.' + parent + ' input[type="text"]').each(function () {
                    var temporary_variable = $(this).val();
                    step_duo.push(temporary_variable);
                    console.log(temporary_variable);
                });
                selected.push(step_duo);
                step_three(step_duo);
            }
            if (thiss == 'Update' && parent == 'step_three') {
                var step_tri = new Array;

                $('.' + parent + ' input[type="text"]').each(function () {
                    step_tri.push($(this).val() + '_' + $(this).next().find('option:selected').text());
                });
                selected.push(step_tri);
                console.log(selected);
                step_quatro(step_tri);
            }
            if (thiss == 'Update' && parent == 'step_quatro') {
                var step_four = new Array;
                
                $('.pos_sel').each(function () {
                    var pos_sel = $(this).find('option:selected').val();
                    var to = $(this).prev().prev().val();
                    var from = $(this).prev().prev().prev().val();
                    step_four.push(pos_sel + '_' + from + '_' + to);
                });
                
                selected.push(step_four);
                
                save_data(selected);
            }
        });

        function new_field(a) {
            //creates a new field in the selected option(if possible)
            var val;
            if (a == 'step_dos') {
                val = 'Other';
            } else if (a == 'empl_pos') {
                val = 'Employee positions';
            }
            $('.' + a).append(
                    '<input class="' + a + '_field" type="text" value="' + val + '"></input><br/>'
                    );
        }

        function new_field_select(a) {
            if (a != 'step_quatro') {
                var html_holder = $('.' + a + ' select').html();
                $('.' + a + '').append('<input class="' + a + '_field" type="text" value="Name"></input><select>' + html_holder + '</select><br/>');
            } else if (a == 'step_quatro') {
                var html_holder = $('.step_three select').html();
                $('.' + a + '').append('<input class="' + a + '_field" name="from" type="text" value="From:"></input><input type="text" name="to" value="To:"></input><p>For the position of :</p><select class="pos_sel">' + html_holder + '</select><br/>');
            }
        }

    }
    



});