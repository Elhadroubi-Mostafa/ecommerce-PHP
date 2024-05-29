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
    <h3>Ajouter produit</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <?php
    if(isset($_POST['ajouter'])){
      $libelle = $_POST['libelle'];
      $prix = $_POST['prix'];
      $discount = $_POST['discount'];
      $categorie = $_POST['categorie'];
      $description = $_POST['description'];
      $date = date('Y/m/d');
      $fileName = "produit.jpg";
      // var_dump($_FILES);
      if(!empty($_FILES['image'])){
        $image = $_FILES['image']['name']; 
        $fileName = uniqid().$image;
        move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/'.$fileName);

        
        
        print_r($image);
      }
      
      if(!empty($libelle) && !empty($prix) && !empty($discount) && !empty($categorie)){
      // extract($_POST);
      echo $libelle . $prix . $discount . $categorie . $date;
      $stmt = $con->prepare("INSERT INTO `produit`(libelle, prix, discount, id_categorie, date_creation, description, image) VALUES(:libelle, :prix, :discount, :categorie, :date, :descr, :image)");
      $stmt->bindParam(':libelle', $libelle);
      $stmt->bindParam(':prix', $prix);
      $stmt->bindParam(':discount', $discount);
      $stmt->bindParam(':categorie', $categorie);
      $stmt->bindParam(':date', $date);
      $stmt->bindParam(':descr', $description);
      $stmt->bindParam(':image', $fileName);
      $stmt->execute();
      header('location: produit.php');

      
      }
      else{
         ?>
      <div class="alert alert-danger" role="alert">
        libelle et prix sont obligatoire!
      </div>
       <?php
      }
    }
     
      ?>
    <div class="mb-3">
      <label  >Lebelle</label>
      <input type="text" name="libelle" >
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label  >prix</label>
      <input type="number" name="prix"  min="0">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label  >discount</label>
      <input type="number" name="discount" min="0" max="100">
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label  >description</label>
      <textarea class="form-control" name="description" ></textarea>
    </div>
    <div class="mb-3">
      <label  >image</label>
      <input type="file" name="image">
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
    </select>
    <button type="submit" name="ajouter" class="btn btn-primary mt-3">ajouter produit</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>