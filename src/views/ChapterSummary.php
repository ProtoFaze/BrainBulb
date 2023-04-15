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

    body {
        background-image: url('../../images/seabg.png');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .main{
        text-align: center;
        margin-top: 30px;
    }

    .c{
        margin: 40px 400px;
        padding: 30px;
        border-radius: 7px;
        background-color: lightgray;
    }
    
    .c .items{
        line-height: 1.3;
        border-radius: 7px;
        padding: 20px 0;
        background-color: darkgray;
        font-size: 19px;
        font-weight: bold;
        min-width: 150px;
        text-align: center;
        margin: 15px 30px;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .c .items span{
        font-size: 45px;
        color: white;
    }

    .c .items .flexitems{
        padding: 0 10px;
    }

    .main #buton{
        padding: 15px 30px;
        border-radius: 6px;
        font-size: 19px;
        border: none;
        /* outline: none; */
        font-weight: bold;
        cursor: pointer;
        background-color: gray;
        color:white;
        margin-bottom: 30px;
    }   

    .progress {
        padding: 7px;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 6px;
        margin: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    }

    .progress-bar {	
        height: 32px;
        background-color: #ee303c;  
        border-radius: 4px; 
        transition: 0.3s linear;  
        transition-property: width, background-color;    
    }
</style>
<?php
    // $a = $_SESSION['lists'];
    include "../database/connect.php";
    $studentID = 'ST00000005';  
    $courseID = $_SESSION['course'];
    $query2 = "SELECT * FROM `learning_record` INNER JOIN course ON course.course_ID = learning_record.course_ID WHERE learning_record.course_ID = '$courseID'";
    $query3 = "SELECT * FROM `student` WHERE student_ID = '$studentID'";
    $results2 = mysqli_query($connection,$query2);
    $results3 = mysqli_query($connection,$query3);
    $row = mysqli_fetch_assoc($results2);
    $row3 = mysqli_fetch_assoc($results3);
    $subj = $row['subject_ID'];
    $containxp = intval($row3['experience']);
    $level = intval($row3['level']);
?>
<script>
    let CValue = localStorage.getItem('correct');
    let WValue = localStorage.getItem('wrong');
    let xpValue = localStorage.getItem('xp');
    
</script>
<body>
    <div class="main">
    <?php
        if(!array_key_exists("xp", $_SESSION) && array_key_exists("ctime", $_SESSION)){
            $timezone = new DateTimeZone('Asia/Kuala_Lumpur'); // replace with your desired time zone
            $stime = $_SESSION['ctime'];
            $time = new DateTime('now', $timezone);
            $stime_str = $stime->format('Y-m-d H:i:s');
            $time_str = $time->format('Y-m-d H:i:s');  
            $diff = $time->getTimestamp() - $stime->getTimestamp();
            $duration = gmdate("H:i:s", $diff);
            $query = "INSERT INTO `learning_record`(`course_ID`, `student_ID`,`start_Datetime`,`end_Datetime`) VALUES ('$courseID','$studentID','$stime_str','$time_str')";
            $result = mysqli_query($connection,$query);
            ?>
                <h1 style="font-size:50px; color:#fcc201;">Congratulation, You Did It!</h1>
                <div class="c">
                    <h1>Chapter Summary</h1>
                    <div class="items">
                        <img src="../../images/accept.png" style="width: 60px;" class="flexitems">
                        <span id="cAmount" class="flexitems"></span>
                    </div>
                    <div class="items">
                        <img src="../../images/cross.png" style="width: 60px;" class="flexitems">
                        <span id="wAmount" class="flexitems"></span>
                    </div>
                    <div class="items">
                        <img src="../../images/clock.png" style="width: 60px;" class="flexitems">
                        <span class="flexitems"><?php echo $duration;?></span>
                    </div>
                </div>
                <form method="post" action="calxpprocess.php" style="text-align:center;">
                    <input type="hidden" id="myVariableInput" name="myVariable">
                    <button type="submit" id="buton">Next</button>
                </form>
            <?php
        }
        else{
            $bol = false;
            $b = $containxp + intval($_SESSION['xp']);
            if($level == 1){
                if ($b >= 100){
                    $v =$b%100;
                    $a = ceil(($b%100)/100*100);
                    $bol = true;
                    $level += 1;
                }
                else{
                    $v = $b;
                    $a = ceil($b/100*100);
                }
                
            }
            elseif($level == 2){
                if ($b >= 200){
                    $v =$b%200;
                    $a = ceil(($b%200)/200*100);
                    $bol = true;
                    $level += 1;
                }
                else{
                    $v = $b;
                    $a = ceil($b/200*100);
                }
            }
            elseif($level == 3){
                if ($b >= 300){
                    $v =$b%300;
                    $a = ceil(($b%300)/300*100);
                    $bol = true;
                    $level += 1;
                }
                else{
                    $v = $b;
                    $a = ceil($b/300*100);
                }
            }
            elseif($level == 4){
                if ($b >= 400){
                    $v =$b%400;
                    $a = ceil(($b%400)/400*100);
                    $bol = true;
                    $level += 1;
                }
                else{
                    $v = $b;
                    $a = ceil($b/400*100);
                }

            }

            if($bol){
                //update lvl sql
                $query4 = "UPDATE `student` SET `level` = $level , `experience` = $v WHERE `student_ID` = '$studentID'";
                $results4 = mysqli_query($connection,$query4);
            }
            else{
                //update xp sql
                $query5 = "UPDATE `student` SET `experience` = $v WHERE `student_ID` = '$studentID'";
                $results5 = mysqli_query($connection,$query5);
            }
            ?>  
                <style>
                    .progress-striped .progress-bar { 	
                        background-color: #FCBC51; 
                        width: <?php echo $a;?>%; 
                        background-image: linear-gradient(45deg, rgb(252,163,17) 25%, transparent 25%, transparent 50%, rgb(252,163,17) 50%, rgb(252,163,17) 75%,transparent 75%, transparent); 
                        animation: progressAnimationStrike 4s;
                    }

                    @keyframes progressAnimationStrike {
                        from { width: 0 }
                        to   { width: <?php echo $a;?> %}
                    }
                </style>
                <div style="text-align: center; margin:150px auto; width:500px; background-color:lightgray; padding:40px;">
                    <h1 style="padding: 15px;">Xp Gain : <?php echo $_SESSION['xp'];?></h1>
                    <h1 style="padding: 15px;">Current Experience : <?php echo $v;?></h1>
                    <h1 style="padding: 15px;">Progress to next level : <?php echo $a;?>%</h1>
                    <div class="progress progress-striped">
                        <div style="position:absolute; font-size:28px; font-weight:bold; left:50%;"><?php echo $level;?></div>
                        <div class="progress-bar"></div>                       
                    </div> 
                </div>
                <form method="post" action="" style="text-align:center;">
                    <input type="submit" name="endbut" id="buton" value="End">
                </form>
            <?php
            if(isset($_POST['endbut'])){
                if($subj == "SJ00000002"){
                    echo"<script>location.href='EnglishSelectChapter.php'</script>";
                }
                elseif($subj == "SJ00000001"){
                    echo"<script>locationhref='BMSelectChapter.php'</script>";
                }
                elseif($subj == "SJ00000003"){
                    echo"<script>locationhref='ScSelectChapter.php'</script>";
                }
                elseif($subj == "SJ00000004"){
                    echo"<script>locationhref='MathSelectChapter.php'</script>";
                }
            }
            echo "<script> localStorage.clear();</script>;";
            unset($_SESSION['xp']);
            unset($_SESSION['ctime']);
        }
    ?>
    </div>
</body>
<script>
    document.getElementById("myVariableInput").value = xpValue;

    if(CValue == null || WValue == null){
        <?php 
            if($subj == "SJ00000002"){echo"location.href='EnglishSelectChapter.php'";}elseif($subj == "SJ00000001"){echo"location.href='BMSelectChapter.php'";}elseif($subj == "SJ00000003"){echo"location.href='ScSelectChapter.php'";}elseif($subj == "SJ00000004"){echo"location.href='MathSelectChapter.php'";}
        ?>
    }
    else{
        document.getElementById('cAmount').textContent = CValue.toString();
        document.getElementById('wAmount').textContent = WValue.toString();
        document.getElementById('xpAmount').textContent = xpValue.toString();
    }
    
</script>
</html>