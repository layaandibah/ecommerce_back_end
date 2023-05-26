<?php 
$dsn = "mysql:host=localhost;dbname=ecommerce" ; 
$user = "root" ;
$pass = "" ; 
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8" // FOR Arabic
);
try {

    $con = new PDO($dsn , $user , $pass , $option ); //تعليمة الاتصال
    $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
    include "function.php";
//مهتهم السماح للريكويست الوصول للباك اند من دون مشاكل     
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
header("Access-Control-Allow-Methods: POST, OPTIONS , GET");

//checkAuthenticate();

}catch(PDOException $e){
  echo $e->getMessage() ;   //في حال حدوث خطأ بالاتصال مع DB     
}