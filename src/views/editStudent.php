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
        $user_id = 'ST00000001';
        if (substr($user_id, 0, 2) == 'ST') {
            $student_id = $user_id;
        } else if(substr($user_id, 0, 2) == 'PA') {
            $parent_id = $user_id;
        }else if (substr($user_id, 0, 2) == 'TC') {
            $teacher_id = $user_id;
        }
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
            padding: 0 15%;
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
            <a href="ProfileStudent.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1><?= $student['student_ID']?>'s profile</h1>
            <a href="editStudent.php"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
        </div>

        <!-- middle section containing user info, parent into -->
        <form class="split_container">
            <div class="split_section">
                <h2>Student Information</h2>
                <img class="elipse_container"src="<?= $student['profile_Picture']?>" alt="student picture">
                    <input type="text" class="textField" name="sGrade" original-value="<?= $student['sGrade']?>" 
                    placeholder="<?= $student['sGrade']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                    <input type="text" class="textField" id="Name" name="sName" original-value="<?=$student['sName']?>" 
                    placeholder="<?=$student['sName']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                    <input type="text" class="textField" id="Parent" name="pName" original-value="<?=$student['pName']?>" 
                    placeholder="<?=$student['pName']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                    <input type="text" class="textField" name="sDOB" original-value="<?= $student['sDOB']?>" 
                    placeholder="<?= $student['sDOB']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                    <input type="text" class="textField" name="sRegion" original-value="<?= $student['sRegion']?>" 
                    placeholder="<?= $student['sRegion']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                    <input type="text" class="textField" name="sSchool" original-value="<?= $student['sSchool']?>" 
                    placeholder="<?= $student['sSchool']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>

                </div>
            <div class="split_section"> 
                <h2>Account Information</h2>
                    <input type="text" class="textField" name="username" original-value="<?= $student['username']?>" 
                    placeholder="username:&#9;<?= $student['username']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)">
                     <input type="text" class="textField" name="email" original-value="<?= $student['email']?>"
                     placeholder="Email:&#9;<?= $student['email']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                     <input type="text" class="textField" name="ic" original-value="<?= $student['ic']?>"
                     placeholder="IC Number:&#9;<?= $student['ic']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
            </div>
        </form>
    </main>
    <!-- <script src="../styles/conditionalShadows.js"></script> -->
    <script src="../styles/togglePlaceholder.js"></script>
    <?php include_once "../backend/updateProfile.php"; ?>
</body>
</html>