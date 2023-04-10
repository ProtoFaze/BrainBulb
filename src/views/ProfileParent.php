<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="../styles/layout.css">
    <title>Parent Profile</title>
    <?php 
        include "../database/connect.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $parent_id = 'PT00000001';
        // $_SESSION['parent_id'];
        $profileRequest = "SELECT * FROM parent 
        WHERE parent_ID = '$parent_id'";
        $parentRequest = mysqli_query($connection, $profileRequest);
        $parent = mysqli_fetch_assoc($parentRequest);



    ?>
    <style>

    </style>
</head>
<body>
    <header>
        <?php include "../components/nav.php"; ?>
    </header>
    <main>
        <!-- top section containing back button, username and edit button -->
        <div class="response">
            <a href="mainpageParent.php"><button class="material-symbols-outlined flex_button">arrow_back_ios</button></a>
            <h1>Parent Name</h1>
            <a href="editParent.php"><button class="material-symbols-outlined flex_button">edit</button></a>
        </div>
        <!-- middle section containing user info, parent into -->
        <div class="left_section">
            <img class="elipse_container"src="" alt="parent picture">
            <div class="info_ltr">Number of children <?= "none"?></div>
            <div class="info_ltr">Name <?= $parent['pName']?></div>
            <div class="info_ltr">Birthdate <?= $parent['pDOB']?></div>
        </div>
        <div class="right section">
            <div class="info_ltr">Username <?= $parent['username']?></div>
            <div class="info_ltr">Email <?= $parent['email']?></div>
            <div class="info_ltr">IC Number <?= $parent['ic']?></div>
        </div>
        <!-- bottomSection containing children info -->
        <div class="bottomSection">
        <?php 
            if(mysqli_num_rows($parentRequest) > 0)
            while ($row = mysqli_fetch_assoc($parentRequest)) {
                echo "<div class='childInfo'>";
                echo "<div class='childName'>Child Name</div>";
                echo "<div class='childName'>Child Name</div>";
                echo "<div class='childName'>Child Name</div>";
                echo "</div>";
            }
        ?>
        </div>
    </main>
</body>
</html>