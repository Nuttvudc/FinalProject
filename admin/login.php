<?php
session_start();
include('connected.php');

$sql="select * from account where id='".$_POST['id']."' and password='".$_POST['pass']."'";
$result=mysqli_query($con,$sql) or die($sql);
$rs=mysqli_fetch_array($result);
if($rs['id']==false){
  echo "<script type=\"text/javascript\">";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else {
  $_SESSION['admin'] = $_POST['id'];
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ยินดีต้อนรับเข้าสู่ระบบ\");";
  echo "window.location='edit.php';";
  echo "</script>";
}
 ?>
