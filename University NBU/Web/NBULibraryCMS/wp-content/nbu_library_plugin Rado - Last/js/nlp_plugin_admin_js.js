
//Alex - Reservation page
//Information - tab
jQuery(document).ready(function ($) {

    //Calendar Week Names
    var week_names = '<div class="week_day_names">П</div>' +
            '<div class="week_day_names">В</div>' +
            '<div class="week_day_names">С</div>' +
            '<div class="week_day_names">Ч</div>' +
            '<div class="week_day_names">П</div>' +
            '<div class="week_day_names">С</div>' +
            '<div class="week_day_names">Н</div>';
    $('#nlp_week_names').html(week_names);

    //Reservation info
    var nlp_reservation_info = 'ВАЖНО!!! <br>' +
            'Моля заявката да бъде подавана поне два дена предварително. <br>' +
            'В момента на подаване на заявката се информирате за датите, на които не е възможно да ползвате залата. <br>' +
            'Графикът за семинарната зала се изготвя съобразно работното време на библиотеката: <br><br>' +
            'понеделник - петък - от 08:00 до 21:00 ч. <br>' +
            'събота и неделя - от 09:00 до 17:30 ч. <br><br>' +
            'Официални празници и съответно неработни дни са: 1 януари, 3 март, 1 май, 6 май, 24 май, 6 септември, 22 септември, 1 ноември, а също великденските и коледните празнични дни <br><br>' +
            'Библиотеката не поема ангажименти за потвърждение на проведени часове в залата <br>'+
            'Необходимо е да попълните всички полета обозначение със сивола *';

    $('#reservation_info').html(nlp_reservation_info);

    // to display the content
    jQuery('.nlp_day_selected').click(function () {
        //Get`s the hole contetnt without newlines
        //var contents = $(this).children('.calendar_day_container').text();

        var contents = '';
        var $hidden = $(this).find('.hidden_info');
        $hidden.each(function () {
            var $el = $(this),
                    time = $el.prev().text(), // time is in previous element
                    title = $el.find('.hidden_title').text(), // title is a child
                    description = $el.find('.hidden_description').text();// description is a child

            contents += time + ' ' + title + ' ' + description + '<br>';
        });
        $('#nlp_show_content').show();
        $('#nlp_show_content').html("<p>" + contents + "</p><button id='close_btn' value='Затвори' name='close_btn'>Затвори</button>");
        $('#nlp_show_content').css({"width": "60%",
            "height": "auto", "min-height": "480px",
            "position": "absolute", "top": "0", "left": "0", "right": "0", "bottom": "0",
            "margin": "auto"});
        $('#nlp_show_content p').css({"background": "yellow", "border-radius": "20px", "padding": "20px"});
        $('#nlp_show_content button').css({"float": "right", "border-radius": "20px", "padding": "5px"});
        $('#close_btn').on("mouseenter mouseleave", function () {
            $('#close_btn').css({"cursor": "pointer"});
        });
    });

    $(document).on('click', '#close_btn', function () {
        $('#nlp_show_content').hide();
    });


//Disable button if text-input is empty

    var value_email = 0;
    var value_title = 0;
    
//    value_email = document.getElementById('email_verification').value.length;
//    value_title = document.getElementById('name_of_lection').value.length;

//    if (value_email < 6 && value_title < 4) {
//        document.getElementById('nlp_reserver_chosen_hours').disabled = true;
//    } else {
//        document.getElementById('nlp_reserver_chosen_hours').disabled = false;
//    }


    $(document).on('hover', '#nlp_reserver_chosen_hours', function () {
        value_email = document.getElementById('email_verification').value.length;
        value_title = document.getElementById('name_of_lection').value.length;
        if (value_email < 6 || value_title < 4) {
            document.getElementById('nlp_reserver_chosen_hours').disabled = true;

            if (value_title < 4) {
                $('#name_of_lection').css({"border-color": "red"});
            }
            else {
                $('#name_of_lection').css({"border-color": "silver"});
            }
            if (value_email < 6) {
                $('#email_verification').css({"border-color": "red"});
                console.log(value_email);
            } else {
                $('#email_verification').css({"border-color": "silver"});
                console.log(value_email);
            }
        } else {
            $('#email_verification').css({"border-color": "silver"});
            $('#name_of_lection').css({"border-color": "silver"});
            document.getElementById('nlp_reserver_chosen_hours').disabled = false;
        }
    });
    
});