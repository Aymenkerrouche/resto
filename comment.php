<?php

include "conect_php.php";

  $sql = "SELECT * FROM comments";
  $stmt = $con->prepare($sql);
  $stmt->execute();
  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC) ;

  echo json_encode($comments);
?>