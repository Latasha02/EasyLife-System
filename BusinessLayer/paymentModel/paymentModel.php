<?php
require_once '/xampp/htdocs/SEM-group-5/libs/database.php';


class paymentModel{

    function viewallDetails(){
        $sql = "select * from cart";
        return DB::run($sql);
    }

    
}
?>