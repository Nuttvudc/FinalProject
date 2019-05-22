<?php
include("connected.php");
$sql = "DELETE FROM `comment` WHERE id_comment = '".$_GET['id']."'";
$result = mysqli_query($con,$sql);
if($result !== false){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ลบเรียบร้อยเเล้วครับ\");";
  echo "window.location=\"edituser.php\"";
  echo "</script>";
}else{
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดข้อผิดพลาดกรุณาติดต่อเจ้าหน้าที่\");";
  echo "window.location=\"homepage.php\"";
  echo "</script>";
  exit();
}

 ?>
