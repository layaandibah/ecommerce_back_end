<?php

include "../connect.php";
$userid = filterRequest("users_id");
$itemsid = filterRequest("items_id");
$itemscount = filterRequest("itemscount");
if ($itemscount > 0) {
    $stmt = $con->prepare("UPDATE `allitemscart` SET `itemscount`=$itemscount
    WHERE `cart_itemsid`=$itemsid And `cart_usersid`=$userid  and `itemscount`> 0");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
} else {deleteData("cart", "`cart_itemsid`=$itemsid And `cart_usersid`=$userid");}
