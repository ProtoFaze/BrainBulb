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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
</head>
<style>
    
    *{
        margin: 0;
    }

    body {

    }

    .main{
        background: linear-gradient(180deg, #46d6e2, 5%, #38beca, 50%, #17687d);
        height: auto;
        width: 100%;
        position: absolute;
    }

    .dots{
        height: 60px;
        width: 60px;
        border: 3px solid rgba(255, 255, 255, 0.7);
        border-radius: 50px;
        position: absolute;
        top: 10%;
        left: 10%;
        animation: 4s linear infinite;
    }
    
    .dot{
        height: 10px;
        width: 10px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.5);
        position: absolute;
        top: 20%;
        right: 20%;
    }
    <?php for ($i = 1; $i <= 20; $i++) : ?>
        .dots:nth-child(<?php echo $i; ?>) {
            top: <?php echo rand(15,90); ?>%;
            left: <?php echo rand(1,90); ?>%;
            animation: animate <?php echo rand(3,10);?>s linear infinite;
        }
    <?php endfor; ?>
    <?php 
        $arr = [1.0,1.1,1.2,1.3];
        $arr2 = [30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130];
    ?>
    <?php for ($i = 1; $i <= 20; $i++) : ?>
        @keyframes animate {
            0% {
                transform: scale(0) translateY(0) rotate(<?php echo $arr2[rand(0,10)]; ?>deg);
            }
            100% {
                transform: scale(1.3) translateY(-100px) rotate(360deg);
            }
        }
    <?php endfor; ?>    

    .con{
        margin: 50px 100px;
    }

    .idea{
        margin: 30px auto;
        background-color: lightcyan;
        text-align: center;
        padding: 10px 25px;
        font-size: 30px;
        border-radius: 5px;
        text-align: justify;
        line-height: 1.5;
        display:flex;
    }

    .start{
        background-color: lightblue;
        text-align: center;
        padding: 25px;
        font-size: 26px;
        border-radius: 7px;
        border:none;
        font-weight: bold;
        cursor: pointer;
        margin: 10px 0;
    }

    .start:hover{
        transform: scale(1.06);
    }

    .start:active{
        transform: scale(0.95);
    }

    .sub{
        float:left;
        display:flex; 
        flex-direction:column; 
        margin:20px;
    }
    .sub a{
        color:black;
        text-decoration: none;
    }

    .filter{
        text-align: center;
        padding: 15px;
        font-size: 20px;
        border-radius: 7px;
        border:none;
        font-weight: bold;
        cursor: pointer;
        /* margin: 10px 0; */
        margin:0 10px;
        outline: none;
        background-color: lightcyan;
    }

    .filter option{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    #filterbtn:hover{
        transform: scale(1.06);
    }

    #filterbtn:active{
        transform: scale(0.95);
    }

    #choice, #choice2{
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('../../images/dropdown-arrow1.png');
        background-position: right;
        background-repeat: no-repeat;
        padding-right: 45px;
    }

</style>
<?php
    include "../database/connect.php";
    include("../components/nav.php");
    if(isset($_SESSION['teach']) && isset($_SESSION['sub'])){
        if($_SESSION['teach'] != "" && $_SESSION['sub'] != ""){
            $temp = $_SESSION['teach'];
            $subID = $_SESSION['sub'];
            $query = "SELECT * FROM ((course INNER JOIN `subject` ON subject.subject_ID = course.subject_ID) INNER JOIN `teacher` ON teacher.teacher_ID = course.teacher_ID) WHERE course.question_Type = 'Customised Quiz' AND course.teacher_ID = '$temp' AND subject.subject_ID = '$subID'";
        }
        else if($_SESSION['teach'] != "" && $_SESSION['sub'] == ""){
            $temp = $_SESSION['teach'];
            $query = "SELECT * FROM ((course INNER JOIN `subject` ON subject.subject_ID = course.subject_ID) INNER JOIN `teacher` ON teacher.teacher_ID = course.teacher_ID) WHERE course.question_Type = 'Customised Quiz' AND course.teacher_ID = '$temp'";
        }
        else if($_SESSION['teach'] == "" && $_SESSION['sub'] != ""){
            $temp = $_SESSION['sub'];
            $query = "SELECT * FROM ((course INNER JOIN `subject` ON subject.subject_ID = course.subject_ID) INNER JOIN `teacher` ON teacher.teacher_ID = course.teacher_ID) WHERE course.question_Type = 'Customised Quiz' AND subject.subject_ID = '$temp'";
        }
        else{
            $query = "SELECT * FROM ((course INNER JOIN `subject` ON subject.subject_ID = course.subject_ID) INNER JOIN `teacher` ON teacher.teacher_ID = course.teacher_ID) WHERE course.question_Type = 'Customised Quiz'";
        }
    }
    else{
        $query = "SELECT * FROM ((course INNER JOIN `subject` ON subject.subject_ID = course.subject_ID) INNER JOIN `teacher` ON teacher.teacher_ID = course.teacher_ID) WHERE course.question_Type = 'Customised Quiz'";
    }
    
    $results = mysqli_query($connection,$query);
    $count = mysqli_num_rows($results);
