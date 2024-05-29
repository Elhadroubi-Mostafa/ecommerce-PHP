<?php
// ob_start();
  include 'include/nav.php';
  include 'include/connect.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
  <div class="container py-3">
    <h3>Ajouter produit</h3>
      <?php
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $stmt = $con->prepare("SELECT produit.id, produit.libelle as a, produit.prix, produit.discount, categorie.id, produit.date_creation, produit.description, produit.image FROM `produit` INNER JOIN `categorie` ON produit.id_categorie = categorie.id and produit.id =:id");
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $produit = $stmt->fetch(PDO::FETCH_ASSOC);
      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
      <label  >Libelle</label>
      <input type="text" name="libelle" value="<?= $produit['a']?>">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label  >prix</label>
      <input type="number" name="prix"  min="0" value="<?= $produit['prix']?>">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label  >discount</label>
      <input type="number" name="discount" min="0" max="100" value="<?= $produit['discount']?>">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <div class="mb-3">
      <label  >description</label>
      <textarea class="form-control" name="description" ><?= $produit['description']?></textarea>
      </div>
      <div class="mb-3">
        <label  >image</label>
        <input type="file" name="image">
        <img class="img img-fluid w-150" src="upload/produit/<?= $produit['image']?>" alt="">
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
      </div>
      <?php
      $stmt = $con->prepare("SELECT * FROM `categorie`");
      $stmt->execute();
      $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
    <label  >categorie</label>
    <select name="categorie" id="" class="form-control">
      <option value="">choisir une categorie</option>
      <?php
      foreach($categories as $categorie){
?>
<option value="<?= $categorie['id'];?>"><?php echo $categorie['libelle']?></option>
<!-- <option value="">b</option>
<option value="">c</option> -->
<?php
}
?>
<?php
  if(isset($_POST['modifier'])){
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount = $_POST['discount'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];
    $date = date('Y/m/d');
    $fileName = 'produit.jpg';
    // var_dump($_POST) . die();
    if(!empty($_FILES['image'])){
      $image = $_FILES['image']['name'];
      $fileName = uniqid().$image;
      move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/'. $fileName);
    }
    // var_dump($fileName);
    // var_dump(empty($fileName)). die();
    // $stmt = $con->prepare("SELECT id_categorie FROM `produit` INNER JOIN `categorie` ON produit.id_categorie = categorie.id WHERE produit.id =:id");
    // $stmt->bindParam(':id', $id);
    // $stmt->execute();
    // $fetch = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($fetch);
    // $id_categorie = $fetch['id_categorie'];
    if(!empty($fileName)){
      $stmt = $con->prepare("UPDATE `produit` SET libelle =:libelle, prix = :prix, discount =:disc, id_categorie =:id_categorie, date_creation =:dates, description =:descr, image =:img where id =:id");
      $stmt->bindParam(':libelle', $libelle);
      $stmt->bindParam(':prix', $prix);
      $stmt->bindParam(':disc', $discount);
      $stmt->bindParam(':id_categorie', $categorie);
      $stmt->bindParam(':dates', $date);
      $stmt->bindParam(':descr', $description);
      $stmt->bindParam(':img', $fileName);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      header('location: produit.php');
    }
    else{
      $stmt = $con->prepare("UPDATE `produit` SET libelle =:libelle, prix = :prix, discount =:disc, id_categorie =:id_categorie, date_creation =:dates, description =:descr where id =:id");
      $stmt->bindParam(':libelle', $libelle);
      $stmt->bindParam(':prix', $prix);
      $stmt->bindParam(':disc', $discount);
      $stmt->bindParam(':id_categorie', $categorie);
      $stmt->bindParam(':dates', $date);
      $stmt->bindParam(':descr', $description);
      // $stmt->bindParam(':img', $fileName);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      header('location: produit.php');
    }
    // echo $libelle . " ". $prix . " " . $discount ." " . $categorie . " " . $date;
  }
  ?>
</select>
<button type="submit" name="modifier" class="btn btn-primary mt-3">modifier produit</button>
</form>
<?php
}
  ?>
  

  
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>
</html>