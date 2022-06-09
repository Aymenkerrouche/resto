<?php
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $comment =  $_POST['comment'] ;
  $u_name =  $_POST['u_name'] ;
  $id_user =  $_POST['id_user'] ;

    $stmt   = $con->prepare("INSERT INTO comments(`comment` , `u_name` , `id_user`) VALUES (? , ? , ?)") ;
    $stmt->execute(array($comment , $u_name , $id_user)) ;
    $row = $stmt->rowcount() ;
    if ($row > 0) {
     
      echo json_encode(array('comment' => $comment ,'u_name' => $u_name ,'id_user' => $id_user , 'status' => "success"));
    }
  
 
}

?>
