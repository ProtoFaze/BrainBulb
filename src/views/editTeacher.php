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




        // $teacher_id = $_SESSION['user_id'];
        $teacher_id = 'TC00000001';





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
        .heading_and_data>h3{
            margin: 1%
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
            <a href="mainpageTeacher.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1><?= $teacher['teacher_ID']?>'s profile</h1>
        </div>

        <!-- middle section containing user info, teacher into -->
        <form class="split_container" method="POST">
            <div class="split_section">
                <h3>Teacher's information</h3>
                <img class="elipse_container"src="<?=$teacher['profile_Picture']?>" alt="teacher picture">
                <div class="info_ltr"><h3>Name</h3><input type="text" class="textField" name="tName" placeholder="<?=$teacher['tName']?>"/></div>
                <div class="info_ltr"><h3>Birthdate</h3><input type="text" class="textField" name="tDOB" placeholder="<?= $teacher['tDOB']?>"/></div>
                <div class="info_ltr"><h3>School</h3><input type="text" class="textField" name="tSchool" placeholder="<?= $teacher['tSchool']?>"/></div>
                <div class="info_ltr"><h3>Region</h3><input type="text" class="textField" name="tRegion" placeholder="<?= $teacher['tRegion']?>"/></div>
            </div>
            <div class="split_section" style="background-color: var(--bg); padding: 0;">
                <div class="split_subsection">
                    <h3>Account information</h3>
                    <div class="info_ltr"><h3>Username</h3><input type="text" class="textField" name="username" placeholder="<?= $teacher['username']?>"/></div>
                    <div class="info_ltr"><h3>Email</h3><input type="text" class="textField" name="email" placeholder="<?= $teacher['email']?>"/></div>
                    <div class="info_ltr"><h3>IC Number</h3><input type="text" class="textField" name="ic" placeholder="<?= $teacher['ic']?>"/></div>
                </div>
                <div class="split_subsection">
                    <h3>Teacher's Qualifications</h3>
                    <div class="heading_and_data"><h3>Qualifications</h3><br/><input type="text" class="textField" name="highest_Qualification" placeholder="<?=$teacher['highest_Qualification']?>"/></div>
                    <div class="heading_and_data"><h3>Certification</h3><br/><textarea type="text" class="textArea" name="highest_Qualification" placeholder="<?=$teacher['professionality_Description']?>"></textarea>
                </div>
            </div>
            <input type="submit" name="submit" id="submit" placeholder="Save">
        </form>
    </main>
    <script src="../styles/conditionalShadows.js"></script>
</body>
</html>
<?php 
    if(isset($_POST["submit"])){
        //validate input
        $editsql = "UPDATE teacher SET tName = '".$_POST["tName"]."', tDOB = '".$_POST["tDOB"]."', tSchool = '".$_POST["tSchool"]."', tRegion = '".$_POST["tRegion"]."', highest_Qualification = '".$_POST["highest_Qualification"]."', professionality_Description = '".$_POST["professionality_Description"]."' WHERE teacher_ID = '".$_SESSION["teacher_ID"]."';
        UPDATE user SET username = '".$_POST["username"]."', email = '".$_POST["email"]."', ic = '".$_POST["ic"]."' WHERE teacher_ID = '".$_SESSION["teacher_ID"]."'";
        if(mysqli_query($connection, $editsql)){
            echo '<script>alert("Profile updated successfully")</script>';
            echo "<script>window.location.href='mainpageTeacher.php'</script>";
        }else{
            echo '<script>alert("Profile update failed")</script>';
        }
    }?>