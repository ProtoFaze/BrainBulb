<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
        }

        body {
        margin: 0%;
        }

        .topnav {
        overflow: hidden;
        background-color: grey;
        width: 100%;
        top: 0%;
        }

        .topnav .navigations{
        float: right;
        color: #f2f2f2;
        text-align: center;
        text-decoration: none;
        font-size: 17px;
        width: 80px;
        font-weight: bold;
        padding: 20px 0;
        }

        .container{
            float:right;
            padding: 10px 10px;
        }

        .topnav .navigations:hover {
        background-color: rgb(196, 195, 195);
        color: black;
        }

        @media screen and (max-width: 600px) {
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
        }
       
    </style>
</head>
<body>
    <div class="topnav">
        <img src="images/brain_logo2.png" style="width:auto; height:75px; margin-left:50px;">
        <!-- <div class="search-container">
            <form action="">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit" class="gosearch">?</button>
            </form>
        </div> -->
        <div class="container">
            <a class="navigations" href="#">Course</a>
            <a class="navigations" href="#">Join Quiz</a>
            <a class="navigations" href="#">View</a>
        </div>
    </div>
</body>
</html>