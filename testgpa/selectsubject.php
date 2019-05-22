<?php
include("connected.php");
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
  <link rel="stylesheet" href="css/selectsubject.css"> 
  <script>
   function returnpagetem(){
     window.location.href ="tem.php?cax=<?php echo $_POST['CAX']; ?>&cgx=<?php echo $_POST['CGX']; ?>";
   }
  </script>
  <style>

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
	   <a href="https://academic.dusit.ac.th" target="_blank">ระบบบริหารการศึกษา</a>
	   <a href="savesubject.php?FNAME=pdfku.pdf" target="_blank">คู่มือการใช้งาน</a>
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
<br>
<font size = "6"; color="">ผลการคำนวณเกรดเฉลี่ย</font>

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
  }else if($_POST["grade"][$i] == "A-"){
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
    หน่วยกิตประจำภาค&nbsp&nbsp:&nbsp&nbsp<?php print $creditsuccess=$credittotal-$F ; ?> หน่วยกิต</th>
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
         เกรดเฉลี่ยประจำภาค&nbsp&nbsp :&nbsp&nbsp <?php print strDec(number_format($total,2)); ?>
     </div>
  </th>
  </tr>
  <tr>
    <th COLSPAN = "8" >
    <div style="padding-right:50px;">
      เกรดเฉลี่ยสะสม &nbsp&nbsp:&nbsp&nbsp <?php if($cax == 0){
          $cax = 1;
   	} print strDec(number_format($cgx/$cax,2)); ?>
    </div>
   </th>
 </tr>
</table>
<div class="form-popup" id="myForm">
  <form action="tem.php" class="form-container" method="post">

      <div class="col-24">
          <center><img src="static/images/picturerating/5.png"  width="100px" height="100px" ></center>
           <center><input type="radio" name="rating" value="very good" required>VERY GOOD</center>
      </div>
      <div class="col-24">
         <center><img src="static/images/picturerating/4.png"  width="100px" height="100px" ></center>
		 <center><input type="radio" name="rating" value="good" required>GOOD</center>

      </div>
      <div class="col-24">
          <center><img src="static/images/picturerating/2.png"  width="100px" height="100px" ></center>
          <center><input type="radio" name="rating" value="ok" required>OK</center>

      </div>
      <div class="col-24">
          <center><img src="static/images/picturerating/3.png"  width="100px" height="100px" ></center>
          <center><input type="radio" name="rating" value="not good" required>NOT GOOD</center>

      </div>
      <div class="col-24">
          <center><img src="static/images/picturerating/1.png"  width="100px" height="100px" ></center>
          <center><input type="radio" name="rating" value="terrible" >TERRIBLE</center>

      </div>
	  <div class="form-group">

<center><textarea rows="2" cols="50" name="comment"placeholder="Comment..." ></textarea></font></center>
   </div>


  <center><input title="บันทึกการให้คะแนน"type="image" src="static/images/save.PNG" width="100" height="30" /></center>
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
