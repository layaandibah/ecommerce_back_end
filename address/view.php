<?php

include "../connect.php";
$addressid=filterRequest("users_id");
getAllData("address","address_usersid=$addressid");
?>