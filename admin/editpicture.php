<?php
session_start();
include('connected.php');
$sql = "select max(id_picturetravel) as max from picturetravel";
$result = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($result);
$id=$rs['max'] + 1;
$_FILES["a"]["name"];
$info = pathinfo( $_FILES["a"]["name"] , PATHINFO_EXTENSION ) ;
$_FILES["a"]["name"]=$id.".".$info;
$sql = "INSERT INTO `picturetravel`(`id_travel`, `name_picturetravel`) VALUES ('".$_POST['id']."','".$_FILES["a"]["name"]."')";
if(mysqli_query($con,$sql)){
  if(move_uploaded_file($_FILES["a"]["tmp_name"],"images/picturetravel/".$_FILES["a"]["name"])){
    $event = "เพิ่มรูปภาพ รหัสสถานที่ : ".$_POST['id']." รหัสรูป : ".$id." รูป : ".$_FILES["a"]["name"]."";
    $sql = "insert into logfile(ip_log,id_admin_log,event_log,id_travel) VALUES('".$_SERVER["REMOTE_ADDR"]."','".$_SESSION['admin']."','".$event."','".$_POST['id']."')";
    $result = mysqli_query($con,$sql);

    if($result == false){
      echo "<script type=\"text/javascript\">";
      echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
      echo "window.history.back();";
      echo "</script>";
    exit();
        }
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เพิ่มรูปเรียบร้อยเเล้ว\");";
  echo "window.history.back();";
  echo "</script>";
   }
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดปัญหากรุณาติดต่อเจ้าหน้าที่ผู้ดูเเล\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}
?>
