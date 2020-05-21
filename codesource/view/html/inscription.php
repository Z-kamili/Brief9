<?php
require '../../Database/database.php';
$email = $emailerror = $password = $passworderror = $erreur = $name = $prenom  = $cpassword = $nameerror = $prenomerror =  "";
$status = true;
$error = true;
if(!empty($_POST)){
  $email = checkInput($_POST["Email"]);
  $password = checkInput($_POST["password"]);
  $name = checkInput($_POST["password"]);
  $prenom = checkInput($_POST["Prenom"]);
  $cpassword = checkInput($_POST["confirmpassword"]);

if(empty($name)){
       $nameerror = "ce champs ne doit pas etre vide";
       $status = false;
  }  
if(empty($prenom)){
    $prenomerror = "ce champs ne doit pas etre vide";
    $status = false;
}
if(empty($email)){
    $emailerror = "ce champs ne doit pas etre vide";
    $status = false;
}
if(empty($password)){
    $passworderror = "ce champs ne doit pas etre vide";
    $status = false;
}
if($status){
    $db = Database::connect();
    $statement = $db->prepare("Insert into client (NOM,PRENOM,EMAIL,PASSWORD) value(?,?,?,?)");
    $statement->execute(array($name,$prenom,$email,$password));
    header("location:../../../index.php");
    Database::disconnect();
}
}
function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    
    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/inscription.css">
    <title>Document</title>
</head>
<body>
<div class="image">
    <img src="../imgs/logo.png" style="width: 180px; margin-bottom: 30px;">
</div>
    <form method="post" action="inscription.php">
        <input type="text" placeholder="Nom" name="name" >
        <div>
            <span> <?php echo $nameerror; ?> </span>
        </div>
        <input type="text" placeholder="Prenom" name="Prenom">
        <div>
            <span> <?php echo $prenomerror; ?> </span>
        </div>
        <input type="email" placeholder="Email" name="Email">
        <div>
            <span> <?php echo $emailerror; ?> </span>
        </div>
        <input type="password" placeholder="Mot passe" name="password">
        <div>
            <span> <?php echo $passworderror; ?> </span>
        </div>
        <input type="password" placeholder="Confirmer Mot passe" name="confirmpassword">
        <div>
            <span> <?php echo $passworderror; ?> </span>
        </div>
        <input type="submit" name="Inscription">
    </form>
</body>
</html>