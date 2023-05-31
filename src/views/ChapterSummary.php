<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
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
        position: fixed;
        top: 10;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: url('../../images/seabg.png');
        animation: animate-background 10s linear infinite;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .main{
        text-align: center;
        margin-top: 30px;
    }

    .c{
        margin: 45px auto;
        padding: 30px;
        border-radius: 7px;
        background-image:linear-gradient(to bottom right,#F29C1F,#E57E25);
        width: 600px;
        
    }
    
    .c .items{
        line-height: 1.3;
        border-radius: 7px;
        padding: 20px 0;
        background-image:linear-gradient(to bottom right,lightskyblue,#7AC0F9);
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
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
        color:black;
    }

    .main #buton{
        padding: 20px 60px;
        border-radius: 6px;
        font-size: 25px;
        border: none;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        font-weight: bold;
        cursor: pointer;
        background-color: #F29C1F;
        color:white;
        margin-bottom: 30px;
        
    }   

    .main #buton:hover{
        transform: scale(1.15);
    }

    .main #buton:active{
        transform: scale(0.95);
    }

    .progress {
        position:relative;
        padding: 10px;
        background: rgba(0, 0, 0, 0.25);
        border-radius: 6px;
        margin: 5px;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.25), 0 1px rgba(255, 255, 255, 0.08);
    }

    .progress-bar {	
        height: 40px;
        background-color: #ee303c;  
        border-radius: 4px; 
        transition: 0.3s linear;  
        transition-property: width, background-color;    
    }
</style>
<?php
    include "../database/connect.php";
    $studentID = $_SESSION['user_id'];  
    $courseID = $_SESSION['course'];
    $query2 = "SELECT * FROM `course` WHERE course_ID = '$courseID'";
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
    let startTime = localStorage.getItem('starttime');
    let endTime = localStorage.getItem('endtime');
    let respone = localStorage.getItem('res');
    const options = { timeZone: 'Asia/Kuala_Lumpur' };
    var Ctime = new Date(startTime).toLocaleString('en-US', options);
    var now = new Date(endTime).toLocaleString('en-US', options);
    const dt = new Date(Ctime).getTime();
    const dtnow = new Date(now).getTime();
    const duration =dtnow - dt;
    const minutes = Math.floor(duration/60000);
    const seconds = ((duration % 60000)/1000).toFixed(0);
    const milli = duration % 1000; 
    const Tspent = `${minutes}:${(seconds < 10 ? '0' : '')}${seconds}.${milli}`;

    function timeformat(dateString){
        const dateObj = new Date(dateString);
        const year = dateObj.getFullYear();
        const month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
        const day = ('0' + dateObj.getDate()).slice(-2);
        const hours = ('0' + dateObj.getHours()).slice(-2);
        const minutes = ('0' + dateObj.getMinutes()).slice(-2);
        const seconds = ('0' + dateObj.getSeconds()).slice(-2);
        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }

</script>
<body>
    <div class="main">
    <?php
        if(!array_key_exists("xp", $_SESSION)){
            ?>
                <h1 style="font-size:67px; color:black;">Congratulation, You Did It!</h1>
                <div class="c">
                    <h1 style="font-size:45px;">Chapter Summary</h1>
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
                        <span id="timespent" class="flexitems"></span>
                    </div>
                </div>
                <form method="post" action="calxpprocess.php" style="text-align:center;" id="test123">
                    <input type="hidden" id="myVariableInput" name="myVariable">
                    <input type="hidden" id="Input" name="my">
                    <input type="hidden" id="Input2" name="my2">
                    <input type="hidden" name="myArray" id="myA" value="">
                    <button type="submit" id="buton">Next</button>
                </form>
            <?php
        }
        else{
            $bol = false;
            $b = $containxp + intval($_SESSION['xp']);
            $i = 1;
            while($i < 10){//maximum level is 10
                if($level == $i){
                    if ($b >= ($i * 100)){
                        $v =$b%($i * 100);
                        $a = ceil(($b%($i * 100))/($i * 100)*100);
                        $bol = true;
                        $level += 1;
                    }
                    else{
                        $v = $b;
                        $a = ceil($b/($i * 100)*100);
                    }
                    break;
                }
                $i++;
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
                <div style="text-align: center; margin:150px auto; width:500px; background-image:linear-gradient(to bottom right,lightskyblue,#7AC0F9); padding:40px; border-radius:5px;">
                    <h1 style="padding: 15px;">Xp Gained : <?php echo $_SESSION['xp'];?></h1>
                    <h1 style="padding: 15px;">Current Xp : <?php echo $v;?></h1>
                    <h1 style="padding: 15px;">Current Level : <?php echo $level;?></h1>
                    <div class="progress progress-striped">
                        <div style="position:absolute; font-size:28px; font-weight:bold; top: 50%;left: 50%; transform: translate(-50%, -50%);">
                            <?php echo $a;?>%
                        </div>
                        <div class="progress-bar"></div>                       
                    </div> 
                </div>
                <form method="post" action="" style="text-align:center;">
                    <input type="submit" name="endbut" id="buton" value="End">
                </form>
            <?php
            if(isset($_POST['endbut'])){
                ;
            }
            echo "<script> localStorage.clear();</script>;";
            unset($_SESSION['xp']);
            unset($_SESSION['ctime']);
            unset($_SESSION['etime']);
        }
    ?>
    </div>
</body>
<script>
    document.getElementById("myVariableInput").value = xpValue;
    document.getElementById("Input").value = timeformat(Ctime);
    document.getElementById("Input2").value = timeformat(now);
    document.getElementById("myA").value = JSON.stringify(respone);

    if(CValue == null || WValue == null){
        <?php 
            echo "location.href='calachievement.php?sub=$subj'";
        ?>
    }
    else{
        document.getElementById('cAmount').textContent = CValue.toString();
        document.getElementById('wAmount').textContent = WValue.toString();
        document.getElementById('timespent').textContent = Tspent;
    }
    <?php mysqli_close($connection);?>
</script>
</html>