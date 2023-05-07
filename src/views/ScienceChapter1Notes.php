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
    }

    .contain > div{
        text-align: center;
        padding: 20px 50px;
        line-height: 75px;   
        font-size: 30px;
        /* background-color: cyan; */
        border-radius: 7px;
        /* width:100px; */
        margin:10px;
        font-weight: bold;
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

        <div style="width: auto; background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Chapter 1 : Living things and non-living things</h1>
        </div>
        <div class="con">
            <!-- <div class="idea" style="background-color:transparent;">
                <b>Today, We will be learning some basic daily life Malay phrases.</b>  
            </div> -->
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Characteristics of Living Things</h3>
                    <div class="contain">
                        <div style="background-color: #FDFD97;">Need water and food</div>
                        <div style="background-color: #9ee09e;">Breathe</div>
                        <div style="background-color: #feb144;">Move</div>
                        <div style="background-color: #ff6663;">Reproduce</div>
                        <div style="background-color: #cc99c9;">Grow</div>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Difference between living things and non-living things</h3>
                        <ul style="line-height: 60px; ">
                            <li>Living things need water and food while non-living things do not need.</li>
                            <li>Living things will breathe but non-living things will not breathe.</li>
                            <li>All living things can move except for plants. Only some non-living things can move such as car. </li>
                            <li>Living things can reproduce. All non-living things cannot reproduce.</li>
                            <li>Living things can grow, for example, human will grow from a baby to an adult.</li>
                            <li>Most non-living cannot grow.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 60%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Basic Need of Living Things</h3>
                        <ul style="line-height: 50px; ">
                            <li>Living things need food, water and air. Humans, animals and plants consume the basic needs in different ways.</li>
                            <li>Humans and animals eat food with mouth to consume food and plants produce own food in their body.</li>
                            <li>Human and animals use mouth to drink water and plant absorb water with roots.</li>
                            <li>Humans, animals and plants all need air to breathe.</li>
                        </ul>
                    </div>
                </div>
                <div class="sub" style="width: 40%; margin-left:50px; display:flex; align-items:center;">
                    <img src="../../images/drinkwater.jpg" style="height:350px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 60%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Humans and animals need protection</h3>
                        <p style="margin:10px;">to protect themselves from</p>
                        <div class="contain">
                            <div style="background-color: #9EC1CF;">Rain</div>
                            <div style="background-color: #FEB144;">Heat</div>
                            <div style="background-color: #FF6663;">Danger</div>
                        </div>
                    </div>
                </div>
                <div class="sub" style="width: 40%;">
                <img src="../../images/shelter.png" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">The importance of basic need</h3>
                        <ul style="line-height: 60px; ">
                            <li>Food provide energy.</li>
                            <li>Humans and animals need food to have energy to move and carry out activities.</li>
                            <li>Food help to grow.</li>
                            <li>Humans and animals need food to grow.</li>
                            <li>If humans and animals do not have water, air and food, humans and animals will die.</li>
                        </ul>
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
            location.href = "BuiltInQuestions.php?course=CR00000016Science";
        }
        const audios = document.querySelectorAll("audio");
        const songs = document.querySelectorAll("i");
        songs.forEach((song,index) =>{
            song.addEventListener("click",function(){
                audios[index].play();
                song.style.opacity = "1";
            });

            audios[index].addEventListener("ended", function() {
                song.style.opacity = "0.5";
            });
        })
    </script>
</body>
</html>