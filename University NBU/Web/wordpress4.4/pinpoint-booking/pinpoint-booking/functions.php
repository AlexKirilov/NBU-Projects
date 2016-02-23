<?php

global $curr_month;
global $curr_year;

if (!$curr_month || !$curr_year) {
    $curr_month = date('n');
    $curr_year = date('Y');
}

function add_container($id, $class) {
    echo '<div class="' . $class . '" id="' . $id . '"><p></p></div>';
}

function fbscript() {
    
}

function cal_func_rework($ddd, $yyy, $fddcm) {

    global $npm, $curr_month, $curr_year;

    $firstd_o_m = strtotime('first day of');
    $dow = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $calcc = count($months);
    $counter = count($dow);

    if (!$npm) {
        $days_im = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
        $firstday = preg_replace('/[^A-Za-z]/', '', date("D n Y", $firstd_o_m));
        $curr_month = intval($curr_month);
        for ($i = 0; $i < $counter; $i ++) {
            if ($dow[$i] == $firstday) {
                $empty_blocks = $i;
            }
        }
    } elseif ($npm == 'change') {
        $curr_year = $yyy;
        $curr_month = $ddd;
        $days_im = cal_days_in_month(CAL_GREGORIAN, $curr_month, $curr_year);

        for ($dc = 0; $dc < $counter; $dc++) {
            if ($dow[$dc] == $fddcm) {
                $empty_blocks = $dc;
            }
        }
    }

    print_it_cale($days_im, $empty_blocks, $curr_month);
}

function print_it_cale($c, $e, $f) {
    global $curr_year;
    $dow = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $counter = count($dow);

    if (is_string($f)) {
        $f = $months[intval($f) - 1];
    } else {
        $f = $months[intval($f) - 1];
    }

    echo '<div class="title-cont"><div class="prev-month"><p><</p></div><div class="month_title"><p>' . $f . ' ' . $curr_year . '</p></div><div class="next-month"><p>></p></div></div>';

    for ($m = 0; $m < $counter; $m++) {
        echo '<div class="date-booking" id="' . $dow[$m] . '"><p>' . $dow[$m] . '</p></div>';
    }
    for ($l = 0; $l < $e; $l++) {
        echo '<div class="date-booking" id="empty-cube"></div>';
    }
    for ($k = 1; $k <= $c; $k ++) {
        echo '<div class="date-booking" id="' . $k . '"><p></p></div>';
    }
}

function change_month($nm, $yy, $fdcm) {
    global $npm;
    $npm = 'change';
    cal_func_rework($nm, $yy, $fdcm);
    $reservs = get_option('booking_pinpoint_reservations');

    var_dump($reservs);
}

function make_appointment($year, $month, $resv_date, $resv_time, $e_id) {
    $year = 'y' . $year;
    $resv_date = 'd' . $resv_date;
    $resv_time = 't' . $resv_time;


    $already_reserved = get_option('booking_pinpoint_reservations');
    if (empty($already_reserved)) {

        $already_reserved = array(
            $year => array(
                $month => array(
                    $resv_date => array(
                        $e_id => array(
                            $resv_time
                        )
                    )
                )
            )
        );

        update_option('booking_pinpoint_reservations', $already_reserved);
    } else {
        echo 'rabotq dotuk';
        if (array_key_exists($year, $already_reserved)) {
            echo 'if1';
            if (is_array($year) && array_key_exists($month, $already_reserved[$year])) {
                echo 'if2';
                if (is_array($month) && array_key_exists($resv_date, $month)) {
                    echo 'if3';
                    if (is_array($resv_date) && array_key_exists($e_id, $resv_date)) {
                        echo 'if4';
                        if (in_array($resv_time, $e_id)) {
                            echo 'posleden';
                            return;
                        } else {
                            array_push($already_reserved[$year[$month[$resv_date[$e_id]]]], $resv_time);
                        }
                    } else {
                        $e_id = array(
                            $resv_time
                        );
                        array_push($already_reserved[$year[$month[$resv_date]]], $e_id);
                    }
                } else {
                    $resv_date = array(
                        $e_id => array(
                            $resv_time
                        )
                    );
                    array_push($already_reserved[$year[$month]], $resv_date);
                }
            } else {
                $month = array(
                    $resv_date => array(
                        $e_id => array(
                            $resv_time
                        )
                    )
                );
                array_push($already_reserved[$year], $month);
            }
        } else {
            $year = array(
                $month => array(
                    $resv_date => array(
                        $e_id => array(
                            $resv_time
                        )
                    )
                )
            );
            array_push($already_reserved, $year);
        }
    }

    update_option('booking_pinpoint_reservations', $already_reserved);
    wp_die();
}

function ajax_change_month() {
    $output = ($_POST['chPage']);
    $action = json_decode(stripslashes($output));
    $year = $action[1];
    $month = $action[0];
    $firstday_currmonth = $action[2];
    $npm = 'change';
    change_month($month, $year, $firstday_currmonth);
//    delete_option('booking_pinpoint_reservations');
    wp_die();
}

function ajax_reservation() {
    $output = ($_POST['reserve']);
    if ($output) {

        $reserv_array = json_decode(stripslashes($output));
//        var_dump($reserv_array);
        make_appointment($reserv_array[0], $reserv_array[1], $reserv_array[2], $reserv_array[3], $reserv_array[4]);
    }
}

function empl_names($nmb){
    
    for($i = 1; $i <= $nmb; $i++){
        
        echo'<input type="text" class="empl'.$nmb.' val="Employee '.$nmb.'"></input>';
        
    }
    echo '<input type="submit" class="save_names" name="save_names"></input>';
    
}

function save_settings () {
    
    $output = ($_POST['settings']);
    if($output){
        $settings_array = json_decode(stripslashes($output));
        echo json_encode($settings_array);
        update_option('pinpoint_booking_settings', $settings_array);
    }
    
}