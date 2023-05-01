<?php
    session_start();
    $queryID = $_SESSION['queryID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion Platform</title>
    <link rel="stylesheet" href="../styles/design.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@40,500,0,0" />
    <style>
        body{
            background-color:#f2f5f7 ;
        }

        .titleBox >h1 {
            color:#f2f5f7 ;
        }

        h2,h4,.rules, .replyContainer {
            font-family: 'Open Sans', sans-serif;
            margin-top: 10px;
            margin-bottom: 0;
        }

        .container {
            max-width: max;
            margin-bottom: 1%;
            padding: 20px;
        }

        #dateTime {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            font-style: italic;
            color:#808080 ;
            padding: 0;
        }

        .discussion {
            display: flex;
            flex-direction: row;
            padding: 20px;
            width: 1500px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 1%;
            height: auto;
            background-color:#ffffff;
            border-radius: 4px;
            position: relative;
            /* https://css-tricks.com/almanac/properties/b/box-shadow/ */
            box-shadow: 0 8px 8px -4px rgb(202, 194, 194);
        }

        .left {
            flex-basis: 18%;
            text-align: center;
            margin-top: 1%;
            height:fit-content;
        }

        .left img {
            width: 100%;
            max-width: 110px;
            border-radius: 50%;
        }

        .right {
            flex-basis: 80%;
            margin-left: 20px;
            margin-top: 8px;
            height:fit-content;
        }

        .right h2 {
            font-size: 24px;
            margin-bottom: 10px;
            margin-top: 0px;
        }

        .tagsAndbuttons {
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .tagsAndbuttons button,span {
            background-color: #3a4b61;
            color: #f1f4f3;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            margin-right: 18px;
            margin-bottom: 20px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }


        #reminders {
            font-size: 14px;
            margin-left: auto;
            color: #999;
        }

        .question{
            margin-bottom: 15px;
        }

        .material-symbols-outlined {
            margin: 0;
            padding: 0;
            margin-right: 15px;
        }

        .textBesideIcon{
            margin-top: 1px;
        }

        .reply-Btn{
            background-color: #3a4b61;
            border: none;
            color: #f1f4f3;
            padding: 10px 20px;
            text-align: left;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            width: 41%;
            height: 40px;
            text-align: center;
        }

        .reply-Btn:hover{
            background-color: #2c3e50 ;
            width: 43%;
            height: 43px;
        }

        .functionButton{
            margin-left: 81%;
        }

        .ask-Btn{
            text-align: center;
        }

        .like-btn, .userRole-btn, .taglineBtn{
            display: flex;
            flex-direction: row;
            margin-bottom: 5%;
            margin-left: 13%;
            background-color: #3a4b61;
            color: #f1f4f3;
            padding: 10px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            height: 10px;
            width: 74%;
            padding-bottom: 12%;
        }

        .userRole-btn{
            cursor: context-menu;
            background-color: #800020;
        }

        .replyContainer{
            margin-left: 11%;
            font-size: 26px;
        }
        
        /* ReplyBlog CSS */
        .replyBlock {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f7f7f7;
            width: 1500px;
            height: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .replyBlock > h4 {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-left: 0%;
        }

        .replyBlock textarea {
            display: block;
            width: 100%;
            padding: 10px;
            font-family: 'Open Sans', sans-serif;
            font-size: 15px;
            margin-top: 1%;
            margin-bottom: 1%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .replyBlock button {
            display: inline-block;
            margin-right: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ccc;
            color: #000000;
            font-weight: bolder;
            cursor: pointer;
        }

        .replyBlock button:hover {
            background-color: #555;
            color: #fff;
        }
        
        .postAndCancel{
            display: flex;
            flex-direction: row;
            margin-left: 91%;
        }

        .taglineBtn{
            padding-left: 30px;
            padding-top: 13px;
            margin-top: 0;
            cursor: context-menu;
        }

        button > span {
            background-color: transparent;
        }
    </style>
    
</head>

<body>
    <?php
        include("../components/nav.php");
        include "../database/connect.php";
    ?>
    <div class="titlebox">
        <h1>QNA Discussion</h1>
    </div>
    <div class="functionButton">
        <button class="reply-Btn" id="replyButton">REPLY</button>
    </div>
    <div class="container">
        <div class="discussion">
                <div class="left">
                    <img src="../../images/anonymousUser.png">
                    <h4>Muhammad Tambi Alamaks Thuhan</h4>
                    <p id="dateTime">10th January 2023 13:49:32</p>
                    <button class="like-btn">
                        <span class="material-symbols-outlined">
                            favorite
                        </span>
                        <div class="textBesideIcon">
                            0 Likes
                        </div>
                    </button>
                    <button class="taglineBtn">
                        GROUP123455
                    </button>
                </div>
                <div class="right">
                    <div class="question">
                        <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nisi magni praesentium harum obcaecati reiciendis fugiat dolorum itaque dolore? Veritatis labore voluptatum perspiciatis nulla dolorem eaque id deserunt ab quos vero, doloribus corporis impedit provident sapiente non rem eius aliquid quasi! Laboriosam sint tempore rem, ratione voluptas repudiandae veniam unde.</h2>
                    </div>               
                </div>
        </div>
    </div>
    
    <div class="replyContainer">
        Replies
    </div>

    <div class="replyBlock" id="hideReply" style="display:none">
        <h4>RONG WEIWEI<h4>
        <form action="" method="post">
            <textarea name="questionInput" id="" cols="30" rows="8"></textarea>
            <div class="postAndCancel">
                <button id="cancelBtn">Cancel</button>
                <button name="postQuery">Post</button>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="discussion">
            <div class="left">
                <img src="../../images/anonymousUser.png">
                <h4>Muhammad Tambi Alamaks Thuhan</h4>
                <p id="dateTime">10th January 2023 13:49:32</p>
                <button class="userRole-btn">
                    <span class="material-symbols-outlined">
                        group
                    </span>
                    <div class="textBesideIcon">
                        Teacher Reply
                    </div>
                </button>
                <button class="like-btn">
                    <span class="material-symbols-outlined">
                        favorite
                    </span>
                    <div class="textBesideIcon">
                        0 Likes
                    </div>
                </button>
            </div>
            <div class="right">
                <div class="question">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nisi magni praesentium harum obcaecati reiciendis fugiat dolorum itaque dolore? Veritatis labore voluptatum perspiciatis nulla dolorem eaque id deserunt ab quos vero, doloribus corporis impedit provident sapiente non rem eius aliquid quasi! Laboriosam sint tempore rem, ratione voluptas repudiandae veniam unde.</h2>
                </div>
            </div>
        </div>
	</div>
</div>
    <script>
            const targetDiv = document.getElementById("hideReply");
            const btn = document.getElementById("replyButton");
            const cancel = document.getElementById("cancelBtn");
            btn.onclick = function () {
            if (targetDiv.style.display !== "none") {
                targetDiv.style.display = "none";
            } else {
                targetDiv.style.display = "block";
            }
            };
            cancel.onclick = function () {
            if (targetDiv.style.display == "block") {
                targetDiv.style.display = "none";
            } else {
                targetDiv.style.display = "none";
            }
            };  
    </script>

    <?php
    if(isset($_POST['postQuery'])){
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            $question = $_POST['questionInput'];
            $date = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `qna`(`user_id`, `question`, `date`) VALUES ('$user_id','$question','$date')";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Question Posted!')</script>";
                echo "<script>window.location.href='qna.php'</script>";
            }else{
                echo "<script>alert('Question Failed to Post!')</script>";
                echo "<script>window.location.href='qna.php'</script>";
            }
        }else{
            echo "<script>alert('No ID here')</script>";
            echo "<script>window.location.href='qna.php'</script>";
    }
}
        
    ?>
</body>
</html>