<?php 
  include "mail.php";
  include "conect_php.php";

  //if ($_SERVER['REQUEST_METHOD'] == "POST"){
$u_email    = filter_var( $_POST['u_email'] , FILTER_SANITIZE_EMAIL) ;
// $_POST['u_email']

 $stmt = $con->prepare("SELECT * FROM user_c WHERE u_email=?");
  $stmt->execute(array($u_email));
  $comments = $stmt->fetch(PDO::FETCH_ASSOC) ;
  
   
   
  $mail->setFrom('farkhe88@gmail.com', 'star restorant');
  $mail->addAddress($u_email);
  $mail->Subject = 'WELCOME';
  $mail->Body    = json_encode('we wish that you have a great experinse\n your code is "147852369"');
  $mail->send();
    echo json_encode (array('status' => "success") );


//}
 ?>