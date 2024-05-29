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
    <h3>Connexion</h3>
    <form action="" method="post">
      <?php
        if(isset($_POST['CONNEXION'])){
          $login = $_POST['login'];
          $pwd = $_POST['password'];
          if(!empty($login) && !empty($pwd)){
            $stmt = $con->prepare("SELECT * FROM `utilisateur` WHERE login = '$login' and password = '$pwd'");
            // $stmt->bindParam(':login', $login);
            // $stmt->bindParam(':pwd', $pwd);
            $stmt->execute();
            echo $stmt->rowCount();
            if($stmt->rowCount() > 0){
              // session_start();
              // echo  var_dump($stmt->fetch(PDO::FETCH_ASSOC));
              $_SESSION['utilisateur'] = $stmt->fetch(PDO::FETCH_ASSOC);
              // echo $_SESSION['utilisateur']['login'];
              header('location: admin.php');
              
            }
            else{
              ?>
              
              <div class="alert alert-success" role="alert">
            login or pwd correct
      </div>
      <?php
            }
            ?>
          
            
      <?php
          }
          else{
            ?>
            <div class="alert alert-danger" role="alert">
            login or pwd incorrect
      </div>
      <?php
          }
        }
      ?>
    <div class="mb-3">
      <label  >Login</label>
      <input type="text" name="login" >
      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
      <label  >Password</label>
      <input type="password" name="password" >
    </div>
    <button type="submit" name="CONNEXION" class="btn btn-primary">connexion</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>