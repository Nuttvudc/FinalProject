<?php
include('connected.php');
$sql="delete from travel where id_travel='".$_GET['id']."'";
$result=mysqli_query($con,$sql);

if ($result==false) {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อเจ้าหน้าที่\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ทำการลบข้อมูลสำเร็จ\");";
  echo "window.location='detailplaceadmin.php';";
  echo "</script>";
}

 ?>
