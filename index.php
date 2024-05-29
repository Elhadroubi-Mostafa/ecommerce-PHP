<?php
$data = file_get_contents('php://input');
// if(isset($_POST['name'])  && isset($_POST['age'])){
//   echo $_POST['name'] . $_POST['age'];
// }
$d = (array) json_decode($data) ; //return an object  without using arrray
echo $d['name']. "<br>";
echo json_encode($d);
?>