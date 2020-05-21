<?php 

require '../../Database/database.php';
$list = $list2 = [];
$db = Database::connect();

$stmt = $db->prepare("SELECT * FROM produit");
$stmt->execute();

Database::disconnect();

// if($stmt->rowCount()){
//     while($row = $stmt->fetch()){
//         print_r($row);
//     }
// }



// $_SESSION['productId']=[];
// $_SESSION['panierFixId']=[];

session_start();

if(isset($_POST['addToCart'])){

    // session_start();

    $_SESSION['productId'][] = $_POST['idProd'];

    $list=array_unique($_SESSION['productId']);

}


// session_start();
// unset($_SESSION['productId']);


// -------------------------------------

// $_SESSION['panierFixId']=[];
if(isset($_POST['addPFToCart'])){

    // session_start();

    $_SESSION['panierFixId'][] = $_POST['idPanF'];

    $list2=array_unique($_SESSION['panierFixId']);

}

$db = Database::connect();

$stmt2 = $db->prepare("SELECT * FROM panier_fixe");
$stmt2->execute();

Database::disconnect();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <p>session products : <?php print_r($list); ?></p>
        <p>session panier : <?php print_r($list2); ?></p>

       <?php if($stmt->rowCount()){ ?>
            <?php while($row = $stmt->fetch()){ ?>

                <div>
                    <h1><?php echo $row['NOM']; ?> :</h1>
                    <img src="<?php echo $row['IMAGE']; ?>" alt="">
                    <p>quantité : <?php echo $row['QTE_MAX']; ?></p>
                    <p>prix : <?php echo $row['prix']; ?></p>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" value="<?php echo $row['ID_PRD']; ?>" name="idProd">
                        <input type="submit" value="add to cart" name="addToCart">
                    </form>
                </div>

            <?php } ?>
        <?php } ?>



        <?php if($stmt2->rowCount()){ ?>
            <?php while($row = $stmt2->fetch()){ ?>

                <div>
                    <h1>Panier <?php echo $row['ID_PFIX']; ?> :</h1>
                    <img src="../imgs/Icon material-shopping-cart.svg" alt="">
                    <p>cree en : <?php echo $row['DATE_PANIER']; ?></p>
                    <div>
                        <h2>list of products :</h2>
                        <?php   $db = Database::connect();
                                $idPanierTemp = $row['ID_PFIX'];
                                $stmt3 = $db->prepare("SELECT * FROM contenir_panierfix WHERE ID_PFIX = $idPanierTemp");
                                $stmt3->execute();

                                if($stmt3->rowCount()){
                                    while($row3 = $stmt3->fetch()){ ?>


                                                <?php  
                                                $idProdTemp = $row3['ID_PRD'];
                                                $stmt4 = $db->prepare("SELECT * FROM produit WHERE ID_PRD = $idProdTemp");
                                                $stmt4->execute();

                                                if($stmt4->rowCount()){
                                                    while($rowP = $stmt4->fetch()){ ?>
                                                        
                                                        <p>nom produit : <?php echo $rowP['NOM'] ?> ,prix : <?php echo $rowP['prix'] ?>, quantité : <?php echo $row3['QTE'] ?> </p>


                                                    <?php } ?>
                                                 <?php } ?>


                                        <?php } ?>
                                <?php } ?>
                                
                         <?php Database::disconnect(); ?>

                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" value="<?php echo $row['ID_PFIX']; ?>" name="idPanF">
                        <input type="submit" value="add to cart" name="addPFToCart">
                    </form>
                </div>

            <?php } ?>
        <?php } ?>
    
</body>
</html>