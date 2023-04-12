<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <title>BrainBulb</title>
    <style>
        .main{
            min-height: 700px;
            height:100%;
            background-image: linear-gradient(
            to bottom right,
            #91defe,
            #99c0f9,
            #bdb6ec,
            #d7b3e3,
            #efb3d5,
            #f9bccc
            );
            padding: 50px 0;
        }

        .chaptercontain{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            /* border: 1px solid black; */
        }

        .chapter1{
            height: 120px;
            width: 120px;
            border-radius: 50%;
            background: radial-gradient(
                circle at 75% 30%,
                white 5px,
                aqua 8%,
                darkblue 60%,
                aqua 100%
            );
            box-shadow: inset 0 0 20px #fff, inset 10px 0 46px #eaf5fc,
                inset 88px 0px 60px #c2d8fe, inset -20px -60px 100px #fde9ea,
                inset 0 50px 140px #fde9ea, 0 0 90px #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            /* margin: 90px; */
            border: 10px solid white;
            transform: scale(1.10);
            opacity: 0.60;
        }

        .chapter1.unlock:hover{
            transform: scale(1.25);
        }

        .chapter1.unlock:active{
            transform: scale(1.10);
        }

        .rectangle1{
            width: 30px;
            height: 220px;
            background-color: white;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border-radius: 2px;
        }

        .rectangle2{
            width: 190px;
            height: 30px;
            background-color: white;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            border-radius: 2px;
        }

        .verticalroad{
            width: 12px;
            height: 30px;
            background-color: darkgrey;
            margin: 7px;
            border-radius: 2px;
        }

        .horizontalroad{
            width: 30px;
            height: 12px;
            background-color: darkgrey;
            margin: 7px;
            border-radius: 2px; 
        }

        .main td{
            min-width: 100px;
            min-height: 100px;
        }

        .chapter1.unlock{
            opacity: 1;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        $chaplist = array();
        $studentID = "ST00000008";
        include("../components/nav.php");
        include "../database/connect.php";
        $query = "SELECT course.chapter_Name FROM `learning_record` INNER JOIN course ON course.course_ID = learning_record.course_ID WHERE learning_record.student_ID = '$studentID'";
        $results = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($results)) {
            array_push($chaplist,$row["chapter_Name"][8]);
        }
        
    ?>
    <div class="main">
        <table border=0 style="margin:50px auto; text-align: center;">
            <tr>
                <td><div <?php if (in_array("1",$chaplist)) {echo'class="chapter1 unlock"';} else {echo 'class="chapter1"';}?>>1</div></td>
                <td></td>
                <td><div <?php if (in_array("4",$chaplist)) {echo'class="chapter1 unlock"';} else {echo 'class="chapter1"';}?>>4</div></td>
                <td>
                    <div class="rectangle2">
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                    </div>
                </td>
                <td><div <?php if (in_array("5",$chaplist)) {echo'class="chapter1 unlock"';} else {echo 'class="chapter1"';}?>>5</div></td>
            </tr>
            <tr>
                <td>
                    <div class="rectangle1">
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="rectangle1">
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                    </div>
                </td>
                <td></td>
                <td>
                    <div class="rectangle1">
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                        <div class="verticalroad"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td><div <?php if (in_array("2",$chaplist)) {echo'class="chapter1 unlock"';} else {echo 'class="chapter1"';}?>>2</div></td>
                <td>
                    <div class="rectangle2">
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                        <div class="horizontalroad"></div>
                    </div>
                </td>
                <td><div <?php if (in_array("3",$chaplist)) {echo'class="chapter1 unlock"';} else {echo 'class="chapter1"';}?>>3</div></td>
                <td></td>
                <td><div <?php if (in_array("6",$chaplist)) {echo'class="chapter1 unlock"';} else {echo 'class="chapter1"';}?>>6</div></td>
            </tr>
        </table>
    </div>
</body>
</html>