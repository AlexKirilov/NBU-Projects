<?php
	$delete = $_POST['checkbox'];

	foreach ($delete as $id => $val) {
	    if($val=='checked'){
	        $query="DELETE FROM `calendardb`.`dbuser` WHERE `dbuser`.`ID` = '".$id."'";
	        //$sql = "DELETE FROM `calendardb`.`dbuser` WHERE `dbuser`.`ID` ='".$id."'";
	        $result= mysqli_query($con, $query) or die("Invalid query");
	        echo "string";
	    }
	}

?>