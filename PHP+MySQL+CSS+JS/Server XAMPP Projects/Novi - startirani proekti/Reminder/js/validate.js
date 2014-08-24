//Проверка валидността на E-mail-a.

function validate ()
{
	var email = document.forms["emailForm"]["email"].value;
	// Проверяваме позицията, на която се намира @
	var atpos = email.indexOf("@");
	// Проверяваме позицията, на която се намира точката
	var dotpos = email.lastIndexOf(".");

	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		document.getElementById('msg').innerHTML =
		'Въведеният email адрес е невалиден.';
		return false;
	}
	else {
		<?php
			
					require_once("php/createDB.php");
					require_once("php/createDBTable.php");
				?>
	}
}