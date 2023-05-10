

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <?php 
        include "../database/connect.php";
        $_SESSION['ansArray'] = array();
    ?>
    <style>
        body {
            font-size: large;
            background-image: url(images/wave.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-size: cover;
        }
        #newQuiz {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ededed;
            padding: 30px;
            border-radius: 10px;
        }

        .inputColumn {
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
            /* border-radius: 20px; */
            background-color: rgb(44, 44, 44);
            color: white;
            border: 0ch;
            transition: background-color 0.5s ease;
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
            <form method="POST" >
                Quiz Name 
                <br>
                <input type="text" name="quizName" class="inputColumn">
                <br>
                Quiz Subject
                <br>
                <input list="browsers" class="inputColumn" name="quizSubj">
                <datalist  id="browsers">
                    <option value="Malay">
                    <option value="English">
                    <option value="Science">
                    <option value="Math">
                    <option value="Others">
                </datalist>
                <br>
                Quiz Description 
                <br>
                <input type="text" name="quizDesc" class="inputColumn">
                <br>
                <button class="theBtn"type="submit" name="createQuizBtn">CREATE</button>
                <button class="theBtn" type="submit" name="cancelBtn" formaction="viewQuiz.php">CANCEL</button>
                <br>
            </form>
        </div>
    </div>

    <img src="images/coral-reef.png" alt="" id="coralPic" class="pic">
    <img src="images/coral.png" alt="" id="coralPic2" class="pic">
</body>
</html>

<!-- counldnt work -->
<!-- cant inert into database -->

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
            echo "it works HAHAHAHA";
            echo '<script>alert("Quiz created successfully")</script>';
            echo "<script>window.location.href='newQuestion.php?quizName=".$name."'</script>";

        } else {
            echo '<script>alert("Create quiz fail")</script>';
            echo "Error deleting record: " . mysqli_error($connection);
        }
        
    }
    if ($_POST['cancelBtn'] == "viewQuiz.php") {
        header("Location: viewQuiz.php");
    }
?>