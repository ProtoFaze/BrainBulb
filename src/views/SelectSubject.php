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
            margin: 40px 0;
        }

        .subjects{
            background-color: #62c9c3;
            display: flex;
            padding: 0 40px;
            text-align: center;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            border-radius: 6px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            max-width: 1100px;
        }

        .subject{
            background-color: white;
            margin: 70px 40px 35px 40px;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            color:black;
            border-radius: 30px;
        }

        .subject img{
            width: 40%;
        }

        .subject p{
            font-size: 30px;
            font-weight: bold;
        }

        .subject:active{
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
    ?>
    <div class="main">
        <h1>Please Select 1 Subject To Study</h1>
        <div class="subjects">
            <a href="" class="subject">
                <div>
                    <img src="../../images/science.png" alt="">
                    <p>Science</p>
                </div>
            </a>
            <a href="" class="subject">
                <div>
                    <img src="../../images/english1.png" alt="">
                    <p>English</p>
                </div>
            </a>
        </div>
        <div class="subjects" style="margin:0 auto; border-bottom-right-radius: 6px; border-bottom-left-radius: 6px; border-top-right-radius: 0; border-top-left-radius: 0;"> 
            <a href="" class="subject" style="margin: 25px 40px 50px 40px;">
                <div>
                    <img src="../../images/math2.png" alt="">
                    <p>Mathematics</p>
                </div>
            </a>
            <a href="" class="subject" style="margin: 35px 40px 70px 40px;">
                <div>
                    <img src="../../images/bm.png" alt="">
                    <p>Bahasa Melayu</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>