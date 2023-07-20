<?php

include "connect.php";

$alldata=array();
$alldata["status"]="success";
$allcategories=getAllData("categories",null,null,false);
$allitems=getAllData("allitems","items_discount>0",null,false);
if($allcategories==null && $allitems==null){
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