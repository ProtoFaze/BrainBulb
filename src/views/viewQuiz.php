<!-- <?php
    $query = ";";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Error: " . mysqli_error($connection));}
    $count = mysqli_affected_rows($connection);
    if ($count > 0) {
        echo "Print quizzes";
    } else {
        echo "Error Error Error Error Error";
    }

?> -->

<!-- Get every quiz in database 
= SELECT course_ID as courseID, chapter_Name as quizName FROM course WHERE teacher_ID = " ";

Get questions in quiz 
= SELECT question_ID as quesID FROM questionBank WHERE course_ID = 'courseID';

Get total Attempts in quiz
= SELECT COUNT(response_ID) as total_attempt WHERE question_ID = 'quesID';

Get correct Attempts
= SELECT COUNT(response_ID) as correct_attempt WHERE question_ID = 'quesID' & correctness='1';

 -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Quiz</title>
    <style>
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
            width: 1000px;
            margin: auto;
        }
        .quiz {
            /* background-color: rgb(219, 236, 250); */
            padding: 10px;
            margin: 10px;
        }
        .progressBlock {
            /* margin: 30px; */
            padding-top: 5px;
            padding-bottom: 25px;
            /* background-color: azure; */
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
        }

        .viewMenu table{
            width: 100%;
            background: linear-gradient(to bottom, #878787 0%, #00000000 100%);
            padding: 5px;
            padding-bottom: 15px;
        }
        .viewMenu td {
            text-align: center;
            padding: 5px;
        }
        .viewMenu button {
            text-decoration: none;
            background: none;
            border: none;
            transition: transform 0.5s;
        }
        .viewMenu button:hover{
            /* text-decoration: underline; */
            transform: scale(1.2);
        }

    </style>
</head>
<body>
    <div id="quizzes">
        <h2>Quizzes</h2>
        <button id="newQuizBtn">NEW QUIZ</button>
        <div class="quiz">
            <p><span>Math Quiz</span> 10 Attempts</p>
            <div class="progressBlock">
                <label for="progress">Accuracy 40%</label>
                <progress value = "40" max = "100" class="progress">40%</progress>
            </div>
            <div class="viewMenu">
                <table>
                    <tr>
                        <td>
                            <button>VIEW LEARNING MATERIAL</button>
                        </td>
                        <td>
                            <button>VIEW STUDENT PERFORMANCE</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button>VIEW QUESTION</button>
                        </td>
                        <td>
                            <button>VIEW ANALYTIC</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="quiz">
            <p><span>Math Quiz</span> 10 Attempts</p>
            <div class="progressBlock">
                <label for="progress">Accuracy 70%</label>
                <progress value = "70" max = "100" class="progress">70%</progress>
            </div>
        </div>
        <div class="quiz">
            <p><span>Math Quiz</span> 10 Attempts</p>
            <div class="progressBlock">
                <label for="progress">Accuracy 55%</label>
                <progress value = "55" max = "100" class="progress">55%</progress>
            </div>
        </div>
            
    </div>
    
</body>
</html>