?>
<body>
    <div class="main">
        <div class="con">
        <?php
            for($i = 0; $i < 20; $i++){
                echo "<div class='dots'><span class='dot'></span></div>";
            } 
        ?>
        <div style="margin:50px auto; padding:10px; display: flex;">
            <div style="width: 62%; display:flex; float:left;">
                <h1 style='font-size:35px;'>Teachers' Quiz and Learning Materials</h1>
            </div>
            <div style="width: 38%; display:flex; float:left;">
                <form action="" method="post">
                    <select name="select1" id="choice" class="filter">
                        <option value="">Teacher Name</option>
                        <?php
                            $query1 = "SELECT DISTINCT course.teacher_ID, teacher.tName FROM course INNER JOIN teacher ON teacher.teacher_ID = course.teacher_ID WHERE course.question_Type = 'Customised Quiz'";
                            $results1 = mysqli_query($connection,$query1);
                            while ($row = mysqli_fetch_assoc($results1)) {
                                echo "<option value=".$row['teacher_ID'].">".$row['tName']."</option>";
                            }
                        ?>
                    </select>
                    <select name="select2" id="choice2" class="filter">
                        <option value="">Subject</option>
                        <?php
                            $query1 = "SELECT DISTINCT subject.subject_Name, subject.subject_ID FROM course INNER JOIN subject ON subject.subject_ID = course.subject_ID WHERE course.question_Type = 'Customised Quiz';";
                            $results1 = mysqli_query($connection,$query1);
                            while ($row = mysqli_fetch_assoc($results1)) {
                                echo "<option value=".$row['subject_ID'].">".$row['subject_Name']."</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" value="Filter" name="filbtn" class="filter" id="filterbtn">
                </form>
            </div>
        </div>
        <?php
            if($count > 0){
                while ($row = mysqli_fetch_assoc($results)) {
                    ?>
                    <div class="idea">
                        <div class="sub" style="width: 70%;">
                            <b style="font-size:40px; margin-bottom:10px;"><?php echo $row['chapter_Name'];?></b>
                            <p><?php echo $row['tName'];?></p>
                            <p><?php echo $row['subject_Name'];?></p>
                        </div>
                        <div class="sub" style="width: 30%;">
                            <a href="Quiz.php?id=<?php echo $row['course_ID'];?>">
                                <div class="start">Start Quiz</div>
                            </a>
                            <a href="studentviewmaterial.php?id=<?php echo $row['course_ID'];?>">
                                <div class="start">Learning Materials</div>
                            </a>
                        </div>
                    </div>
                    <?php
                }
            }
            else{
                echo "<center><h1 style='font-size: 40px;'>No Teachers' Quiz Found</h1></center>";
                echo "<div style='height:500px;'></div>";
            }

            if(isset($_POST['filbtn'])){
                $_SESSION['teach'] = $_POST['select1'];
                $_SESSION['sub'] = $_POST['select2'];
                echo "<script> location.href='studentviewquiz.php'</script>";
            }
        ?>
            <div style="clear:both;"></div>
        </div>
    </div>
    <script>
        // $('.dropdown-el').click(function(e) {
        //     e.preventDefault();
        //     e.stopPropagation();
        //     $(this).toggleClass('expanded');
        //     $('#'+$(e.target).attr('for')).prop('checked',true);
        // });
        // $(document).click(function() {
        //     $('.dropdown-el').removeClass('expanded');
        // });
    </script>
</body>
</html>