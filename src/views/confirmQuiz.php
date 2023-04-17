
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Quiz Question</title>
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

        #delBtn {
            background-image: url(imgFile/delete.png);
            width: 25px;
            height: 25px;
            float: right;
        }
        .button {
            float: right;
            margin: 30px;
            margin-right: 0%;
            padding: 8px;
            width: 100px;
        }
        #btns {
            position: absolute;
            right: 260px;
        }

    </style>
</head>
<body>
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
        <div id="btns">
            <button class="button">CONFIRM</button>
            <button class="button">CANCEL</button>
        </div>
        
    </div>
    

</body>
</html>