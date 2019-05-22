<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <h1>Hello World!</h1>
  <p>Three equal width columns! Try to add a new div with class="col" inside the row class - this will create four equal-width columns.</p>
  <div class="row">
    <div class="col" style="background-color:lavender;">
	ขั้นตอนการใช้งาน
	<br>1.พิมพ์ รหัสวิชา  7 หลัก(ในช่องพิมพ์รหัสวิชา)
	<br>2.คลิกเลือกเกรดที่ต้องการ
	<br>3.พิมพ์ข้อมูล  CAX, CGX เทอมล่าสุด (ตรวจสอบจาก มสด.29)
	<br>4.คลิกปุ่มคำนวณผลเเล้วโปรแกรมจะคำนวณเกรดเฉลี่ยสะสมอัตโนมัตื
	<br>5.ถ้าต้องการลบ สามารถลบได้ที่รหัสวิชา 7 หลัก
	</div>

    <div class="col" style="background-color:orange;"><div class="col-12">
  <form method="post" action="selectsubject.php" name="form1">
<table id="customers">
  <tr>
    <th width="10%"><input type="button" value="ลบ" onclick="deleteform1()" /></th>
    <th width="15%">รหัสวิชา</th>
    <th width="50%">ชื่อวิชา</th><center>
	<th width="10%">หน่วยกิต</th>
	<th width="10%">เกรด</th>

  </tr>

  <?php
  $con = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","test") or die("Connect Database Error");
  $sql = "select * from ipsubject where ip = '".$_SERVER['REMOTE_ADDR']."' order by id_ipsubject";
  if(isset($_GET['ip'])){
  $sql = "select * from ipsubject where ip = '".$_GET['ip']."' order by id_ipsubject";
  }
  $result = mysqli_query($con,$sql);
  $i = 1;
  while ($rs = mysqli_fetch_array($result)) {
  ?>
  <tr align = 'center'>
    <td><input type="checkbox" name="delete[<?php print $i; ?>]" value="<?php print $rs['id_ipsubject'] ?>"/><input type="text" name="pickcredit[<?php print $i; ?>]" value="<?php print $rs['id_ipsubject'] ?>" hidden/></td>
    <td><input type="text"  name="idsubject[<?php print $i; ?>]" value="<?php print $rs['id_subject'] ?>" placeholder="รหัสวิชา" hidden><a><?php print $rs['id_subject'] ?></a></center></td>
    <td><input type="text" name="namesubject[<?php print $i; ?>]" value="<?php print $rs['name_subject'] ?>" placeholder="รหัสวิชา" hidden><?php print $rs['name_subject'] ?></td>
  <td><input type="text" name="credit[<?php print $i; ?>]" value="<?php print $rs['credit'] ?>" placeholder="รหัสวิชา" hidden><?php print $rs['credit'] ?></td>
  <td><select  name="grade[<?php print $i ?>]" required>
    <option value="" >เลือกเกรด</option>
    <option value="A" <?php if($rs['grade'] == "A"){ echo "selected";} ?>>A</option>
    <option value="-A"<?php if($rs['grade'] == "-A"){ echo "selected";} ?>>A-</option>
    <option value="B+"<?php if($rs['grade'] == "B+"){ echo "selected";} ?>>B+</option>
    <option value="B" <?php if($rs['grade'] == "B"){ echo "selected";} ?>>B</option>
    <option value="C+"<?php if($rs['grade'] == "C+"){ echo "selected";} ?>>C+</option>
    <option value="C" <?php if($rs['grade'] == "C"){ echo "selected";} ?>>C</option>
    <option value="D+"<?php if($rs['grade'] == "D+"){ echo "selected";} ?>>D+</option>
    <option value="D" <?php if($rs['grade'] == "D"){ echo "selected";} ?>>D</option>
    <option value="F" <?php if($rs['grade'] == "F"){ echo "selected";} ?>>F</option>
    <option value="PD"<?php if($rs['grade'] == "PD"){ echo "selected";} ?>>PD</option>
    <option value="P" <?php if($rs['grade'] == "P"){ echo "selected";} ?>>P</option>
    <option value="NP"<?php if($rs['grade'] == "NP"){ echo "selected";} ?>>NP</option>
    <option value="W" <?php if($rs['grade'] == "W"){ echo "selected";} ?>>W</option>
    </select></td>
  </tr>
  <?php $i++; } ?>
</form>
  <form method="post" action="tem.php">
  <tr align = 'center' style="background-color:#6699FF;" >
    <td><input type="submit" VALUE="เพิ่มรายวิชา" id="addsubject"/></td>
    <td><input type="text" id="fname" name="idsubject" placeholder="พิมพ์รหัสวิชา"></center></td>
    <td></td>
  </form>
	<td></td>
	<td></td>
  </tr>



</table>
</div>
<div class="col-4">
<table width=60% cellpadding="4" cellspacing="0" style="border;">
  <tr align = 'center'>
  </tr>
  <tr align = 'center'>
  <td><font color="red"><strong>กรอก CAX</strong></font></td>
  <td><font color="red"><strong>กรอก CGX</strong></font></td>
  </tr>
  <tr>
  <td><input type="number"  name="CAX" placeholder="CAX" style="background-color: rgb(247, 203, 161); padding: 5px;"></td>
  <td><input type="number"  name="CGX" placeholder="CGX" style="background-color: rgb(247, 203, 161); padding: 5px;"></td>
  </tr>
</table></div><div class="col-4">
  <center style="padding-left : 100px;"><button onclick="submitform1()">คำนวณผล</button></center>
</div>
<div class="col-4">

</div></td></tr></table><br>
</div></font>
</div>
</table>
</body>
</html>
<?php
if(isset($_POST['idsubject'])){
$con = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","test") or die("Connect Database Error");
$idsubject = $_POST['idsubject'];

$sql = "select * from subject where id_subject = '$idsubject'";
$result = mysqli_query($con,$sql) or die("Query Database Error");
$numrow = mysqli_num_rows($result);
$rs = mysqli_fetch_array($result);

if ($numrow > 0) {
  ?>
  <script type="text/javascript">
  alert(" ทำการเพิ่มวิชา : <?php print $rs['name_subject'];?> ");
  window.location.href = "tem.php?ip=<?php print $_SERVER['REMOTE_ADDR'] ?>";
  </script>
  <?php
  $sql ="insert into ipsubject VALUES('','".$_SERVER['REMOTE_ADDR']."','".$rs['id_subject']."','".$rs['name_subject']."','".$rs['credit']."','')";
  $result = mysqli_query($con,$sql);
  exit();
}else{
  ?>
  <script type="text/javascript">
   alert("ไม่พบวิชาที่ต้องการเพิ่มกรุณาตรวจสอบความถูกต้องของเลขรหัสวิชา");
   window.location.href = "tem.php";
  </script>
  <?php

}
  }else if(isset($_POST['rating'])){
  $sql = "insert into rating_program(id_rating,ip,rating) VALUES('','".$_SERVER['REMOTE_ADDR']."','".$_POST['rating']."')";
  $result = mysqli_query($con,$sql);
  ?>
  <script type="text/javascript">
   alert("ขอบคุณสำหรับการให้คะเเนน");
   window.location.href = "tem.php";
  </script>
  <?php
  exit();
}
?></div>

  </div>
</div>