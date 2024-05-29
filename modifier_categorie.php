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
    <h3>Ajouter categorie</h3>
    <form action="" method="post">
      <?php
      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $stmt = $con->prepare("SELECT * FROM `categorie` WHERE id = $id");
        $stmt->execute();
        $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="mb-3">
          <label  >Lebelle</label>
          <input type="text" name="libelle" value="<?= $categorie['libelle']?>">
          <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <div class="mb-3">
          <label  >description</label>
          <textarea class="form-control" name="description" ><?= $categorie['description']?></textarea>
          </div>
          <div class="mb-3">
            <label  >icon</label>
            <input type="text" name="icon" value="<?= $categorie['icon']?>">
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
          </div>
          <button type="submit" name="modifier" class="btn btn-primary">modifier categorie</button>
          </form>
          <?php
        }
        ?>
  </div>
  <?php
  if(isset($_POST['modifier'])){
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $icon = $_POST['icon'];
    if(!empty($libelle) && !empty($description) && !empty($icon)){
      $stmt2 = $con->prepare("UPDATE `categorie` SET libelle =:libelle, description =:descr, icon =:icon WHERE id =:id");
      $stmt2->bindParam(':libelle', $libelle);
      $stmt2->bindParam(':descr', $description);
      $stmt2->bindParam(':icon', $icon);
      $stmt2->bindParam(':id', $id);
      $stmt2->execute();
      header('location: categorie.php');
    }
    else{
      ?>
      <div class="alert alert-danger" role="alert">
            all input shoud be full
      </div>
      <?php
    }
  }
  ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>