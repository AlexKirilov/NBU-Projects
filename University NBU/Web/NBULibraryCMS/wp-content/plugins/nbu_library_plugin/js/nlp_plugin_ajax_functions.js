/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*TODO: Problem pri week_view:
 *          1: Maj mesec davadefect
 *          2: Pri smqna na godinata dannite ot 1 den ot meseca ne se vijdat
 *          */
/*TODO: Year_view :
 *          1:  data na denq da na meseca da se smeni s pulnata data 
 *          2:  da se podredi izgleda na dannite
 *          3:  da se dobavi edit na praznite dni  - MOJE BI E LOSHA IDEQ 
 *          4:  da se premahnat butonite za sledvashta i predishna godina
 *          */
/*TODO: Upload .pdf and ect.    */

jQuery(document).ready(function ($) {
    $('#loading').hide();
    $('#npl_new_form_submit').click(function () {
        var npl_plugin_name_of_category = $('.npl_plugin_name_of_category').val();

        var data1 = {
            'action': 'npl_new_hall_submit',
            'npl_plugin_name_of_category': npl_plugin_name_of_category,
        };
        $.post(nlp_ajax.ajaxurl, data1, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_create_hall_wrapper').append(response_cleaned);
        });
    });


    $('#nlp_add_end_time_for_post').click(function () {

        var nlp_meta_data_for_end_time = [];
        nlp_meta_data_for_end_time[0] = "";
        nlp_meta_data_for_end_time[1] = "";
        nlp_meta_data_for_end_time[2] = "";
        nlp_meta_data_for_end_time[3] = "";
        nlp_meta_data_for_end_time[4] = "";
        nlp_meta_data_for_end_time[5] = "";
        nlp_meta_data_for_end_time[6] = "";
        nlp_meta_data_for_end_time[7] = "";
        nlp_meta_data_for_end_time[8] = "";
        nlp_meta_data_for_end_time[9] = "";
        nlp_meta_data_for_end_time[10] = "";
        nlp_meta_data_for_end_time[11] = "";
        nlp_meta_data_for_end_time[12] = "";
        nlp_meta_data_for_end_time[13] = "";
        $('.nlp_blocks').each(function (i) {

            if ($(this).prop('checked') && $(this).parent('div').hasClass('nlp_reserved_hour') != true) {
                nlp_meta_data_for_end_time[i] = i;
            }
        });

        var npl_meta_data_post_id = $('.nlp_html_for_meta_box_end_time').attr('id').split("_");
        var npl_split_id = npl_meta_data_post_id[1];
        var data2 = {
            'action': 'nlp_update_post_end_time',
            'nlp_post_variable_send': nlp_meta_data_for_end_time,
            'nlp_post_variable_id': npl_split_id
        };
        $.post(nlp_ajax.ajaxurl, data2, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_responce_of_made_actiona').html(response_cleaned);

        });
    });
    $('.nlp_checked_css').css('border', '1px solid lightblue');
    $('.nlp_checked_css').css('background', 'lightgreen');
    $('.nlp_unchecked_css').css('border', '1px solid lightgreen');
    $('.nlp_unchecked_css').css('background', 'lightblue');

    $(document).on('click', '.nlp_checked_css', function () {

        if ($(this).index() != 0) {
            $(this).children('input').prop('checked', false);
            $(this).addClass('nlp_unchecked_css').removeClass('nlp_checked_css');


            $(this).css('border', '1px solid lightblue');
            $(this).css('background', 'lightgreen');
            $('#nlp_add_end_time_for_post').trigger('click');
        }
    });
    $(document).on('click', '.nlp_unchecked_css', function () {

        $(this).children('input').prop('checked', true);
        $(this).addClass('nlp_checked_css').removeClass('nlp_unchecked_css');
        $(this).css('border', '1px solid lightgreen');
        $(this).css('background', 'lightblue');
        $('#nlp_add_end_time_for_post').trigger('click');

    });
    $(document).on("change", '#nlp_select_hall', function () {
        var value_of_chosen = $('#nlp_select_hall').find(":selected").val();
        if ($('.nlp_selected_month_calendar').length > 0) {
            if ($('.nlp_day_currently_selected').length > 0) {
                var unsplited_day = $('.nlp_day_currently_selected').text();
                var selected_day = unsplited_day.replace(/[^a-z0-9\s]/gi, '') - 1;
            }
            var selected_month = $('.nlp_selected_month_calendar').index();
        }
        var data3 = {
            'action': 'nlp_ajax_setter_for_reservation',
            'nlp_value_integer_send': value_of_chosen
        };
        $.post(nlp_ajax.ajaxurl, data3, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_returned_data').html(response_cleaned);
        });

        if (selected_day) {
            $('.nlp_day_selected').eq(selected_day).trigger('click');
        } else if (selected_month) {
            $('.nlp_possible_month').eq(selected_month).trigger('click');
        } else if (selected_day && selected_month) {
            $('.nlp_possible_month').eq(selected_month).trigger('click');
            $('.nlp_day_selected').eq(selected_day).trigger('click');
        }
    });
    $(document).on('click', '.nlp_possible_month', function () {
        $('.nlp_possible_month').each(function () {
            if ($(this).hasClass('nlp_selected_month_calendar')) {
                $(this).removeClass('nlp_selected_month_calendar');
            }
        });
        $(this).addClass('nlp_selected_month_calendar');
        var value_of_chose = $('.nlp_selected_month_calendar').attr('id');

        var value_of_chosen_year = $('#nlp_year').find(':selected').val();
        var data4 = {
            'action': 'nlp_day_of_month',
            'nlp_value_integer_month': value_of_chose,
            'nlp_value_integer_year': value_of_chosen_year
        };
        $.post(nlp_ajax.ajaxurl, data4, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_days_of_month').html(response_cleaned);
        });

    });
    $('.nlp_possible_month').eq(0).trigger('click');
    $(document).on('change', '#nlp_year', function () {
        var value_of_chose = $('.nlp_selected_month_calendar').attr('id');
        var value_of_chosen_year = $('#nlp_year').find(':selected').val();

        var data4 = {
            'action': 'nlp_day_of_month',
            'nlp_value_integer_month': value_of_chose,
            'nlp_value_integer_year': value_of_chosen_year
        };
        $.post(nlp_ajax.ajaxurl, data4, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_days_of_month').html(response_cleaned);

        });
        //nova funkciq za smqna na mesecite spored nova godina 


        var data223 = {
            'action': 'nlp_months_front_change',
            'nlp_value_integer_year': value_of_chosen_year
        };
        $.post(nlp_ajax.ajaxurl, data223, function (response) {
            var response_cleaned = response.slice(0, -1);

            $('#nlp_month').html(response_cleaned);
            if (value_of_chose == undefined) {
                $('.nlp_possible_month').eq(0).trigger('click');

            } else {

                if (value_of_chosen_year == $('#nlp_year').children().eq(0).val()) {
                    $('.nlp_possible_month').eq(0).trigger('click');
                } else {
                    $('.nlp_possible_month').eq(value_of_chose - 1).trigger('click');
                }
            }
        });

    });
    $(document).on('click', '.nlp_day_selected', function () {
        $('.nlp_day_selected').each(function () {
            if ($(this).hasClass('nlp_day_currently_selected')) {
                $(this).removeClass('nlp_day_currently_selected');
            }
        });
        $(this).addClass('nlp_day_currently_selected');
        var value_of_chosen_month = $('.nlp_selected_month_calendar').attr('id');
        var value_of_chosen_year = $('#nlp_year').find(':selected').val();
        var value_of_chose_day = $(this).text();
        var value_of_chosen_hall = $('#nlp_select_hall').find(":selected").val();
        var data5 = {
            'action': 'nlp_day_ajax_reservate_posts',
            'nlp_value_integer_month': value_of_chosen_month,
            'nlp_value_integer_day': value_of_chose_day,
            'nlp_value_integer_year': value_of_chosen_year,
            'value_of_chosen_hall': value_of_chosen_hall
        };
        $.post(nlp_ajax.ajaxurl, data5, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_taken_hours_for_day').html(response_cleaned);
        });

    });
    $(document).on('click', '.nlp_free_hours', function () {
        var checked_checkbox = $(this).children('input').prop('checked');
        if (checked_checkbox) {
            $(this).children('input').prop('checked', false);
            $(this).removeClass('nlp_checked_style');
        } else {
            $(this).children('input').prop('checked', true);
            $(this).addClass('nlp_checked_style');
        }
    });

    $(document).on('click', '#nlp_reserver_chosen_hours', function () {
        var value_of_chosen_month = $('.nlp_selected_month_calendar').attr('id');
        var value_of_chosen_year = $('#nlp_year').find(':selected').val();
        var value_of_chose_day = $('.nlp_day_currently_selected').text();
        var value_of_chosen_hall = $('#nlp_select_hall').find(":selected").val();
        var value_of_name = $('.nlp_name_of_lection').val();
        var value_of_info = $('.nlp_event_information').val();
        var value_of_confirmation_email = $('.nlp_email_verification').val();
        var value_of_repeat = $('.nlp_repeat_options').find(":selected").val();
        var value_of_repeating_months = $('#nlp_each_month').find(":selected").val();
        var value_of_week_repeting = $('#nlp_each_week').find(":selected").val();
        var value_of_nlp_repeat_if_free = "No";
        if ($('#tehnika_meta_box').attr('checked')) {
            var value_use_of_tech = 1;
        } else {
            var value_use_of_tech = "999";
        }

        /*18.08.2015*/

        if ($('.nlp_repeat_if_free').attr('checked')) {
            var value_of_nlp_repeat_if_free = "Yes";
        }
        var value_number_of_months_to_repeat = $('.nlp_number_of_months').val();
        var nlp_meta_data_for_day_of_week = [];
        $('.nlp_each_week_day_chosen').each(function (i) {
            if ($(this).attr('checked')) {
                nlp_meta_data_for_day_of_week[$(this).index()] = $(this).index();
            }
        });
//        alert(nlp_meta_data_for_day_of_week);
        var hours_to_reserver = [];
        hours_to_reserver[0] = "";
        hours_to_reserver[1] = "";
        hours_to_reserver[2] = "";
        hours_to_reserver[3] = "";
        hours_to_reserver[4] = "";
        hours_to_reserver[5] = "";
        hours_to_reserver[6] = "";
        hours_to_reserver[7] = "";
        hours_to_reserver[8] = "";
        hours_to_reserver[9] = "";
        hours_to_reserver[10] = "";
        hours_to_reserver[11] = "";
        hours_to_reserver[12] = "";
        hours_to_reserver[13] = "";

        $('.nlp_possible_reservation_hour').each(function (i) {
            if ($(this).children('input').attr('checked') && $(this).hasClass('nlp_free_hours')) {
                hours_to_reserver[$(this).index()] = $(this).index();
            }
        });

        var data6 = {
            'action': 'nlp_reservation_answer_to_client',
            'nlp_value_integer_month': value_of_chosen_month,
            'nlp_value_integer_day': value_of_chose_day,
            'nlp_value_integer_year': value_of_chosen_year,
            'value_of_chosen_hall': value_of_chosen_hall,
            'nlp_value_of_hours': hours_to_reserver,
            'nlp_value_of_name': value_of_name,
            'nlp_value_of_info': value_of_info,
            'nlp_value_of_conf_email': value_of_confirmation_email,
            'nlp_value_of_repeat': value_of_repeat,
            'value_of_repeating_months': value_of_repeating_months,
            'value_number_of_months_to_repeat': value_number_of_months_to_repeat,
            'nlp_meta_data_for_day_of_week': nlp_meta_data_for_day_of_week,
            'value_of_nlp_repeat_if_free': value_of_nlp_repeat_if_free,
            'value_of_week_repeting': value_of_week_repeting,
            'value_use_of_tech': value_use_of_tech
        };
        $.post(nlp_ajax.ajaxurl, data6, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_repeat_event_answer_wrapper').html(response_cleaned);
        });

    });
    $(document).on('change', '#nlp_repeat_options', function () {
        var checked = $('#nlp_repeat_options').find(":selected").val();

        var data7 = {
            'action': 'nlp_repeat_event_chosen',
            'nlp_value_ichecked': checked
        };
        $.post(nlp_ajax.ajaxurl, data7, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_repeat_event_answer_wrapper').html(response_cleaned);
        });


    });
    /* pagination for the calendar*/
    $('.nlp_months').css('display', 'none');
    //Original
    //$('.nlp_months').eq(0).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
    //Alex => change => To show the real month of the year
    var real_month = new Date().getMonth();
    //var month_changing = 1;
    var month_changing = real_month + 1;
    month_names(month_changing);
    $('.nlp_months').eq(real_month).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');

    $(document).on('click', '.nlp_calendar_next', function () {
        var index_of_chosen_month = $('.nlp_selected_month_calendar_shown').index();

        if (month_changing < 12) {
            month_changing++;
            month_names(month_changing);
        }

        if (month_changing == 1) {
            $('.nlp_calendar_back').css({"color": "grey"});
        } else {
            $('.nlp_calendar_back').css({"color": "#555555"});
        }
        if (month_changing == 12) {
            $('.nlp_calendar_next').css({"color": "grey"});
        } else {
            $('.nlp_calendar_next').css({"color": "#555555"});
        }
        if (index_of_chosen_month == 11) {
        } else {
            $('.nlp_months').eq(index_of_chosen_month).removeClass('nlp_selected_month_calendar_shown').css('display', 'none');
            $('.nlp_months').eq(index_of_chosen_month + 1).addClass('nlp_selected_month_calendar_shown').css('display', 'inline-block');
        }
    });


    $(document).on('click', '.nlp_calendar_back', function () {
        var index_of_chosen_month = $('.nlp_selected_month_calendar_shown').index();
        if (month_changing > 1) {
            month_changing--;
            month_names(month_changing);
        }

        if (month_changing == 1) {
            $('.nlp_calendar_back').css({"color": "grey"});
        } else {
            $('.nlp_calendar_back').css({"color": "#555555"});
        }
        if (month_changing == 12) {
            $('.nlp_calendar_next').css({"color": "grey"});
        } else {
            $('.nlp_calendar_next').css({"color": "#555555"});
        }

        if (index_of_chosen_month == 0) {
//            alert(1);
        } else {
            $('.nlp_months').eq(index_of_chosen_month).removeClass('nlp_selected_month_calendar_shown').css('display', 'none');
            $('.nlp_months').eq(index_of_chosen_month - 1).addClass('nlp_selected_month_calendar_shown').css('display', 'inline-block');
        }
    });
    function month_names(month_number) {
        var abvg;
        switch (month_number) {
            case 1:
                abvg = 'Януари';
                break;
            case 2:
                abvg = 'Февруари';
                break;
            case 3:
                abvg = 'Март';
                break;
            case 4:
                abvg = 'Април';
                break;
            case 5:
                abvg = 'Май';
                break;
            case 6:
                abvg = 'Юни';
                break;
            case 7:
                abvg = 'Юли';
                break;
            case 8:
                abvg = 'Август';
                break;
            case 9:
                abvg = 'Септември';
                break;
            case 10:
                abvg = 'Октомври';
                break;
            case 11:
                abvg = 'Ноември';
                break;
            case 12:
                abvg = 'Декември';
                break;
        }

        $('.super_month').html(abvg + " / ");
    }
    /* **************** WEEK *************************************/
    //TODO Sedmichna zabrana na butona sled iztichane na na4alna data ili kraina data na zadadenata godinata
    //Week - calendar show
    var nlp_start_week_show;
    var nlp_end_week_show;
    var empty_days;
    //Date
    var now = new Date(), month, day;
    var year = now.getYear();
    var max_divs_of_month;
    var nlp_max_weeks_for_month;

    $(document).on('click', '.nlp_week_show', function () {
        $("#calendar_navigation_back").attr('class', 'nlp_calendar_back_week').css({'display': 'block'});
        $("#calendar_navigation_next").attr('class', 'nlp_calendar_next_week').css({'display': 'block'});
        $('.nlp_day_selected').css({'display': 'none'});
        $('.nlp_months').eq(real_month).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
        $('.nlp_week_day_names_calendar').css({"display": "block !Important"});
        $('.nlp_day_selected_dummy_day').css({"display": "none"});
        $('.nlp_day_selected_dummy_day').removeClass('year_stafs');
        $('.nlp_day_selected').removeClass('year_content_in_row');


        //Gets date
        if (year === now.getYear()) {
            month = now.getMonth();
            month++; //becouse start from 0 
            day = now.getDate();
        } else {
            month = 1;
            day = 1;
            nlp_start_week_show = 1;
            nlp_end_week_show = 8;
        }

        month_names(month);
        nlp_calendar_week_for_show(day, month);

    });

    function nlp_calendar_week_for_show(den, mesec) {

        //Get the month and counting the days in this month
        var nlp_max_weeks_for_month = (document.querySelectorAll(".nlp_months:nth-child(" + parseInt(mesec) + ") > div").length) / 7;
        if (nlp_max_weeks_for_month > 4) {
            if (nlp_max_weeks_for_month > 5) {
                nlp_max_weeks_for_month = parseInt(6);
            } else {
                nlp_max_weeks_for_month = parseInt(5);
            }
        }

        empty_days = $(".nlp_months:nth-child(" + parseInt(mesec) + ") .nlp_day_selected_dummy_day").length;
        var koq_sedmica_e = parseInt(empty_days + den);
        if (year === now.getYear()) {
            for (var m = 1; m <= nlp_max_weeks_for_month; m++) {
                if (koq_sedmica_e >= (m * 7)) {
                    nlp_start_week_show = (m * 7) + 1;
                }
            }
        }

        nlp_end_week_show = nlp_start_week_show + 7;

        //Hide days
        $('.nlp_months div:nth-child(n)').css('display', 'none');
        $('.calendar_day_container div').css('display', 'block');

        //Show`s first 7 days of January
        month_names(month);
        for (var s = nlp_start_week_show; s < nlp_end_week_show; s++) {
            $('.calendar_day_container').css('display', 'block');
            $('.nlp_months:nth-child(' + mesec + ')').css('display', 'block');
            $('.nlp_months:nth-child(' + mesec + ') div:nth-child(' + s + ')').css('display', 'block');
            $('.nlp_months:nth-child(' + mesec + ')').children('div:nth-child(' + s + ')').css('display', 'block');
        }
    }


    $(document).on('click', '.nlp_calendar_back_week', function () {
        nlp_start_week_show -= 7;

        if (month === 1 && nlp_start_week_show < 1) {
            nlp_start_week_show = 1;
        }
        if (nlp_start_week_show < 1) {
            month--;
            max_divs_of_month = (document.querySelectorAll(".nlp_months:nth-child(" + parseInt(month) + ") > div").length);
            //Get the month and counting the days in this month
            nlp_max_weeks_for_month = max_divs_of_month / 7;
            if (nlp_max_weeks_for_month > 4) {
                if (nlp_max_weeks_for_month > 5) {
                    nlp_start_week_show = 36;
                } else {
                    nlp_start_week_show = 29;
                }
            } else if (nlp_max_weeks_for_month > 3) {
                nlp_start_week_show = 22;
            }
        }
        nlp_end_week_show = nlp_start_week_show + 7;

        //Hide days
        $('.nlp_months div:nth-child(n)').css('display', 'none');
        $('.calendar_day_container div').css('display', 'block');

        //Show`s first 7 days of January
        month_names(month);
        for (var s = nlp_start_week_show; s < nlp_end_week_show; s++) {
            $('.calendar_day_container').css('display', 'block');
            $('.nlp_months:nth-child(' + month + ')').css('display', 'block');
            $('.nlp_months:nth-child(' + month + ') div:nth-child(' + s + ')').css('display', 'block');
            $('.nlp_months:nth-child(' + month + ')').children('div:nth-child(' + s + ')').css('display', 'block');
        }
    });

    $(document).on('click', '.nlp_calendar_next_week', function () {
        nlp_start_week_show += 7;

        var nlp_max_weeks_for_month = parseInt(document.querySelectorAll(".nlp_months:nth-child(" + parseInt(month) + ") > div").length);//dni za meseca

        if (month === 12 && nlp_start_week_show > nlp_max_weeks_for_month) {
            nlp_start_week_show -= 7;
        }

        if (nlp_start_week_show > nlp_max_weeks_for_month) {
            nlp_start_week_show = 1;
            month++;
        }
        nlp_end_week_show = nlp_start_week_show + 7;

        //Hide days
        $('.nlp_months div:nth-child(n)').css('display', 'none');
        $('.calendar_day_container div').css('display', 'block');

        //Show`s first 7 days of January
        month_names(month);
        for (var s = nlp_start_week_show; s < nlp_end_week_show; s++) {
            $('.calendar_day_container').css('display', 'block');
            $('.nlp_months:nth-child(' + month + ')').css('display', 'block');
            $('.nlp_months:nth-child(' + month + ') div:nth-child(' + s + ')').css('display', 'block');
            $('.nlp_months:nth-child(' + month + ')').children('div:nth-child(' + s + ')').css('display', 'block');
        }

    });


    // Month - calendar show data
    $(document).on('click', '.nlp_month_show', function () {
        $("#calendar_navigation_back").attr('class', 'nlp_calendar_back').css({'display': 'block'});
        $("#calendar_navigation_next").attr('class', 'nlp_calendar_next').css({'display': 'block'});
        $('.nlp_months').css('display', 'inline-block');
        $('.nlp_day_selected').css('display', 'block');
        $('.nlp_months').css('display', 'none');
        $('.nlp_months').eq(real_month).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
        $('.nlp_week_day_names_calendar').css({"display": "block"});
        $('.nlp_day_selected_dummy_day').removeClass('year_stafs');
        $('.nlp_day_selected').removeClass('year_content_in_row');
        $('.nlp_day_selected').css('display', 'block');
        $('.nlp_day_selected>div').css('display', 'block');
        $('.nlp_day_selected > div > div').css('display', 'block');
        $('.nlp_day_selected_dummy_day').css('display', 'block');

    });

    $(document).on('click', '.nlp_category_to_select', function () {
        $('.nlp_category_to_select').each(function (i) {
            if ($('.nlp_category_to_select').eq(i).hasClass('selected_cat_class')) {
                $('.nlp_category_to_select').eq(i).removeClass('selected_cat_class');
            }
        });

        $(this).addClass('selected_cat_class');
        var id_of_hall = $(this).children('div').attr('id');
        var year_for_calendar = $('.year_calendar_view option:selected').val();
        //nlp_calendar_view_for_difr_hals

        var data7777 = {
            'action': 'nlp_calendar_view_for_difr_hals',
            'id_of_hall': id_of_hall,
            'year_for_calendar': year_for_calendar
        };

        $.post(nlp_ajax.ajaxurl, data7777, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('#nlp_selected_day').html(response_cleaned);
            $('.nlp_months').css('display', 'none');
            $('.nlp_months').eq(0).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
        });
    });

    $('.super_year').html($('.year_calendar_view option:selected').val());

    $(document).on('change', '.year_calendar_view', function () {
        page_loading();
        $('.super_year').html($('.year_calendar_view option:selected').val());
        year = $('.year_calendar_view option:selected').text();
        $("#calendar_navigation_back").attr('class', 'nlp_calendar_back');
        $("#calendar_navigation_next").attr('class', 'nlp_calendar_next');
        $("#calendar_navigation_back").attr('class', 'nlp_calendar_back').css({'display': 'block'});
        $("#calendar_navigation_next").attr('class', 'nlp_calendar_next').css({'display': 'block'});
    });
    /*NOVO 17/08/2015*/

    $(document).on('change', '.year_calendar_view', function () {
        var id_of_hall = $('.selected_cat_class').children('div').attr('id');
        var year_for_calendar = $('.year_calendar_view option:selected').val();
        month_changing = 1;
        month_names(month_changing);
        //nlp_calendar_view_for_difr_hals
//        $('.nlp_category_to_select').each(function (i) {
//            if ($('.nlp_category_to_select').eq(i).hasClass('selected_cat_class')) {
//                $('.nlp_category_to_select').eq(i).removeClass('selected_cat_class');
//            }
//        });
//        $(this).addClass('selected_cat_class');
        var data77777 = {
            'action': 'nlp_calendar_view_for_difr_hals',
            'id_of_hall': id_of_hall,
            'year_for_calendar': year_for_calendar
        };
        $.post(nlp_ajax.ajaxurl, data77777, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('#nlp_selected_day').html(response_cleaned);
            $('.nlp_months').css('display', 'none');
            $('.nlp_months').eq(0).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
        });
    });

    $(document).on('click', '.nlp_year_show', function () {
        $('#loading').css('display', 'block');
        page_loading();
        $("#calendar_navigation_back").attr('class', 'nlp_calendar_back').css({'display': 'none'});
        $("#calendar_navigation_next").attr('class', 'nlp_calendar_next').css({'display': 'none'});
        $('.super_year').html($('.year_calendar_view option:selected').val());
        var id_of_hall = $('.selected_cat_class').children('div').attr('id');
        var year_for_calendar = $('.year_calendar_view option:selected').val();
        var user_id = $('.nlp_select_calendar_view').attr('id');

        var data77377 = {
            'action': 'nlp_claendar_year_view',
            'id_of_hall': id_of_hall,
            'year_for_calendar': year_for_calendar,
            'user_id': user_id
        };

        $.post(nlp_ajax.ajaxurl, data77377, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('#nlp_selected_day').html(response_cleaned);
            $('.nlp_week_day_names_calendar').css({"display": "none"});
            $('.nlp_day_selected_dummy_day').addClass('year_stafs');
        });

    });

    $(document).on('click', '#btn-print', function () {
        window.print();
    });


    function page_loading() {
        $('#loading').show();
        var load = '<div class="loader2">' +
                '<div id="nbu_logo2">НБУ</div>' +
                '<div class="loader_inner one"></div>' +
                '<div class="loader_inner two"></div>' +
                '<div class="loader_inner three"></div>' +
                '</div>';

        $('#loading').html(load);
        $(document).ajaxStop(function () {
            $('#loading').hide();
        });


    }
    //Bib rooms - loading function
    $(document).on('click', '.cat_name', function () {
        page_loading();
    });
    //Top Menu - loading function
    $(document).on('click', 'li>a', function () {
        page_loading();
    });
    $(document).on('click', '.menu-item-2138', function () {
        page_loading();
    });

    //Counting the textArea letters min 30 to max 250
    $('#textarea_feedback').html('40 минимум от 250');
    $('.nlp_event_information').keyup(function () {
        var text_length = $('.nlp_event_information').val().length;
        var max_text_remaining = 250 - text_length;
        var min_text_remaining = 40 - text_length;
        if (max_text_remaining <= 210) {
            $('.nlp_event_information').css({"border-color": "green"});
            document.getElementById('nlp_reserver_chosen_hours').disabled = false;
            $('#textarea_feedback').html('Остават ' + max_text_remaining + ' символа');
            
        } else {
            document.getElementById('nlp_reserver_chosen_hours').disabled = true;
            $('.nlp_event_information').css({"border-color": "red"});
            $('#textarea_feedback').html(min_text_remaining + ' минимум от ' + max_text_remaining);  
        }

    });
});