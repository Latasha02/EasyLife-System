<?php
	require_once '/xampp/htdocs/SEM-group-5/BusinessLayer/loginRegisterModel/loginRegisterModel.php';

	class LoginRegisterController{

function signupCustomer(){
			$user = new LoginRegisterModel();

			$user->customerName = $_POST['Name'];
			$user->customerGender = $_POST['Gender'];
			$user->customerEmail = $_POST['Email'];
			$user->customerTelNumber = $_POST['TelNumber']; 
			$user->customerAddress = $_POST['Address'];
			$user->customerPassword = $_POST['Password'];

			if (empty($user->customerName) || empty($user->customerGender) || empty($user->customerEmail) || empty($user->customerTelNumber) || empty($user->customerAddress) || empty($user->customerPassword)){
				header("Location: ../login register/registerView.php?error=emptyfields&uid=".$user->customerName."&mail=".$user->email); 
				exit();
			}
	
			else if (!filter_var($user->customerEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $user->customerName)){
				header("Location: ../login register/registerView.php?error=invalidmailuid");
				exit();
			}

			else if (!filter_var($user->customerEmail, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../login register/registerView.php?error=invalidmail&uid=".$user->customerName); 
				exit();
			}

			else if (!preg_match("/^[a-zA-Z0-9]*$/", $user->customerName)) {
				header("Location: ../login register/registerView.php?error=invaliduid&mail=".$user->customerEmail); 
				exit();
			}
				else{
					if ($user->signupCustomer()){
						$message = "Your registration is successful!";
				echo "<script type='text/javascript'>alert('$message');
          				window.location = 'loginView.php';</script>";
					}
			}
		}	

			function loginCustomer(){
			$user = new LoginRegisterModel();

			$user->customerEmail = $_POST['Email'];
			$user->customerPassword = $_POST['Password'];
			
			$stmt = $user->loginCustomer();

			if ($stmt->rowCount()==1){
				session_start();
				foreach ($stmt as $selected){
					$_SESSION['customerID'] = $selected['customerID'];
				}
				$_SESSION['customerEmail'] = $_POST['Email'];

				$user->customerEmail = $_SESSION['customerEmail'];
        		$user->customerPassword = $_SESSION['customerPassword'];

				echo "<script>alert('Login successfully!');
					  window.location = 'cHomepageView.php?customerID=".$_SESSION['customerID']."';</script>";
			}

			else{
				echo "<script>alert('Invalid Email and Password! Please try again!');
					  window.location = 'loginView.php';</script>";
			}
		}

		function signupSerPro(){
			$user = new LoginRegisterModel();

			$user->serProName = $_POST['Name'];
			$user->serProGender = $_POST['Gender'];
			$user->serProEmail = $_POST['Email'];
			$user->serProTelNumber = $_POST['TelNumber'];
			$user->serProAddress = $_POST['Address'];
			$user->serProPassword = $_POST['Password'];

			if ($user->signupSerPro()){
				$message = "Your registration is successful!";
				echo "<script type='text/javascript'>alert('$message');
          				window.location = 'loginView.php';</script>";
			}
		}

		function loginSerPro(){
			$user = new LoginRegisterModel();

			$user->serProEmail = $_POST['Email'];
			$user->serProPassword = $_POST['Password'];
			$stmt = $user->loginSerPro();

			if ($stmt->rowCount()==1){
				session_start();
				foreach ($stmt as $selected){
					$_SESSION['serProID'] = $selected['serProID'];
				}
				$_SESSION["serProEmail"] = $_POST['Email'];

				$user->serProEmail = $_SESSION['serProEmail'];
        		$user->serProPassword = $_SESSION['serProPassword'];

				echo "<script>alert('Login successfully!');
					  window.location = 'spHomepageView.php?serProID=".$_SESSION['serProID']."';</script>";
			}

			else{
				echo "<script>alert('Invalid Email and Password! Please try again!');
					  window.location = 'loginView.php';</script>";
			}
			}

		function signupRunner(){
			$user = new LoginRegisterModel();

			$user->runnerName = $_POST['Name'];
			$user->runnerGender = $_POST['Gender'];
			$user->runnerEmail = $_POST['Email'];
			$user->runnerTelNumber = $_POST['TelNumber'];
			$user->runnerAddress = $_POST['Address'];
			$user->runnerPassword = $_POST['Password'];

			if ($user->signupRunner()){
				$message = "Your registration is successful!";
				echo "<script type='text/javascript'>alert('$message');
          				window.location = 'loginView.php';</script>";
			}
		}

		function loginRunner(){
			$user = new LoginRegisterModel();

			$user->runnerEmail = $_POST['Email'];
			$user->runnerPassword = $_POST['Password'];
			$stmt = $user->loginRunner();

			if ($stmt->rowCount()==1){
				session_start();
				foreach ($stmt as $selected){
					$_SESSION['runnerID'] = $selected['runnerID'];
				}
				$_SESSION["runnerEmail"] = $_POST['Email'];

				$user->runnerEmail = $_SESSION['runnerEmail'];
        		$user->runnerPassword = $_SESSION['runnerPassword'];

				echo "<script>alert('Login successfully!');
					  window.location = '../cartModuleView/rOrderView.php?runnerID=".$_SESSION['runnerID']."';</script>";
			}

			else{
				echo "<script>alert('Invalid Email and Password! Please try again!');
					  window.location = 'loginView.php';</script>";
			}
		}
	}
		?>
		