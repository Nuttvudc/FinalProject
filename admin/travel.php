<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
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
<style>

* {
  box-sizing: border-box;
}
.col-12{width: 100%}
.col-4 {width: 33.33%;}
.col-6 {width: 50%;}
[class*="col-"] {
    float: left;
    padding: 20px;
    border: 1px solid red;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
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
#editplacetab{
    background-color: inherit;
    float: right;
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
</style>
</head>
<?php
include('connected.php');
$sql="select * from travel where id_travel='".$_GET['id']."'";
$result=mysqli_query($con,$sql);
?>
  <div class="container">
    <h1><?php print $_GET['name'] ?></h1>
    <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'traveldata')">ดูข้อมูลสถานที่</button>
  <button class="tablinks" onclick="openCity(event, 'servicedata')">ดูข้อมูลการบริการ</button>
  <button class="tablinks" onclick="openCity(event, 'picturetable')">ดูรูปภาพ</button>
  <a id="editplacetab" class="button" href="detailplaceadmin.php">กลับสู่หน้าหลัก</a>
  <a id="editplacetab" class="button" href="editplace.php?id=<?php print $_GET['id'] ?>&name=<?php print $_GET['name'] ?>">เเก้ไขข้อมูล</a>
</div>
<div  class="tabcontent" id="traveldata">
<table id="myTable">
  <tr class="header">
    <th style="width:20%;"></th>
    <th style="width:80%;"></th>
  </tr>
  <form method="post" action="saveeditplaceadmin.php">
<?php
while ($rs=mysqli_fetch_array($result)) {
  ?>
<tr>
  <td>รหัสสถานที่</td><td><input name="id_travel" value="<?php print $rs['id_travel'] ?>" readonly></td><tr></tr>
  <td>ชื่อสถานที่</td><td><input type="text" name="name_travel" value="<?php print $rs['name_travel'] ?>" size="100" readonly/></td><tr></tr>
  <td>เบอร์สถานที่</td><td><input type="text" name="tel_travel"  value="<?php print $rs['tel_travel'] ?>" maxlength="10" readonly/></td><tr></tr>
  <td>เว็ปไซค์สถานที่</td><td><input type="text" name="web_travel" value="<?php print $rs['web_travel'] ?>" size="80" readonly/></td><tr></tr>
  <td>ไลน์สถานที่</td><td><input type="text" name="line_travel" value="<?php print $rs['line_travel'] ?>" size="80" readonly/></td><tr></tr>
  <td>facebook</td><td><input type="text" name="facebook_travel" value="<?php print $rs['facebook_travel'] ?>" size="80" readonly/></td><tr></tr>
  <td>สถานที่อยู่</td><td><textarea rows="4" cols="50" name="address_travel"  readonly><?php print $rs['address_travel'] ?></textarea></td><tr></tr>
</tr>
  <?php
}
 ?>
   </form>
   </table>
   </div>
   <?php
      $sql = "select * from service where id_travel ='".$_GET['id']."'";
      $result = mysqli_query($con,$sql);
    ?>
   <div class="tabcontent" id="servicedata">
     <table id="myTable">
       <tr class="header">
         <th style="width:20%;">ชื่อบริการ</th>
         <th style="width:80%;">ราคา</th>
       </tr>
    <?php
     while ($rs = mysqli_fetch_array($result)) {
       ?>
     <form method="post" action="saveservice.php">
       <tr>
       <td><input name="name_service" value="<?php print $rs['name_service'] ?>"  readonly/></td>
       <td><input name="price_service" value="<?php print $rs['price_service'] ?>"  readonly/></td>
       <input name="id_service" value="<?php print $rs['id_service'] ?>" hidden/>
       <td><input type="submit"></td>
       </tr>
     </form>
       <?php
     }
     ?>
   </table>
   </div>
   <div class="tabcontent" id="picturetable">
   <table id="myTable">
   <tr class="header">
     <th style="width:60%;"></th>
   </tr>
   <?php $sql="select * from picturetravel where id_travel='".$_GET['id']."'";
         $result=mysqli_query($con,$sql);
         ?>


         <?php
         $i=1;
         while ($rs=mysqli_fetch_array($result)) {
           ?>
           <tr>
             <td>
           <div class="column">
           <img src="images/picturetravel/<?php print $rs['name_picturetravel'] ?>" style="width:100%" class="hover-shadow cursor" >
           </div>
           </td>
         </tr>
           <?php
           $i++;
         }
         ?>
       </div>
 </div>
