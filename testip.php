<?php
SESSION_START();
ob_start();
include("connected.php");

if($_SESSION["id"]==false){
$sql="select * from account where id='".base64_encode($_SERVER["REMOTE_ADDR"])."'";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);
if ($row) {
  $_SESSION["id"]=$_SERVER["REMOTE_ADDR"];

}else {
  $sql="insert into account(id) VALUES('".base64_encode($_SERVER["REMOTE_ADDR"])."')";
  $result=mysqli_query($con,$sql);
  $_SESSION["id"]=$_SERVER["REMOTE_ADDR"];
}

?>
