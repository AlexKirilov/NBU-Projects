<?php
session_start ();

// Checks if the database exists and if the db is not found - tries to create it.
require_once ("../php/DBConnection.php"); // MySQL Connection';
if (isset($_POST['ajax_data_s'])) {

    if (!empty($_POST['ajax_data_s'])) {
        $ajax_information = $_POST['ajax_data_s'];
        $title = filter_var($ajax_information[0],FILTER_SANITIZE_STRING);
        if ($title == "RGBA") {
            $rgba .= "background-color: rgba( ";
            foreach ($ajax_information as $key => $val) {
                if($key != 0){
                    if($key == 4){
                        $rgba .= filter_var($val,FILTER_SANITIZE_NUMBER_INT);
                    }else{
                         $rgba .= filter_var($val,FILTER_SANITIZE_NUMBER_INT) .",";
                    }
                }
            }
            $rgba .=" );";
            echo "#sample {".$rgba."}";
        } else if ($title == "Multiple Columns") {
            $mult_columns = filter_var($ajax_information[1],FILTER_SANITIZE_NUMBER_INT);
            echo "#sample { -webkit-column-count: ".$mult_columns ."; }";
        } else if ($title == 'Border radius') {
            $bord_rad = filter_var($ajax_information[1],FILTER_SANITIZE_NUMBER_INT);
            echo "#sample { border-radius: ".$bord_rad ."%; }";
        } else if($title == 'box-shadow'){
            $box_shadow .= $title.": ";
            foreach($ajax_information as $key => $val){
                if($key != 0){
                    if(isset($ajax_information[7])){
                        if($key == 7){
                            $box_shadow .=filter_var($val,FILTER_SANITIZE_STRING);
                        }else{
                            $box_shadow .=filter_var($val,FILTER_SANITIZE_STRING)." ";
                        }
                    }else{
                        if($key == 6){
                            $box_shadow .=filter_var($val,FILTER_SANITIZE_STRING);
                        }else{
                         $box_shadow .=filter_var($val,FILTER_SANITIZE_STRING)." ";
                        }
                    }
                }
            }
            echo "#sample { ".$box_shadow .'; }';
        }else if($title == 'text-shadow'){
            $text_shadow = "#sample { ".$title.": ";
            foreach($ajax_information as $key=>$val){
                if($key == 4){
                $text_shadow .= filter_var($val,FILTER_SANITIZE_STRING);
                   
                }else if($key == 0){
                    continue;
                    
                }else{
                    
                $text_shadow .= filter_var($val,FILTER_SANITIZE_STRING) ." ";
                
                }
                
            }
            echo $text_shadow .= "; }";
        }else if ($title == "box-shadow") {
              $title_shadow_box = "#sample { ".$title . ": ";
              foreach($ajax_information as $key => $val){
                  echo "#sample { ".filter_var($val,FILTER_SANITIZE_STRING)." }";
              }
        }else if($title == "Box_resize"){
            $box_resize = "#sample { overflow: auto; resize: ";
            foreach($ajax_information as $key=>$val){
                if($key == 1){
                    $box_resize .= filter_var($val,FILTER_SANITIZE_STRING) ."; }";
                }
            }
           echo $box_resize;
        }else if($title == "box-sizing"){
            $box_sizing = "#sample .box { ";
            foreach($ajax_information as $key => $val){
                if($key == 1){
                    $box_sizing .= "width: " .filter_var($val,FILTER_SANITIZE_STRING)."% ; ";
                }elseif($key == 2){
                    $box_sizing .= "box-sizing: ".filter_var($val,FILTER_SANITIZE_STRING)."; ";
                }elseif($key == 3){
                    $box_sizing .= "float: ".filter_var($val,FILTER_SANITIZE_STRING)."; }";
                }
            }
            
            echo $box_sizing;
        }elseif($title == 'Transition'){
            $transition = "#sample { ";
            $transition_hover = ".transition_hover_efect:hover { ";
            print_r($ajax_information);
            foreach($ajax_information as $key=>$val){
              
               if($key == 1){
                    $transition .= "transition-delay: " .filter_var($val,FILTER_SANITIZE_STRING)."s ; ";
                }elseif($key == 2){
                    $transition .= "transition-duration: ".filter_var($val,FILTER_SANITIZE_STRING)."s ; ";
                }elseif($key == 3){
                    $transition .= "transition-property: ".filter_var($val,FILTER_SANITIZE_STRING)." ; }</br>";
                    $transition_hover .= filter_var($val,FILTER_SANITIZE_STRING).": 400px; }</br>";
                }elseif($key == 4){
                   
                   $transition .= "transition-timing-function: ".filter_var($val,FILTER_SANITIZE_STRING)."; }</br>";
                }elseif($key == 5){
                    $transition .= "transition-timing-function:".filter_var($val,FILTER_SANITIZE_STRING)."; }</br>";
                }
            }
            echo "<div>$transition</div>";
            echo "<div>$transition_hover<div>";
        }elseif($title == 'transform'){
            $transform  =  "#sample { "."transform: ";
           foreach($ajax_information as $key=>$val){
               if($key != 0){
                $transform .= filter_var($val,FILTER_SANITIZE_STRING)." ";
               }
            }
           $transform .= "; }";
           echo $transform;
        }elseif($title == '@font-face'){
            $font_face =  "#sample { ".$title." { ";
            foreach($ajax_information as $key=>$val){
                if($key == 2){
                    $font_face .= "font-family: ".filter_var($val,FILTER_SANITIZE_STRING)."; ";
                }elseif($key == 3){
                    $font_face .="font-weight: ". filter_var($val,FILTER_SANITIZE_STRING) ."; }";
                }
            }
            echo $font_face;
          
        }elseif($title == "outline"){
            $outline = "#sample { ".$title.": ";
            foreach($ajax_information as $key=>$val){
                if($key == 1){
                $outline .= filter_var($val,FILTER_SANITIZE_STRING)."px ";
                }elseif($key == 2){
                     $outline .= filter_var($val,FILTER_SANITIZE_STRING)." ";
                }
            }
            $outline .="; }";
            echo $outline;
        }
        
    }
} else {
    echo "BLA";
}
