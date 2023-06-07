<?php

include "../connect.php";
$itemscat=filterRequest("category_id");
$itemsType=filterRequest("items_type");
$userId=filterRequest("user_id");

$alldata=array();
$alldata["status"]="success";

if($itemsType < 0){
    //-------------types-------------
    $stmt1     = $con->prepare("SELECT distinct `type_name`,`items_type` FROM allitems WHERE `categories_id`=$itemscat");
    $stmt1->execute();
    $types     = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $alldata["types"]=$types;
    //-------------allItems-------------
    $stmt2     = $con->prepare("SELECT allitems.* , 1 as favorite FROM allitems INNER JOIN 
    favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId 
    WHERE categories_id = $itemscat
    UNION ALL SELECT allitems.* , 0 as favorite FROM allitems
     WHERE categories_id = $itemscat AND allitems.items_id != 
     (SELECT allitems.items_id FROM allitems INNER JOIN
      favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId)");
    $stmt2->execute();
    $data = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $alldata["data"]=$data;
    //--------------------------------
    if($types!=null && $data!=null){
        echo json_encode($alldata);
    }else{
        $alldata["status"]="failure";
        echo json_encode($alldata);
    }
    }else{
        //-------------specificItems-------------
    $stmt2     = $con->prepare("SELECT allitems.* , 1 as favorite FROM allitems INNER JOIN 
    favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId 
    WHERE categories_id = $itemscat AND items_type=$itemsType
    UNION ALL SELECT allitems.* , 0 as favorite FROM allitems
     WHERE categories_id = $itemscat AND items_type=$itemsType AND allitems.items_id != 
     (SELECT allitems.items_id FROM allitems INNER JOIN
      favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=$userId)");
    $stmt2->execute();
    $data = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $alldata["data"]=$data;
    //--------------------------------
    if($data!=null){
        echo json_encode($alldata);
    }else{
        $alldata["status"]="failure";
        echo json_encode($alldata);
    }
    }
   
    /*SELECT allitems.* , 1 as favorite FROM allitems INNER JOIN favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=1 WHERE categories_id = 18
UNION ALL
SELECT allitems.* , 0 as favorite FROM allitems WHERE categories_id = 18 AND allitems.items_id != (SELECT allitems.items_id FROM allitems INNER JOIN favorite ON allitems.items_id = favorite.favorite_itemsid AND favorite.favorite_usersid=1)*/
?>