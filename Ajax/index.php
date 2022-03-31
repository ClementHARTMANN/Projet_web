<?php session_start();
    include('accessBDD.php');
?>
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <title> Identification </title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-sm-6" >
                <div class="shadow-lg p-3 mb-5 rounded">
                    <img src="image/MeubleDesign.PNG">
                    <h2> Identification pour l'accès au site </h2></br>
                    <form action="index.php" method="post">
                        Saisir votre adresse mail :<br />
                        <input  class="form-control" type="text" name="login" value="clement" size="50" /><br />
                        Saisir votre mot de passe :<br />
                        <input  class="form-control" type="password"  value="clement" name="mdp" size="30" /><br />
                        <br />
                        <input class="btn btn-primary" type="submit" value="Continuer" /><br><br>
                        <a href="connexionAdmin.php" class="btn btn-outline-dark">Connexion administrateur</a>
                    </form>
                </div>
            </div>
        </div>
   </div>  
    <?php
    
    if (isset($_POST['login']) && isset($_POST['mdp'])) {

        $login = $_POST['login'];
        //hachage du mot de passe
        $mdp = md5($_POST['mdp']);
        //verification si le revendeur est en bdd
        if (verif($login, $mdp)) {
            $_SESSION['idRevendeur'] = getIdRevendeur($login);
            header('Location:rechercheProduitCategorie.php');
        } else {
            echo 'mail ou mot de passe inconnu';
        }
    }
    ?>

</body>

</html>