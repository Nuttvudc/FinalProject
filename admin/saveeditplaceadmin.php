<?php
session_start();
include('connected.php');


if($_POST['tel_travel'] !== ""){
if(!is_numeric($_POST['tel_travel'])){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ข้อมูลเบอร์โทรศัพท์มีตัวอักษรอยู่กรุณาตรวจสอบการเเก้ไข : ".$_POST['tel_travel']."\");";
  echo "window.location=\"editplace.php?id=".$_POST['id_travel']."\"";
  echo "</script>";
 exit();
   }
}
$sqlcheck = "select * from travel where id_travel = '".$_POST['id_travel']."'";
$resultcheck = mysqli_query($con,$sqlcheck);
$rscheck = mysqli_fetch_array($resultcheck);


$sql = "UPDATE `travel` SET `name_travel`='".$_POST['name_travel']."',`tel_travel`='".$_POST['tel_travel']."',`web_travel`='".$_POST['web_travel']."',`facebook_travel`='".$_POST['facebook_travel']."',`address_travel`='".$_POST["address_travel"]."' WHERE id_travel = '".$_POST["id_travel"]."'";

if (mysqli_query($con,$sql)) {
  $event = "เเก้ไขสถานที่ :รหัสสถานที่ : ".$_POST['id_travel']." จากชื่อสถานที่ : ".$rscheck['name_travel']." เบอร์ :".$rscheck['tel_travel']." web : ".$rscheck['web_travel']." facebook : ".$rscheck['facebook_travel']." ที่อยู่ : ".$rscheck['address_travel']." เป็น
  ชื่อสถานที่ : ".$_POST['name_travel']." เบอร์ :".$_POST['tel_travel']." web : ".$_POST['web_travel']." facebook : ".$_POST['facebook_travel']." ที่อยู่ : ".$_POST["address_travel"]."";
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
