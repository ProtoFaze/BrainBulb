<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    include "../database/connect.php";
    $studentID = $_SESSION['user_id'];
    $courseID = $_SESSION['course'];
    $subj = $_GET['sub'];
?>
<body>
    <?php
        $date = date('Y-m-d');
        $q = "SELECT SUM(             
            COALESCE(question1, 0) + 
            COALESCE(question2, 0) + 
            COALESCE(question3, 0) + 
            COALESCE(question4, 0) + 
            COALESCE(question5, 0) + 
            COALESCE(question6, 0) + 
            COALESCE(question7, 0) + 
            COALESCE(question8, 0) + 
            COALESCE(question9, 0) + 
            COALESCE(question10, 0)
        ) AS correct,
        SUM(
            CASE WHEN question1 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question2 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question3 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question4 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question5 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question6 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question7 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question8 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question9 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN question10 IS NOT NULL THEN 1 ELSE 0 END
        ) AS total_questions FROM ((studentquestionresponse INNER JOIN course ON studentquestionresponse.course_ID = course.course_ID) INNER JOIN subject ON subject.subject_ID = course.subject_ID) WHERE subject.subject_ID = '$subj' AND studentquestionresponse.student_ID = '$studentID'";
        $res = mysqli_query($connection,$q);
        $row = mysqli_fetch_assoc($res);
        $x = $row['correct'];
        $y = $row['total_questions'];
        if($subj == "SJ00000002"){ //English
            $q2 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' AND achievement_ID = 'AC00000009'";
            $res2 = mysqli_query($connection,$q2);
            if(mysqli_num_rows($res2) > 0){
                ;
            }
            else{
                if($y >= 50){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000009','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }
            }

            $q5 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' AND achievement_ID = 'AC00000012'";
            $res5 = mysqli_query($connection,$q5);
            if(mysqli_num_rows($res5) > 0){
                ;
            }
            else{
                if($x >= 30){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000012','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }
            }

            if(intval(substr($courseID,-2)) >= 3 && intval(substr($courseID,-2)) <= 27){            
                echo"<script>location.href='EnglishSelectChapter.php'</script>";
            }
            else{
                echo "<script>location.href='studentviewquiz.php'</script>";
            }
        }
        elseif($subj == "SJ00000001"){//BM
            $q2 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' AND achievement_ID = 'AC00000003'";
            $res2 = mysqli_query($connection,$q2);
            if(mysqli_num_rows($res2) > 0){
                ;
            }
            else{
                // echo "1";
                if($y >= 50){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000003','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }
            }

            $q5 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' AND achievement_ID = 'AC00000006'";
            $res5 = mysqli_query($connection,$q5);
            if(mysqli_num_rows($res5) > 0){
                ;
            }
            else{
                if($x >= 30){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000006','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }
            }

            if(intval(substr($courseID,-2)) >= 3 && intval(substr($courseID,-2)) <= 27){            
                echo"<script>location.href='BMSelectChapter.php'</script>";
            }
            else{
                echo "<script>location.href='studentviewquiz.php'</script>";
            }
        }
        elseif($subj == "SJ00000003"){
            $q2 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' achievement_ID = 'AC00000015'";
            $res2 = mysqli_query($connection,$q2);
            if(mysqli_num_rows($res2) > 0){
                ;
            }
            else{
                if($y >= 50){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000015','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }                
            }

            $q5 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' achievement_ID = 'AC00000018'";
            $res5 = mysqli_query($connection,$q5);
            if(mysqli_num_rows($res5) > 0){
                ;
            }
            else{
                if($x >= 30){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000018','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                } 
            }

            if(intval(substr($courseID,-2)) >= 41 && intval(substr($courseID,-2)) <= 46){            
                echo"<script>location.href='ScienceSelectChapter.php'</script>";
            }
            else{
                echo "<script>location.href='studentviewquiz.php'</script>";
            }
        }
        elseif($subj == "SJ00000004"){
            $q2 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' achievement_ID = 'AC00000021'";
            $res2 = mysqli_query($connection,$q2);
            if(mysqli_num_rows($res2) > 0){
                ;
            }
            else{
                if($y >= 50){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000021','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }
            }

            $q5 = "SELECT * FROM student_achievement WHERE student_ID = '$studentID' achievement_ID = 'AC00000024'";
            $res5 = mysqli_query($connection,$q5);
            if(mysqli_num_rows($res5) > 0){
                ;
            }
            else{
                if($x >= 30){
                    $q3 = "INSERT INTO student_achievement (achievement_ID, student_ID, achievementDate) VALUES ('AC00000024','$studentID',$date)";
                    mysqli_query($connection,$q3);
                    echo "<script>alert('New Achievement Unlocked!');</script>";
                }
            }

            if(intval(substr($courseID,-2)) >= 3 && intval(substr($courseID,-2)) <= 27){            
                echo"<script>location.href='MathSelectChapter.php'</script>";
            }
            else{
                echo "<script>location.href='studentviewquiz.php'</script>";
            }
        }
        
    ?>
</body>
</html>