
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
            z-index: 1;
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
        .modifyBtn {
            width: 25px;
            height: 25px;
        }
        #quizTitle button{
            background-color: #00000000;
            border: none;
        }
        #quizTitle button:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div id="quizzes">
        <h2>Quizzes</h2>
        <button id="newQuizBtn">NEW QUIZ</button>
        <?php
            include 'dbcon.php';
            $query = "SELECT studentquestionresponse.response_ID, course.course_ID, course.chapter_Name,
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
            WHERE course.teacher_ID = 'TC00000001'
            GROUP BY studentquestionresponse.response_ID;";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                // $totalAttempt = 0;
                // $totalCorrect = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $totalAttempt = $row['total_attempt'];
                    $totalCorrect = $row['correct_attempt'];
                    $quizname = $row['course.chapter_Name'];
                    $quizAccuracy = ($totalCorrect/$totalAttempt) * 100;
                    $quiz = 
                        '<div class="quiz">
                            <table id="quizTitle" width="100%">
                                <tr>
                                    <td font-size="10px">'.$quizname.'</td>
                                    <td width="80%" font-size="8px">'.$totalCorrect.' / '.$totalAttempt.' Attempts</td>
                                    <td>
                                        <button >
                                            <img src="images/edit.png" alt="" class="modifyBtn">
                                        </button>
                                    </td>
                                    <td>
                                        <button >
                                            <img src="images/delete.png" alt="" class="modifyBtn">
                                        </button>
                                    </td>
                                </tr>
                            </table>
                            <div class="progressBlock">
                                <label for="progress">Accuracy '.$quizAccuracy.'%</label>
                                <progress value = '.$totalCorrect.' max = '.$totalAttempt.' class="progress">'.$quizAccuracy.'%</progress>
                            </div>
                            <div class="viewMenu">
                                <table>
                                    <tr>
                                        <td>
                                            <button>VIEW QUESTION</button>
                                        </td>
                                        <td>
                                            <button>VIEW ANALYTIC</button>
                                        </td>
                                        <td>
                                            <button>VIEW STUDENT PERFORMANCE</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>';
                    echo $quiz;
                }
            }
        ?>
    </div>
    
</body>
</html>