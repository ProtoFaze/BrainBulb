

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <?php 
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include "../database/connect.php";
        include("../components/nav.php");
        $_SESSION['ansArray'] = array();
        $_SESSION['questionCount'] = 1;
    ?>
    <style>
        body {
            font-size: large;
            background-image: url(../../images/wave.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        #newQuiz {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ededed;
            padding: 50px;
            padding-top: 10px;
            padding-bottom: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }

        #inputColumn1, #inputColumn2, #inputColumn3 {
            width: 300px;
            height: 40px;
            padding-left: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .theBtn {
            width: 120px;
            height: 35px;
            margin-right: 10px;
            margin-top: 20px;

            background-color: rgb(44, 44, 44);
            color: white;
            border: 0ch;
            transition: background-color 0.5s ease;
            float: right;
        }
        .theBtn:hover {
            background-color: rgb(239, 238, 238);
            color: black;
            box-shadow: 0px 3px 5px 0px gray;
        }

        #coralPic {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 300px;
            height: 300px;
        }
        #coralPic2 {
            position: absolute;
            left: 10px;
            bottom: 10px;
            width: 300px;
            height: 300px;
        }
        .pic {
            animation-duration: 3s;
            animation-name: appear;
        }
        @keyframes appear {
            0% {
                bottom: -250px;
            }
            100% {
                bottom: 10px;
            }
        }


    </style>
</head>
<body>
    <div id="newQuiz">
        <h2>New Quiz</h2>
        <hr>
        <div id="formQuiz">
            <form method="POST" name="createForm">
                Quiz Name 
                <br>
                <input type="text" name="quizName" id="inputColumn1" required>
                <br>
                Quiz Subject
                <br>
                <input list="browsers" id="inputColumn2" name="quizSubj" required>
                <datalist  id="browsers">
                    <option value="Malay">
                    <option value="English">
                    <option value="Science">
                    <option value="Math">
                </datalist>
                <br>
                Quiz Description 
                <br>
                <input type="text" name="quizDesc" id="inputColumn3">
                <br>
                <button class="theBtn"type="submit" name="createQuizBtn" id="createQuizBtn">CREATE</button>
            </form>
        </div>
    </div>

    <img src="../../images/coral-reef.png" alt="" id="coralPic" class="pic">
    <img src="../../images/coral.png" alt="" id="coralPic2" class="pic">
</body>
</html>

<?php
    $teacherID = $_SESSION['user_id'];
    if(isset($_POST['createQuizBtn'])) {
        $name = $_POST['quizName'];
        $subj = $_POST['quizSubj'];
        $desc = $_POST['quizDesc'];
        $qType = "Customised Quiz";
        $subject_id = 'SJ00000001';
        switch ($subj) {
            case "Malay":
                $subject_id = 'SJ00000001';
              break;
            case "English":
                $subject_id = 'SJ00000002';
              break;
            case "Science":
                $subject_id = 'SJ00000003';
              break;
            case "Math":
                $subject_id = 'SJ00000004';
                break;
          }

        $query = "INSERT INTO course (subject_ID, teacher_ID, question_Type, chapter_Name, `description`)
        VALUES ('$subject_id', '$teacherID', '$qType', '$name', '$desc');";
    
        if (mysqli_query($connection, $query)) {
            session_start();
            echo '<script>alert("Quiz created successfully")</script>';
            echo "<script>window.location.href='newQuestion.php?quizName=".$name."'</script>";

        } else {
            echo '<script>alert("Create quiz fail")</script>';
            echo "Error deleting record: " . mysqli_error($connection);
        }
        
    }
    if (isset($_POST['cancelBtn']) && $_POST['cancelBtn'] == "viewQuiz.php") {
        header("Location: viewQuiz.php");
    }
?>

