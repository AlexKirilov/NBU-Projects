<?php

//TODO: Имената на работниците да се изеждат под ID

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

//    var_dump($reservs);
}

//TODO: Първо да се извършва проверка за даден работник дали е зает за конкретния час или не е
function make_appointment($year, $month, $resv_date, $resv_time, $e_id) {
//    $year = 'y' . $year;
//    $resv_date = 'd' . $resv_date;
//    $resv_time = 't' . $resv_time;
    //Година + месец - Key за option-a
    $key_year_month = $year . "-" . $month;
    //Ден + Час + име на служител
    $option_value = $resv_date . "/" . $resv_time . "/" . $e_id;

//    //Добавя ме дата и час на записване на резервацията
//    $current_time = new DateTime;
//    $current_time = date('H:i d/m/y');

    $already_reserved = get_option('booking_pinpoint_reservations');


    echo '<br> <br /> <br>';
    print_r($already_reserved);

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
        make_appointment($reserv_array[0], $reserv_array[1], $reserv_array[2], $reserv_array[3], $reserv_array[4]);
    }
}

/*
 * *********************************************************************************************************
 *  *********************************    DATA BASE      ****************************************************
 * *********************************************************************************************************
 * 
 *
 */
add_action('init', 'run_for_first_time');

//This will get all data from Option Panel
function run_for_first_time() {
    //Get data from wp_Option
    //TODO proverka na vhodnite danni po tip
    //Data Testing
    $taxonomy_name = 'Booking';
    $f_term_name = 'Services';

    $array_of_services = ['Фризиорка', 'маникюристка'];
    $array_of_employee = ['Драганка', 'Петканка', 'Иванка'];
    $array_emp_sevices = ['Фризиорка', 'Фризиорка', 'маникюристка'];


    //Calling the functins
    //Taxonomy
    dwwp_register_post_type($taxonomy_name);
    //Term
    create_booking_taxonomies($f_term_name, $taxonomy_name);
    add_services($taxonomy_name, $array_of_services);
    add_emploeey($taxonomy_name, $array_of_employee, $array_emp_sevices);

    /*     * ********* Do TUK VSI4KO RABOTI ************************ */

    //Work time
    //
    //TODO: Работно време от - до за няколко човека
    //TODO: Работна почивка от - до
    //TODO: Работни дни от седмицата
    //TODO: Смени - ако има такива
    //TODO: Зависи от услугата
    $array_working_time = ['08:00', '17:00'];
    $array_work_breaks = ['12:30', '13:30'];
    $array_interval_between_treatments = ["60"]; //В минути

    $array_working_time_weekend = ['10:00', '15:00'];
    $array_work_breaks_weekend = ['12:30', '13:30'];
    $array_interval_between_treatments_weekend = ["60"]; //В минути
    //TODO: Проверка за делнични дни или за почивни дни
    //TODO: Get data from POST from JS on 'click' on calendar date
    //TODO: Saturday or Sunday or both are holidays or work days
    //TODO: Holidays like 03.03 24.04 24.12 25.12 and etc.
    //
    //Checkin day
    $year = '2016';
    $month = '02';
    $day = '20';
    $break_day = 'Sunday'; //"Sunday","Saturday" or "Both"
    $grafik = "";
    $a = isweekend($year, $month, $day, $break_day);
    if ($a === 'true') {
        //If is Saturday or Sunday
        $grafik = working_hours($array_working_time_weekend, $array_work_breaks_weekend, $array_interval_between_treatments_weekend);
    } else if ($a === 'false') {
        //Work days
        $grafik = working_hours($array_working_time, $array_work_breaks, $array_interval_between_treatments);
    } else if ($a === 'holiday') {
        echo "<script> alert ('Holiday') </script>";
    }
    print_r($grafik);
    
    //TODO: Here We need to check witch hour is free or taken
    //TODO: Color and Disable this hours if they are taken
    //TODO: and the other hours in green

    //TODO: Create reservation and save data to Booking Post`s
    
    
    
    
    /*
     * 
     * 
     * GET DATA FROM WP_OPTION
     *
     * 
     */
//    $no_exists_value = get_option('save_settings');
//    var_dump($no_exists_value); /* outputs false */
//    $term_id = get_query_var('cat'); // the current category ID

    $my_fields = get_option('links_updated_date_format', 'default_value');
//    var_dump($my_fields);
//    echo $my_fields[$term_id]['my_title']; // the title corresponding to the current category
}

//Create taxonomy
function dwwp_register_post_type($taxonomy_name) {
    $plural = $taxonomy_name . 's';
    $tax_name_low_case = strtolower($taxonomy_name);

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => $plural,
        'singular_name' => $taxonomy_name,
        'add_name' => 'Add New',
        'add_new_item' => 'Add New ' . $taxonomy_name,
        'edit' => 'Edit',
        'edit_item' => 'Edit ' . $taxonomy_name,
        'new_item' => 'New ' . $taxonomy_name,
        'view' => 'View ' . $taxonomy_name,
        'view_item' => 'View ' . $taxonomy_name,
        'search_term' => 'Search ' . $plural,
        'parent' => 'Parent ' . $taxonomy_name,
        'not_found' => 'No ' . $plural . ' found',
        'not_found_in_trash' => 'No ' . $plural . ' in Trash'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_admin_column' => true,
        'exclude_from_search' => false,
        'show_in_nav_menus' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'can_export' => true,
        'delete_with_user' => false,
        'hierarchical' => true,
        'has_archive' => true,
        'query_var' => true,
        'capability_type' => 'page',
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' => $tax_name_low_case,
            'with_front' => true,
            'pages' => true,
            'feeds' => false
        ),
        'supports' => array(
            'title',
            'editor',
            'author',
            'custom-fields',
            'thumbnail'
        )
    );

    register_post_type($tax_name_low_case, $args);
}

