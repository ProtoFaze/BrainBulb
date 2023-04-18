
<!-- Get student 
= SELECT student_ID studentIDFROM learning_Record WHERE course_ID ="";

Get question 
SELECT question_ID AS quesID FROM questionBank WHERE course_ID ="";

Get total question 
SELECT COUNT(question_ID) AS totalQ FROM questionBank WHERE course_ID;

Get accuracy rate 
SELECT *
retrieve data & append into list
then count list item?
cant use count directly as the questions are all different
 -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Performance</title>
    <style>
        body {
            background-image: url(imgFile/night.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        #viewRanking {
            width: 1000px;
            margin: auto;
        }
        progress {
            height: 15px;
            width: 100%;
            border-radius: 10px;
        }

        progress::-webkit-progress-bar {
            background-color: rgb(255, 25, 0);
            border-radius: 10px;
        }
        progress::-webkit-progress-value {
            background-color: rgb(2, 231, 67);
            border-radius: 10px 0px 0px 10px;
        }
        .accuracyBlock {
            /* background-color: aliceblue; */
            padding: 20px;
            padding-top: 10px;
        }
        .student {
            box-shadow: 0px 5px 5px 1px rgba(224, 223, 223, 0.5);
            border-radius: 8px;
            margin: 20px;
            padding: 5px;
            background-color: rgba(255, 255, 255, 0.9);
        }
        .student table{
            width: 100%;
        }
        .student td {
            /* background-color: rgb(217, 237, 255); */
            text-align: center;
        }
        .iconProf {
            height: 45px;
            height: 50px;
            background-color: grey;
            border-radius: 50%;
        }
        #planet ,#planet2, #planet3,#planet4,#planet5{
            z-index: -1;
            max-width: 200px;
            max-height: 200px;
            animation-duration: 20s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            position: fixed;
            top: 800px;
            left: -30px;
            opacity: 0.8;
        }

        #planet {
            animation-name: float1;
            animation-delay: 0s;
        }
        #planet2 {
            animation-name: float2;
            animation-delay: -4s;
        }
        #planet3 {
            animation-name: float3;
            animation-delay: -8s;
        }
        #planet4 {
            animation-name: float4;
            animation-delay: -12s;
        }
        #planet5 {
            animation-name: float5;
            animation-delay: -16s;
        }

 
        @keyframes float1 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(80deg) translate(100px, -1300px);
            }
        }

        @keyframes float2 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(80deg) translate(100px, -1300px);
            }
        }

        @keyframes float3 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(80deg) translate(100px, -1300px);
            }
        }
        @keyframes float4 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(80deg) translate(100px, -1300px);
            }
        }
        @keyframes float5 {
            from {
                transform: rotateZ(0) translate(0, 0);
            }
            to {
                transform: rotateZ(80deg) translate(100px, -1300px);
            }
           
        }


    </style>
</head>
<body>
    <img src="images/planet3.png" alt="" id="planet" >
    <img src="images/planet4.png" alt="" id="planet2" >
    <img src="images/planet5.png" alt="" id="planet3" >
    <img src="images/planet6.png" alt="" id="planet4" >
    <img src="images/planet7.png" alt="" id="planet5" >
    <div id="viewRanking">
        <h3>Quizz 2 Student Performance</h3>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
            
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
            
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="student">
            <table>
                <tr>
                    <td style="width: 55px;">No 1</td>
                    <td style="width: 55px;">
                        <div class="iconProf">
                        </div>
                    </td>
                    <td style="width: 150px;">Name Ojibala</td>
                    <td>
                        <div class="accuracyBlock">
                            <label for="accracy" style="float: right;font-size: 1.525ch;">Accuracy 70%</label>
                            <progress value = "70" max = "100" class="accracy">70%</progress>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    
    </div>
</body>
</html>
