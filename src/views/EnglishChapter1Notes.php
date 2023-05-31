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
            <h1>Chapter 1 : Preposition</h1>
        </div>
        <div class="con">
            <div class="idea" style="background-color:transparent;">
                <b>Preposition is a word to describe the relation between the subject and object in a sentence.</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 65%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">In Front Of</b>
                    </div>
                    This is used to denote that something/someone is standing in front of another person/object.<br>
                    Example : The dog is standing <b>in front of</b> the sofa.
                </div>
                <div class="sub" style="width: 35%; margin-left:30px;">
                    <img src="../../images/infrontof.jpg" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width:35%;">
                    <img src="../../images/behind.png" style="height:400px; width:auto;">
                </div>
                <div class="sub" style="width: 65%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Behind</b>
                    </div>
                    It is used to express <b>opposite</b> connatation of in front of. <br>
                    It means at the back (part) of something/someone. <br>
                    Example : The bird is staying <b>behind</b> the box.

                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 78%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Among</b>
                    </div>
                    It is used for more than two persons / things.
                    <br>
                    Example : The blue bird stays <b>among</b> the birds.   
                </div>
                <div class="sub" style="width: 22%; margin-left:30px;">
                    <img src="../../images/among.png" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width:35%;">
                    <img src="../../images/beside.png" style="height:350px; width:auto;">
                </div>
                <div class="sub" style="width: 65%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px;">Next to</b>&nbsp;and&nbsp;<b>beside</b>
                    </div>
                    It is used to refer to an object or a person that is at the side of another thing.
                    <br>
                    Example : The elephant stays <b>next to</b> the chair <i>OR</i> The elephant stays <b>beside</b> the chair.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width:28%;">
                    <center>
                        <img src="../../images/on.png" style="height:320px; width:auto;">
                    </center>
                </div>
                <div class="sub" style="width: 72%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px;">On</b>
                    </div>
                    It is used to point out the position of a person or an object.
                    <br>
                    Example : The bear is standing <b>on</b> the table.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                    <b style="font-size:35px;">Under</b>&nbsp;and&nbsp;<b>Below</b>
                    </div>
                    This is mean at a lower-level with reference to someone/something.<br>
                    Example : She stays <b>under/below</b> the table while reading.
                </div>
                <div class="sub" style="width: 30%; margin-left:30px;">
                    <img src="../../images/below.png" style="height:320px; width:auto;">
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000003English";
        }
    </script>
</body>
</html>