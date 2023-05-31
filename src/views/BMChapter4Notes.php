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

    .contain{
        display:flex;
        flex-wrap:wrap;
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
            for($i = 0; $i < 30; $i++){
                echo "<div class='dots'><span class='dot'></span></div>";
            }
            
        ?>

        <div style="width: auto; background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Bab 4 : Tatabahasa (Kata Bilangan)</h1>
        </div>
        <div class="con">
            <div class="idea">
                <p style="margin:10px;"><b>Apa itu kata bilangan?</b><br>
                Kata yang menyatakan bilangan atau jumlah sesuatu.
                </p>
            </div>
            <div class="idea" style="background-color:transparent;">
                <b>Sebenarnya, terdapat 5 jenis kata bilangan</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Bilangan yang menunjukkan jumlah yang tentu sifatnya.</h3>
                        <h4 style="margin:10px;">Contohnya :</h4>
                        <ul style="line-height: 60px; ">
                            <li>Satu (1)</li>
                            <li>Tiga (3)</li>
                            <li>Lima (5)</li>
                            <li>Sepuluh (10)</li>
                            <li>Seratus (100)</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Kata bilangan yang menunjukkan bilangan yang tidak tentu</h3>
                    <h4 style="margin:10px;">Contohnya :</h4>
                    <div class="contain">
                        <div style="background-color: #cc99c9">beberapa</div>
                        <div style="background-color: #ffbdda;">sesetengah</div>
                        <div style="background-color: #18ffb1;">semua</div>
                        <div style="background-color: #feb144;">seluruh</div>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div style="display:flex; flex-direction: column;">
                    <h3 style="margin:10px;">Kata bilangan yang menunjukkan himpunan</h3>
                    <h4 style="margin:10px;">Contohnya :</h4>
                    <div class="contain">
                        <div style="background-color: #CAFFBF">kedua-dua</div>
                        <div style="background-color: #ffd6a5;">keempat-empat</div>
                        <div style="background-color: #BDb2ff;">berpuluh-puluh</div>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Bilangan yang membawa maksud pecehan.</h3>
                        <h4 style="margin:10px;">Contohnya :</h4>
                        <ul style="line-height: 60px; ">
                            <li>Setengah</li>
                            <li>Sepertiga</li>
                            <li>Separuh</li>
                            <li>Suku</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Bilangan yang menunjukkan kedudukan.</h3>
                        <h4 style="margin:10px;">Contohnya :</h4>
                        <ul style="line-height: 60px; ">
                            <li>Pertama</li>
                            <li>Kedua</li>
                            <li>Ketiga</li>
                            <li>Kesepuluh</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Contoh Penggunaan Kata Bilangan</b> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/katabilangan.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    <img src="../../images/bilangan.png" style="width:100%;">
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000025BMb";
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