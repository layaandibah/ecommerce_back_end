<?php

include "../connect.php";
$itemscat=filterRequest("category_id");
$allitems=array();
$items=array();
$itemsdiscount=array();
$itemssoldout=array();
$itemsdiscountsoldout=array();

$items=getAllData("items","items_cat =$itemscat AND items_discount=0 AND items_active=1",null,false);
$itemssoldout=getAllData("items","items_cat =$itemscat AND items_discount=0 AND items_active=0",null,false);
$itemsdiscount=getAllData("items","items_cat =$itemscat AND items_discount!=0 AND items_active=1",null,false);
$itemsdiscountsoldout=getAllData("items","items_cat =$itemscat AND items_discount!=0 AND items_active=0",null,false);
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
}


//$allitems["itemsdiscount"]=$itemsdiscount;
//$allitems["itemssoldout"]=$itemssoldout;
//$allitems["itemsdiscountsoldout"]=$itemsdiscountsoldout;
echo json_encode($allitems);

?>