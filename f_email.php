<?php 
  include "mail.php";
  include "conect_php.php";

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
$u_email    = filter_var( $_POST['u_email'] , FILTER_SANITIZE_EMAIL) ;
//$u_email = 'farkhe3@gmail.com'; // $_POST['u_email'] ;

 $stmt = $con->prepare("SELECT * FROM user_c WHERE u_email=?");
  $stmt->execute(array($u_email));
  $comments = $stmt->fetch(PDO::FETCH_ASSOC) ;
  $row = $stmt->rowcount()  ;
  //echo json_encode($comments['u_pw']);

//  $mail->setFrom('farkhe88@gmail.com', 'Admin');
//  $mail->addAddress('farkhe3@gmail.com');
//  $mail->Subject = 'hollo';

 // $mail->Body    = json_encode($comments['u_pw']);
 // $mail->send();

   if ($row > 0) {
  $mail->setFrom('farkhe88@gmail.com', 'Admin');
  $mail->addAddress($u_email);
  $mail->Subject = 'hollo';
  $mail->Body    = json_encode($comments['u_pw']);
  $mail->send();

}
   }else {
     echo json_encode (array('status' => "ther no email like this") );
 } 

}
 ?>