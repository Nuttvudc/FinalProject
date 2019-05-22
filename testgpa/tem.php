<?php
$con = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","test") or die("Connect Database Error");
$sql="select * from counter where ip_visit='".$_SERVER['REMOTE_ADDR']."' and date_visit='".date('Y-m-d')."'";
$result=mysqli_query($con,$sql) or die($sql);
if ($result==false) {

}else {
  $rs=mysqli_fetch_array($result);
  if ($rs['ip_visit']==$_SERVER['REMOTE_ADDR'] and $rs['date_visit']==date('Y-m-d')) {

  }else {
    $sql="insert into counter VALUES('','".date('Y-m-d')."','".$_SERVER['REMOTE_ADDR']."')";
    $result=mysqli_query($con,$sql) or die("ERROR");
    if (!$result) {

    }else {

    }
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>โปรเเกรมทดลองคำนวนเกรดเฉลี่ย</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
 function submitform1(){
   document.form1.submit();
 }

  function deleteform1(){
    var a = confirm("ต้องการลบวิชาที่เลือก");
    if(a == true){
     document.form1.submit();
     return;
              }
     if(a == false){
      return;
     }
  }


	function fncOpenPopup()
	{
		window.open('popup2.html','popup-name','width=800,height=600,toolbar=0, menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
	}

  </script>
  <style>
  #example1 {
  border: 2px solid red;
  padding: 10px;
  border-radius: 25px;
}
  /* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #4CAF50;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #000000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

table, th, td, h1, h5 {
  font-family: "FreesiaUPC";
	font-size: 24px;
	
}

  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  /* Full-width input fields */
input[type=text], input[type=password], input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color:#81b9bf;
    color: #000000;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 75%;
    font-size: 36px;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
th, td{
  border:0px solid black;

}
table{
  border: 0px solid black;
  border-radius: 25px;
}

#customers {
    border-collapse: collapse;
    width: 100%;
}

#customers td {
    border: 0px solid #ddd;
    padding: 5px;

}
#customers th {
  border: 0px solid #000000;
  padding: 5px;

}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #dddddd;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #81b9bf;
    color: white;

}

.container {
background-color: #acd5ff;

}
#addsubject {
  background-color: #dddddd;
  color: Black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;

}
.col-12{width: 100%}
.col-4 {width: 33.33%;}
.col-6 {width: 50%;}
.col-8 {width: 66.67%;}
[class*="col-"] {
    float: left;
    padding: 10px;
  border: 1px solid red; 
}
#box2 {
  height: 50%;
}
body {
   background-color :#80deea;
  background-repeat: repeat-x;
}
/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #4bacb8;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #000000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #00766c;
    color: black;
}
#idcgx {
  padding: 0px;
}

  </style>
</head>
<body>

<font face="FreesiaUPC" size="5"><body>


     <center><img src="static/images/new.png"/ width="100%"></center>

     <div class="topnav" style="padding-left:100px;">
	   <a href="https://academic.dusit.ac.th" target="_blank">ระบบบริหารการศึกษา</a>
	   <a href="savesubject.php?FNAME=pdfku.pdf" target="_blank">คู่มือการใช้งาน</a>
     <?php
      $sql = "select count(id_visit) from counter";
      $result = mysqli_query($con,$sql);
      $rs = mysqli_fetch_array($result);
     ?>
     <a target="_blank">จำนวนผู้ใช้งาน : <?php echo $rs['count(id_visit)']; ?> </a>
       <a style="float:right"></a>
     </div>
	 <br>



<center style="padding-left:300px; padding-right:300px;">
  <table style="background-color:#c8a415;"><div class="col-12">


  <table width=100% cellpadding="5" cellspacing="" style="background-color:#eeeeee;"><tr><td>
 <div class="col-8" id="box2">

   <table  align = 'left' width="660" cellpadding="5" cellspacing="0" >
   <tr align = 'center'>
   </tr>

	<h1><strong>ขั้นตอนการใช้งาน</strong></h1>
 	<h5>1. ศึกษาวิธีการใช้งานจากคู่มือการใช้งาน<br>2. พิมพ์รหัสวิชา 7 หลัก(ในช่องพิมพ์รหัสวิชา) เเล้วกดเพิ่ม<br>3. เลือกเกรดที่ต้องการ<br>4. พิมพ์ข้อมูล CAX,CGX เทอมล่าสุด(ตรวจสอบจาก มสด.29)<a href="" name="btnOpen" value="ตัวอย่าง" OnClick="fncOpenPopup();"><font size="" color="blue">&nbsp<u>ตัวอย่าง</u></font></a><br>
	5. กดปุ่มคำนวณผลเเล้วโปรเเกรมจะคำนวณเกรดเฉลี่ยสะสมอัตโนมัติ<br>6. หากต้องการคำนวณผลเกรดเฉลี่ยใหม่ให้กดปุ่มย้อนกลับ<br>7. ทำแบบสำรวจให้คะเเนนความพึงพอใจ</h5></font>








 </table>
