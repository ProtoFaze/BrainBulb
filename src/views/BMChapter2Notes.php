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
            <h1>Bab 2 : Simpulan Bahasa</h1>
        </div>
        <div class="con">
            <div class="idea" style="background-color:transparent;">
                <b>Simpulan Bahasa ialah perkataan yang terdiri daripada dua perkataan atau lebih. Simpulan bahasa mempunyai maksud yang berbeza daripada makna perkataan yang membentuk kata tersebut.</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Ada Bakat</b> <p style="margin-right:25px; font-size:30px;">(talented)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/adabakat.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br> 
                    Fairuz <b>ada bakat</b> untuk menjadi penulis novel.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Ambil Hati</b> <p style="margin-right:25px; font-size:30px;">(do something to make someone happy)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/ambilhati.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br> 
                    Fasihah pandai meng<b>ambil hati </b> ibu mertuanya.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Besar Hati</b> <p style="margin-right:25px; font-size:30px;">(grateful)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/besarhati.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example : <br>
                    Puan Seri berasa <b>besar hati</b> apabila anaknya berjaya mendapat tempat pertama dalam pertandingan itu.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/happy.png" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Air Muka</b> <p style="margin-right:25px; font-size:30px;">(facial expression)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/airmuka.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br>
                    <b>Air muka</b> liyana berseri-seri apabila diumunkan sebagai pemenang utama pertandingan itu.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Buah Hati</b> <p style="margin-right:25px; font-size:30px;">(sweetheart)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/buahhati.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br>
                    Aina jaring dimarahi kerana dia <b>buah hati</b> ibunya.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Cakap Besar</b> <p style="margin-right:25px; font-size:30px;">(Boast)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/cakapbesar.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br>
                    Zanial suka <b>cakap besar</b> tentang kekayaannya.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Ada Hati</b> <p style="margin-right:25px; font-size:30px;">(Intention)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/adahati.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br>
                    Iskandar <b>ada hati</b> untuk membeli kereta yang mahal itu untuk ayahnya.   
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Ambil Berat</b> <p style="margin-right:25px; font-size:30px;">(Care for someone)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/ambilberat.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    Example :<br>
                    Encik Norman sentiasa meng<b>ambil berat</b> terhadap pelajaran anak-anaknya.   
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Contoh Penggunaan Simpulan Bahasa</b> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/sim.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    <img src="../../images/sim.png" style="width:100%;">
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000023BM";
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