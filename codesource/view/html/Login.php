<?php
require '../../Database/database.php';
$email = $password = $erreur = $emailerror = $passworderror  = "";
$status = true;
if(!empty($_POST)){
  $email = checkInput($_POST["Email"]);
  $password = checkInput($_POST["password"]);
  $db = Database::connect();
  $stmt = $db->query("SELECT * FROM client");
  
  while ($row = $stmt->fetch()){
    if($row['EMAIL'] == $email && $row['PASSWORD'] == $password){
        session_start();
        
       $_SESSION["user"] = $row['EMAIL'];
       $_SESSION["mtp"] = $row['PASSWORD'];
       $_SESSION["ID"] = $row['ID'];
       header("Location:../../../home.php");
    }else{
        $status = false;
        $erreur = "Erreur form n'est pas valide";
    }
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    <style>
    .exp{
    text-align: center !important;
    width: 40%;
    display: block;
    margin: auto;
    }
    </style>
</head>
<body>
<div class="image">
    <img src="../imgs/logo.png" style="width: 180px; margin-bottom: 30px;">
</div>
<?php if(!$status) :?> 
<div class="alert alert-danger exp" role="alert">
Mot de passe ou bien Email n'est pas valide 
</div>
<?php endif?>
    <form method="post" action="Login.php">
        <input type="email" placeholder="Email" name="Email">
        <div>
            <span> <?php echo $emailerror; ?> </span>
        </div>
        <input type="password" placeholder="Mot passe" name="password">
        <div>
            <span> <?php echo $passworderror; ?> </span>
        </div>
        <input type="submit" name="Inscription">
    </form>
</body>
</html>