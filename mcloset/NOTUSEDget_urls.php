<?php

/*
 *  * Following code will list all the products
 *   */


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

   $response = array();
$tag = $_POST['tag'];
//$tag = 'hat';
// get all products from products table
$result = mysql_query("SELECT url FROM mobilecloset where id in (select id from categories where category ='$tag')");
// check for empty result
if (mysql_num_rows($result) > 0) {
   // looping through all results
   // products node
   // array for JSON response
   $response["urls"] = array();

   while ($row = mysql_fetch_array($result)) {
      // temp user array
      $product = array();
      $product["urls"] = $row["url"];

      // push single product into final response array
      array_push($response["urls"], $product);
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



