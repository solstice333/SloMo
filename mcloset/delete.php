<?php

/*
 *  * Following code will delete a product from table
 *   * A product is identified by product id (pid)
 *    */

//array for JSON response
$response = array();

// check for required fields
if (isset($_POST['id'])) {
   $pid = $_POST['id'];

   // include db connect class
   require_once __DIR__ . '/db_connect.php';

   // connecting to db
   $db = new DB_CONNECT();

   // mysql update row with matched pid
   $result = mysql_query("DELETE FROM mobilecloset WHERE id = $pid");

   // check if row deleted or not
   if (mysql_affected_rows() > 0) {
      $result = mysql_query("DELETE FROM categories WHERE id = $pid");
      if (mysql_affected_rows() > 0) {
	 $result = mysql_query("DELETE FROM tagsd WHERE id = $pid");
	 if (mysql_affected_rows() > 0) {
	    $result = mysql_query("DELETE FROM outfits WHERE id = $pid");
	    //$result = mysql_query("select outfitNames.outfitName from outfitNames left join outfits on outfits.oid = outfitNames.oid group by outfits.oid having count(outfits.oid)=0");
	    //if($result)
	    //while ($row = mysql_fetch_array($result)) 
	    //{
	       //$outfitName= $row["outfitName"];
	       //mysql_query("delete from outfitNames where outfitName = '$outfitName'");
	    //}
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
      }else {
	 // no product found
	 $response["success"] = 0;
	 $response["message"] = "No product found";

	 // echo no users JSON
	 echo json_encode($response);
      }

   } else {
      // no product found
      $response["success"] = 0;
      $response["message"] = "No product found";

      // echo no users JSON
      echo json_encode($response);
   }


} else {
   // required field is missing
   $response["success"] = 0;
   $response["message"] = "Required field(s) is missing";

   // echoing JSON response
   echo json_encode($response);
}
?>
