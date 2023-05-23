<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<!-- testin123-->
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

    .contain{
        display:flex;
        flex-wrap:wrap;
    }

    .contain > div{
        text-align: center;
        padding: 20px 50px;
        line-height: 75px;   
        font-size: 28px;
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
            for($i = 0; $i < 30; $i++){
                echo "<div class='dots'><span class='dot'></span></div>";
            }
            
        ?>

        <div style="width: auto; background-color: lightskyblue; text-align:center; font-size:30px; margin:50px auto; padding:10px; border-radius: 5px;">
            <h1>Bab 5 : Tatabahasa (Kata Ganti Nama Diri)</h1>
        </div>
        <div class="con">
            <div class="idea">
                <p style="margin:10px;"><b>Maksud Kata ganti nama diri</b><br>
                Menjadi pengganti kepada benda atau orang
                </p>
            </div>
            <div class="idea" style="background-color:transparent;">
                <b>3 Jenis kata ganti nama diri</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Ganti Nama Diri Pertama</h3>
                        <div class="contain">
                            <div style="background-color: #cc99c9">Saya</div>
                            <div style="background-color: #9bf6ff;">Aku</div>
                            <div style="background-color: #ffadad;">Kita</div>
                            <div style="background-color: #ffc6ff;">Kami</div>
                        </div>
                        <h4 style="margin:10px;">Contohnya :</h4>
                        <p style="margin: 10px;"><b>Saya</b> telah dilantik menjadi ketua darjah.</p>
                    </div>
                </div>
                <div class="sub" style="width: 30%; display:flex; justify-content:center; align-items:center;">
                    <img src="../../images/saya.png" style="width:45%;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Ganti Nama Diri Kedua</h3>
                        <ul style="line-height: 60px; ">
                            <li>Kamu</li>
                            <li>Kalian</li>
                            <li>Awak</li>
                            <li>Anda</li>
                        </ul>
                        <h4 style="margin:10px;">Contohnya :</h4>
                        <p style="margin: 10px;">Saya akan ke rumah <b>awak</b> esok.</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Ganti Nama Diri Ketiga</h3>
                        <div class="contain">
                            <div style="background-color: #ffadad">Mereka</div>
                            <div style="background-color: #ffd6a5;">Dia</div>
                            <div style="background-color: #fdffb6;">Beliau</div>
                            <div style="background-color: #caffbf;">Ia</div>
                        </div>
                        <h4 style="margin:10px;">Contohnya :</h4>
                        <p style="margin: 10px;"><b>Mereka</b> belajar bersama-sama pada setiap hujung minggu.</p>
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
            location.href = "QuestionStarting.php?course=CR00000026BM";
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