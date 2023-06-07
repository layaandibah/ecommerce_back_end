<?php

include "connect.php";

$userId=filterRequest("user_id");
$request=filterRequest("items_name");

$stmt = $con->prepare("SELECT allitems.* , 1 as favorite FROM allitems INNER JOIN
favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId
WHERE `items_name` LIKE '%$request%'
UNION ALL SELECT allitems.* , 0 as favorite FROM allitems
WHERE `items_name` LIKE '%$request%' AND allitems.items_id != (SELECT allitems.items_id FROM allitems INNER JOIN 
favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId)");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0){
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
?>
