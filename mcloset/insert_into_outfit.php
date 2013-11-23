<?php
// array for JSON response
$response = array();
// check for required fields
$oid = $_POST['oid'];
$id = $_POST['id'];
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();


// mysql inserting a new row

$result = mysql_query("INSERT INTO outfits(oid, id) VALUES('$oid', '$id')");

// check if row inserted or not
if ($result) {
  // successfully inserted into database
  $response["success"] = 1;
  $response["message"] = "Product successfully created.";

  // echoing JSON response
  echo json_encode($response);
} else {
  // failed to insert row
  $response["success"] = 0;
  $response["message"] = "Oops! An error occurred.";

  // echoing JSON response
  echo json_encode($response);
}
?>
