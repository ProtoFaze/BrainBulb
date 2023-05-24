<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBulb</title>
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
</head>
<style>
    *{
        margin: 0;
    }

    body {

    }

    .main{
        background: linear-gradient(180deg, #46d6e2, 5%, #38beca, 50%, #17687d);
        height: auto;
        width: 100%;
        position: absolute;
    }

    .dots{
        height: 60px;
        width: 60px;
        border: 2px solid rgba(255, 255, 255, 0.7);
        border-radius: 50px;
        position: absolute;
        top: 10%;
        left: 10%;
        animation: 4s linear infinite;
    }
    
    .dot{
        height: 10px;
        width: 10px;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.5);
        position: absolute;
        top: 20%;
        right: 20%;
    }
    <?php for ($i = 1; $i <= 20; $i++) : ?>
        .dots:nth-child(<?php echo $i; ?>) {
            top: <?php echo rand(15,90); ?>%;
            left: <?php echo rand(1,90); ?>%;
            animation: animate <?php echo rand(3,10);?>s linear infinite;
        }
    <?php endfor; ?>

    @keyframes animate {
        0% {
            transform: scale(0) translateY(0) rotate(70deg);
        }
        100% {
            transform: scale(1.3) translateY(-100px) rotate(360deg);
        }
    }

    .con{
        margin: 50px 100px;
    }

    .idea{
        margin: 20px auto;
        background-color: lightcyan;
        text-align: center;
        padding: 25px;
        font-size: 30px;
        border-radius: 5px;
        text-align: justify;
        display: flex;
        gap:10px;
        align-items: stretch;
        justify-content: space-between;
    }

    .start{
        background-color: lightblue;
        text-align: center;
        padding: 25px;
        font-size: 20px;
        border-radius: 7px;
        border:none;
        font-weight: bold;
        cursor: pointer;
    }

    .start:hover{
        transform: scale(1.06);
    }

    .start:active{
        transform: scale(0.95);
    }
    .sub b{
        color: #4C7399;
    }
</style>
<?php
    include "../database/connect.php";
    include("../components/nav.php");
?>
<body>
    <div class="main">
        <?php
            for($i = 0; $i < 20; $i++){
                echo "<div class='dots'><span class='dot'></span></div>";
            } 
        ?>

        <div style=" background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Chapter 1: Numbers and Counting to 1000</h1>
        </div>
        <div class="con">
            <b class="idea" style="background-color:transparent;">This chapter teaches you about numbers and how to recognize them, lets start with counting numbers </b>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Starting from 0</b>
                    </div>
                    Counting from 0 to 1000 can seem like a lot, but it's actually pretty easy if you take it one step at a time. Let's start with the number 0, which is nothing.
                    When people say they have 0 amounts of stuff, like 0 apples, they mean they have nothing. So, 0 is the starting point for counting.
                    now we can count from 0 to 1, 1 to 2, and so on. Let's count from 0 to 10: 
                    <b> 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10.</b> That's 11 numbers in total! Now, if we keep going, we can count all the way up to 1000.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/number-cards-1-20.png" style="height:320px; width:auto;">
                    <!-- sourced from edication.com :https://www.education.com/worksheet/article/number-cards-1-20/  -->
                </div>
            </div>
            <div class="idea">
                <div class="sub" >
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">An easier way</b>
                    </div>
                    Let me show you a trick to make it easier. You can <b>group the numbers</b> into <b>10s</b> and <b>100s</b>.</br>
                    To count from <b>1 to 10</b>, you just say: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10.</br>
                    For 11 to 20, you just <b>add 1 to each number</b>: 11, 12, 13, 14, 15, 16, 17, 18, 19, 20.</br>
                    For 21 to 30, add 1 to each number <b>again</b>: 21, 22, 23, 24, 25, 26, 27, 28, 29, 30.</br>
                    You also count like this from 31 to 40, 41 to 50, 51 to 60, 61 to 70, 71 to 80, 81 to 90</br>
                    As for 91 to 100: 91, 92, 93, 94, 95, 96, <b>97, 98, 99, 100.</b></br>
                    Now, we use the groups of 10 to count from 100 to 200 like this: 100, 110, 120, 130, 140, 150, 160, 170, 180, 190, 200.</br>
                    And just like the <b>groups of 10</b>, you can use the <b>groups of 100</b> to count from <b>100 to 1000</b>: 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000.</br>
                    Now, you can count to 1000 by just <b>remembering a few numbers!</b></br>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 47%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Comparing numbers</b>
                    </div>
                    When we compare two numbers, we want to know which is more and which is less than the other number.</br>
                    For example, is <b>5 more or less than 8</b>? To solve this, we can use something called a number line.</br>
                    A number line is a <b>Straight line</b> with numbers on it. The numbers on the <b>left</b> are <b>less than</b> the numbers on the <b>right</b>.
                </div>
                <div class="sub" style="width: 52%;">
                    <img src="../../images/number_line.jpg" alt="number line"style="height:320px; width:100%;">
                    <!-- image soured from ianswer4u.com : https://2.bp.blogspot.com/-PA7x9_SZoHc/TcpRS7vOTbI/AAAAAAAAACI/pRCK8gjC_mg/w1200-h630-p-k-nu/whole_numbers+_and_natural_numbers.JPG -->
                </div>
            </div>
            <div class="idea">
                <div class="sub" >
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Comparing with example</b>
                    </div>
                    So when we want to compare the numbers <b>15</b> and <b>23</b>. We can <b>draw a number line</b> and <b>put</b> 15 and 23 on it. We <b>start at 15</b> and count to the <b>right</b> until we reach 23. We can see that <b>23 is more than 15</b>, because it's <b>farther to the right</b> on the number line.
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000010Math";
        }
    </script>
</body>
</html>