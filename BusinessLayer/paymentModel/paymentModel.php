<?php
require_once '/xampp/htdocs/SEM-group-5/libs/database.php';


class paymentModel{

    function viewallDetails(){
        $sql = "select * from cart";
        return DB::run($sql);
    }

    function getPaymentInvoice($id){
        $sql = "select * from payment where payment_id=:id";
        $args = [':id'=>$id];
        $stmt = DB::run($sql, $args);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>