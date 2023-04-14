<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBulb</title>
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
</head>
<style>
    *{
        margin: 0;
    }

    

</style>
<?php
    // $a = $_SESSION['lists'];
    include "../database/connect.php";
    $studentID = 'ST00000005';
    $courseID = $_SESSION['course'];
    $query = "INSERT INTO `learning_record`(`course_ID`, `student_ID`) VALUES ('$courseID','$studentID')";
    $query2 = "SELECT * FROM `learning_record` INNER JOIN course ON course.course_ID = learning_record.course_ID WHERE learning_record.course_ID = '$courseID'";
    $results2 = mysqli_query($connection,$query2);
    $row = mysqli_fetch_assoc($results2);
    $subj = $row['subject_ID'];
    $containxp = 0;
?>
<script>
    let CValue = localStorage.getItem('correct');
    let WValue = localStorage.getItem('wrong');
    let xpValue = localStorage.getItem('xp');
    
</script>
<body>
    <?php
        if(!isset($myArray["key4"])){
            ?>
            <h1>Correct Answers: <span id="cAmount"></span></h1>
            <h1>Wrong Answers: <span id="wAmount"></span></h1>
            <h1>Xp Gain: <span id="xpAmount"></span></h1>
            <form method="post" action="calxpprocess.php">
                <input type="hidden" id="myVariableInput" name="myVariable">
                <button type="submit">Continue</button>
            </form>
            <?php
        }
        else{
            echo $_SESSION['xp'];
            ?>
                <a <?php if($subj == "SJ00000002"){echo"href='EnglishSelectChapter.php'";}elseif($subj == "SJ00000001"){echo"href='BMSelectChapter.php'";}elseif($subj == "SJ00000003"){echo"href='ScSelectChapter.php'";}elseif($subj == "SJ00000004"){echo"href='MathSelectChapter.php'";}?>>Exit</a>
            <?php
        }
    ?>
</body>
<script>
    document.getElementById("myVariableInput").value = xpValue;

    if(CValue == null || WValue == null){
        location.href = "SelectChapter.php  ";
    }
    else{
        document.getElementById('cAmount').textContent = CValue.toString();
        document.getElementById('wAmount').textContent = WValue.toString();
        document.getElementById('xpAmount').textContent = xpValue.toString();
        localStorage.clear();
    }
    
</script>
</html>