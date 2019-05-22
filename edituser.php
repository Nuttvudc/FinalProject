<!DOCTYPE html>
<html>
<head>
  <?php session_start();
  include("connected.php");
  if(isset($_SESSION['id'])){
    $_SESSION['id'] = $_SESSION['id'];
  }else{
    $_SESSION['id'] = $_SERVER["REMOTE_ADDR"];
    $sql = "select * from account where id = '".base64_encode($_SERVER["REMOTE_ADDR"])."'";
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);
    if($num == false){
       $sql = "insert into account(id) VALUES('".base64_encode($_SERVER["REMOTE_ADDR"])."')";
       $result = mysqli_query($con,$sql) or die("กรุณาติดต่อเจ้าหน้าที่");
     }
    }
  ?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#buttonid").click(function(){
        $("#editid").toggle();
    });
});
$(document).ready(function(){
    $("#buttonpass").click(function(){
        $("#pass").toggle();
    });
});
$(document).ready(function(){
    $("#buttonuser").click(function(){
        $("#user").toggle();
    });
});
$(document).ready(function(){
    $("#buttonpicture").click(function(){
        $("#picture").toggle();
    });
});
function picture(){
  var fty=new Array(".gif",".jpg",".jpeg",".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด
  var a=document.editpicture.a.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a
  var permiss=0; // เงื่อนไขไฟล์อนุญาต
  a=a.toLowerCase();
if (a !="") {
  for(i=0;i<fty.length;i++){ // วน Loop ตรวจสอบไฟล์ที่อนุญาต
                  if(a.lastIndexOf(fty[i])>=0){  // เงื่อนไขไฟล์ที่อนุญาต
                      permiss=1;
                      break;
                  }else{
                      continue;
                  }
              }
              if(permiss==0){
                  alert("อัพโหลดได้เฉพาะไฟล์ gif jpg jpeg png");
                  return false;
              }
            }
          }
function checkeditid(){
  if (document.editid.id.value==false) {
    alert("กรุณากรอก ID ที่ต้องการเเก้ไข") ;
    document.editid.id.focus() ;
    return false ;
  }else if(document.editid.id.value.length < 6 || document.editid.id.value.length > 15)
  {
   alert('Please input String [6-15 Character] .');
   document.editid.id.focus();
   return false;
  }
}
function checkname()
{
  var elem = document.getElementById('textname').value;
  if(!elem.match(/^([_a-z0-9])+$/i))
  {
    alert("กรอก NAME USER ได้เฉพาะ a-Z, A-Z, 0-9 และ _");
    document.getElementById('textname').value = "";
  }else {
    doCallAjax2();
  }
}


var HttPRequest = false;
function doCallAjax2() {
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

 var url = 'AjaxPHPRegister4.php';
 var pmeters = "username=" + encodeURI( document.getElementById("textname").value);

 HttPRequest.open('POST',url,true);

 HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
 HttPRequest.setRequestHeader("Content-length", pmeters.length);
 HttPRequest.setRequestHeader("Connection", "close");
 HttPRequest.send(pmeters);


 HttPRequest.onreadystatechange = function()
 {

   if(HttPRequest.readyState == 3)  // Loading Request
   {
     document.getElementById("mySpanusername").innerHTML = "..";
   }

   if(HttPRequest.readyState == 4) // Return Request
   {
     if(HttPRequest.responseText == 'Y')
     {
       window.location = 'AjaxPHPRegister3.php';
     }
     else
     {
       document.getElementById("mySpanusername").innerHTML = HttPRequest.responseText;
     }
   }

 }

}
</script>
<?php
include("connected.php");
include("homepage.php");
$sql="select * from account where id='".base64_encode($_SESSION["id"])."'";
$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
 ?>
</head>
<style>
.column {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
.circledetailplace{
  height: 90;
  width: 90;
  border: 3px solid #fff;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}
.circledetailplace{
  height: 90;
  width: 90;
  border: 3px solid #fff;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}
</style>
<body>
<div class="container">
  <h1><?php print $rs['username']; ?></h1>
<div class="col-12">
  <div class="col-4">
     <img class="circle" src="pictureaccount/<?php if($rs['picture'] != false){ print $rs['picture']; }else{ print "blank-profile-hi.png";} ?>" width="300px" height="300px" />
  </div>
  <div class="col-8">
    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Paris')">SAVE INTERESTED</button>
      <button class="tablinks" onclick="openCity(event, 'comment')">EDIT COMMENT</button>
    <?php if($_SESSION['username'] == false){}else{ ?><button class="tablinks" onclick="openCity(event, 'London')">EDIT USER</button><?php }  ?>
    </div>

    <div id="London" class="tabcontent">
      <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'editid')">ID</button>
      <button class="tablinks" onclick="openCity(event, 'pass')">PASSWORD</button>
      <button class="tablinks" onclick="openCity(event, 'user')">USERNAME</button>
      <button class="tablinks" onclick="openCity(event, 'picture')">PICTURE</button>
    </div>
  </div>
      <form id="editid" class="tabcontent" name="editid" action="editid.php" method="post" onsubmit="JavaScript:return checkeditid();" hidden>
        <div class="form-group">
      <input type="text" name="id" id="textid" class="form-control" placeholder="กรอก ID ที่ต้องการใช้ใหม่" onblur="checkid();" OnChange="JavaScript:doCallAjax();"/><span id="mySpan"></span>
      </div>
      <div class="form-group">
      <input type="text"  name="question" class="form-control" placeholder="คำถาม : <?php echo $rs['question']; ?>" readonly/>
      </div>
      <div class="form-group">
      <input type="text"  name="answer" class="form-control" placeholder="กรอกคำตอบเพื่อใช้ในการเเก้ไข ID" />
      </div>
      <div class="form-group">
      <input type="submit" value="บันทึกการเเก้ไข"/>
      </div>
      </form>

      <form id="pass" class="tabcontent" action="editpassword.php" method="post" hidden>
        <div class="form-group">
      <input type="password"  id="textpass" name="password" class="form-control" onblur="checkpass();" placeholder="กรอก PASSWORD ปัจจุบัน"/>
        </div>
        <div class="form-group">
      ่<input type="password" id="textpass" name="newpass" class="form-control" onblur="checkpass();" placeholder="กรอก PASSWORD ใหม่"/>
        </div>
        <div class="form-group">
      <input type="password" name="againnewpass" class="form-control"  placeholder="กรอก PASSWORD ใหม่อีกครั้ง"/>
        </div>
        <div class="form-group">
      <input type="submit" value="บันทึกการเปลี่ยนเเปลง" />
        </div>
      </form>

      <form id="user" class="tabcontent" hidden action="editusername.php" method="post" onsubmit="javascript:return checkuser();">
      <div class="form-group">
      <input type="text" disabled placeholder="USERNAME ปัจจุบัน :<?php echo $rs['username'];  ?>" class="form-control"/>
      </div>
      <div class="form-group">
      <input type="text" name="username" placeholder="USERNAME ใหม่" id="textname" onblur="checkname();" class="form-control" maxlength="20" OnChange="JavaScript:doCallAjax2();"><span id="mySpanusername"></span>
      </div>
      <div class="form-group">
      <input type="submit" value="บันทึกการเปลี่ยนเเปลง" />
      </div>
      </form>

      <form id="picture" class="tabcontent" name="editpicture" hidden action="editpicture.php" method="post" enctype="multipart/form-data"onsubmit="javascript:return picture();" >
        <div class="form-group">
          <img class="circle" src="pictureaccount/<?php echo $rs['picture']; ?>" width="100" height="100" />
        </div>
        <div class="form-group">
      <input type="file" name="a" class="form-control" >
       </div>
      <input type="submit" value="บันทึกการเปลี่ยนเเปลง" />
      </form>

<div id="Paris" class="tabcontent">
    <table style="border: 1px solid #ccc;">
    <tr>
      <th width="20%"></th>
      <th width="20%"></th>
      <th width="40%"></th>
    </tr>
    <?php
     $sql = "select * from interested left join picturetravel on interested.id_travel = picturetravel.id_travel left join travel on interested.id_travel = travel.id_travel where id ='".base64_encode($_SESSION['id'])."' group by interested.id_travel";
     $result = mysqli_query($con,$sql);
     while ($rs = mysqli_fetch_array($result)) {
       ?>
       <tr><td><a href="detailplace.php?id=<?php print $rs['id_travel'] ?>"><img src="admin/images/picturetravel/<?php if($rs['name_picturetravel'] !== Null){print $rs['name_picturetravel'];}else{print "null.png";} ?>" width="100%" height="100px"></a></td>
         <td><a href="detailplace.php?id=<?php print $rs['id_travel'] ?>"><h2 style="padding:20px;"><?php print $rs['name_travel'] ?></h2></a></td>
         <td style="padding:20px;"><?php print $rs['address_travel']; ?></td>
       </tr>

       <?php
     }
    ?>
    </table>
     </div>
     <div id="comment" class="tabcontent">
       <?php
           $sql = "select * from comment left join picturetravel on comment.id_travel = picturetravel.id_travel left join travel on comment.id_travel = travel.id_travel where id='".base64_encode($_SESSION['id'])."' group by comment.id_comment";
           $result = mysqli_query($con,$sql);
           while ($rs = mysqli_fetch_array($result)) {
              ?>
              <div class="media">
                <div class="media-left">
              <a href="detailplace.php?id=<?php print $rs['id_travel']; ?>"><img src="admin/images/picturetravel/<?php print $rs['name_picturetravel'] ?>" class="circledetailplace" width="100px" height="100px" /></a>
            </div>
            <div class="media-body">
                <a href="detailplace.php?id=<?php print $rs['id_travel']; ?>"><h4 class="media-heading"><?php print $rs['name_travel'] ?></h4></a>
                <p>
                 <?php print $rs['comment_comment'] ?>
                </p>
                <p><?php print $rs['comment_datetime'] ?></p>
                <a href="deletecomment.php?id=<?php print $rs['id_comment']; ?>">DELETE COMMENT</a>
              </form>
            </div>
            </div>
            <hr>
             <?php
           }
        ?>
     </div>
    </div>
  </div>

<div class="col-12">
  <h2>Reccoment For You</h2>
  <?php $iduser = base64_encode($_SESSION['id']); //กำหนด user ที่ต้องการเเนะนำ
  $sql = "select id_travel FROM rating GROUP by id_travel";
  $result = mysqli_query($con,$sql);
  while ($rs = mysqli_fetch_array($result)) {
    $sqlcheck = "select * from rating where id = '".$iduser."' and id_travel = '".$rs['id_travel']."'";
    $resultcheck = mysqli_query($con,$sqlcheck);
    $row = mysqli_num_rows($resultcheck);
    if($row == 0){
   $sql1 = "select id_travel,rating from rating where id = '".$iduser."'";
   $result1 = mysqli_query($con,$sql1);
   while ($rs1 = mysqli_fetch_array($result1)) {
    $sql2 = "select simularity from simularity where main__simularity='".$rs['id_travel']."' and sub_simularity = '".$rs1['id_travel']."'";
    $result2 = mysqli_query($con,$sql2);
    while ($rs2 = mysqli_fetch_array($result2)) {
      $total += $rs2['simularity'] * $rs1['rating'];
                                    }
                 }
                 $sql3 = "select sum(simularity) from simularity where main__simularity = '".$rs['id_travel']."'";
                 $result3 = mysqli_query($con,$sql3);
                 while ($rs3 = mysqli_fetch_array($result3)) {
                   $divine = $rs3['sum(simularity)'];
                 }
                 if($divine == 0){
                  $divine=1;
                 }
                 $a[$rs['id_travel']] = $total/$divine;
         }
         $total = 0;
  }
  if(isset($a)){
  arsort($a);
  foreach ($a as $key => $value) {
    $b[] = $key;
  }
}
  for ($i=0; $i <4 ; $i++) {
    $sql = "select * from travel left join picturetravel on travel.id_travel = picturetravel.id_travel where travel.id_travel='".$b[$i]."' group by picturetravel.id_travel";
    $result = mysqli_query($con,$sql);
    while ($rs = mysqli_fetch_array($result)) {
      ?>
      <div class="column">
        <div class="card">
          <a href="detailplace.php?id=<?php print $b[$i]; ?>"><img src="admin/images/picturetravel/<?php if($rs['name_picturetravel'] !== null){print $rs['name_picturetravel'];}else{ print "null.png";} ?>" style="width:100%; height:200px;"></a>
          <h3><a href="detailplace.php?id=<?php print $b[$i]; ?>"><?php print $rs['name_travel'] ?></a></h3>
        </div>
      </div>
      <?php
    }
  }
   ?>
</div>
</div>
</div>
</body>
</html>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
