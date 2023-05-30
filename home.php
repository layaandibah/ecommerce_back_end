<?php

include "connect.php";

$alldata=array();
$alldata["status"]="success";

$allcategories=getAllData("categories",null,null,false);
$allitemsdiscount=getAllData("itemsview","items_discount!=0",null,false);

$alldata["categories"]=$allcategories;
$alldata["itemsdiscount"]=$allitemsdiscount;

echo json_encode($alldata);
?>