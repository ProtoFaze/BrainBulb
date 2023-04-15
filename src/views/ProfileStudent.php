<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <title>Student Profile</title>
    <?php 
    //load page
        include "../database/connect.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }





        $student_id = 'ST00000001';





        // $_SESSION['student_id'];
        //user info
        $profileRequest = "SELECT * FROM student 
        inner join user on student.student_ID = user.student_ID
        inner join parent on student.parent_ID = parent.parent_ID
        WHERE student.student_ID = '$student_id'";
        $studentRequest = mysqli_query($connection, $profileRequest);
        $student = mysqli_fetch_assoc($studentRequest);

        //achievement
        $achievementSQL = "SELECT * FROM achievement 
        INNER JOIN student_achievement ON achievement.achievement_ID = student_achievement.achievement_ID
        WHERE student_ID = '$student_id' AND achievementDate IS NOT NULL";
        $achievementRequest = mysqli_query($connection, $achievementSQL);

        //student performance
        // need subject name  from subject table
        // need average score from average score of student response
        // need total time
        $performancesql = "SELECT `subject`.`subject_Name`,
           SUM(             
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
           ) AS total_questions,
           SUM(TIME_TO_SEC(TIMEDIFF(learning_record.end_Datetime, learning_record.start_Datetime)))/3600 AS total_time
    FROM `studentquestionresponse`
    JOIN `course` ON `studentquestionresponse`.`course_ID` = `course`.`course_ID`
    JOIN `subject` ON `course`.`subject_ID` = `subject`.`subject_ID`
    JOIN `learning_record` ON `learning_record`.`course_ID` = `course`.`course_ID`
    WHERE studentquestionresponse.student_ID = '$student_id'
    GROUP BY subject.subject_ID";
        $performanceRequest = mysqli_query($connection, $performancesql);

    //redirect to child
        if(isset($_POST['child'])){
            $child_id = $_POST['child'];
            $_SESSION['child_id'] = $child_id;
            echo "<script>windows.location.href ='#'</script>";
        }
    ?>
    <style>
        main{
            padding: 0px 120px;
        }
        .content_box{
            height:300px;
            width: 100%;
            margin: 0 auto;
            padding: 0px 50px;
        }
        .row{
            align-self: stretch;
            height: 30%;
        }
        .elipse_container{
            width: 100px;
            height: 100px;
        }
        a{
            text-decoration: none;
        }
        .split_section,.split_subsection{
            flex-grow: 1;
        }
        .expandedinfo{
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 0px 30px 0px 0px;
            gap: 10px;

            /* Inside auto layout */
            flex: none;
            order: 1;
            align-self: stretch;
            flex-grow: 0;
        }
        .expandedinfo>h3{
            display: flex;
            align-items: center;
            text-transform: uppercase;
            line-height: 0.1;
            /* Inside auto layout */
            flex: none;
            order: 0;
            flex-grow: 0;
        }
        .expandedinfo>.additional_info{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 0px 30px 30px;
            gap: 10px;
            /* Inside auto layout */
            flex: none;
            order: 1;
            align-self: stretch;
            flex-grow: 0;
        }
        .expandedinfo>.additional_info>.chart_frame{
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            padding: 0px;
            gap: var(--gap);
            /* Inside auto layout */
            flex: none;
            order: 0;
            flex-grow: 0;
            width: 10%;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        function expand(element){
            var subjectRow = document.getElementById(element);
            if (subjectRow.style.display === "none") {
                subjectRow.style.display = "block";
            } else {
                subjectRow.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <header>
        <?php include "../components/nav.php"; ?>
    </header>
    <main>
        <!-- top section containing back button, username_ID and edit button -->
        <div class="response">
            <a href="mainpageStudent.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1><?= $student['student_ID']?>'s profile</h1>
            <a href="editParent.php"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
        </div>

        <!-- middle section containing user info, parent into -->
        <div class="split_container">
            <div class="split_section">
                <img class="elipse_container"src="<?= $student['profile_Picture']?>" alt="student picture">
                <div class="info_ltr">
                    <h3>LV</h3><p><?= $student['level']?></p>
                    <h3>Grade</h3><p><?= $student['sGrade']?></p>
                    <h3>Streak</h3><p><?= $student['aFrequency']?></p>
                </div>
                <div class="info_ltr"><h3>Name</h3><p><?=$student['sName']?></p></div>
                <div class="info_ltr"><h3>Parent</h3><p><?=$student['pName']?></p></div>
                <div class="info_ltr"><h3>Birthdate</h3><p><?= $student['sDOB']?></p></div>
                <div class="info_ltr"><h3>Region</h3><p><?= $student['sRegion']?></p></div>
                <div class="info_ltr"><h3>School</h3><p><?= $student['sSchool']?></p></div>
            </div>
            <div class="split_section" style="background-color: var(--bg); padding: 0;">
                <div class="split_subsection">
                    <div class="info_ltr"><h3>Username</h3> <p><?= $student['username']?></p></div>
                    <div class="info_ltr"><h3>Email</h3> <p><?= $student['email']?></p></div>
                    <div class="info_ltr"><h3>IC Number</h3> <p><?= $student['ic']?></p></div>
                </div>
                <div class="split_subsection">
                <?php if(mysqli_num_rows($achievementRequest)>0){
                    while ($achievement = mysqli_fetch_assoc($achievementRequest)) {
                        echo <<<HTML
                        <div class="row">
                            <div class="info_ltr"><h3>title</h3> <p>$achievement[title]</p></div>
                            <div class="info_ltr"><h3>date</h3> <p>$achievement[achievementDate]</p></div>
                            <div class="info_ltr"><h3>Description</h3> <p>$achievement[Description]</p></div>
                        </div>
                        HTML;
                    }
                }else{
                    echo"<h2>No achivements Unlocked</h2>";
                }?>
                </div>
            </div>
        </div>

        <!-- bottom section containing children info -->
        <div class="content_box">
        <?php if(mysqli_num_rows($performanceRequest) > 0){
            $index=0;
            while ($score = mysqli_fetch_assoc($performanceRequest)) {
                $time = number_format($score['total_time'], 2);
                $average = (($score['correct']/$score['total_questions'])*100);
                $incorrect = $score['total_questions']-$score['correct'];
            echo <<<HTML
                    <div class="row">
                        <div class="info_ltr"><h3>$score[subject_Name]</h3></div>
                        <div class="info_ltr">Score: $average%</div>
                        <div class="info_ltr">$time Hours</div>
                        <div class="info_ltr"><button id = "course$index" class="material-symbols-outlined flex_button" onclick=expand(this)>expand_more</button></div>
                    </div>
                    <div class="expandedinfo">
                        <h3>Performance</h3>
                        <div class="additional_info">
                            <div class="chart_frame">
                                <canvas id="barChart$index"></canvas>
                            </div>
                        </div>
                    </div>
            HTML;
            echo <<<JS
                <script type="text/javascript">
                    var ctx = document.getElementById('barChart$index');
                    new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['correct', 'incorrect'],
                        datasets: [{
                        label: 'Overall Performance',
                        data: [$score[correct],$incorrect],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ]}]}
                    }
                    );
            </script>
            JS;
            $index++;
        }}else{
                echo "<h2> No children found </h2>";
            }?>
        </div>
    </main>
