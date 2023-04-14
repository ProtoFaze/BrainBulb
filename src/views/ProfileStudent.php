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
        $performancesql = "SELECT * FROM student WHERE student_ID = '$student_id'";
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
    </style>
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
        <?php if(mysqli_num_rows($childRequest) > 0){
            while ($child = mysqli_fetch_assoc($childRequest)) {
            echo <<<HTML
                <div class="row">
                    <div class="info_ltr">$child[student_ID]</div>
                    <div class="info_ltr">$child[sName]</div>
                    <div class="info_ltr">Score : $child[sGrade]</div>
                    <div class="info_ltr">Streak: $child[aFrequency]</div>
                    <form action="window.location.href = 'mainpage.php'" method="post">
                        <input type="hidden" name="child" value="$child[student_ID]">
                        <button class="materials-symbols-outlined flex_button" type="submit">More Details<span class="material-symbols-outlined">arrow_forward_ios</span></button>
                    </form>
                </div>
            HTML;
        }}else{
                echo "<h2> No children found </h2>";
            }?>
        </div>
    </main>
</body>
</html>