<?php
    session_start();
    $user_id = $_SESSION['user_id'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Discussion Platform</title>
        <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
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
    
            h2,h4,.rules {
                font-family: 'Open Sans', sans-serif;
                margin-top: 10px;
                margin-bottom: 0;
            }
    
            .container {
                max-width: max;
                margin: 0 auto;
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
                padding: 20px;
                max-width: 1500px;
                margin-left: auto;
                margin-right: auto;
                background-color:#ffffff;
                border-radius: 4px;
                position: relative;
                box-shadow: 0 8px 8px -4px rgb(202, 194, 194);
            }
    
            .left {
                display: flex;
                flex-direction: row;
            }
    
            .left img ,.img{
                width: 50px;
                height: 50px;
                background-color: #3a4b61;
            }
    
            .left div {
                margin: 8px;
            }
    
            
    
            .right h2 {
                font-size: 24px;
                margin-bottom: 60px;
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
    
            .question{
                margin: 25px;
                letter-spacing: 1px;
            }
    
            .material-symbols-outlined {
                margin: 0;
                padding: 0;
                margin-right: 15px;
            }
    
            .tagsAndbuttons{
                display: flex;
                flex-direction: row;
            }
    
            .textBesideIcon{
                margin-top: 1.5px;
            }
    
            .ask-Btn,
            .sort-Btn,
            .filter-btn,
            .filter-btn2 {
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
                margin-right: 10px; /* Adjust the margin to create spacing between the buttons */
            }


            .filter-btn {
                display: flex;
                flex-direction: row;
                margin-left: 0; /* Adjusted to remove the negative margin */
                margin-right: 10px; /* Adjusted to create spacing between the buttons */
                background-color: #455d7c;
            }

            .filter-btn2 {
                display: flex;
                flex-direction: row;
                margin-top: -46px;
                margin-left: 0; /* Adjusted to remove the negative margin */
                background-color: #455d7c;
            }
                
            .functionButton {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: flex-start; /* Adjusted to align the buttons to the left */
                margin-left: 70%;
            }

            .functionButton2 {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: flex-start; /* Adjusted to align the buttons to the left */
                margin-left: 76%;
            }
            .sort-Btn {
                margin-right: 10px; /* Adjusted the margin to create spacing between the buttons */
            }

            .tfunctionButton {
                display: flex;
                flex-direction: row;
                align-items: center; /* Add this line to vertically align the buttons */
                justify-content: flex-end; /* Add this line to align the buttons to the right */
                margin-top: 44px;
            }

            .tfunctionButton2 {
                display: flex;
                flex-direction: row;
                align-items: center; /* Add this line to vertically align the buttons */
                justify-content: flex-end; /* Add this line to align the buttons to the right */
                margin-top: 0;
            }

    
            .ask-Btn{
                text-align: center;
            }
    
            .tagsAndbuttons>span{
                cursor: context-menu;
            }

            #replybtn{
                cursor: pointer;
            }

            #sNameATime{
                padding-top: 5px;
            }

            .TopicWithLink{
            color: black;
            font-weight: bold;
            text-decoration: none; /* no underline */
            cursor: pointer;
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

        <?php
            if (substr($user_id,0,2) == "ST") {
                echo <<<HTML
                
                <form action="" method="post">
                 <div class="functionButton">
                    <a class="askQueryBtn" href="PostQuery.php"><div class="ask-Btn">Ask Query</div></a>
                    <select class="sort-Btn" name="sort_option">
                        <option value="mostComments">Most Comments</option>
                        <option value="oldestPost">Oldest Post</option>
                        <option value="LatestPost">Latest Post</option>
                    </select>
                    <div class="tfunctionButton">  
                        <button name="Filter" class="filter-btn2">Filter</button>
                    </div>
                </div>
                </form>
                HTML;

            } elseif (substr($user_id,0,2) == "TC" ){
                echo <<<HTML
                <form action="" method="post">
                    <div class="functionButton2">  
                        <select class="sort-Btn" name="sort_option">
                            <option value="mostComments">Most Comments</option>
                            <option value="oldestPost">Oldest Post</option>
                            <option value="LatestPost">Latest Post</option>
                        </select>
                        <div class="tfunctionButton2">  
                        <button name="Filter" class="filter-btn">Filter</button>
                        </div>
                    </div>
                    
                </form>
                HTML;
            }

            $sql_ShowQuery = "SELECT d.query_ID AS queryID, d.title AS topic, d.tags AS tagline, d.post_Query_Datetime AS qDateTime, s.sName AS name, u.profile_Picture AS pic, 
            (SELECT COUNT(*) FROM blogreplies WHERE query_ID = d.query_ID) AS totalQuery FROM discussion d INNER JOIN student s ON d.student_ID = s.student_ID INNER JOIN user u ON s.student_ID = u.student_ID ORDER BY d.post_Query_Datetime DESC";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $selected_option = $_POST['sort_option'];
                if ($selected_option == 'mostComments') {
                    $sql_ShowQuery = "SELECT d.query_ID AS queryID, d.title AS topic, d.tags AS tagline, d.post_Query_Datetime AS qDateTime, s.sName AS name, u.profile_Picture AS pic, 
                    (SELECT COUNT(*) FROM blogreplies WHERE query_ID = d.query_ID) AS totalQuery FROM discussion d INNER JOIN student s ON d.student_ID = s.student_ID INNER JOIN user u ON s.student_ID = u.student_ID ORDER BY totalQuery DESC;";
                } elseif ($selected_option == 'oldestPost') {
                    $sql_ShowQuery = "SELECT d.query_ID AS queryID, d.title AS topic, d.tags AS tagline, d.post_Query_Datetime AS qDateTime, s.sName AS name, u.profile_Picture AS pic, 
                    (SELECT COUNT(*) FROM blogreplies WHERE query_ID = d.query_ID) AS totalQuery FROM discussion d INNER JOIN student s ON d.student_ID = s.student_ID INNER JOIN user u ON s.student_ID = u.student_ID ORDER BY d.post_Query_Datetime ASC";
                }elseif ($selected_option == 'LatestPost') {
                    "SELECT d.query_ID AS queryID, d.title AS topic, d.tags AS tagline, d.post_Query_Datetime AS qDateTime, s.sName AS name, u.profile_Picture AS pic, 
                    (SELECT COUNT(*) FROM blogreplies WHERE query_ID = d.query_ID) AS totalQuery FROM discussion d INNER JOIN student s ON d.student_ID = s.student_ID INNER JOIN user u ON s.student_ID = u.student_ID ORDER BY d.post_Query_Datetime DESC";}
            }

            $result_ShowQuery = mysqli_query($connection,$sql_ShowQuery);
    
            if(mysqli_num_rows($result_ShowQuery) > 0){
                while($row = mysqli_fetch_assoc($result_ShowQuery)){
                    echo <<<HTML
                    <div class="container">
                        <div class="discussion">
                            <div class="left">
                                <div class="img">
                    HTML;
                    if(empty($row['pic']) || $row['pic'] == NULL) {
                        echo "<img class='elipse_container' src='../../images/anonymousUser.png' alt='teacher picture'>";
                    } else {
                        echo "<img class='elipse_container' src='../../images/". $row["pic"]. "' alt='teacher picture'>";
                    }
                    echo <<<HTML
                                </div>
                                <div id="sNameATime"><h4>{$row["name"]}</h4></div>
                                <div id="sNameATime"><p id="dateTime">{$row["qDateTime"]}</p></div>
                            </div>
                            <div class="right">
                                <div class="question">
                                    <a onclick="window.location.href='./viewSelectedQueries.php?queryID={$row['queryID']}'" class="TopicWithLink"><h2>{$row["topic"]}</h2></a>
                                </div>
                            </div>
                            <div class="tagsAndbuttons">
                                <span>{$row["tagline"]}</span>
                                <button id="replybtn" onclick="window.location.href='./viewSelectedQueries.php?queryID={$row['queryID']}'">
                                    <span class="material-symbols-outlined">
                                        chat
                                    </span>
                                    <div class="textBesideIcon">
                                        {$row["totalQuery"]} Replies
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                    HTML;
                }
            }
            else{
                echo "No data";
            }
            ?>
        
        
    </body>
    </html>