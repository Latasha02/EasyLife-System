<?php
require_once '/xampp/htdocs/sdw/libs/database.php';


class paymentModel{

    function viewallDetails(){
        $sql = "select * from cart";
        return DB::run($sql);
    }

    
}
?>