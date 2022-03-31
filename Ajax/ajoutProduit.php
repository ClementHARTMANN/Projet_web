<?php 
include 'accessBDD.php';

	if(isset($_POST['ajouter'])){

		$idPdt = $_POST['idPdt']; 
		$libelle = $_POST['libelle']; 
		$prix = $_POST['prix']; 
		$idCateg = $_POST['idCateg']; 

		$insertPdt = ConnexionBDD()->prepare("INSERT INTO produit (pr_id,pr_libelle,pr_prix,pr_categorie) VALUES (?,?,?,?) "); 
		$insertPdt->execute(array($idPdt,$libelle,$prix,$idCateg)); 
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

					<h1 class="text-center">Ajouter un produit</h1><br>
					<form method="POST">

						<input class="form-control" type="number" name="idPdt" placeholder="ID produit">
						<input class="form-control" type="text" name="libelle" placeholder="Libelle">
						<input class="form-control" type="text" name="prix" placeholder="prix">
						<input class="form-control" type="number" name="idCateg" placeholder="ID Categorie"><br>

						<button name="ajouter" class="btn btn-primary">Ajouter</button>
						<a href="gestionProduit.php" class="btn btn-outline-secondary">Annuler</a>


					</form>
				</div>
			</div>
		</div>
</body>
</html>