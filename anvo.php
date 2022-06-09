<?php

include "conect_php.php";

  $sql = "SELECT * FROM product";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $product = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

  echo json_encode($product);
?>