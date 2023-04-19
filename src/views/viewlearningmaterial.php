<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <title>BrainBulb</title>
</head>
<style>
    *{
        box-sizing: border-box;
    }

    .mat{
        margin: 20px;
        /* padding: 10px; */
        background-color: lightgrey;
        border-radius: 5px;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);

    }

    .mat a{
        color: black;
        font-size: 25px;
        font-weight: bold;
    }

    .mat li{
        padding: 20px 20px;
        font-size: 30px;    
    }

    .topic{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        margin: 20px;
    }

    .sub{
        margin: 0 70px;
    }

    .sub .col{
        float: left;
    }
</style>
<body>
    <?php
        $a = "TC00000002";
        include "../database/connect.php";
        include "../components/nav.php";

        $lis = array();
        $query = "SELECT * FROM course WHERE question_Type = 'Customised Quiz' AND teacher_ID = '$a'";
        $results = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($results)) {
            array_push($lis,$row['course_ID']);
        }
    ?>
    <div class="big">
        <div class="topic">
            <h1 style="font-size:35px;">Your Learning Materials</h1>
        </div>
        <?php
            foreach($lis as $data){
            ?>
            <div class="sub">
                <div class="row">
                    <div class="col" style="width:95%;">
                        <h1><?php echo $data;?></h1>
                    </div>
                    <div class="col" style="width:5%;">
                        <a href="uploadmaterialfile.php?sub=<?php echo $data;?>">
                            <img src="../../images/uploadfile.jpg" style="width:60px;">
                        </a>    
                    </div>
                </div>
                <hr style="border: 2px solid black; clear:both;">
                <?php
                    $query = "SELECT * FROM ((learning_material INNER JOIN course ON course.course_ID = learning_material.course_ID) INNER JOIN subject ON subject.subject_ID = course.subject_ID) WHERE learning_material.teacher_ID = '$a' AND course.course_ID = '$data'";
                    $results = mysqli_query($connection,$query);
                    if(mysqli_num_rows($results) > 0){
                        echo "<ul class='mat'>";
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo "<li>";
                            echo "<a target='_blank' href='../../materials/".$row['filename']."'>".$row['filename']."</a>";
                            echo "<a href=''><img src='../../images/delete.png' style='width:30px; height:auto;'></a>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                    else{
                        echo "<center><h1> No learning materials added</h1></center>";
                    }
                ?>
            </div>
        <?php
            }
        ?>
    </div>
</body>
<?php
    mysqli_close($connection);
?>
</html>