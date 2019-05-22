<?php
session_start();
include("connected.php");

$sql="INSERT INTO `travel`(`name_travel`) VALUES ('".$_POST['name_travel']."')";


if (mysqli_query($con,$sql)) {
  $sql = "select * from travel where name_travel = '".$_POST['name_travel']."'";
  $result = mysqli_query($con,$sql);
  $rs = mysqli_fetch_array($result);
  $event = "เพิ่มสถานที่ : ".$_POST['name_travel']."";
  $sql = "insert into logfile(ip_log,id_admin_log,event_log,id_travel) VALUES('".$_SERVER["REMOTE_ADDR"]."','".$_SESSION['admin']."','".$event."','".$rs['id_travel']."')";
  $result = mysqli_query($con,$sql);
  if($result == false){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
    echo "window.location=\"homepage.php\"";
    echo "</script>";
  exit();
  }
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ทำการเพิ่มข้อมูลสถานที่เเล้วครับเเล้วครับ\");";
  echo "window.location=\"editplace.php?id=".$rs['id_travel']."&name=".$rs['name_travel']."\"";
  echo "</script>";
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
  exit();
   }

 ?>
