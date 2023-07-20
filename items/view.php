<?php

include "../connect.php";
$itemscat = filterRequest("category_id");
$user = filterRequest("users_id");
$alldata = array();

$stmt = $con->prepare("SELECT allitems.* , 1 AS favorite,(items_price-(items_price*items_discount/100)) as itemspricediscount FROM allitems 
INNER JOIN favorite ON allitems.items_id=favorite.favorite_itemid 
And favorite.favorite_userid=$user WHERE categories_id=$itemscat 
UNION 
SELECT allitems.*, 0 AS favorite , (items_price-(items_price*items_discount/100)) as itemspricediscount FROM allitems  
where categories_id=$itemscat 
AND items_id NOT IN (SELECT items_id FROM allitems 
INNER JOIN favorite 
ON allitems.items_id=favorite.favorite_itemid 
And favorite.favorite_userid=$user)");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
