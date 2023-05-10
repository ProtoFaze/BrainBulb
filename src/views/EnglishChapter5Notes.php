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
            <h1>Chapter 5 : Grammer (Comparison Adjectives)</h1>
        </div>
        <div class="con">
            <div class="idea">
                <div class="sub" style="width: 40%;">
                    <div style="display:flex; align-items:center; justify-content:center;">
                        <ol style="line-height: 60px; ">
                            <li>Hari is a small boy.</li>
                            <li>Ali is smaller than Hari.</li>
                            <li>Rama is the smallest of the three.</li>
                        </ol>
                    </div>
                </div>
                <div class="sub" style="width: 60%;">
                    <ul style="line-height: 45px; ">
                        <li>When we say 'Hari is a small boy,' do I compare him with any other boy? <br><b>No</b></li>
                        <li>We simply say that Hari is small.</li>
                        <li>When we use the word smaller, how many boys do we compare? We compare two boys, Ali and Hari, and say that one is <b>smaller</b> than the other.</li>
                        <li>When we use the word smallest, we compare Hari, Ali and Rama, and say that Rama is the <b>smallest</b> of the three boys.</li>
                    </ul>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 50%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Here are more examples :</b>
                    </div>
                    <ul style="line-height: 45px; ">
                        <li>My room is larger than hers.</li>
                        <li>This chair is smaller than the one I was sitting on.</li>
                        <li>Your dog runs faster than Sahil's dog.</li>
                        <li>The rock flew higher than the roof.</li> 
                    </ul>
                </div>
                <div class="sub" style="width: 50%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;"><br></b>
                    </div>
                    <ul style="line-height: 45px; ">
                        <li>My house is the largest in our neighbourhood.</li>
                        <li>This is the smallest box I have ever seen.</li>
                        <li>Your dog ran the fastest of any dog in the race.</li>
                    </ul>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <table border=1 cellpadding="15px" style="margin: 0 auto; font-size:30px;">
                        <tr>
                            <td><b>Positive</b></td>
                            <td><b>Comparative</b></td>
                            <td><b>Superlative</b></td>
                        </tr>
                        <tr>
                            <td>Short</td>
                            <td>Shorter</td>
                            <td>Shortest</td>
                        </tr>
                        <tr>
                            <td>Old</td>
                            <td>Older</td>
                            <td>Oldest</td>
                        </tr>
                        <tr>
                            <td>Merry</td>
                            <td>Merrier</td>
                            <td>Merriest</td>
                        </tr>
                        <tr>
                            <td>Fat</td>
                            <td>Fatter</td>
                            <td>Fattest</td>
                        </tr>
                        <tr>
                            <td>Many</td>
                            <td>More</td>
                            <td>Most</td>
                        </tr>
                        <tr>
                            <td>Much</td>
                            <td>More</td>
                            <td>Most</td>
                        </tr>
                        <tr>
                            <td>Little</td>
                            <td>Less</td>
                            <td>largest</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "BuiltInQuestions.php?course=CR00000007English";
        }
    </script>
</body>
</html>