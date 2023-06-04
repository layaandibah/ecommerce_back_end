<?php

include "../connect.php";
$itemscat=filterRequest("category_id");
$itemsType=filterRequest("items_type");

$alldata=array();
$alldata["status"]="success";

if($itemsType < 0){
    getAllData("allitems","categories_id =$itemscat",null);
}else{
    getAllData("allitems","`items_type`=$itemsType",null);
}



//$allitems=getAllData("allitems","categories_id =$itemscat");
/*$items=array();
$itemsdiscount=array();
$itemssoldout=array();
$itemsdiscountsoldout=array();

$items=getAllData("allitems","items_cat =$itemscat AND items_discount=0 AND items_active=1",null,false);
$itemssoldout=getAllData("allitems","items_cat =$itemscat AND items_discount=0 AND items_active=0",null,false);
$itemsdiscount=getAllData("allitems","items_cat =$itemscat AND items_discount!=0 AND items_active=1",null,false);
$itemsdiscountsoldout=getAllData("allitems","items_cat =$itemscat AND items_discount!=0 AND items_active=0",null,false);
if($items==null && $itemsdiscount ==null && $itemsdiscountsoldout==null && $itemssoldout==null){
$allitems["status"]="failure";
}else{
$allitems["status"]="success";
if($items!=null){
    $allitems["items"]=$items;
}
if($itemsdiscount!=null){
    $allitems["itemsdiscount"]=$itemsdiscount;
}
if($itemsdiscountsoldout!=null){
    $allitems["itemsdiscountsoldout"]=$itemsdiscountsoldout;
}
if($itemssoldout!=null){
    $allitems["itemssoldout"]=$itemssoldout;
}
}*/


//$allitems["itemsdiscount"]=$itemsdiscount;
//$allitems["itemssoldout"]=$itemssoldout;
//$allitems["itemsdiscountsoldout"]=$itemsdiscountsoldout;


?>