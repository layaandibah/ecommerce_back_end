<?php

include "connect.php";

$alldata=array();
$alldata["status"]="success";

$allcategories=getAllData("categories",null,null,false);
$allitemsdiscount=getAllData("itemsview","items_discount!=0 AND items_active=1",null,false);
$allitemssoldout=getAllData("itemsview","items_active=0 AND items_discount=0",null,false);
$allitemsdiscountandsoldout=getAllData("itemsview","items_active=0 AND items_discount!=0",null,false);

$alldata["categories"]=$allcategories;
$alldata["itemsdiscount"]=$allitemsdiscount;
$alldata["itemssoldout"]=$allitemssoldout;
$alldata["itemsdiscountsoldout"]=$allitemsdiscountandsoldout;

echo json_encode($alldata);
?>