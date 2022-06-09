<?php
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $order_text =  $_POST['order_text'] ;
  $u_name =  $_POST['u_name'] ;
  $total_price =  $_POST['total_price'] ;
  $branch_n =  $_POST['branch_n'] ;
  $method_pay =  $_POST['method_pay'] ;
  $location_u =  $_POST['location_u'] ;

    $stmt   = $con->prepare("INSERT INTO order_c(`order_text` , `u_name` , `total_price`,`branch_n` , `method_pay` , `location_u`) VALUES (? , ? , ? , ? , ? , ?)") ;
    $stmt->execute(array($order_text , $u_name , $total_price , $branch_n , $method_pay , $location_u)) ;
    $row = $stmt->rowcount() ;
    if ($row > 0) {
     
      echo json_encode(array('order_text' => $order_text ,'u_name' => $u_name ,'total_price' => $total_price,'branch_n' => $branch_n ,'method_pay' => $method_pay ,'location_u' => $location_u , 'status' => "success"));
    }
  
 
}

?>