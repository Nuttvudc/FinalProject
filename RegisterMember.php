<html>
<body>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="jQuery v3.3.1.min.js" ></script>
<title>Register Research user</title>
<style>
.mar{
  margin-bottom: inherit;
}
.col-12{width: 100%}
.col-4 {width: 33.33%;}
.col-6 {width: 50%;}
.col-8 {width: 66.67%;}
.col-2 {width: 16.66%;}
.col-10{width: 83.33%;}
.col-1{width: 8.33%;}

body {
  font-family: monospace;
}

[class*="col-"] {
   float: left;
   padding: 10px;
/*   border: 1px solid red; */
}
.mar {
  margin-top: 50px;
}
.col-8 {
border: 1px solid rgb(255, 65, 242);
border-style: dashed;
border-radius: 40px;
}
#formpassword{
  display: none;
}
.btn {
 width: 100%;
}
#txt{
  border-radius: 10px;
  background-color: rgb(185,182,182);
  color: rgb(174,66,0);
  font-size: 16px;
}
#finalline{
  border : 0.5px solid rgb(255, 65, 242);
  border-style: dashed;
  width: 55%;
}
</style>
<script>
var check = function() {
  if (document.getElementById('txtNewPassword').value ==
    document.getElementById('txtConfirmPassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
var HttPRequest = false;

	   function doCallAjax() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  }

		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }

		  var url = 'AjaxRegister.php';
		  var pmeters = "tUser=" + encodeURI( document.getElementById("id_user").value) +
						"&tfirstname=" + encodeURI( document.getElementById("firstname").value ) +
						"&tlastname=" + encodeURI( document.getElementById("lastname").value );

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);


			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "Now is Loading...";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'บัญชีนี้ได้ทำการลงทะเบียนในระบบเเล้ว')
					{

            document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
            document.getElementById("id_user").style="border : 2px solid red;border-radius: 4px;";
            document.getElementById("firstname").style="border : 2px solid red;border-radius: 4px;";
            document.getElementById("lastname").style="border : 2px solid red;border-radius: 4px;";
            document.getElementById("mySpan").style.color = "red";

					}else if (HttPRequest.responseText == 'ไม่มีข้อมูลบัญชีนี้อยู่ในระบบ') {

            document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
            document.getElementById("id_user").style="border : 2px solid red;border-radius: 4px;";
            document.getElementById("firstname").style="border : 2px solid red;border-radius: 4px;";
            document.getElementById("lastname").style="border : 2px solid red;border-radius: 4px;";
            document.getElementById("mySpan").style.color = "red";

          }
					else
					{
            $("#frmMain").fadeOut(500);
            document.getElementById("username").value = HttPRequest.responseText;
            document.getElementById("btnRegister").style.display = "none";
            document.getElementById("mySpan").innerHTML = "กรุณากรอกรหัสผ่านสำหรับเข้าใช้งาน";

            document.getElementById("id_user").style="border : 2px solid green;border-radius: 4px;";
            document.getElementById("firstname").style="border : 2px solid green;border-radius: 4px;";
            document.getElementById("lastname").style="border : 2px solid green;border-radius: 4px;";
            document.getElementById("mySpan").style.color = "green";

            $("#summitRegister").fadeIn(3000);
            $("#formpassword").fadeIn(3000);
					}
				 }
		  	}
	   }

     function doSubmitAjax() {
       if(document.getElementById('txtNewPassword').value !==
          document.getElementById('txtConfirmPassword').value){
          document.getElementById("txtNewPassword").style="border : 2px solid red;border-radius: 4px;";
          document.getElementById("txtConfirmPassword").style="border : 2px solid red;border-radius: 4px;";
       }else if(document.getElementById('txtNewPassword').value == false || document.getElementById('txtConfirmPassword').value == false) {
         document.getElementById("txtNewPassword").style="border : 2px solid red;border-radius: 4px;";
         document.getElementById("txtConfirmPassword").style="border : 2px solid red;border-radius: 4px;";
         document.getElementById('message').style.color="red";
         document.getElementById('message').innerHTML = 'กรุณากรอกข้อมูล Password';
       }else{
         document.getElementById("txtNewPassword").style="border : 2px solid green;border-radius: 4px;";
         document.getElementById("txtConfirmPassword").style="border : 2px solid green;border-radius: 4px;";
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  }

		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }

		  var url = 'AjaxSubmitRegister.php';
		  var pmeters = "tUsername=" + encodeURI( document.getElementById("username").value) +
						"&tPassword=" + encodeURI( document.getElementById("txtNewPassword").value ) +
						"&tUser=" + encodeURI( document.getElementById("id_user").value );

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);


			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "Now is Loading...";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText !== '**ไม่สามารถบันทึกข้อมูลได้**')
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
            alert("ลงทะเบียนเสร็จสมบูรณ์กด 'ตกลง' เพื่อเข้าสู่หน้า LOGIN");
            window.location = 'SigninToSys.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				 }
		  	}
	   }
  }
</script>
<div height="100%">
<div class="container">
  <div class="mar">
  </div>

  <div class="mar">
    <div class="col-2">

    </div>

  <div class="col-8" style="padding: 20px;height:360px;">

      <div class="col-6">
        <center><img src="images/login img1.png" width="75%" height="60%"/></center>
        <center><img src="images/login img2.png" width="100%" height="30%"/></center>
      </div>
      <div class="col-6">
    <div class="formgroup">
      <center><P id="txt">ระบบลงทะเบียน (ระบบบันทึกไฟล์ข้อมูล)</P></center>
    </div>
         <center><B><span id="mySpan"></span></B></center>
          <div class="form-group">
            <form name="frmMain" id="frmMain">
               <label>รหัสพนักงาน : </label><input type='text' id = 'id_user' name='id_user' placeholder="กรอกรหัสพนักงาน 7 หลักเช่น XXXXXXX" class="form-control" required/></p>
               <label>ชื่อ : </label><input type='text' id = 'firstname' name='firstname' placeholder="ชื่อจริงภาษาไทย" class="form-control" required/></p>
               <label>นามสกุล : </label><input type='text' id = 'lastname' name='lastname' placeholder="นามสกุลจริงภาษาไทย" class="form-control" required/></p>
            <button name="btnRegister" type="button" id="btnRegister" OnClick="JavaScript:doCallAjax();" class="btn btn-default">Register</button>
          </form>
        </div>
        <div class="form-group">
          <form id="formpassword">
            <label>Username : </label><input type='text' id="username" name='username' placeholder="รหัสพนักงาน" class="form-control"  disabled required/></p>
            <label>Password : </label><input type='password' id="txtNewPassword" name='password' placeholder="กรอกรหัสผ่าน" class="form-control" maxlength="15" required/></p>
            <label>ยืนยัน Password : </label><span id="message"></span><input type='password' id="txtConfirmPassword" name='passwordag' placeholder="กรอกรหัสผ่านอีกครั้ง" onkeyup='check();' class="form-control" maxlength="15" required/></p>
            <input name="summitRegister" type="button" id="summitRegister" OnClick="JavaScript:doSubmitAjax();" class="btn btn-default" value="Register">
        </div>
     </div>

  </div>
      <div class="col-2">
      </div>
     </div>
</div>
</div>
<div class="mar">

</div>
<p align="center"><a href="http://research.gsb/Database/home.php"><img src="images/back.jpg" width="35" height="35" border="0" /></a></p>
<center><p id="finalline"></p><center>
</body>
