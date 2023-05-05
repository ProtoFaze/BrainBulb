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
                /* https://css-tricks.com/almanac/properties/b/box-shadow/ */
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
    
    
            /* #reminders {
                font-size: 14px;
                margin-left: auto;
                color: #999;
            } */
    
            .question{
                /* margin-bottom: 15px; */
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
    
            .ask-Btn, .sort-Btn {
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
            }
    
            .functionButton{
                margin-left: 76%;
            }

            .tfunctionButton{
                margin-left: 80%;
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
                 <div class="functionButton">
                    <a class="askQueryBtn" href="PostQuery.php"><button class="ask-Btn">Ask Query</button></a>
                    <select class="sort-Btn">
                        <option value="mostComments">Most Comments</option>
                        <option value="oldestPost">Oldest Post</option>
                    </select>
                </div>
                HTML;

            } elseif (substr($user_id,0,2) == "TC" ){
                echo <<<HTML
                    <div class="tfunctionButton">  
                        <select class="sort-Btn">
                            <option value="mostComments">Most Comments</option>
                            <option value="oldestPost">Oldest Post</option>
                            <option value="latestPost">Latest Post</option>
                        </select>
                </div>
                HTML;
            }

            $sql_ShowQuery = "SELECT d.query_ID AS queryID, d.title AS topic, d.tags AS tagline, d.post_Query_Datetime AS qDateTime, s.sName AS name, u.profile_Picture AS pic, 
            (SELECT COUNT(*) FROM blogreplies WHERE query_ID = d.query_ID) AS totalQuery FROM discussion d INNER JOIN student s ON d.student_ID = s.student_ID INNER JOIN user u ON s.student_ID = u.student_ID ORDER BY d.post_Query_Datetime DESC";     
            $result_ShowQuery = mysqli_query($connection,$sql_ShowQuery);
    
            if(mysqli_num_rows($result_ShowQuery) > 0){
                while($row = mysqli_fetch_assoc($result_ShowQuery)){
                    echo <<<HTML
                    <div class="container">
                        <div class="discussion">
                            <div class="left">
                                <div class="img">
                                    <img src="../../images/anonymousUser.png">
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