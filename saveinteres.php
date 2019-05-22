<?php
session_start();
include('connected.php');

$sql="select * from interested where id='".base64_encode($_SESSION['id'])."' and id_travel='".$_POST['id']."'";
$result=mysqli_query($con,$sql) or die($sql);

if($result==fasle){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ \");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else{
$rs=mysqli_fetch_array($result);
if($rs['id']==false){
  $sql="insert into interested(`id_interested`, `id_travel`, `id`) Values('','".$_POST['id']."','".base64_encode($_SESSION['id'])."')";
  $result=mysqli_query($con,$sql) or die($sql);
  if(!$result){
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ \");";
    echo "window.history.back();";
    echo "</script>";
    exit();
  }else{
    echo "<script type=\"text/javascript\">";
    echo "alert(\"ได้บันทึกเป็นสถานที่ที่คุณสนใจเเล้วครับ\");";
    echo "window.history.back();";
    echo "</script>";
  }
}else{
  if (!$result) {
    echo "<script type=\"text/javascript\">";
    echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ \");";
    echo "window.history.back();";
    echo "</script>";
    exit();
  }else {
    echo "<script type=\"text/javascript\">";
    echo "alert(\"สถานที่นี้อยู่ในบันทึกของคุณอยู่เเล้ว\");";
    echo "window.history.back();";
    echo "</script>";
  }
}
}

 ?>
