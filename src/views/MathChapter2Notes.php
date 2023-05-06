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
            <h1>Chapter 2: Simple Arithmetics</h1>
        </div>
        <div class="con">
            <b class="idea" style="background-color:transparent;">In this lesson, we will learn about the four basic operations: addition, subtraction, multiplication, and division.</b>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Addition</b>
                    </div>
                Addition is putting <b>two numbers together</b> to get a new number. For example, if you have <b>3</b> apples and someone gives you <b>2</b> more, you now have a total of <b>5</b> apples. We use the <b>plus sign (+)</b> to show additions. So, 3 + 2 = 5.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/plus.png" style="height:320px; width:auto;">
                    <!-- sourced from pngimg.com :https://pngimg.com/image/40947 -->
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Subtraction</b>
                    </div>
                    Subtraction is <b>taking a number away from another number</b> to get a new number. For instance, if you have <b>7</b> candies and you eat <b>3</b>, you now have <b>4</b> candies left. The <b>minus sign (-)</b> is used to represent subtraction. So, 7 - 3 = 4.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/minus.png" style="height:320px; width:auto;">
                    <!-- sourced from pngimg.com :https://pngimg.com/image/41011 -->
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Multiplication</b>
                    </div>
                    Multiplication is <b>adding a number to itself a set amount of times</b>. Like if you and 2 of your other friends have <b>4</b> pencils each and you want to know how many pencils all have together. If you multiply them by <b>3</b>, meaning you add <b>4 + 4 + 4</b>, which equals <b>12</b> pencils.</br> We use the <b>multiplication sign (x)</b> to show multiplication. So, 4 x 3 = 12.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/multiply.png" style="height:320px; width:auto;">
                    <!-- sourced from hiclipart.com :https://www.hiclipart.com/free-transparent-background-png-clipart-mggoh -->
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Division</b>
                    </div>
                    Division is when you <b>split a number into equal parts</b>. For example, you have <b>12</b> cookies and you want to share them <b>equally among 3</b> friends, you would give <b>each friend 4</b> cookies. We use the <b>division sign (÷)</b> to show division. So, 12 ÷ 3 = 4.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/divide.png" style="height:320px; width:auto;">
                    <!-- sourced from hiclipart.com :https://www.hiclipart.com/free-transparent-background-png-clipart-mggoh -->
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Comparing Numbers</b>
                    </div>
                    Lastly, to determine which number is <b>greater or less</b> than another number like we learned previously, we can use the symbols <b>> (greater than)</b>, <b>< (less than)</b>, or <b>= (equal to)</b>. For example, 500 > 100 means that 500 is greater than 100 and 100 < 500 means that 100 is less than 500. If two numbers are the same, we use the symbol = to show that they are equal. For example, 10 = 10.
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "MathChapter2Questions.php";
        }
    </script>
</body>
</html>