<?php
include('accessBDD.php');

	if(isset($_POST['submitAdmin'])){
	    if(!empty($_POST['login']) AND !empty($_POST['mdp'])){

	        $login =  htmlspecialchars($_POST['login']); 
			$mdp = sha1($_POST['mdp']); 

			$reqVeriflogin = ConnexionBDD()->prepare("SELECT id_admin FROM administrateur WHERE mdp_admin = ? AND mail_admin = ?"); 
			$reqVeriflogin->execute(array($mdp, $login)); 
			$res = $reqVeriflogin->rowCount(); 

			if ($res == 1) {
				
				$info = $reqVeriflogin->fetch();
				$_SESSION['idAdmin'] = $info['id_admin']; 
				header("Location: gestionProduit.php");
			}
			else{
				 echo "Erreur";
			}
	    }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="container"><br>
		<div class="row justify-content-center">
			<div class="col-sm-6" >
				<div class="shadow-lg p-3 mb-5 rounded">
					<h1>Connexion Administrateur</h1><br>
					<form method="POST">
				        Mail :<br />
				        <input value="admin@admin.com" class="form-control" type="text" name="login" size="50" /><br />
				        Mot de passe :<br />
				        <input value="azertyuiop" class="form-control" type="password" name="mdp" size="30" /><br />
				        <br />
				        <input class="btn btn-primary" type="submit" value="Continuer" name="submitAdmin" /><br><br>
				        <a href="index.php" class="btn btn-outline-dark">Connexion Revendeur</a>
				    </form>
				</div>
			</div>
		</div>
	<div>

</body>
</html>