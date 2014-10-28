<?php

    if (isset($_POST['ajax_data_s'])) {
       
    if (!empty($_POST['ajax_data_s'])) {
        $ajax_information = $_POST['ajax_data_s'];
        if ($ajax_information[0] == "RGBA") {
            foreach($ajax_information as $key => $val){
                echo $key . " : " . $val;
            }
    }else if ($ajax_information[0] == "Multiple Columns"){
        $mult_columns = $ajax_information[1];
        echo $mult_columns;
    }else if($ajax_information[0] == 'Border radius'){
        $bord_rad = $ajax_information[1];
        echo $bord_rad;
    } else {
            echo "ne";
        }
    }
} else {
    echo "BLA";
}
