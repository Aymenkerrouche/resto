<?php 
include "conect_php.php";
 if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $u_nbr   = filter_var( $_POST['u_nbr'] , FILTER_SANITIZE_EMAIL) ;
  $u_pw =  $_POST['u_pw'] ;
  
  
  $stmt = $con->prepare("SELECT * FROM user_c WHERE u_nbr = ? AND u_pw = ?") ;
  $stmt->execute(array($u_nbr , $u_pw));

  $user_c = $stmt->fetch() ;

   $row = $stmt->rowcount()  ;
   
   if ($row > 0) {
       $ID_user       = $user_c['ID_user'] ;
       $u_f_nom  = $user_c['u_f_nom'] ;
       $u_email     = $user_c['u_email'] ;
       $u_pw  = $user_c['u_pw'] ;
       $u_nbr  = $user_c['u_nbr'] ;
       echo json_encode(array('ID_user' => $ID_user , 'u_f_nom' => $u_f_nom ,'u_email' => $u_email ,'u_pw' => $u_pw , 'u_nbr' => $u_nbr , 'status' => "success"));
   }else {
     echo json_encode (array('status' => "faild" , 'u_email' => $u_email  , 'u_pw' => $u_pw) );
 } 
}
 ?>