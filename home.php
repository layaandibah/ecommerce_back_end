<?php

include "connect.php";

$userId=filterRequest("user_id");

$alldata=array();
$alldata["status"]="success";

$allcategories=getAllData("categories",null,null,false);
 //-------------allItemsDiscount-------------
 $stmt1     = $con->prepare("SELECT allitems.* , 1 as favorite FROM allitems INNER JOIN
 favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId
 UNION ALL SELECT allitems.* , 0 as favorite FROM allitems
WHERE allitems.items_id != (SELECT allitems.items_id FROM allitems INNER JOIN 
favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId)");
 $stmt1->execute();
 $allitems = $stmt1->fetchAll(PDO::FETCH_ASSOC);
 //--------------------------------
if($allcategories==null && $allitems ==null){
    $alldata["status"]="failure";
    }else{
    $alldata["status"]="success";
    if($allcategories!=null){
        $alldata["categories"]=$allcategories;
    }
    if($allitems!=null){
        $alldata["items"]=$allitems;
    }
    }
    echo json_encode($alldata);
?>