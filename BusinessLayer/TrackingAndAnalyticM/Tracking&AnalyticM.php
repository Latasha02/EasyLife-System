<?php
	
	require_once '/xampp/htdocs/sdw/libs/database.php';

	class TrackingAnalyticModel{

		//Variables
		public $trackingID, $date, $trackStatus, $trackRemarks, $customerID, $runnerID, $orderID;
		function connect(){

        $pdo = new PDO('mysql:host=localhost;dbname=sdw', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $pdo;
    }

		function viewTrackingAnalytic(){

			$sql = "select * from tracking where trackingID=:trackingID";

			$args = [':trackingID'=>$this->trackingID];

			return DB:: run($sql, $args);
		}

		function viewRequest(){

			$sql = "select * from tracking join custorder on tracking.orderID = custorder.orderID ";

			return DB::run($sql);
		}


		function searchTrackID() {
        	$sql = "select * from tracking where trackingID=:search";

        	$args = [':search'=>$this->trackingID];

        	return DB::run($sql,$args);
    	}

		function updateTracking(){

			$sql = "update tracking set date= :date, trackStatus= :trackStatus, trackRemarks=:trackRemarks where trackingID=:trackingID";

			$args = [':trackingID'=>$this->trackingID, ':date'=>$this->date, ':trackStatus'=>$this->trackStatus, ':trackRemarks'=>$this->trackRemarks];

			$stmt =  DB:: run($sql, $args);

			$count = $stmt->rowCount();
			
			return $count;
		}

		function viewTotal(){
			
			$sql = "select *, (select count(*) from tracking where trackStatus = :trackStatus) as count from tracking where trackStatus = :trackStatus";
        	
        	$args = [':trackStatus' => 'DELIVERED'];

        	return DB::run($sql,$args);
		}

		function viewSales(){
			
			$sql = "select * from (cart inner join customer on cart.customerID = customer.customerID) ";
        	
        	$args = [':customerID' =>$this->customerID];

        	return DB::run($sql,$args);
		}

	}
?>	