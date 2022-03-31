<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<?php
include('class/panier.php');
session_start();
include('accessBDD.php');
?>

<body>
    <?php include("components/navBar.php") ?>
 
    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-sm-6" >
                <div class="shadow-lg p-3 mb-5 rounded"> 

                <h1 class="font-title mt-5 mb-5 text-center " style="text-decoration: underline;">Panier :</h1>
                
                <table class="table">
                    
                    <tr>
                        <td>Produit</td>
                        <td>Quantité</td>   
                        <td>Prix</td>
                    </tr>


                <?php
                if (isset($_SESSION['panier']) && empty($_SESSION['panier']) == FALSE) {
                    $panier = $_SESSION['panier'];
                    $prixTotal = 0;
                    foreach ($panier as $key => $produit) {
                        $article = getArticle($key)[0];
                        $prix = getPrix($key)[0];


                        echo "<tr>

                                <td>".$article."</td>";
                        

                        echo    "<td>".$produit."</td>";
                        echo "<td>".$prix."</td>

                        <tr>";

             
                        $prixTotal += $prix * $produit;
                    }
                    echo "<tr><td>Prix total : ", $prixTotal."<td></tr>";
                } else {
                    echo "panier vide";
                }
                ?>
                </table>

                <br>
                <br>
                <a href="commander.php"><input type="button" class="btn btn-primary" value="Commander"></a>
                <a href="viderPanier.php"><input type="button" class="btn btn-outline-danger" value="Vider le panier"></a>
                </div>
            </div>
       </div>
   </div>

</body>

</html>