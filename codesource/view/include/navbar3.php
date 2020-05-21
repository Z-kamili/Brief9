<nav>
        <a href="../html/home.php" class="logo"> </a>
        <input type="checkbox" id="checkboxNavbar">
        <label id="checkNavBtn" for="checkboxNavbar">
            <div class="menuIcon">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </label>
       

        <div id="topNav">
            <ul>
                <li class="categorie">
                    <input type="checkbox" id="checkboxCategorie">
                    <a href="#">
                        <label class="categorieTitle" for="checkboxCategorie">
                            <div class="categorieIcon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                            <p>Catégories</p> 
                        </label>
                    </a>
                    <?php  
                   echo  '<ul id="categorieDropdown">';    
                    require('fonction/table.php');
                    for($i=0;$i<count($array);$i++){
                    echo '
                    <form action="recherche.php" method="GET">
                    <input type="text" style="display:none" name="Nom_cat" value="'.$array[$i].'">
                    <li><button style="border: none;background-color: #ffffff;">'.str_replace("_"," ",$array[$i]).'</button></li>
                    </form>';
                    }

                      
                   echo '</ul>';
                   ?>
                </li>
                <li class="search">
                    <form action="recherche.php">
                        <input type="text" placeholder="Cherchez un produit ou une marque" name="search">
                        <button  type="submit"><img src=" codesource/view/icons/Icon-search.png"  ></button>
                    </form> 
                </li>
                <?php
                require('fonction/paner.php');
                echo 
                '<li class="panier"><button style="border: none;background-color: #ffffff;"><a href="codesource/view/html/panier.php">
                        <div class="panierIcon"></div>
                        <span><h5>('.count($list).')</h5></span>
                    </a> </button>
                </li>'
                ?>
                
                <li class="deconnexion">
                    <form action="" method="POST">
                    <input type="text" name="cc" style="display: none;" >
                    <button style="border: none;background-color: #ffffff;">
                        <a >
                        <div class="deconnexionIcon"></div>
                        <a href="codesource/view/html/deconnecter.php">Déconnexion</a>
                    </button>
                    </a></form> 
                </li>
                
            </ul>
        </div>;
      
        
    </nav>
