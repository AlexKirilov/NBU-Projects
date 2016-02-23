<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function text_shortcode() {


    $args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all', "post_type" => "post");
    $query = get_posts($args);
    foreach ($query as $key => $val) {
        foreach ($val as $data => $value) {
            if ($data == 'ID') {
                $term = wp_get_post_terms($value, 'category');

                if ($term[0]->name == 'Zala 1') {
                    echo "<div>Зала Едно";
                    $post_data = get_post($value);

                    echo "<p>$post_data->post_title</p>";
                    echo "</div>";
                }


                if ($term[0]->name == 'Zala 2') {
                    echo "<div>Зала Две";
                    $post_data = get_post($value);
                    echo "<p>$post_data->post_title</p>";
                    echo "</div>";
                }
            }
        }
    }
}

add_shortcode("text_shortcode_short", 'text_shortcode');

/*

 * Function to create new Hall for the Library (category)
 * shortcode for Administration page 
 * 
 *  */

function nbl_plugin_create_new_hall() {
    if (is_user_logged_in()) {
        ?>

        <input type="text" name="npl_plugin_name_of_category" class='npl_plugin_name_of_category' /> 

        <input type="button" name='npl_new_form_submit' id='npl_new_form_submit' value="Добави Зала"/> 
        </form>
        <div class='meassage'></div>
        <?php

    }
}

add_shortcode("nbl_plugin_create_new_hall_short", 'nbl_plugin_create_new_hall');

add_action('wp_ajax_npl_new_hall_submit', 'npl_new_hall_submit');

function npl_new_hall_submit() {

    if (isset($_POST['npl_plugin_name_of_category']) && !empty($_POST['npl_plugin_name_of_category'])) {
        $name_of_category = filter_input(INPUT_POST, 'npl_plugin_name_of_category', FILTER_SANITIZE_STRING);
        $old = explode(" ", $name_of_category);
        $new = implode("_", $old);
        $lower_string = strtolower($new);
        $categories = get_terms('category', 'orderby=count&hide_empty=0');
        $index = sizeof($categories) + 1;

        wp_insert_term(
                $name_of_category, // the term 
                'category', // the taxonomy
                array(
            'description' => $lower_string,
            'slug' => 'zala-' . $index,
                )
        );

        echo "<div class='nbl_plugin_message'>Зала $name_of_category е добавена.</div>";
    }
}

/*

 * Function adding meta for the posts for end time of the curent post
 * (the post submit time is the start time of the reserved hall,afterwards its this meta for end)
 * 
 * 
 *  */



add_action('add_meta_boxes', 'nlp_add_meta_box_for_the_post_end_time');

function nlp_add_meta_box_for_the_post_end_time() {

    add_meta_box('nlp_html_for_meta_box_end_time', 'Краен Час', 'nlp_html_for_meta_box_end_time_meta', 'post', 'normal', 'default');
}

//html-ut na meta boxa 
function nlp_html_for_meta_box_end_time_meta() {
// The Event Location Metabox

    global $post;

// Noncename needed to verify where the data originated
//            echo '<input type="" name="gmrb_cfl_plugin_meta_box" id="gmrb_cfl_plugin_meta_box" value="' .
//            wp_create_nonce(plugin_basename(__FILE__)) . '" />';
//
//            // Get the location data if its already been entered
    $nlp_meta_end_time_of_post = get_post_meta($post->ID, 'nlp_html_for_meta_box_end_time', true);
//            $dresscode = get_post_meta($post->ID, '_dresscode', true);
// Echo out the field
    if (!empty($nlp_meta_end_time_of_post)) {

        echo "<div>" . $nlp_meta_end_time_of_post . "</div>";
        echo "<input type='text' class='nlp_html_for_meta_box_end_time' id='id_" . $post->ID . "' size='60' placeholder='Въведете желаният краен Час'/></br>";
        echo "<div id='nlp_add_end_time_for_post' class='button button-primary button-large'>Дбоавете Краен Час</div>";
        echo "<hr><div class='nlp_responce_of_made_actiona'></div>";
    } else {
        echo "<div>Няма определен Краен Час.</div><hr>";
        echo "<input type='text' class='nlp_html_for_meta_box_end_time' id='id_" . $post->ID . "' size='60' placeholder='Въведете желаният краен Час'/></br>";
        echo "<div id='nlp_add_end_time_for_post' class='button button-primary button-large'>Дбоавете Краен Час</div>";
        echo "<hr><div class='nlp_responce_of_made_actiona'></div>";
    }
}

