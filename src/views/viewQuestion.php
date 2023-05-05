<!-- not done -->
<!-- question retrieving incomplete -->
<!-- need to add option list answer -->




<script>
    function editQuiz() {
        window.location.href="/Applications/XAMPP/xamppfiles/htdocs/sem5_sdp/setQuestion.php";
        // need pass the variable of the quiz question
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Question</title>
    <style>
        body {
            background-image: url(images/spaceBG.png);
            background-size: cover;
            background-attachment: fixed;
        }
        .qBlock {
            background-color: rgba(255, 255, 255, 0.8);
            width: 900px;
            /* height: 100px; */
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
            /* width: 100%; */
            margin: auto;
        }
        .optionTable td {
            padding: 5px;
            width: 400px;
            /* background-color: rgb(169, 214, 253); */
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
        }

        .ans p {
            width: 50%;
            float: left;
            box-sizing: border-box;
        }

        

    </style>
</head>
<body>
    <img src="images/spaceship.png" alt="" id="spaceship">
    <img src="images/planet.png" alt="" id="planet">
    <img src="images/galaxy.png" alt="" id="galaxy">
    <div id="viewquiz">
        <?php
            include 'dbcon.php';

            if (isset($_POST['deleteQuiz'])) {
                $question_id = $_POST['deleteQuiz'];
                $delete_query = "DELETE FROM questionBank WHERE question_ID = '$question_id'";
                mysqli_query($connection, $delete_query);
                echo '<script>alert("Question deleted successfully")</script>';
            }
            if (isset($_POST['editQuiz'])) {
                $question_id = $_POST['editQuiz'];
                echo "<script>window.location.href='editQuestion.php?quizName=".$name."&".$question_id."'</script>";
            }

            $query = "SELECT questionBank.question_ID, questionBank.question, questioncorrectanswer.*, questionoptionlist.*
                FROM ((questionBank
                INNER JOIN questioncorrectanswer ON questionBank.correct_List_ID = questioncorrectanswer.correct_List_ID)
                INNER JOIN questionoptionlist ON questionBank.option_List_ID = questionoptionlist.option_List_ID);";
            $result = mysqli_query($connection, $query);
            $count = 0;

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $count += 1;

                    $question = 
                        '<div class="qBlock">
                            <h3>Question '.$count.'</h3>
                            <div class="btnBlock">
                                <div class="theButtons">
                                    <form method="POST">
                                        <button name="deleteQuiz" value="'.$row["question_ID"].'">
                                            <img src="images/delete.png" alt="" class="delBtn">
                                        </button>
                                        <button name="editQuiz" onclick="editQuiz" value="'.$row["question_ID"].'">
                                            <img class="modifyBtn" src="images/edit.png" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="quesBlock">
                                <p>'.$row["question"].'</p>
                                <div class="ans">
                                    <p>'.$row["option1"].'</p>
                                    <p>'.$row["option2"].'</p>
                                    <p>'.$row["option3"].'</p>
                                    <p>'.$row["option4"].'</p>
                                </div>
                            </div>
                        </div>';
                    echo $question;
                }
            } else {
                echo "0 results";
            }
            mysqli_close($connection);
        ?>



        <!-- <div class="qBlock">
            <table>
                <tr>
                    <th><h3>Question 1</h3></th>
                    <td><button><img class="delBtn" src="images/delete.png" alt=""></button></td>
                </tr>
            </table>
        
            <div class="quesBlock">
                <h4>Why ahh why ah why ahhh?</h4>
                <div class="ans">
                    <p>Here is the answer of the question</p>
                    <p>Where is the answer of the question</p>
                    <p>I cant found the asnwer of the question</p>
                    <p>Aiyaa cincai lahh ntg is important</p>
                    <p>Ahhhhhhhhhhh what the fk are all these?</p>
                </div>
            </div>
        </div> -->

        <!-- <div class="qBlock">
            <h3>Question 1</h3>
            <div class="quesBlock">
                <p>Why ahh why why ahh?</p>
                <table class="optionTable">
                    <tr>
                        <td>Option 1</td>
                        <td>Option 2</td>
                    </tr>
                    <tr>
                        <td>Option 3</td>
                        <td>Option 4</td>
                    </tr>
                </table>
            </div>
        </div> -->
    </div>
    

</body>
</html>
