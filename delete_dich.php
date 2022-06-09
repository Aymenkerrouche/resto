<?php
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $dich_name = filter_var($_POST['P_name'] , FILTER_SANITIZE_STRING) ;


  $stmtcheck = $con->prepare("DELETE FROM `product` WHERE `product`.`P_name` = ?");
  $stmtcheck->execute(array($dich_name)) ;
  $stmtcheck = $con->prepare("SELECT * FROM Product WHERE P_name = ?");
  $stmtcheck->execute(array($dich_name)) ;
  $row = $stmtcheck->rowcount() ;
  if ($row > 0 ) {
    echo json_encode(array('status' => "Delete failed"));
  }else { 
    echo json_encode(array('status' => "success"));
  }
}

?>