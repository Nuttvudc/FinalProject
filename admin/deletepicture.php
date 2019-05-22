<?php
session_start();
include("connected.php");

$sql="DELETE FROM `picturetravel` WHERE id_picturetravel='".$_GET['id']."'";

if (mysqli_query($con,$sql)) {
  $event = "ลบรูปภาพ รหัสสถานที่ : ".$_GET['travel']." รหัสรูป : ".$_GET['id']." รูป : ".$_GET['name']."";
  $sql = "insert into logfile(ip_log,id_admin_log,event_log,id_travel) VALUES('".$_SERVER["REMOTE_ADDR"]."','".$_SESSION['admin']."','".$event."','".$_GET['travel']."')";
  $result = mysqli_query($con,$sql);

  if($result == false){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
    echo "window.history.back();";
    echo "</script>";
  exit();
  }
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ทำการลบเรียบร้อยเเล้วครับ\");";
  echo "window.history.back();";
  echo "</script>";

}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
  exit();
   }
 ?>
