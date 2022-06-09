<?php

include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
$br    = filter_var( $_POST['ID_b'] , FILTER_SANITIZE_EMAIL) ;
//$_POST['ID_b']
  $sql = "SELECT b_nom FROM brunch WHERE ID_b=?";
  $stmt = $con->prepare($sql);
  $stmt->execute(array($br));
  $brunch = $stmt->fetch(PDO::FETCH_ASSOC) ;

  echo json_encode($brunch['b_nom']);
}
?>