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

    body{
        background-color: steelblue;
    }

    .container {
       
    }
    
    .counter {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .counter.hide {
        transform: translate(-50%, -50%) scale(0);
        animation: hide .2s ease-out;
    }

    @keyframes hide {
        0% {
            transform: translate(-50%, -50%) scale(1);
        }

        100% {
            transform: translate(-50%, -50%) scale(0);
        }
    }

    .final {
        font-size: 40px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
    }

    .final.show {
        transform: translate(-50%, -50%) scale(1);
        animation: show .3s ease-in;
    }

    @keyframes show {
        0% {
            transform: translate(-50%, -50%) scale(0);
        }

        80% {
            transform: translate(-50%, -50%) scale(1.4);
        }

        100% {
            transform: translate(-50%, -50%) scale(1);
        }
    }

    .nums {
        position: relative;
        font-size: 70px;
        overflow: hidden;
        width: 250px;
        height: 50px;
    }

    .nums span {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%) rotate(120deg);
        transform-origin: bottom center;
    }

    .nums span.in {
        transform: translate(-50%, -50%) rotate(0deg);
        animation: goIn .5s ease-in-out;
    }

    .nums span.out {
        animation: goOut .5s ease-in-out;
    }

    @keyframes goIn {
        0% {
            transform: translate(-50%, -50%) rotate(120deg);
        }
        30% {
            transform: translate(-50%, -50%) rotate(-20deg);
        }

        60% {
            transform: translate(-50%, -50%) rotate(10deg);
        }

        90%, 100% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

    }

    @keyframes goOut {
        0%, 30% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        60% {
            transform: translate(-50%, -50%) rotate(20deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(-120deg);
        }
    }

    h4 {
        font-size: 38px;
        margin: 7px;
        margin-top: 20px;
        text-transform: uppercase;
        color:white;
    }

    .circle{
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        width:270px;
        height:270px;
        background:#ccc;
        border:5px solid #fff;
        box-shadow:0 0 0 5px #4973ff;
        border-radius:50%;
        overflow:hidden;
    }
    .wave{
        position:relative;
        width:100%;
        height:100%;
        background:#4973ff;
        border-radius:50%;
        box-shadow:inset 0 0 50px rgba(0,0,0,.5);
    }
    .wave:before,.wave:after{
        content:'';
        position:absolute;
        width:200%;
        height:200%;
        top:0;
        left:50%;
        transform:translate(-50%,-75%);
        background:#000;
    }
    .wave:before{
        border-radius:45%;
        background:rgba(255,255,255,1);
        animation:animate 5s linear infinite;
    }
    .wave:after{
        border-radius:40%;
        background:rgba(255,255,255,.5);
        animation:animate 10s linear infinite;
    }
    @keyframes animate{
        0%{
            transform:translate(-50%,-75%) rotate(0deg);
        }
        100%{
            transform:translate(-50%,-75%) rotate(360deg);
        }
    }
    
</style>
<?php
    $a = $_GET['course'];
?>
<body>
    <div class="main">
        <div class="circle">
            <div class="wave"></div>
        </div>
        <div class="counter">
            <div class="nums">
                <span class="in" style="color:red;">3</span>
                <span style="color:orange;">2</span>
                <span style="color:green;">1</span>
            </div>
            <br>
            <h4>Get Ready</h4>
        </div>
        <div class="final">
            <h1>GO!</h1>
        </div>
    </div>
    <script>
        const nums = document.querySelectorAll('.nums span');
        const counter = document.querySelector('.counter');
        const finalMessage = document.querySelector('.final');
        const repl = document.getElementById('replay');

        runAnimation();

        function runAnimation() {
            nums.forEach((num, idx) => {
                const penultimate = nums.length - 1;
                num.addEventListener('animationend', (e) => {
                    if(e.animationName === 'goIn' && idx !== penultimate){
                        num.classList.remove('in');
                        num.classList.add('out');
                    } else if (e.animationName === 'goOut' && num.nextElementSibling){
                        num.nextElementSibling.classList.add('in');
                    } else {
                        counter.classList.add('hide');
                        finalMessage.classList.add('show');
                        setTimeout(function() {
                            
                            location.href = "BuiltInQuestions.php?course=<?php echo $a;?>";
                        }, 800);
                        
                    }
                });
            });
        }
    </script>
</body>
</html>