<div class="register">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"
		id="registerform">
		<div id="error"></div>
		<legend>Register to CSS Generator</legend>
		<fieldset>
			<div class="inputfield">
				<label>Username: </label> <input type="text" name="username"
					maxlength="60" class="textfield"
					value="<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>" required/>
			</div>
			<div class="inputfield">
				<label>Password:</label> <input type="password" name="password" id="password"  class="textfield"
					value="<?php echo(isset($_POST['password']) ? $_POST['password'] : '') ;?>" required/>
			</div>
			<div class="inputfield">
				<label>Retype Password:</label> <input type="password" class="textfield"
					name="password1" id="password1"
					value="<?php echo(isset($_POST['password1']) ? $_POST['password1'] : '') ;?>" required equalto="#password"/>
			</div>
			<div class="inputfield">
				<label>Email:</label> <input type="text" name="email" type="email" class="textfield"
					value="<?php echo(isset($_POST['email']) ? $_POST['email'] : '') ;?>" required/>
			</div>
			<div class="inputfield">
				<label>Fist Name:</label> <input type="text" name="fistname" class="textfield"
					value="<?php echo(isset($_POST['fistname']) ? $_POST['fistname'] : '') ;?>" required/>
			</div>
			<div class="inputfield">
				<label>Last Name:</label> <input type="text" name="lastname" class="textfield"
					value="<?php echo(isset($_POST['lastname']) ? $_POST['lastname'] : '') ;?>" required/>
			</div>
			<div class="formactions">
				<input type="button" value="Login" name="login" id="loginformbutton" /> <input
					type="submit" value="Register" name="register" id="register" />
			</div>
		</fieldset>
	</form>
</div>
<script>
	$("#registerform").validate({
		submitHandler: function(form) {
		jQuery('#registerform').submit(function(){
			var data = jQuery('#registerform').serialize();
			$.ajax({
					url:"register.php",
					method: "post",
					data : data,
					success:function(result){
						if (result != 'false' && result != '0'){
							jQuery('#mainbody').html(result);
							jQuery('#logout').show();
						} else {
							jQuery('#error').show().html("user or password not correct")
						}
					}});
			return false;
		})
		}
	});
	$('#loginformbutton').click(function(){
		$("#loginform").show();
		$("#registerform").hide();
	});
</script>