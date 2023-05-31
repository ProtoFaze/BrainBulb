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
        padding: 20px 40px;
        line-height: 55px;   
        font-size: 22px;
        border-radius: 7px;
        margin:10px;
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
            <h1>Bab 6 : Tatabahasa (Kata Kerja)</h1>
        </div>
        <div class="con">
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja</h3>
                        <h4 style="margin: 10px;">Kata kerja digunakan untuk menunjukkan perbuatan atau kelakuan yang dilakukan oleh manusia atau haiwan.</h4>
                        <div class="contain">
                            <div style="background-color: #fbfdaa">Kata Kerja Aktif Transitif</div>
                            <div style="background-color: #b2e410;">Kata Kerja Aktif Tak Transitif</div>
                            <div style="background-color: #fdd97c;">Kata Kerja Pasif</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 70%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Aktif Transitif</h3>
                        <p style="margin: 10px;">Kata kerja aktif transitif ialah kata kerja yang memerlukan objek selepasnya.</p>
                        <h4 style="margin: 10px;">Contoh :</h4>
                        <ul style="line-height: 60px; ">
                            <li>Nabila telah <b>menjawab</b> <i>soalan</i> itu.</li>
                            <li>Pegawai itu sedang <b>menjalankan</b> <i>tugas</i>.</li>
                            <li>Lina suka <b>menulis</b> <i>cerpen</i> pada masa lapang.</li>
                            <li>Mila akan <b>menghadiri</b> <i>majlis</i> itu.</li>
                            <li>Ayah <b>memperbesarkan</b> <i>rumah</i> nenek.</li>
                        </ul>
                    </div>
                </div>
                <div class="sub" style="width: 30%;">
                    <div class="contain">
                        <div style="background-color: #ffadad"><b>Aktif Transitif</b> / <i>Objek</i></div>
                        <div style="background-color: #ffd6a5;"><b>Menjawab</b> <i>Soalan</i></div>
                        <div style="background-color: #ffd6a5;"><b>Menulis</b> <i>cerpen</i></div>
                        <div style="background-color: #fdffb6;"><b>Menghadiri</b> <i>Majlis</i></div>
                        <div style="background-color: #fdffb6;"><b>Menjalankan</b><i>Tugas</i></div>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 40%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Aktif Tak Transitif</h3>
                        <p style="margin: 10px;">Kata kerja aktif tak transitif ialah kata kerja yang <b>tidak</b> memerlukan objek selepasnya. Kata Kerja ini boleh berdiri sendiri. Terdapat 2 Jenis Kata Kerja Aktif Tak Transitif.</p>
                    </div>
                </div>
                <div class="sub" style="width: 60%;">
                    <div class="contain" style="line-height:30px;">
                        <div style="background-color: #fdd97c;display:flex; flex-direction: column;">
                            <b style="font-size:30px;">Dengan Pelengkap</b>
                            <p>Memerlukan frasa (penyambut) untuk melengkapkan ayat supaya tidak kelihatan tergantung.</p>
                        </div>
                        <div style="background-color: #fdd97c;display:flex; flex-direction: column;">
                            <b style="font-size:30px;">Tanpa Pelengkap</b>
                            <p>Tidak memerlukan penyambut untuk melengkapkan ayat. Ayat boleh berdiri dengan sendiri.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Aktif Tak Transitif Dengan Pelengkap</h3>
                        <h4 style="margin: 10px;">Contoh :</h4>
                        <p style="margin: 10px;">Kami <b>berasa</b> <i>gembira</i>.</p>
                        <p style="margin: 10px;"><b>berasa</b> - kata kerja</p>
                        <p style="margin: 10px;"><i>gembira</i> - pelengkap</p>
                        <p style="margin: 10px;">Air sungai <b>beransur</b> <i>surut</i>.</p>
                        <p style="margin: 10px;"><b>beransur</b> - kata kerja</p>
                        <p style="margin: 10px;"><i>surut</i> - pelengkap</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Aktif Tak Transitif Tanpa Pelengkap</h3>
                        <h4 style="margin: 10px;">Contoh :</h4>
                        <p style="margin: 10px;">Ayat <b>tersenyum</b>.</p>
                        <p style="margin: 10px;"><b>tersenyum</b> - kata kerja</p>
                        <p style="margin: 10px;">Radio itu <b>berbunyi</b>.</p>
                        <p style="margin: 10px;"><b>berbunyi</b> - kata kerja</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 100%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Pasif</h3>
                        <p style="margin: 10px;">Kata kerja pasif ialah kata kerja yang terhasil daripada perubahan <b>ayat aktif</b> menjadi ayat pasif.</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 50%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Ayat Aktif</h3>
                        <div class="contain">
                            <div style="background-color: #fbfdaa; font-size:28px;">Nasri <b>mengutip</b> <i>daun itu</i>.</div>
                        </div>
                        <table border=1 cellpadding="5px" style="font-size:28px; margin:10px;">
                            <tr>
                                <td>Nasri</td>
                                <td>pelaku</td>
                            </tr>
                            <tr>
                                <td><b>mengutip</b></td>
                                <td><b>kata kerja aktif</b></td>
                            </tr>
                            <tr>
                                <td><i>daun itu</i></td>
                                <td><i>objek</i></td>
                            </tr>
                        </table>
                        <p style="margin:10px;">Pelaku berada di hadapan, diikuti oleh kata kerja aktif dan objek di belakang.</p>
                    </div>
                </div>
                <div class="sub" style="width: 50%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Ayat Pasif</h3>
                        <div class="contain">
                            <div style="background-color: #fdd97c; font-size:26px;"><i>Daun itu</i> <b>dikutip</b> oleh Nasri.</div>
                        </div>
                        <table border=1 cellpadding="5px" style="font-size:26px; margin:10px;">
                            <tr>
                                <td><i>Daun itu</i></td>
                                <td><i>objek</i></td>
                            </tr>
                            <tr>
                                <td><b>dikutip</b></td>
                                <td><b>kata kerja aktif</b></td>
                            </tr>
                            <tr>
                                <td>Nasri</td>
                                <td>pelaku</td>
                            </tr>
                        </table>
                        <p style="margin:10px;">Objek berada di hadapan, diikuti oleh kata kerja pasif yang menggunakan imbuhan <b>di</b>- dan pelaku di belakang.</p>
                    </div>
                </div>
            </div>
            <div class="idea">
                <div class="sub" style="width: 50%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Aktif</h3>
                        <ul style="line-height: 60px; ">
                            <li>memasak</li>
                            <li>mengambil</li>
                            <li>mencatat</li>
                            <li>memberi</li>
                        </ul>
                    </div>
                </div>
                <div class="sub" style="width: 50%;">
                    <div style="display:flex; flex-direction: column;">
                        <h3 style="margin:10px;">Kata Kerja Pasif</h3>
                        <ul style="line-height: 60px; ">
                            <li>dimasak</li>
                            <li>diambil</li>
                            <li>dicatat</li>
                            <li>diberi</li>
                        </ul>
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
            location.href = "QuestionStarting.php?course=CR00000027BMb";
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