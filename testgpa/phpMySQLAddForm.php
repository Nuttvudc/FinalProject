<?php
session_start();
include ("connected.php");
if(!isset($_SESSION['admin'])){
  echo "<script type=\"text/javascript\">";
  echo "window.location='index.php';";
  echo "</script>";
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ระบบจัดการข้อมูลการทดลองคำนวนเกรดเฉลี่ย</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/lib/w3.css">
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
var HttPRequest = false;

   function doCallAjax() {
    HttPRequest = false;
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
     HttPRequest = new XMLHttpRequest();
     if (HttPRequest.overrideMimeType) {
      HttPRequest.overrideMimeType('text/html');
     }
    } else if (window.ActiveXObject) { // IE
     try {
      HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
     } catch (e) {
      try {
         HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {}
     }
    }

    if (!HttPRequest) {
     alert('Cannot create XMLHTTP instance');
     return false;
    }

    var url = 'AjaxPHPRegister2.php';
    var pmeters = "id=" + encodeURI( document.getElementById("textid").value);

    HttPRequest.open('POST',url,true);

    HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    HttPRequest.setRequestHeader("Content-length", pmeters.length);
    HttPRequest.setRequestHeader("Connection", "close");
    HttPRequest.send(pmeters);


    HttPRequest.onreadystatechange = function()
    {

      if(HttPRequest.readyState == 3)  // Loading Request
      {
        document.getElementById("mySpan").innerHTML = "..";
      }

      if(HttPRequest.readyState == 4) // Return Request
      {
        if(HttPRequest.responseText == 'Y')
        {
          window.location = 'AjaxPHPRegister3.php';
        }
        else
        {
          document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
        }
      }

    }

   }
   var HttPRequest = false;

      function doCallAjax() {
       HttPRequest = false;
       if (window.XMLHttpRequest) { // Mozilla, Safari,...
        HttPRequest = new XMLHttpRequest();
        if (HttPRequest.overrideMimeType) {
         HttPRequest.overrideMimeType('text/html');
        }
       } else if (window.ActiveXObject) { // IE
        try {
         HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
         try {
            HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (e) {}
        }
       }

       if (!HttPRequest) {
        alert('Cannot create XMLHTTP instance');
        return false;
       }

       var url = 'AjaxPHPRegister2.php';
       var pmeters = "id=" + encodeURI( document.getElementById("textid").value);

       HttPRequest.open('POST',url,true);

       HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       HttPRequest.setRequestHeader("Content-length", pmeters.length);
       HttPRequest.setRequestHeader("Connection", "close");
       HttPRequest.send(pmeters);


       HttPRequest.onreadystatechange = function()
       {

         if(HttPRequest.readyState == 3)  // Loading Request
         {
           document.getElementById("mySpan").innerHTML = "..";
         }

         if(HttPRequest.readyState == 4) // Return Request
         {
           if(HttPRequest.responseText == 'Y')
           {
             window.location = 'AjaxPHPRegister3.php';
           }
           else
           {
             document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
           }
         }

       }

      }

</script>
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial;
    padding: 10px;
    background: #dbd0d0;
}
video {
    width: 100%;
    height: auto;
}

/* Header/Blog Title */
.header {
    padding: 10px;
    text-align: center;
    background: white;
}

.header h1 {
    font-size: 40px;
}

/* Style the top navigation bar */
.topnav {
    overflow: hidden;
    background-color: #333;
}

/* Style the topnav links */
.topnav a {
    float: left;
    display: block;
    color: #ffffff;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {
    float: left;
    width: 75%;
}

/* Right column */
.rightcolumn {
    float: left;
    width: 25%;
    background-color: #dbd0d0;
    padding-left: 20px;
}

/* Fake image */
.fakeimg {
    background-color: rgb(240, 221, 221);
    width: 100%;
    padding: 20px;
}

/* Add a card effect for articles */
.card {
    background-color: white;
    padding: 20px;
    margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Footer */
.footer {
    padding: 20px;
    text-align: center;
    background: #ddd;
    margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
    .leftcolumn, .rightcolumn {
        width: 100%;
        padding: 0;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .topnav a {
        float: none;
        width: 100%;
    }
}

.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
.button {
  display: inline-block;
  padding: 10px 15px;
  font-size: 10px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 10px;
  box-shadow: 0 4px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
[class*="col-"] {
    float: left;
    padding: 10px;
    /* border: 1px solid red; */
}
.col-6 {width: 50%;}
.col-12{width: 100%;}
.progress{
  height: 60px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</head>
<body>

<div class="header">
  <h1>เพิ่มรายวิชา</h1>
  <p>...</p>
</div>

<div class="topnav">
  <a href="login.php?logout=0">ออกจากระบบ</a>
  <a style="float:right"></a>
</div>

<br><center>
  <div class="col-12">
    <div class="col-6">
      <div class="col-12">
        <?php
        if(isset($_GET['id'])){
          ?>
          <h1>เเก้ไขข้อมูลรหัสวิชา : <?php echo $_GET['id']; ?></h1>
          <table width=90% style="border:1px dashed #ffaacc;" cellspacing="5" bgcolor="#ffaacc" cellpadding="5"><tr><td style="border:1px dashed white;" bgcolor="white">
            <form action="phpMySQLAddSave.php" name="frmAdd" method="get">
          <center><table width="600" border="1">
            <tr>
              <th width="10%"> <div align="center">รหัสวิชา</div></th>
              <th width="80%"> <div align="center">ชื่อวิชา</div></th>
              <th width="10%"> <div align="center">หน่วยกิต</div></th>
            </tr>
            <tr><br>
              <input type="text" name="txt_number" size="2" value='<?php echo $_GET['number']; ?>' hidden>
              <td><div align="center"><input type="text" name="txtId_Subject" size="20" onkeyup="JavaScript:doCallAjax();" id="textid" value='<?php echo $_GET['id']; ?>' width="100%" readonly><br></div></td>
              <td><div align="center"><input type="text" name="txtName_Subject" size="20" value='<?php echo $_GET['name']; ?>' ></div></td>
              <td><div align="center"><input type="number" name="txtCredit" size="2" value='<?php echo $_GET['credit']; ?>'></div></td>
            </tr>
            </table>
            <br>
            <input type="submit" name="submit" value="บันทึกการเเก้ไข">
            </form>
            <form action="phpMySQLAddForm.php">
              <br><input type="submit" name="submit" value="ยกเลิก">
            </form>
          </td></tr></table>
        <?php
      }else{
        ?>
        <table width=90% style="border:1px dashed #ffaacc;" cellspacing="5" bgcolor="#ffaacc" cellpadding="5"><tr><td style="border:1px dashed white;" bgcolor="white">
          <form action="phpMySQLAddSave.php" name="frmAdd" method="post">
        <center><table width="600" border="1">
          <tr>
            <th width="10%"> <div align="center">รหัสวิชา</div></th>
            <th width="80%"> <div align="center">ชื่อวิชา</div></th>
            <th width="10%"> <div align="center">หน่วยกิต</div></th>
          </tr>
          <tr><br>
            <td><div align="center"><input type="text" name="txtId_Subject" size="20" onkeyup="JavaScript:doCallAjax();" id="textid"><br><span id="mySpan"></span></div></td>
            <td><div align="center"><input type="text" name="txtName_Subject" size="20"></div></td>
            <td><div align="center"><input type="number" name="txtCredit" size="2"></div></td>
          </tr>
          </table>
          <br>
          <input type="submit" name="submit" value="บันทึกวิชา">
          </form>
        </td></tr></table>
        <?php
      }
      ?>
      </div>
      <div class="col-12">
        <input id="myInput" type="text" placeholder="Search..">
<br><br>

<table width="100%">
  <thead>
<form action="phpMySQLAddSave.php" method="post">
  <tr>
    <th width="10%"><center><input type="submit" value="ลบ"></center></th>
    <th width="15%">รหัสวิชา</th>
    <th width="50%">ชื่อวิชา</th>
    <th width="15%"><center>หน่วยกิต</center></th>
    <th width="10%"></th>
  </tr>
  </thead>
  <tbody id="myTable">
    <?php
     $sql = "select * from subject order by number_subject DESC limit 100";
     $result = mysqli_query($con,$sql) or die("Error");
     $i = 1;
     while ($rs = mysqli_fetch_array($result)) {
       ?>
  <tr>
    <td>
      <center><input type="checkbox" name="delete[<?php echo $i; ?>]" value="<?php echo $rs['number_subject']; ?>"></center>
    </td>
    <td><?php echo $rs['id_subject']; ?></td>
    <td><?php echo $rs['name_subject']; ?></td>
    <td><center><?php echo $rs['credit']; ?></center></td>
    <td><a href="phpMySQLAddForm.php?id=<?php echo $rs['id_subject']; ?>&name=<?php echo $rs['name_subject']; ?>&credit=<?php echo $rs['credit']; ?>&number=<?php echo $rs['number_subject']; ?>">เเก้ไข</a></td>
  </tr>
</form>
  <?php
  $i++;
}
?>
  </tbody>
</table>
      </div>
    </div>
      <div class="col-6">
        <div class="col-12">
          <?php
            $sql="select count(id_rating) from rating_program";
            $result=mysqli_query($con,$sql);
            $rs=mysqli_fetch_array($result);
            print $counttotalrating = $rs['count(id_rating)'];
            $sql="select count(id_rating) from rating_program where rating='very good'";
            $result=mysqli_query($con,$sql);
            $rs=mysqli_fetch_array($result);
            ?>
            ให้ VERY GOOD จำนวน <?php print $rs['count(id_rating)']; ?>
            <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70"
            aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(id_rating)']/$counttotalrating*100,2) ?>%">คิดเป็นร้อยละ <?php print $total ?>%
            </div>
          </div>
          <?php
          $sql="select count(id_rating) from rating_program where rating='good'";
          $result=mysqli_query($con,$sql);
          $rs=mysqli_fetch_array($result);
          ?>
          ให้ GOOD จำนวน <?php print $rs['count(id_rating)']; ?>
          <div class="progress">
          <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(id_rating)']/$counttotalrating*100,2) ?>%">คิดเป็นร้อยละ <?php print $total ?>%
          </div>
          </div>
          <?php
          $sql="select count(id_rating) from rating_program where rating='ok'";
          $result=mysqli_query($con,$sql);
          $rs=mysqli_fetch_array($result);
          ?>
          ให้ OK จำนวน <?php print $rs['count(id_rating)']; ?>
          <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(id_rating)']/$counttotalrating*100,2) ?>%">คิดเป็นร้อยละ <?php print $total ?>%
          </div>
          </div>
          <?php
          $sql="select count(id_rating) from rating_program where rating='not good'";
          $result=mysqli_query($con,$sql);
          $rs=mysqli_fetch_array($result);
          ?>
          ให้ NOT GOOD จำนวน <?php print $rs['count(id_rating)']; ?>
          <div class="progress">
          <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(id_rating)']/$counttotalrating*100,2) ?>%">คิดเป็นร้อยละ <?php print $total ?>%
          </div>
          </div>
          <?php
          $sql="select count(id_rating) from rating_program where rating='terrible'";
          $result=mysqli_query($con,$sql);
          $rs=mysqli_fetch_array($result);
          ?>
          ให้ TERRIBLE จำนวน <?php print $rs['count(id_rating)']; ?>
          <div class="progress">
          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(id_rating)']/$counttotalrating*100,2) ?>%">คิดเป็นร้อยละ <?php print $total ?>%
          </div>
        </div>
        </div>
        <div class="col-12">
          <h1>COMMENT</h1>
          <table width="100%">
            <thead>
              <tr>
                <th width="15%">Rating</th>
                <th width="85%">Comment</th>
              </tr>
            </thead>
            <tbody>
          <?php
          $sql = "SELECT * FROM `rating_program` WHERE trim(`comment`)!='' order by `date_rating` DESC LIMIT 100";
          $result = mysqli_query($con,$sql);
          while ($rs = mysqli_fetch_array($result)) {
            ?>
          <tr align="center">
            <td>
             <?php echo $rs['rating']; ?>
            </td>
            <td>
             <?php echo $rs['comment']; ?>
            </td>
          </tr>
            <?php
          }
          ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>

</body>
</html>
