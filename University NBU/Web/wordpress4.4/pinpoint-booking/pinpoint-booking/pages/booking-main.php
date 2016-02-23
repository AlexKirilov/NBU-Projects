<?php

require_once '../functions.php';



if (isset($_POST['nmb_empl']) && !empty($_POST['nmb_empl'])) {

   $empl_nmb = $_POST['nmb_empl'];

   empl_names($empl_nmb);
   
}