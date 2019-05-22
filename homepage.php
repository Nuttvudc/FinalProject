<?php session_start();
include("connected.php");
ini_set('display_errors', 1);
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
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;


$fb = new Facebook\Facebook([
  'app_id' => '1059071897590074',
  'app_secret' => '87b3ae96a005758780217cb2dc26c8cc',
  'default_graph_version' => 'v3.0',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','user_likes']; // optional

$loginUrl = $helper->getLoginUrl('http://localhost/login-callback.php', $permissions);
 ?>
<script language="javascript">

function check() {
  var fty=new Array(".gif",".jpg",".jpeg",".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด
  var a=document.register.picture.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a
  var permiss=0; // เงื่อนไขไฟล์อนุญาต
  a=a.toLowerCase();
if(document.register.id.value==false) {
alert("กรุณากรอก ID") ;
document.register.id.focus() ;
return false ;
}else if(document.register.id.value.length < 6 || document.register.id.value.length > 15)
{
 alert('Please input String [6-15 Character] .');
 document.register.id.focus();
 return false;
}else if (document.register.pass.value==false) {
  alert("กรุณากรอก PASSWORD") ;
  document.register.pass.focus() ;
  return false ;
}else if(document.register.pass.value.length < 6 || document.register.pass.value.length > 15)
{
 alert('Please input String [6-15 Character] .');
 document.register.pass.focus();
 return false;
}else if (document.register.passagain.value==false) {
  alert("กรุณากรอก PASSWORD AGAIN") ;
  document.register.passagain.focus() ;
  return false ;
}else if (document.register.name.value==false) {
  alert("กรุณากรอก NAME USER") ;
  document.register.name.focus() ;
  return false ;
}
else if (document.register.pass.value !== document.register.passagain.value) {
  alert("PASSWORD ไม่ตรงกัน") ;
  document.getElementById('textpass').value = "";
  return false ;
}else if (a !="") {
  for(i=0;i<fty.length;i++){ // วน Loop ตรวจสอบไฟล์ที่อนุญาต
                  if(a.lastIndexOf(fty[i])>=0){  // เงื่อนไขไฟล์ที่อนุญาต
                      permiss=1;
                      break;
                  }else{
                      continue;
                  }
              }
              if(permiss==0){
                  alert("อัพโหลดได้เฉพาะไฟล์ gif jpg jpeg png");
                  return false;
              }
}else if (document.register.question.value==false) {
  alert("กรุณาเลือกคำถามสำหรับใช้ Reset ID เเละ PASSWORD") ;
  document.register.question.focus() ;
  return false ;
}else if (document.register.answer.value==false) {
  alert("กรุณากรอกคำตอบสำหรับใช้ Reset ID เเละ PASSWORD") ;
  document.register.question.focus() ;
  return false ;
}
}
function checklogin(){
  if(document.login.id.value==false){
    alert("กรุณากรอก ID ที่ต้องการเข้าใช้งาน");
    document.login.id.focus();
    return false;
  }else if (document.login.pass.value==false) {
    alert("กรุณากรอก PASSWORD ให้ตรงกับ ID ที่ต้องการใช้งาน");
    document.login.pass.focus();
    return false;
  }
}
  function checkid()
	{
		var elem = document.getElementById('textid').value;
		if(!elem.match(/^([a-z0-9])+$/i))
		{
			alert("กรอก ID ได้เฉพาะ a-Z, A-Z, 0-9");
			document.getElementById('textid').value = "";
		}
	}
  function checkpass()
  {
    var elem = document.getElementById('textpass').value;
    if(!elem.match(/^([a-z0-9])+$/i))
    {
      alert("กรอก PASSWORD ได้เฉพาะ a-Z, A-Z, 0-9");
      document.getElementById('textpass').value = "";
    }
  }
  function checkname()
  {
    var elem = document.getElementById('textname').value;
    if(!elem.match(/^([_a-z0-9])+$/i))
    {
      alert("กรอก NAME USER ได้เฉพาะ a-Z, A-Z, 0-9 และ _");
      document.getElementById('textname').value = "";
    }
  }var HttPRequest = false;

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

		  var url = 'AjaxPHPRegister2.php';
		  var pmeters = "id=" + encodeURI( document.getElementById("textid").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);


			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpan").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPRegister3.php';
					}
					else
					{
						document.getElementById("mySpan").innerHTML = HttPRequest.responseText;
					}
				}

			}

	   }

     function doCallAjax2() {
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

		  var url = 'AjaxPHPRegister4.php';
		  var pmeters = "username=" + encodeURI( document.getElementById("textname").value);

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);


			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpanusername").innerHTML = "..";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'AjaxPHPRegister3.php';
					}
					else
					{
						document.getElementById("mySpanusername").innerHTML = HttPRequest.responseText;
					}
				}

			}

	   }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wellness Tourism</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<style>
