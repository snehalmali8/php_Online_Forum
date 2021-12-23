<?php
session_start();

session_unset();
session_destroy();
echo "loggin out please wait";
header("location: /Online_Forum/login.php");
exit;

?>