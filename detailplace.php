<?php
session_start();
include('connected.php');
include('homepage.php');
include('visit.php');
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

 <style type="text/css">
 .iVote,.iVote li{
     display:block;
     margin:0px;
     padding:0px;
     list-style:none;
     float:left;
 }
 .iVote{
     clear:both;
     float:left;
 }
 .iVote li,.iVote li.VoteD{
     display:block;
     width:16px;
     height:15px;
     position:relative;
     background: url(admin/images/jquery.ui.stars.gif) no-repeat 0 0;
     background-position: 0 -32px;
     margin-right:2px;
     cursor:pointer;
 }
 .iVote li.VoteD{
     background-position: 0 -64px;
 }
 .iVote li.VoteD2{
   background-position: 0 -48px;
 }
 span.showVoteText{
     padding-left:5px;
     font-style:italic;
 }
 .circledetailplace{
   height: 90;
   width: 90;
   border: 3px solid #fff;
   border-radius: 50%;
   box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
 }
 * {
   box-sizing: border-box;
 }

 .row > .column {
   padding: 0 8px;
 }

 .row:after {
   content: "";
   display: table;
   clear: both;
 }

 .column {
   float: left;
   width: 25%;
 }

 /* The Modal (background) */
 .modal {
   display: none;
   position: fixed;
   z-index: 1;
   padding-top: 100px;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   overflow: auto;
   background-color: black;
 }

 /* Modal Content */
 .modal-content {
   position: relative;
   background-color: #fefefe;
   margin: auto;
   padding: 0;
   width: 90%;
   max-width: 1200px;
 }

 /* The Close Button */
 .close {
   color: white;
   position: absolute;
   top: 10px;
   right: 25px;
   font-size: 35px;
   font-weight: bold;
 }

 .close:hover,
 .close:focus {
   color: #999;
   text-decoration: none;
   cursor: pointer;
 }

 .mySlides {
   display: none;
 }

 .cursor {
   cursor: pointer;
 }

 /* Next & previous buttons */
 .prev,
 .next {
   cursor: pointer;
   position: absolute;
   top: 50%;
   width: auto;
   padding: 16px;
   margin-top: -50px;
   color: white;
   font-weight: bold;
   font-size: 20px;
   transition: 0.6s ease;
   border-radius: 0 3px 3px 0;
   user-select: none;
   -webkit-user-select: none;
 }

 /* Position the "next button" to the right */
 .next {
   right: 0;
   border-radius: 3px 0 0 3px;
 }

 /* On hover, add a black background color with a little bit see-through */
 .prev:hover,
 .next:hover {
   background-color: rgba(0, 0, 0, 0.8);
 }

 /* Number text (1/3 etc) */
 .numbertext {
   color: #f2f2f2;
   font-size: 12px;
   padding: 8px 12px;
   position: absolute;
   top: 0;
 }

 img {
   margin-bottom: -4px;
 }

 .caption-container {
   text-align: center;
   background-color: black;
   padding: 2px 16px;
   color: white;
 }

 .demo {
   opacity: 0.6;
 }

 .active,
 .demo:hover {
   opacity: 1;
 }

 img.hover-shadow {
   transition: 0.3s;
 }

 .hover-shadow:hover {
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
 }
 #rcorners2 {
    border-radius: 25px;
    border: 2px solid #ffc7c5;
    padding: 20px;
    width: auto;
}
#rcorners3 {
    border-radius: 25px;
    border: 2px solid #151e3d;
    padding: 20px;
    width: auto;
}
#rcorners4 {
    border-radius: 25px;
    border: 2px solid #151e3d;
    padding: 20px;
    width: auto;
}
.progress{
  height: 40px;
}
.container {
  transition: box-shadow .3s;
  border-radius:20px;
  border: 1px solid #ccc;
}
.container:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2);
}
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
img {
  vertical-align: middle;
}
/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

#rowsild {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
#sildcolumn {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
 </style>
 <body>
   <br>
   <div class="container">
    <div class="col-12">
        <div class="col-6">
