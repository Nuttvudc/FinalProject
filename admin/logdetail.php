<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
</style>
</head>
<?php
include('connected.php');
 ?>
 <body>
   <div class="container">
     <a href="travel.php?id=<?php print $_GET['id'] ?>&name=<?php print $_GET['name'] ?>"><h1><?php print $_GET['name'] ?></h1></a>
     <table id="myTable">
  <tr class="header">
    <th style="width:20%;">IP ADDRESS</th>
    <th style="width:20%;">USER ADMIN</th>
    <th style="width:40%;">EVENT</th>
    <th style="width:20%;">DATE</th>
  </tr>
     <?php
     $sql="select * from logfile where id_travel = '".$_GET['id']."' order by date_log DESC";
     $result=mysqli_query($con,$sql) or die("เกิดความผิดพลาด");
     while ($rs=mysqli_fetch_array($result)) {
       ?>
      <tr>
       <td><?php print $rs['ip_log']; ?></td>
       <td><?php print $rs['id_admin_log']; ?></td>
       <td><?php print $rs['event_log'] ?></td>
       <td><?php print $rs['date_log']; ?></td>
     </tr>
     <?php
     }
      ?>
    </table>
   </div>
   </div>
</body>
