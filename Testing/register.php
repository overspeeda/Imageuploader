<?php include('server.php'); ?>
<?php include('sendmail.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div style="color: white;">	
		<?php include('errors.php'); ?>
	</div>

		<div class="input-group">
			<label>Username</label>
				<div class="webflow-style-input">
					<input type="text" name="username" value="<?php echo $username; ?>"></input>
				</div>
		</div>

		<div class="input-group">
			<label >Email</label>
				<div class="webflow-style-input">
					<input type="email" name="email" value="<?php echo $email; ?>">
				</div>
		</div>

		<div class="input-group">
			<label>Contact No.</label>
				<div class="webflow-style-input">
					<input type="text" name="contact">
				</div>
		</div>

		<div class="input-group">
			<label>Password </label>
				<div class="webflow-style-input">
					<input type="password" name="password_1">
				</div>
		</div>

		<div class="input-group">
			<label>Confirm password</label>
				<div class="webflow-style-input">
					<input type="password" name="password_2">
				</div>
		</div>

		<div class="movement">
			<button type="submit" class="button1" name="reg_user">Register</button>
		</div>

		<div class="input-group">
			<p>Already a member? <a href="login.php" class="redword" >Sign in</a></p>
		</div>
	
  </form>

</body>

</html>