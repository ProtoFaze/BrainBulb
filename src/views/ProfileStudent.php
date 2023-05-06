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
        $student_id = null;
        if(isset($_POST['child'])){
            $student_id = $_POST['child'];
        }elseif(isset($_SESSION['management_id'])){
            $student_id = $_SESSION['management_id'];
        }else{
            $student_id = $_SESSION['user_id'];
            
            // $student_id = 'ST00000001';
        }





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
           SUM(TIME_TO_SEC(TIMEDIFF(end_Datetime, start_Datetime)))/3600 AS total_time
    FROM `studentquestionresponse`
    JOIN `course` ON `studentquestionresponse`.`course_ID` = `course`.`course_ID`
    JOIN `subject` ON `course`.`subject_ID` = `subject`.`subject_ID`
    WHERE studentquestionresponse.student_ID = '$student_id'
    GROUP BY subject.subject_ID";
        $performanceRequest = mysqli_query($connection, $performancesql);

        $activitysql = "SELECT 
            s.subject_Name, c.course_ID,
            (             
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
            (
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
            c.chapter_Name, sr.end_Datetime
            FROM (
            SELECT c.subject_ID, MAX(sr.end_Datetime) AS latest_datetime
            FROM studentquestionresponse sr
            INNER JOIN course c ON c.course_ID = sr.course_ID
            WHERE student_ID = '$student_id'
            GROUP BY c.subject_ID
            ) AS latest
            INNER JOIN studentquestionresponse sr ON sr.end_Datetime = latest.latest_datetime
            INNER JOIN course c ON c.course_ID = sr.course_ID
            INNER JOIN subject s ON s.subject_ID = c.subject_ID
            WHERE sr.student_ID = '$student_id'
            ORDER BY s.subject_ID";
        $activityRequest = mysqli_query($connection, $activitysql);

    //redirect to child
        if(isset($_POST['child'])){
            $child_id = $_POST['child'];
            $_SESSION['child_id'] = $child_id;
            echo "<script>windows.location.href ='#'</script>";
        }
    ?>
    <style>
        :root{
            --misc: #1cb193; /*green*/
            --bg: #d7eaf0;
            --box-primary: #79d2e4;
            --box-secondary: #29b2e0;
        }
        main{
            padding: 0px 120px;
        }
        .content_box{
            width: 100%;
            margin: 0 auto;
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
        p{
            font-size: 20px;
        }
        .split_section,.split_subsection{
            flex-grow: 1;
        }
        .expandedinfo{
            display: none;
            flex-direction: column;
            align-items: flex-start;
            padding: 0px 30px 0px 0px;
            gap: 10px;
            height: fit-content;
            /* Inside auto layout */
            flex: none;
            order: 1;
            align-self: stretch;
            flex-grow: 1;
            box-shadow: inset 0 -12px 6px rgba(0, 0, 0, 0.2);
            border-radius: var(--border-radius);
            transition: all 0.5s ease-in-out;
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
            /* Inside auto layout */

            width: 300px;
        }
        /* .column{
            flex-grow: 1;
        } */
        .expandedinfo .column{
            display: inherit;
        }
        .expandedinfo .column,.column>.heading_and_data{
            align-self: stretch;
            align-items: stretch;
        }
        h4{
            margin: 10px;
        }
        .row{
            background: linear-gradient(0deg, var(--box-primary) 20%, var(--box-secondary) 100%);
        }
        .content_box{
            background: var(--bg);
            padding:0px;
            height: max-content;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <?php include "../components/nav.php"; ?>
    </header>
    <main>
        <!-- top section containing back button, username_ID and edit button -->
        <div class="response">
        <?php if(isset($_SESSION['sourcepage']) && $_SESSION['sourcepage'] == "searchUser"){
            echo <<<HTML
                <a href="searchUser.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
                <h1>Student profile</h1>
                <a href="../backend/deleteProfile.php?id='$_SESSION[delete_id]'"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Delete Profile</button></a>
        HTML;unset($_SESSION['sourcepage']);}else{echo <<<HTML
            <a href="mainpage.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1>Student profile</h1>
            <a href="editStudent.php"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
        HTML;}?>
        </div>
        <!-- middle section containing user info, parent into -->
        <div class="split_container">
            <div class="split_section">
                <h2>Student Information</h2>
                <?php if(empty($student['profile_Picture']) || $student['profile_Picture'] == NULL){
                    echo "<img class='elipse_container' src='../../images/anonymousUser.png' alt='student picture'>";
                }else{
                    echo "<img class='elipse_container' src='".$student["profile_Picture"]."' alt='student picture'>";
                }?>
                <div class="info_ltr">
                    <div><h3>Level</h3><p><?= $student['level']?></p></div>
                    <div><h3>Experience</h3><p><?= $student['experience']?></p></div>
                    <div><h3>Grade</h3><p><?= $student['sGrade']?></p></div>
                    <div><h3>Streak</h3><p><?= $student['aFrequency']?></p></div>
                </div>
                <h4 style="align-self:start;">Details</h4>
                <div class="info_ltr"><h3>Name</h3><p><?=$student['sName']?></p></div>
                <div class="info_ltr"><h3>Parent</h3><p><?=$student['pName']?></p></div>
                <div class="info_ltr"><h3>Birthdate</h3><p><?= $student['sDOB']?></p></div>
                <div class="info_ltr"><h3>Region</h3><p><?= $student['sRegion']?></p></div>
                <div class="info_ltr"><h3>School</h3><p><?= $student['sSchool']?></p></div>
            </div>
            <div class="split_section" style="background-color: var(--bg); padding: 0;">
                <div class="split_subsection">
                    <h2>Account Information</h2>
                    <div class="info_ltr"><h3>Username</h3> <p><?= $student['username']?></p></div>
                    <div class="info_ltr"><h3>Email</h3> <p><?= $student['email']?></p></div>
                    <div class="info_ltr"><h3>IC Number</h3> <p><?= $student['ic']?></p></div>
                </div>
                <div class="split_subsection">
                    <h2>Achievements</h2>
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

        <!-- bottom section containing subject performance -->
        <div class="content_box">
        <?php if((mysqli_num_rows($performanceRequest) > 0)&&(mysqli_num_rows($activityRequest) > 0)){
            $index=0;
            while (($score = mysqli_fetch_assoc($performanceRequest))&&($activity = mysqli_fetch_assoc($activityRequest))) {
                $time = number_format($score['total_time'], 2);
                $average = ($score['correct']/$score['total_questions'])*100;
                $incorrect = $score['total_questions']-$score['correct'];
                $latestPerformance = ($activity['correct']/$activity['total_questions'])*100;
            echo <<<HTML
                    <div class="row">
                        <div class="info_ltr"><h3>$score[subject_Name]</h3></div>
                        <div class="info_ltr">Score: $average%</div>
                        <div class="info_ltr">$time Hours</div>
                        <div class="info_ltr"><button id = "course$index" class="material-symbols-outlined flex_button" onclick=expand($index)>expand_more</button></div>
                    </div>
                    <div class="expandedinfo" id = "expandedinfo$index">
                        <div style="display: flex; justify-content: space-between; align-self: stretch;"><h3>Overall Performance</h3><h3>Latest Activity </h3></div>
                        <div class="additional_info">
                            <div class="chart_frame">
                                <canvas id="barChart$index" ></canvas>
                            </div>
                            <div class="column">
                                <div class="heading_and_data">
                                    <div class="info_ltr"><h4>$activity[chapter_Name]</h4><div>$activity[correct]/$activity[total_questions]</div></div>
                                    <div class="info_ltr"><h4>completed on</h4><div>$activity[end_Datetime]</div></div >
                                </div>
                                <div class="info_ltr"><h4>Performance</h4><div>$latestPerformance%</div></div>
                            </div>
                        </div>
                    </div>
            HTML;
            echo <<<HTML
                <script type="text/javascript">
                    Chart.defaults.plugins.legend.position = "left";
                    var ctx = document.getElementById('barChart$index');
                    
                    new Chart(ctx,
                    {
                    type: 'pie',
                    data: {
                        labels: ['correct', 'incorrect'],
                        datasets: [{
                            label: 'Overall Performance',
                            data: [$score[correct],$incorrect],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            hoverOffset: 4
                        }]
                    },
                    options: {
                        aspectRatio: 2,
                    }
                    });
            </script>
            HTML;
            $index++;
        }}else{
                echo "<h2> No Study Records found </h2>";
            }?>
        </div>
    </main>
    <script src="../styles/conditionalShadows.js"></script>
    <script type="text/javascript">
        //expand button
        function expand(index) {
            var frame = document.getElementById("content_box");
            var button = document.getElementById("course" + index);
            var subjectBox = document.getElementById("expandedinfo" + index);

            if (subjectBox.style.display === "flex") {
                // Collapse the subject box
                subjectBox.style.transform = "translateY(-100%)";
                subjectBox.style.opacity = "0";
                setTimeout(function() {
                subjectBox.style.display = "none";
                subjectBox.style.transform = "";
                subjectBox.style.opacity = "";
                }, 500);

                button.style.transform = "rotateX(0deg)";

            } else {
                // Expand the subject box
                subjectBox.style.display = "flex";
                subjectBox.style.transform = "translateY(-100%)";
                subjectBox.style.opacity = "";
                setTimeout(function() {
                subjectBox.style.transform = "";
                subjectBox.style.opacity = "";
                // Scroll the main scroller of the webpage to the bottom of the expanded info
                var subjectBoxBottom = subjectBox.offsetTop + subjectBox.clientHeight;
                var bodyBottom = document.body.scrollHeight;
                window.scrollTo({
                    top: Math.min(subjectBoxBottom, bodyBottom),
                    behavior: "smooth"
                });
                }, 10);

                button.style.transform = "rotateX(180deg)";
            }
        }
    </script>
</body>
</html>