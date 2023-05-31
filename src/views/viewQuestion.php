<?php
    session_start();
    include "../database/connect.php";
    include("../components/nav.php");
    $courseid = $_GET['courseid'];
    $quizname = $_GET['quizname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Question</title>
    <style>
        body {
            background-image: url(../../images/spaceBG.png);
            background-size: cover;
            background-attachment: fixed;
            
        }
        #rankingTitle {
            color: white;
            margin-left: 280px;
        }
        #norecord {
            color: white;
            text-align: center;
        }
        .qBlock {
            background-color: rgba(255, 255, 255, 0.8);
            width: 900px;
            margin: auto;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .quesBlock {
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            padding-top: 5px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 10px;
        }
        .optionTable {
            margin: auto;
        }
        .optionTable td {
            padding: 5px;
            width: 400px;
        }
        #spaceship {
            z-index: -1;
            max-width: 150px;
            max-height: 150px;
            animation-name: fly;
            animation-duration: 25s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            position: fixed;
            top: 500px;
            left: -150px;
            opacity: 0.7;
        }
        @keyframes fly {
            from {
                transform: rotate(120deg) translate(0, 0);
            }
            to {
                transform: translate(800px, -600px);
            }
        }

        #planet {
            z-index: -1;
            max-width: 200px;
            max-height: 200px;
            animation-name: fly2;
            animation-duration: 40s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-out;
            position: fixed;
            top: 700px;
            right: 250px;
        }
        @keyframes fly2 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(180deg) translate(-500px, 400px);
            }
        }

        #galaxy {
            z-index: -2;
            max-width: 200px;
            max-height: 200px;
            animation-name: fly3;
            animation-duration: 35s;
            animation-delay: 15s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            position: fixed;
            top: 700px;
            right: 650px;
            opacity: 0.8;
        }
        @keyframes fly3 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(-120deg) translate(500px, -600px);
            }
        }
        .delBtn , .modifyBtn{
            width: 20px;
            height: 20px;
        }
        .delBtn:hover, .modifyBtn:hover{
            transform: scale(1.2);
        }

        .btnBlock {
            position: relative;
        }

        .theButtons {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px;
        }

        .theButtons button{
            border: none;
            background-color: #00000000;
        }
        
        .ans {
            overflow: hidden;
            padding-left: 50px;
            display: flex;
            flex-direction: column;
        }

        .ans p {
            width: 50%;
            float: left;
            box-sizing: border-box;
        }
        .correctiveIcon img{
            width: 30px;
            height: 30px;
        }
        

    </style>
</head>
<body>
    <img src="../../images/spaceship.png" alt="" id="spaceship">
    <img src="../../images/planet.png" alt="" id="planet">
    <img src="../../images/galaxy.png" alt="" id="galaxy">
    
    <div id="viewquiz">
        <h3 id="rankingTitle"><?php echo $quizname;?></h3>
        <?php
            if (isset($_POST['deleteQuiz'])) {
                $question_id = $_POST['deleteQuiz'];
                $delete_query = "DELETE FROM questionBank WHERE question_ID = '$question_id'";
                mysqli_query($connection, $delete_query);
                echo '<script>alert("Question deleted successfully")</script>';
            }
            if (isset($_POST['editQuiz'])) {
                $question_id = $_POST['editQuiz'];
                echo "<script>window.location.href='editQuestion.php?questionid=".$question_id."&quizname=".$quizname."'</script>";
            }

            $query = "SELECT questionBank.question_ID, questionBank.question, questioncorrectanswer.*, questionoptionlist.*
                FROM ((questionBank
                INNER JOIN questioncorrectanswer ON questionBank.correct_List_ID = questioncorrectanswer.correct_List_ID)
                INNER JOIN questionoptionlist ON questionBank.option_List_ID = questionoptionlist.option_List_ID)
                WHERE questionBank.course_ID = '$courseid';";
            $result = mysqli_query($connection, $query);
            $count = 0;

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $questionid = $row["question_ID"];
                    $ans1 = $row["coption1"];
                    $ans2 = $row["option1"];
                    $ans3 = $row["option2"];
                    $ans4 = $row["option3"];
                    $count += 1;
                    $question = 
                        '<div class="qBlock">
                            <h3>Question '.$count.'</h3>
                            <div class="btnBlock">
                                <div class="theButtons">
                                    <form method="POST">
                                        <button name="deleteQuiz" value="'.$questionid.'">
                                            <img src="../../images/delete.png" alt="" class="delBtn">
                                        </button>
                                        <button name="editQuiz" onclick="editQuiz" value="'.$questionid.'">
                                            <img class="modifyBtn" src="../../images/edit.png" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="quesBlock">
                                <p>'.$row["question"].'</p>
                                <div class="ans">
                                    <table>
                                        <tr>
                                            <td>
                                                <span class="correctiveIcon"><img src="../../images/checked.png"><p>'.$ans1.'</p></span>
                                            </td>
                                            <td>
                                                <span class="correctiveIcon"><img src="../../images/option.png"><p>'.$ans2.'</p></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="correctiveIcon"><img src="../../images/option.png"><p>'.$ans3.'</p></span>
                                            </td>
                                            <td>
                                                <span class="correctiveIcon"><img src="../../images/option.png"><p>'.$ans4.'</p></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>';
                    echo $question;
                }
            } else {
                echo '<p id="norecord">-No Question Created in this Quiz-</p>';
            }
        ?>
    </div>
    

</body>
</html>