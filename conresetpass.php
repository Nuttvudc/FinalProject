<script>
function resetpassword(){
if (document.resetpass.pass.value==false) {
  alert("กรุณากรอก PASSWORD") ;
  document.register.pass.focus() ;
  return false ;
}else if(document.resetpass.pass.value.length  < 6 || document.resetpass.pass.value.length  > 15)
{
 alert('Please input String [6-15 Character]');
 document.register.pass.focus();
 return false;
}else if (document.resetpass.pass.value==false) {
  alert("กรุณากรอก PASSWORD AGAIN") ;
  document.register.passagain.focus() ;
  return false ;
}else if (document.resetpass.pass.value !== document.resetpass.againnewpass.value) {
  alert("PASSWORD ไม่ตรงกัน") ;
  document.getElementById('resetpass').value = "";
  return false ;
}
}
function checkresetpass()
{
  var elem = document.getElementById('resetpass').value;
  if(!elem.match(/^([a-z0-9])+$/i))
  {
    alert("กรอก PASSWORD ได้เฉพาะ a-Z, A-Z, 0-9");
    document.getElementById('resetpass').value = "";
  }
}
</script>
<?php
session_start();
include("homepage.php");
 ?>
 <body>
   <div class="container">
     <h1>Restart the password ?</h1>
 <form id="pass" name="resetpass" action="saveresetpass.php" method="post" onsubmit="JavaScript:return resetpassword();">
   <div class="form-group">
 ่<input type="password"  id="resetpass" name="pass" class="form-control" placeholder="กรอก PASSWORD ใหม่" onblur="checkresetpass();"/>
   </div>
   <div class="form-group">
 <input type="password" name="againnewpass" class="form-control" placeholder="กรอก PASSWORD ใหม่อีกครั้ง" onblur="checkresetpass();"/>
   </div>
   <div class="form-group">
 <input type="submit" value="บันทึกการเปลี่ยนเเปลง" />
   </div>
 </form>
 </div>
</body>
