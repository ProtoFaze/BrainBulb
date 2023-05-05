<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <title>Teacher Profile</title>
    <?php 
    //load page
        include "../database/connect.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }




        $teacher_id = $_SESSION['user_ID'];
        // $teacher_id = 'TC00000001';





        // $_SESSION['parent_id'];
        $profileRequest = "SELECT * FROM teacher 
        inner join user on teacher.teacher_ID = user.teacher_ID
        WHERE teacher.teacher_ID = '$teacher_id'";
        $teacherRequest = mysqli_query($connection, $profileRequest);
        $teacher = mysqli_fetch_assoc($teacherRequest);


    //redirect to child
        if(isset($_POST['teacher_id'])){
            $teacher_id = $_POST['teacher_id'];
            $_SESSION['teacher_id'] = $teacher_id;
            echo "<script>window.location.href='materialsUpload.php'</script>";
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
        .split_section{
            flex-grow: 1;
        }
        .heading_and_data>p{
            border-bottom: 3px solid black;
            border-left: 1px solid black;
            border-bottom-left-radius: var(--border-radius);
            padding: 0px 10px 0px 20px;
        }
        .heading_and_data,.heading_and_data>h3{
            text-align: left;
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
        <?php
            if(isset($_SESSION['sourcepage']) && $_SESSION['sourcepage'] == "searchUser"){
                echo <<<HTML
                    <a href="searchUser.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
                    <h1>Teacher profile</h1>
                    <a href="deleteProfile.php?id='$_SESSION[delete_id]'"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Delete Profile</button></a>
            HTML;unset($_SESSION['sourcepage']);}else{ echo <<<HTML
                <a href="mainpage.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
                <h1>Teacher profile</h1>
                <a href="editTeacher.php"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
            HTML;}?>
        </div>

        <!-- middle section containing user info, teacher into -->
        <div class="split_container">
            <div class="split_section">
                <?php if(empty($teacher['profile_Picture']) || $teacher['profile_Picture'] = NULL){
                    echo "<img class='elipse_container' src='../../images/anonymousUser.png' alt='teacher picture'>";
                }else{
                    echo "<img class='elipse_container' src='".$teacher["profile_Picture"]."' alt='teacher picture'>";
                }?>
                <div class="info_ltr"><h3>Name</h3><div class="divider"></div><p><?=$teacher['tName']?></p></div>
                <div class="info_ltr"><h3>Birthdate</h3><div class="divider"></div><p><?= $teacher['tDOB']?></p></div>
                <div class="info_ltr"><h3>School</h3><div class="divider"></div><p><?= $teacher['tSchool']?></p></div>
                <div class="info_ltr"><h3>Region</h3><div class="divider"></div><p><?= $teacher['tRegion']?></p></div>
            </div>
            <div class="split_section" style="background-color: var(--bg); padding: 0;">
                <div class="split_subsection">
                    <div class="info_ltr"><h3>Username</h3> <div class="divider"></div><p><?= $teacher['username']?></p></div>
                    <div class="info_ltr"><h3>Email</h3> <div class="divider"></div><p><?= $teacher['email']?></p></div>
                    <div class="info_ltr"><h3>IC Number</h3> <div class="divider"></div><p><?= $teacher['ic']?></p></div>
                </div>
                <div class="split_subsection">
                    <div class="heading_and_data"><h3>Qualifications</h3><br/><p><?=$teacher['highest_Qualification']?></p></div>
                    <div class="heading_and_data"><h3>Certification</h3><br/><p><?=$teacher['professionality_Description']?></p></div>
                </div>
            </div>
        </div>

        <!-- bottom section containing children info -->
        <!-- <div class="content_box">
        </div> -->
    </main>
    <script src="../styles/conditionalShadows.js"></script>
</body>
</html>