</body>
</html>
<!-- /* chart frame */

/* Auto layout */


width: 472px;
height: 240px;





/* Frame 6 */

/* Auto layout */
display: flex;
flex-direction: column;
align-items: flex-start;
padding: 0px;
gap: 10px;

width: 150px;
height: 109px;


/* Inside auto layout */
flex: none;
order: 1;
flex-grow: 0;


/* Legend: */

width: 92px;
height: 29px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 24px;
line-height: 29px;
/* identical to box height */
text-align: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* color code */

/* Auto layout */
display: flex;
flex-direction: column;
align-items: flex-start;
padding: 0px;
gap: 10px;

width: 150px;
height: 70px;


/* Inside auto layout */
flex: none;
order: 1;
flex-grow: 0;


/* Frame 4 */

/* Auto layout */
display: flex;
flex-direction: row;
align-items: center;
padding: 0px;
gap: 30px;

width: 150px;
height: 30px;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Rectangle 28 */

width: 32px;
height: 30px;

background: #FFFFFF;
border-radius: 10px;

/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Correct */

width: 57px;
height: 19px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
text-align: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 1;
flex-grow: 0;


/* Frame 5 */

/* Auto layout */
display: flex;
flex-direction: row;
align-items: center;
padding: 0px;
gap: 30px;

