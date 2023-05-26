<?php
include "../connect.php";

$name = filterRequest("username");
$email = filterRequest("email");
$phone = filterRequest("phone");
$password = sha1($_POST["password"]);
$verifycode = rand(10000,99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email=?  OR users_phone= ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    failure("phone or email");
} else {

    /* $data=array(
    "users_name" => $name,
    "users_password" => $password,
    "users_email" => $email,
    "users_phone" => $phone,
    "users_verifycode"=>"0",
    ); 
    insertData("users",$data);*/
    //طريقة ثانية 
    //  sendEmail($email,"Verify Code Ecommrerce","verify code is $verifycode");
    $stmt = $con->prepare("INSERT INTO `users`( `users_name`, `users_email`, `users_phone`, `users_verifycode`,`users_password`) VALUES (?,?,?,?,?)");
    $stmt->execute(array($name, $email, $phone, $verifycode, $password));
    $count = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "fail"));
    }
}
