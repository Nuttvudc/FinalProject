<?php
session_start();
include("connected.php");
$sql="INSERT INTO `service`(`name_service`, `price_service`, `id_travel`) VALUES ('".$_POST['name']."','".$_POST['price']."','".$_POST['id']."')";

if (mysqli_query($con,$sql)) {
  $event = "เพิ่มบริการ : ".$_POST['name']."";
  $sql = "insert into logfile(ip_log,id_admin_log,event_log,id_travel) VALUES('".$_SERVER["REMOTE_ADDR"]."','".$_SESSION['admin']."','".$event."','".$_POST['id']."')";
  $result = mysqli_query($con,$sql);
  if($result == false){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
    echo "window.location=\"homepage.php\"";
    echo "</script>";
  exit();
  }
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ทำการเพิ่มข้อมูลการบริการเเล้วครับ\");";
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
