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
        /* position: relative; */
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
    // $a = $_SESSION['lists'];
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

        <div style="background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Chapter 4: Counting different values</h1>
        </div>
        <div class="con">
        <b class="idea" style="background-color:transparent;">In math, we often deal with different values like money, time, length, and weight.</b>
        <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Money</b>
                    </div>
                    In Malaysia, money is denoted by Ringgit Malaysia(RM). In this scenario, RM5 is five Ringgit.</br>
                    We can count money in the same ways that we count numbers. If we have RM10 and RM5, we can add them together to get RM15. 
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Time</b>
                    </div>
                    The units of time are measured in hours(H), minutes(m), and seconds(s). Understanding the various units of time and how they interact helps for counting time.
                    60 s = 1 m</br>
                    60 m = 1 H</br>
                    24 H = 1 day</br></br>
                    For instance, we can multiply 3 hours by 60 to get 180 minutes
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Length</b>
                    </div>
                    Length is measured in millimetres(mm), centimetres(cm), and metres(m). Understanding the various units of length and their relationships is important for counting length.</br></br>
                    100 cm = 1 m</br>
                    1000 mm = 1 m</br></br>
                    Example, 5m is converted to 500cm by multiplying 5 by 100.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Weight</b>
                    </div>
                    Weight is usually measured in kilograms(kg) and grams(g). To count weight, we need to understand the different units of weight and how they are related.</br></br>
                    1000 g = 1 kg</br></br>
                    For example, if we want to convert 2.5 kilograms to grams, we can multiply 2.5 by 1000 to get 2500 g.
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000013Math";
        }
    </script>
</body>
</html>