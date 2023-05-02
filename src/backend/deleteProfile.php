<?php
include "../database/connect.php";
$delete_id = $_GET['id'];
$sql = "UPDATE user SET state=0 WHERE account_id = '$delete_id'";
$result = mysqli_query($connection, $sql);
if ($result) {
    echo "<script>alert('User deleted successfully!');window.location.href='searchUser.php';</script>";
} else {
    echo "<script>alert('User deletion failed!');window.location.href='searchUser.php';</script>";
}
