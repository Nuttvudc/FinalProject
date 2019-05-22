<?php
session_start();
include('connected.php');
function dotp($arr1, $arr2){
     return array_sum(array_map(create_function('$a, $b', 'return $a * $b;'), $arr1, $arr2));
}
$_POST['hScore1'];
$sql="select * from rating where id='".base64_encode($_SESSION['id'])."' and id_travel='".$_POST['place']."'";

$result=mysqli_query($con,$sql);

if($result==false){
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ\");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else{
 $rs=mysqli_fetch_array($result);
 if($rs['id']==false){
$sql="INSERT INTO `rating`(`rating`, `id`, `id_travel`) VALUES (".$_POST['hScore1'].",'".base64_encode($_SESSION['id'])."',".$_POST['place'].")";
$result=mysqli_query($con,$sql);
if (!$result) {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ \");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else{
  $sql = "select id_travel from rating GROUP BY id_travel";
  $result = mysqli_query($con,$sql);
  //ค้นหา id สถานที่ทั้งหมดที่เคยได้คะเเนน
  while ($rs=mysqli_fetch_array($result)) {
    $sql1 = "select id from rating GROUP BY id";
    $result1 = mysqli_query($con,$sql1);
    //ค้นหา id ผู้ใช้ทั้งหมดที่เคยให้คะเเนน
    $i = 1;
    while ($rs1=mysqli_fetch_array($result1)) {
      $sql2="select id,rating from rating where id_travel = '".$rs['id_travel']."' and id = '".$rs1['id']."'";
      $result2 = mysqli_query($con,$sql2);
      //ค้นหา values ของ id and id_travel
      $rs2 = mysqli_fetch_array($result2);
      $i++;
      if(mysqli_num_rows($result2) !== 0) {
      $id1[$rs['id_travel']][] = $rs2['rating'];
      }else {
      $id1[$rs['id_travel']][] = 0;
      }
     }
   }
   print $key1 = $_POST['place'];
   print "<br>";
     foreach (array_keys($id1) as $key2) {
       print $key2;
      if($key1 != $key2 && $key2 != $key1){
      $similarity=dotp($id1[$key1],$id1[$key2])/sqrt(dotp($id1[$key1],$id1[$key1])*dotp($id1[$key2],$id1[$key2]));
      $sql1 = "select id_simularity FROM simularity where main__simularity='".$key1."' and sub_simularity = '".$key2."'";
      $result = mysqli_query($con,$sql1);
      $row = mysqli_num_rows($result);
      $sql = "INSERT INTO `simularity`(`main__simularity`, `sub_simularity`, `simularity`) VALUES ($key1,$key2,$similarity)";
      if ($row !== 0) {
      $sql = "UPDATE `simularity` SET `simularity`='".$similarity."' WHERE `main__simularity`='".$key1."' and `sub_simularity`='".$key2."'";
      }
      $result = mysqli_query($con,$sql) or die("Error");
      $sql1 = "select id_simularity FROM simularity where main__simularity='".$key2."' and sub_simularity = '".$key1."'";
      $result = mysqli_query($con,$sql1);
      $row = mysqli_num_rows($result);
      $sql = "INSERT INTO `simularity`(`main__simularity`, `sub_simularity`, `simularity`) VALUES ($key2,$key1,$similarity)";
      if ($row !== 0) {
      $sql = "UPDATE `simularity` SET `simularity`='".$similarity."' WHERE `main__simularity`='".$key2."' and `sub_simularity`='".$key1."'";
      }
      $result = mysqli_query($con,$sql) or die("Error");
    }
  }
  echo "<script type=\"text/javascript\">";
  echo "alert(\"คุณได้ให้คะเเนนเป็นที่เรียนร้อยเเล้ว\");";
  echo "window.history.back();";
  echo "</script>";
 }
}else{
$sql="update rating set rating = '".$_POST['hScore1']."' where id_travel = '".$_POST['place']."' and id='".base64_encode($_SESSION['id'])."'";
$result=mysqli_query($con,$sql);
if (!$result) {
  echo "<script type=\"text/javascript\">";
  echo "alert(\"เกิดความผิดพลาดกรุณาติดต่อผู้ดูเเลระบบ \");";
  echo "window.history.back();";
  echo "</script>";
  exit();
}else {
  $sql = "select id_travel from rating GROUP BY id_travel";
  $result = mysqli_query($con,$sql);
  //ค้นหา id สถานที่ทั้งหมดที่เคยได้คะเเนน
  while ($rs=mysqli_fetch_array($result)) {
    $sql1 = "select id from rating GROUP BY id";
    $result1 = mysqli_query($con,$sql1);
    //ค้นหา id ผู้ใช้ทั้งหมดที่เคยให้คะเเนน
    $i = 1;
    while ($rs1=mysqli_fetch_array($result1)) {
      $sql2="select id,rating from rating where id_travel = '".$rs['id_travel']."' and id = '".$rs1['id']."'";
      $result2 = mysqli_query($con,$sql2);
      //ค้นหา values ของ id and id_travel
      $rs2 = mysqli_fetch_array($result2);
      $i++;
      if(mysqli_num_rows($result2) !== 0) {
      $id1[$rs['id_travel']][] = $rs2['rating'];
      }else {
      $id1[$rs['id_travel']][] = 0;
      }
     }
   }

   $key1 = $_POST['place'];
     foreach (array_keys($id1) as $key2) {
       if($key1 != $key2 && $key2 != $key1){
      $similarity=dotp($id1[$key1],$id1[$key2])/sqrt(dotp($id1[$key1],$id1[$key1])*dotp($id1[$key2],$id1[$key2]));
      $sql1 = "select id_simularity FROM simularity where main__simularity='".$key2."' and sub_simularity = '".$key1."'";
      $result = mysqli_query($con,$sql1);
      $num = mysqli_num_rows($result);
      $sql = "UPDATE `simularity` SET `simularity`='".$similarity."' WHERE `main__simularity`='".$key1."' and `sub_simularity`='".$key2."'";
      if($num == 0){
        $sql = "INSERT INTO `simularity`(`main__simularity`, `sub_simularity`, `simularity`) VALUES ($key1,$key2,$similarity)";
      }
      $result = mysqli_query($con,$sql) or die("Error");
      $sql1 = "select id_simularity FROM simularity where main__simularity='".$key2."' and sub_simularity = '".$key1."'";
      $sql = "UPDATE `simularity` SET `simularity`='".$similarity."' WHERE `main__simularity`='".$key2."' and `sub_simularity`='".$key1."'";
      if($num == 0){
        $sql = "INSERT INTO `simularity`(`main__simularity`, `sub_simularity`, `simularity`) VALUES ($key2,$key1,$similarity)";
      }
      $result = mysqli_query($con,$sql) or die("Error");
          }
    }

  echo "<script type=\"text/javascript\">";
  echo "alert(\"คุณได้เปลี่ยนเเปลงคะเเนนเป็นที่เรียนร้อยเเล้ว\");";
  echo "window.history.back();";
  echo "</script>";

}
}
}
 ?>
