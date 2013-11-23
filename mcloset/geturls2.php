<?php

/*
 *  * Following code will list all the products
 *   */


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
$tag = $_POST['tag'];
$name = $_POST['name'];
//echo $sql;
$result = mysql_query("SELECT mobilecloset.id,url,tag from mobilecloset left join tagsd on mobilecloset.id = tagsd.id where mobilecloset.id in (select id from categories where category ='$tag') and mobilecloset.name = '$name'");

//echo $rows;

$items = array();
//$items['result'] = array();
while ($row = mysql_fetch_array($result))
{
  $id = $row['id'];
  if (isset($items[$id])) $item = $items[$id];
  else
  {
    $item = array
      (
        'id' => $id,
        'url' => $row['url'],
        'tag' => array()
      );
  }
  $item['tag'][] = $row['tag'];
  $items[$id] = $item;
//  $items['result'][] = $item;
}
$response = array();
foreach($items as $test)
{
  array_push($response, $test);
  //echo json_encode($test);
}
  
echo json_encode($response);
?>



