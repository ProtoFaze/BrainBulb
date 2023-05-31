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
            <h1>Chapter 4 : Making New Words</h1>
        </div>
        <div class="con">
            <div class="idea" style="background-color:transparent;">
                <b>Combining two or more words become a fully new words with different meaning.</b>
            </div>
            <div class="idea">
                <div class="sub" style="width: 30%;">
                    <div style="display:flex; align-items:center; flex-direction:column;">
                        <b style="font-size:35px;">Super + Market</b>
                    </div>
                </div>
                <div class="sub" style="width: 70%; margin-left:30px;">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <p>A <b>supermarket</b> is a big store where you can buy lots of different things you need for your home, like food, drinks, snacks, and household items. You can walk through the aisles, pick out things you want to buy, and pay for them at the checkout. It's a fun and convenient place to go shopping!</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 30%; margin-left:30px;">
                    <div style="display:flex; align-items:center; flex-direction:column;">
                        <b style="font-size:35px;">Rail + Ways</b>
                    </div>
                </div>
                <div class="sub" style="width: 70%; margin-left:30px;">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <p><b>Railways</b> are a network of tracks and trains used for transportation. Trains run on these tracks and can carry people, goods, and cargo from one place to another. Many people use railways to commute to work or travel long distances. Railways are also used to transport goods and cargo across countries, making trade and commerce easier and faster.</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 65%; margin-left:30px;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Shop + Keeper</b> 
                    </div>
                    A <b>shopkeeper</b> is someone who owns and manages a small store or shop. They are responsible for buying and selling goods, managing inventory, and keeping the store organized and clean. Shopkeepers are also responsible for greeting and helping customers, answering their questions, and handling transactions at the cash register. They play an important role in the local community by providing goods and services that people need on a daily basis.
                </div>
                <div class="sub" style="width: 35%; margin-left:35px;">
                    <img src="../../images/shopkeeper.png" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%; margin-left:30px;">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <p>An <b>airport</b> is where planes take off and land, and people use it to travel long distances quickly. Passengers’ check-in, go through security, and wait for their flights in airport buildings, which also offer shops and restaurants. Airports are crucial for global travel and commerce, making it easier for people and goods to move quickly across countries and continents.</p>
                    </div>
                </div>
                <div class="sub" style="width: 30%;">
                    <div style="display:flex; align-items:center; flex-direction:column;">
                        <b style="font-size:35px;">Air + Port</b>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%; margin-left:30px;">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <p>A <b>hairdresser</b> is a professional who cuts, styles, and colours hair in a salon or barbershop. They use a range of tools such as scissors, combs, and hair dryers to create different hairstyles and advise clients on hair care. Hairdressers help people to feel confident and attractive, and they are highly valued in their communities.</p>
                    </div>
                </div>
                <div class="sub" style="width: 30%;">
                    <div style="display:flex; align-items:center; flex-direction:column;">
                        <b style="font-size:35px;">Hair + Dresser</b>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 75%; margin-left:30px;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Police + Women</b> 
                    </div>
                    <b>Policewomen</b> are female police officers who keep communities safe. They patrol streets, respond to emergencies, and investigate crimes. They play an important role in upholding the law and keeping people secure.
                </div>
                <div class="sub" style="width: 25%; margin-left:35px;">
                    <img src="../../images/police.png" style="height:320px; width:auto;">
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000006Englishb";
        }
    </script>
</body>
</html>