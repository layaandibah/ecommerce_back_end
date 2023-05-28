<?php

include "connect.php";

$alldata=array();
$alldata["status"]="success";

$allcategories=getAllData("categories",null,null,false);

$alldata["categories"]=$allcategories;
echo json_encode($alldata);
?>