<?php 
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $P_price   = $_POST['P_price'] ;
  $name    = $_POST['P_name'] ;
  
  $stmt = $con->prepare("SELECT P_price FROM product WHERE P_name=?");
  $stmt->execute(array($name));
  $product = $stmt->fetch(PDO::FETCH_ASSOC) ;

  $stmt = $con->prepare("UPDATE product SET P_price=? WHERE P_name = ?");
  $stmt->execute(array($P_price , $name)) ;
  echo json_encode(array('P_price' => $P_price ,'status' => "success"));
}
 ?>