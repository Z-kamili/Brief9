<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/payment.css">
    <title>Document</title>
</head>
<body>
    
    <!-- include navbar -->
    <?php include '../include/navbar.php';?>

    <!-- <section>  -->
        <div class='container'>
            <div class='window'>
                <div class='order-info'>
                <div class='order-info-content'>
                    <h2>Order Summary</h2>
                    <div class='line'></div>
                    <div id="payment-logo">
                        <img  src="../imgs/logo.png" alt="">
                    </div>
                    <div class='total'>
                        <div class='line'></div>
                        <span style='float:left;'>
                            <!-- <div class='thin dense'>TVA 20%</div> -->
                            <!-- <div class='thin dense'>Delivery</div> -->
                            TOTAL
                        </span>
                        <span style='float:right; text-align:right;'>
                            <!-- <div class='thin dense'>$68.75</div> -->
                            <!-- <div class='thin dense'>$4.95</div> -->
                            $435.55
                        </span>
                    </div>
            </div>
            </div>
                <div class='credit-info'>
                <div class='credit-info-content'>
                    <table class='half-input-table'>
                    <tr><td>Veuillez sélectionner votre carte:</td><td>
                        <div class='dropdown' id='card-dropdown'>
                            <div class='dropdown-btn' id='current-card'>Visa</div>
                            <div class='dropdown-select'>
                                <ul>
                                <li>Master Card</li>
                                <!-- <li>American Express</li> -->
                                </ul>
                            </div>
                        </div>
                    </td></tr>
                    </table>
                    <img src='../imgs/visa_logo.png' height='80' class='credit-card-image' id='credit-card-image'></img>
                    Numéro de carte
                    <input class='input-field'></input>
                    Titulaire de la carte
                    <input class='input-field'></input>
                    <table class='half-input-table'>
                    <tr>
                        <td> Expire
                        <input class='input-field'></input>
                        </td>
                        <td>CVC
                        <input class='input-field'></input>
                        </td>
                    </tr>
                    </table>
                    <button class='pay-btn'>Payer</button>

                </div>

                </div>
            </div>
        </div>
    <!-- </section> -->
    
    <!-- include footer -->
    <?php include ('../include/footer.php');?>
    <script src="../js/payment.js"></script>
</body>
</html>