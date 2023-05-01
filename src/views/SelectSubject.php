<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <title>BrainBulb</title>
    <style>
        .main h1{
            text-align: center;
            margin: 50px 0 10px 0;
        }

        .subjects{
            display: flex;
            padding: 0 40px;
            text-align: center;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            max-width: 1100px;
        }

        .subject{
            background-image: radial-gradient(#6dd5ed, #84b9bf, #78a4bf);
            margin: 70px 40px 35px 40px;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            color:black;
            border-radius: 30px;
            box-shadow: 0 17px #999;
        }

        .subject img{
            width: 40%;
            margin-top:15px;
        }

        .subject p{
            font-size: 30px;
            font-weight: bold;
        }

        .subject:active{
            background-color: #62D7C3;
            box-shadow: 0 10px #666;
            transform: translateY(7px);
        }

        .subject:hover{
            background-color: #57AFAA;
        }
    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
        include "../database/connect.php";
    ?>
    <div class="main">
        <h1><i>Please Select </i><span style="color:#62C7C3;">One</span><i> Subject To Begin</i></h1>
        <div class="subjects">
            <a href="ScienceSelectChapter.php" class="subject">
                <div>
                    <img src="../../images/science.png">
                    <p>Science</p>
                </div>
            </a>
            <a href="EnglishSelectChapter.php" class="subject">
                <div>
                    <img src="../../images/english1.png">
                    <p>English</p>
                </div>
            </a>
        </div>
        <div class="subjects" style="margin:0 auto; border-bottom-right-radius: 6px; border-bottom-left-radius: 6px; border-top-right-radius: 0; border-top-left-radius: 0;"> 
            <a href="MathSelectChapter.php" class="subject" style="margin: 25px 40px 50px 40px;">
                <div>
                    <img src="../../images/math2.png">
                    <p>Mathematics</p>
                </div>
            </a>
            <a href="BMSelectChapter.php" class="subject" style="margin: 35px 40px 70px 40px;">
                <div>
                    <img src="../../images/bm.png">
                    <p>Bahasa Melayu</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>