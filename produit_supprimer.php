<?php
  include 'include/connect.php';
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM `produit` WHERE id =:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('location: produit.php');
  }
?>