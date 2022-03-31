<?php 
session_start(); 
include 'accessBDD.php';

	$reqAllPDt = ConnexionBDD()->query("SELECT * FROM produit"); 

	if(isset($_GET['supprimer'])){

		if(!empty($_GET['supprimer'])){

			$idPdt = $_GET['supprimer']; 
			$reqSupp = ConnexionBDD()->prepare("DELETE FROM produit WHERE  pr_id = ?");  
			$reqSupp->execute(array($idPdt)); 
			header("Location: gestionProduit.php"); 
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

					<a href="ajoutProduit.php" class="btn btn-primary">Ajouter un produit</a><br><br>
					<a href="connexionAdmin.php" class="btn btn-outline-danger">Deconnexion</a><br><br>

					<table class="table">
						<tr>
							<td>#</td>
							<td>Libelle</td>
							<td>Prix</td>
							<td>Catégorie</td>
							<td>Modifier</td>
							<td>Supprimer</td>

						</tr>
							
						<?php 
							while ($produit = $reqAllPDt->fetch()) {
						?>
						<tr>

							<td><?= $produit['pr_id'] ?></td>
							<td><?= $produit['pr_libelle'] ?></td>				
							<td><?= $produit['pr_prix'] ?> €</td>
							<td><?= $produit['pr_categorie'] ?></td>
							<td><a class="btn btn-outline-warning" href="modifierProduit.php?modifier=<?= $produit['pr_id'] ?>">Modifier</a></td>
							<td><a class="btn btn-outline-danger" href="gestionProduit.php?supprimer=<?= $produit['pr_id'] ?>">supprimer</a></td>

						<?php
							}
						?>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>


</body>
</html>