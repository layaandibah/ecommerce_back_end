<?php

include "../connect.php";
$itemscat=filterRequest("category_name");

getAllData("items","items_cat ='$itemscat'");

?>