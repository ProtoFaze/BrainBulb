<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        echo "<script> location.href='mainpage.php'</script>";
    }
?>
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
        margin: 20px auto;
        background-color: lightgrey;
        border-radius: 5px;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        width: 100%;
        table-layout: auto;
		border-collapse: collapse;
    }

    .mat a{
        color: black;
        font-size: 25px;
        font-weight: bold;
    }

    .mat td{
        padding: 22px 22px;
        font-size: 20px;    
        /* border: 1px solid black; */
    }

    .mat tr:hover{
        background-color: darkgrey;
    }

    .mat td a{
        font-size: 30px;
    }

    .mat td p{
        font-size: 22px;
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
        $a = $_SESSION['user_id'];
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
            <?php
                if(empty($lis)){
                    echo "<h1 style='font-size:35px;'>No Quiz Learning Material</h1>";
                }
                else{
                    echo "<h1 style='font-size:35px;'>Your Quiz Learning Materials</h1>";
                }
            ?>
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
                    $query = "SELECT * FROM ((learning_material INNER JOIN course ON course.course_ID = learning_material.course_ID) INNER JOIN subject ON subject.subject_ID = course.subject_ID) WHERE course.teacher_ID = '$a' AND course.course_ID = '$data'";
                    $results = mysqli_query($connection,$query);
                    if(mysqli_num_rows($results) > 0){
                        echo "<table class='mat' cellpadding='5px'>";
                        while ($row = mysqli_fetch_assoc($results)) {
                            $nowdate = date("Y-m-d");
                            $duration = date_diff(date_create($row['post_Material_Date']), date_create($nowdate));
                            if($duration->format("%a") == "0"){
                                $d = "Today";
                            }
                            else{
                                $d = $duration->format("%a days ago");
                            }

                            if(substr($row['filename'],-4) == "pptx"){
                                $imgs = "ppt";
                            }
                            elseif(substr($row['filename'],-4) == "docx" || substr($row['filename'],-3) == "doc"){
                                $imgs = "words";
                            }
                            elseif(substr($row['filename'],-3) == "pdf"){
                                $imgs = "pdf";
                            }
                            elseif(substr($row['filename'],-3) == "mp4"){
                                $imgs = "videoicon";
                            }

                            echo "<tr>";
                            echo "<td>";
                            echo "<img style='width:30px; height:auto;' src='../../images/".$imgs.".png'>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a target='_blank' href='../../materials/".$row['filename']."'>".$row['filename']."</a>";
                            echo "</td>";
                            echo "<td>";
                            echo "<p style='margin:0;'>".$row['material_Title']."</p>";
                            echo "</td>";
                            echo "<td>";
                            echo "<p style='margin:0;'>".$d."</p>";
                            echo "</td>";
                            echo "<td>";
                            echo "<a href='deletematerialfile.php?sub=".$row['material_ID']."'><img src='../../images/delete.png' style='width:30px; height:auto;'></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else{
                        echo "<center><h1> No learning materials added</h1></center>";
                    }
                ?>
            </div>
            <div style="height:30px;"></div>
        <?php
            }
        ?>
    </div>
</body>
<?php
    mysqli_close($connection);
?>
</html>