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

        // $student_id = $_SESSION['user_id'];
        $teacher_id; $parent_id; $student_id;
        $user_id = 'PT00000001';
        if (substr($user_id, 0, 2) == 'ST') {
            $student_id = $user_id;
        } else if(substr($user_id, 0, 2) == 'PA') {
            $parent_id = $user_id;
        }else if (substr($user_id, 0, 2) == 'TC') {
            $teacher_id = $user_id;
        }
        echo $teacher_id;
        // $_SESSION['student_id'];
        //user info
        $profileRequest = "SELECT * FROM student 
        inner join user on student.student_ID = user.student_ID
        inner join parent on student.parent_ID = parent.parent_ID
        WHERE student.student_ID = '$student_id'";
        $studentRequest = mysqli_query($connection, $profileRequest);
        $student = mysqli_fetch_assoc($studentRequest);


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
        p{
            font-size: 20px;
        }
        .split_section,.split_subsection{
            flex-grow: 1;
        }
        h4{
            margin: 10px;
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
            <a href="mainpageStudent.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1><?= $student['student_ID']?>'s profile</h1>
            <a href="editStudent.php"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
        </div>

        <!-- middle section containing user info, parent into -->
        <form class="split_container">
            <div class="split_section">
                <h3>Student Information</h3>
                <img class="elipse_container"src="<?= $student['profile_Picture']?>" alt="student picture">
                <div class="info_ltr"><h3>Grade</h3><input type="text" class="textField" name="sGrade" placeholder="<?= $student['sGrade']?>"/></div>
                <div class="info_ltr"><h3>Name</h3><input type="text" class="textField" name="sName" placeholder="<?=$student['sName']?>"/></div>
                <div class="info_ltr"><h3>Parent</h3><input type="text" class="textField" name="pName" placeholder="<?=$student['pName']?>"/></div>
                <div class="info_ltr"><h3>Birthdate</h3><input type="text" class="textField" name="sDOB" placeholder="<?= $student['sDOB']?>"/></div>
                <div class="info_ltr"><h3>Region</h3><input type="text" class="textField" name="sRegion" placeholder="<?= $student['sRegion']?>"/></div>
                <div class="info_ltr"><h3>School</h3><input type="text" class="textField" name="sSchool" placeholder="<?= $student['sSchool']?>"/></div>
            </div>
            <div class="split_section" style="background-color: var(--bg); padding: 0;">
                <h3>Account Information</h3>
                <div class="info_ltr"><h3>Username</h3> <input type="text" class="textField" name="username" placeholder="<?= $student['username']?>"/></div>
                <div class="info_ltr"><h3>Email</h3> <input type="text" class="textField" name="email" placeholder="<?= $student['email']?>"/></div>
                <div class="info_ltr"><h3>IC Number</h3> <input type="text" class="textField" name="ic" placeholder="<?= $student['ic']?>"/></div>
            </div>
        </form>
    </main>
    <!-- <script src="../styles/conditionalShadows.js"></script> -->
</body>
</html>