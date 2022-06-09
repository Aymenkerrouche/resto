<?php
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $username = filter_var($_POST['u_f_nom'] , FILTER_SANITIZE_STRING) ;
  $email    = filter_var($_POST['u_email'] , FILTER_SANITIZE_EMAIL);
  $password = $_POST['u_pw'] ;
  $u_nbr    =  $_POST['u_nbr'] ;


  $stmtcheck = $con->prepare("SELECT * FROM user_c WHERE u_nbr = ?");
  $stmtcheck->execute(array($u_nbr)) ;
  $row = $stmtcheck->rowcount() ;
  if ($row > 0 ) {
    echo json_encode(array('status' => "u_nbr already found"));
  }else { 
    $stmt   = $con->prepare("INSERT INTO `user_c` ( `u_f_nom`, `u_email`, `u_nbr`, `u_pw`) VALUES (?,?,?,?)") ;
    $stmt->execute(array($username , $email , $u_nbr, $password )) ;
    $row = $stmt->rowcount() ;
    if ($row > 0) {
      
      echo json_encode(array('u_f_nom' => $username ,'u_email' => $email ,'u_pw' => $password , 'u_nbr' => $u_nbr , 'status' => "success"));
    }
  }

}

?>
