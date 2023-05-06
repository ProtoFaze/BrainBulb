<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <title>Edit Student</title>
    <?php 
    //load page
        include "../database/connect.php";
        include_once "../backend/displayErr.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // $student_id = $_SESSION['user_id'];
        $student_id = 'ST00000001';

        //user info
        $profileRequest = "SELECT * FROM student 
        inner join user on student.student_ID = user.student_ID
        inner join parent on student.parent_ID = parent.parent_ID
        WHERE student.student_ID = '$student_id'";
        $studentRequest = mysqli_query($connection, $profileRequest);
        $student = mysqli_fetch_assoc($studentRequest);


    //redirect to child
        if(isset($_SESSION['child'])){
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
            width: 150px;
            height: 150px;
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
            <h1>Edit Student</h1>
        </div>

        <!-- middle section containing user info, parent into -->
        <div class="split_container">
            <form action="../backend/updateProfile.php" method = "POST" class="split_section" enctype="multipart/form-data">
                <h2>Student Information</h2>
                <?php if(empty($student['profile_Picture']) || $student['profile_Picture'] == NULL){
                    echo "<label for='file_input'><img id='preview-image' class='elipse_container' src='../../images/anonymousUser.png' alt='student picture'></label>
                    <input type='file' id='file_input' name='profile_Picture' style='display:none;' onchange='previewImage();'>";
                }else{
                    echo "<label for='file_input'><img id='preview-image' class='elipse_container' src='".$student["profile_Picture"]."' alt='student picture'></label>
                    <input type='file' id='file_input' name='profile_Picture' style='display:none;' onchange='previewImage();'>";
                }?>
                <select name="sGrade" original-value="<?= $student['sGrade']?>">
                    <option value="<?= $student['sGrade']?>">Default <?= $student['sGrade']?></option>
                    <option value="Standard 1">Standard 1</option>
                    <option value="Standard 2">Standard 2</option>
                    <option value="Standard 3">Standard 3</option>
                    <option value="Standard 4">Standard 4</option>
                    <option value="Standard 5">Standard 5</option>
                    <option value="Standard 6">Standard 6</option>
                </select>
                <?php showErr("sGrade");?>
                <input type="text" class="textField" id="Name" name="sName" original-value="<?=$student['sName']?>" 
                placeholder="<?=$student['sName']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("sName");?>
                <input type="text" class="textField" name="sDOB" original-value="<?= $student['sDOB']?>" 
                placeholder="<?= $student['sDOB']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("sDOB");?>
                <input type="text" class="textField" name="sRegion" original-value="<?= $student['sRegion']?>" 
                placeholder="<?= $student['sRegion']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("sRegion");?>
                <input type="text" class="textField" name="sSchool" original-value="<?= $student['sSchool']?>" 
                placeholder="<?= $student['sSchool']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("sSchool");?>
                <input type="submit" class="flex_button" name="save_student_details"value="SAVE CHANGES">
            </form >
            <form action="../backend/updateProfile.php" method = "POST" class="split_section"> 
                <h2>Account Information</h2>
                    <input type="text" class="textField" name="username" original-value="<?= $student['username']?>" 
                    placeholder="username:&#9;<?= $student['username']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)">
                    <?php showErr("username");?>
                    <input type="text" class="textField" name="email" original-value="<?= $student['email']?>"
                    placeholder="Email:&#9;<?= $student['email']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                    <?php showErr("email");?>
                    <input type="text" class="textField" name="ic" original-value="<?= $student['ic']?>"
                    placeholder="IC Number:&#9;<?= $student['ic']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                    <?php showErr("ic");?>
                    <input type="submit" class="flex_button" name="save_account_details"value="SAVE CHANGES">
            </form >
        </div>
    </main>
    <!-- <script src="../styles/conditionalShadows.js"></script> -->
    <script src="../styles/togglePlaceholder.js"></script>
    <script src="../styles/previewImage.js"></script>
</body>
</html>