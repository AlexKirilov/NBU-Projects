<?php

//

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
    $post_term = wp_get_post_categories($post->ID);

    if (!empty($post_term)) {
        $post_term_chosen = $post_term[0];

        $post_data = get_post($post->ID);
        $post_date = $post_data->post_date;

        $taken_or_not = nlp_check_if_time_is_taken($post_date, $post_term_chosen);



//            $dresscode = get_post_meta($post->ID, '_dresscode', true);
// Echo out the field
        if (empty($nlp_meta_end_time_of_post) || !is_array($nlp_meta_end_time_of_post)) {
            $nlp_meta_end_time_of_post = array(
                1 => "",
                2 => "",
                3 => "",
                4 => "",
                5 => "",
                6 => "",
                7 => "",
                8 => "",
                9 => "",
                10 => "",
                11 => "",
                12 => "",
                13 => "",
                14 => "",
            );
            echo "<h2>Изберете Желаните Часове</h2>";
            echo "<input type='hidden' class='nlp_html_for_meta_box_end_time' id='nlpid_" . $post->ID . "'/>";
            echo "<div class='nlp_check_blocks_style'>";
            foreach ($taken_or_not as $key => $value) {
                if ($value != "") {
                    echo "<div class='nlp_reserved_hour'>" . nlp_human_translator_blocks($key) . "</div>";
                } else {
                    echo "<div class='nlp_check_holder nlp_unchecked_css'><input type='checkbox' name='nlp_blocks' class='nlp_blocks'/>" . nlp_human_translator_blocks($key) . "</div>";
                }
            }
            echo "</div>";
            echo "<div id='nlp_add_end_time_for_post' class='button button-primary button-large'>Обнови</div>";
            echo "<div class='nlp_color_explain'><div class='nlp_u_checked_this'>Часове избрани от вас.</div><div class='nlp_unused_time'>Свободни часове.</div><div class='nlp_taken'>Тези часове са запазени.</div></div>";
            echo "<div class='nlp_responce_of_made_actiona'></div>";
        } else {

            echo "<h2>Изберете Желаните Часове</h2>";

            echo "<input type='hidden' class='nlp_html_for_meta_box_end_time' id='nlpid_" . $post->ID . "'/>";
            echo "<div class='nlp_check_blocks_style'>";
            echo "<div class='nlp_check_holder nlp_checked_css' style='display:none;'></div>";

            for ($i = 0; $i <= 13; $i++) {
                if ($taken_or_not[$i] == "") {
                    if (isset($nlp_meta_end_time_of_post[$i])) {

                        if ($nlp_meta_end_time_of_post[$i] != "") {
                            echo "<div class='nlp_check_holder nlp_checked_css'><input type='checkbox' name='nlp_blocks' class='nlp_blocks' checked /><span>" . nlp_human_translator_blocks($i) . "</span></div>";
                        } else {
                            echo "<div class='nlp_chech_holder nlp_unchecked_css'><input type='checkbox' name='nlp_blocks' class='nlp_blocks'/><span>" . nlp_human_translator_blocks($i) . "</span></div>";
                        }
                    } else {
                        echo "<div class='nlp_unchecked_css nlp_check_holder' ><input type='checkbox' name='nlp_blocks' class='nlp_blocks'/><span>" . nlp_human_translator_blocks($i) . "</span></div>";
                    }
                } else if ($taken_or_not[$i] != "" && $nlp_meta_end_time_of_post[$i] == "") {

                    echo "<div class='nlp_check_holder nlp_reserved_hour'><input type='chechbox' name='nlp_blocks' class='nlp_blocks' checked/><span>" . nlp_human_translator_blocks($i) . "</span></div>";
                } else if ($taken_or_not[$i] != "" && $nlp_meta_end_time_of_post[$i] != "") {
                    echo "<div class='nlp_check_holder nlp_checked_css'><input type='checkbox' name='nlp_blocks' class='nlp_blocks' checked /><span>" . nlp_human_translator_blocks($i) . "</span></div>";
                }
            }

            echo "</div>";
            echo "<div id='nlp_add_end_time_for_post' class='button button-primary button-large'>Обнови</div>";
            echo "<div class='nlp_color_explain'><div class='nlp_u_checked_this'>Часове избрани от вас.</div><div class='nlp_unused_time'>Свободни часове.</div><div class='nlp_taken'>Тези часове са запазени.</div></div>";

            echo "<div class='nlp_responce_of_made_actiona'></div>";
        }
    } else {
        echo "Изберете Зала за това събитие.";
    }
}

/*

 * Human Translator for blocks
 * recives index and returns the hour depending on the index
 * 
 *  */

function nlp_human_translator_blocks($i) {
    switch ($i) {
        case 0 :
            return "8:00 - 8:45";
            break;
        case 1:
            return "8:45 - 9:30";
            break;
        case 2:
            return "9:40 - 10:25";
            break;
        case 3:
            return "10:25 - 11:10";
            break;
        case 4:
            return "11:20 - 12:05";
            break;
        case 5:
            return "12:05 - 10:50";
            break;
        case 6:
            return "13:00 - 13:45";
            break;
        case 7:
            return "13:45 - 14:30";
            break;
        case 8:
            return "14:40 - 15:25";
            break;
        case 9:
            return "15:25 - 16:10";
            break;
        case 10:
            return "16:20 - 17:05";
            break;
        case 11:
            return "17:05 - 17:50";
            break;
        case 12:
            return "18:00 - 18:45";
            break;
        case 13:
            return "18:45 - 19:30";
            break;
        default :
            return "Нереален час.";
            break;
    }
}

/*

 * function to check if any hours are taken from another post (reservation) and disable it from being chosen
 * 
 *  */

function nlp_check_if_time_is_taken($date_input, $hall_number) {

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
        'post_status' => 'any',
        'date_query' => array(
            array(
                'year' => $date_exploded[0],
                'month' => $date_exploded[1],
                'day' => $date_exploded[2],
            ),
        ),
    );

    $query = get_posts($args);
//    if(empty($query)){
//        $the_array = "";
//        return $the_array;
//    }

    $the_array = array(
        0 => "",
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => "",
        10 => "",
        11 => "",
        12 => "",
        13 => "",
    );
    foreach ($query as $data) {
        $post_id = 0;
        foreach ($data as $key_data => $data_value) {

            if ($key_data == 'ID') {

                $post_id = $data_value;
                $post_end_time = get_post_meta($data_value, 'nlp_html_for_meta_box_end_time', true);
                if (is_array($post_end_time)) {
                    foreach ($post_end_time as $key => $value) {

                        if ($value != "") {

                            $the_array[$key] = $value;
                        }
                    }
                }
            }
        }
    }
    return $the_array;
}

/*

 * Ajax function to update_the post_end_time_meta .
 * Reason for ajax , if a new Admin is made and the wordpress is't used,this functionality will be used on both places.
 * 
 *  */



add_action('wp_ajax_nlp_update_post_end_time', 'nlp_update_post_end_time');

