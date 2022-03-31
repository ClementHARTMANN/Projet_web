<?php
session_start();

include('class/panier.php');
include('accessBDD.php');

if (isset($_SESSION['panier'])) {

    $numero = 0;
    for ($i=0; $i < 3 ; $i++) { 
        
        $numero  .= mt_rand(10, 99); 
            
    }
    var_dump($numero);

    $numCommande = $numero;
    $panier = $_SESSION['panier'];

    // ajout dans la table commande avec dans l'ordre son nom, son numéro, le numéro de commande et numéro du revendeur
    foreach ($panier as $key => $produit) {
        insertCommande($key, $produit, $numCommande, $_SESSION['idRevendeur'][0]);
    }
}

header("location: rechercheProduitCategorie.php");
