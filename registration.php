<?php
require_once 'includes/includeHeader.php';
require_once 'includes/register.inc.php';
?>
		<!-- Registration form to be output if the POST variables are not
		set or if the registration script caused an error. -->
		<h1>Register with us</h1>
		<?php
		if (!empty($error_msg)) {
			echo $error_msg;
		}
		?>
		<ul>
			<li>Usernames may contain only digits, upper and lower case letters and underscores</li>
			<li>Emails must have a valid email format</li>
			<li>Passwords must be at least 6 characters long</li>
			<li>Passwords must contain
				<ul>
					<li>At least one uppercase letter (A..Z)</li>
					<li>At least one lower case letter (a..z)</li>
					<li>At least one number (0..9)</li>
				</ul>
			</li>
			<li>Your password and confirmation must match exactly</li>
		</ul>
		<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
				method="post" 
				name="registration_form">
			Firstname: <input type='text' 
				name='firstname' 
				id='firstname' /><br>
			Lastname: <input type="text" name="lastname" id="lastname" /><br>
			Age: <input type="number" min="18" name="age" id="age">
			Password: <input type="password"
							 name="password" 
							 id="password"/><br>
			Confirm password: <input type="password" 
									 name="confirmpwd" 
									 id="confirmpwd" /><br>
			<input type="button" 
				   value="Register" 
				   onclick="return regformhash(this.form,
								   this.form.firstname,
								   this.form.lastname,
								   this.form.age,
								   this.form.password,
								   this.form.confirmpwd);" /> 
		</form>
		<p>Return to the <a href="index.php">login page</a>.</p>
<?php
require_once 'includes/includeFooter.php';
?>