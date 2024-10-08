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
        z-index: -1;
        position:fixed;
        height: 100%;
        width: 100%;
        background-image: url('../../images/night.png');
        background-size: cover;
    }
    
    .progressbar{
        width: 100%;
    }

    .steps{
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: space-between;
        position: relative;
    }

    .steps .circle{
        display: flex;
        height: 30px;
        width: 30px;
        color: grey;
        font-size: 24px;
        font-weight: 700;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 4.5px solid grey;
        background-color: white;
        transition: all 200ms ease;
        transition-delay: 200ms;
    }

    .steps .circle.active{
        transition-delay: 100ms;
        border-color: #4070f4;
        color:#4070f4;
    }

    .steps .progress{
        position: absolute;
        height: 6px;
        width: 100%;
        background-color: #e0e0e0;
        z-index: -1;
    }

    .indicator{
        position: absolute;
        height: 100%;
        width: 0%;
        background-color: #4070f4;
        transition: all 300ms ease;
    }

    .options{
        display: flex;
        font-size: 25px;
        font-weight: bold;
        margin: 20px auto;
    }

    .options .box{
        border-radius: 7px;
        background-color: white;
        padding: 50px 50px;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        margin: 45px 20px;
        border: 0;
        font-size: 25px;
        font-weight: bold;
        cursor: pointer;
    }

    .box:hover{
        transform: scale(1.07);
    }

    .box:active{
        transform: scale(0.91);
    }

    .title{
        margin: 20px auto;
        color:white;
    }

    .box.selected, .boxes.selected{
        background-color: #DDF4FF;
        border: 2px solid lightskyblue;
        transform: scale(1);
    }

    .buttons{
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 50px 100px;
        background-color: #fff;
        box-shadow: 0px -2px 7px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
    }

    .button-bg-animation-wrong{
        animation-duration: 1s;
        animation-timing-function: ease;
        animation-name: WrongcolorChange;
        animation-fill-mode: forwards;
    }

    .button-bg-animation-correct{
        animation-duration: 1s;
        animation-timing-function: ease;
        animation-name: CorrectcolorChange;
        animation-fill-mode: forwards;
    }

    @keyframes WrongcolorChange {
        from { background-color: white; }
        to { background-color: #FFDFE0; }
    }

    @keyframes CorrectcolorChange {
        from { background-color: white; }
        to { background-color: #d7ffb8; }
    }

    .buttons .conbtn{
        float: right;
        border-radius: 7px;
        background-color: lightgrey;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        color: white;
        padding: 10px 40px;
        border: none;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
    }

    .buttons .conbtn:hover{
        transform: scale(1.15);
    }

    .buttons .conbtn:active{
        transform: scale(0.91);
    }

    .buttons .extbtn{
        float: left;
        border-radius: 7px;
        background-color: #FF4B4B;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        color: white;
        padding: 10px 40px;
        border: none;
        font-weight: bold;
        font-size: 18px;
        cursor: pointer;
    }

    .buttons .extbtn:hover{
        transform: scale(1.15);
    }

    .buttons .extbtn:active{
        transform: scale(0.91);
    }

    .container{
        width: 100%;
        height: auto;
        overflow: hidden;
        -webkit-user-select: none;
    }

    .pages{
        display: flex;
        width: 500%;
        box-sizing: border-box;
    }

    .page{
        width: 100%;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: all 0.6s;
    }

    .correctpopup,.wrongpopup{
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 200px;
        left: 0;
        top:0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.3);
        opacity: 0;
        transition: opacity 0.6s ease-in-out;
    }

    .correctpopup .cpopup-inner, .wrongpopup .wpopup-inner{
        background-color: #ececec;
        margin: auto;
        padding: 40px;
        width: 25%;
        text-align: center;
        border-radius: 6px;
        font-size: 20px;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    }

    .correctpopup .cpopup-inner{
        color: #58cc02;
    }

    .wrongpopup .wpopup-inner{
        color: #FF4B4B;
    }

    svg {
        width: 100px;
        margin: 40px auto;
    }

    .path {
        stroke-dasharray: 1000;
        stroke-dashoffset: 0;
    }

    .path.check {
        stroke-dashoffset: -100;
        -webkit-animation: dash-check 1.20s 0.75s ease-in-out forwards;
        animation: dash-check 1.20s 0.75s ease-in-out forwards;
    }

    .path.line {
        stroke-dashoffset: 1000;
        -webkit-animation: dash 1.20s 0.75s ease-in-out forwards;
        animation: dash 1.20s 0.75s ease-in-out forwards;
    }

    .path.circle {
        -webkit-animation: dash 1.20s ease-in-out;
        animation: dash 1.20s ease-in-out;
    }

    @-webkit-keyframes dash {
        0% {
            stroke-dashoffset: 1000;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }

    @keyframes dash {
        0% {
            stroke-dashoffset: 1000;
        }
        100% {
            stroke-dashoffset: 0;
        }
    }

    @-webkit-keyframes dash-check {
        0% {
            stroke-dashoffset: -100;
        }
        100% {
            stroke-dashoffset: 900;
        }
    }

    @keyframes dash-check {
        0% {
            stroke-dashoffset: -100;
        }
        100% {
            stroke-dashoffset: 900;
        }
    }

    .resetpair{
        color:white; 
        cursor:pointer; 
        border-radius: 7px;
        background-color: grey;
        padding: 10px 20px;
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        margin: 30px 0;
        bottom: 0;
        border: 0;
        font-size: 25px;
        font-weight: bold;
    }

    .resetpair:hover{
        transform: scale(1.000000009);
    }

    .resetpair:active{
        transform: scale(0.91);
    }

    .popuphuman{
        position:fixed;
        top:100px;
        left:-300px;
        width:100%;
        height:100%;
        max-width: 500px;
        max-height: 449px;
        display: none;
        animation-duration: 1s;
        animation-name: popupani;
        animation-timing-function: ease-in-out;
        animation-fill-mode: forwards;
        z-index: 2;
    }

    @keyframes popupani{
        from {
            transform: translate(0, 0);
            opacity: 0;
            visibility: hidden;
        }
        to {
            transform: translate(300px, 0);
            opacity: 1;
            visibility: visible;
        }
    }

</style>
<script>
    var mcqanswer = [];
    const datetimeString = new Date();
</script>
<body>
    <?php
        $courseID = $_GET['id']; 
        include "../database/connect.php";
        $_SESSION['course'] = $courseID;
        $query = "SELECT * FROM (((questionbank INNER JOIN course ON course.course_ID = questionbank.course_ID) INNER JOIN questioncorrectanswer ON questioncorrectanswer.correct_List_ID = questionbank.correct_List_ID) INNER JOIN questionoptionlist ON questionoptionlist.option_List_ID = questionbank.option_List_ID) WHERE course.question_Type = 'Customised Quiz' AND course.course_ID = '$courseID' ORDER BY questionbank.post_Datetime ASC";
        $results = mysqli_query($connection,$query);
        $count = mysqli_num_rows($results);
    ?>
    <div class="maincontainer">    
        <div id="topbar" style="margin-left:100px; margin-right: 100px; margin-top: 48px; margin-bottom:45px;">
            <div class="progressbar">
                <div class="steps">
                    <span class="circle active">1</span><!--minimum 1 question--->
                    <?php
                        for($i = 2; $i <= $count;$i++){
                            echo "<span class='circle'>".$i."</span>";
                        }
                    ?>
                    <div class="progress">
                        <span class="indicator"></span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="container">
            <div class="correctpopup" id="cpopup">
                <div class="cpopup-inner">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#58cc02" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                        <polyline class="path check" fill="none" stroke="#58cc02" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                    </svg>
                    <h2>You are Correct!</h2>
                </div>
            </div>
            <div class="wrongpopup" id="wpopup">
                <div class="wpopup-inner">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                        <circle class="path circle" fill="none" stroke="#FF4B4B" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                        <line class="path line" fill="none" stroke="#FF4B4B" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
                        <line class="path line" fill="none" stroke="#FF4B4B" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
                    </svg>
                    <h2>You got Wrong!</h2>
                </div>
            </div>
            <div>
                <img src="../../images/human2.png" class='popuphuman'>
            </div>
            <?php $c = $count * 100;?>
            <div class="pages" <?php echo'style="width:'.$c.'%;"'; ?>>
                <?php
                    while ($row = mysqli_fetch_assoc($results)) {
                        $arrayss = array();
                        for ($j = 1; $j <= 10; $j++){
                            if ($row['coption'.$j] != null){
                                array_push($arrayss,$row['coption'.$j]);
                            }         
                        }
                        ?>
                        <script>
                            mcqanswer.push("<?php echo $arrayss[0]; ?>");
                        </script>
                        <?php
                        for ($j = 1; $j <= 5; $j++){
                            if ($row['option'.$j] != null){
                                array_push($arrayss,$row['option'.$j]);
                            }         
                        }
                        shuffle($arrayss);
                        echo "<div class='page'>";
                        echo "<div class='title'>";
                        echo "<h1>".$row['question']."</h1>";
                        echo "</div>";
                        echo "<div class='options'>";
                        for ($u = 0; $u < count($arrayss); $u++){
                            echo "<div class='box'>".$arrayss[$u]."</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <div class="buttons" id="Buttonbg">
            <input type="button" value="Exit" class="extbtn" onclick="leave()">
            <input type="button" name="continuebtn" value="Continue" class="conbtn" onclick="checkanswer();" disabled>
        </div>
    </div>
</body>
<script>
    function leave(){
        location.reload();
        window.location.href = 'studentviewquiz.php';
    }

    function pairsExist(a, b) {
        for (let i = 0; i < b.length; i++) {
            const pair = b[i];
            let pairFound = false;

            for (let j = 0; j < a.length; j++) {

                if ((a[j][0] === pair[0] && a[j][1] === pair[1]) ||
                    (a[j][0] === pair[1] && a[j][1] === pair[0])) {
                    pairFound = true;
                    break;
                }
            }

            if (!pairFound) {
                return false;
            }
        }
        return true;
    }

    const constant = [true,false,false,false,false,false,false,false,false,false];
    const humani = document.querySelector(".popuphuman");
    var resp = [];
    var lvlxp = 0;
    var correctness = 0;
    var wrongness = 0;
    var mcqselect = "";
    var indexans = 0;
    const pages = document.querySelectorAll(".page");
    const prog = document.querySelector(".indicator");
    const circles = document.querySelectorAll('.circle');
    const translateAmount = 100;
    let translate = 0;
    let progresslvl = 0;
    let currentstep = 1;

    const boxesbtn = document.querySelectorAll('.box');
    const nextbtn = document.querySelector('.conbtn');
    const buttonbg = document.getElementById('Buttonbg');
    const boxesbtns = document.querySelectorAll('.boxes');

    var correctpopup = document.getElementById("cpopup");
    var wrongpopup = document.getElementById("wpopup");

    function checkanswer(){
        if (mcqselect == mcqanswer[indexans]){
            buttonbg.classList.add('button-bg-animation-correct');
            correctpopup.style.display = "block";
            setTimeout(function() {
                correctpopup.style.opacity = 1;
            }, 300);
            setTimeout(function() {
                buttonbg.classList.remove('button-bg-animation-correct');
                ifended();
                correctpopup.style.opacity = 0;
                setTimeout(function() {
                    correctpopup.style.display = "none";
                }, 300);
            }, 2300);
            mcqselect = "";
            correctness += 1;
            lvlxp += 15;
            resp.push(true);
        }
        else{
            buttonbg.classList.add('button-bg-animation-wrong');
            wrongpopup.style.display = "block";
            setTimeout(function() {
                wrongpopup.style.opacity = 1;
            }, 300);
            setTimeout(function() {
                buttonbg.classList.remove('button-bg-animation-wrong');
                ifended();
                wrongpopup.style.opacity = 0;
                setTimeout(function() {
                    wrongpopup.style.display = "none";
                }, 300);
                humani.style.display = "none";
            }, 2300);
            mcqselect = "";
            wrongness += 1;
            lvlxp += 5;
            resp.push(false);
            if(constant[Math.floor(Math.random() * 10)]){
                humani.style.display = "block";
            }
        }
        nextbtn.disabled = true;
    }

    function ifended(){
        indexans += 1
        if(indexans === <?php echo $count;?>){
            const Edatetime = new Date();
            location.href='ChapterSummary.php';
            localStorage.setItem('correct',correctness);
            localStorage.setItem('wrong',wrongness);
            localStorage.setItem('xp',lvlxp);
            localStorage.setItem('starttime',datetimeString);
            localStorage.setItem('endtime',Edatetime);
            localStorage.setItem('res',resp);
        }
        else{
            slide("next");
        }
    }

    function slide(direction){
        if (direction === "next"){
            translate -= translateAmount;
            currentstep += 1;
            progresslvl += 100/<?php echo $count-1;?>;
        }

        for (let i = 0; i < pages.length; i++) {
            pages[i].style.transform = `translateX(${translate}%)`;
        }

        prog.style.width = `${progresslvl}%`

        circles.forEach((circle,index) =>{
            circle.classList[`${index < currentstep ? "add" : "remove"}`]("active");
        })
        nextbtn.style.backgroundColor = "lightgrey";
        
        boxesbtns.forEach(each => {
            each.classList.remove('selected');
        })
    }
    //mcq select method
    boxesbtn.forEach(eachbtn => {
        eachbtn.addEventListener('click',() => {
            boxesbtn.forEach(each => {
                each.classList.remove('selected');
            })
            eachbtn.classList.add('selected');
            nextbtn.style.backgroundColor = "#58cc02";
            nextbtn.disabled = false;
            if (eachbtn.classList.contains("selected")){
                mcqselect = eachbtn.innerHTML;
            }
        })
    })
    <?php mysqli_close($connection);?>
</script>
</html>