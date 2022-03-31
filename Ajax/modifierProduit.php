<?php 
include 'accessBDD.php';
	
	$idPdt = $_GET['modifier']; 
	$reqInfoPDt = ConnexionBDD()->prepare("SELECT * FROM produit WHERE pr_id = ?"); 
	$reqInfoPDt->execute(array($idPdt)); 
	$info = $reqInfoPDt->fetch(); 


	if(isset($_POST['modifier'])){

		if(isset($_POST['libelle'])) {
			
			$newLib = $_POST['libelle'];
			$idP = $_GET['modifier'];
			$insertLib = ConnexionBDD()->prepare('UPDATE produit SET pr_libelle = ? WHERE pr_id = ?'); 
			$insertLib->execute(array($newLib,$idP)); 

		}

		if(isset($_POST['prix'])) {
			
			$newPrix = $_POST['prix'];
			$idP = $_GET['modifier'];
			$insertLib = ConnexionBDD()->prepare('UPDATE produit SET pr_prix = ? WHERE pr_id = ?'); 
			$insertLib->execute(array($newPrix,$idP)); 

		}

		if(isset($_POST['idCateg'])) {
			
			$newIdCat = $_POST['idCateg'];
			$idP = $_GET['modifier'];
			$insertLib = ConnexionBDD()->prepare('UPDATE produit SET pr_categorie = ? WHERE pr_id = ?'); 
			$insertLib->execute(array($newIdCat,$idP)); 

		}


		header("location: gestionProduit.php"); 


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
	<div class="row justify-content-center">
			<div class="col-sm-6" >
				<div class="shadow-lg p-3 mb-5 rounded">

					<h1 class="text-center">Modifier un produit</h1><br>
					<form method="POST">

						<label>ID</label>
						<input class="form-control" readonly type="number" name="idPdt" value="<?= $info['pr_id']; ?>">
						<label>Libelle</label>
						<input class="form-control" type="text" name="libelle" value="<?= $info['pr_libelle']; ?>">
						<label>Prix</label>
						<input class="form-control" type="text" name="prix" value="<?= $info['pr_prix']; ?>">
						<label>ID categorie</label>
						<input class="form-control" type="number" name="idCateg" value="<?= $info['pr_categorie']; ?>"><br>

						<button name="modifier" class="btn btn-primary">Enregistrer</button>
						<a href="gestionProduit.php" class="btn btn-outline-secondary">Annuler</a>


					</form>
				</div>
			</div>
		</div>


</body>
</html>