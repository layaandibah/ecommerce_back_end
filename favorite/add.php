<?php

include "../connect.php";
$userid=filterRequest("users_id");
$itemsid=filterRequest("items_id");

$data=array(
    "favorite_userid"=>$userid,
    "favorite_itemid"=>$itemsid,

);
insertData("favorite",$data);

?>