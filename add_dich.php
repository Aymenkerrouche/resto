<?php
include "conect_php.php";
if ($_SERVER['REQUEST_METHOD'] == "POST"){

  $dich_name = filter_var($_POST['P_name'] , FILTER_SANITIZE_STRING) ;
  $ID_ctg =  $_POST['ID_ctg'] ;
  $P_price =  $_POST['P_price'] ;
  $P_origine =  $_POST['P_origine'] ;
  $P_inf =  $_POST['P_inf'] ;
  $p_img =  $_POST['p_img'] ;
  $img_c =  base64_decode($_POST['code_img']) ;


  $stmtcheck = $con->prepare("SELECT * FROM Product WHERE P_name = ?");
  $stmtcheck->execute(array($dich_name)) ;
  $row = $stmtcheck->rowcount() ;
  if ($row > 0 ) {
    echo json_encode(array('status' => "Dich already found"));
  }else {
    $stmt   = $con->prepare("INSERT INTO Product(`P_name` , `ID_ctg` , `P_price` , `P_origine`, `P_inf`, `p_img`) VALUES (? , ? , ? , ? , ? , ?)") ;
    $stmt->execute(array($dich_name , $ID_ctg , $P_price , $P_origine, $P_inf, $p_img)) ;
    $row = $stmt->rowcount() ;
    if ($row > 0) {
     
      file_put_contents("upload\\" . $p_img, $img_c);

      echo json_encode(array('P_name' => $dich_name ,'ID_ctg' => $ID_ctg ,'P_price' => $P_price ,'P_inf' => $P_inf ,'p_img' => $p_img , 'P_origine' => $P_origine , 'status' => "success"));
    }
  }
}

?>