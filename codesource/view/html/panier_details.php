<?php 

require '../../Database/database.php';

$db = Database::connect();

if(isset($_GET['id'])){
    $idPF = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM panier_fixe WHERE ID_PFIX = $idPF");
    $stmt->execute();
}

Database::disconnect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/panier.css">
    <link rel="stylesheet" href="../style/panier_details.css">
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <title>Document</title>
</head>
<body>


    <?php if($stmt->rowCount()){ ?>
            <?php while($row = $stmt->fetch()){ ?>

                <div class="flex_center_all">

                    <div class="container_fit padding_70 bg_mainBgColor flex_column_center margin_tb">
                        <p class="margin_tb price_size">Panier standard <?php echo $row['ID_PFIX']; ?> </p>
                        <p class="grey_text margin_tb"><i>(Date de creation : <?php echo $row['DATE_PANIER']; ?>)</i></p>
                        <img class="size_imgs_big margin_tb" src="../imgs/Icon material-shopping-cart.svg" alt="">
                        
                        <div>
                            <p class="margin_tb font_size_1 icon_margin_2">Liste des produits dans cette panier :</p>
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

                                                            <div class="margin_tb">
                                                                <div class="flex_between">

                                                                    <p><i class="fas fa-file-alt color_blue icon_margin_2"></i> Nom produit : <?php echo $rowP['NOM'] ?> </p>
                                                                    <p><i class="fas fa-dollar-sign color_blue icon_margin_2"></i> Prix : <?php echo $rowP['prix'] ?></p>
                                                                    <p><i class="fas fa-box-open color_blue icon_margin_2"></i> Quantité : <?php echo $row3['QTE'] ?></p>
                                                                
                                                                </div>
                                                            
                                                            </div>

                                                        <?php } ?>
                                                    <?php } ?>


                                            <?php } ?>
                                    <?php } ?>
                                    
                            <?php Database::disconnect(); ?>

                        </div>

                    </div>

                </div>

            <?php } ?>
        <?php } ?>

    


</body>
</html>