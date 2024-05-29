<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php
  include 'include/nav.php';
  include 'include/connect.php';
  ?>
  <div class="container py-3">
    <h3>Listes des produits</h3>
    <a class="btn btn-primary" href="ajouter_produit.php" role="button">Ajouter Produit</a>
    <table class="table table-striped table-hover">
      <?php
      $stmt = $con->prepare("SELECT produit.id, produit.libelle as a, prix, discount, categorie.libelle, produit.date_creation, produit.image FROM `produit` INNER JOIN `categorie` ON produit.id_categorie = categorie.id ORDER BY id asc");
      $stmt->execute();
      $row = $stmt->rowCount();
      if($row > 0){
?>
        <thead>
          <tr>
            <th>id</th>
            <th>libelle</th>
            <th>prix</th>
            <th>discount</th>
            <th>categorie</th>
            <th>date de creation</th>
            <th>image</th>
            <th>operation</th>
          </tr>
        </thead>
        <?php
      }
      ?>

      <tbody>
        <?php
        $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($produits);
        foreach($produits as $produit){
?>
          <tr>
            <td><?= $produit['id']?></td>
            <td><?= $produit['a']?></td>
            <td><?= $produit['prix']?></td>
            <td><?= $produit['discount']?></td>
            <td><?= $produit['libelle']?></td>
            <td><?= $produit['date_creation']?></td>
            <td><img class="img-fluid" width="100px" src="upload/produit/<?= $produit['image']?>" alt=""></td>
            <td>
              <a href="produit_modifier.php?id=<?= $produit['id']?>" class="btn btn-success d-flex space-between" >modifier</a>
              <a href="produit_supprimer.php?id=<?= $produit['id']?>" class="btn btn-danger" value="">supprimer</a>
            </td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>