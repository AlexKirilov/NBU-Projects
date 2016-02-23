<div class="login">
	<form method="post" action="login.php"
		id="loginform">
		<div id="error"></div>
		<legend>Login to CSS Generator</legend>
		<p>In order to use the full functionality of the system, as saving/loading your styles, please log in or register.</p>
		<fieldset>
			<div class="inputfield">
				<label>Username: </label> <input type="text" name="username"
					maxlength="60" class="textfield"
					value="<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>" required placeholder="Enter username" />
			</div>
			<div class="inputfield">
				<label>Password:</label> <input type="password" name="password" class="textfield"
					value="<?php echo(isset($_POST['password']) ? $_POST['password'] : '') ;?>" required placeholder="Enter password"/>
			</div>
			<div class="formactions">
				<input type="button" name="register" id="registerformbutton" value="Register" class="registerformbutton">
				<input type="submit" value="Login" name="login" id="login" />
			</div>
		</fieldset>
	</form>
</div>
<script>
	$("#loginform").validate({
	  submitHandler: function(form) {
		        var data = jQuery('#loginform').serialize();
		        $.ajax({
		            url:"login.php",
		            method: "post",
		            data : data,
		            success:function(result){
		                if (result != 'false' && result != '0'){
		                    window.location = window.location;
		                } else {
		                    jQuery('#error').show().html("user or password not correct")
		                }
		          }});
		          return false;
	  }
	});
	$('#registerformbutton').click(function(){
		$("#loginform").hide();
		$("#registerform").show();
	});
</script>