<?php

include "../connect.php";
$userid=filterRequest("users_id");
$itemsid=filterRequest("items_id");

deleteData("favorite","favorite_userid=$userid AND favorite_itemid=$itemsid");
?>