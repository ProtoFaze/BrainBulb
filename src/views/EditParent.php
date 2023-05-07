<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <title>Edit Parent</title>
    <?php 
    //load page
        include "../database/connect.php";
        include_once "../backend/displayErr.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }




        $parent_id = $_GET['parent_ID'];
        echo $parent_id;
        // $parent_id = 'PT00000001';





        // $_SESSION['parent_id'];
        $profileRequest = "SELECT * FROM parent 
        inner join user on parent.parent_ID = user.parent_ID
        WHERE parent.parent_ID = '$parent_id'";
        $parentRequest = mysqli_query($connection, $profileRequest);
        $parent = mysqli_fetch_assoc($parentRequest);

        // $childsql = "SELECT * FROM student WHERE parent_ID = '$parent_id'";
        // $childRequest = mysqli_query($connection, $childsql);

    //redirect to child
        if(isset($_POST['child'])){
            $child_id = $_POST['child'];
            $_SESSION['child_id'] = $child_id;
            header("Location: ../views/ProfileChild.php");
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
            width: 150px;
            height: 150px;
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
    </style>
</head>
<body>
    <header>
        <?php include "../components/nav.php"; ?>
    </header>
    <main>
        <!-- top section containing back button, username_ID and edit button -->
        <div class="response">
            <a href="ProfileParent.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1>Edit Parent</h1>
        </div>

        <!-- middle section containing user info, parent into -->
        <div class="split_container">
            <form action="../backend/updateProfile.php" class="split_section" method="POST" enctype="multipart/form-data">
                <h2>Parent's information</h2>
                <?php if(empty($parent['profile_Picture']) || $parent['profile_Picture'] == NULL){
                    echo "<label for='file_input'><img id='preview-image' class='elipse_container' src='../../images/anonymousUser.png' alt='parent picture'></label>
                    <input type='file' id='file_input' name='profile_Picture' style='display:none;' onchange='previewImage();'>";
                }else{
                    echo "<label for='file_input'><img id='preview-image' class='elipse_container' src='".$parent["profile_Picture"]."' alt='parent picture'></label>
                    <input type='file' id='file_input' name='profile_Picture' style='display:none;' onchange='previewImage();'>";
                }
                showErr("profile_Picture");?>
                <input type="text" class="textField" id="Parent" name="pName" original-value="<?=$parent['pName']?>" 
                placeholder="<?=$parent['pName']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("pName");?>
                <input type="text" class="textField" name="spDOB" original-value="<?= $parent['pDOB']?>" 
                placeholder="<?= $parent['pDOB']?>" onblur="showPlaceholder(this)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("spDOB");?>
                <input type="submit" class="flex_button" name="save_parent_details"value="SAVE CHANGES">
            </form>
            <form action="../backend/updateProfile.php" class="split_section" method="POST" enctype="multipart/form-data">
                <h2>account information</h2>
                <input type="text" class="textField" name="username" original-value="<?= $parent['username']?>" 
                placeholder="username:&#9;<?= $parent['username']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)">
                <?php showErr("username");?>
                <input type="text" class="textField" name="email" original-value="<?= $parent['email']?>"
                placeholder="email:&#9;&#9;<?= $parent['email']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("email");?>
                <input type="text" class="textField" name="ic" original-value="<?= $parent['ic']?>"
                placeholder="ic:&#9;&#9;&#9;&#9;<?= $parent['ic']?>" onblur="showPlaceholder(this, this.name)" onfocus="hidePlaceholder(this)"/>
                <?php showErr("ic");?>
                <input type="submit" class="flex_button" name="save_account_details"value="SAVE CHANGES">
            </form>
        </div>
    </main>
    <script src="../styles/togglePlaceholder.js"></script>
    <script src="../styles/previewImage.js"></script>
</body>
</html>