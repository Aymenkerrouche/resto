<?php

include "conect_php.php";

  $plate = $_POST['searchplate'];


  $sql = "SELECT * FROM product WHERE P_name Like  '$plate%'  ";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $productg = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

  echo json_encode($productg);
?>