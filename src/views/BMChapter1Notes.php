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
            <h1>Bab 1 : Frasa tentang kehidupan harian</h1>
        </div>
        <div class="con">
            <div class="idea" style="background-color:transparent;">
                <b>Today, We will be learning some basic daily life Malay phrases.</b>  
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Apa Khabar</b> <p style="margin-right:25px; font-size:30px;">(apah ka-bar)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/apakhabar.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    This phrase means <b>"How are you"</b> and is normally used in daily conversation. it’s always polite to check in with friends with this phrase or just use it to get to know someone new. The common response to this in Malay is “khabar baik” which translates to “good news”, but ultimately means “I am fine”.
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/greeting.png" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Tolong</b> <p style="margin-right:25px; font-size:30px;">(toh-long)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/tolong.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    This word means <b>"Please"</b>. When asking someone a question, it shows a great deal of respect to follow your inquiry with “tolong” and of course the Malay term for “thank you”. “Tolong” is also used for the word “help”.
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Selamat Tinggal</b> <p style="margin-right:25px; font-size:30px;">(S'LAH-maht TING-gahl)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/selamattinggal.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    This phrase means <b>"Good Bye"</b>. Though people in Malaysia are familiar with the English term “bye”, this is a more formal, respectful way to bid farewell. 
                </div>
                <div class="sub" style="width: 30%;">
                    <img src="../../images/goodbye.png" style="height:320px; width:auto;">
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Terima Kasih</b> <p style="margin-right:25px; font-size:30px;">(te-ree-mah ka-seh)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/terimakasih.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    This phrase means <b>"Thank You"</b>. Gratitude is of extreme importance to Malaysians. This is something that will quickly become apparent the moment you set foot in the airport. Whether it’s your Grab driver, the barista or just someone who held the door for you, make sure to use this term of appreciation.  
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Sama-sama</b> <p style="margin-right:25px; font-size:30px;">(saa-ma saa-ma)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/samasama.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    This phrase means <b>"You're welcome"</b>. As mentioned above, gratitude - and being polite in general - is of great importance to Malaysians. When someone says, “Terima kasih”, be sure to respond with, “Sama-sama”. It’s also common to just use a single “sama”.  
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Ya/Tidak</b> <p style="margin-right:25px; font-size:30px;">(yah) / (tee-dak)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/yatidak.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    "Ya" means <b>"Yes"</b>, "Tidak" means <b>"No"</b>. Sometimes, "Tidak" can be also refered as "Bukan". These phrases are often used to agree or reject something or someone.  
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; align-items:center; margin-bottom:10px;">
                        <b style="font-size:35px; margin-right:25px;">Berapa</b> <p style="margin-right:25px; font-size:30px;">(be-raa-paa)</p> 
                        <span><i class="fa fa-volume-up fa-2x" style="color:grey; opacity:.5;"></i></span><br>
                        <audio hidden>
                            <source src="../../audio/berapa.mp3" type="audio/mp3">
                        </audio>
                    </div>
                    This word means <b>"How much"</b>. When buying a coffee, new clothes or visiting any street markets, this term will be quite useful. You can simply ask, “Berapa” and then the individual you’re speaking with can hold up their fingers or use a calculator to show you the price.   
                </div>
            </div>
        </div>
        <div style="margin: 40px auto; text-align:center;">
            <button class="start" onclick="start()">Start Execrise</button>
        </div>
    </div>
    <script>
        function start(){
            location.href = "QuestionStarting.php?course=CR00000022BMb";
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