<?php
include "..\connect.php";
$name=filterRequest("coupon_name");
//$date=filterRequest("coupon_date");
$datenow=date("y-m-d H:i:s");

$count=getData("coupon","coupon_name='$name' And coupon_expiredate>'$datenow' and coupon_count>0",null,false);
if($count>0){
    $stmt = $con->prepare("SELECT coupon_discount FROM coupon WHERE coupon_name= ? ");
    $stmt->execute(array($name));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(array("status"=>"success", "discount"=>$data));
}else {
    echo json_encode(array("status" => "failure"));
}

?>
