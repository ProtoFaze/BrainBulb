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

        <div style="background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Chapter 3:Fractions and Decimals</h1>
        </div>
        <div class="con">
        <b class="idea" style="background-color:transparent;">In this guide, we explore fractions and decimals, and how they relate to each other.</b>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">What are fractions?</b>
                    </div>
                    A fraction is a way of representing a part of one whole thing. Like pizza or cake slices.</br> 
                    It is written with a number (the numerator) on top of another number (the denominator), separated by a line. For example, 1/2 means one out of two.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">How to add and subtract fractions:</b>
                    </div>
                    When adding or subtracting between 2 fractions, you need to make sure that the denominators (bottom numbers) are the same.</br>
                    If not, you can multiply both the numerator and denominator of each fraction by the opposite demoninator. Then, you can add or subtract the numerators (top numbers) and simplify the fraction if possible by dividing the fraction with a number that can be used to divide both the numerator and denominator.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">What are decimals?</b>
                    </div>
                    Decimals are a way to represent fractions. The decimal point separates the whole number part from the fractional part.</br>
                    For example, 0.5 is the same as 1/2, one is a decimal and the other is a fraction.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">How to add and subtract decimals:</b>
                    </div>
                    Adding and subtracting decimals is similar to adding and subtracting whole numbers.</br>
                    You need to make sure that the decimal points line up and then you can add or subtract the numbers as like how its usually done for whole numbers.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">How to convert fractions to decimals:</b>
                    </div>
                    To convert a fraction to a decimal, divide the numerator by the denominator.</br>
                    For example, divide 3 by 4 to convert the 3/4 to a decimal of 0.75.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">How to convert decimals to fractions:</b>
                    </div>
                    As for the other way around, write the decimal as a fraction with a denominator(bottom number) of 10, 100, 1000, or any power of 10 that matches the number of decimal places.</br>
                    Then, simplify the fraction if possible. For instance, the decimal 0.25 is the same as the fraction 25/100, which can be simplified to 1/4.
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000012Math";
        }
    </script>
</body>
</html>