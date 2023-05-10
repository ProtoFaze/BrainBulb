<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>

    <style>
        body {
            background-image: linear-gradient(to bottom, white, #e6e9f9);
        }
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
            /* margin-left: 0%; */
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
        #btnBlock {
            margin-bottom: 10px;
            float: right;
            /* position: absolute; */

        }
        #block {
            /* height: 100%; */
            /* clear: right; */
            /* clear: left; */
            position: relative;
        }
        #cancelBtn {
            float: left;
            margin-bottom: 10px;
            margin-left: 0;
        }
    </style>
</head>
<?php
    $h = substr($_GET['quizName'],0,-1);
    $n = substr($_GET['quizName'],-1);
    $a = (string)(((int)substr($_GET['quizName'],-1)) + 1);
    $combine = $h.$a;
    $combine = str_replace(' ','',$combine);
?>  
<body>
    <div id="setQues">
        <h4><?php echo $quizName ?></h4>
        <hr>
        <div id="block">
            <form action="" method="post">
                <div id="ques">
                    <p>Question 1</p>
                    <input type="text" name="" id="quesInput">
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
            </form>
        </div>
        <div id="btnBlock">
            <button class="btn">NEXT</button>
            <button class="btn">CANCEL</button>
        </div>
    </div>
    
</body>
</html>

<?php
    $quizName = $_GET['quizName'];
    
    // $query1 = "SELECT course_ID FROM course WHERE chapter_name = '$quizName'";
    // $result = mysqli_query($connection, $query);
    // if (mysqli_num_rows($result) > 0) {
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $courseid = $row['chapter_name'];
    //     }
    // } else {
    //     echo "0 results";
    // }

    $quizName = 'Quiz balala';
    $courseid = 'CR00000034';

    if(isset($_POST['done'])) {
        arrayStoring();
        insertQues();
    }

    if(isset($_POST['newQ'])) {
        arrayStoring();
        newPage();
    }
    
    function newPage() {
        // $pageNumber = isset($_SESSION['pageNumber']) ? $_SESSION['pageNumber'] : 1;
        $pageNumber = isset($_SESSION['pageNumber']) && $_SESSION['pageNumber'] > 0 ? $_SESSION['pageNumber'] : 1;
        // $pageNumber = $_SESSION['pageNumber'];
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
        // $_SESSION['ansArray'][] = $answers;
        array_push( $_SESSION['ansArray'],$answers);
        print_r($_SESSION['ansArray']);
        echo "Current page number: ".$_SESSION['pageNumber']."<br>";
        return true;
    }
    

    function insertQues() {
        include "../database/connect.php";
        include("../components/nav.php");
        // $_SESSION['ansArray'] = array();

        // if(!isset($_SESSION['ansArray'])) {
        //     return;
        // }
        foreach ($_SESSION['ansArray'] as $data ) {
            // echo $data;
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
                    // echo $correctID;
                }
            } else {
                echo "0 results";
            }
            
            $query5 = "SELECT option_List_ID FROM questionoptionlist ORDER BY option_List_ID DESC LIMIT 1;";
            $result1 = mysqli_query($connection, $query5);
            if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_assoc($result1)) {
                    $optionID = $row['option_List_ID'];
                    // echo $optionID;
                }
            } else {
                echo "0 results";
            }
        
            global $courseid;
            // echo $courseid;
            // $question = $_POST['ques'];
            $question_Gamemode ="MCQ";
            $current_time = new DateTime();
            $formatted_time = $current_time->format('Y-m-d H:i:s');
            
            $query6 = "INSERT INTO `questionbank`(`course_ID`, `correct_List_ID`, `option_List_ID`, `question`, `question_Gamemode`, `post_Datetime`) VALUES ('$courseid','$correctID', '$optionID', '$questions', '$question_Gamemode', '$formatted_time');";
            print_r($query6);
            
            // print_r($query6);
            if (mysqli_query($connection, $query6)) {
                
                // echo "HAHAHAHAHA SUCCESS";
                $_SESSION['ansArray'] = array();
                $_SESSION['pageNumber'] = 1;
            } else {
                echo "Error deleting record: " . mysqli_error($connection);
                echo "Buuuuu";
            }
            }
            echo '<script>alert("Question created successfully")</script>';
            echo "Number of pages stored: ".count($_SESSION['ansArray'])."<br>";
    }
    if ($_POST['cancelBtn'] == "viewQuiz.php") {
        header("Location: viewQuiz.php");
    }
?>