<?php
$sql = "select name_picturetravel from picturetravel where id_travel = '".$_GET['id']."'";
$result = mysqli_query($con,$sql);
$i = 1;
$num = mysqli_num_rows($result);
if($num !== 0){
while ($rs = mysqli_fetch_array($result)) {
  ?>
  <div class="mySlides">
      <div class="numbertext"><?php print $i; ?> / 6</div>
      <img src="admin/images/picturetravel/<?php print $rs['name_picturetravel']; ?>" style="width:100%; height:300px;">
    </div>
  <?php
  $i++;
}
}else{
  ?>
  <div class="mySlides">
      <div class="numbertext"><?php print $i; ?> / 6</div>
      <img src="admin/images/picturetravel/null.png" style="width:100%; height:300px;">
    </div>
    <?php
}
?>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>

            <div class="caption-container">
              <p id="caption"></p>
            </div>

            <div id="rowsild">
            <?php
            $i = 1;
            $sql = "select picturetravel.name_picturetravel,travel.name_travel from picturetravel left join travel on picturetravel.id_travel = travel.id_travel where picturetravel.id_travel = '".$_GET['id']."'";
            $result = mysqli_query($con,$sql);
            while ($rs = mysqli_fetch_array($result)) {
              ?>
                <div id="sildcolumn">
                  <img class="demo cursor" src="admin/images/picturetravel/<?php print $rs['name_picturetravel']; ?>" style="width:100%; height:80px;" onclick="currentSlide(<?php print $i; ?>)" alt="<?php print $rs['name_travel'] ?>">
                </div>
              <?php
              $i++;
            }
            ?>
              </div>
    </div>
    <?php
    $sql="select * from travel where id_travel='".$_GET['id']."'";
    $result=mysqli_query($con,$sql);
     while ($rs=mysqli_fetch_array($result)) {
       ?>
        <div class="col-6">
       <h1><?php print $rs['name_travel']; ?></h1>
       <form action="saveinteres.php" method="post">
         <input value="<?php print $_GET['id']  ?>" type="text" name="id" hidden>
         <div class="form-group">
         <input type="submit" value="บันทึกเป็นสถานที่สนใจ"/>
         </div>
       </form>
       <table class="table table-hover">
         <thead>
          <tr>
          <th style="width:20%;">หัวข้อ</th>
          <th style="width:80%;">ข้อมูล</th>
          </tr>
         </thead>
         <tbody>
       <tr><td><h5>ชื่อสถานที่</h5></td><td><?php print $rs['name_travel']; ?></td></tr>
       <tr><td><h5>เบอร์โทรศัพท์</h5></td><td><?php print $rs['tel_travel']; ?></td></tr>
       <tr><td><h5>Website</h5></td><td width="1"><div style="text-overflow: ellipsis;width:350px;display:block;overflow:hidden;white-space:nowrap;"><a href="<?php print $rs['web_travel']; ?>"><?php print $rs['web_travel'];?></a></div></td></tr>
       <tr><td><h5>Facebook</h5></td><td width="1"><div style="text-overflow: ellipsis;width:350px;display:block;overflow:hidden;white-space:nowrap;"><a href="<?php print $rs['facebook_travel']; ?>"><?php print $rs['facebook_travel']; ?></a></div></td></tr>
       <tr><td><h5>สถานที่ตั้ง</h5></td><td><?php print $rs['address_travel']; ?></td></tr>
       <tr><td><h5>คำอธิบายสถานที่</h5></td><td><?php print $rs['comment_travel']; ?></td></tr>
       </tbody>
     </table>
     <table class="table table-hover">
       <thead>
      <tr>
       <th>การบริการ</th><th>อัตราค่าบริการ</th>
       </tr>
       </thead>
      <tbody>
        <?php $sql="select * from service where id_travel='".$_GET['id']."'";
          $result=mysqli_query($con,$sql) or die($sql);
          while ($rs=mysqli_fetch_array($result)) {
            ?>
            <tr><th><h5><?php print $rs['name_service'] ?></h5></th><th><h5><?php print $rs['price_service']; ?></h5></th></tr>
            <?php
          }
        ?>
      </tbody>
       </table>
     </div>
   </div>
       <?php
     }
     ?>
  <?php
