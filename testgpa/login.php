<?php
session_start();
include ("connected.php");
if(isset($_POST['pass']) && isset($_POST['id'])){
$_POST['pass']=md5($_POST['pass']);
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
  echo "window.location='phpMySQLAddForm.php';";
  echo "</script>";
}
}else if(isset($_GET['logout'])){
  echo "<script type=\"text/javascript\">";
  echo "window.location='index.php';";
  echo "</script>";
  session_destroy();
  exit();
}else {
  echo "<script type=\"text/javascript\">";
  echo "window.history.back();";
  echo "</script>";
  exit();
}
 ?>
