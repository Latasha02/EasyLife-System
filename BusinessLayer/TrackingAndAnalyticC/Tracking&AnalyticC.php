<?php

	require_once '/xampp/htdocs/sdw/BusinessLayer/TrackingAndAnalyticM/Tracking&AnalyticM.php';

	class trackingAnalyticController{

		function view($trackingID){

			$tracking = new TrackingAnalyticModel();
		
			$tracking->trackingID = $trackingID;

			return $tracking->viewTrackingAnalytic();
		}

		function viewRequest(){

			$tracking = new TrackingAnalyticModel();

			return $tracking->viewRequest();
		}


		function search($search) {

        	$tracking = new TrackingAnalyticModel();

        	$tracking->trackingID = $search;

        	if ($tracking->searchTrackID()) {

            	$message ="Result(s) found!";
        }

        else {

            $message ="No result!";
        }

        echo "<script>alert('$message')</script>";

        return;
    	}

		function update($trackingID){

			$tracking = new TrackingAnalyticModel();

			$tracking->trackingID = $trackingID;
			$tracking->date = $_POST['date'];
			$tracking->trackStatus = $_POST['trackStatus'];
			$tracking->trackRemarks = $_POST['trackRemarks'];

			if ($tracking->updateTracking()) {

				$message = "Success Update!";

				echo "<script type = 'text/javascript'> alert('$message'); window.location = 'runnerUpdate.php?trackingID=".$_POST['trackingID']."';</script>";
			}
		}

		function viewTotal(){
			$tracking = new TrackingAnalyticModel();

			return $tracking->viewTotal();
		}

		function viewSales(){
			$tracking = new TrackingAnalyticModel();

			return $tracking->viewSales();
		}
		
	}
?>