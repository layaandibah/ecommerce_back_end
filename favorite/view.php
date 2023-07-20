<?php

include "../connect.php";
$userid=filterRequest("users_id");

getAllData("allfavorite","favorite_userid=$userid");

?>