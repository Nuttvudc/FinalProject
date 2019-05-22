<html>
<header>
  <script>

  <?php
include("3.php");
session_start();
  ?>
  </script>
</header>
<body>
  <div class="container">
    <h1>Forget the password ?</h1>
<form id="editid" method="post" name="rstpass" action="resetpassword.php">
  <div class="form-group">
  <input type="text" id="textid" name="id" placeholder="ID ของท่าน" class="form-control"/>
  </div>
  <div class="form-group">
    <select class="form-control" name="question" required>
        <option value="">เลือกคำถามสำหรับ Reset ID PASSWORD</option>
        <option value="ชื่อสัตว์เลี้ยงตัวเเรกของคุณ">ชื่อสัตว์เลี้ยงตัวเเรกของคุณ</option>
        <option value="โรงเรียนมัธยมต้นที่คุณได้เข้า">โรงเรียนเเห่งที่สองที่คุณได้เข้าคุณได้เข้า</option>
        <option value="สถานที่ที่คุณเคยไปเที่ยวครั้งเเรก">สถานที่ที่คุณเคยไปเที่ยวครั้งเเรก</option>
        <option value="โทรศัพทธ์เครื่องเเรกของคุณคือ">โทรศัพทธ์เครื่องเเรกของคุณคือ</option>
    </select>
  </div>
  <div class="form-group">
    <input type="text" name="answer" class="form-control" placeholder="กรอกคำตอบเพื่อใช้ในการรีเซ็ต ID" />
  </div>
<div class="form-grop">
  <input type="submit" value="Reset Password" />
</div>
</form>
</div>
</body>
</html>
<?php
include("connected.php");

$id=base64_encode($_POST['id']);
$question=$_POST['question'];
$answer=base64_encode($_POST['answer']);

$sql="select * from account where id='".$id."' and question='".$question."' and answer='".$answer."'";

$result=mysqli_query($con,$sql);
$row=mysqli_num_rows($result);

if ($row) {
  $_SESSION['id']=$_POST['id'];
  if($_SESSION['id']){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"คุณได้สิทธ์ในการกำหนด password ใหม่\");";
  echo "window.location=\"conresetpass.php\"";
  echo "</script>";
}else {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"ไม่พบข้อมูลผู้ใช้เนื่องจาก ID question answer ไม่สอดคล้องกัน \");";
  echo "</script>";
  exit();
   }
}
 ?>
