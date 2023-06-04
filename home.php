<?php

include "connect.php";

$alldata=array();
$alldata["status"]="success";

$allcategories=getAllData("categories",null,null,false);
$allitemsdiscount=getAllData("allitems","items_discount!=0 AND items_active=1",null,false);
$allitemssoldout=getAllData("allitems","items_active=0 AND items_discount=0",null,false);
$allitemsdiscountandsoldout=getAllData("allitems","items_active=0 AND items_discount!=0",null,false);
if($allcategories==null && $allitemsdiscount ==null && $allitemssoldout==null && $allitemsdiscountandsoldout==null){
    $alldata["status"]="failure";
    }else{
    $alldata["status"]="success";
    if($allcategories!=null){
        $alldata["categories"]=$allcategories;
    }
    if($allitemsdiscount!=null){
        $alldata["itemsdiscount"]=$allitemsdiscount;
    }
    if($allitemsdiscountandsoldout!=null){
        $alldata["itemsdiscountsoldout"]=$allitemsdiscountandsoldout;
    }
    if($allitemssoldout!=null){
        $alldata["itemssoldout"]=$allitemssoldout;
    }
    }
//$alldata["categories"]=$allcategories;
//$alldata["itemsdiscount"]=$allitemsdiscount;
//$alldata["itemssoldout"]=$allitemssoldout;
//$alldata["itemsdiscountsoldout"]=$allitemsdiscountandsoldout;

echo json_encode($alldata);
?>