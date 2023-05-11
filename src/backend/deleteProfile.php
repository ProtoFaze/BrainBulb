<?php
include "../database/connect.php";
//fetch Account ID
if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
}else{
$delete_id = $_GET['id'];}

//check for parent accounts from the account ID
$parentChecksql = "SELECT `parent_ID`,`user_Type` FROM user WHERE account_ID = $delete_id";
$parentCheckRequest = mysqli_query($connection, $parentChecksql);

//if parent account, delete all children accounts
if(mysqli_num_rows($parentCheckRequest)>0){
    $parentCheck = mysqli_fetch_assoc($parentCheckRequest);
    $parent_ID = $parentCheck['parent_ID'];
    if ($parentCheck['user_Type'] == "Parent"){
        $sql = "SELECT `student_ID`,`sName` FROM `student` WHERE `parent_ID` = '$parent_ID'";
        $request = mysqli_query($connection, $sql);
        if(mysqli_num_rows($request)>0){
            $name = "";
            while($Child = mysqli_fetch_assoc($request)){
                $student_ID = $Child['student_ID'];
                $sql = "UPDATE user SET state=0 WHERE student_ID = '$student_ID'";
                $result = mysqli_query($connection, $sql);
                $name = $name.$Child['sName']." ";
            }

            ///delete parent
            $sql = "UPDATE user SET state=0 WHERE account_ID = $delete_id";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                echo "<script>alert('User and $name deleted successfully!');window.location.href='../views/searchUser.php';</script>";
            } else {
                echo "<script>alert('User deletion failed!');window.location.href='../views/searchUser.php';</script>";
            }
        }
    }
    
}else{
    echo "<script>alert('Not a parent!');</script>";
    $sql = "UPDATE user SET state=0 WHERE account_id = $delete_id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "<script>alert('User deleted successfully!');window.location.href='../views/searchUser.php';</script>";
    } else {
        echo "<script>alert('User deletion failed!');window.location.href='../views/searchUser.php';</script>";
    }
    echo "<script>window.location.href='../views/searchUser.php';</script>";

}