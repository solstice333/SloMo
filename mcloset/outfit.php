<?php

/*
 *  * Following code will list all the products
 *   */


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();
$name = $_POST['name'];
//echo $sql;
$result = mysql_query("select outfitNames.oid,outfitNames.outfitName,outfits.id,mobilecloset.url,tagsd.tag from outfitNames left join outfits on outfits.oid = outfitNames.oid left join mobilecloset on outfits.id = mobilecloset.id left join tagsd on tagsd.id = mobilecloset.id where outfitNames.name= '$name'"); 

//echo $rows;

$of = array();
//$items['result'] = array();
while ($row = mysql_fetch_array($result))
{
//  echo json_encode($row);
  $ofn = $row['outfitName'];
  $id = $row['id'];
  if (isset($of[$ofn])) $outfit = $of[$ofn];
  else
  {
    $outfit = array
      (
        'outfitName' => $ofn,
        'oid' => $row['oid'],
        'clothingtemp' => array(),
        'clothing' => array()
      );
  }
  $items = $outfit['clothingtemp'];
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
  $outfit['clothingtemp']=$items;
  $of[$ofn]=$outfit;
//  $items['result'][] = $item;
}
//echo json_encode($of);
$response = array();
foreach($of as $test2)
{
  $inner = $test2['clothingtemp'];
  foreach($inner as $test3)
  {
    array_push($test2['clothing'], $test3);
  }
  unset($test2['clothingtemp']);
  array_push($response, $test2);
  //echo json_encode($test);
}
  
echo json_encode($response);
?>

