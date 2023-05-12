<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['sourceage']) && $_SESSION['sourceage'] == "searchUser" && isset($_SESSION['management_id']) && isset($_SESSION['delete_id'])){
    unset($_SESSION['sourceage']);
    unset($_SESSION['delete_id']);
    unset($_SESSION['management_id']);
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        * {
            box-sizing: border-box;
        }
        .maincontainter{
            margin:0 0;
        }
        .col{
            float: left;
            width: 50%;
            padding: 10px;
        }
        .start-btn{
            padding: 18px 25px;
            font-family: 'Raleway', sans-serif;
            background-color: lightseagreen;
            color: white;
            border-radius: 5px;
            border: none;
            font-size: 15px;
        }
        .start-btn:hover{
            background-color: darkseagreen;
            cursor:pointer;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
        }
        .start-btn:active{
            transform: scale(0.95);
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
        .knowledge{
            background-color: #ececec;
            padding: 100px 0;
            height: 540px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            text-align: center;
            margin: 40px 0;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.2);
        }
        .book-container{
            perspective: 1200px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .book {
            transform-style: preserve-3d;
            position: relative;
            height: 300px;
            /* cursor: pointer; */
            backface-visibility: visible;
        }

        .front, .back, .page1, .page2, .page3, .page4, .page5, .page6 {
            transform-style: preserve-3d;
            position: absolute;
            width: 200px;
            height: 100%;
            top: 0; left: 0;
            transform-origin: left center;
            transition: transform .5s ease-in-out, box-shadow .35s ease-in-out;
        }

        .front, .back {
            background: #0B9689;
            text-align:center;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .front, .page1, .page3, .page5 {
            border-bottom-right-radius: .5em;
            border-top-right-radius: .5em;
        }

        .back, .page2, .page4, .page6 {
            border-bottom-right-radius: .5em;
            border-top-right-radius: .5em;
        }

        .page1 { 
            background: #efefef;
        }

        .page2 {
            background: #fafafa;
        }

        .page3 {
            background: #f5f5f5;
        }

        .page4 {
            background: #f5f5f5;
        }

        .page5 {
            background: white;
            text-align:center;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .page6 {
            background: white;
            text-align:center;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .book:hover .front {
            transform: rotateY(-160deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .page1 {
            transform: rotateY(-150deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .page2 {
            transform: rotateY(-30deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .page3 {
            transform: rotateY(-140deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .page4 {
            transform: rotateY(-40deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .page5 {
            transform: rotateY(-130deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .page6 {
            transform: rotateY(-50deg) scale(1.1);
            box-shadow: 0 1em 3em 0 rgba(0, 0, 0, .2);
        }

        .book:hover .back {
            transform: rotateY(-20deg) scale(1.1);
        }

        .adv p{
            line-height: 1.4;
        }

        .user p{
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
    ?>
    <div style="clear:both;"></div>
    <div class="maincontainter">
        <div class="col"> 
            <div style="margin-left:60px; margin-top: 50px;">
                <div>
                    <h1 style="font-family: 'Raleway', sans-serif; font-size:42;">Welcome to Brainbulb!</h1>
                </div>
                <div>
                    <h2 style="text-align: justify; font-size:22px; text-justify: inter-word; font-weight:600; opacity:70%; line-height: 1.3;">An e-learning platform empowering parents and teachers to enrich their children's knowledge and equip them with the skills to succeed in the future. <br/>BrainBulb is designed to provide a one-stop-shop for all your educational needs, including interactive lessons, and engaging activities.<br/> Join us, and you can give your child the gift of lifelong learning and help them discover their full potential.</h2>
                </div>
                <?php
                    if(isset($_SESSION['user_id'])){
                        if(substr($_SESSION['user_id'],0,2) == "ST"){
                            echo '<form action="SelectSubject.php">
                            <input type="submit" value="Select Subject" class="start-btn">
                            </form>';
                        }
                        else if(substr($_SESSION['user_id'],0,2) == "PT"){
                            echo '<form action="ProfileParent.php">
                            <input type="submit" value="View Children Performance" class="start-btn">
                            </form>';
                        }
                        else if(substr($_SESSION['user_id'],0,2) == "TC"){
                            echo '<form action="viewQuiz.php">
                            <input type="submit" value="Create Quiz" class="start-btn">
                            </form>';
                        }
                    }
                    else{
                        echo '<form action="loginAndRegister.php">
                        <input type="submit" value="Get started" class="start-btn">
                        </form>';
                    }
                ?>
            </div>
        </div>
        <div class="col" style="text-align: center; margin-top:35px;">
            <img src='../../images/person-studying-online.png' style="height:58%;">
        </div>
        <div style="clear: both;"></div>
        <div class="knowledge">
            <div style="padding:10px; text-align: center; margin-left:45px;">
                <h1 style="font-size:37px; line-height:1.4;">"Eduation is the most powerful weapon which you can use to change the world"</h1>
                <h2 style="font-size:28px;">- Nelson Mandela</h2>
            </div>
            <div class="book-container" style="padding:10px; margin-right:10px;">
                <div class="book">
                    <div class="back"></div>
                    <div class="page6">
                        <img src="../../images/page1.jpg" style="height:280px; width:auto;">
                    </div>
                    <div class="page5">
                        <img src="../../images/page2.jpg" style="height:280px; width:auto;">
                    </div>
                    <div class="page4">
                        
                    </div>
                    <div class="page3">
                        
                    </div>
                    <div class="page2"></div>
                    <div class="page1"></div>
                    <div class="front">
                        <img src="../../images/engtextbook.png">
                    </div>
                </div>  
            </div>
        </div>
        <div style="clear: both;"></div>
        <div id="coursesScroll"></div>
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
            <?php
                    if(isset($_SESSION['user_id'])){
                        if(substr($_SESSION['user_id'],0,2) == "ST"){
                            echo '<form action="SelectSubject.php">
                            <input type="submit" value="Select Subject" class="start-btn">
                            </form>';
                        }
                        else if(substr($_SESSION['user_id'],0,2) == "PT"){
                            echo '<form action="ProfileParent.php">
                            <input type="submit" value="View Children Performance" class="start-btn">
                            </form>';
                        }
                        else if(substr($_SESSION['user_id'],0,2) == "TC"){
                            echo '<form action="viewQuiz.php">
                            <input type="submit" value="Create Quiz" class="start-btn">
                            </form>';
                        }
                    }
                    else{
                        echo '<form action="loginAndRegister.php">
                        <input type="submit" value="Get started" class="start-btn">
                        </form>';
                    }
                ?>
        </div>
    </div>
</body>
</html>