<?php
	require_once '/xampp/htdocs/sdw/BusinessLayer/loginRegisterController/loginRegisterController.php';

	$user = new LoginRegisterController();

	if (isset($_POST['login'])){

		if ($_POST['usertype'] == "customer"){
			$user->loginCustomer();
		}

		if ($_POST['usertype'] == "serPro"){
			$user->loginSerPro();
		}

		if ($_POST['usertype'] == "runner"){
			$user->loginRunner();
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
		<title>Login Page</title>

	</head>
	<body>

		<header>
				<main>
					<div class="wrapper fadeInDown">
  						<div id="formContent">
   				 		<div class="fadeIn first">
   				  			<img src="kis.png" alt="logo" id="icon" />
   				 		</div>
					<div>
						<div class="header-login">

						<form action="" method="post">
								<input type="text" name="Email" placeholder="Email" required>

								<input type="password" name="Password" placeholder="Password">

								<label for="user">User Type:</label>
								<select name="usertype" id="usertype">
  									<option value="customer">Customer</option>
  									<option value="serPro">Service Provider</option>
  									<option value="runner">Runner</option>
								</select>

								<br>

								<button type="submit" name="login">Login</button>
						</form>

							<a href="registerView.php">Register</a>
						</div>
					</div>
						</div>
					</div>	
				</main>			
			</header>
	</body>
	</html>