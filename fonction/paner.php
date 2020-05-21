<?php
$_SESSION['productId']=[];
if(isset($_POST['ID_PRD'])){

    session_start();

    $_SESSION['productId'][] = $_POST['ID_PRD'];

}
$list=array_unique($_SESSION['productId']);

