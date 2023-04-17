
<!-- Get questions
= SELECT question_ID AS quesID, question AS ques, correct_List_ID AS correc_ID, option_List_ID as optionID FROM questionBank WHERE course_ID = "";

Get correct answer
= SELECT * FROM questionCorrectAnswer WHERE correct_List_ID = "";

Get option answer
= SELECT * FROM questionOptionList WHERE option_List_ID = ""; -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Question</title>
    <style>
        body {
            background-image: url(imgFile/spaceBG.png);
            background-size: cover;
            background-attachment: fixed;
        }
        .qBlock {
            background-color: rgba(255, 255, 255, 0.8);
            width: 900px;
            /* height: 100px; */
            margin: auto;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .quesBlock {
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            padding-top: 5px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 10px;
        }
        .optionTable {
            /* width: 100%; */
            margin: auto;
        }
        .optionTable td {
            padding: 5px;
            width: 400px;
            /* background-color: rgb(169, 214, 253); */
        }
        #spaceship {
            z-index: -1;
            max-width: 150px;
            max-height: 150px;
            animation-name: fly;
            animation-duration: 25s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            position: fixed;
            top: 500px;
            left: -150px;
            opacity: 0.7;
        }
        @keyframes fly {
            from {
                transform: rotate(120deg) translate(0, 0);
            }
            to {
                transform: translate(800px, -600px);
            }
        }

        #planet {
            z-index: -1;
            max-width: 200px;
            max-height: 200px;
            animation-name: fly2;
            animation-duration: 40s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-out;
            position: fixed;
            top: 700px;
            right: 250px;
        }
        @keyframes fly2 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(180deg) translate(-500px, 400px);
            }
        }

        #galaxy {
            z-index: -2;
            max-width: 200px;
            max-height: 200px;
            animation-name: fly3;
            animation-duration: 35s;
            animation-delay: 15s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            position: fixed;
            top: 700px;
            right: 650px;
            opacity: 0.8;
        }
        @keyframes fly3 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(-120deg) translate(500px, -600px);
            }
        }
        #delBtn {
            background-image: url(imgFile/delete.png);
            width: 25px;
            height: 25px;
            float: right;
        }

    </style>
</head>
<body>
    <img src="imgFile/spaceship.png" alt="" id="spaceship">
    <img src="imgFile/planet.png" alt="" id="planet">
    <img src="imgFile/galaxy.png" alt="" id="galaxy">
    <div id="viewquiz">
        <div class="qBlock">
            <h3>Question 1</h3>
            <button id="delBtn" type="submit"></button>
            <div class="quesBlock">
                <p>Why ahh why why ahh?</p>
                <table class="optionTable">
                    <tr>
                        <td>Option 1xdcfvgbhnjhgfdxszxderftgyhujikjhbgvfcdxszwedrftgy</td>
                        <td>Option 2</td>
                    </tr>
                    <tr>
                        <td>Option 3sdcfvgbhnjmkijfredsxcvgbhnyjtrfcdsx</td>
                        <td>Option 4</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="qBlock">
            <h3>Question 1</h3>
            <div class="quesBlock">
                <p>Why ahh why why ahh?</p>
                <table class="optionTable">
                    <tr>
                        <td>Option 1</td>
                        <td>Option 2</td>
                    </tr>
                    <tr>
                        <td>Option 3</td>
                        <td>Option 4</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="qBlock">
            <h3>Question 1</h3>
            <div class="quesBlock">
                <p>Why ahh why why ahh?</p>
                <table class="optionTable">
                    <tr>
                        <td>Option 1</td>
                        <td>Option 2</td>
                    </tr>
                    <tr>
                        <td>Option 3</td>
                        <td>Option 4</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="qBlock">
            <h3>Question 1</h3>
            <div class="quesBlock">
                <p>Why ahh why why ahh?</p>
                <table class="optionTable">
                    <tr>
                        <td>Option 1</td>
                        <td>Option 2</td>
                    </tr>
                    <tr>
                        <td>Option 3</td>
                        <td>Option 4</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="qBlock">
            <h3>Question 1</h3>
            <div class="quesBlock">
                <p>Why ahh why why ahh?</p>
                <table class="optionTable">
                    <tr>
                        <td>Option 1</td>
                        <td>Option 2</td>
                    </tr>
                    <tr>
                        <td>Option 3</td>
                        <td>Option 4</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    

</body>
</html>