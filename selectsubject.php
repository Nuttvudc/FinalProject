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
  <script></script>
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
  font-family: "TH SarabunPSK";
	font-size: 24px;
}
table, th, td {
    border: 2px solid black;
}
#customers {
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 5px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #6699FF;
    color: white;
}
.container {
background-color: #acd5ff;

}
  </style>
</head>
<body>



  <?PHP
  $con = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","test") or die("Connect Database Error");
  if(isset($_POST['delete'])){
     for($i =1; $i <= count($_POST['delete']);$i++){
     $sql = "delete from ipsubject where ip='".$_SERVER['REMOTE_ADDR']."' and id_subject = '".$_POST['delete'][$i]."'";
     $result = mysqli_query($con,$sql) or die("Error");
      }
      ?>
      <script type="text/javascript">
       window.location.href = "tem.php";
      </script>
      <?php
      exit();
   }else if(!isset($_POST['namesubject'])){
	   ?>
      <script type="text/javascript">
	  window.location.href = "tem.php";
	  alert("กรุณาเพิ่มวิชาก่อนทำการคำนวนผล");
	  </script>
<?php
   }
?>

<div class="row" >
  <div class="col-sm-1">
    <div align="left" ></align><img align = 'center' src="static\images\4.png" style="height: 200px"></div>
  </div>
 <div class="col-sm-11" >

     <h1 align = 'left'><font face="TH SarabunPSK" size="6"><strong>โปรแกรมทดลองคำนวณเกรดเฉลี่ย </strong></font></h1>
     <p align = 'left'><font face="TH SarabunPSK" size="6"><strong>GPA EVALUATION TEST PROGRAM</strong></font></p></font>
     <p align = 'left'><font face="TH SarabunPSK" size="6"><strong>โดย สำนักส่งเสริมวิชาการเเละงานทะเบียน</strong></font></p></font>

 </div>
  </div>

<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: rgb(153, 153, 153);">
</nav>
<br>


<br>
<center><table width=90% cellpadding="4" cellspacing="0"><tr><td style="border 5px ;"><table  align = 'right' width=20% cellpadding="4" cellspacing="0";><tr><td style="border 5px;"><table width=100%>
  <tr align = 'center'>




  </tr>
  <tr align = 'center'>
	<td>CAX</td>
	<td>CGX</td>

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

<table id="customers">
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
  <?php for($i=1;$i<=count($_POST["credit"]);$i++){ ?>
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

	<th COLSPAN = "8" >จำนวนหน่วยกิต &nbsp: <?php print $creditsuccess=$credittotal-$F; ?> หน่วยกิต</th>
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
    <th COLSPAN = "8" >เกรดเฉลี่ยประจำภาค : <?php print number_format(round($total,2),2); ?></th>
  </tr>
  <tr>
   <th COLSPAN = "8" >เกรดเฉลี่ยสะสม : <?php if($cax == 0){
       $cax = 1;
	} print number_format(round($cgx/$cax,2),2); ?></th>
 </tr>
</table><form action="tem.php" method="get">
  <input type="text" name="ip" value="<?php print $_SERVER['REMOTE_ADDR']; ?>" hidden><br>
 <center> <button>ย้อนกลับ</button> </center>
</form></td></tr></table><br></div></body>
</html>
