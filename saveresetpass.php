<?php
session_start();
include('3.php');
$newpass=base64_encode($_POST['pass']);
$id=base64_encode($_SESSION['id']);

$sql="update account set password='".$newpass."' where id='".$id."'";

if (mysqli_query($con,$sql)) {
  $sql="select * from account where id='".$id."'";
  $result=mysqli_query($con,$sql);
  $rs=mysqli_fetch_array($result);
  $_SESSION['username']=$rs['username'];
  $_SESSION['picture']="pictureaccount/".$rs['picture'];
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ทำการรีเซ็ต PASSWORD เรียบร้อยเเล้วครับ\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
  exit();
   }
 }else {
   echo "<script type=\"text/javascript\">";
   echo "alert(\"PASSWORD ปัจจุบันของท่านไม่ถูกต้อง\");";
   echo "window.location=\"homepage.php\"";
   echo "</script>";
   exit();
 }
?>
