<?php
SESSION_START();
$_SESSION["id"];
session_destroy();
echo "<script type=\"text/javascript\">";
echo "alert(\"Logout เรียบร้อยเเล้วครับ\");";
echo "window.location=\"homepage.php\"";
echo "</script>";
