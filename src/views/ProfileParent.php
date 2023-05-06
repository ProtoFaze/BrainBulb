<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <title>Parent Profile</title>
    <?php 

    //load page
        include "../database/connect.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['management_id'])){
            $parent_id = $_SESSION['management_id'];
        }else{
            $parent_id = $_SESSION['user_id'];
            // $parent_id = 'PT00000001';
        }





        // 
        $profileRequest = "SELECT * FROM parent 
        inner join user on parent.parent_ID = user.parent_ID
        WHERE parent.parent_ID = '$parent_id'";
        $parentRequest = mysqli_query($connection, $profileRequest);
        $parent = mysqli_fetch_assoc($parentRequest);

        $childsql = "SELECT * FROM student WHERE parent_ID = '$parent_id'";
        $childRequest = mysqli_query($connection, $childsql);

    //redirect to child
        if(isset($_POST['child'])){
            $child_id = $_POST['child'];
            $_SESSION['child_id'] = $child_id;
        }
    ?>
    <style>
        main{
            padding: 0px 120px;
        }
        .content_box{
            width: 100%;
            margin: 0 auto;
            background: var(--bg);
            padding: 0px;
            height: max-content;
        }
        .row{
            align-self: stretch;
            /* height: 30%; */
        }
        .elipse_container{
            width: 100px;
            height: 100px;
        }
        a{
            text-decoration: none;
        }
        /* .split_container{
            height:100%;
        } */
        .split_section{
            flex-grow: 1;
        }
        .row{
            background-color: var(--box-primary);
        }
    </style>
</head>
<body>
    <header>
        <?php include "../components/nav.php"; ?>
    </header>
    <main>
        <div class="response">
        <!-- top section containing back button, username_ID and edit button -->
        <?php
            if(isset($_SESSION['sourcepage']) && $_SESSION['sourcepage'] == "searchUser"){
                echo <<<HTML
                <a href="searchUser.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
                <h1>Parent profile</h1>
                <a href="../backend/deleteProfile.php?id='$_SESSION[delete_id]'"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Delete Profile</button></a>
            HTML;
            unset($_SESSION['sourcepage']);}else{echo <<<HTML
                <a href="mainpage.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
                <h1>Parent profile</h1>
                <a href="editParent.php?parent_ID=$parent_id"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
            HTML;}?>
        </div>

        <!-- middle section containing user info, parent into -->
        <div class="split_container">
            <div class="split_section">
                <h2>Parent's information</h2>
                <?php if(empty($parent['profile_Picture']) || $parent['profile_Picture'] == NULL){
                    echo "<img class='elipse_container' src='../../images/anonymousUser.png' alt='parent picture'>";
                }else{
                    echo "<img class='elipse_container' src='".$parent["profile_Picture"]."' alt='parent picture'>";
                }?>
                <div class="info_ltr"><h3>Number of children</h3><p><?= mysqli_num_rows($childRequest)?></p></div>
                <div class="info_ltr"><h3>Name</h3><p><?=$parent['pName']?></p></div>
                <div class="info_ltr"><h3>birthdate</h3><p><?= $parent['pDOB']?></p></div>
            </div>
            <div class="split_section">
                <h2>account information</h2>
                <div class="info_ltr"><h3>Username</h3> <p><?= $parent['username']?></p></div>
                <div class="info_ltr"><h3>Email</h3> <p><?= $parent['email']?></p></div>
                <div class="info_ltr"><h3>IC Number</h3> <p><?= $parent['ic']?></p></div>
            </div>
        </div>

        <!-- bottom section containing children info -->
        <div class="content_box">
        <?php if(mysqli_num_rows($childRequest) > 0){
            while ($child = mysqli_fetch_assoc($childRequest)) {

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
         WHERE studentquestionresponse.student_ID = '".$child['student_ID']."'
         GROUP BY subject.subject_ID";
            $performanceRequest = mysqli_query($connection, $performancesql);
            $total = $overall = $rounded = null;
            while($performance = mysqli_fetch_assoc($performanceRequest)){
                $average = ($performance['correct']/$performance['total_questions'])*100;
                $total += $average;
            }
            if($total == null){
                $rounded = 0;
            }else{
                $overall = ($total/mysqli_num_rows($performanceRequest));
                $rounded = round($overall, 2);
            }


            echo <<<HTML
                <div class="row">
                    
                    <div class="info_ltr">$child[student_ID]</div>
                    <div class="info_ltr">$child[sName]</div>
                    <div class="info_ltr">Score : $rounded %</div>
                    <div class="info_ltr">Streak: $child[aFrequency]</div>
                    <form action="./profileStudent.php" method="post">
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