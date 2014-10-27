<?php


    if (isset($_POST['ajax_data_s'])) {

    if (!empty($_POST['ajax_data_s'])) {
        $ajax_data_recived_filtered = filter_input(INPUT_POST, 'ajax_data_s', FILTER_SANITIZE_STRING);

        if ($ajax_data_recived_filtered == " RGBA") {
            echo "sd";
        } else {
            echo "ne";
        }
    }
} else {
    echo "BLA";
}
