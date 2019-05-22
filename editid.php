<?php
include("connected.php");
session_start();

$id=$_SESSION["id"];
$newid=base64_encode($_POST["id"]);
$question=$_POST["question"];
$answer=$_POST["answer"];

$sql="select * from account where id='".$newid."'";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);

if ($row) {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ID มีการใช้ซ้ำกรุณากรอกใหม่อีกครั้งครับ\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}

$id=base64_encode($id);
$answer=base64_encode($answer);
$sql="select * from account where id='".$id."' and answer='".$answer."'";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);

if (!$row) {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"คำตอบเพื่อใช้ในการเปลี่ยนรหัสไม่ถูกต้อง\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}
$sql="update account set id='".$newid."' where id='".$id."'";
if (mysqli_query($con,$sql)) {
  $_SESSION["id"]=base64_decode($newid);
  echo "<script type=\"text/javascript\">";
  echo "alert(\"บันทึกการเเก้ไข ID สำเร็จเเล้วครับ\");";
  echo "window.history.back();";
  echo "</script>";
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}
 ?>
