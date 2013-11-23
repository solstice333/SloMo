<?php

/*
 *  * Following code will list all the products
*/


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

$response = array();
$tag = $_POST['tag'];
$query = $_GET['query'];
// get all products from products table
$result = mysql_query($query);
// check for empty result
if (mysql_num_rows($result) > 0) {
  // looping through all results
  // products node
  // array for JSON response
  $response["result"] = array();
  while ($row = mysql_fetch_array($result)) {
    $product[]=$row;
  }
    array_push($response["result"], $product);
  // success
  $response["success"] = 1;

  // echoing JSON response
  echo json_encode($response);
} else {
  // no products found
  $response["success"] = 0;
  $response["message"] = "No products found";
  // echo no users JSON
  echo json_encode($response);
}

