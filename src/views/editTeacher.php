<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <title>Edit Teacher</title>
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
            <a href="profileTeacher.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1>Edit Teacher </h1>
        </div>

        <!-- middle section containing user info, teacher into -->
        <div class="split_container">
            <form action="../backend/updateProfile.php" method="POST" class="split_section">
                <h2>Teacher's information</h2>
                <?php if(empty($teacher['profile_Picture']) || $teacher['profile_Picture'] = NULL){
                    echo "<img class='elipse_container' src='../../images/anonymousUser.png' alt='teacher picture'>";
                }else{
                    echo "<img class='elipse_container' src='".$teacher["profile_Picture"]."' alt='teacher picture'>";
                }?>
                <input type="text" class="textField" name="tName" original-value="<?=$teacher['tName']?>" 
                placeholder="<?=$teacher['tName']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <span class="error" id="tName"><?=isset($_POST["save_teacher_details"])?$tNameError:null?></span>
                <input type="text" class="textField" name="tDOB" original-value="<?= $teacher['tDOB']?>" 
                placeholder="<?= $teacher['tDOB']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <span class="error" id="tDOB"><?=isset($_POST["save_teacher_details"])?$tDOBError:null?></span>
                <input type="text" class="textField" name="tSchool" original-value="<?= $teacher['tSchool']?>" 
                placeholder="<?= $teacher['tSchool']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <span class="error" id="tSchool"><?=isset($_POST["save_teacher_details"])?$tSchoolError:null?></span>
                <input type="text" class="textField" name="tRegion" original-value="<?= $teacher['tRegion']?>" 
                placeholder="<?= $teacher['tRegion']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <span class="error" id="tRegion"><?=isset($_POST["save_teacher_details"])?$tRegionError:null?></span>
                <input type="submit" class="flex_button" name="save_teacher_details"value="SAVE CHANGES">
            </form>
            <div class="split_section" style="background-color: var(--bg); padding: 0;">
                <form action="../backend/updateProfile.php" method="POST"  class="split_subsection">
                    <h2>Account information</h2>
                    <input type="text" class="textField" name="username" original-value="<?=$teacher['username']?>" 
                    placeholder="username:&#9;&#9;<?=$teacher['username']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                    <span class="error" id="username"><?=isset($_POST["save_account_details"])?$usernameError:null?></span>
                    <input type="text" class="textField" name="email" original-value="<?=$teacher['email']?>"
                    placeholder="email:&#9;&#9;<?=$teacher['email']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                    <span class="error" id="email"><?=isset($_POST["save_account_details"])?$emailError:null?></span>
                    <input type="text" class="textField" name="ic" original-value="<?=$teacher['ic']?>"
                    placeholder="ic:&#9;&#9;<?=$teacher['ic']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                    <span class="error" id="ic"><?=isset($_POST["save_account_details"])?$icError:null?></span>
                    <input type="submit" class="flex_button" name="save_account_details"value="SAVE CHANGES">
                </form>
                <form action="../backend/updateProfile.php" method="POST"  class="split_subsection">
                    <h2>Teacher's Qualifications</h2>
                    <div class="heading_and_data">
                        <h3>Qualifications</h3>
                        <input type="text" class="textField" name="highest_Qualification" original-value="<?=$teacher['highest_Qualification']?>" 
                        placeholder="<?=$teacher['highest_Qualification']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                        <span class="error" id="highest_Qualification"><?=isset($_POST["save_qualification_details"])?$highest_QualificationError:null?></span>
                    </div>
                    <div class="heading_and_data">
                        <h3>Certification</h3>
                        <textarea class="textField" name="professionality_Description" original-value="<?=$teacher['professionality_Description']?>" 
                        placeholder="<?=$teacher['professionality_Description']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"></textarea>
                        <span class="error" id="professionality_Description"><?=isset($_POST["save_qualification_details"])?$professionality_DescriptionError:null?></span>
                    </div>
                    <input type="submit" class="flex_button" name="save_qualification_details"value="SAVE CHANGES">
                </form>
            </div>
        </div>
    </main>
    <script src="../styles/conditionalShadows.js"></script>
    <script src="../styles/togglePlaceholder.js"></script>
</body>
</html>
