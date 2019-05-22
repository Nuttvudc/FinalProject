
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
