<?php
    session_start();
    $teacherID = $_SESSION['user_id'];
    include("../components/nav.php");
    $_SESSION['ansArray'] = array();
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
            background-image: url(../../images/night.png);
            color: white;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        #norecord {
            color: white;
            text-align: center;
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
            color:white;
        }
        .viewMenu a:hover{
            transform: scale(1.2);
        }
        .delBtn {
            width: 25px;
            height: 25px;
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
<script>
    function executeQueryAndRedirect() {
    // Submit the form
    document.getElementById("myForm").submit();
    }
</script>
<body>
    <div id="quizzes">
        <h2>Quizzes</h2>
        <form action="">
            <button id="newQuizBtn" name="newQuiz" formaction="createQuiz.php">NEW QUIZ</button>
        </form>
        
        <?php
            include "../database/connect.php";
            $query = "SELECT * FROM course WHERE teacher_ID = '$teacherID'";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                $quiz="";
                while($data = mysqli_fetch_assoc($result)) {
                    $courseid = $data['course_ID'];
                    $quizname = $data['chapter_Name'];
                    $desc = $data['description'];

                    $query1 = "SELECT
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
                    FROM studentquestionresponse
                    WHERE course_ID = '$courseid';";

                    $totalCourse = array();
                    $totalAttempt = 0;
                    $totalCorrect = 0;
                    $totalAccuracy = 0;

                    $result1 = mysqli_query($connection, $query1);
                    if (mysqli_num_rows($result1) > 0) {
                        while($row = mysqli_fetch_assoc($result1)) {
                            if ($row['total_attempt'] == null && $row['correct_attempt'] == null) {
                                $totalAttempt = 0;
                                $totalCorrect = 0;
                                $totalAccuracy = 0;
                            } else {
                                $totalAttempt = $row['total_attempt'];
                                $totalCorrect = $row['correct_attempt'];
                                $totalAccuracy = round(($totalCorrect/$totalAttempt) * 100);
                            }
                            $quiz .= 
                                '<div class="quiz">
                                    <div class="quizTitle">
                                        <div>
                                            <h4>'.$quizname.'</h4><h5>'.$totalCorrect.' / '.$totalAttempt.' Attempts</h5>
                                        </div>
                                    </div>
                                    <div class="progressBlock">
                                        <label for="progress">Accuracy '.$totalAccuracy.'%</label>
                                        <progress value = '.$totalCorrect.' max = '.$totalAttempt.' class="progress">'.$totalAccuracy.'%</progress>
                                    </div>
                                    <div class="viewMenu">
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="viewQuestion.php?courseid='.$courseid.'&quizname='.$quizname.'">VIEW QUESTION</a>
                                                </td>
                                                <td>
                                                    <a href="questionAnalytic.php?courseid='.$courseid.'&quizname='.$quizname.'">VIEW ANALYTIC</a>
                                                </td>
                                                <td>
                                                    <a href="studentRanking.php?courseid='.$courseid.'&quizname='.$quizname.'">VIEW STUDENT PERFORMANCE</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>';
                        }
                    }
                }
                echo $quiz;
            } else {
                // Data is empty
                echo '<p id="norecord">-No Quiz being created yet-</p>';
            }
        ?>
    </div>
    
</body>
</html>