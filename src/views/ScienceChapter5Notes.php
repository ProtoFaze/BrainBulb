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
            <h1>Chapter 5 : Magnet</h1>
        </div>
        <div class="con">
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <p>A magnet is an object that produces a magnetic field. Magnetic field is invisible force that pulls on other ferromagnetic materials. <br>Ferromagnetic material is materials that attracted to a magnet. Most of the ferromagnetic materials are metals such as iron, steel, nickel, cobalt, etc.
                    The example of non-ferromagnetic materials are wood, cloth, plastic, etc.
        </p>
                    <img src="../../images/magnet.png" style="width:40%; margin:0 auto;">
                </div>
            </div>
            <div class="idea">
                <h3 style="margin:10px;">Uses of Magnet</h3>
                <img src="../../images/magnetuse.png" style="width:70%; margin:0 auto;">
                <p>In the picture above, it show two uses of magnet in our daily life. The first example is about a refrigerator door closing tightly. It is because the refrigerator door has magnets in it and the magnets attract to another ferromagnetic material so the refrigerator door can be closed tight. 
                <br><br>
                The second example is the name tag of the teacher can be secured on the shirt without a pin. The name tag is made with ferromagnetic material with a magnet bar attach to it. The magnet bar is place under the cloth then the name tag is attached on the magnet bar outside of the cloth. The magnet bar will attract the name tag although there is a layer of cloth apart them so this is the reason of the name tag can be secured without using a pin.</p>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Shapes of Magnet</h3>
                    <p style="margin:10px;">Magnets exist will various of shapes. </p>
                    <img src="../../images/magnetshape.png" style="width:70%; margin:0 auto;">
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Attractions and Repulsion of Magnets</h3>
                    <p style="margin:10px;">When two magnets are put close together they can attract or repel. Every magnet has two opposite poles, the North pole and the South pole.
                    Same of the magnet will state the poles. N represent the North pole while S represent the South pole.
                    <br><br>
                    When you put two magnet together, the magnets will have different reaction based on the direction of the magnet poles. 
                    <br><br>
                    If the magnets with opposite pole are put together, the magnets will attract to each other. 
                    However, the magnets with the same pole are put together, the magnets will not be attracted but repel to each other.
                    </p>
                <img src="../../images/pole.png" style="width:70%; margin:0 auto;">
                </div>
            </div>

    
        </div>

        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "BuiltInQuestions.php?course=CR00000045Science";
        }
    </script>
</body>
</html>