</div>
<div class="col-4" style="padding-top:80px;" id="idcgx">
  <form method="post" action="selectsubject.php" name="form1">
    <table width=46% cellpadding="4" cellspacing="0" style="border;" align="right">
      <tr align = 'center'>
      </tr>
      <tr align = 'center'>
      <td><font color="red"><strong>กรอก CAX</strong></font></td>
      <td><font color="red"><strong>กรอก CGX</strong></font></td>
      </tr>
      <tr>
      <td><input type="number"  name="CAX" placeholder="CAX" style="background-color: rgb(247, 203, 161); padding: 4px;"
	  value="<?php echo $_GET['cax'] ?>"></td>
      <td><input type="number"  name="CGX" placeholder="CGX" style="background-color: rgb(247, 203, 161); padding: 4px;"
	  value="<?php echo $_GET['cgx'] ?>"></td>
      </tr>
    </table>
</div>
<div class="col-12">
<table id="customers" >
  <tr>

	<th width="10%"><input    title="ลบรายวิชา"type="image" src="static/images/delete (2).png" width="25" height="25" onclick="deleteform1()"  /></th>


	<th width="15%"  ><font color="#000000">รหัสวิชา</th>
    <th width="50%"><font color="#000000">ชื่อวิชา</th>
	<th width="10%"><font color="#000000">หน่วยกิต</th>
	<th width="10%"><font color="#000000">เกรด</th></font>




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
    <option value="A-"<?php if($rs['grade'] == "A-"){ echo "selected";} ?>>A-</option>
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
  <tr align = 'center' style="background-color:#81b9bf;" >
    <td><input type="image" src="static/images/ide.png" title="เพิ่มรายวิชา" alt="Submit" width="25" height="25  id="addsubject"/></td>
    <td><input type="text" id="fname" name="idsubject" placeholder="พิมพ์รหัสวิชา"></center></td>
    <td></td>
  </form>
	<td></td>
	<td></td>
  </tr>



</table>
</div>
<div class="col-4">
</div><div class="col-4">
  <center><button onclick="submitform1();">คำนวณผล</button></center>
</div>
<div class="col-4">

</div></td></tr></table><br>
</div></font>
</div>

</table>

   
   
   
   
   
   
   
   <table   width="100%"  style="background-color:#eeeeee;" >
  <tr><td>
 ติดต่อสอบถาม สำนักส่งเสริมวิชาการและงานทะเบียน มหาวิทยาลัยสวนดุสิต
295 ถนนนครราชสีมา เขตดุสิต กรุงเทพฯ 10300<br> เบอร์โทรศัพท์ 02-244-5175  email : registsdu@gmail.com <br>
<a  href="https://www.facebook.com/regis.suandusit/" target="_blank">facebook : www.facebook.com/regis.suandusit</a>
    </tr></td>
</table>
</div>





</body>

</div>


   
   
   
   
   

</html>
<?php
if(isset($_POST['idsubject']) && $_POST['idsubject'] ==! false && $_POST['idsubject'] ==! ""){
$con = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","test") or die("Connect Database Error");
$idsubject = $_POST['idsubject'];

$sql = "select * from subject where id_subject = '$idsubject'";
$result = mysqli_query($con,$sql) or die("Query Database Error");
$numrow = mysqli_num_rows($result);
$rs = mysqli_fetch_array($result);

if ($numrow >= 1) {
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
  $sql = "insert into rating_program(id_rating,ip,rating,comment) VALUES('','".$_SERVER['REMOTE_ADDR']."','".$_POST['rating']."','".$_POST['comment']."')";
  $result = mysqli_query($con,$sql);
  ?>
  <script type="text/javascript">
   alert("ขอบคุณสำหรับการให้คะเเนน");
   window.location.href = "tem.php";
  </script>
  <?php
  exit();
}
?>
