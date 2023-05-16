
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Analytics</title>
    <?php 
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include("../components/nav.php"); 
        $quizname = $_GET['quizname'];
    ?>
    <style>
        body {
            background-image: url(../../images/night.png);
            color: white;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        #viewAnalytic {
            margin: auto;
            width: 1000px;
        }
        #analyticPage {
            margin: auto;
        }
        .quizQ {
            margin-top: 40px;
        }
        progress {
            height: 15px;
            width: 100%;
            border-radius: 10px;
        }
        progress::-webkit-progress-bar {
            background-color: rgb(255, 25, 0);
            border-radius: 10px;
        }
        progress::-webkit-progress-value {
            background-color: rgb(0, 255, 72);
            border-radius: 10px 0px 0px 10px;
        }
        .progressBlock {
            padding-top: 5px;
            padding-bottom: 25px;
            background-color: white;
            padding-left: 50px;
            padding-right: 50px;
            border-radius: 5px;

            box-shadow: 0px 5px 10px rgb(201, 201, 201);
        }
        .progressBlock label {
            float: right;
            font-size: medium;
            color: rgb(69, 69, 69);
        }
        #earth {
            z-index: -1;
            width: 1400px;
            height: 700px;
            position: fixed;
            bottom: -500px;
            margin: auto;
        }
        
    </style>
</head>
<body>
    <img src="../../images/planet4.png" alt="" id="earth" >
    <div id="viewAnalytic">
        <h2>Question Analytics</h2>
        <h3><?php echo $quizname;?></h3>
        <hr>
        <div class="quizQ">
            
            <?php
                include "../database/connect.php";

                $courseid = $_GET['courseid'];
                
                $query = "SELECT 
                COUNT(response_ID) AS total,
                COUNT(CASE WHEN question1 = '1' THEN 1 ELSE NULL END) AS q1,
                COUNT(CASE WHEN question2 = '1' THEN 1 ELSE NULL END) AS q2,
                COUNT(CASE WHEN question3 = '1' THEN 1 ELSE NULL END) AS q3,
                COUNT(CASE WHEN question4 = '1' THEN 1 ELSE NULL END) AS q4,
                COUNT(CASE WHEN question5 = '1' THEN 1 ELSE NULL END) AS q5,
                COUNT(CASE WHEN question6 = '1' THEN 1 ELSE NULL END) AS q6,
                COUNT(CASE WHEN question7 = '1' THEN 1 ELSE NULL END) AS q7,
                COUNT(CASE WHEN question8 = '1' THEN 1 ELSE NULL END) AS q8,
                COUNT(CASE WHEN question9 = '1' THEN 1 ELSE NULL END) AS q9,
                COUNT(CASE WHEN question10 = '1' THEN 1 ELSE NULL END) AS q10
                FROM studentquestionresponse
                WHERE course_ID ='$courseid';";
                $result = mysqli_query($connection, $query);
                $count =0 ;
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        for ($x = 1; $x <= 10; $x++) {
                            $count += 1;
                            $accuracy1 = ($row["q$x"] / $row['total']) * 100;
                            $accuracy = round($accuracy1);
                            $question =
                                '<div class="quizQ">
                                    <h4>Question '.$count.'</h4>

                                    <div class="barAnalytic">
                                        <div class="progressBlock">
                                            <label for="progress">Accuracy '.$accuracy.'%</label>
                                            <progress value = '.$row["q$x"].' max = '.$row["total"].' class="progress">'.$accuracy.'%</progress>
                                        </div>
                                    </div>
                                </div>';
                            echo $question;;
                        } 
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>