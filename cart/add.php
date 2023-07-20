<?php

include "../connect.php";
$userid = filterRequest("users_id");
$itemsid = filterRequest("items_id");
$itemscount=filterRequest("itemscount");

$count = getData("cart", "cart_itemsid=$itemsid And cart_usersid=$userid ", null, false);
if ($count > 0) {
    $stmt1 = $con->prepare("UPDATE `allitemscart` SET itemscount = $itemscount
     WHERE cart_itemsid=$itemsid And cart_usersid=$userid And `itemscount`< 10");
    $stmt1->execute();
    $count1 = $stmt1->rowCount();
    if ($count1 > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
}else{

    $data = array(
        "cart_usersid" => $userid,
        "cart_itemsid" => $itemsid,
    );
    insertData("cart", $data,true);
    $stmt1 = $con->prepare("UPDATE `allitemscart` SET itemscount = $itemscount
    WHERE cart_itemsid=$itemsid And cart_usersid=$userid ");
   $stmt1->execute();
}
