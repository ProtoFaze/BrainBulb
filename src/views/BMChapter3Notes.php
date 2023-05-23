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
    <?php for ($i = 1; $i <= 30; $i++) : ?>
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
            for($i = 0; $i < 30; $i++){
                echo "<div class='dots'><span class='dot'></span></div>";
            }
            
        ?>

        <div style="width: auto; background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Bab 3 : Pantun</h1>
        </div>
        <div class="con">
            <div class="idea" style="background-color:transparent;">
                <b>Puisi tradisional yang terdiri daripada empat baris dalam tiap-tiap rangkap. Pantun teka-teki, pantun kanak-kanak, pantun jenaka dan lain-lain adalah contoh jenis pantun</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 50%;">
                    <p style="color:#58cc02; font-weight:bold;">Buah lontar masak berisi;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Dari rantau tanam di laman;<br></p>
                    <p style="color:#ff4b4b; font-weight:bold;">Kamera pintar alatan inovasi;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Untuk memantau sekitar kediaman.</p>
                </div>
                <div class="sub" style="width:10%;">
                    <img src="../../images/leftarrow.png" style="width:90px; height:auto;">
                    <img src="../../images/leftarrow.png" style="width:90px; height:auto;">
                </div>
                <div class="sub" style="width: 40%;">
                    <div style="margin-left: 100px; padding:20px; background-color:#58cc02; border-radius:7px; text-align:center; margin-bottom: 10px; font-weight:bold;">Pembayang</div>
                    <div style="margin-left: 100px; padding:20px; background-color:#ff4b4b; border-radius:7px; text-align:center; font-weight:bold; ">Maksud</div>
                </div>    
            </div>
            <div class="idea" style="background-color:transparent;">
                <b>Contoh dan Maksud Pantun</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 60%;">
                    <p>Mengail puyu di hujung desa,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Dalam terusan nampak berbayang;<br></p>
                    <p style="font-weight:bold;">Pantun Melayu kesenian bangsa,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Pusaka warisan nenek dan moyang.</p>
                </div>
                <div class="sub" style="width: 40%;">
                    <div style="padding:20px; height:100%; background-color:#87cefa; border-radius:7px; text-align:center; font-weight:bold; align-items: center; display:flex;">
                        Pantun merupakan budaya peringgalan nenek moyang.
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 60%;">
                    <p>Manisnya rasa tidak terkira,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Buah papaya di Kampung Berangan;<br></p>
                    <p style="font-weight:bold;">Indah bahasa pantun berbicara;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Seni budaya dibuang jangan.</p>
                </div>
                <div class="sub" style="width: 40%;">
                    <div style="padding:20px; height:100%; background-color:#87cefa; border-radius:7px; text-align:center; font-weight:bold; align-items: center; display:flex;">
                        Bahasa pantun indah dan bersantun.
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 60%;">
                    <p>Cantik seninya ukiran kayu,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Sukar dicari begitu rupa;<br></p>
                    <p style="font-weight:bold;">Tinggi nilainya pantun Melayu;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Jati diri janganlah lupa.</p>
                </div>
                <div class="sub" style="width: 40%;">
                    <div style="padding:20px; height:100%; background-color:#87cefa; border-radius:7px; text-align:center; font-weight:bold; align-items: center; display:flex;">
                        Pantun Melayu ini tinggi nilainya dan jangan sesekali kita lupa.
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 60%;">
                    <p>Dalam taman berbunya tanjung,<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Bersopan santun dipetik si dara;<br></p>
                    <p style="font-weight:bold;">Meski berzaman tetap disanjung;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;Jagalah pantun tradisi dipelihara.</p>
                </div>
                <div class="sub" style="width: 40%;">
                    <div style="padding:20px; height:100%; background-color:#87cefa; border-radius:7px; text-align:center; font-weight:bold; align-items: center; display:flex;">
                        Pelihar dan jagalah pantun dan budaya kita supaya tidak hilang dan lupus daripada ingatan.
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
            location.href = "QuestionStarting.php?course=CR00000024BM";
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