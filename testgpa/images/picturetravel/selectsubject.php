

<!DOCTYPE html>
<html lang="en">
<head>
  <title>http://www.dusit.ac.th/</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
   function returnpagetem(){
     window.location.href ="tem.php";
   }
  </script>
  <style>

  .fakeimg {
      height: 200px;
      background: #aaa;
  }
  /* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #6699FF;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
}

button:hover {
    opacity: 0.8;
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
table, th, td {
  font-family: "FreesiaUPC";
	font-size: 24px;
}
 th, td {
    border: 0px solid black;
}
table {
    border: 0px solid black;
	border-radius: 25px;
}
#customers {
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 0px solid #ddd;
    padding: 5px;
}



#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #81b9bf;
    color: black;
    border: 0px solid #000000;
    padding: 5px;
}
.container {
background-color: #acd5ff;

}
button {
    background-color: #81b9bf;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 30%;
    font-size: 36px;
}

button:hover {
    opacity: 0.8;
}
.col-12{width: 100%}
.col-4 {width: 33.33%;}
.col-6 {width: 50%;}
.col-8 {width: 66.67%;}
.col-24 {width: 20%;}
[class*="col-"] {
    float: left;
    padding: 20px;
  /*  border: 5px solid red; */
}
/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #4bacb8;
    font-family: "FreesiaUPC";
  	font-size: 24px;
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



/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  border: 5px solid #f1f1f1;
  background-color: rgb(103, 171, 214);
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}


.form-container .btncancel {
  background-color: red;
  width: 100%;
  color: white;
}

.btn {
  display:block;
  height: 110px;
  width: 110px;
  border-radius: 50%;
  /* border: 1px solid red; */
}
.container {
    padding: 16px;
}
.container {
background-color: #acd5ff;

}
body {
   background-color :#80deea;
  background-repeat: repeat-x;
}


  </style>
</head>
<body>


  <?PHP
  function strDec($str){
    $ex = explode('.',$str);
    $s = substr($ex[1],0,2);
    if($s == ''){
      $s = '00';
      }
      if($ex[0] == ''){
        $ex[0] = '0';
        }
        $dec =  $ex[0].".".$s;
        return $dec;
        }

  $con = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","test") or die("Connect Database Error");
  if(isset($_POST['delete'])){
     for($i =1; $i <= count($_POST['credit']);$i++){
     print $sql = "delete from ipsubject where id_ipsubject = '".$_POST['delete'][$i]."'";
     $result = mysqli_query($con,$sql) or die("Error");
      }
      ?>
      <script type="text/javascript">
       window.location.href = "tem.php";
      </script>
      <?php
      exit();
   }
   else if(!isset($_POST['namesubject'])){
	   ?>
      <script type="text/javascript">
	  window.location.href = "tem.php";
	  alert("กรุณาเพิ่มวิชาก่อนทำการคำนวนผล");
	  </script>
<?php
}else if(isset($_POST['grade'])){
  for($i=1;$i<=count($_POST["grade"]);$i++){
   if($_POST["grade"][$i] == false){
     ?>
    <script type="text/javascript">
    window.location.href = "tem.php";
    alert("กรุณาเพิ่มเกรดก่อนทำการคำนวนผล");
    </script>
    <?php
   }
  }
}
?>



    <img src="static/images/new.png"/ width="100%">


    <div class="topnav" style="padding-left:100px;">
      <a href="https://academic.dusit.ac.th">ระบบบริหารการศึกษา</a>
      <a href="savesubject.php?FNAME=pdfku.pdf">คู่มือการใช้งาน</a>
      <a style="float:right"></a>
    </div>
<br>
<br>
<center style="padding-left:300px; padding-right:300px;">
 <table width=100% cellpadding="5" cellspacing="" style="background-color:#eeeeee;"><tr><td>
 <div class="col-12" id="box2">

<center><table width=90% cellpadding="4" cellspacing="0"><tr><td style="border 5px ;"><table  align = 'right' width=20% cellpadding="4" cellspacing="0";><tr><td style="border 5px;"><table width=100%  id="customers">
  <tr align = 'center'>




  </tr>
  <tr align = 'center'>
	<th>CAX</th>
	<th>CGX</th>

  </tr>
  <tr>
	<td><center><?php $cax=$_POST['CAX']; if($_POST['CAX'] != false)
                                         { print $_POST['CAX'];
                                         }else{ print 0;} ?></center></td>
	<td><center><?php $cgx=$_POST['CGX']; if($_POST['CGX'] != false)
                                        { print $_POST['CGX'];
                                        }else{ print 0;} ?></center></td>
  </tr>
</table></td></tr></table>

