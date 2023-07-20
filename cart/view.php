<?php

include "../connect.php";
$userid=filterRequest("users_id");
$alldata=array();
$alldata["status"]="success";
$data=getAllData("allitemscart","cart_usersid=$userid ",null,false);

$stmt = $con->prepare("SELECT SUM(totalprice) as  totalcartprice,COUNT(itemscount) as totalitemscount FROM allitemscart WHERE cart_usersid=$userid GROUP BY cart_usersid");
    $stmt->execute();
    $dataprice=$stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if($data==null&&$dataprice==false){
     $alldata["status"]="failure";
    }else{
     $alldata["status"]="success";
     $alldata["datacart"]=$data;
     $alldata["countprice"]=$dataprice;
    }
    echo json_encode($alldata);
  

?>