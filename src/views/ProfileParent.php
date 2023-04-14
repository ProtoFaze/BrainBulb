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





        $parent_id = 'PT00000001';





        // $_SESSION['parent_id'];
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
    </style>
</head>
<body>
    <header>
        <?php include "../components/nav.php"; ?>
    </header>
    <main>
        <!-- top section containing back button, username_ID and edit button -->
        <div class="response">
            <a href="mainpageParent.php"><button class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Go Back</button></a>
            <h1><?= $parent['parent_ID']?>'s profile</h1>
            <a href="editParent.php"><button class="flex_button"><span class="material-symbols-outlined">edit</span>Edit some information</button></a>
        </div>

        <!-- middle section containing user info, parent into -->
        <div class="split_container">
            <div class="split_section">
                <img class="elipse_container"src="<?= $parent['profile_Picture']?>" alt="parent picture">
                <div class="info_ltr"><h3>Number of children</h3><div class="divider">:</div><p><?= mysqli_num_rows($childRequest)?></p></div>
                <div class="info_ltr"><h3>Name</h3><div class="divider">:</div><p><?=$parent['pName']?></p></div>
                <div class="info_ltr"><h3>birthdate</h3><div class="divider">:</div><p><?= $parent['pDOB']?></p></div>
            </div>
            <div class="split_section">
                <div class="info_ltr"><h3>Username</h3> <div class="divider">:</div><p><?= $parent['username']?></p></div>
                <div class="info_ltr"><h3>Email</h3> <div class="divider">:</div><p><?= $parent['email']?></p></div>
                <div class="info_ltr"><h3>IC Number</h3> <div class="divider">:</div><p><?= $parent['ic']?></p></div>
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
                    <div class="info_ltr">Grade : $child[sGrade]</div>
                    <div class="info_ltr">Streak: $child[aFrequency]</div>
                    <form action="./mainpage.php" method="post">
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