<?php
session_start();
include("connected.php");
include("homepage.php");
$_SESSION['id'];
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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search</title>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
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
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background: rgb(255, 255, 255);
        box-shadow: 0 0 11px rgba(33,33,33,.2);

    }
    .result p:hover{
        background: #f2f2f2;
    }
    .progress{
      height: 40px;
    }
    .container {
      transition: box-shadow .3s;
      border-radius:20px;
    /*  border: 1px solid #ccc; */
    }
    #searching{
      transition: box-shadow .3s;
      border-radius:40px;
      border: 1px solid #ccc;
      height: 370px;
    }
    #searching:hover {
      /*background-color:rgba(249, 81, 111, 0.17);*/
      box-shadow: 0 0 50px rgba(33,33,33,.2);
    }
    #buttonopsreaching {
  border: 2px solid black;
  background-color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}
 #buttonopsreaching {
  border-color: rgba(249, 81, 111, 0.79);
}
 #buttonopsreaching:hover {
    background: rgba(249, 81, 111, 0.79);
}
p {
    display: block;
    margin-top: 1em;
    margin-bottom: 1em;
    margin-left: 0;
    margin-right: 0;
}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("liveserach.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
        var txt = $(this).text();
        $.post("testsearch.php",{txtsearch: txt},function(result){
        $("#resultDiv").html(result);
      });
    });
});
</script>
<?php
$sql="select * from travel";
$result = mysqli_query($con,$sql);

?>
  <br>
<body>
  <br>
  <div class="container">
 <form action="place.php" method="get">
 <center><div class="search-box">
     <input type="text" autocomplete="off" placeholder="Search..." name="txtsearch" width="300px" class="form-control"/>
     <div class="result"></div>
 </div></center>
</form>
<div class="col-12">
<center>
<button id="buttonopsreaching" <?php if($_GET['order'] == 'rt'){ print "style=background:#e7e7e7;";} ?>onclick="window.location.href='place.php?order=<?php print 'rt'; ?>&startpage=<?php  print $_GET['startpage'] ?>&liker=<?php print $_GET['txtsearch'].$_GET['liker']; ?>'" >คะเเนนสูงสุดคะเเนนน้อยสุด</button>
<button id="buttonopsreaching" <?php if($_GET['order'] == 'interes'){ print "style=background:#e7e7e7;";} ?>onclick="window.location.href='place.php?order=<?php print 'interes'; ?>&startpage=<?php  print $_GET['startpage'] ?>&liker=<?php print $_GET['txtsearch'].$_GET['liker']; ?>'" >สนใจสูงสุดสนใจน้อยสุด</button>
<button id="buttonopsreaching" <?php if($_GET['order'] == 'viewer'){ print "style=background:#e7e7e7;";} ?>onclick="window.location.href='place.php?order=<?php print 'viewer'; ?>&startpage=<?php  print $_GET['startpage'] ?>&liker=<?php print $_GET['txtsearch'].$_GET['liker']; ?>'" >ผู้เข้าชมสูงสุดผู้เข้าชมน้อยสุด</button>
</center>
</div>
   <?php
