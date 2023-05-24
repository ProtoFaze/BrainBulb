<?php
    session_start();
?>
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

        <div style="width: 400px; background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Chapter 6 : Absorption</h1>
        </div>
        <div class="con">
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Parts of plants</h3>
                    <p style="margin:10px;">Water Absorbent Objects & Non-water Absorbent Objects
                    Absorbents are different types of materials which can soak up liquid.
                    <br><br>
                    An absorbent material has small holes in it. When a liquid comes into contact with an absorbent material, the tiny holes draw in the liquid and it spread through the material.
                    </p>
                    <img src="../../images/waterSpilled.png" style="width:70%; margin:0 auto;">
                    <p style="margin:10px;">The picture above show an incident that is a glass of liquid is spilled on the glass table. The liquid stay above on the table. 
                    <br><br>
                    Then, the liquid is wiped off with a piece of cloth and disappear from the table. This incident proved that the glass table is a non-water absorbent object and cloth is water absorbent object. </p>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">The importance of non-water absorbent objects</h3>
                    <img src="../../images/rain.png" style="width:70%; margin:0 auto;">
                    <p style="margin:10px;">The figure above show a raining situation. The iron barrel in the figure act as a storage that can hold and collect the rain water. 
                    <br><br>
                    The boy use a plastic umbrella to avoid getting wet in the rain so that he will not get cold of wet body in rain. 
                    <br><br>
                    The rubber boots that the boy is wearing can prevent his feet from getting wet. The normal shoe wear are made with water absorbent materials that will absorb the water so the boy choose to wear a rubber boots. 
                    <br><br>
                    The glass windscreen of a car will act as a shelter that can apart the rain water that it prevent rain water to get in into the car.</p>
                </div>
            </div>
        </div>
        

        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000046Science";
        }
    </script>
</body>
</html>