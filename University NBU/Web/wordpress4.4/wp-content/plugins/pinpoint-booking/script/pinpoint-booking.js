jQuery(document).ready(function ($) {

    var title = $('.month_title p').text().replace(/[^A-Za-z]/g, '');
    var nmonth, pmonth, current_year = $('.month_title p').text().replace(/[^0-9]/g, '');
    var direction;

    function click_handlers() {

        $('.next-month').on('hover', function () {
            title = $('.month_title p').text().replace(/[^A-Za-z]/g, '');
            switch (title) {
                case 'January':
                    nmonth = 02;
                    pmonth = 12;
                    break;
                case 'February':
                    nmonth = 03;
                    pmonth = 01;
                    break;
                case 'March':
                    nmonth = 04;
                    pmonth = 02;
                    break;
                case 'April':
                    nmonth = 05;
                    pmonth = 03;
                    break;
                case 'May':
                    nmonth = 06;
                    pmonth = 04;
                    break;
                case 'June':
                    nmonth = 07;
                    pmonth = 05;
                    break;
                case 'July':
                    nmonth = 08;
                    pmonth = 06;
                    break;
                case 'August':
                    nmonth = 09;
                    pmonth = 07;
                    break;
                case 'September':
                    nmonth = 10;
                    pmonth = 08;
                    break;
                case 'October':
                    nmonth = 11;
                    pmonth = 09;
                    break;
                case 'November':
                    nmonth = 12;
                    pmonth = 10;
                    break;
                case 'December':
                    nmonth = 01;
                    pmonth = 11;
                    break;
            }
        });

        $('.prev-month').on('hover', function () {
            title = $('.month_title p').text().replace(/[^A-Za-z]/g, '');
            switch (title) {
                case 'January':
                    nmonth = 02;
                    pmonth = 12;
                    break;
                case 'February':
                    nmonth = 03;
                    pmonth = 01;
                    break;
                case 'March':
                    nmonth = 04;
                    pmonth = 02;
                    break;
                case 'April':
                    nmonth = 05;
                    pmonth = 03;
                    break;
                case 'May':
                    nmonth = 06;
                    pmonth = 04;
                    break;
                case 'June':
                    nmonth = 07;
                    pmonth = 05;
                    break;
                case 'July':
                    nmonth = 08;
                    pmonth = 06;
                    break;
                case 'August':
                    nmonth = 09;
                    pmonth = 07;
                    break;
                case 'September':
                    nmonth = 10;
                    pmonth = 08;
                    break;
                case 'October':
                    nmonth = 11;
                    pmonth = 09;
                    break;
                case 'November':
                    nmonth = 12;
                    pmonth = 10;
                    break;
                case 'December':
                    nmonth = 01;
                    pmonth = 11;
                    break;
            }
        });



        $('.next-month').click(function () {
            direction = 'forward';
            if (nmonth == 1) {
                current_year++;
            }
            changeMonth(direction);
        });
        $('.prev-month').click(function () {
            direction = 'backward';
            if (pmonth == 12) {
                current_year--;
            }
            changeMonth(direction);
        });
        $('.date-booking').on('click', function () {
            var already_open = $('.pop_up_date').attr('id');
            var clicky = $(this).attr('id');
            if (clicky != 'Mon' && clicky != 'Tue' && clicky != 'Wed' && clicky != 'Thu' && clicky != 'Fri' && clicky != 'Sat' && clicky != 'Sun' && clicky != 'empty-cube' && !already_open) {

                var clicked_date = $(this).attr('id');
                pop_up_booking(clicked_date);
            }
        });
    }

    click_handlers();
    for (var i = 0; i < 32; i++) {
        $('#' + i + ' p').text(i);
    }

    function changeMonth(dr) {
        var dataArray = new Array;
        $('.post-entry').html(' ');

        var days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];


        if (dr == 'backward') {
            var d = new Date();
            d.setDate(1);
            d.setMonth(pmonth - 1);
            d.setFullYear(current_year);
            if (d.getDay() != 0) {
                var fdom = days[d.getDay() - 1].substr(0, 3);
            } else {
                var fdom = days[6].substr(0, 3);
            }
            dataArray = [pmonth, current_year, fdom];

        } else if (dr == 'forward') {
            var d = new Date();
            d.setDate(1);
            d.setMonth(nmonth - 1);
            d.setFullYear(current_year);
            if (d.getDay() != 0) {
                var fdom = days[d.getDay() - 1].substr(0, 3);
            } else {
                var fdom = days[6].substr(0, 3);
            }
            dataArray = [nmonth, current_year, fdom];
        }

        var jsonString = JSON.stringify(dataArray);
        $.ajax({
            type: 'POST',
            url: pipointVars.ajaxUrl,
            data: {action: 'ajax_change_month', chPage: jsonString},
            success: function (data) {

                $('.post-entry').append(data);
                for (var i = 0; i < 32; i++) {
                    $('#' + i + ' p').text(i);
                }
                click_handlers();
            },
            error: function (data) {
                alert(data);
            }
        });
    }
    ;

    function pop_up_booking(date) {
        var month = $('.month_title p').text().replace(/[^A-Za-z]/g, '');
        $('.post-entry').append('<div class="pop_up_date" id="m' + month + 'd' + date + '"></div>');
        $('.pop_up_date').append('<div class="pop_up_title"><p>' + month + ' ' + date + '</p></div>');
        $('.pop_up_date').append('<div class="cl_button">X</div>');

        for (var i = 8; i < 19; i++) {
            $('.pop_up_date').append('<div class="book_hour" id="' + month + '_' + date + '_' + i + '00' + '"><p>' + i + ' : 00' + '</p></div>');
        }

        var employees = true;
        var employee = ['Penka', 'Ginka', 'Julbo'];
        if (employees) {

            for (var i = 0; i < employee.length; i++) {
                $('.book_hour').append('<div class="emp" id="' + employee[i] + '"><p>' + employee[i] + '</p></div>');
            }
        }

        $('.cl_button').on('click', function () {
            $('.pop_up_date').detach();
        });
        var hovered_id;

        $('.book_hour').hover(function () {
            hovered_id = $(this).attr('id');
            $('#' + hovered_id + ' .emp').show();
        }, function () {
            $('#' + hovered_id + ' .emp').hide();
        });

        $('.book_hour .emp').on('click', function () {
            var elem_id = hovered_id.split('_');
            var el_id_dos = $(this).attr('id');
            var array_title = $('.month_title p').text().replace(/[^0-9]/g, '');

            if ($('#' + elem_id + ' #' + el_id_dos).hasClass('reserved')) {
                alert('Съжаляваме, часът е резервиран ! Моля изберете друг');
            } else {
                $('#' + elem_id + ' #' + el_id_dos).addClass('reserved');
                make_reservation(array_title, elem_id, el_id_dos);
            }
        });
    }

    function make_reservation(ttl, restime, empl_name) {

        var res_array = [ttl, restime[0], restime[1], restime[2], empl_name];
        var res_array_tojson = JSON.stringify(res_array);
//        for(i=0;i<res_array.length;i++){
//            console.log(res_array[i]);
//        }
        $.ajax({
            type: 'POST',
            url: pipointVars.ajaxUrl,
            data: {action: 'ajax_reservation', reserve: res_array_tojson},
            success: function (data) {
                console.log(data);
//                click_handlers();
            },
            error: function (errorThrown) {
                alert(errorThrown);
            }
        });
    }




});
