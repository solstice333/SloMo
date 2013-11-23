
<?php

require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

$url = $_GET['url'];
$cat = $_GET['cat'];
$tag = $_GET['tag'];
$result = mysql_query("INSERT INTO mobilecloset(name,url) VALUES('default','$url')");
$id = mysql_insert_id();
$result = mysql_query("INSERT INTO categories(id, category) VALUES('$id', '$cat')");
$result = mysql_query("INSERT INTO tagsd(id, tag) VALUES($id, '$tag')");

?>