function nlp_update_post_end_time() {

    if (isset($_POST['nlp_post_variable_send'], $_POST['nlp_post_variable_id']) && !empty($_POST['nlp_post_variable_send']) && !empty($_POST['nlp_post_variable_id'])) {
        $nlp_value_send_by_ajax = array();
        foreach ($_POST['nlp_post_variable_send'] as $key => $val) {
            $nlp_value_send_by_ajax_val = filter_var($val, FILTER_SANITIZE_STRING);

            if ($key == 0 && $val != "") {

                $nlp_value_send_by_ajax[0] = 01;
            } else {
                array_push($nlp_value_send_by_ajax, $nlp_value_send_by_ajax_val);
            }
        }

        foreach ($nlp_value_send_by_ajax as $key => $v) {

            if ($v == false) {

                $nlp_value_send_by_ajax[$key] = "";
            }
        }
        if (sizeof($nlp_value_send_by_ajax) < 13) {
            for ($i = 0; $i <= 13; $i++) {
                if (!isset($nlp_value_send_by_ajax[$i])) {

                    $nlp_value_send_by_ajax[$i] = "";
                }
            }
        } else if (sizeof($nlp_value_send_by_ajax) > 13) {
            for ($i = sizeof($nlp_value_send_by_ajax); $i >= 13; $i--) {
                if ($i > 13) {
                    unset($nlp_value_send_by_ajax[$i]);
                }
            }
        }

        //  var_dump($nlp_value_send_by_ajax[0]);
        $nlp_value_send_by_ajax_id = filter_input(INPUT_POST, 'nlp_post_variable_id', FILTER_VALIDATE_INT);

        update_post_meta($nlp_value_send_by_ajax_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
        echo "<div class='nlp_responce_ajax'>Обновяването беше направено Успешно.</div>";
    } else {
        echo "<div class='nlp_responce_ajax'>Подали сте неправилни данни!</div>";
    }
}

/*

 * 
 * novata forma za front end starta e depracted (bez S nakraq)
 * 
 * 
 *  */

function nlp_reservations_form() {
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
        if ($object_index != 0) {
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
    $reservation_form .='<div class="nlp_reservation_date">' . nlp_ajax_setter_for_reservation() . '</div>';
    $reservation_form .="<div class='nlp_returned_data'></div>";

    $reservation_form .= "<div class='nlp_email_data'><label for='nlp_email_verification'>Въведете email на който да получите потвърждение.</label><input type='text' name='nlp_email_verification' class='nlp_email_verification' /></div>";

    $reservation_form .="<div class='nlp_repeat_options'><label for='nlp_repeat_for_month'>Повторение на Събитието</label><select id='nlp_repeat_options'><option id='no_repeat' value='1'>Не</option><option id='nlp_certain_date' value='4'>По Дата</option><option id='nlp_repeat_weekly' value='2'>Седмично</option><option class='nlp_repeat_monthly' value='3'>Месечно</option></select></div>";
    $reservation_form .= "<div class='nlp_repeat_event_answer_wrapper'></div>";
    $reservation_form .= "</div>";
    $reservation_form .= "<div id='nlp_reserver_chosen_hours' class='button'>Резервирай</div>";

    return $reservation_form;
}

add_shortcode('nlp_front_reservations', 'nlp_reservations_form');


/*

 * 
 * funkciq za obrabotka na podadenata rezervaciona forma , proverka predi da se zapazi za chasovete predi da bude napravena
 * da vrushta rezervaciqta uspeshna ili ne i ako ne zashto
 *  */

function nlp_reservation_answer_to_client() {
    if (isset($_POST['nlp_value_of_conf_email'], $_POST['nlp_value_of_hours'], $_POST['nlp_value_integer_month'], $_POST['nlp_value_integer_day'], $_POST['nlp_value_integer_year'], $_POST['value_of_chosen_hall'], $_POST['nlp_value_of_name']) && !empty($_POST['nlp_value_of_hours']) && !empty($_POST['nlp_value_of_conf_email']) && !empty($_POST['nlp_value_integer_month']) && !empty($_POST['nlp_value_integer_day']) && !empty($_POST['nlp_value_integer_year']) && !empty($_POST['value_of_chosen_hall']) && !empty($_POST['nlp_value_of_name'])) {
        $date_current_month = filter_input(INPUT_POST, 'nlp_value_integer_month', FILTER_SANITIZE_NUMBER_INT);
        $date_current_day = filter_input(INPUT_POST, 'nlp_value_integer_day', FILTER_SANITIZE_NUMBER_INT);
        $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
        $selected_hall_id = filter_input(INPUT_POST, 'value_of_chosen_hall', FILTER_VALIDATE_INT);
        $event_name = filter_input(INPUT_POST, 'nlp_value_of_name', FILTER_SANITIZE_STRING);
        $confirmation_email = filter_input(INPUT_POST, 'nlp_value_of_conf_email', FILTER_SANITIZE_EMAIL);
        $repeat_option_selected = filter_input(INPUT_POST, 'nlp_value_of_repeat', FILTER_SANITIZE_NUMBER_INT);
        $event_info = filter_input(INPUT_POST, 'nlp_value_of_info', FILTER_SANITIZE_STRING);
        $nlp_value_send_by_ajax = array();
//         var_dump($_POST['nlp_value_of_hours']);
        foreach ($_POST['nlp_value_of_hours'] as $key => $val) {
            $nlp_value_send_by_ajax_val = filter_var($val, FILTER_SANITIZE_NUMBER_INT);

            if ($key == 0 && $val != "") {

                $nlp_value_send_by_ajax[0] = 01;
            } else {
                array_push($nlp_value_send_by_ajax, $nlp_value_send_by_ajax_val);
            }
        }

        foreach ($nlp_value_send_by_ajax as $key => $v) {

            if ($v == false) {

                $nlp_value_send_by_ajax[$key] = "";
            }
        }
        if (sizeof($nlp_value_send_by_ajax) < 13) {
            for ($i = 0; $i <= 13; $i++) {
                if (!isset($nlp_value_send_by_ajax[$i])) {

                    $nlp_value_send_by_ajax[$i] = "";
                }
            }
        } else if (sizeof($nlp_value_send_by_ajax) > 13) {
            for ($i = sizeof($nlp_value_send_by_ajax); $i >= 13; $i--) {
                if ($i > 13) {
                    unset($nlp_value_send_by_ajax[$i]);
                }
            }
        }
        if ($repeat_option_selected == 1) {
            $postdate = $date_current_year . "-" . $date_current_month . "-" . "$date_current_day" . " 8:00:00";

            $post = array(
                'post_content' => $event_info, // The full text of the post.
                'post_name' => $event_name, // The name (slug) for your post
                'post_title' => $event_name, // The title of your post.
                'post_type' => 'post', // Default 'post'.
                'post_status' => 'publish',
                'post_date' => $postdate,
                'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
                //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
                'post_category' => $selected_hall_id, // Default empty.
            );
            $post_categories = array();
            array_push($post_categories, $selected_hall_id);

            $post_id = wp_insert_post($post);
            wp_set_post_categories($post_id, $post_categories, false);
            update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
            echo "<div>Запазването на " . $date_current_year . "-" . $date_current_month . "-" . "$date_current_day" . " беше успешно.</div>";
        } else if ($repeat_option_selected == 4) {
            if (isset($_POST['value_of_repeating_months'], $_POST['value_number_of_months_to_repeat']) && !empty($_POST['value_number_of_months_to_repeat']) && !empty($_POST['value_of_repeating_months'])) {
                $value_of_repeating_months = filter_input(INPUT_POST, 'value_of_repeating_months', FILTER_SANITIZE_NUMBER_INT);
                $value_number_of_months_to_repeat = filter_input(INPUT_POST, 'value_number_of_months_to_repeat', FILTER_SANITIZE_NUMBER_INT);
//               if($value_number_of_months_to_repeat > 24){
//                   $value_number_of_months_to_repeat = 12;
//               }

                $new_month = $date_current_month;
                if ($value_of_repeating_months == 1) {

                    for ($i = 1; $i <= $value_number_of_months_to_repeat; $i++) {
                        if ($i > 12 && $i <= 24) {
                            $k = $date_current_year + 1;

                            $v = $i - 12;
                            $postdate = $k . "-" . $v . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i <= 12) {
                            $postdate = $date_current_year . "-" . $new_month . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i > 24) {
                            $var2 = $i % 12;
                            $var1 = round(($i - $var2) / 10);

                            $p = $i - ($var1 * 12);
                            $k = $var1 + $date_current_year;

                            $postdate = $k . "-" . $p . "-" . "$date_current_day" . " 8:00:00";
                        }


                        $post = array(
                            'post_content' => $event_info, // The full text of the post.
                            'post_name' => $event_name, // The name (slug) for your post
                            'post_title' => $event_name, // The title of your post.
                            'post_type' => 'post', // Default 'post'.
                            'post_status' => 'publish',
                            'post_date' => $postdate,
                            'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
                            //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
                            'post_category' => $selected_hall_id, // Default empty.
                        );
                        $post_categories = array();
                        array_push($post_categories, $selected_hall_id);

                        $post_id = wp_insert_post($post);
                        wp_set_post_categories($post_id, $post_categories, false);
                        update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
                        $new_month++;
                    }
                } else if ($value_of_repeating_months == 2) {

                    for ($i = $date_current_month; $i <= $value_number_of_months_to_repeat + $date_current_month; $i++, $i++) {

                        if ($i > 12 && $i <= 24) {
                            $k = $date_current_year + 1;

                            $v = $i - 12;
                            $postdate = $k . "-" . $v . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i <= 12) {
                            $postdate = $date_current_year . "-" . $i . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i > 24) {
                            $var2 = $i % 12;
                            $var1 = round(($i - $var2) / 10);

                            $p = $i - ($var1 * 12);
                            $k = $var1 + $date_current_year;

                            $postdate = $k . "-" . $p . "-" . "$date_current_day" . " 8:00:00";
                        }
                        $post = array(
                            'post_content' => $event_info, // The full text of the post.
                            'post_name' => $event_name, // The name (slug) for your post
                            'post_title' => $event_name, // The title of your post.
                            'post_type' => 'post', // Default 'post'.
                            'post_status' => 'publish',
                            'post_date' => $postdate,
                            'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
                            //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
                            'post_category' => $selected_hall_id, // Default empty.
                        );
                        $post_categories = array();
                        array_push($post_categories, $selected_hall_id);

                        $post_id = wp_insert_post($post);
                        wp_set_post_categories($post_id, $post_categories, false);
                        update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
                    }
                } else if ($value_of_repeating_months == 3) {
                    for ($i = $date_current_month; $i <= $value_number_of_months_to_repeat + $date_current_month; $i++, $i++, $i++) {


                        if ($i > 12 && $i <= 24) {
                            $k = $date_current_year + 1;

                            $v = $i - 12;
                            $postdate = $k . "-" . $v . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i <= 12) {
                            $postdate = $date_current_year . "-" . $i . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i > 24) {
                            $var2 = $i % 12;
                            $var1 = round(($i - $var2) / 10);

                            $p = $i - ($var1 * 12);
                            $k = $var1 + $date_current_year;

                            $postdate = $k . "-" . $p . "-" . "$date_current_day" . " 8:00:00";
                        }

//           
                        $post = array(
                            'post_content' => $event_info, // The full text of the post.
                            'post_name' => $event_name, // The name (slug) for your post
                            'post_title' => $event_name, // The title of your post.
                            'post_type' => 'post', // Default 'post'.
                            'post_status' => 'publish',
                            'post_date' => $postdate,
                            'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
                            //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
                            'post_category' => $selected_hall_id, // Default empty.
                        );
                        $post_categories = array();
                        array_push($post_categories, $selected_hall_id);

                        $post_id = wp_insert_post($post);
                        wp_set_post_categories($post_id, $post_categories, false);
                        update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
                    }
                } else if ($value_of_repeating_months == 4) {
                    for ($i = $date_current_month; $i <= $value_number_of_months_to_repeat + $date_current_month; $i++, $i++, $i++, $i++) {

                        if ($i > 12 && $i <= 24) {
                            $k = $date_current_year + 1;

                            $v = $i - 12;
                            $postdate = $k . "-" . $v . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i <= 12) {
                            $postdate = $date_current_year . "-" . $i . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i > 24) {
                            $var2 = $i % 12;
                            $var1 = round(($i - $var2) / 10);

                            $p = $i - ($var1 * 12);
                            $k = $var1 + $date_current_year;

                            $postdate = $k . "-" . $p . "-" . "$date_current_day" . " 8:00:00";
                        }



//           
                        $post = array(
                            'post_content' => $event_info, // The full text of the post.
                            'post_name' => $event_name, // The name (slug) for your post
                            'post_title' => $event_name, // The title of your post.
                            'post_type' => 'post', // Default 'post'.
                            'post_status' => 'publish',
                            'post_date' => $postdate,
                            'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
                            //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
                            'post_category' => $selected_hall_id, // Default empty.
                        );
                        $post_categories = array();
                        array_push($post_categories, $selected_hall_id);

                        $post_id = wp_insert_post($post);
                        wp_set_post_categories($post_id, $post_categories, false);
                        update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
                    }
                } else if ($value_of_repeating_months == 6) {
                    for ($i = $date_current_month; $i <= $value_number_of_months_to_repeat + $date_current_month; $i++, $i++, $i++, $i++, $i++, $i++) {

                        if ($i > 12 && $i <= 24) {
                            $k = $date_current_year + 1;

                            $v = $i - 12;
                            $postdate = $k . "-" . $v . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i <= 12) {
                            $postdate = $date_current_year . "-" . $i . "-" . "$date_current_day" . " 8:00:00";
                        } else if ($i > 24) {
                            $var2 = $i % 12;
                            $var1 = round(($i - $var2) / 10);

                            $p = $i - ($var1 * 12);
                            $k = $var1 + $date_current_year;

                            $postdate = $k . "-" . $p . "-" . "$date_current_day" . " 8:00:00";
                        }



//           
                        $post = array(
                            'post_content' => $event_info, // The full text of the post.
                            'post_name' => $event_name, // The name (slug) for your post
                            'post_title' => $event_name, // The title of your post.
                            'post_type' => 'post', // Default 'post'.
                            'post_status' => 'publish',
                            'post_date' => $postdate,
                            'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
                            //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
                            'post_category' => $selected_hall_id, // Default empty.
                        );
                        $post_categories = array();
                        array_push($post_categories, $selected_hall_id);

                        $post_id = wp_insert_post($post);
                        wp_set_post_categories($post_id, $post_categories, false);
                        update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
                    }
                }
            }
        } else if ($repeat_option_selected == 2) {
            //sedmichna funckiq za zapazvane tuk , mnogo razburkano inache 
            $date_current_month = filter_input(INPUT_POST, 'nlp_value_integer_month', FILTER_SANITIZE_NUMBER_INT);
            $date_current_day = filter_input(INPUT_POST, 'nlp_value_integer_day', FILTER_SANITIZE_NUMBER_INT);
            $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
            $selected_hall_id = filter_input(INPUT_POST, 'value_of_chosen_hall', FILTER_VALIDATE_INT);
            $event_name = filter_input(INPUT_POST, 'nlp_value_of_name', FILTER_SANITIZE_STRING);
            $confirmation_email = filter_input(INPUT_POST, 'nlp_value_of_conf_email', FILTER_SANITIZE_EMAIL);
            $repeat_option_selected = filter_input(INPUT_POST, 'nlp_value_of_repeat', FILTER_SANITIZE_NUMBER_INT);
            $event_info = filter_input(INPUT_POST, 'nlp_value_of_info', FILTER_SANITIZE_STRING);

            weekly_selected_save_reservation($date_current_month, $date_current_day, $date_current_year, $selected_hall_id, $event_name, $confirmation_email, $event_info, $nlp_value_send_by_ajax);
        } else if ($repeat_option_selected == 3) {
            //mesechna funkciq tuk za zapazvane 
            monthly_selected_save_reservation($date_current_month, $date_current_day, $date_current_year, $selected_hall_id, $event_name, $confirmation_email, $event_info, $nlp_value_send_by_ajax);
        }
    }
}

add_action('wp_ajax_nlp_reservation_answer_to_client', 'nlp_reservation_answer_to_client');
add_action('wp_ajax_nopriv_nlp_reservation_answer_to_client', 'nlp_reservation_answer_to_client');


/*

 * sedmichna funkciq za registracionnata funkciq za zapazvane 
 * za VSEKI izbran den po ime (ponedelnik ,vtornik etc.etc.)
 * po nadolu funkciq za prez vtornik ili 2 i t.n.
 * 
 *  */

function weekly_selected_save_reservation($date_current_month, $date_current_day, $date_current_year, $selected_hall_id, $event_name, $confirmation_email, $event_info, $nlp_value_send_by_ajax) {
    if (isset($_POST['nlp_meta_data_for_day_of_week'], $_POST['value_number_of_months_to_repeat']) && !empty($_POST['value_number_of_months_to_repeat']) && !empty($_POST['nlp_meta_data_for_day_of_week'])) {
        $value_number_of_months_to_repeat = filter_input(INPUT_POST, 'value_number_of_months_to_repeat', FILTER_SANITIZE_NUMBER_INT);
        $value_of_week_repeting = filter_input(INPUT_POST, 'value_of_week_repeting', FILTER_SANITIZE_NUMBER_INT);
        if ($value_of_week_repeting == 100) {
            $value_of_week_repeting = 0;
        }

        $days_selected_array = array(
            'Mon' => "",
            'Tue' => "",
            'Wed' => "",
            'Thu' => "",
            'Fri' => "",
            'Sat' => "",
            'Sun' => "",
        );
        $value_of_nlp_repeat_if_free = filter_input(INPUT_POST, 'value_of_nlp_repeat_if_free', FILTER_SANITIZE_STRING);
        foreach ($_POST['nlp_meta_data_for_day_of_week'] as $k => $data) {
            $days_of_week_selected = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
            if ($k == 1) {
                $days_selected_array['Mon'] = $data;
            } else if ($k == 2) {
                $days_selected_array['Tue'] = $data;
            } else if ($k == 3) {
                $days_selected_array['Wed'] = $data;
            } else if ($k == 4) {
                $days_selected_array['Thu'] = $data;
            } else if ($k == 5) {
                $days_selected_array['Fri'] = $data;
            } else if ($k == 6) {
                $days_selected_array['Sat'] = $data;
            } else if ($k == 7) {
                $days_selected_array['Sun'] = $data;
            }
//             array_push($days_selected_array, $days_of_week_selected);
        }
        var_dump($days_selected_array);

        $dates_possible_and_not = array(
            "da" => array(),
            "ne" => array(),
        );
        $cnt = $value_of_week_repeting;
        for ($i = $date_current_month; $i <= $value_number_of_months_to_repeat + $date_current_month; $i++) {

            $number = cal_days_in_month(CAL_GREGORIAN, $i, $date_current_year);
            for ($k = 1; $k <= $number; $k++) {
                if ($i > 12 && $i <= 24) {
                    $f = $date_current_year + 1;

                    $v = $i - 12;
                    $postdate = $f . "-" . $v . "-" . $k . " 8:00:00";
                } else if ($i <= 12) {
                    $postdate = $date_current_year . "-" . $i . "-" . $k . " 8:00:00";
                } else if ($i > 24) {
                    $var2 = $i % 12;
                    $var1 = round(($i - $var2) / 10);

                    $p = $i - ($var1 * 12);
                    $f = $var1 + $date_current_year;

                    $postdate = $f . "-" . $p . "-" . $k . " 8:00:00";
                }

                $free_reservation = array();
                $day_name = check_day_of_week($postdate);

                $day_taken_times = nlp_check_if_time_is_taken($postdate, $selected_hall_id);

                foreach ($nlp_value_send_by_ajax as $kk => $vall) {

                    if ($vall != "") {

                        if ($day_taken_times[$kk] != "") {
                            $free_reservation[$postdate] = "ne";
                        }
                    }
                }
//tova e za denqt kojto trqbva da se zapzva (ponedelnik ili petuk ili i dvete i t.n.) tova raboti corektno
                $get_sunday = $day_name;

                if ($cnt == $value_of_week_repeting) {

                    if ($days_selected_array[$day_name] != "") {
                        // var_dump("----" . $postdate);
                        if ($free_reservation[$postdate] == "ne") {
                            $dates_possible_and_not['ne'][$postdate] = "ne";
                            // var_dump($day_name);
                        } else {
                            $dates_possible_and_not['da'][$postdate] = "da";
                            //var_dump($day_name);
                        }
                    }
                    if ($get_sunday == "Sun") {
                        $cnt = 1;
                        //  var_dump($cnt . "inside");
                    }
                } elseif ($cnt < $value_of_week_repeting) {

                    if ($get_sunday == "Sun") {
                        $cnt++;
                        //     var_dump("2-".$cnt);
                    }
                } elseif ($cnt > $value_of_week_repeting) {
                    // var_dump($get_sunday);
                    if ($get_sunday == "Sun") {
                        $cnt = 1;
                        //     var_dump("1-".$cnt);
                    }
                }
            }
        }
        if ($value_of_nlp_repeat_if_free == "Yes") {
//              var_dump($dates_possible_and_not);
            foreach ($dates_possible_and_not['da'] as $key => $val) {
//              
//                       $post = array(
//                        'post_content' => $event_info, // The full text of the post.
//                        'post_name' => $event_name, // The name (slug) for your post
//                        'post_title' => $event_name, // The title of your post.
//                        'post_type' => 'post', // Default 'post'.
//                        'post_status' => 'publish',
//                        'post_date' => $key,
//                        'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
//                        //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
//                        'post_category' => $selected_hall_id, // Default empty.
//                    );
//                    $post_categories = array();
//                    array_push($post_categories, $selected_hall_id);
//
//                    $post_id = wp_insert_post($post);
//                    wp_set_post_categories($post_id, $post_categories, false);
//                    update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
//                
            }
            echo "<div class='nlp_reserved_and_close'><h3>Заети дати за дадените параметри</h3>";
            foreach ($dates_possible_and_not['ne'] as $kkk => $bbbb) {
                echo "<p>" . $kkk . "</p>";
            }
//            var_dump($free_reservation);
            echo "<p>Свободните Часове са запазени.</p>";
            echo "</div>";
        } else {
            echo "<div class='nlp_possibilities'>";
            foreach ($dates_possible_and_not as $k => $b) {
                if ($k == "da") {
                    echo "<div class='nlp_free_and_open'><h3>Свободни дати за дадените параметри</h3>";
                } else {
                    echo "<div class='nlp_reserved_and_close'><h3>Заети дати за дадените параметри</h3>";
                }
                foreach ($b as $d => $s) {
                    echo "<p>" . $d . "</p>";
                }
                echo "</div>";
            }
            echo "</div>";
        }
    }
}



/*

 * Prashtane na mail funkciq s kirlica za izprashtaneto kato otgovor ,che zalata e zapazena uspeshno 
 * 
 *  */

function nlp_mail_sender_function($send_do){
    // multiple recipients
    //$to  = 'aidan@example.com' . ', '; // note the comma
    $to = $send_do;

// subject
$subject = 'Вие запзихте Семинарна зала в Библиотеката на НБУ';

// message
$message = '
<html>
<head>
  <title>Отговор на резервацията.</title>
</head>
<body>
  <p>Вие успешно резервирахте залата!</p>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
//$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
    
}



/*

 * check if current day is a current day of the week 
 * 
 *  */

function check_day_of_week($postdate) {
    $date = new DateTime($postdate);
    $result = $date->format('D');
    return $result;
}

/*

 * mesechna funkciq za registracionnata funkciq za zapazvane 
 * 
 * 
 *  */

function monthly_selected_save_reservation($date_current_month, $date_current_day, $date_current_year, $selected_hall_id, $event_name, $confirmation_email, $event_info, $nlp_value_send_by_ajax) {
    if (isset($_POST['nlp_meta_data_for_day_of_week'], $_POST['value_of_repeating_months'], $_POST['value_number_of_months_to_repeat']) && !empty($_POST['value_number_of_months_to_repeat']) && !empty($_POST['value_number_of_months_to_repeat']) && !empty($_POST['nlp_meta_data_for_day_of_week'])) {
        $value_number_of_months_to_repeat = filter_input(INPUT_POST, 'value_number_of_months_to_repeat', FILTER_SANITIZE_NUMBER_INT);
        $value_of_week_repeting = filter_input(INPUT_POST, 'value_of_week_repeting', FILTER_SANITIZE_NUMBER_INT);
        $value_of_repeating_months = filter_input(INPUT_POST, 'value_of_repeating_months', FILTER_SANITIZE_NUMBER_INT);

        $days_selected_array = array(
            'Mon' => "",
            'Tue' => "",
            'Wed' => "",
            'Thu' => "",
            'Fri' => "",
            'Sat' => "",
            'Sun' => "",
        );
        $value_of_nlp_repeat_if_free = filter_input(INPUT_POST, 'value_of_nlp_repeat_if_free', FILTER_SANITIZE_STRING);
        foreach ($_POST['nlp_meta_data_for_day_of_week'] as $k => $data) {
            $days_of_week_selected = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
            if ($k == 1) {
                $days_selected_array['Mon'] = $data;
            } else if ($k == 2) {
                $days_selected_array['Tue'] = $data;
            } else if ($k == 3) {
                $days_selected_array['Wed'] = $data;
            } else if ($k == 4) {
                $days_selected_array['Thu'] = $data;
            } else if ($k == 5) {
                $days_selected_array['Fri'] = $data;
            } else if ($k == 6) {
                $days_selected_array['Sat'] = $data;
            } else if ($k == 7) {
                $days_selected_array['Sun'] = $data;
            }
//             array_push($days_selected_array, $days_of_week_selected);
        }


        $dates_possible_and_not = array(
            "da" => array(),
            "ne" => array(),
        );

        $cnt = $value_of_week_repeting;
        $mnt_cnt = $value_of_repeating_months;
        $year_incremented = $date_current_year;

        for ($i = $date_current_month; $i <= $value_number_of_months_to_repeat + $date_current_month; $i++) {


            if ($i > 12 && $i <= 24) {

                $number = cal_days_in_month(CAL_GREGORIAN, ($i - 12), $year_incremented);
            } elseif ($i > 24 && $i <= 36) {
                // var_dump("IF ELSE 24 NUMBER");
                $number = cal_days_in_month(CAL_GREGORIAN, ($i - 24), $year_incremented);
            } elseif ($i > 36 && $i <= 48) {
                $number = cal_days_in_month(CAL_GREGORIAN, ($i - 36), $year_incremented);
            } elseif ($i > 48 && $i <= 60) {
                $number = cal_days_in_month(CAL_GREGORIAN, ($i - 48), $year_incremented);
            } elseif ($i > 60) {
                $number = cal_days_in_month(CAL_GREGORIAN, ($i - 60), $year_incremented);
            } else {
                $number = cal_days_in_month(CAL_GREGORIAN, $i, $year_incremented);
            }
            //var_dump($number."alskodjhasjvdnqwbm,k;lasidhughqweqwleasd");
            for ($k = 1; $k <= $number; $k++) {
//                if ($i > 12) {
//                     $year_incremented = $date_current_year + 1;
//                    if($i == 13){
//                       $mont_cnt  = 1;
//                        $v = 1;
//                    }elseif($i > 13){
//                        $v = $i - 12  ;
//                    }
//                    var_dump($year_incremented."y1");

                if ($i > 12 && $i <= 24) {
                    //       var_dump("<p>ssss". ($i-12) ."</p>");
                    $postdate = $year_incremented . "-" . ($i - 12) . "-" . $k . " 8:00:00";
                    //   var_dump($year_incremented."y1".$year_incremented . "-" . $i-12 . "-" . $k . " 8:00:00");
                } elseif ($i > 24 && $i <= 36) {

                    $postdate = $year_incremented . "-" . ($i - 24) . "-" . $k . " 8:00:00";
                    // var_dump($year_incremented."y2".$postdate);
                } elseif ($i > 36 && $i <= 48) {

                    $postdate = $year_incremented . "-" . ($i - 36) . "-" . $k . " 8:00:00";
                    // var_dump($year_incremented."y3".$postdate);
                } elseif ($i > 48 && $i <= 60) {
                    $postdate = $year_incremented . "-" . ($i - 48) . "-" . $k . " 8:00:00";
                    // var_dump($year_incremented."y4".$postdate);
                } elseif ($i > 60) {
                    $postdate = $year_incremented . "-" . ($i - 60) . "-" . $k . " 8:00:00";
                    //  var_dump($year_incremented."y5".$postdate);
                } else {
                    // var_dump($year_incremented."y");
                    $postdate = $year_incremented . "-" . $i . "-" . $k . " 8:00:00";
                }
//                    $postdate = $year_incremented . "-" . $i . "-" . $k . " 8:00:00";
                //var_dump($postdate." NIE");
//                } else if ($i <= 12) {
//                    $postdate = $date_current_year . "-" . $i . "-" . $k . " 8:00:00";
//                } else if ($i > 24) {
//                    $var2 = $i % 12;
//                    $var1  = (int)round(($i - $var2) / 10);
//                    var_dump($var1."var1");
//                    var_dump($var2."var2");
//                    $p = $i - ($var1 * 12);
//                    $year_incremented = $var1 + $date_current_year;
//                    var_dump('<p>'.$var1."date curent year".$date_current_year."</p>");
//                    $postdate = $year_incremented . "-" . $p . "-" . $k . " 8:00:00";
//                    
//                }

                $free_reservation = array();
                //  var_dump("<p>".$postdate."MAJKA TI </p>");
                $day_name = check_day_of_week($postdate);

                $day_taken_times = nlp_check_if_time_is_taken($postdate, $selected_hall_id);

                foreach ($nlp_value_send_by_ajax as $kk => $vall) {

                    if ($vall != "") {

                        if ($day_taken_times[$kk] != "") {
                            $free_reservation[$postdate] = "ne";
                        }
                    }
                }
//tova e za denqt kojto trqbva da se zapzva (ponedelnik ili petuk ili i dvete i t.n.) tova raboti corektno
                $get_sunday = $day_name;

                if ($cnt == $value_of_week_repeting) {

                    if ($days_selected_array[$day_name] != "") {
//                             var_dump("----" . $postdate);
                        if ($free_reservation[$postdate] == "ne") {
                            $dates_possible_and_not['ne'][$postdate] = "ne";
                            // var_dump($day_name);
                        } else {
                            $dates_possible_and_not['da'][$postdate] = "da";
                            //var_dump($day_name);
                        }
                    }
                    if ($get_sunday == "Sun") {
                        $cnt = 1;
//                            var_dump($cnt . "inside");
                    }
                } elseif ($cnt < $value_of_week_repeting) {

                    if ($get_sunday == "Sun") {
                        $cnt++;
//                            var_dump("2-".$cnt);
                    }
                } elseif ($cnt > $value_of_week_repeting) {
//                    var_dump("sund".$get_sunday);
                    if ($get_sunday == "Sun") {
                        $cnt = 1;
//                            var_dump("1-".$cnt);
                    }
                }
            }
            if ($i > 12 && $i <= 24) {
//                     var_dump(gregoriantojd($i-12,1,$year_incremented)."INNNNASDNASNDNASDNASDJASDHAKSUDHKWQHEKQWHE");
                $jd = gregoriantojd(($i - 12), 1, $year_incremented);
            } elseif ($i > 24 && $i <= 36) {
//                           var_dump(gregoriantojd($i-24,1,$year_incremented)."INNNNASDNASNDNASDNASDJASDHAKSUDHKWQHEKQWHE");
                $jd = gregoriantojd(($i - 24), 1, $year_incremented);
            } elseif ($i > 36 && $i <= 48) {
//                           var_dump(gregoriantojd($i-36,1,$year_incremented)."INNNNASDNASNDNASDNASDJASDHAKSUDHKWQHEKQWHE");
                $jd = gregoriantojd(($i - 36), 1, $year_incremented);
            } elseif ($i > 48 && $i <= 60) {
//                           var_dump(gregoriantojd($i-48,1,$year_incremented)."INNNNASDNASNDNASDNASDJASDHAKSUDHKWQHEKQWHE");
                $jd = gregoriantojd(($i - 48), 1, $year_incremented);
            } elseif ($i > 60) {
//                           var_dump(gregoriantojd($i-60,1,$year_incremented)."INNNNASDNASNDNASDNASDJASDHAKSUDHKWQHEKQWHE");
                $jd = gregoriantojd(($i - 60), 1, $year_incremented);
            } else {
//                           var_dump(gregoriantojd($i,1,$year_incremented)."INNNNASDNASNDNASDNASDJASDHAKSUDHKWQHEKQWHE");
                $jd = gregoriantojd($i, 1, $year_incremented);
            }

//            var_dump(jdmonthname($jd,0) . ":::::::".$jd);
            //  die(var_dump(jdmonthname($jd,0)));
            if (jdmonthname($jd, 0) == "Dec") {
                $year_incremented++;
                //  var_dump($year_incremented."poduhasjlkqwe");
            }
        }
        if ($value_of_nlp_repeat_if_free == "Yes") {
//              var_dump($dates_possible_and_not);
            foreach ($dates_possible_and_not['da'] as $key => $val) {
//              
//                       $post = array(
//                        'post_content' => $event_info, // The full text of the post.
//                        'post_name' => $event_name, // The name (slug) for your post
//                        'post_title' => $event_name, // The title of your post.
//                        'post_type' => 'post', // Default 'post'.
//                        'post_status' => 'publish',
//                        'post_date' => $key,
//                        'ping_status' => 'closed', // Pingbacks or trackbacks allowed. Default is the option 'default_ping_status'.
//                        //  'post_excerpt'   => [ <string> ] // For all your post excerpt needs.
//                        'post_category' => $selected_hall_id, // Default empty.
//                    );
//                    $post_categories = array();
//                    array_push($post_categories, $selected_hall_id);
//
//                    $post_id = wp_insert_post($post);
//                    wp_set_post_categories($post_id, $post_categories, false);
//                    update_post_meta($post_id, 'nlp_html_for_meta_box_end_time', $nlp_value_send_by_ajax);
//                
            }
            echo "<div class='nlp_reserved_and_close'><h3>Заети дати за дадените параметри</h3>";
            foreach ($dates_possible_and_not['ne'] as $kkk => $bbbb) {
                echo "<p>" . $kkk . "</p>";
            }
//            var_dump($free_reservation);
            echo "<p>Свободните Часове са запазени.</p>";
            echo "</div>";
        } else {
            echo "<div class='nlp_possibilities'>";
            foreach ($dates_possible_and_not as $k => $b) {
                if ($k == "da") {
                    echo "<div class='nlp_free_and_open'><h3>Свободни дати за дадените параметри</h3>";
                } else {
                    echo "<div class='nlp_reserved_and_close'><h3>Заети дати за дадените параметри</h3>";
                }
                foreach ($b as $d => $s) {
                    echo "<p>" . $d . "</p>";
                }
                echo "</div>";
            }
            echo "</div>";
        }
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
    var_dump($real_data);
    return $real_data;
}

/*

 * Shortcod za front end-a (formata za suzdavane na rezervaciite i setvane na dannite pri suzdavane na posta
 * depricated 
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
//    if (isset($_POST['nlp_value_integer_send']) && !empty($_POST['nlp_value_integer_send'])) {
//        $category_term_id = filter_input(INPUT_POST, 'nlp_value_integer_send', FILTER_SANITIZE_NUMBER_INT);
    $return_possible_days_months = "";
    $date_current_month = date('m');
    $date_current_year = date('y');
    $return_possible_days_months .= "<div id='nlp_month'>";

    for ($i = $date_current_month; $i <= 12; $i++) {
        $return_possible_days_months .='<div class="nlp_possible_month" id="' . $i . '">' . nlp_return_month_name($i) . "</div>";
    }

    $return_possible_days_months .= "</div>";

    $return_possible_days_months .= "<select id='nlp_year'>";
    $return_possible_days_months .='<option id="nlp_possible_year" value="' . ($date_current_year + 2000) . '">' . ($date_current_year + 2000) . "</option>";
    for ($k = (2000 + $date_current_year); $k <= ($date_current_year + 2000) + 10; $k++) {
        if ($k != $date_current_year + 2000) {
            $return_possible_days_months .='<option id="nlp_possible_year" value="' . $k . '">' . $k . "</option>";
        }
    }

    $return_possible_days_months .= "</select>";
    $return_possible_days_months .= "<div class='nlp_days_of_month'></div>";
    $return_possible_days_months .= "<div class='nlp_taken_hours_for_day'></div>";
    $return_possible_days_months .= "<div class='nlp_name_holder'><label for='nlp_name_of_lection'>Име на Събитието</label><input type='text' size='50' name='nlp_name_of_lection' class='nlp_name_of_lection'> </div>";
    $return_possible_days_months .= "<div class='nlp_more_information_for_event'><label for='nlp_event_information'>Повече информация за Събитието</label><textarea  name='nlp_event_information' class='nlp_event_information' rows='4' cols='50'></textarea></div>";

    return $return_possible_days_months;
//    }
}

//add_action('wp_ajax_nlp_ajax_setter_for_reservation', 'nlp_ajax_setter_for_reservation');
//add_action('wp_ajax_nopriv_nlp_ajax_setter_for_reservation', 'nlp_ajax_setter_for_reservation');

/*

 * ajax za dnite ot dadeniqt mesec (razlichen broj neobhodimo dinamichno promenqne)
 * 
 *  */

function nlp_day_of_month() {

    if (isset($_POST['nlp_value_integer_month'], $_POST['nlp_value_integer_year']) && !empty($_POST['nlp_value_integer_month']) && !empty($_POST['nlp_value_integer_year'])) {
        $date_current_month = filter_input(INPUT_POST, 'nlp_value_integer_month', FILTER_SANITIZE_NUMBER_INT);
        $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $date_current_month, $date_current_year);
        $return_days = "<div id='nlp_selected_day'>";

        for ($i = 1; $i <= $days_in_month; $i++) {
            $day_name_class = nlp_return_day_name_english($date_current_month, $date_current_year, $i);
            if ($i == 1) {
                $return_days .= nlp_calendar_view($day_name_class) . "<div class='nlp_day_selected nlp_" . nlp_return_day_name_english($date_current_month, $date_current_year, $i) . "' value='" . $i . "' title='" . nlp_return_day_name($date_current_month, $date_current_year, $i) . "'> (" . $i . ")</div>";
            } else {
                $return_days .= "<div class='nlp_day_selected nlp_" . nlp_return_day_name_english($date_current_month, $date_current_year, $i) . "' value='" . $i . "' title='" . nlp_return_day_name($date_current_month, $date_current_year, $i) . "'> (" . $i . ")</div>";
            }
        }
        $return_days .= "</div>";
        echo $return_days;
    }
}

add_action('wp_ajax_nlp_day_of_month', 'nlp_day_of_month');
add_action('wp_ajax_nopriv_nlp_day_of_month', 'nlp_day_of_month');

/*

 * ajax za mesecite
 * 
 *  */

function nlp_months_front_change() {

    if (isset($_POST['nlp_value_integer_year']) && !empty($_POST['nlp_value_integer_year'])) {
        $date_current_month = date('m');

        $date_current_years = date('y');

        $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
        if ($date_current_year != ($date_current_years + 2000)) {



            for ($i = 1; $i <= 12; $i++) {
                $return_possible_days_months .='<div class="nlp_possible_month" id="' . $i . '">' . nlp_return_month_name($i) . "</div>";
            }
        } else {

            for ($i = $date_current_month; $i <= 12; $i++) {
                $return_possible_days_months .='<div class="nlp_possible_month" id="' . $i . '">' . nlp_return_month_name($i) . "</div>";
            }
        }
        echo $return_possible_days_months;
    }
}

add_action('wp_ajax_nlp_months_front_change', 'nlp_months_front_change');
add_action('wp_ajax_nopriv_nlp_months_front_change', 'nlp_months_front_change');


/*

 * calendar view depending on day 
 *  */

function nlp_calendar_view($name) {
    if ($name == 'friday') {
        return "<div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div>";
    } else if ($name == 'monday') {
        return "";
    } else if ($name == 'sunday') {
        return "<div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div>";
    } else if ($name == 'tuesday') {
        return "<div class='nlp_day_selected_dummy_day'></div>";
    } else if ($name == 'thursday') {
        return "<div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div>";
    } else if ($name == 'wednesday') {
        return "<div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div>";
    } else if ($name == 'saturday') {
        return "<div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div><div class='nlp_day_selected_dummy_day'></div>";
    } else {
        return "";
    }
}

/*


 * ajax za vrushtane na svobodnite blockove za izbraniqt den
 *  
 *  */

function nlp_day_ajax_reservate_posts() {

    if (isset($_POST['nlp_value_integer_month'], $_POST['value_of_chosen_hall'], $_POST['nlp_value_integer_year'], $_POST['nlp_value_integer_day']) && !empty($_POST['value_of_chosen_hall']) && !empty($_POST['nlp_value_integer_day']) && !empty($_POST['nlp_value_integer_month']) && !empty($_POST['nlp_value_integer_year'])) {
        $date_current_month = filter_input(INPUT_POST, 'nlp_value_integer_month', FILTER_SANITIZE_NUMBER_INT);
        $date_current_day = filter_input(INPUT_POST, 'nlp_value_integer_day', FILTER_SANITIZE_NUMBER_INT);
        $date_current_year = filter_input(INPUT_POST, 'nlp_value_integer_year', FILTER_SANITIZE_NUMBER_INT);
        $selected_hall_id = filter_input(INPUT_POST, 'value_of_chosen_hall', FILTER_VALIDATE_INT);
        $cash_variable = "";
        $data = nlp_check_if_time_is_taken($date_current_year . "-" . $date_current_month . "-" . $date_current_day, $selected_hall_id);
        $cash_variable .= "<div class='nlp_holder_frond_reservations'>";
        foreach ($data as $key_block => $value_block) {
            if ($value_block != "") {
                $cash_variable .= "<div class='nlp_reserved_hours nlp_possible_reservation_hour'>Запазен " . nlp_human_translator_blocks($key_block) . "</div>";
            } else {
                $cash_variable .= "<div class='nlp_free_hours nlp_possible_reservation_hour'  id='nlp_target_" . $key_block . "'>Свободен " . nlp_human_translator_blocks($key_block) . "<input type='checkbox' name='nlp_checked_block' class='nlp_checked_block' /></div>";
            }
        }
        $cash_variable .= "</div>";
        echo $cash_variable;
    }
}

add_action('wp_ajax_nlp_day_ajax_reservate_posts', 'nlp_day_ajax_reservate_posts');
add_action('wp_ajax_nopriv_nlp_day_ajax_reservate_posts', 'nlp_day_ajax_reservate_posts');



/*


 * ajax za vrushtane na realni danni dali za chasovete za izbraniqt den 
 *  depricated
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
        if (!empty($data)) {
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
            foreach ($hours_to_miss as $key => $hour_min) {
                $split_hours_min = explode(':', $hour_min);
                if ($chift_cnt % 2 != 0) {
                    $first_hour = $split_hours_min[0];
                }
                if (!isset($hours[$first_hour])) {
                    $hours[$first_hour] = $first_hour;
                    if ($chift_cnt % 2 != 0) {
                        $first_hour = $split_hours_min[0];
                    } else {
                        $hours[$first_hour] .= $split_hours_min[0];
                    }
                } else {
                    $hours[$first_hour] = $first_hour;
                    if ($chift_cnt % 2 != 0) {
                        $first_hour = $split_hours_min[0];
                    } else {
                        $hours[$first_hour] .= "_" . $split_hours_min[0];
                    }
                }

                $chift_cnt++;
            }

            $cash_variable .= "<select id='nlp_poss_hour'>";

            for ($i = 8; $i <= 20; $i++) {
                if (isset($hours[$i]) && !empty($hours[$i])) {
                    $split = explode('_', $hours[$i]);
                    if ($split[0] < $i && $split[1] > $i) {
                        $cash_variable .= "<option class='nlp_actual_hours' value='" . $i . "'>" . $i . "</option>";
                    } else {
                        $i++;
                    }
                } else {

                    $cash_variable .= "<option class='nlp_actual_hours' value='" . $i . "'>" . $i . "</option>";
                }
            }
            $cash_variable .="</select>";
            echo $cash_variable;
        } else {
            $cash_variable .= "<select id='nlp_poss_hour'>";

            for ($i = 8; $i <= 20; $i++) {

                $cash_variable .= "<option class='nlp_actual_hours' value='" . $i . "'>" . $i . "</option>";
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
            return "Яну";
            break;
        case(2):
            return "Фев";
            break;
        case(3):
            return "Март";
            break;
        case(4):
            return "Апр";
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
            return "Авг";
            break;
        case(9):
            return "Сеп";
            break;
        case(10):
            return "Окт";
            break;
        case(11):
            return "Ноем";
            break;
        case(12):
            return "Дек";
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

/*

 * return day name english for class name
 *  */

function nlp_return_day_name_english($month, $year, $day) {
    $date = new DateTime('' . $year . '-' . $month . '-' . $day);
    $result = $date->format('D');
    switch ($result) {
        case('Wed'):
            return "wednesday";
            break;
        case('Thu'):
            return "thursday";
            break;
        case('Fri'):
            return "friday";
            break;
        case('Sat'):
            return "saturday";
            break;
        case('Sun'):
            return "sunday";
            break;
        case('Mon'):
            return "monday";
            break;
        case('Tue'):
            return "tuesday";
            break;
    }
}

function nlp_check_date_for_reservation() {

    $blocks = array(
        1 => 45,
        2 => 55,
    );
}

/*

 * funkciq za vrushtane na forma za povtorenie na eventa
 * 
 *  */

function nlp_repeat_event_chosen() {
    if (isset($_POST['nlp_value_ichecked']) && !empty($_POST['nlp_value_ichecked'])) {
        $value_of_checkbox = filter_input(INPUT_POST, 'nlp_value_ichecked', FILTER_VALIDATE_INT);
        $register_repeat = "";

        if ($value_of_checkbox == 2) {
            $register_repeat .= "<div class='nlp_repeat_weeakly_wrapper'>";
            $register_repeat .= "<label for='nlp_each_week'>Да се повтаря всяка</label><select id='nlp_each_week'><option id='nlp_week_all' value='1'> седмица</option><option id='nlp_week_two' value='2'>2 седмици</option><option id='nlp_week_three' value='3'>3 седмици</option><option id='nlp_week_four' value='4'>4 седмици</option></select>";
            $register_repeat .="<div class='nlp_each_week_day_chosen_wrapper'><label for='nlp_each_week_day_chosen'>Да се повтаря в :</label><input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>П<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>В<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>С<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>Ч<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>П<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>С<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>Н";
            $register_repeat .= "<p class='nlp_repeat_inforamtion'> ! Начало се смята текущо вкараната дата и час по-горе във формата. !</p>";
            $register_repeat .= "<div class='nlp_repeat_possible'><input type='checkbox' class='nlp_repeat_if_free' name='nlp_repeat_if_free' />Ако има заети дати ,запази всички без заетите.<p>Забележка! Ако не изберете тази опиция и часовете са заети ,ще ви бъдат показани датите на който неможете да запазите часове.</p></div>";
            $register_repeat .= "<div class='nlp_monly_repeat_times'><label for='nlp_number_of_months'>Да се повтаря в продължение на </label><input type='text' maxlength='4' size='4' name='nlp_number_of_months' class='nlp_number_of_months' /> Месеца </div>";

            $register_repeat .="</div>";
            $register_repeat .="</div>";

            echo $register_repeat;
        } else if ($value_of_checkbox == 3) {
            $register_repeat .= "<div class='nlp_repeat_montly_wrapper'>";
            $register_repeat .= "<label for='nlp_each_week'>Да се повтаря всяка</label><select id='nlp_each_week'><option id='nlp_week_one' value='1'> седмица</option><option id='nlp_week_two' value='2'>2 седмици</option><option id='nlp_week_three' value='3'>3 седмици</option><option id='nlp_week_four' value='4'>4 седмици</option></select>";
            $register_repeat .="<div class='nlp_each_week_day_chosen_wrapper'><label for='nlp_each_week_day_chosen'>Да се повтаря в :</label><input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>П<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>В<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>С<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>Ч<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>П<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>С<input type='checkbox' name='nlp_each_week_day_chosen' class='nlp_each_week_day_chosen'/>Н";
            $register_repeat .= "<p class='nlp_repeat_inforamtion'> ! Начало се смята текущо вкараната дата и час по-горе във формата. !</p>";
            $register_repeat .= "<div class='nlp_monly_repeat_wrapper_each'><label for='nlp_each_month'>Да се повтаря всeки</label><select id='nlp_each_month'><option id='nlp_month_one' value='1'> Месец</option><option id='nlp_month_two' value='2'> 2-ри Месеца</option><option id='nlp_month_three' value='3'> 3-ти Месеца</option><option id='nlp_month_four' value='4'> 4-ти Месеца</option><option id='nlp_month_six' value='6'> 6-ти Месеца</option></select>";

            $register_repeat .= "<div class='nlp_monly_repeat_times'><label for='nlp_number_of_months'>Да се повтаря в продължение на </label><input type='text' maxlength='4' size='4' name='nlp_number_of_months' class='nlp_number_of_months' /> Месеца </div>";
            $register_repeat .= "<div class='nlp_repeat_possible'><input type='checkbox' class='nlp_repeat_if_free' name='nlp_repeat_if_free' />Ако има заети дати ,запази всички без заетите.<p>Забележка! Ако не изберете тази опиция и часовете са заети ,ще ви бъдат показани датите на който неможете да запазите часове.</p></div>";

            $register_repeat .="</div>";
            $register_repeat .="</div>";

            echo $register_repeat;
        } else if ($value_of_checkbox == 4) {
            $register_repeat .= "<div class='nlp_repeat_montly_wrapper'>";
            $register_repeat .= "<p class='nlp_day_info'>Текущо избраната дата се приема за избраната дата за повторение.</p>";
//            $register_repeat .= "<label for='nlp_each_week'>Дата на повтаряне </label><select id='nlp_day_for_repeat'><option id='nlp_day_one' value='1'> 1-ви</option><option id='nlp_day_two' value='2'> 2-ри</option><option id='nlp_day_three' value='3'> 3-ти</option><option id='nlp_day_four' value='4'> 4-ти</option><option id='nlp_day_five' value='5'> 5-ти</option><option id='nlp_day_six' value='6'> 6-ти</option>"
//                    . "<option id='nlp_day_seven' value='7'> 7-ми</option><option id='nlp_day_eight' value='8'> 8-ми</option><option id='nlp_day_nine' value='9'> 9-ти</option><option id='nlp_day_ten' value='10'> 10-ти</option><option id='nlp_day_eleven' value='11'> 11-ти</option><option value='12'> 12-ти</option><option value='13'> 13-ти</option><option value='14'> 14-ти</option><option value='15'> 15-ти</option><option value='16'> 16-ти</option>"
//                    . "<option value='17'> 17-ти</option><option value='18'> 18-ти</option><option value='19'> 19-ти</option><option value='20'> 20-ти</option><option value='21'> 21-ви</option><option value='22'> 22-ри</option><option value='23'> 23-ти</option><option value='24'> 24-ти</option><option value='25'> 25-ти</option><option value='26'> 26-ти</option><option value='27'> 27-ми</option>"
//                    . "<option value='28'> 28-ми</option><option value='29'> 29-ти</option><option value='30'> 30-ти</option><option value='31'> 31-ви</option></select>";
            $register_repeat .= "<div class='nlp_monly_repeat_wrapper_each'><label for='nlp_each_month'>Да се повтаря всeки</label><select id='nlp_each_month'><option id='nlp_month_one' value='1'> Месец</option><option id='nlp_month_two' value='2'> 2-ри Месеца</option><option id='nlp_month_three' value='3'> 3-ти Месеца</option><option id='nlp_month_four' value='4'> 4-ти Месеца</option><option id='nlp_month_six' value='6'> 6-ти Месеца</option></select>";

            $register_repeat .= "<div class='nlp_monly_repeat_times'><label for='nlp_number_of_months'>Да се повтаря в продължение на </label><input type='text' maxlength='4' size='4' name='nlp_number_of_months' class='nlp_number_of_months' /> Месеца </div>";

            $register_repeat .="</div>";
            $register_repeat .="</div>";

            echo $register_repeat;
        }
    }
}

add_action('wp_ajax_nlp_repeat_event_chosen', 'nlp_repeat_event_chosen');
add_action('wp_ajax_nopriv_nlp_repeat_event_chosen', 'nlp_repeat_event_chosen');


/*

 * ajax za dnite ot mesecите (razlichen broj neobhodimo dinamichno promenqne)
 * shortcode za kalendar
 * 
 *  */

function nlp_day_of_months_front() {

    $all_halls_id_names = array();
    $args = array(
        'type' => 'post',
        'orderby' => 'id',
        'order' => 'ASC',
        'hide_empty' => 0,
        'taxonomy' => 'category',
        'pad_counts' => false
    );
    $halls_query = get_categories();
    $cnt = 0;
    foreach ($halls_query as $object_index => $category) {
        if ($object_index != 0) {
            foreach ($category as $data_key => $data) {

                if ($data_key == 'term_id') {
                    array_push($all_halls_id_names, $data);
                }
            }
        }
    }

    $cnt = true;
    $return_days = '<div class="nlp_select_calendar_view">';
    foreach ($all_halls_id_names as $indexss => $valuess) {
        $cat_data = get_categories();

        if (isset($cat_data[$indexss]) && !empty($cat_data[$indexss])) {
            if ($cnt) {
                $return_days .= '<div class="nlp_category_to_select selected_cat_class">';
                $cnt = false;
            } else {
                $return_days .= '<div class="nlp_category_to_select">';
            }
            $return_days .= '<div class="cat_name" id="' . $valuess . '">' . $cat_data[$indexss]->name . '</div>';
            $return_days .= '</div>';
        }
    }

    $return_days .= '</div>';
    $return_days .= "<div class='nlp_view_wrapper'>";

    $return_days .= "<div class='nlp_week_show'>Седмично</div>";
    $return_days .= "<div class='nlp_month_show'>Месечно</div>";
    $return_days .= "<div class='nlp_year_show'>Годишно</div></div>";


$date_current_years = date('y');
        
    $return_days .= "<div class='nlp_calendar_navigation'><div class='nlp_calendar_back'>Предишен</div><div class='nlp_calendar_next'>Следващ</div></div>";
    $return_days .="<div class='nlp_week_day_names_calendar'><div class='nlp_week_name_day'>Понеделник</div><div class='nlp_week_name_day'>Вторник</div><div class='nlp_week_name_day'>Сряда</div><div class='nlp_week_name_day'>Четвъртък</div><div class='nlp_week_name_day'>Петък</div><div class='nlp_week_name_day'>Събота</div><div class='nlp_week_name_day'>Неделя</div></div>";
        $return_days .= "<div class='curent_mnth_year'><div class='super_month'>". 1 .".</div><div class='super_year'>".($date_current_years+2000) ."</div></div>";

    $return_days .= "<div id='nlp_selected_day'>";
    for ($k = 1; $k <= 12; $k++) {
        $date_first_month = $k;
        $date_current_year = date('y');
        
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $date_first_month, $date_current_year);
        $return_days .= "<div class='nlp_months'>";
        for ($i = 1; $i <= $days_in_month; $i++) {
            $day_name_class = nlp_return_day_name_english($date_first_month, $date_current_year, $i);
            if ($i == 1) {
                $inner_days_info = "";
                $inner_days_info .= "<div>";
                $taken_or_not = nlp_check_if_time_is_taken(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $all_halls_id_names[0]);
                $taken_or_not_info = nlp_check_if_time_is_taken_post(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $all_halls_id_names[0]);


                if (!empty($taken_or_not)) {
                    foreach ($taken_or_not as $key => $index) {

                        if ($index != "") {
                            $inner_days_info .= "<div>" . nlp_human_translator_blocks($key) . " </div>";
                        }
                    }
                }
                //  $inner_days_info .= '<div class="hidden_info"><div class="hidden_title">' . get_the_title($taken_or_not_info) . '</div><div class="hidden_description">' . get_the_content($taken_or_not_info) . '</div></div>';

                $inner_days_info .="</div>";

                $return_days .= nlp_calendar_view($day_name_class) . "<div class='nlp_day_selected nlp_" . nlp_return_day_name_english($date_first_month, $date_current_year, $i) . "' value='" . $i . "' title='" . nlp_return_day_name($date_first_month, $date_current_year, $i) . "'> " . $i . "" . $inner_days_info . "</div>";
            } else {
                $inner_days_info = "";
                $inner_days_info .= "<div>";
                $taken_or_not = nlp_check_if_time_is_taken(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $all_halls_id_names[0]);
                $taken_or_not_info = nlp_check_if_time_is_taken_post(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $all_halls_id_names[0]);


                if (!empty($taken_or_not)) {
                    foreach ($taken_or_not as $key => $index) {

                        if ($index != "") {
                            $get_data_post = get_post($taken_or_not_info[$key]);
                            $inner_days_info .= "<div class='calendar_day_container'>" . nlp_human_translator_blocks($key) . " </div>";
                            $inner_days_info .= '<div class="hidden_info"><div class="hidden_title">' . $get_data_post->post_title .'</div><div class="hidden_description">'.$get_data_post->post_content.'</div></div>';
                        }
                    }
                }


                $inner_days_info .="</div>";

                $return_days .= "<div class='nlp_day_selected nlp_" . nlp_return_day_name_english($date_first_month, $date_current_year, $i) . "' value='" . $i . "' title='" . nlp_return_day_name($date_first_month, $date_current_year, $i) . "'> " . $i . "" . $inner_days_info . "</div>";
            }
        }
        $return_days .="</div>";
    }
    $return_days .= "</div>";
    echo $return_days;
}

add_shortcode('nlp_day_of_months_front_shortcode', 'nlp_day_of_months_front');

/*

 * 
 * Ajax za kalendara ,nalojitelno zaradi razlichnite zali
 *  */

function nlp_calendar_view_for_difr_hals() {
    
    if (isset($_POST['id_of_hall']) && !empty($_POST['id_of_hall'])) {
       
        $hall_id = filter_input(INPUT_POST, 'id_of_hall', FILTER_SANITIZE_NUMBER_INT);
        for ($k = 1; $k <= 12; $k++) {
            $date_first_month = $k;
            $date_current_year = date('y');
            $days_in_month = cal_days_in_month(CAL_GREGORIAN, $date_first_month, $date_current_year);
            
            $return_days .= "<div class='nlp_months'>";
            for ($i = 1; $i <= $days_in_month; $i++) {
                $day_name_class = nlp_return_day_name_english($date_first_month, $date_current_year, $i);
                if ($i == 1) {
                    $inner_days_info = "";
                    $inner_days_info .= "<div>";
                    $taken_or_not = nlp_check_if_time_is_taken(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $hall_id);



                    if (!empty($taken_or_not)) {
                        foreach ($taken_or_not as $key => $index) {

                            if ($index != "") {
                                $inner_days_info .= "<div>" . nlp_human_translator_blocks($key) . " zaet </div>";
                            }
                        }
                    }

                    $inner_days_info .="</div>";

                    $return_days .= nlp_calendar_view($day_name_class) . "<div class='nlp_day_selected nlp_" . nlp_return_day_name_english($date_first_month, $date_current_year, $i) . "' value='" . $i . "' title='" . nlp_return_day_name($date_first_month, $date_current_year, $i) . "'> " . $i . "" . $inner_days_info . "</div>";
                } else {
                    $inner_days_info = "";
                    $inner_days_info .= "<div>";
                    $taken_or_not = nlp_check_if_time_is_taken(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $hall_id);
                    $taken_or_not_info = nlp_check_if_time_is_taken_post(($date_current_year + 2000 ) . "-" . $date_first_month . "-" . $i, $all_halls_id_names[0]);


                    if (!empty($taken_or_not)) {
                        foreach ($taken_or_not as $key => $index) {

                            if ($index != "") {
                                  $get_data_post = get_post($taken_or_not_info[$key]);
                            $inner_days_info .= "<div>" . nlp_human_translator_blocks($key) . " </div>";
                            $inner_days_info .= '<div class="hidden_info"><div class="hidden_title">' . $get_data_post->post_title .'</div><div class="hidden_description">'.$get_data_post->post_content.'</div></div>';
                            }
                        }
                    }


                    $inner_days_info .="</div>";


                    $return_days .= "<div class='nlp_day_selected nlp_" . nlp_return_day_name_english($date_first_month, $date_current_year, $i) . "' value='" . $i . "' title='" . nlp_return_day_name($date_first_month, $date_current_year, $i) . "'> " . $i . "" . $inner_days_info . "</div>";
                }
            }
            $return_days .="</div>";
        }
        echo $return_days;
    }
}

add_action('wp_ajax_nlp_calendar_view_for_difr_hals', 'nlp_calendar_view_for_difr_hals');
add_action('wp_ajax_nopriv_nlp_calendar_view_for_difr_hals', 'nlp_calendar_view_for_difr_hals');


/*

 * function to check if any hours are taken from another post and give info 
 * 
 *  */

function nlp_check_if_time_is_taken_post($date_input, $hall_number) {

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
        'post_status' => 'any',
        'date_query' => array(
            array(
                'year' => $date_exploded[0],
                'month' => $date_exploded[1],
                'day' => $date_exploded[2],
            ),
        ),
    );

    $query = get_posts($args);
//    if(empty($query)){
//        $the_array = "";
//        return $the_array;
//    }

    $the_array = array(
        0 => "",
        1 => "",
        2 => "",
        3 => "",
        4 => "",
        5 => "",
        6 => "",
        7 => "",
        8 => "",
        9 => "",
        10 => "",
        11 => "",
        12 => "",
        13 => "",
    );
    $array_ids = array();
    foreach ($query as $data) {
        $post_id = 0;
        foreach ($data as $key_data => $data_value) {

            if ($key_data == 'ID') {

                $post_id = $data_value;
                $post_end_time = get_post_meta($data_value, 'nlp_html_for_meta_box_end_time', true);
                $post_title = get_the_title($post_id);
                $post_info = get_the_content($post_date);
                if (is_array($post_end_time)) {
                    foreach ($post_end_time as $key => $value) {

                        if ($value != "") {

                            $array_ids[$key] = $post_id;
                        }
                    }
                }
            }
        }
    }
    return $array_ids;
}
