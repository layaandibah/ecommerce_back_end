<?php

include "connect.php";

$request=filterRequest("items_name");

$stmt = $con->prepare("SELECT  * ,(items_price-(items_price*items_discount/100)) as itemspricediscount FROM allitems WHERE `items_name` LIKE '%$request%' OR `items_name_ar` LIKE '%$request%' ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0){
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
?>
