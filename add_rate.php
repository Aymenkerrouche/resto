<?php 
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $rate    = $_POST['P_rate'] ;
  $name    = $_POST['P_name'] ;
  
  $stmt = $con->prepare("SELECT P_rate,n_rate FROM product WHERE P_name=?");
  $stmt->execute(array($name));
  $product = $stmt->fetch(PDO::FETCH_ASSOC) ;

  
  $r=(floatval($rate)+$product['P_rate']*$product['n_rate'])/($product['n_rate']+1);
  $s=$product['n_rate']+1;

  $stmt = $con->prepare("UPDATE product SET P_rate=? , n_rate = ? WHERE P_name = ?");
  $stmt->execute(array($r , $s , $name)) ;
}
 ?>