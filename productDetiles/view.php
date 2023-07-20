<?php
include "../connect.php";
$itemId=filterRequest("item_id");
$stmt = $con->prepare("SELECT allitems.* ,(items_price-(items_price*items_discount/100)) as itemspricediscount FROM allitems where items_id=$itemId");

$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
?>