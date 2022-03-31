
<!DOCTYPE html>
<html lang="en">
<?php
include("class/panier.php");
include('accessBDD.php');
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <?php include("components/navBar.php") ?>

  <div class="row justify-content-center">
      <div class="col-sm-6" >
        <div class="shadow-lg p-3 mb-5 rounded">

          <h1> Recherche des Produits par Catégorie.</h1>
          Liste des Categories : <br />
          <?php
          $lesCategories = getLesCategories();
          // var_dump ($lesCategories) ;
          ?>
          <select class="form-control" class="text" id="listeCategorie" size="7">
            <?php
            session_start();
            foreach ($lesCategories as $categorie) {
              echo "<option value = '" . $categorie['ca_id'] . "'>" . $categorie['ca_libelle'] . "</option>";
            }
            ?>
          </select><br />

          <form method="post">
            Liste des produits : <br />
            <select class="form-control" id="listePdt" name='listePdt' size="7"><br />
            </select>
            <br>
            prix : <div id="idPrix"></div>
            <br>
            Photo(s) : <div id="idPhoto"></div>
            <br>
            Quantité <input class="form-control" type="number" name='n' required value="1">
            <br>
            <br>
            <a href="afficherPanier.php"><input type="button" class="btn btn-dark" value="Voir panier"></a>
            <input type="submit" class="btn btn-primary" value="Ajouter au panier">
            <a href="viderPanier.php"><input type="button" class="btn btn-outline-danger" value="Vider le panier"></a>
          </form>

       
        </div>
      </div>
    </div>
          
  <?php
  if (isset($_POST['n']) && isset($_POST['listePdt'])) {
    $idProduit = $_POST['listePdt'];
    $n = $_POST['n'];

    $panier = new Panier();
    $panier->ajouter($idProduit, $n);
  }
  ?>
</body>

</html>
<?php

?>
<script>
  let listeCategorie = document.getElementById("listeCategorie");
  listeCategorie.addEventListener("change", recupProduit);

  function recupProduit() {
    let idCategorie = listeCategorie.value;
    fetch("getProduitsParCategorie.php?idCateg=" + idCategorie)
      .then(response => response.json())
      .then(data => {
        let listePdt = document.getElementById("listePdt");
        listePdt.length = data.length;
        for (let i = 0; i < data.length; i++) {
          listePdt.options[i].text = data[i]["pr_libelle"];
          listePdt.options[i].value = data[i]["pr_id"];
        }
      })
      .catch(function(error) {
        console.log('Request failed', error);
      });
  }
  let listePdt = document.getElementById("listePdt");
  let n = document.getElementById('n');
  
  listePdt.addEventListener("change", removePhoto);
  listePdt.addEventListener("change", recupPrix);
  listePdt.addEventListener("change", recupPhoto);
  listePdt.addEventListener("click", recupVal);



  function recupVal() {

  }

  function recupPrix() {
    let idProduit = listePdt.value;
    fetch("getPrix.php?idProduit=" + idProduit)
      .then(response => response.json())
      .then(data => {
        let idPrix = document.getElementById("idPrix");
        idPrix.innerHTML = data['pr_prix'];
      })
      .catch(function(error) {
        console.log('Request failed', error);
      });
  }

  function recupPhoto() {
    let idPhoto = listePdt.value;
    fetch("getPhoto.php?idPhoto=" + idPhoto)
      .then(response => response.json())
      .then(data => {
        let idPhoto = document.getElementById('idPhoto');
        let cpt = 0
        while (data[cpt]) {
          cpt++;
        }
        for (let i = 0; i < cpt; i++) {
          let photo = new Image(100, 100);
          photo.src = 'image/' + data[i]['path'];
          photo.id = 'toto'
          idPhoto.appendChild(photo);
        }
      })
      .catch(function(error) {
        console.log('Request failed', error);
      });
  }

  function removePhoto() {
    let node = document.getElementById('idPhoto');
    while (node.hasChildNodes()) {
      node.removeChild(node.firstChild);
    }
  }
</script>