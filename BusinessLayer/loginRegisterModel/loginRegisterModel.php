<?php
	require_once '/xampp/htdocs/SEM-group-5/libs/database.php'; 

	class LoginRegisterModel{

		public $customerID, $customerName, $customerGender, $customerEmail, $customerTelNumber, $customerAddress, $customerPassword, $serProID, $serProName, $serProGender, $serProEmail, $serProTelNumber, $serProAddress, $serProPassword,$runnerID, $runnerName, $runnerGender, $runnerEmail, $runnerTelNumber, $runnerAddress, $runnerPassword;

		function signupCustomer(){
			$sql = "insert into customer(customerName, customerGender, customerEmail, customerTelNumber, customerAddress, customerPassword) values( :Name, :Gender, :Email, :TelNumber, :Address, :Password)";
        	$args = [':Name'=>$this->customerName, ':Gender'=>$this->customerGender, ':Email'=>$this->customerEmail, ':TelNumber'=>$this->customerTelNumber,':Address'=>$this->customerAddress, ':Password'=>$this->customerPassword];

        	$stmt = DB::run($sql, $args);
        	$count = $stmt->rowCount();
        	return $count;
		}

        function loginCustomer(){
            $sql = "select * from customer where customerEmail=:Email and customerPassword=:Password";
            $args = [':Email'=>$this->customerEmail, ':Password'=>$this->customerPassword];
            $stmt = DB::run($sql, $args);
            return $stmt;
        }

    	function signupSerPro(){
			$sql = "insert into serviceprovider(serProName, serProGender, serProEmail, serProTelNumber, serProAddress, serProPassword) values( :Name, :Gender, :Email, :TelNumber, :Address, :Password)";
        	$args = [':Name'=>$this->serProName, ':Gender'=>$this->serProGender, ':Email'=>$this->serProEmail, ':TelNumber'=>$this->serProTelNumber,':Address'=>$this->serProAddress, ':Password'=>$this->serProPassword];

        	$stmt = DB::run($sql, $args);
        	$count = $stmt->rowCount();
        	return $count;
		}

		function loginSerPro(){
    		$sql = "select * from serviceprovider where serProEmail=:Email and serProPassword=:Password";
    		$args = [':Email'=>$this->serProEmail, ':Password'=>$this->serProPassword];
        	$stmt = DB::run($sql, $args);
        	return $stmt;
    	}

    	function signupRunner(){
			$sql = "insert into runner(runnerName, runnerGender, runnerEmail, runnerTelNumber, runnerAddress, runnerPassword) values( :Name, :Gender, :Email, :TelNumber, :Address, :Password)";
        	$args = [':Name'=>$this->runnerName, ':Gender'=>$this->runnerGender, ':Email'=>$this->runnerEmail, ':TelNumber'=>$this->runnerTelNumber,':Address'=>$this->runnerAddress, ':Password'=>$this->runnerPassword];

        	$stmt = DB::run($sql, $args);
        	$count = $stmt->rowCount();
        	return $count;
		}

		function loginRunner(){
    		$sql = "select * from runner where runnerEmail=:Email and runnerPassword=:Password";
    		$args = [':Email'=>$this->runnerEmail, ':Password'=>$this->runnerPassword];
        	$stmt = DB::run($sql, $args);
        	return $stmt;
    	}

	}
?>