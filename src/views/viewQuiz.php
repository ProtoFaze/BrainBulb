<?php
    session_start();
    $teacherID = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Quiz</title>
    <style>
        body {
            background-image: url(images/night.png);
            color: white;
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
        #quizzes {
            max-width: 1000px;
            margin: auto;
        }
        .quiz {
            margin: 10px;
            clear:right;
            border-radius: 10px 10px 0px 0px;
        }
        .progressBlock {
            padding-top: 5px;
            padding-bottom: 25px;
            padding-left: 50px;
            padding-right: 50px;
            border-radius: 5px;
            box-shadow: 0px 5px 10px rgb(201, 201, 201);
            background-color: white;
        }
        .progressBlock label {
            float: right;
            font-size: medium;
            color: rgb(69, 69, 69);
        }
        .quiz p {
            color: rgb(69, 69, 69);
        }
        .quiz span {
            font-size: larger;
            color: black;
        }
        #newQuizBtn {
            float: right;
            width: 110px;
            height: 40px;
            border-radius: 20px;
            background-color: rgb(44, 44, 44);
            color: white;
            border: 0ch;
            transition: background-color 0.5s ease;
        }
        #newQuizBtn:hover {
            background-color: rgb(239, 238, 238);
            color: black;
            box-shadow: 0px 3px 5px 0px gray;
        }
        .viewMenu {
            opacity: 0;
            visibility: hidden;
            height: 0;
            transition: opacity 1s, visibility 1s, height 1s;
        }

        .quiz:hover .viewMenu {
            opacity: 1;
            visibility: visible;
            height: auto;
            z-index: 1;
        }

        .viewMenu table{
            width: 100%;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8) 0%, #00000000 100%);
            padding: 5px;
            padding-bottom: 15px;
        }
        .viewMenu td {
            text-align: center;
            padding: 10px;
        }
        .viewMenu a{
            text-decoration: none;
            background: none;
            border: none;
            transition: transform 0.5s;
        }
        .viewMenu a:hover{
            transform: scale(1.2);
        }
        .delBtn {
            width: 25px;
            height: 25px;
        }
        .addBtn {
            width: 20px;
            height: 20px;
        }
        .theButtons {
            /* margin: 0px; */
            position: absolute;
            right: 15px;
            bottom: 10px;
        }
        .quizTitle {
            display: flex;
            flex-direction: row;
            position: relative;
        }
        .quizTitle div{
            margin-right: 10px;
        }
        .quizTitle button{
            background-color: #00000000;
            border: none;
        }
        .quizTitle button:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div id="quizzes">
        <h2>Quizzes</h2>
        <button id="newQuizBtn">NEW QUIZ</button>
        <?php
            include "../database/connect.php";

            if(isset($_POST['addQuestion'])) {
                $quizName = $_POST['addQuestion'];
                echo '<script>window.location.href = "newQuestion.php?quizName=" . '.$quizName.';</script>';
            }            
            
            $query = "SELECT studentquestionresponse.response_ID, course.*, course.chapter_Name,
            SUM(CASE WHEN question1 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question2 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question3 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question4 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question5 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question6 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question7 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question8 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question9 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question10 = '1' THEN 1 ELSE 0 END) AS correct_attempt,  
            SUM(CASE WHEN question1 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question1 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question2 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question2 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question3 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question3 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question4 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question4 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question5 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question5 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question6 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question6 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question7 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question7 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question8 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question8 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question9 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question9 = '0' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question10 = '1' THEN 1 ELSE 0 END) +
            SUM(CASE WHEN question10 = '0' THEN 1 ELSE 0 END) AS total_attempt
            FROM (studentquestionresponse 
            INNER JOIN course ON studentquestionresponse.course_ID = course.course_ID)
            GROUP BY course.course_ID";

            $totalCourse = array();
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $cID = $row["course_ID"];
                    $tID = $row['teacher_ID'];
                    $countAttempt = $row['total_attempt'];
                    $countCorrect = $row['correct_attempt'];
                    $nameOfquiz = $row['chapter_Name'];
                    $countAccuracy = ($countCorrect/$countAttempt) * 100;
                    $totalCourse[] = array($cID,$tID,$nameOfquiz,$countAttempt,$countCorrect,$countAccuracy);
                }
            } else {
                echo "0 results";
            }
            $courseid = "";
            $teacherid = "";
            $quizname = "";
            $totalAttempt = "";
            $totalCorrect = "";
            $quizAccuracy = "";
            foreach ($totalCourse as $quizData) {
                $courseid = $quizData[0];
                $teacherid = $quizData[1];
                $quizname = $quizData[2];
                $totalAttempt = $quizData[3];
                $totalCorrect = $quizData[4];
                $quizAccuracy = $quizData[5];
                // print_r($quizData);
                
                if ($teacherid == $teacher_ID) {
                    $quiz .= 
                        '<div class="quiz">
                            <div class="quizTitle">
                                <div>
                                    <h4>'.$quizname.'</h4>
                                </div>
                                <div class="theButtons">
                                    <form method="POST">
                                        <button name="addQuestion" onclick="addQuestion()" value="'.$quizname.'">
                                            <img src="images/add.png" alt="" class="addBtn">
                                        </button>
                                    </form>                            
                                </div>
                            </div>
                            <div class="progressBlock">
                                <label for="progress">Accuracy '.$quizAccuracy.'%</label>
                                <progress value = '.$totalCorrect.' max = '.$totalAttempt.' class="progress">'.$quizAccuracy.'%</progress>
                            </div>
                            <div class="viewMenu">
                                <table>
                                    <tr>
                                        <td>
                                            <a href="viewQuestion.php?courseid='.$courseid.'">VIEW QUESTION</a>
                                        </td>
                                        <td>
                                            <a href="questionAnalytic.php?courseid='.$courseid.'">VIEW ANALYTIC</a>
                                        </td>
                                        <td>
                                            <a href="studentRanking.php?courseid='.$courseid.'">VIEW STUDENT PERFORMANCE</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>';
                    // echo $quiz;
                }
                // echo $quiz;
            }
            echo $quiz;

            // mysqli_close($connection);
            

        ?>

        
    </div>
    
</body>
</html>