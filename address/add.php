<?php

include "../connect.php";
$userid = filterRequest("users_id");
$name = filterRequest("address_name");
$city = filterRequest("address_city");
$street = filterRequest("address_street");
$lat = filterRequest("address_lat");
$lang = filterRequest("address_long");
$data=array(
    "address_usersid"=>$userid,
    "address_name"=>$name,
    "address_city"=>$city,
    "address_street"=>$street,
    "address_lat"=>$lat,
    "address_long"=>$lang,
);
insertData("address",$data);



