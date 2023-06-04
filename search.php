<?php

include "connect.php";

$request=filterRequest("items_name");

$stmt = $con->prepare("SELECT  * FROM allitems WHERE `items_name` LIKE '%$request%' ");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0){
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
?>