if(isset($_GET['txtsearch'])){
  if (isset($_GET['liker'])) {
    $_GET['txtsearch'] = $_GET['liker'];
     }
 $liker = $_GET['txtsearch'];
 $sql = "select COUNT(DISTINCT interested.id_interested) as interes,COUNT(DISTINCT counter.id_visit) as viewer,AVG(rating.rating) as rt,service.name_service,travel.address_travel,travel.id_travel,travel.name_travel,picturetravel.name_picturetravel from travel left JOIN service on travel.id_travel = service.id_travel left join rating on travel.id_travel = rating.id_travel left JOIN interested on travel.id_travel = interested.id_travel left join counter on travel.id_travel = counter.id_travel left join picturetravel on travel.id_travel = picturetravel.id_travel WHERE travel.name_travel like '%".$_GET['txtsearch']."%' or travel.address_travel like '%".$_GET['txtsearch']."%' or service.name_service like '%".$_GET['txtsearch']."%' GROUP BY travel.id_travel limit ".$_GET['startpage']*6 .",6";
 if($_GET['order'] != false){
 $sql = "select COUNT(DISTINCT interested.id_interested) as interes,COUNT(DISTINCT counter.id_visit) as viewer,AVG(rating.rating) as rt,service.name_service,travel.address_travel,travel.id_travel,travel.name_travel,picturetravel.name_picturetravel from travel left JOIN service on travel.id_travel = service.id_travel left join rating on travel.id_travel = rating.id_travel left JOIN interested on travel.id_travel = interested.id_travel left join counter on travel.id_travel = counter.id_travel left join picturetravel on travel.id_travel = picturetravel.id_travel WHERE travel.name_travel like '%".$_GET['txtsearch']."%' or travel.address_travel like '%".$_GET['txtsearch']."%' or service.name_service like '%".$_GET['txtsearch']."%' GROUP BY travel.id_travel order by ".$_GET['order']." DESC limit ".$_GET['startpage']*6 .",6";
 }
 $result = mysqli_query($con,$sql) or die("a");
 while ($rs=mysqli_fetch_array($result)) {
?> <div class='col-6'>
   <div class='col-12' id="searching">
        <h3><a href="detailplace.php?id=<?php print $rs['id_travel']; ?>" ><?php print $rs['name_travel'] ?></a></h3>
        <div class='col-6'><a href="detailplace.php?id=<?php print $rs['id_travel']; ?>"><img src="admin/images/picturetravel/<?php if($rs['name_picturetravel'] !== null){ print $rs['name_picturetravel'];}else{ print "null.png";} ?>" width="200px" height="200px"></a></div>
        <div class='col-6'>
        <p><span class='glyphicon'>&#xe021;</span> : <?php print $rs['address_travel']; ?></p>
        <p> <span class='glyphicon'>&#xe143;</span> : <?php print number_format($rs['rt'],1); ?> </p>
        <p> คนที่สนใจสถานที่นี้อยู่ : <?php print $rs['interes']; ?></p>
        <p> บริการ : <?php print $rs['name_service']; ?></p>
        <p> การเข้าชม : <?php print $rs['viewer']; ?> </p>
        </div>
        </div>
        </div>
<?php
 }
}else{
  if (isset($_GET['liker'])) {
    $_GET['txtsearch'] = $_GET['liker'];
     }
     $liker = $_GET['txtsearch'];
     $sql = "select COUNT(DISTINCT interested.id_interested) as interes,COUNT(DISTINCT counter.id_visit) as viewer,AVG(rating.rating) as rt,service.name_service,travel.address_travel,travel.id_travel,travel.name_travel,picturetravel.name_picturetravel from travel left JOIN service on travel.id_travel = service.id_travel left join rating on travel.id_travel = rating.id_travel left JOIN interested on travel.id_travel = interested.id_travel left join counter on travel.id_travel = counter.id_travel left join picturetravel on travel.id_travel = picturetravel.id_travel WHERE travel.name_travel like '%".$_GET['txtsearch']."%' or travel.address_travel like '%".$_GET['txtsearch']."%' or service.name_service like '%".$_GET['txtsearch']."%' GROUP BY travel.id_travel limit ".$_GET['startpage']*6 .",6";
     if($_GET['order'] != false){
     $sql = "select COUNT(DISTINCT interested.id_interested) as interes,COUNT(DISTINCT counter.id_visit) as viewer,AVG(rating.rating) as rt,service.name_service,travel.address_travel,travel.id_travel,travel.name_travel,picturetravel.name_picturetravel from travel left JOIN service on travel.id_travel = service.id_travel left join rating on travel.id_travel = rating.id_travel left JOIN interested on travel.id_travel = interested.id_travel left join counter on travel.id_travel = counter.id_travel left join picturetravel on travel.id_travel = picturetravel.id_travel WHERE travel.name_travel like '%".$_GET['txtsearch']."%' or travel.address_travel like '%".$_GET['txtsearch']."%' or service.name_service like '%".$_GET['txtsearch']."%' GROUP BY travel.id_travel order by ".$_GET['order']." DESC limit ".$_GET['startpage']*6 .",6";
     }
     $result = mysqli_query($con,$sql) or die("a");
     while ($rs=mysqli_fetch_array($result)) {
    ?> <div class='col-6'>
       <div class='col-12' id="searching">
            <h3><a href="detailplace.php?id=<?php print $rs['id_travel']; ?>" ><?php print $rs['name_travel'] ?></a></h3>
            <div class='col-6'><a href="detailplace.php?id=<?php print $rs['id_travel']; ?>"><img src="admin/images/picturetravel/<?php if($rs['name_picturetravel'] !== null){ print $rs['name_picturetravel'];}else{ print "null.png";}  ?>" width="200px" height="200px"></a></div>
            <div class='col-6'>
            <p><span class='glyphicon'>&#xe021;</span> : <?php print $rs['address_travel']; ?></p>
            <p> <span class='glyphicon'>&#xe143;</span> : <?php print number_format($rs['rt'],1); ?> </p>
            <p> คนที่สนใจสถานที่นี้อยู่ : <?php print $rs['interes']; ?></p>
            <p> บริการ : <?php print $rs['name_service']; ?></p>
            <p> การเข้าชม : <?php print $rs['viewer']; ?> </p>
            </div>
            </div>
            </div>

    <?php
  }
}
 ?>
<div class='col-12'><center><ul class='pagination'>
 <?
 $sql="select * from travel left JOIN service on travel.id_travel = service.id_travel left join rating on travel.id_travel = rating.id_travel  WHERE travel.name_travel like '%".$_GET['txtsearch']."%' or travel.address_travel like '%".$_GET['txtsearch']."%' or service.name_service like '%".$_GET['txtsearch']."%' GROUP BY travel.id_travel";
 $result = mysqli_query($con,$sql);
 $row = mysqli_num_rows($result);
 $num_page = ceil($row/6);
 if($_GET['startpage']-5 > 0){
 ?>
  <li class='page-item'><a class='page-link' href='place.php?startpage=<?php print $_GET['startpage']-5; ?>&liker=<?php print $liker; ?>&order=<?php print $_GET['order']; ?>'>Previous</a></li>
 <?php
}
if($_GET['startpage']-2 <= 0){
  $start = 1;
}else{
  $start = $_GET['startpage']-2;
}
if($_GET['startpage']+4 > $num_page){
  $stop = $num_page;
}else{
  $stop = $_GET['startpage']+4;
}
  for ($i=$start; $i <= $stop ; $i++) {
    if($_GET['startpage'] < $num_page){
     ?>
       <li class = "<?php if($_GET['startpage'] == $i-1){ print "active"; } ?>"><a href="place.php?startpage=<?php print $i-1; ?>&liker=<?php print $liker; ?>&order=<?php print $_GET['order']; ?>"><?php print $i; ?></a></li>
     <?php
  }
}
 if($_GET['startpage']+5 < $num_page){
      ?>
  <li class='page-item'><a class='page-link' href='place.php?startpage=<?php print $_GET['startpage']+5; ?>&liker=<?php print $liker; ?>&order=<?php print $_GET['order']; ?>'>Next</a></li></ul></center></div>
   <?php
 }
    ?>
      </div>
</body>
