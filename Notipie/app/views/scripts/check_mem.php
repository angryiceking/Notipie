<?php
@session_start();
include "../../../system/core/Db.php";

$db = new Db();
$conn = $db->connect();

$sql = "SELECT * FROM users WHERE username = '".$_REQUEST['user']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if ($row != null) {
	
	$_SESSION['login'] = true;
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];

	$sql = "UPDATE users SET status = 'online' WHERE username = '".$_REQUEST['user']."'";
	$result = mysqli_query($conn,$sql);
	echo "true";
}
else {
	echo "null";
}
?>