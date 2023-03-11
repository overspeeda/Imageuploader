<?php include('server.php') ?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

  <div class="header">
 	 <h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
	<div style="color: white;">	
		<?php include('errors.php'); ?>
	</div>

		<div class="input-group">
			<label>Username</label>
				<div class="webflow-style-input">
					<input type="text" name="username"></input>
				</div>
		</div>

		<div class="input-group label">
			<label>Password</label>
				<div class="webflow-style-input">
					<input type="password" name="password"></input>
				</div>
		</div>

		<div class="glowing-btn">
			<a>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<button type="submit" class="button2" name="login_user">Login</button>
			</a>
		</div>

		<div class="input-group">
			<p>Not yet a member? <a href="register.php" class="redword">SignUp</a></p>
		</div>

  </form>

</body>

</html>