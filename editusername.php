<?php
include("connected.php");
session_start();
$id=base64_encode($_SESSION["id"]);

$sql="select username from account where username='".$_POST["username"]."'";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);
if($row){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"NAME USER มีการใช้ซ้ำกรุณากรอกใหม่อีกครั้ง หากต้องการเเก้ไขครับ\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}

$sql="update account set username='".$_POST["username"]."' where id='".$id."'";

if(mysqli_query($con,$sql)){
  $_SESSION["username"]=$_POST["username"];
  echo "<script type=\"text/javascript\">";
  echo "alert(\"บันทึกการเเก้ไข USERNAME สำเร็จเเล้วครับ\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}
 ?>
