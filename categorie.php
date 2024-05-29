<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php
  include 'include/nav.php';
  include 'include/connect.php';
  ?>
  <div class="container py-3">
    <h3>Listes des Categories</h3>
    <a class="btn btn-primary" href="ajouter_categorie.php" role="button">Ajouter Categorie</a>
    <table class="table table-striped tabel-hover">
      <?php
      $stmt = $con->prepare("SELECT * FROM `categorie`");
      $stmt->execute();
      $row = $stmt->rowCount();
      if($row > 0){
?>
        <thead>
          <tr>
            <th>id</th>
            <th>libelle</th>
            <th>description</th>
            <th>date de creation</th>
            <th>operation</th>
            <th>icon</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach($categories as $categorie){
?>
            <tr>
              <td><?= $categorie['id'] ?></td>
              <td><?= $categorie['libelle'] ?></td>
              <td><?= $categorie['description'] ?></td>
              <td><?= $categorie['date_creation'] ?></td>
              <td>
                <a href="modifier_categorie.php?id=<?php echo $categorie['id']?>" class="btn btn-success">modifier</a>
                <a href="supprimer_categorie.php?id=<?= $categorie['id'];?>" class="btn btn-danger">supprimer</a>
                
              </td>
              <td><i class="fa <?= $categorie['icon'] ?>"></i></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
<?php
?>
    </table>
    <?php
  }
  else{
    ?>
    <h1>There is no categorie</h1>
    <?php
  }
  ?>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>