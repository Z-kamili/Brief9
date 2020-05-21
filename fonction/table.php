
<?php
    $query="select * from produit ";
    $result=mysqli_query($connect,$query);
    if(! $result){
        die("erreur in query");
    }
    $i=0;
    $array=[];
    while($row=mysqli_fetch_assoc($result)) {
        if(in_array($row["Nom_cat"],$array) ){
        }
        else  {$array[$i]=$row["Nom_cat"];
        $i++;
    }

    }
 ?>
 