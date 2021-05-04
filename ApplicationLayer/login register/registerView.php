<?php
	require_once '/xampp/htdocs/sdw/BusinessLayer/loginRegisterController/loginRegisterController.php';

	$user = new LoginRegisterController();

	if (isset($_POST['signup'])){

		if ($_POST['usertype'] == "customer"){
			$user->signupCustomer();
		}

		if ($_POST['usertype'] == "serPro"){
			$user->signupSerPro();
		}

		if ($_POST['usertype'] == "runner"){
			$user->signupRunner();
		}
	}
?>

<!DOCTYPE html> 
<html>
	<head>
		<link href="/sdw/style.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<meta charset="utf=8">
		<meta name="description" content="This is an example of meta description. This will often show up in search results.">
		<meta name=viewport content="width=device-width, intial-scale=1">
		<title>Registration Page</title>
	</head>
	
	<body>
		<header>
			<main>
				<div class="wrapper fadeInDown">
  				<div id="formContent">
   				<div class="fadeIn first">
   				 	<img src="kis.png" alt="logo" id="icon" />
   				</div>

   				<br>

				<h1>Registration</h1>

				<?php
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyfields") {
							echo '<p class = "signuperror">Fill in all fields!</p>';
							}
						else if ($_GET["error"] == "invalidmailuid") {
							echo '<p class = "signuperror">Invalid username and email!</p>';
							}
						else if ($_GET["error"] == "invaliduid") {
							echo '<p class = "signuperror">Invalid username!</p>';
							}
						else if ($_GET["error"] == "invalidmail") {
							echo '<p class = "signuperror">Invalid email!</p>';
							}
						else if ($_GET["error"] == "passwordcheck") {
							echo '<p class = "signuperror">Your password do not match!</p>';
							}
						else if ($_GET["error"] == "usertaken") {
							echo '<p class = "signuperror">Username is already taken!</p>';
							}
						else {
							echo '<p class = "signupsuccess">Signup successful!</p>';
							}
						}

						?>

				<form action="" method="POST">
					<input type="text" class="fadeIn second" name="Name" placeholder="Username" required>
					<label for="gender"><br>Gender:</label>

					<select name="Gender" id="Gender" class="fadeIn third" required>
  						<option value="Male">Male</option>
  						<option value="Female">Female</option>
					</select>
					<input type="text" class="fadeIn fourth" name="Email" placeholder="Email Address" required>
					<input type="text" class="fadeIn fifth" name="TelNumber" placeholder="Tel. Number" required>
					<input type="text" class="fadeIn sixth" name="Address" placeholder="Address" required>

					<label for="user"><br>Register as:</label>
					<select name="usertype" id="usertype" class="fadeIn seventh" required>
  						<option value="customer">Customer</option>
  						<option value="serPro">Service Provider</option>
  						<option value="runner">Runner</option>
					</select>


					<input type="password" class="fadeIn eightth" name="Password" placeholder="Password" required>

					<button type="submit" class="fadeIn nineth" name="signup">Sign up</button>

					</form>
				</div>
				</div>
			</main>
			
			<?php
			?>
</html>