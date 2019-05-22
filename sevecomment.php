<?php
session_start();
include('connected.php');
$_POST['comment'];
$_POST['place'];
print $sql="insert into comment VALUES('','".$_POST['comment']."','".base64_encode($_SESSION['id'])."','".$_POST['place']."','".date('Y-m-d H:i:s')."')";
$result=mysqli_query($con,$sql);

if($result==false){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ \");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"คุณได้เเสดงความเห็นเป็นที่เรียนร้อยเเล้ว\");";
  echo "window.history.back();";
  echo "</script>";
}
 ?>
