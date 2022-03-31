<?php
define("BDD","ajax");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost"); 

    $idProduit = $_GET['idPhoto'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "select path from images where pr_id = '$idProduit' ";
    $resultat = $bdd->query($requete);
    $photo = $resultat->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($photo);
?>