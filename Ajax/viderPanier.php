<?php
    include("class/panier.php");
    session_start();
    $panier = new Panier();
    $panier->vider();
    header("location: rechercheProduitCategorie.php");
