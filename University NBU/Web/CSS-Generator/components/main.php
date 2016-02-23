<!-- Left Panel menu + panel Save -->
<div class="inner-left">
        	<?php  if ($user->is_loged){ ?>
	        	<div class="userinfo" id="userinfo">
		<ul>
			<li>Welcome <?php echo $user->first_name?>,</li>
			<li><a href="editdetails.php" class="ajax">Edit Details</a></li>
			<li><a href="php/DestroySes.php" id="logout">Log Out</a></li>
		</ul>
	</div>
	        <?php } ?>
            <div class="menu-bar" id="actions">
		<p class="golden-border">Select CSS3 type</p>
		<ul id="cssactions">
			<li><p id="MulCol">Multiple Columns</p></li>
			<li><p id="BorRad">Border radius</p></li>
			<li><p id="TexSha" >Text shadow</p></li>
			<li><p id="BoxSha" >Box Shadow</p></li>
			<li><p id="BoxRes" >Box resize</p></li>
			<li><p id="BoxSiz" >Box sizing</p></li>
			<li><p id="Transit">Transition</p></li>
			<li><p id="Transfo">Transform</p></li>
			<li><p id="FontFace">Font face</p></li>
			<li><p id="Outline">Outline</p></li>
			<li><p id="RGBA">RGBA</p></li>
		</ul>
		<p class="golden-border"></p>
	</div>
			<?php  if ($user->is_loged){ ?>
            <div class="save-bar" id="savedclasses">
				<?php include("php/savedcssclasses.php"); ?>
                <?php } ?>
            </div>
</div>
<!-- END Left Panel menu + panel Save -->


<!-- Osnovno componenti -->
<!-- Right Panel -->
<div class="inner-right" id="maincontent">
	<div class="enterData" id="operations"></div>

	<div id="input_text"></div>
	<div id="sample"></div>
	
	<div class="codeview" id="code_view"></div>
	<?php  if ($user->is_loged){ ?>
		<div class="buttons" id="saveaction">
			<form>
				<div class="inputfield">
					<label>Please enter name for the style</label>
					<input type="text" id="css_name" name="css_name" class="textfield" /> 
				</div>
				<div class="formactions">
					<button type="button" name="copyBut" id="copyBut">COPY</button>
					<button type="button" name="saveCode" id="saveCode">Save</button>
				</div>
			</form>
		</div>
	<?php } ?>
</div>
<!-- END Right Panel -->
<script>
       init();
</script>