width: 150px;
height: 30px;


/* Inside auto layout */
flex: none;
order: 1;
flex-grow: 0;


/* Rectangle 29 */

width: 32px;
height: 30px;

background: #000000;
border-radius: 10px;

/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Wrong */

width: 49px;
height: 19px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 16px;
line-height: 19px;
display: flex;
align-items: center;
text-align: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 1;
flex-grow: 0;


/* recent info */

/* Auto layout */
display: flex;
flex-direction: column;
justify-content: space-between;
align-items: flex-start;
padding: 0px;
gap: 30px;

width: 469px;
height: 240px;


/* Inside auto layout */
flex: none;
order: 1;
align-self: stretch;
flex-grow: 0;


/* Chart */

/* Auto layout */
display: flex;
flex-direction: column;
align-items: flex-start;
padding: 0px;

width: 469px;
height: 80px;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Latest activity: */

width: 174px;
height: 30px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
display: flex;
align-items: center;
text-align: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Frame 9 */

/* Auto layout */
display: flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
padding: 0px;

width: 469px;
height: 50px;


/* Inside auto layout */
flex: none;
order: 1;
align-self: stretch;
flex-grow: 0;


/* questionName */

box-sizing: border-box;

/* Auto layout */
display: flex;
flex-direction: row;
align-items: flex-start;
padding: 10px;
gap: 10px;

width: 306px;
height: 50px;

border-width: 0px 0px 1px 1px;
border-style: solid;
border-color: #000000;
border-radius: 0px 0px 0px 10px;

/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* CourseName */

width: 154px;
height: 30px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
display: flex;
align-items: center;
text-align: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Score */

box-sizing: border-box;

/* Auto layout */
display: flex;
flex-direction: row;
align-items: flex-start;
padding: 10px;
gap: 10px;

width: 124px;
height: 50px;

border-width: 1px 1px 0px 0px;
border-style: solid;
border-color: #000000;
border-radius: 0px 10px 0px 0px;

/* Inside auto layout */
flex: none;
order: 1;
flex-grow: 0;


/* ###/### */

width: 104px;
height: 30px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 25px;
line-height: 30px;
display: flex;
align-items: center;
text-align: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* Frame 6 */

/* Auto layout */
display: flex;
flex-direction: row;
justify-content: space-between;
align-items: center;
padding: 0px;
gap: 10px;

width: 469px;
height: 58px;


/* Inside auto layout */
flex: none;
order: 1;
align-self: stretch;
flex-grow: 0;


/* Overall performance */

width: 146px;
height: 58px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 24px;
line-height: 29px;

color: #000000;


/* Inside auto layout */
flex: none;
order: 0;
flex-grow: 0;


/* ##% */

width: 83px;
height: 58px;

font-family: 'Inter';
font-style: normal;
font-weight: 400;
font-size: 40px;
line-height: 48px;
display: flex;
align-items: center;

color: #000000;


/* Inside auto layout */
flex: none;
order: 1;
align-self: stretch;
flex-grow: 0; -->
