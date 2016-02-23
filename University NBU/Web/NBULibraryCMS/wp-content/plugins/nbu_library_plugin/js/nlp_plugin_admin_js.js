
//Alex - Reservation page
//Information - tab
jQuery(document).ready(function ($) {
    $('#loading').hide();
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
            'Библиотеката не поема ангажименти за потвърждение на проведени часове в залата <br>' +
            'Необходимо е да попълните всички полета обозначение със сивола *';
    $('#reservation_info').html(nlp_reservation_info);
    // to display the content
    $(document).on('click', '.nlp_day_selected', function () {
//Get`s the hole contetnt without newlines
//var contents = $(this).children('.calendar_day_container').text();

        var contents = '';
        var $hidden = $(this).find('.hidden_info');
        $hidden.each(function () {
            var $el = $(this),
                    time = $el.prev().text(), // time is in previous element
                    title = $el.find('.hidden_title').text(), // title is a child
                    description = $el.find('.hidden_description').text(), // description is a child
                    mail = $el.find('.guest_info_mail').text(), //E-mail of guest witch make reservation
                    tech = $el.find('.info_projector').text(); //Tech - yes or no
            if (description.length > 0) {
                title = title + "<br />";
            }
            if (mail.length > 0) {
                description = description + "<br />";
                mail = "E-mail: " + mail;
            }
            if (tech.length > 0) {
                mail = mail + "<br />";
            }
            contents += "<b>" + time + '</b> ' + title + ' ' + description + ' ' + mail + ' ' + tech + '<br><br>';
        });
        $('#nlp_show_content').show();
        $('#nlp_show_content').html("<p>" + contents + "</p><button id='close_btn' value='Затвори' name='close_btn'>Затвори</button>");
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
    var description = 0;
    $(document).on('hover', '#nlp_reserver_chosen_hours', function () {
        value_email = document.getElementById('email_verification').value.length;
        value_title = document.getElementById('name_of_lection').value.length;
        description = $(".nlp_event_information").val().length;// Min 30 symbola
        if (value_email < 6 || value_title < 4) {
            document.getElementById('nlp_reserver_chosen_hours').disabled = true;
            if (value_title < 4) {
                $('#name_of_lection').css({"border-color": "red"});
            } else {
                $('#name_of_lection').css({"border-color": "silver"});
            }
            if (value_email < 6) {
                $('#email_verification').css({"border-color": "red"});
                document.getElementById('nlp_reserver_chosen_hours').disabled = true;
            } else {
                if (checkEmail()) {
                    $('#email_verification').css({"border-color": "silver"});
                    document.getElementById('nlp_reserver_chosen_hours').disabled = false;
                }
            }
        } else {
            if (checkEmail()) {
                $('#email_verification').css({"border-color": "silver"});
            }
            $('#name_of_lection').css({"border-color": "silver"});
            document.getElementById('nlp_reserver_chosen_hours').disabled = false;
        }
        if (description < 40) {
            document.getElementById('nlp_reserver_chosen_hours').disabled = true;
            $('.nlp_event_information').css({"border-color": "red"});
        } else {
            $('.nlp_event_information').css({"border-color": "green"});
            document.getElementById('nlp_reserver_chosen_hours').disabled = false;
        }

        function checkEmail() {

//Verification E-mail
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(document.getElementById('email_verification').value)) {
                alert('Please provide a valid email address');
                $('#email_verification').focus;
                console.log("It`s false email");
                return false;
            } else {
                console.log("It`s real email");
                return true;
            }
        }
    });
    $(document).on('click', '.nlp_day_selected', function () {
        var day_number = $(this).html();
        var month_selected = $('.nlp_selected_month_calendar').html();
        if (day_number == 1 && month_selected == "Яну" || day_number == 3 && month_selected == "Март" || day_number == 1 && month_selected == "Май" || day_number == 6 && month_selected == "Май" ||
                day_number == 24 && month_selected == "Май" || day_number == 6 && month_selected == "Сеп" || day_number == 22 && month_selected == "Сеп" || day_number == 1 && month_selected == "Ноем" ||
                day_number == 24 && month_selected == "Дек" || day_number == 25 && month_selected == "Дек" || day_number == 26 && month_selected == "Дек" || day_number == 31 && month_selected == "Дек") {
            alert("Това е официален не работен ден.");
            window.location.reload();
        }
    });
});


