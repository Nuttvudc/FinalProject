<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>

$(document).ready(function(){
    $("#buttonservice").click(function(){
        $("#service").toggle();
    });
});
</script>
<style>
* {
  box-sizing: border-box;
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
.container {
  transition: box-shadow .3s;
  border-radius:20px;
  border: 1px solid #ccc;
}
.container:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2);
}
/* Formatting search box */
.search-box{
    width: 500px;
    position: relative;
    display: inline-block;
    font-size: 14px;
}
.search-box input[type="text"]{
    height: 32px;
    padding: 5px 10px;
    border: 1px solid #CCCCCC;
    font-size: 14px;
}
.result{
    position: absolute;
    z-index: 999;
    top: 100%;
    left: 0;
}
.search-box input[type="text"], .result{
    width: 100%;
    box-sizing: border-box;
}
</style>
</head>
<?php
include('edit.php');
include('connected.php');
 ?>
 <body>
   <div class="container">
     <br>
     <form action="detailplaceadmin.php" method="get">
     <center><div class="search-box">
         <input type="text" autocomplete="off" placeholder="Search..." name="txtsearch" width="300px" class="form-control"/>
         <div class="result"></div>
     </div></center>
    </form>
     <br>
     <button id="buttonservice">ADD TRAVEL</button>
     <br>
     <form id="service" hidden action="addtravel.php" method="post">
       <div class="form-group">
     ชื่อสถานที่ :<input type="text" name="name_travel" class="form-control" >
      </div>
     <input type="submit" value="เพิ่ม" />
     </form>
     <br>
     <table id="myTable">
  <tr class="header">
    <th style="width:20%;">รหัสสถานที่</th>
    <th style="width:40%;">ชื่อสถานที่</th>
    <th style="width:20%;">เบอร์โทรศัพท์</th>
    <th style="width:20%;">เเก้ไข</th>
  </tr>
     <?php
     $sql="select * from travel order by update_travel DESC";
     if(isset($_GET['txtsearch'])){
     $sql="select * from travel where name_travel like '%".$_GET['txtsearch']."%' order by update_travel DESC";
     }
     $result=mysqli_query($con,$sql) or die("เกิดความผิดพลาด");
     while ($rs=mysqli_fetch_array($result)) {
       ?>
      <tr>
       <td><?php print $rs['id_travel']; ?></td>
       <td><a href="travel.php?id=<?php print $rs['id_travel']?>&name=<?php print $rs['name_travel'] ?>"><?php print $rs['name_travel']; ?></a></td>
       <td><?php print $rs['tel_travel']; ?></td>
       <td><a href="editplace.php?id=<?php print $rs['id_travel']; ?>&name=<?php print $rs['name_travel'] ?>">เเก้ไข</a></td>

     </tr>
     <?php
     }
      ?>
    </table>
   </div>
</body>
