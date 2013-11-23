<?php

/*
 *  * Following code will list all the products
 *   */

$response = array();

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
$result = mysql_query("SELECT category FROM categories group by category") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
   // looping through all results
   // products node
   // array for JSON response
   $response["tags"] = array();

   while ($row = mysql_fetch_array($result)) {
      // temp user array
      $product = array();
      $product["tags"] = $row["category"];

      // push single product into final response array
      array_push($response["tags"], $product);
   }
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
?>
