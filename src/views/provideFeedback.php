<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provide Feedback</title>
    <link rel="stylesheet" href="../styles/design.css">
    <style>
    body{
        background-color:#f2f5f7 ;
    }

    .form, .subTitle {
    max-width: 1300px;
    margin: auto;
    }

    .form-group {
    margin-bottom: 45px;
    }

    label {
    display: block;
    margin-bottom: 14px;
    font-weight: bold;
    font-size: 18px;
    }

    input[type="text"], textarea {
    display: block;
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-family: 'Open Sans', sans-serif;
    letter-spacing: 1px;
    }

    textarea{
        height: 300px;
    }

    button {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    background-color: #3a4b61;
    color: #fff;
    font-weight: bold;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
    transform: scale(1.05);
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    .form-group:last-child {
    text-align: right;
    margin-bottom: 0;
    }

    .form {
    background-color: #f5f5f5;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0px 3px 20px rgba(0, 0, 0, 0.2);
    }

    label {
        font-family: 'Open Sans', sans-serif;
    }

    textarea {
    border: 2px solid #ccc;
    transition: all 0.2s ease-in-out;
    }
    .subTitle {
    font-family: 'Open Sans', sans-serif;
    font-style: italic;
    font-size: 20px;
    }



    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
        include "../database/connect.php";
    ?>
    <div class="titlebox">
        <h1>Feedback Collection</h1>
    </div>
    <div class="subTitle">
        <h2>Please give us some feedback</h2>
    </div>
    <div class="form">
        <form action="#" method="post">
        <div class="form-group">
            <label>As part of our ongoing efforts to improve our website, we would like to invite you to share your feedback with us. Your input is important to us and will help us to understand how we can make our website better for you.</label>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="content" name="feedbacks" placeholder="Further describe your question" autocomplete="off" required></textarea>
        </div>
        <div class="form-group">    
            <button><a href="mainpage.php" class="" style="text-decoration:none; color:#fff;">Cancel</a></button>
            <button class="btn btn-primary btn" id="submit-btn" name="postFeedback">Post</button>
        </div>
        </form>
    </div>
    
    <?php
        if(isset($_POST['postFeedback'])){
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $userID = $_SESSION['user_id'];
            $feedback = $_POST['feedbacks'];      
            $feedback_date = date('Y-m-d H:i:s');

            if(substr($_SESSION['user_id'],0,2) == "PT"){
                $sql_parentFindID = "SELECT `account_ID` FROM `user` WHERE `parent_ID` = '$userID'";
                $result_parentFindID = mysqli_query($connection, $sql_parentFindID);
                $row_parentFindID = mysqli_fetch_assoc($result_parentFindID);
                $parentAccountID = $row_parentFindID['account_ID'];
                $sql_insertFeedback = "INSERT INTO `feedback`( `account_ID`, `feedback_Content`, `feedback_Post_Datetime`) VALUES ('$parentAccountID','$feedback','$feedback_date')";
                $result_insertFeedback = mysqli_query($connection, $sql_insertFeedback);
                
            }elseif(substr($_SESSION['user_id'],0,2) == "TC"){
                $sql_teacherFindID = "SELECT `account_ID` FROM `user` WHERE `teacher_ID` = '$userID'";
                $result_teacherFindID = mysqli_query($connection, $sql_teacherFindID);
                $row_teacherFindID = mysqli_fetch_assoc($result_teacherFindID);
                $teacherAccountID = $row_teacherFindID['account_ID'];
                $sql_insertFeedback = "INSERT INTO `feedback`( `account_ID`, `feedback_Content`, `feedback_Post_Datetime`) VALUES ('$teacherAccountID','$feedback','$feedback_date')";
                $result_insertFeedback = mysqli_query($connection, $sql_insertFeedback);
            }


            if($result_insertFeedback){
                echo "<script>alert('Your feedback has been posted!'); window.location.href='mainpage.php';</script>";
            } else {
                echo "<script>alert('Failed to post your feedback!'); window.location.href='PostFeedback.php';</script>";
            }
            
            }
    ?>
</body>
</html>