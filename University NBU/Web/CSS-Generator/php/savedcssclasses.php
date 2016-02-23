<p class="golden-border">Save Bar</p>
<?php
echo "<ol>";
// here we set the SAVED CSS DATA
$query = "SELECT * FROM code WHERE GuestID = '" . $user->user_id . "'";
$result = mysql_query ( $query );
while ( $row = mysql_fetch_array ( $result ) ) {
	print ("<li data-id=\"" . $row ['ID'] . "\">" . $row ['CodeName'] . "</li>") ;
}
echo "</ol>";
?>

                <p class="golden-border">
			<span id="load"> Load </span>
		</p>