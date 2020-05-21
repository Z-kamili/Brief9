<?php 
session_start();
$_SESSION["user"] = null;
$_SESSION["mtp"] = null;
$_SESSION["ID"] = null;
$_SESSION['productId'][] = null;
header("Location:../../../index.php");
?>