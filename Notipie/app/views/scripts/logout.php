<?php
@session_start();

include "../../../system/core/Db.php";

$db = new Db();
$conn = $db->connect();
$sql = "UPDATE users SET status = 'offline' WHERE id = '".$_SESSION['id']."'";
$result = mysqli_query($conn,$sql);
echo "true";

@session_destroy();
?>