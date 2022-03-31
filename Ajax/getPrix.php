<?php
define("BDD","ajax");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost"); 
    //$idProduit = 1;
    $idProduit = $_GET['idProduit'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $sql = "select pr_prix from produit where pr_id =:idProduit ";
    $req = $bdd->prepare($sql);
    $req->bindParam(':idProduit', $idProduit, PDO::PARAM_INT);
    $resultat = $req->execute();
    $prix = $req->fetch(PDO::FETCH_ASSOC);
    echo json_encode($prix);
?>
