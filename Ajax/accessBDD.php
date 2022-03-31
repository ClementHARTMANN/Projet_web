<?php
define("BDD","ajax");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost");

function ConnexionBDD(){

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=ajax;charset=utf8', 'root', ''); 
    return $bdd;

}

function getNumCommande()
{
    $num = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "SELECT MAX(num_commande) FROM commande";
    $resultat = $bdd->query($requete);
    $num = $resultat->fetch();
    return $num;
}

function verif($login, $mdp)
{
    $retour = false;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER) or die('Erreur connexion à la base de données');
    $sql = "SELECT * FROM revendeur WHERE mail = :login AND mdp = :mdp";
    $req = $bdd->prepare($sql);
    $req->bindParam(':login', $login, PDO::PARAM_STR);
    $req->bindParam(':mdp', $mdp, PDO::PARAM_STR);
    $resultat = $req->execute();
    $retour = $req->fetch();
    return $retour;
}

function insertCommande($idProduit, $quantite, $numCommande, $login)
{
    $article = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "INSERT INTO commande VALUES (null, CURRENT_DATE, '" . $idProduit . "', '" . $quantite . "', '" . $numCommande . "', '" . $login . "')";
    $resultat = $bdd->query($requete);
    return $requete;
}

function searchIdCommande()
{
    $article = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "SELECT max(num_commande) FROM commande";
    $resultat = $bdd->query($requete);
    $article = $resultat->fetch();
    return $article;
}

function getArticle($key)
{
    $article = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "SELECT pr_libelle FROM produit WHERE pr_id = '" . $key . "'";
    $resultat = $bdd->query($requete);
    $article = $resultat->fetch();
    return $article;
}
function getPrix($key)
{
    $article = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "SELECT pr_prix FROM produit WHERE pr_id = '" . $key . "'";
    $resultat = $bdd->query($requete);
    $article = $resultat->fetch();
    return $article;
}

function getLesCategories()
{
    $lesCategories = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "select * from categorie";
    $resultat = $bdd->query($requete);
    $lesCategories = $resultat->fetchAll();
    return $lesCategories;
}

function getIdRevendeur($login)
{
    $lesCategories = null;
    $bdd = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER)
        or die('Erreur connexion à la base de données');
    $requete = "SELECT revendeur.id_revendeur FROM revendeur WHERE revendeur.mail = '" . $login . "'";
    $resultat = $bdd->query($requete);
    $lesCategories = $resultat->fetch();
    return $lesCategories;
}
