<?
$strUsername = trim($_POST["username"]);

	if(trim($strUsername) == "")
	{
		echo "<img src='img/false.png'>";
		exit();
	}

	$objConnect = mysqli_connect("u5811020660089.sci.dusit.ac.th","u5811020660089","26062539","u5811020660089_dba") or die("Error Connect to Database");


	//*** Check Username (already exists) ***//

	$strSQL = "SELECT * FROM account WHERE username = '".$strUsername."' ";
	$objQuery = mysqli_query($objConnect,$strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysqli_fetch_array($objQuery);
	if($objResult)
	{
		echo "<img src='img/false.png' height='20' width='20'>";
	}
	else
	{
		echo "<img src='img/true.png'  height='20' width='20'>";
	}

	mysqli_close($objConnect);
?>