<table  id="customers" width=100% cellpadding="8" cellspacing="" style="background-color:#eeeeee;">
  <tr>
  <th>ลำดับที่</th>
  <th>รหัสวิชา</th>
  <th>ชื่อวิชา</th>
	<th>หน่วยกิต</th>
	<th>เกรด</th>
	<th>GP</th>
	<th>CAX</th>
	<th>CGX</th>
  </tr>
  <?php for($i=1;$i<=count($_POST["credit"]);$i++){
    $sql = "Update ipsubject set grade = '".$_POST['grade'][$i]."' where id_ipsubject='".$_POST['pickcredit'][$i]."'";
    $result = mysqli_query($con,$sql);
    ?>
  <tr align = 'center'>
  <td><?php print $i; ?></td>
  <td><?php print $_POST['idsubject'][$i]; ?></td>
  <td><?php print $_POST['namesubject'][$i]; ?></td>
	<td><?php print $_POST["credit"][$i]; ?></td>
	<td><?php print $_POST["grade"][$i];
  if($_POST["grade"][$i] == "A"){
     $_POST["grade"][$i] = 4;
  }else if($_POST["grade"][$i] == "-A"){
     $_POST["grade"][$i] = 3.75;
  }else if($_POST["grade"][$i] == "B+"){
     $_POST["grade"][$i] = 3.5;
  }else if($_POST["grade"][$i] == "B"){
     $_POST["grade"][$i] = 3.0;
  }else if($_POST["grade"][$i] == "C+"){
     $_POST["grade"][$i] = 2.5;
  }else if($_POST["grade"][$i] == "C"){
     $_POST["grade"][$i] = 2.0;
  }else if($_POST["grade"][$i] == "D+"){
    $_POST["grade"][$i] = 1.5;
  }else if($_POST["grade"][$i] == "D"){
    $_POST["grade"][$i] = 1;
  }else if($_POST["grade"][$i] == "W" || $_POST["grade"][$i] == "NP"){
    $_POST["credit"][$i] = 0;
  }else if($_POST["grade"][$i] == "P" || $_POST["grade"][$i] == "PD"){
    $credittotal += $_POST["credit"][$i];
    $_POST["credit"][$i] = 0;
  }else if($_POST["grade"][$i] == "F"){
    $_POST["grade"][$i] = 0;
    $F += $_POST["credit"][$i];
  }
  $credittotal += $_POST["credit"][$i];
   ?></td>
	<td><?php print number_format($_POST["credit"][$i] * $_POST["grade"][$i],2); ?></td>
	<td><?php print number_format($cax += $_POST['credit'][$i],2); ?></td>
	<td><?php print number_format($cgx += $_POST['grade'][$i] *  $_POST['credit'][$i],2); ?></td>
  </tr>
<?php } ?>
   <tr>

	<th COLSPAN = "8" >
    <div style="padding-right:37px;">
    หน่วยกิตประจำภาค&nbsp:&nbsp<?php print $creditsuccess=$credittotal-$F ; ?> หน่วยกิต</th>
    </div>
  </tr>



  <?php
    for($a=1;$a<=count($_POST["credit"]);$a++){
    $cgxhit += $_POST['credit'][$a] * $_POST['grade'][$a];
    $caxhit += $_POST['credit'][$a];
    }
	if($caxhit == 0){
       $caxhit = 1;
	}
    $total = $cgxhit/$caxhit;
    ?>
   <tr>
     <th COLSPAN = "8" >
     <div style="padding-right:80px;">
         เกรดเฉลี่ยประจำภาค : <?php print strDec(number_format($total,2)); ?>
     </div>
  </th>
  </tr>
  <tr>
    <th COLSPAN = "8" >
    <div style="padding-right:50px;">
      เกรดเฉลี่ยสะสม : <?php if($cax == 0){
          $cax = 1;
   	} print strDec(number_format($cgx/$cax,2)); ?>
    </div>
   </th>
 </tr>
</table>
<div class="form-popup" id="myForm">
  <form action="tem.php" class="form-container" method="post">

      <div class="col-24">
          <img src="static/images/picturerating/55.png"  width="100px" height="100px" >
          <input type="radio" name="rating" value="very good" required>VERY GOOD<br>
      </div>
      <div class="col-24">
         <img src="static/images/picturerating/44.png"  width="100px" height="100px" >
          <input type="radio" name="rating" value="good" required>GOOD<br>
      </div>
      <div class="col-24">
          <img src="static/images/picturerating/333.png"  width="100px" height="100px" >
          <input type="radio" name="rating" value="ok" required>OK<br>
      </div>
      <div class="col-24">
          <img src="static/images/picturerating/222.png"  width="100px" height="100px" >
          <input type="radio" name="rating" value="not good" required>NOT GOOD<br>
      </div>
      <div class="col-24">
          <img src="static/images/picturerating/11.png"  width="100px" height="100px" >
          <input type="radio" name="rating" value="terrible" >TERRIBLE<br>
      </div>

  <input title="บันทึกการให้คะแนน"type="image" src="static/images/save.PNG" width="100" height="30" />
  </form>
</div>
<center>
 <button style="background-color:#81b9bf;" onclick="openForm()"><font color="#000000">เเบบสำรวจให้คะเเนน</button> <button onclick="returnpagetem()">ย้อนกลับ</font></button>
</center>

</td></tr></table><br></div></body>
</html>
<script>
function openForm() {
  var x = document.getElementById("myForm");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

</script>
<?php
