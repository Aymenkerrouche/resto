<?php

include "conect_php.php";

  $sql = "SELECT * FROM order_c";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $order_c = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

  echo json_encode($order_c);
?>