.navbar-fixed-top{
background-color: rgba(249, 81, 111, 0.79);
box-shadow: 0 0 11px rgba(33,33,33,.2);
margin:0px;
}
.bg-4 {
     position: absolute;
     left: 0px;
     bottom: 0px;
     width: 100%;
     background-color: rgba(249, 81, 111, 0.79);
     color: White;
     box-shadow: 0 0 11px rgba(33,33,33,.2);
}
.circle{
  height: 50;
  width: 50;
  border: 3px solid #fff;
  border-radius: 50%;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
}
#user, #pass, #editid, #picture, #login-dp,#signup-dp,  #xxx{
    min-width: 250px;
    padding: 14px 14px 0;
    overflow:hidden;
    background-color:rgba(255,255,255,.8);
}
#user, #pass, #editid, #picture, #login-dp,#signup-dp, #fft, #xxx .help-block{
    font-size:12px
}
#user, #pass, #editid, #picture, #login-dp,#signup-dp,  #xxx .bottom{
    background-color:rgba(255,255,255,.8);
    border-top:1px solid #ddd;
    clear:both;
    padding:14px;
}
#user, #pass, #editid, #picture, #login-dp,#signup-dp, #fft, #xxx .social-buttons{
    margin:12px 0
}
#user, #pass, #editid, #picture, #login-dp,#signup-dp, #xxx .social-buttons a{
    width: 49%;
}
#user, #pass, #editid, #picture, #login-dp,#signup-dp, #fft, #xxx .form-group {
    margin-bottom: 10px;
}
.btn-fb{
    color: #fff;
    background-color:#3b5998;
}
.btn-fb:hover{
    color: #fff;
    background-color:#496ebc
}
.btn-tw{
    color: #fff;
    background-color:#55acee;
}
.btn-tw:hover{
    color: #fff;
    background-color:#59b5fa;
}
@media(max-width:986px){
    #user, #pass, #editid, #picture, #login-dp, #signup-dp, #fft, #xxx {
        background-color: inherit;
        color: #fff;
    }
    #user, #pass, #editid, #picture, #login-dp, #signup-dp, #fft, #xxx .bottom{
        background-color: inherit;
        border-top: none;
    }
}

.col-12{width: 100%}
.col-4 {width: 33.33%;}
.col-6 {width: 50%;}
.col-8 {width: 66.67%;}
[class*="col-"] {
    float: left;
    padding: 20px;
 /*   border: 1px solid red; */
}
html {
  position: relative;
  min-height: 150%;
 }
 body {
  margin: 0 0 400px;
 }
 .footer {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 100px;
  width: 100%;
 }
</style>
<body>
  <br><br>
