<?php
session_start();
include("connected.php");
$sqlcheck = "select * from service where id_service = '".$_POST['id_service']."'";
$resultcheck = mysqli_query($con,$sqlcheck);
$rscheck = mysqli_fetch_array($resultcheck);



$sql="UPDATE `service` SET `name_service`='".$_POST['name_service']."',`price_service`='".$_POST['price_service']."' WHERE `id_service`='".$_POST['id_service']."'";



if (mysqli_query($con,$sql)) {
  $event = "เเก้ไขบริการ : รหัสบริการ : ".$_POST['id_service']." จากบริการ : ".$rscheck['name_service']." ราคา :".$rscheck['price_service']." เป็น บริการ :".$_POST['name_service']." ราคา : ".$_POST['price_service']."";
  $sql = "insert into logfile(ip_log,id_admin_log,event_log,id_travel) VALUES('".$_SERVER["REMOTE_ADDR"]."','".$_SESSION['admin']."','".$event."','".$_POST['id_travel']."')";
  $result = mysqli_query($con,$sql);
  if($result == false){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
    echo "window.history.back();";
    echo "</script>";
  exit();
  }
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ทำการเเก้ไขเรียบร้อยเเล้วครับ\");";
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