$sql="select rating from rating where id_travel='".$_GET['id']."'";
$result=mysqli_query($con,$sql) or die($sql);
$total=0;
while ($rs=mysqli_fetch_array($result)) {
$total =  $total + $rs['rating'];
}
$sql="select rating from rating where id_travel='".$_GET['id']."' and id='".base64_encode($_SESSION['id'])."' ";
$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
?>
<div class="col-12">
  <div class="col-6">
        <div id="rcorners4">
            <center>
            <p>
              ระดับความพึงพอใจ
            </p></center>
      <form id="form1" name="form1" method="post" action="saverating.php">
            <center><table>
            <td width="155"></td>
            <td width="345">
      <ul class="iVote">
        <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      </ul>
      <input name="hScore1" type="hidden" id="hScore1" value="0" />
      <span class="showVoteText"></span>
            </td>
          </tr>
        </table></center>
      <br style="clear:both;" />
      <center>
      <div class="form-group">
      <input type="submit" name="button" id="button" value="บันทึกคะเเนนความพึงพอใจ" />
     </div>
     </center>
     <input type="text" value="<?php print $_GET['id']; ?>" name="place" hidden>
      </form>
      </div>

  <div class="col-6">
<div align="center">
  <div id="rcorners2"><h4>คะเเนนของคุณต่อสถานที่</h4><h1><?php print $rs['rating'];?></h1></div>
</div>
</div><div class="col-6">
<?php
$sql="select count(rating) from rating where id_travel='".$_GET['id']."'";
$result=mysqli_query($con,$sql) or die($sql);
$rs=mysqli_fetch_array($result);
if($rs['count(rating)'] == 0){
 $rs['count(rating)']=1;
}
?>
<div id="rcorners2"><div align="center"><h4>คะเเนนเฉลี่ยต่อสถานที่</h4><h1><?php print $total=number_format($total/$rs['count(rating)'],2);?></h1></div></div>
</div>
</div>
<div class="col-6">
  <div id="rcorners3">
<?php
  $counttotalrating = $rs['count(rating)'];
  $sql="select count(rating) from rating where id_travel='".$_GET['id']."' and rating='5'";
  $result=mysqli_query($con,$sql);
  $rs=mysqli_fetch_array($result);
  ?>
  <div class="progress">
  <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(rating)']/$counttotalrating*100,0) ?>%">คะเเนน 5 ร้อยละ <?php print $total ?>%
  </div>
</div>
<?php
$sql="select count(rating) from rating where id_travel='".$_GET['id']."' and rating='4'";
$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
?>
<div class="progress">
<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="70"
aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(rating)']/$counttotalrating*100,0) ?>%">คะเเนน 4 ร้อยละ <?php print $total ?>%
</div>
</div>
<?php
$sql="select count(rating) from rating where id_travel='".$_GET['id']."' and rating='3'";
$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
?>
<div class="progress">
<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="70"
aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(rating)']/$counttotalrating*100,0) ?>%">คะเเนน 3 ร้อยละ <?php print $total ?>%
</div>
</div>
<?php
$sql="select count(rating) from rating where id_travel='".$_GET['id']."' and rating='2'";
$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
?>
<div class="progress">
<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="70"
aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(rating)']/$counttotalrating*100,0) ?>%">คะเเนน 2 ร้อยละ <?php print $total ?>%
</div>
</div>
<?php
$sql="select count(rating) from rating where id_travel='".$_GET['id']."' and rating='1'";
$result=mysqli_query($con,$sql);
$rs=mysqli_fetch_array($result);
?>
<div class="progress">
<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="70"
aria-valuemin="0" aria-valuemax="100" style="width:<?php print $total=number_format($rs['count(rating)']/$counttotalrating*100,0) ?>%">คะเเนน 1 ร้อยละ <?php print $total ?>%
</div>
</div>
 </div>
 </div>