<nav class="navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="place.php" style="color:white;">Wellness Tourism</a>
    </div>
    <div class="navbar-header">
      <a class="navbar-brand" href="edituser.php" style="color:white;">User</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <?php
      error_reporting(~E_NOTICE);
      if($_SESSION["username"]==false){ ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"style="color:white;"><span class="glyphicon glyphicon-user" ></span> Sign Up</a>
        <ul id="login-dp" class="dropdown-menu">
          <li>
            <div class="row">
              <div class="col-md-12">
                                  Register
                <form method="post" action="register.php" name="register" onsubmit="JavaScript:return check();"  enctype="multipart/form-data">
                  <div class="form-group">
                  <table><td><input type="text" name="id" id="textid" onblur="checkid();" class="form-control" placeholder="ID" OnChange="JavaScript:doCallAjax();" ></td><td><span id="mySpan"></span></td></table>
                  </div>
                  <div class="form-group">
                  <table><td><input type="password" name="pass" id="textpass" class="form-control" placeholder="PASSWORD" onblur="checkpass();"></td><td></td></table>
                  </div>
                  <div class="form-group">
                  <table><td><input type="password" name="passagain" class="form-control" placeholder="PASSWORD AGAIN" id="textpass" onblur="checkpass();"></td><td></td></table>
                  </div>
                  <div class="form-group">
                  <table><td><input type="text" name="username" id="textname" class="form-control" placeholder="USERNAME" onblur="checkname();" OnChange="JavaScript:doCallAjax2();" maxlength="20"></td><td><span id="mySpanusername"></span></td></table>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="question" required >
                        <option value="">เลือกคำถามสำหรับ Reset ID PASSWORD</option>
                        <option value="ชื่อสัตว์เลี้ยงตัวเเรกของคุณ">ชื่อสัตว์เลี้ยงตัวเเรกของคุณ</option>
                        <option value="โรงเรียนมัธยมต้นที่คุณได้เข้า">โรงเรียนเเห่งที่สองที่คุณได้เข้าคุณได้เข้า</option>
                        <option value="สถานที่ที่คุณเคยไปเที่ยวครั้งเเรก">สถานที่ที่คุณเคยไปเที่ยวครั้งเเรก</option>
                        <option value="โทรศัพทธ์เครื่องเเรกของคุณคือ">โทรศัพทธ์เครื่องเเรกของคุณคือ</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" name="answer" id="answer" class="form-control"  onblur="checkanswer();" maxlength="30" placeholder="คำตอบใช้ Reset ID PASSWORD"/>
                  </div>
                  <div class="form-group">
                  <input type="file" name="picture" id="textpicture" />
                  </div>
                  <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" value="register">
                  </div>
                </form>
              </div>
            </div>

          </li>
        </ul>
      </li>
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><span class="glyphicon glyphicon-log-in"></span> Login</a>
       <ul id="login-dp" class="dropdown-menu">
        <li>
          <div class="row">
							<div class="col-md-12">
                LOG IN
								 <form action="login.php" method="post" name="login" onsubmit="javascript:return checklogin();">
										<div class="form-group">
											 <input type="text" class="form-control" name="id" id="id" placeholder="ID" required>
										</div>
										<div class="form-group">
											 <input type="password" class="form-control" name="pass" id="textpass" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="resetpassword.php">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
								 </form>
							</div>
					 </div>
        </li>
       </ul>
     </li>
   <?php }else{
     ?>
     <li><img class="circle" src="<?php echo $_SESSION['picture']; ?> " width="50" height="50" /></li>
     <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION["username"] ?><b class="caret"></b></a>
                         <ul id="user-dp" class="dropdown-menu">
                             <li><a href="edituser.php"><i class="icon-cog"></i>Edituser</a></li>
                             <li><a href="des.php"><i class="icon-off"></i> Logout</a></li>
                         </ul>
                     </li>
   <?php } ?>
    </ul>
  </div>
</nav>
<header>
</header>

<footer class="container bg-4">
  <div class="row">
  <div class="col-4">
  <center><br><h1>Wellness Tourism</h1><br><p>
    This site is suitable for those who are interested in Wellness Tourism is very popular today.
  </p></center>
  </div>
  <center>
  <div class="col-4">
    <center>
      <h1>Contact Developer</h1>
     <div class="col-6">
           <a href="https://www.facebook.com/fukt.t"><button type="button" class="btn btn-fb"><i class="fa fa-facebook pr-1"></i> Facebook</button></a>
     </div>
   </center>
   <center>
     <div class="col-6">
          <a href="https://twitter.com/godknows3031"><button type="button" class="btn btn-tw"><i class="fa fa-twitter pr-1"></i> Twitter</button></a>
     </div>
   </center><br>
   <center>
    <div class="col-12">
          <a href="https://www.instagram.com/tooktarhome/?hl=en"><button type="button" class="btn btn-ins"><i class="fa fa-instagram pr-1"></i> Instagram</button></a>
    </div>
  </center>
  </div>
  </center>
  <div class="col-4">
<center> <div class="fb-page" data-href="https://www.facebook.com/TheNuadmassage/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
  <blockquote cite="https://www.facebook.com/TheNuadmassage/" class="fb-xfbml-parse-ignore">
    <a href="https://www.facebook.com/TheNuadmassage/">TheNuadmassage</a></blockquote></div></center>
  </div>
</div>
</footer>
</body>
</html>
