<?php

$response = array();

// check for required fields
if (isset($_POST['oid'])) {
   $oid = $_POST['oid'];
   $id=$_POST['id'];
   // include db connect class
   require_once __DIR__ . '/db_connect.php';

   // connecting to db
   $db = new DB_CONNECT();
  
   // mysql update row with matched pid
   //$result = mysql_query("DELETE FROM outfitNames WHERE oid = $oid");
   $result = mysql_query("DELETE FROM outfits WHERE oid = $oid and id=$id");
   if (mysql_affected_rows() > 0) {
      // successfully updated
      $response["success"] = 1;
      $response["message"] = "Product successfully deleted";
      echo json_encode($response);
   }
   else {
      // no product found
      $response["success"] = 0;
      $response["message"] = "No product found";
      // echo no users JSON
      echo json_encode($response);
   }
} 
?>