function create_booking_taxonomies($term_name, $taxonomy_name) {
    $tax_name_low = strtolower($taxonomy_name);
    $plural = $term_name . 's';

    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => $plural,
        'singular_name' => $term_name,
        'search_items' => 'Search ' . $plural,
        'all_items' => 'All ' . $term_name,
        'view_items' => 'View ' . $term_name,
        'parent_item' => 'Parent ' . $term_name,
        'parent_item_colon' => 'Parent ' . $term_name,
        'edit_item' => 'Edit' . $term_name,
        'update_item' => 'Update ' . $term_name,
        'add_new_item' => 'Add New ' . $term_name,
        'new_item_name' => 'New ' . $term_name . ' Name',
        'menu_name' => $plural,
        'capabilities' => array(
            'manage_terms',
            'edit_terms',
            'delete_terms',
            'assign_terms',
        )
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array(
            'slug' => $tax_name_low
        ),
        'capabilities' => array(
            'manage_terms',
            'edit_terms',
            'delete_terms',
            'assign_terms',
        )
    );

    register_taxonomy($taxonomy_name, $tax_name_low, $args);
}

function add_services($taxonomy_name, $array_of_services) {
    //Create services
    foreach ($array_of_services as $services) {
        wp_insert_term(
                $services, // the term 
                $taxonomy_name, // the taxonomy
                array(
            'description' => ' ',
            'slug' => $services,
                )
        );
    }
}

function add_emploeey($taxonomy_name, $array_of_employee, $array_emp_sevices) {
    //Check in size of arrays
    if (count($array_of_employee) !== count($array_emp_sevices)) {
        echo "<script type='text/javascript'>alert('Count of Employees and Employee Services are not equals')</script>";
        return 0;
    } else {
        $count = 0;
        foreach ($array_of_employee as $emp) {
            $parent_term = term_exists($array_emp_sevices[$count], $taxonomy_name); // array is returned if taxonomy is given
            $parent_term_id = $parent_term['term_id']; // get numeric term id
            wp_insert_term(
                    $emp, // the term 
                    $taxonomy_name, // the taxonomy
                    array(
                'description' => ' ',
                'slug' => $emp,
                'parent' => $parent_term_id
                    )
            );
            $count++;
        }
    }
}

function isweekend($year, $month, $day, $break_day) {
    $time = mktime(0, 0, 0, $month, $day, $year);
    $weekday = date('w', $time);
    if ($weekday == 0 || $weekday == 6) {
        if ($break_day === 'Both' && ($weekday == 0 || $weekday == 6)) {
            echo 'Both';
            return "holiday";
//            echo "<script> alert ('Holiday') </script>";
        } else if ($break_day === 'Saturday' && $weekday == 6) {
            echo 'Saturday';
            return "holiday";
//            echo "<script> alert ('Holiday') </script>";
        } else if ($break_day === 'Sunday' && $weekday == 0) {
            echo 'Sunday';
            return "holiday";

//            echo "<script> alert ('Holiday') </script>";
        } else {
            return 'true';
        }
    } else {
        return 'false';
    }
}

/* $array_working_time = ['0800', '1700'];
  $array_work_breaks =  ['1230', '1330'];
  $array_interval_between_treatments = ["45"];//В минути

  working_hours($array_working_time, $array_work_breaks, $array_interval_between_treatments);
 * 
 */

function working_hours($array_working_time, $array_work_breaks, $array_interval_between_treatments) {
    $start = [ $array_working_time[0], $array_work_breaks[1]];
    $end = [ $array_work_breaks[0], $array_working_time[1]];
    $interval = new DateInterval('PT' . $array_interval_between_treatments[0] . 'M');

    $counter = sizeof($start);

    $grafik_cr = array();
    for ($wt = 0; $wt < $counter; $wt++) {
        $period = new DatePeriod(new DateTime($start[$wt]), $interval, new DateTime($end[$wt]));
        foreach ($period as $p) {
            $grafik_cr[] = $p->format('H:iA');
//            echo '<br />' . $p->format('H:iA');
        }
    }
    return $grafik_cr;
//    print_r($grafik_cr);
}

/*
 * 
 * //Stnakata
 * 
 * 
 */

function empl_names($nmb) {

    for ($i = 1; $i <= $nmb; $i++) {

        echo'<input type="text" class="empl' . $nmb . ' val="Employee ' . $nmb . '"></input>';
    }
    echo '<input type="submit" class="save_names" name="save_names"></input>';
}

function save_settings() {

    $output = ($_POST['settings']);
    if ($output) {
        $settings_array = json_decode(stripslashes($output));
        echo json_encode($settings_array);
        update_option('pinpoint_booking_settings', $settings_array);
    }
}
