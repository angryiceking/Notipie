<?php
error_reporting(E_ALL);
@session_start();
include "../../../system/core/Db.php";

$db = new Db();
$conn = $db->connect();

$sql = "SELECT * FROM chats a, users b WHERE a.receiver_id = '".$_SESSION['id']."' AND a.sender_id = b.id AND a.status = 'unsent'";
$b = array();
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result))
{
	// $b['username'] = $row['username'];
	$b[] = $row;
}

echo json_encode($b);