<?
include("connected.php");
$strUsername = trim($_POST["id"]);

	if(trim($strUsername) == "")
	{
		echo "<a style='color:red'>กรอกข้อมูลก่อนทำการเพิ่ม</a>";
		exit();
	}


	//*** Check Username (already exists) ***//
	$strSQL = "SELECT * FROM subject WHERE id_subject = '".$strUsername."' ";
	$objQuery = mysqli_query($con,$strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		echo "<a style='color:red'>มีรหัสวิชานี้อยู่ในระบบเเล้ว</a>";
	}
	else
	{
		echo "<a style='color:green'>สามารถเพิ่มรหัสวิชานี้</a>";
	}

	mysqli_close($objConnect);
?>
