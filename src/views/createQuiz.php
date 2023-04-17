<!-- <?php
    if(array_key_exists('createQuizBtn', $_POST)) {
        $name = $_POST['quizName'];
        $qNum = $_POST('quesNum');
        $qType = "by-teacher";
        $query = "INSERT INTO table_name (question_Type, chapter_Name)
                  VALUES ($qType, $name);";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Error creating quiz: " . mysqli_error($connection));
        }
        $count = mysqli_affected_rows($connection);
        if ($count > 0) {
            echo "Quiz created successfully!";
            // redirect to create question page
        } else {
            echo "Error: Quiz not created";
        }
    }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <!-- <?php 
        include 'dbcon.php';
    ?> -->
    <style>
        body {
            font-size: large;
            background-image: url(imgFile/wave.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed; 
            background-size: cover;
        }
        #newQuiz {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(236, 236, 236, 0.3);
            padding: 30px;
            border-radius: 10px;
        }

        /* #formQuiz {
            margin: auto;
        } */

        .inputColumn {
            width: 300px;
            height: 40px;
            padding-left: 20px;
            margin-top: 20px;
            margin-bottom: 50px;
        }
        .createBtn {
            width: 120px;
            height: 35px;
            margin-right: 10px;
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
            <form action="" >
                Quiz Name 
                <br>
                <input type="text" name="quizName" class="inputColumn">
                <br>
                Number of Question 
                <br>
                <input type="number" name="quesNum" id="" class="inputColumn">
                <br>
                <button class="createBtn" type="submit" name="createQuizBtn">CREATE</button>
                <button class="createBtn">CANCEL</button>
            </form>
        </div>
    </div>
    <img src="imgFile/coral-reef.png" alt="" id="coralPic" class="pic">
    <img src="imgFile/coral.png" alt="" id="coralPic2" class="pic">
</body>
</html>