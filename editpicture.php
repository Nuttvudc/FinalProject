<?php
session_start();
ob_start();
include('connected.php');
$info = pathinfo( $_FILES["a"]["name"] , PATHINFO_EXTENSION ) ;
$_FILES["a"]["name"]=base64_encode($_SESSION['id']).".".$info;
$sql="update account set picture='".$_FILES["a"]["name"]."' where id='".base64_encode($_SESSION['id'])."'";
if(mysqli_query($con,$sql)){
  if(move_uploaded_file($_FILES["a"]["tmp_name"],"pictureaccount/".$_FILES["a"]["name"])){
  $_SESSION["picture"]= "pictureaccount/".$_FILES["a"]["name"];
  echo "<script type=\"text/javascript\">";
  echo "alert(\"บันทึการเเก้ไข PICTURE สำเร็จเเล้วครับ\");";
  echo "window.location='homepage.php'";
  echo "</script>";
}
}
else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}
?>
