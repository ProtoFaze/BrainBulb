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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        line-height: 1.5;
        display:flex;
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

    .sub{
        float:left;
    }

    .contain{
        padding:20px 40px;
        border-radius: 7px;
        margin: 30px 10px;
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

        <div style="width: auto; background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Chapter 6 : Colour Around Us</h1>
        </div>
        <div class="con">
            <div class="idea" style="background-color:transparent;">
                <b>Colours are beautiful and they make our world more interesting and fun. There are many colours in the world, and each colour has its own unique beauty.</b>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div class="contain" style="background-color: #ffb1b0;">
                        <b>Red</b> is a bold and strong colour, it can mean love, passion, or danger.
                        <br>
                        <br>
                        <b>Example:</b> Cherry, Tomato, Blood
                    </div>
                    <div class="contain" style="background-color: #ffffbf;">
                        <b>Yellow</b> is a bright and cheerful colour, it can mean happiness, sunshine, or friendship.
                        <br>
                        <br>
                        <b>Example:</b> Banana, Butter, Lemon, Yolk, Cheese
                    </div>
                    <div class="contain" style="background-color: #a9d1f7;">
                        <b>Blue</b> is a calm and peaceful colour, it can mean trust, wisdom, or sadness.
                        <br>
                        <br>
                        <b>Example:</b> Sky, Ocean
                    </div>
                    <div class="contain" style="background-color: #ffdfbe;">
                        <b>Orange</b> is a fun and energetic colour, it can mean excitement, warmth, or caution.
                        <br>
                        <br>
                        <b>Example:</b> Carrot, Pumpkin, Oranges
                    </div>
                    
                    <div class="contain" style="background-color: #CC99FF;">
                        <b>Purple</b> is a royal and luxurious colour, it can mean creativity, royalty, or mystery.
                        <br>
                        <br>
                        <b>Example:</b> Dragon fruit, Eggplant, Grapes
                    </div>
                    <div class="contain" style="background-color: #000; color:#fff;">
                        <b>Black</b> is a mysterious and powerful colour, it can mean strength, sophistication, or mourning.
                        <br>
                        <br>
                        <b>Example:</b> Coffee, Chocolate, Charcoal
                    </div>
                    <div class="contain" style="background-color: #fff;">
                        <b>White</b> is a pure and peaceful colour, it can mean innocence, purity, or peace.
                        <br>
                        <br>
                        <b>Example:</b> Snow, Chalk, Milk
                    </div>
                </div>

            </div>

        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000008Englishb";
        }
    </script>
</body>
</html>