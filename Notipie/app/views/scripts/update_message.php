<?php
error_reporting(E_ALL);
@session_start();
include "../../../system/core/Db.php";

$db = new Db();
$conn = $db->connect();

$sql = "UPDATE chats SET status = '' WHERE id = '".$_POST['id']."'";
$b = array();
$result = mysqli_query($conn,$sql);
// while($row = mysqli_fetch_array($result))
// {
// 	// $b['username'] = $row['username'];
// 	$b[] = $row;
// }
// var_dump($result);
// echo json_encode($b);