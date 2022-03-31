<?php
define("BDD","ajax");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost"); 
    $idCateg = 1;// récupération identifiant de la catégorie
    $idCateg =$_GET['idCateg'];
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
    or die('Erreur connexion à la base de données');
    $requete = "select * from produit where pr_categorie = '$idCateg' ";
    $resultat = $bdd->query($requete);
    $lesProduits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($lesProduits);
?>