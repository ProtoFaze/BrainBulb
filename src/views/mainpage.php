<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <title>BrainBulb</title>
    <style>
        * {
            box-sizing: border-box;
        }
        .maincontainter{
            margin:0 0;
        }
        #divider{
            border: 2px solid lightgrey;
            border-radius: 5px; 
            margin: 0px 30px;
            
        }
        .col{
            float: left;
            width: 50%;
            padding: 10px;
        }
        #start-btn{
            padding: 18px 25px;
            font-family: 'Raleway', sans-serif;
            background-color: lightseagreen;
            color: white;
            border-radius: 5px;
            border: none;
            font-size: 15px;
        }
        #start-btn:hover{
            background-color: darkseagreen;
            cursor:pointer;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
        }
        .coursebox{
            background-color: #ececec;
            border-radius: 7px;
            margin: 80px 80px;
            display: flex;
            text-align: center;
            padding: 25px;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
        }
        .subjects{
            font-size: 25px;
            margin: 20px 20px;
            background-color: white;
            border-radius: 7px;
            font-weight: bold;
            text-decoration: none;
            color: black;
        }
        .subjects img{
            width: 80%;
        }
        .features{
            margin: 0px 45px;
        }
        .features .adv{
            float: left;
            width: 50%;
            padding: 10px;
        }
        .usertype{
            background-color: #ececec;
            display: flex;
            text-align: center;
            margin: 0;
        }
    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
    ?>
    <!-- <hr id="divider"> -->
    <div style="clear:both;"></div>
    <div class="maincontainter">
        <div class="col"> 
            <div style="margin-left:40px; margin-top: 50px;">
                <div>
                    <h1 style="font-family: 'Raleway', sans-serif; font-size:42;">Welcome to Brainbulb!</h1>
                </div>
                <div>
                    <h2 style="text-align: justify; font-size:22px; text-justify: inter-word; font-weight:600; opacity:70%; line-height: 1.3;">An e-learning platform empowering parents and teachers to enrich their children's knowledge and equip them with the skills to succeed in the future. <br/>BrainBulb is designed to provide a one-stop-shop for all your educational needs, including interactive lessons, and engaging activities.<br/> Join us, and you can give your child the gift of lifelong learning and help them discover their full potential.</h2>
                </div>
                <input type="button" value="Get started" id="start-btn">
            </div>
            
        </div>
        <div class="col" style="text-align: center;">
            <img src='../../images/person-studying-online.png' style="height:58%;">
        </div>
        <div id="coursesScroll" style="clear: both;"></div>
        <div class="coursebox">
            <a href="" class="subjects">
                <div>
                    <img src="../../images/science.png" alt="">
                    <p>Science</p>
                </div>
            </a>
            <a href="" class="subjects">
                <div>
                    <img src="../../images/math2.png" alt="">
                    <p>Mathematics</p>
                </div>
            </a>
            <a href="" class="subjects">
                <div>
                    <img src="../../images/english1.png" alt="">
                    <p>English</p>
                </div>
            </a>
            <a href="" class="subjects">
                <div>
                    <img src="../../images/bm.png">
                    <p>Bahasa Melayu</p>
                </div>
            </a>
        </div>
        <div id="featuresScroll" class="features">
            <div class="adv">
                <div style="margin-left:30px; margin-top: 85px;">
                    <h1>Engagement</h1>
                    <p style="color: #464E51; font-size:23px;">Visual, <b>interactive lessons</b> make concepts feel intuitive — so even complex ideas just click. Our real-time feedback and simple explanations make learning efficient.</p>
                </div>
            </div>
            <div class="adv" style="text-align:center;">
                <img src="../../images/engage.png" style="width:75%;">
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="features">
            <div class="adv" style="text-align:center;">
                <img src="../../images/technology.png" style="width:75%;">
            </div>
            <div class="adv">
                <div style="margin-left:30px; margin-top: 85px;">
                    <h1>Interactive</h1>
                    <p style="color: #464E51; font-size:23px;">Visual, interactive lessons make concepts feel intuitive — so even complex ideas just click. Our real-time feedback and simple explanations make learning efficient.</p>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <div class="features">
            <div class="adv">
                <div style="margin-left:30px; margin-top: 85px;">
                    <h1>Knowledges</h1>
                    <p style="color: #464E51; font-size:23px;">Visual, interactive lessons make concepts feel <b>intuitive</b> — so even complex ideas just click. Our real-time feedback and simple explanations make learning efficient.</p>
                </div>
            </div>
            <div class="adv" style="text-align:center;">
                <img src="../../images/bm.png" style="width:65%;">
            </div>
        </div>
        <div style="clear: both; height:50px;"></div>
        <div id="useCaseScroll" style="background-color: #ececec; padding:20px 0px 65px; box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);">
            <div style="text-align: center; padding:70px 0px;">
                <h1 style="font-size:50px">The prefect way to learn a subject for <br>primary school student</h1>
            </div>
            <div class="usertype" >
                <div class="user">
                    <div>
                        <img src="../../images/student.png" style="width:70%;">
                        <h2>Student</h2>
                        <p style="font-size:18px;">Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Consequuntur, debitis.kfsf</p>
                    </div>
                </div>
                <div class="user">
                    <div>
                        <img src="../../images/parent.png" style="width:70%;">
                        <h2>Parent</h2>
                        <p style="font-size:18px;">Lorem ipsum dolor sit amet, <br>consectetur adipisicing elit. Aliquid, soluta.</p>
                    </div>
                </div>
                <div class="user">
                    <div>
                        <img src="../../images/teacher.png" style="width:70%;">
                        <h2>Teacher</h2>
                        <p style="font-size:18px;">Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Voluptate, maiores.</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin: 100px 0px;">
            <h1>Join Over 1 million primary students learning on BrainBulb</h1>
            <input type="button" value="Get started" id="start-btn" style="padding: 23px 30px; margin-top:30px;font-size:20px;">
        </div>
    </div>
</body>
</html>