/*

 * Ajax function to update_the post_end_time_meta .
 * Reason for ajax , if a new Admin is made and the wordpress is't used,this functionality will be used on both places.
 * 
 *  */



add_action('wp_ajax_nlp_update_post_end_time', 'nlp_update_post_end_time');

function nlp_update_post_end_time() {
    if (isset($_POST['nlp_post_variable_send'], $_POST['nlp_post_variable_id']) && !empty($_POST['nlp_post_variable_send']) && !empty($_POST['nlp_post_variable_id'])) {
        $nlp_value_send_by_ajax = filter_input(INPUT_POST, 'nlp_post_variable_send', FILTER_SANITIZE_STRING);
        $nlp_value_send_by_ajax_id = filter_input(INPUT_POST, 'nlp_post_variable_id', FILTER_VALIDATE_INT);

        //getting post meta for the chosen event and see if its empty

        $nlp_curent_end_time = get_post_meta($nlp_value_send_by_ajax_id, 'nlp_html_for_meta_box_end_time', true);

        if (empty($nlp_curent_end_time)) {
            update_post_meta($nlp_value_send_by_ajax_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
            echo "<div class='nlp_responce_ajax'>Обновяването беше направено Успешно.</div>";
        } else {
            update_post_meta($nlp_value_send_by_ajax_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
            echo "<div class='nlp_responce_ajax'>Обновяването беше направено Успешно.</div>";
        }
    } else {
        echo "<div class='nlp_responce_ajax'>Подали сте неправилни данни!</div>";
    }
}

/*

 * Function for getting the end of each post and returning array with the hours that are free for the selects 
 * on the front forms and the admin side 
 * recover all posts from certain day ,see start / end time of post and see the remaining hours outside of the scope 
 * @hall_number -> number_of_term_for_hall
 * @date -> date of the post (all answers will be for one day alone) 
 * 
 *  */

function nlp_free_hours_of_a_hall_for_one_day($hall_number, $date_input) {

    //this must be done before the acutal call of the function ,example code for $date value 
    $post_date = $date_input;

    $date = explode(" ", $post_date);

    //end of $date ,value like this must be returned ( year /month/ day)
    $date_exploded = explode("-", $date[0]);
    $taken_hours = array();
    //var_dump(get_categories());
    //ne e s pravilnite categorii  ! ! ! da se opravi
    $args = array(
        'post_type' => 'post',
        'category' => $hall_number,
        'date_query' => array(
            array(
                'year' => $date_exploded[0],
                'month' => $date_exploded[1],
                'day' => $date_exploded[2],
            ),
        ),
    );

    $query = get_posts($args);

    foreach ($query as $data) {
        $post_id = 0;
        foreach ($data as $key_data => $data_value) {

            if ($key_data == 'ID') {

                $post_id = $data_value;
                $post_end_time = get_post_meta($data_value, 'nlp_html_for_meta_box_end_time', true);

                if ($post_end_time != 0 && $post_id != 0) {
                    if (!key_exists($post_id, $taken_hours)) {
                        $taken_hours[$post_id][1] = $post_end_time;
                    }
                }
            } else if ($key_data == 'post_date') {

                $post_date_start = explode(" ", $data_value);
                $post_start_time = $post_date_start[1];
                if ($post_start_time != 0 && $post_id != 0) {
                    if (key_exists($post_id, $taken_hours)) {
                        $taken_hours[$post_id][0] = $post_start_time;
                    }
                }
            }
        }
    }
    $free_hours_minutes = array(
        'start' => 8 * 60,
        'end' => 20 * 60,
    );

    $real_data = array(
    );

    foreach ($taken_hours as $index_post_id => $start_end) {
        $start_points_spliter = explode(":", $start_end[0]);
        unset($start_points_spliter[2]);
        $end_points_spliter = explode(":", $start_end[1]);
        unset($end_points_spliter[2]);
        $start_points_mininutes = $start_points_spliter[0] . ":" . $start_points_spliter[1];
        $end_points_minutes = $end_points_spliter[0] . ":" . $end_points_spliter[1];
        $start_minutes_and_hours = explode(':', $start_points_mininutes);
        $end_minutes_and_hours = explode(":", $end_points_minutes);
        $start_h = $start_minutes_and_hours[0] * 60 + $start_minutes_and_hours[1];
        $end_h = $end_minutes_and_hours[0] * 60 + $end_minutes_and_hours[1];

        if (empty($real_data) && !key_exists($index_post_id, $real_data)) {
            $real_data[$index_post_id] = array(
                'start' => $start_h,
                'end' => $end_h,
            );
        } else {

            foreach ($real_data as $index => $val) {
                if ($val['start'] > $start_h && $val['start'] > $end_h || $val['end'] < $end_h && $val['end'] < $start_h) {
                    $real_data[$index_post_id] = array(
                        'start' => $start_h,
                        'end' => $end_h,
                    );
                } else {
                    
                }
            }
        }
    }
    $val_sorted = asort($real_data);
    return $real_data;
}

/*

 * Shortcod za front end-a (formata za suzdavane na rezervaciite i setvane na dannite pri suzdavane na posta
 * 
 * 
 *  */

function nlp_reservation_form() {
    $reservation_form = "";
    $all_halls_id_names = array();
    $args = array(
        'type' => 'post',
        'orderby' => 'id',
        'order' => 'ASC',
        'hide_empty' => 0,
        'taxonomy' => 'category',
        'pad_counts' => false
    );
    $halls_query = get_categories($args);
    $cnt = 0;
    foreach ($halls_query as $object_index => $category) {

        foreach ($category as $data_key => $data) {
            if (!isset($all_halls_id_names[$cnt])) {
                $all_halls_id_names[$cnt] = array(
                    'name' => '',
                    'term_id' => '',
                );
            }
            if ($data_key == 'term_id') {
                $all_halls_id_names[$cnt]['term_id'] = $data;
            } else if ($data_key == 'name') {
                $all_halls_id_names[$cnt]['name'] = $data;
            }
            $cnt++;
        }
    }
    $reservation_form .= "<div class='nlp_reservation_wrapper'>";
    $reservation_form .= "<select id='nlp_select_hall'>";
    foreach ($all_halls_id_names as $index => $value) {
        foreach ($value as $key => $inner_value) {
            if (!empty($inner_value)) {
                if ($key == 'term_id') {
                    $reservation_form .= "<option class='id_of_hall' value='";
                    $reservation_form .= $inner_value;
                } else {
                    $reservation_form .= "'>" . $inner_value . "</option>";
                }
            }
        }
    }
    $reservation_form .='</select>';
    $reservation_form .="<div class='nlp_returned_data'></div>";
    $reservation_form .= "</div>";
    return $reservation_form;
}

add_shortcode('nlp_front_reservation', 'nlp_reservation_form');

/* ajax obrabotka na izbranite selectori za data chas i minuti i zala za fronta
 * 
 * 
 *  */

function nlp_ajax_setter_for_reservation() {
    if (isset($_POST['nlp_value_integer_send']) && !empty($_POST['nlp_value_integer_send'])) {
        $category_term_id = filter_input(INPUT_POST, 'nlp_value_integer_send', FILTER_SANITIZE_NUMBER_INT);
        $return_possible_days_months = "";
        $date_current_month = date('m');
        $date_current_year = date('y');
        $return_possible_days_months .= "<select id='nlp_month'>";

        for ($i = $date_current_month; $i <= 12; $i++) {
            $return_possible_days_months .='<option id="nlp_possible_month" value="' . $i . '">' . nlp_return_month_name($i) . "</option>";
        }

        $return_possible_days_months .= "</select>";

        $return_possible_days_months .= "<select id='nlp_year'>";

        for ($k = ($date_current_year + 2000) - 10; $k <= (2000 + $date_current_year) + 10; $k++) {
            $return_possible_days_months .='<option id="nlp_possible_year" value="' . $k . '">' . $k . "</option>";
        }

        $return_possible_days_months .= "</select>";
        $return_possible_days_months .= "<div class='nlp_days_of_month'></div>";
        $return_possible_days_months .= "<div class='nlp_taken_hours_for_day'></div>";
        echo $return_possible_days_months;
    }
}

add_action('wp_ajax_nlp_ajax_setter_for_reservation', 'nlp_ajax_setter_for_reservation');
add_action('wp_ajax_nopriv_nlp_ajax_setter_for_reservation', 'nlp_ajax_setter_for_reservation');

/*

 * ajax za dnite ot dadeniqt mesec (razlichen broj neobhodimo dinamichno promenqne)
 * 
 *  */

function nlp_day_of_month() {

    if (isset($_POST['nlp_value_integer_month'], $_POST['nlp_value_integer_year']) && !empty($_POST['nlp_value_integer_month']) && !empty($_POST['nlp_value_integer_year'])) {
        $date_current_month = filter_input(INPUT_POST, 'nlp_value_integer_month', FILTER_SANITIZE_NUMBER_INT);
        $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $date_current_month, $date_current_year);
        $return_days .= "<select id='nlp_selected_day'>";

        for ($i = 1; $i <= $days_in_month; $i++) {
            $return_days .= "<option class='nlp_day_selected' value='" . $i . "'>" . nlp_return_day_name($date_current_month, $date_current_year, $i) . " (" . $i . ")</option>";
        }
        $return_days .= "</seclet>";

        echo $return_days;
    }
}

add_action('wp_ajax_nlp_day_of_month', 'nlp_day_of_month');
add_action('wp_ajax_nopriv_nlp_day_of_month', 'nlp_day_of_month');



/*


 * ajax za vrushtane na realni danni dali za chasovete za izbraniqt den 
 *  
 *  */

function nlp_day_ajax_reservate_post() {

    if (isset($_POST['nlp_value_integer_month'], $_POST['value_of_chosen_hall'], $_POST['nlp_value_integer_year'], $_POST['nlp_value_integer_day']) && !empty($_POST['value_of_chosen_hall']) && !empty($_POST['nlp_value_integer_day']) && !empty($_POST['nlp_value_integer_month']) && !empty($_POST['nlp_value_integer_year'])) {
        $date_current_month = filter_input(INPUT_POST, 'nlp_value_integer_month', FILTER_SANITIZE_NUMBER_INT);
        $date_current_day = filter_input(INPUT_POST, 'nlp_value_integer_day', FILTER_SANITIZE_NUMBER_INT);
        $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
        $selected_hall_id = filter_input(INPUT_POST, 'value_of_chosen_hall', FILTER_VALIDATE_INT);
        $cash_variable = '';
        $hours_to_miss = [];
        $data = nlp_free_hours_of_a_hall_for_one_day($selected_hall_id, $date_current_year . "-" . $date_current_month . "-" . $date_current_day);
        if(!empty($data)){
         $cash_variable .= "<select id='nlp_possible_times'>";
        foreach ($data as $key => $index) {
           // echo "<p>" . $key . "</p>";
            $cnt = 0;
            foreach ($index as $data) {
                if ($data % 60 == 0) {
                    $hours_to_miss[$cnt] = ($data / 60) . ":00";
                } else {
                    $min = 0;
                    $time = "";
                    for ($i = $data; $i >= 0; $i--) {
                        if (empty($time)) {
                            if ($i % 60 == 0) {
                                $time = $i / 60 . ":" . $min;
                            } else {
                                $min++;
                            }
                        }
                    }
                    $hours_to_miss[$cnt] = $time;
                }
                $cnt++;
            }
        }
        $hours = array();
        $chift_cnt = 1;
        foreach($hours_to_miss as $key => $hour_min){
            $split_hours_min = explode(':',$hour_min);
            if($chift_cnt % 2 != 0 ){
                  $first_hour = $split_hours_min[0];
            }
            if(!isset($hours[$first_hour])){
                 $hours[$first_hour] = $first_hour;
                  if($chift_cnt % 2 != 0 ){
                     $first_hour = $split_hours_min[0];
                    }else{
                    $hours[$first_hour] .= $split_hours_min[0];
                   
                }
            }else{
                $hours[$first_hour] = $first_hour;
                  if($chift_cnt % 2 != 0 ){
                     $first_hour = $split_hours_min[0];
                    }else{
                    $hours[$first_hour] .= "_".$split_hours_min[0];
                   
                }
            }
           
        $chift_cnt++;
        }
        
        $cash_variable .= "<select id='nlp_poss_hour'>";
    
        for($i = 8; $i <= 20;$i++){
            if(isset($hours[$i]) && !empty($hours[$i])){
                $split = explode('_',$hours[$i]);
                if($split[0] < $i && $split[1] > $i){
                   $cash_variable .=  "<option class='nlp_actual_hours' value='" . $i . "'>". $i ."</option>";
            
                   
                }else{
                   $i++;  
                }
                
             }else{
                
                  $cash_variable .=  "<option class='nlp_actual_hours' value='" . $i . "'>". $i ."</option>";
            
             }
        
               
        }
        $cash_variable .="</select>";
        echo $cash_variable;
      }else{
        $cash_variable .= "<select id='nlp_poss_hour'>";
    
        for($i = 8; $i <= 20;$i++){
                
                  $cash_variable .=  "<option class='nlp_actual_hours' value='" . $i . "'>". $i ."</option>";
            
        }
        $cash_variable .="</select>";
        echo $cash_variable;
      }
    }
    
}

add_action('wp_ajax_nlp_day_ajax_reservate_post', 'nlp_day_ajax_reservate_post');
add_action('wp_ajax_nopriv_nlp_day_ajax_reservate_post', 'nlp_day_ajax_reservate_post');


/*

 * 
 * PARAM
 * @month  integer za moeseca koito e izbran za prevod na rabiraem ezik 
 * 
 *  */

function nlp_return_month_name($month) {
    switch ($month) {
        case(1):
            return "Януари";
            break;
        case(2):
            return "Февруари";
            break;
        case(3):
            return "Март";
            break;
        case(4):
            return "Април";
            break;
        case(5):
            return "Май";
            break;
        case(6):
            return "Юни";
            break;
        case(7):
            return "Юли";
            break;
        case(8):
            return "Август";
            break;
        case(9):
            return "Септември";
            break;
        case(10):
            return "Октомври";
            break;
        case(11):
            return "Ноември";
            break;
        case(12):
            return "Декември";
            break;
    }
}

/*

 * return day name 
 *  */

function nlp_return_day_name($month, $year, $day) {
    $date = new DateTime('' . $year . '-' . $month . '-' . $day);
    $result = $date->format('D');
    switch ($result) {
        case('Wed'):
            return "Сряда";
            break;
        case('Thu'):
            return "Четвъртък";
            break;
        case('Fri'):
            return "Петък";
            break;
        case('Sat'):
            return "Събота";
            break;
        case('Sun'):
            return "Неделя";
            break;
        case('Mon'):
            return "Понеделник";
            break;
        case('Tue'):
            return "Вторник";
            break;
    }
}

function nlp_check_date_for_reservation(){
    
    $blocks = array(
        1 => 45,
        2 => 55,
        
        
    );
    
    
}