</div>
<h2><b>สถานที่ที่ถูกสนใจเหมือนๆกัน</b></h2>
<?php
$sql = "select * from simularity left join picturetravel on simularity.sub_simularity = picturetravel.id_travel left join travel on simularity.sub_simularity = travel.id_travel WHERE `main__simularity` = '".$_GET['id']."' group by simularity.sub_simularity order by simularity DESC LIMIT 0,4";
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num != false){
while ($rs = mysqli_fetch_array($result)) {
?>
<div class="column">
  <div class="card">
    <a href="detailplace.php?id=<?php print $rs['id_travel']; ?>"><img src="admin/images/picturetravel/<?php if($rs['name_picturetravel'] !== null){print $rs['name_picturetravel'];}else{ print "null.png";} ?>" alt="<?php print $rs['name_travel'] ?>" style="width:100%; height:200px;"></a>
    <h3><a href="detailplace.php?id=<?php print $rs['id_travel']; ?>"><?php print $rs['name_travel'] ?></a></h3>
  </div>
</div>
<?php
  }
}else{
  ?>
  <h3>ขออภัยข้อมูลยังไม่เพียงพอต่อการเเนะนำ</h3>
  <?php
}
 ?>
 <form method="post" action="sevecomment.php">
   <div class="form-group">
   <textarea class="form-control"rows="4" cols="50" name="comment"placeholder="Comment..." required></textarea>
   </div>
   <input type="text" name="place" value=<?php print $_GET['id']; ?> hidden>
   <div class="form-group">
   <input type="submit"  />
   </div>
 </form>
<?php
$sql="select * from comment,account where comment.id=account.id and comment.id_travel='".$_GET['id']."'ORDER BY comment_datetime DESC";
$result=mysqli_query($con,$sql);
while ($rs=mysqli_fetch_array($result)) {
  ?>
  <div class="media">
    <div class="media-left">
  <img src="pictureaccount/<?php if($rs['picture'] != false){ print $rs['picture']; }else{ print "blank-profile-hi.png";} ?>" class="circledetailplace"  />
</div>
<div class="media-body">
  <h4 class="media-heading"><?php if($rs['username'] != false){print $rs['username'];}else{print base64_decode($rs['id']); } ?></h4>
  <p>
    <?php print $rs['comment_comment'] ?>
  </p>
  <p><?php print $rs['comment_datetime'] ?></p>
</div>
</div>
<hr>
  <?php
}
 ?>
</div>
</body>
 <script language="javascript" src="js/jquery-1.4.1.min.js"></script>
 <script type="text/javascript">
 $(function(){
     var arrTextVote=new Array("ไม่ค่อยประทับใจ","ค่อนข้างประทับใจ","ประทับใจ","ประทับใจมาก","ประทับใจที่สุด");
     $("ul.iVote li").mouseover(function(){
             var prObj=$(this).parent("ul");;
             var Clto=prObj.children("li").index($(this));
             var Clto2=Clto;
             Clto+=1;
             prObj.children("li:gt("+Clto2+")").removeClass("VoteD");
             prObj.children("li:lt("+Clto+")").addClass("VoteD");
             prObj.nextAll("span.showVoteText:eq(0)").html(arrTextVote[Clto2]);
             var oldScore=prObj.next("input").val();
             prObj.mouseout(function(){
                     prObj.children("li").removeClass("VoteD");
                     prObj.nextAll("span.showVoteText:eq(0)").html("");
             });

     });
     $("ul.iVote li").click(function(){
             var prObj=$(this).parent("ul");;
             if(prObj.children("li").hasClass("VoteD2")==false){
             var Clto=prObj.children("li").index(this);
             var Clto2=Clto;
             Clto+=1;
             prObj.next("input").val(Clto);
             prObj.children("li:lt("+Clto+")").addClass("VoteD2");
             prObj.children("li:gt("+Clto+")").removeClass("VoteD");
             prObj.children("li").unbind("mouseover");
             prObj.unbind("mouseout");
             prObj.nextAll("span.showVoteText:eq(0)")
             .html(arrTextVote[Clto2]);
             }
     });

 });
 </script>
 <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
