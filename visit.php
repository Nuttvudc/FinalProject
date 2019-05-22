<?php
include('connected.php');

$sql="select * from counter where ip_visit='".$_SERVER['REMOTE_ADDR']."' and date_visit='".date('Y-m-d')."' and id_travel='".$_GET['id']."'";
$result=mysqli_query($con,$sql) or die($sql);

if ($result==false) {

}else {
  $rs=mysqli_fetch_array($result);
  if ($rs['ip_visit']==$_SERVER['REMOTE_ADDR'] and $rs['date_visit']==date('Y-m-d') and $rs['id_travel']==$_GET['id']) {

  }else {
    $sql="insert into counter VALUES('','".date('Y-m-d')."','".$_SERVER['REMOTE_ADDR']."','".$_GET['id']."')";
    $result=mysqli_query($con,$sql);
    if (!$result) {

    }else {

    }
  }

}
 ?>
