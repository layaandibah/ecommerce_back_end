<?php

include "../connect.php";
$addressid = filterRequest("address_id");
$city = filterRequest("address_city");
$name = filterRequest("address_name");
$street = filterRequest("address_street");
$lat = filterRequest("address_lat");
$lang = filterRequest("address_long");
$data=array(
    "address_name"=>$name,
    "address_city"=>$city,
    "address_street"=>$street,
    "address_lat"=>$lat,
    "address_long"=>$lang,
);
updateData("address",$data,"address_id=$addressid");



