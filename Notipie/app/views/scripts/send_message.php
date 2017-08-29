<?php
error_reporting(E_ALL);
@session_start();
include "../../../system/core/Db.php";

$db = new Db();
$conn = $db->connect();

$sql = "INSERT INTO chats (receiver_id, sender_id, message, date_time, status) VALUES (".$_POST['id'].", ".$_SESSION['id'].",'".$_POST['message']."','".date('Y-m-d h:i:s')."', 'unsent')";

$result = mysqli_query($conn,$sql);

// echo $sql;
// var_dump($result);