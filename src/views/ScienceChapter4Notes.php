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
        display:flex;
        flex-wrap:wrap;
        width:100%;
    }

    .contain > div{
        text-align: center;
        padding: 20px 50px;
        line-height: 75px;   
        font-size: 28px;
        border-radius: 7px;
        margin:10px;
        font-weight: bold;
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
            <h1>Chapter 4 : Plants</h1>
        </div>
        <div class="con">
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Parts of plants</h3>
                    <img src="../../images/plant.png" style="width:70%; margin:0 auto;">
                </div>
            </div>
            <div class="idea" style="background-color:transparent; font-size:35px;">
                <b>Characteristics of different parts of plants <br>
                Every plant has parts with different characteristics.</b>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Flower</h3>
                    <p style="margin:10px;">Lotus plants is a flowering plant. Fern plant is a non-flowering plant.</p>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Stem</h3>
                    <p style="margin:10px;">Durian tree has a woody stem. A papaya plant has a non-woody stem.</p>
                </div>
            </div>
            <div class="idea" style="background-color:transparent; font-size:35px;">
                <b>Importance of parts of plants</b>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Flower</h3>
                    <p style="margin:10px;">Flower is reproductive structure of plant. Flower will change to fruit and seed.</p>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Leaf</h3>
                    <p style="margin:10px;">Leaf will make food for the plant. Plant can produce food by itself. Leaf produce food for the rest of the parts of plant.</p>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Stem</h3>
                    <p style="margin:10px;">Stem transport food produced by the leaves to all parts of the plant. Stem also transport water and nutrient from the roots to the leaves.</p>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Root</h3>
                    <p style="margin:10px;">Root absorb water and nutrients from the soil. Root support the plant as well.</p>
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000044Science";
        }
    </script>
</body>
</html>