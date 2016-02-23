/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {
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
            'nlp_post_variable_id': npl_split_id,
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
//    $(document).on('click', '.nlp_check_holder', function () {
////        $(this).attr('class', 'nlp_check_holder');
//        var checked = $(this).children('input').prop('checked');
//        
//        if (checked) {
////            $(this).css('border', '1px solid lightblue');
////            $(this).css('background', 'lightgreen');
//           
////            $(this).addClass('nlp_checked_css');
//
//        } else {
//
//           
//           
////            $(this).addClass('nlp_unchecked_css');
//
//        }
//       $('#nlp_add_end_time_for_post').trigger('click');
//
//    });

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
            'nlp_value_integer_send': value_of_chosen,
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
            'nlp_value_integer_year': value_of_chosen_year,
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
            'nlp_value_integer_year': value_of_chosen_year,
        };
        $.post(nlp_ajax.ajaxurl, data4, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_days_of_month').html(response_cleaned);

        });
        //nova funkciq za smqna na mesecite spored nova godina 


        var data223 = {
            'action': 'nlp_months_front_change',
            'nlp_value_integer_year': value_of_chosen_year,
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
            'value_of_chosen_hall': value_of_chosen_hall,
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
            'nlp_value_ichecked': checked,
        };
        $.post(nlp_ajax.ajaxurl, data7, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('.nlp_repeat_event_answer_wrapper').html(response_cleaned);
        });


    });
    /* pagination for the calendar*/
    $('.nlp_months').css('display', 'none');
    $('.nlp_months').eq(0).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
    $(document).on('click', '.nlp_calendar_next', function () {
        var index_of_chosen_month = $('.nlp_selected_month_calendar_shown').index();

        if (index_of_chosen_month == 11) {
//            alert(12);
        } else {
            $('.nlp_months').eq(index_of_chosen_month).removeClass('nlp_selected_month_calendar_shown').css('display', 'none');
            $('.nlp_months').eq(index_of_chosen_month + 1).addClass('nlp_selected_month_calendar_shown').css('display', 'inline-block');
        }
    });
    $(document).on('click', '.nlp_calendar_back', function () {
        var index_of_chosen_month = $('.nlp_selected_month_calendar_shown').index();

        if (index_of_chosen_month == 0) {
//            alert(1);
        } else {
            $('.nlp_months').eq(index_of_chosen_month).removeClass('nlp_selected_month_calendar_shown').css('display', 'none');
            $('.nlp_months').eq(index_of_chosen_month - 1).addClass('nlp_selected_month_calendar_shown').css('display', 'inline-block');
        }
    });
    $(document).on('click', '.nlp_week_show', function () {
        $('.nlp_months').css('display', 'inline-block');
        $('.nlp_day_selected').css('display', 'none');
    });
    $(document).on('click', '.nlp_category_to_select', function () {
        var id_of_hall = $(this).children('div').attr('id');
        //nlp_calendar_view_for_difr_hals
        $('.nlp_category_to_select').each(function (i) {
            if ($('.nlp_category_to_select').eq(i).hasClass('selected_cat_class')) {
                $('.nlp_category_to_select').eq(i).removeClass('selected_cat_class');
            }
        });
        $(this).addClass('selected_cat_class');
        var data7777 = {
            'action': 'nlp_calendar_view_for_difr_hals',
            'id_of_hall': id_of_hall,
        };
        $.post(nlp_ajax.ajaxurl, data7777, function (response) {
            var response_cleaned = response.slice(0, -1);
            $('#nlp_selected_day').html(response_cleaned);
            $('.nlp_months').css('display', 'none');
            $('.nlp_months').eq(0).css('display', 'inline-block').addClass('nlp_selected_month_calendar_shown');
        });

    });
    $(document).on('click','.nlp_day_selected',function(){
        
    });
});