<?php
session_start ();

// Checks if the database exists and if the db is not found - tries to create it.
require_once ("php/DBConnection.php"); // MySQL Connection';
                                       // Cheking for existing DB & Tables
if (!$db->selectDB($DATABASE)) {
	require_once ("php/createDB.php"); // Creating DB
	require_once ("php/createDBTable.php"); // Table fo Guest IDName and date on reg
	require_once ("php/createDBData.php"); // Table for Code
}
// Includes the user class and creates instance of it.
require_once ("php/classUser.php");
$user = new User ($db);
if (!$user->is_loged){
	echo "<script>window.location='index.php';</script>";
}
if (isset($_POST['update'])){
	if (isset($_POST['current_password'])){
		if (md5($_POST['current_password']) == $user->password){
			$user->update_details($user->user_id,$_POST['password'],$_POST['email'],$_POST['fistname'],$_POST['lastname']);
		} else {
			echo 'false';
		}	
		} else {
			echo 'false';
		}
} else {
?>
<div class="register">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"
		id="editdetails">
		<div id="error"></div>
		<legend>Register to CSS Generator</legend>
		<fieldset>
			<div class="inputfield">
				<label>Username: </label> <?php echo $user->username;?>
			</div>
			<div class="inputfield">
				<label>Current Password:</label> <input type="password" name="current_password" id="current_password"  class="textfield"
					value="" required/>
			</div>
			<div class="inputfield">
				<label>Password:</label> <input type="password" name="password" id="password"  class="textfield"
					value="" required/>
			</div>
			<div class="inputfield">
				<label>Retype Password:</label> <input type="password" class="textfield"
					name="password1" id="password1"
					value="" required equalto="#password"/>
			</div>
			<div class="inputfield">
				<label>Email:</label> <input type="text" name="email" type="email" class="textfield"
					value="<?php echo $user->email;?>" required/>
			</div>
			<div class="inputfield">
				<label>Fist Name:</label> <input type="text" name="fistname" class="textfield"
					value="<?php echo $user->first_name?>" required/>
			</div>
			<div class="inputfield">
				<label>Last Name:</label> <input type="text" name="lastname" class="textfield"
					value="<?php echo $user->last_name;?>" required/>
			</div>
			<div class="formactions">
				<input type="button" value="cancel" name="cancel" id="cancel" /> <input
					type="submit" value="Update" name="update" id="update" />
			</div>
		</fieldset>
	</form>
</div>
<script>
	$("#editdetails").validate({
		submitHandler: function(form) {
			var data = jQuery('#editdetails').serialize();
			$.ajax({
					url:"editdetails.php",
					method: "post",
					data : data,
					success:function(result){
						if (result != 'false' && result != '0'){
							window.location=window.location;
						} else {
							jQuery('#error').show().html("Problem updating your details.")
						}
					}});
			return false;
		}
	});
	$('#cancel').click(function(){
		window.location=window.location;
	});
</script>
<?php } ?>