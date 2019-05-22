<?php
include("connected.php");
session_start();
$id=base64_encode($_SESSION["id"]);
$pass=base64_encode($_POST["password"]);
print $sql="select * from account where id='".$id."' and password='".$pass."'";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);

if($row){
  $_POST["newpass"]=base64_encode($_POST["newpass"]);
  $sql="update account set password='".$_POST["newpass"]."' where id='".$id."'";
  if(mysqli_query($con,$sql)){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"บันทึกการเเก้ไข PASSWORD สำเร็จเเล้วครับ\");";
    echo "window.location=\"homepage.php\"";
    echo "</script>";
  }else {
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
    echo "window.history.back();";
    echo "</script>";
    exit();
  }
}/*else{
  echo "<script type=\"text/javascript\">";
  echo "alert(\"PASSWORD ปัจจุบันไม่ถูกต้อง\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}


 ?>
