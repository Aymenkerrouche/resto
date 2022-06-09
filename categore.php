<?php

include "conect_php.php";

  $sql = "SELECT * FROM categore ";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $categore = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

  echo json_encode($categore);

?>