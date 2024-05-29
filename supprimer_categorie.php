<?php
include 'include/connect.php';
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $stmt = $con->prepare("DELETE FROM `categorie` WHERE id =:id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  header('location: categorie.php');
}
?>