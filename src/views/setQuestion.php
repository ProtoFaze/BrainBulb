<!-- $question
$course_ID

INSERT INTO questionCorrectAnswer (correct_List_ID,option1, option2,...)
VALUES (correct_ID,...,...,...)

INSERT INTO questionOptionList (option_List_ID,option1, option2,...)
VALUES (correct_ID,...,...,...)

INSERT INTO questionBank (course_ID, correct_list_ID, option_List_ID, question) 
VALUES (courseID,correctID,optionID,questions);

INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...); -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Question</title>

    <style>
        body {
            
        }
        #setQues {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #quesInput {
            width: 1000px;
            height: 100px;
        }
        #optionList {
            margin: 0px;
            width: 100%;
        }
        .options input[type=text]{
            width: 400px;
            height: 50px;
        }
        .options {
            margin: 40px;
            /* margin-left: 0%; */
            float: left;
        }
        .btn {
            width: 120px;
            height: 35px;
            margin-right: 10px;
        }
        #btnBlock {
            margin-bottom: 10px;
            /* position: absolute; */
        }
        #block {
            height: 100%;
            
        }
    </style>
</head>
<body>
    <div id="setQues">
        <!-- <h4>haha</h4> -->
        <h2>Quiz Name</h2>
        <hr>
        <div id="block">
            <form action="">
                <div id="ques">
                    <p>Question 1</p>
                    <input type="text" name="" id="quesInput">
                </div>

                <div id="optionList">
                    <div class="options">
                        <label for="op1">Option 1    </label><input type="checkbox" name="op1"><br>
                        <input type="text" name="ans1" class="">
                    </div>
                    <div class="options">
                        <label for="op2">Option 2    </label><input type="checkbox" name="op2"><br>
                        <input type="text" name="ans2" class="">
                    </div>
                    <div class="options">
                        <label for="op3">Option 3    </label><input type="checkbox" name="op3"><br>
                        <input type="text" name="ans3" class="">
                    </div>
                    <div class="options">
                        <label for="op4">Option 4    </label><input type="checkbox" name="op4"><br>
                        <input type="text" name="ans4" class="">
                    </div>
                </div>
            </form>
        </div>
        <div id="btnBlock">
            <button class="btn">NEXT</button>
            <button class="btn">CANCEL</button>
        </div>
    </div>
</body>
</html>
