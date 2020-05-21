<?php
$host="127.0.0.1";
$user="user1";
$password="yes";
$database="shopping";
$connect = mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno()){
    die("cannot connect to database fieled :" .mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="codesource/view/style/home.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <title>Document</title>
</head>
<body>
    <!-- include navbar -->
    <?php require 'codesource/view/include/navbar3.php';?> <br><br>
    <?php require 'codesource/view/include/header.php';?>

<div id="content" class=" p-3 mb-5 bg-white rounded" >
   <?php 
   require('fonction/table.php');
   for($i=0;$i<count($array);$i++)
{
    $query="select * from produit where Nom_cat = '$array[$i]' ORDER BY ID_PRD DESC LIMIT 6; ";
    $result=mysqli_query($connect,$query);
    if(!$result){
        die("erreur in querysss");
    }
    echo 
    '<div id="produit" class="shadow-lg p-3 mb-5 bg-white rounded" >
    <form action="recherche.php" method="GET">
    <div id="com">
            <input type="text" style="display:none" name="Nom_cat" value="'.$array[$i].'">
            <p style="color:black;" id="catigorie">'.str_replace("_"," ",$array[$i]).'</p>
            <button style="border:none;background-color:#ffffff;">
            <a  href=""><p>VOIR PLUS  <img src="img\Icon.png" alt=""></p></a>
            </button>
        </div>
        </form>
        <div id="prd">';
            while($row=mysqli_fetch_assoc($result)){
                
            echo(
      ' <div id="prd1">
                     <div class="imgP" >
                           <img src="img/'.$array[$i].'/'.$row["IMAGE"].'" alt="">
                      </div>
                      <div class="con">
                          <p class="p1">'.$row["NOM"].'</p>
                      </div>
                      <form action="home.php"  method="POST">
                       <div class="prix">
                               <p id="p2" style="color:black;">'.$row["PRIX"].' DHs</p>
                               <input type="text" style="display:none;"  name="ID_PRD" value="'.$row["ID_PRD"].'" >
                               <button type="submit">
                                    <svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                                    </svg>
                                </button>
                           
                       </div>
                       </form>
            
        </div> ');
        } 
        echo       
        '</div>
    </div>';


}
?> 
 
</div>
    


</div>


<?php require 'codesource/view/include/footer2.php'; ?>












<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php
mysqli_close($connect);

?>