<?php 
session_start();
$_SESSION["user"] = null;
header("Location:http://localhost/Tbeb-Lik/admin/Login.php");
?>