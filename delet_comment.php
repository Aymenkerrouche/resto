<?php
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $comm = filter_var($_POST['ID_comment'] , FILTER_SANITIZE_STRING) ;


  $stmtcheck = $con->prepare("DELETE FROM `comments` WHERE `comments`.`ID_comment` = ?");
  $stmtcheck->execute(array($comm)) ;
  $stmtcheck = $con->prepare("SELECT * FROM comments WHERE ID_comment = ?");
  $stmtcheck->execute(array($comm)) ;
  $row = $stmtcheck->rowcount() ;
  if ($row > 0 ) {
    echo json_encode(array('status' => "Delete failed"));
  }else { 
    echo json_encode(array('status' => "success"));
  }
}

?>