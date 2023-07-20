<?php

include "../connect.php";
$userid=filterRequest("users_id");
$itemsid = filterRequest("items_id");

$stmt = $con->prepare("SELECT itemscount FROM allitemscart WHERE  items_id=$itemsid and cart_usersid=$userid ");
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
    if ($count > 0){
        echo json_encode(array("status" => "success", "data" => $data));
    } else {
        echo json_encode(array("status" => "failure","data" => $data));
    }

?>