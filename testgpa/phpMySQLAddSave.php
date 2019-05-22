<?php
session_start();
include ("connected.php");
if(!isset($_SESSION['admin'])){
  echo "<script type=\"text/javascript\">";
  echo "window.location='index.php';";
  echo "</script>";
  exit();
}

if($_GET['txtId_Subject']){
  $sql = "update subject set id_subject = '".$_GET['txtId_Subject']."',name_subject = '".$_GET['txtName_Subject']."',credit = '".$_GET['txtCredit']."' where number_subject = '".$_GET['txt_number']."'";
  $result = mysqli_query($con,$sql) or die($sql."Error");
  ?>
  <script type="text/javascript">
   alert("ทำการเเก้ไขรหัสวิชา : <?php echo $_GET['txtId_Subject']; ?> \nชื่อวิชา : <?php echo $_GET['txtName_Subject']; ?> \nหน่วยกิต : <?php echo $_GET['txtCredit']; ?>");
   window.location.href = "phpMySQLAddForm.php";
  </script>
  <?php
  exit();
}else if(isset($_POST["delete"])){
  for($i =1;$i <= count($_POST['delete']);$i++){
    $sql = "delete from subject where number_subject ='".$_POST["delete"][$i]."'";
    $result = mysqli_query($con,$sql) or die("Error");
  }
  exit();
}else if($_POST["txtId_Subject"] == false){
?>
<script type="text/javascript">
 alert("กรุณากรอกรหัสวิชา");
 window.location.href = "phpMySQLAddForm.php";
</script>
<?php
 exit();
}else if($_POST["txtName_Subject"] == false){
?>
<script type="text/javascript">
 alert("กรุณากรอกชื่อวิชา");
 window.location.href = "phpMySQLAddForm.php";
</script>
<?php
 exit();
}else if($_POST["txtCredit"] == false){
 ?>
 <script type="text/javascript">
  alert("กรุณากรอกหน่วยกิตวิชา");
  window.location.href = "phpMySQLAddForm.php";
 </script>
 <?php
 exit();
}
$sql = "select * from subject where id_subject ='".$_POST["txtId_Subject"]."'";
$result = mysqli_query($con,$sql) or die("Error");
$num = mysqli_num_rows($result);
if($num < 1){
  $strSQL = "INSERT INTO subject ";
  $strSQL .="(Number_Subject,Id_Subject,Name_Subject,credit) ";
  $strSQL .="VALUES ";
  $strSQL .="('".$_POST["txtNumber_Subject"]."','".$_POST["txtId_Subject"]."','".$_POST["txtName_Subject"]."' ";
  $strSQL .=",'".$_POST["txtCredit"]."') ";
  $objQuery = mysqli_query($con,$strSQL);
  if($objQuery)
  {
		?>
		<script type="text/javascript">
	   alert("ทำการเพิ่มวิชา : <?php echo $_POST["txtName_Subject"]; ?>");
	   window.location.href = "phpMySQLAddForm.php";
	  </script>
		<?php
  }
  else
  {
    ?>
		<script type="text/javascript">
	   alert("ไม่สามารถเพิ่มได้กรุณาติดต่อ");
	   window.location.href = "phpMySQLAddForm.php";
	  </script>
		<?php
  }
  mysql_close($objConnect);
}else{
	?>
	<script type="text/javascript">
	 alert("ไม่สามารถเพิ่มได้เนื่องจากมีรหัสวิชา : <?php echo $_POST["txtId_Subject"]; ?> อยู่เเล้ว");
	 window.location.href = "phpMySQLAddForm.php";
	</script>
	<?php
}
?>
</body>
</html>
