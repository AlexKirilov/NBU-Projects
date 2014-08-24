<?php
	
	define ('HOSTNAME', 'localhost');	 //"localhost"
	define ('USERNAME', 'root');		// "root"
	define ('PASSWORD', ''); // " "
	define ('DATABASE', 'userCalendar');
	

	if ($GLOBALS['link'] == NULL )
		{
			$GLOBALS['link'] = mysql_connect (HOSTNAME, USERNAME, PASSWORD);
			mysql_select_db ( userCalendar );
		}