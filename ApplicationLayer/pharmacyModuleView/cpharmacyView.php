<?php
require_once '/xampp/htdocs/sdw/BusinessLayer/pharmacyController/pharmacyproductController.php';

$pharmacyproductID = $_GET['pharmacyproductID'];

$pharmacyproduct = new pharmacyController();
$data = $pharmacyproduct->viewpharmacyproduct($pharmacyproductID); 
?>
<html>
    <head>
        <title>sdw</title>
    </head>
    <body>
    <center><h2>PHARMACY</h2>
        <br>
        <table>
            <?php
            foreach($data as $row){
            ?> 
            <tr>
                <td>Pharmacy Name</td>
                <td><?=$row['Pharmacy ProductName']?></td>
            </tr>
            <tr>
                <td>Pharmacy Product Price</td>
                <td><?=$row['pharmacyproductPrice']?></td>
            </tr>    
            <tr>
                <td>Pharmacy Product Detail</td>
                <td><?=$row['Pharmacy Product Detail']?></td>
            </tr>
            <tr>
                <td>Pharmacy Product Quantity</td>
                <td><?=$row['pharmacyproductQuantity']?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="button" onclick="location.href='edit.php?pharmacyproductID=<?=$row['pharmacyproductID']?>'" value="EDIT">&nbsp;
                    <input type="button" onclick="location.href='index.php'" value="BACK"></td>
            </tr>
            <?php } ?>
        </table>
    </center>
    </body>
</html>