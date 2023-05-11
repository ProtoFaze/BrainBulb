
<?php
    session_start();
    $quizName = $_GET['quizName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>

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
        <h4><?php echo $quizName ?></h4>
        <hr>
        <div id="block">
            <form action="" method="post">
                <div id="ques">
                    <p>Question <?php echo $_SESSION['pageNumber'] ?></p>
                    <input type="text" name="ques" id="quesInput">
                </div>
                <div id="optionList">
                    <div class="options">
                        <label for="op1">Correct Answer</label>
                        <br>
                        <input type="text" name="ans1" class="">
                    </div>
                    <div class="options">
                        <label for="op1">Wrong Answer</label>
                        <br>
                        <input type="text" name="ans2" class="">
                    </div>
                    <div class="options">
                        <label for="op1">Wrong Answer</label>
                        <br>
                        <input type="text" name="ans3" class="">
                    </div>
                    <div class="options">
                        <label for="op1">Wrong Answer</label>
                        <br>
                        <input type="text" name="ans4" class="">
                    </div>
                </div>
                <button class="btn" name="done" type="submit">DONE</button>
                <button class="btn" name="newQ">NEW QUESTION</button>
                <button class="btn" id="cancelBtn" name="cancelBtn">CANCEL</button>
            </form>
        </div>

    </div>
    
</body>
</html>

<?php
    include "../database/connect.php";
    $query1 = "SELECT course_ID FROM course ORDER BY course_ID DESC LIMIT 1;";
    $result = mysqli_query($connection, $query1);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $courseid = $row['course_ID'];
            echo "ookkkkk";
        }
    } else {
        echo "0 results";
    }

    if(isset($_POST['done'])) {
        arrayStoring();
        insertQues();
    }

    if(isset($_POST['newQ'])) {
        arrayStoring();
        newPage();
    }
    
    function newPage() {
        $pageNumber = isset($_SESSION['pageNumber']) && $_SESSION['pageNumber'] > 0 ? $_SESSION['pageNumber'] : 1;
        $pageNumber+=1;
        $_SESSION['pageNumber'] = $pageNumber;
        echo $_SESSION['pageNumber'];
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    
    function arrayStoring() {
        $ques = $_POST['ques'];
        $correct = $_POST['ans1'];
        $option1 = $_POST['ans2'];
        $option2 = $_POST['ans3'];
        $option3 = $_POST['ans4'];

        $answers = array();
        array_push($answers,$ques,$correct,$option1,$option2,$option3);
        array_push( $_SESSION['ansArray'],$answers);
        print_r($_SESSION['ansArray']);
        return true;
    }
    

    function insertQues() {
        include "../database/connect.php";

        foreach ($_SESSION['ansArray'] as $data ) {
            $questions = $data[0];
            $correct = $data[1];
            $option1 = $data[2];
            $option2 = $data[3];
            $option3 = $data[4];

            $query2 = "INSERT INTO questioncorrectanswer (coption1)
            VALUES ('$correct');";
            
            if (mysqli_query($connection, $query2)) {
            } else {
                echo "Error" . mysqli_error($connection);
            }

            $query3 = "INSERT INTO questionoptionlist (option1,option2,option3)
            VALUES ('$option1','$option2','$option3');";
            if (mysqli_query($connection, $query3)) {
            } else {
                echo "Error" . mysqli_error($connection);
            }
            
            $query4 = "SELECT correct_List_ID FROM questioncorrectanswer ORDER BY correct_List_ID DESC LIMIT 1;";
            $result = mysqli_query($connection, $query4);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $correctID = $row['correct_List_ID'];
                }
            } else {
                echo "0 results";
            }
            
            $query5 = "SELECT option_List_ID FROM questionoptionlist ORDER BY option_List_ID DESC LIMIT 1;";
            $result1 = mysqli_query($connection, $query5);
            if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_assoc($result1)) {
                    $optionID = $row['option_List_ID'];
                }
            } else {
                echo "0 results";
            }
        
            global $courseid;
            $question_Gamemode ="MCQ";
            $current_time = new DateTime();
            $formatted_time = $current_time->format('Y-m-d H:i:s');
            
            $query6 = "INSERT INTO `questionbank`(`course_ID`, `correct_List_ID`, `option_List_ID`, `question`, `question_Gamemode`, `post_Datetime`) VALUES ('$courseid','$correctID', '$optionID', '$questions', '$question_Gamemode', '$formatted_time');";

            if (mysqli_query($connection, $query6)) {

                $_SESSION['ansArray'] = array();
                $_SESSION['pageNumber'] = 1;
            } else {
                echo "Error creating quiz : " . mysqli_error($connection);
            }
            }
            echo "Number of pages stored: ".count($_SESSION['ansArray'])."<br>";
            echo '<script>alert("Question created successfully"); setTimeout(function(){ window.location.href = "viewQuiz.php"; }, 200);</script>';
    }
    if ($_POST['cancelBtn'] == "viewQuiz.php") {
        header("Location: viewQuiz.php");
    }
?>