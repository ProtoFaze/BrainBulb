
<?php
    $quizname = $_GET['quizname'];
    session_start();
    if (isset($_GET['questionid'])) {
        $quesID = $_GET['questionid'];
    } else {
        echo "Quiz is not found";
        echo '<script>alert("Error");window.location.href = "viewQuiz.php";</script>';

    }
    include "../database/connect.php";
    include("../components/nav.php"); 

    $query1 = "SELECT questionBank.*,questioncorrectanswer.*,questionoptionlist.* FROM ((questionBank 
    INNER JOIN questioncorrectanswer ON questionBank.correct_List_ID = questioncorrectanswer.correct_List_ID)
    INNER JOIN questionoptionlist ON questionBank.option_List_ID = questionoptionlist.option_List_ID)
    WHERE question_ID = '$quesID';";

    $result1 = mysqli_query($connection, $query1);
    if (mysqli_num_rows($result1) > 0) {
        while($row = mysqli_fetch_assoc($result1)) {
            $ques = $row['question'];
            $correctid = $row['correct_List_ID'];
            $optionid = $row['option_List_ID'];
            $correct = $row['coption1'];
            $option1 = $row['option1'];
            $option2 = $row['option2'];
            $option3 = $row['option3'];
            $courseid = $row['course_ID'];
        }
    } else {
        echo "0 results";
    }    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Question</title>
    <style>
        #setQues {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #quesInput {
            width: 1000px;
            height: 100px;
        }
        #optionList {
            margin: 0px;
            width: 100%;
        }
        .options input[type=text]{
            width: 400px;
            height: 50px;
        }
        .options {
            margin: 40px;
            float: left;
        }
        .btn {
            width: 120px;
            height: 35px;
            margin-right: 10px;
            background-color: transparent;
            border: 1.5px solid;
            transition: background-color 1s;
        }
        .btn:hover {
            background-color: rgb(50, 50, 50);
            color: white;;
        }
        #block {
            position: relative;
        }
        #cancelBtn {
            float: left;
            margin-bottom: 10px;
            margin-left: 0;
        }
    </style>
</head>
<body>
    <div id="setQues">
        <h4><?php echo $quizname ?></h4>
        <hr>
        <div id="block">
            <form action="" method="post">
                <div id="ques">
                    <h4>Question </h4>
                    <input type="text" name="ques" id="quesInput" value="<?php echo$ques; ?>">
                </div>
                <div id="optionList">
                    <div class="options">
                        <label for="op1">Correct Answer</label>
                        <br>
                        <input type="text" name="ans1" class="" value="<?php echo $correct; ?>">
                    </div>
                    <div class="options">
                        <label for="op1">Wrong Answer</label>
                        <br>
                        <input type="text" name="ans2" class="" value="<?php echo $option1; ?>">
                    </div>
                    <div class="options">
                        <label for="op1">Wrong Answer</label>
                        <br>
                        <input type="text" name="ans3" class="" value="<?php echo $option2; ?>">
                    </div>
                    <div class="options">
                        <label for="op1">Wrong Answer</label>
                        <br>
                        <input type="text" name="ans4" class="" value="<?php echo $option3; ?>">
                    </div>
                </div>
                <button class="btn" name="done" >DONE</button>
                <button class="btn" name="cancelBtn" formaction="viewQuiz.php">RETURN</button>
            </form>
        </div>  
    </div>
</body>
</html>

<?php
    if(isset($_POST['done'])) {
        updateData();
    }
    
    function updateData() {
        include "../database/connect.php";
        global $quesID;
        $ques = $_POST['ques'];
        $correct = $_POST['ans1'];
        $option1 = $_POST['ans2'];
        $option2 = $_POST['ans3'];
        $option3 = $_POST['ans4'];

        $query ="UPDATE questionBank
        JOIN questioncorrectanswer ON questionBank.correct_List_ID = questioncorrectanswer.correct_List_ID
        JOIN questionoptionlist ON questionBank.option_List_ID = questionoptionlist.option_List_ID
        SET questionBank.question = '$ques', questioncorrectanswer.coption1 = '$correct', questionoptionlist.option1='$option1', 
        questionoptionlist.option2='$option2', questionoptionlist.option3='$option3'
        WHERE questionBank.question_ID = '$quesID';";

        if (mysqli_query($connection, $query)) {
            echo '<script>alert("Question is edited successfully"); setTimeout(function(){ window.location.href = "viewQuiz.php"; }, 200);</script>';
        } else {
            echo "Error editing record: " . mysqli_error($connection);
        }
    }
?>