<?php
session_start();
ob_start();
?>
<?php
include("connected.php");
$id = $_POST["id"];
$pass = $_POST["pass"];
$passagain = $_POST["passagain"];
$name=$_POST["username"];
$question=$_POST["question"];
$answer=$_POST["answer"];

$id = base64_encode($id);
$pass = base64_encode($pass);
$answer = base64_encode($answer);

$sql="select id from account where id='".$id."'";

$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);

if($row){
   echo "<script type=\"text/javascript\">";
   echo "alert(\"ID มีการใช้ซ้ำกรุณากรอกใหม่อีกครั้งครับ\");";
   echo "window.history.back();";
   echo "</script>";
   exit();
}
$sql="select username from account where username='".$name."'";
$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);
if($row){
   echo "<script type=\"text/javascript\">";
   echo "alert(\"NAME USER มีการใช้ซ้ำกรุณากรอกใหม่อีกครั้งครับ\");";
   echo "window.history.back();";
   echo "</script>";
   exit();
}
$info = pathinfo( $_FILES["picture"]["name"] , PATHINFO_EXTENSION ) ;
$_FILES["picture"]["name"]=$id.".".$info;
$sql = "INSERT INTO `account`(`id`, `password`, `username`, `picture`, `question`, `answer`) VALUES ('".$id."','".$pass."','".$name."','".$_FILES["picture"]["name"]."','".$question."','".$answer."')";
if(mysqli_query($con,$sql)){
  if(move_uploaded_file($_FILES["picture"]["tmp_name"],"pictureaccount/".$_FILES["picture"]["name"])){
  $id=base64_decode($id);
  $_SESSION["id"]=$id;
  $_SESSION["username"]=$name;
  $_SESSION["picture"]= "pictureaccount/".$_FILES["picture"]["name"];
  echo "<script type=\"text/javascript\">";
  echo "alert(\"การสมัครเสร็จสิ้น\");";
  echo "window.location='homepage.php'";
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
