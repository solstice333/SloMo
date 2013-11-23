<?php
// array for JSON response
$response = array();
// check for required fields
$name = $_POST['name'];
$outfitName=$_POST['outfitName'];
$id = $_POST['id'];
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// mysql inserting a new row
//the author name-  name
//outfitname -outfitName
//clothing id as shown in  mob - id
$res = mysql_query("INSERT INTO outfitNames(outfitName,name) VALUES ('$outfitName','$name')");
// check if row inserted or not
//$oid =  mysql_query("SELECT oid FROM outfitNames where outfitName='$outfitName' and name='$name'");
$oid = mysql_insert_id();
echo $oid;
if($id!=0)
   $result = mysql_query("INSERT INTO outfits(oid,id) VALUES('$oid','$id')");

if ($result) {
   // successfully inserted into database
   $response["success"] = 1;
   $response["message"] = "Product successfully created.";
} else {
   // failed to insert row
   $response["success"] = 0;
   $response["message"] = "Oops! An error occurred.";
}
// echoing JSON response
echo json_encode($response);

?>
