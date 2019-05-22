<?php
ob_start();
session_start();
if($_POST["id"]!="" && $_POST["pass"]!=""){
include("connected.php");
$id=$_POST["id"];
$pass=$_POST["pass"];

$id=base64_encode($id);
$pass=base64_encode($pass);

$sql="select * from account where id='".$id."' and password='".$pass."' ";

$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
$row=mysqli_num_rows($result);
if(!$row){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"Login ผิดพลาดกรุณาลองใหม่อีกครั้ง\");";
  echo "</script>";
  exit();
}else{
  $id=base64_decode($id);
  $_SESSION["id"]=$id;
  $_SESSION["username"]=$rs["username"];
  $_SESSION["picture"]="pictureaccount/".$rs["picture"];
  echo "<script type=\"text/javascript\">";
  echo "alert(\"Login สำเร็จเเล้วครับ\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
}
}
 ?>
