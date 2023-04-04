<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
        margin: 0%;
        }

        .topnav {
        overflow: hidden;
        background-color: grey;
        /* position: fixed; */
        width: 100%;
        top: 0%;
        }

        .topnav .navigations{
        float: right;
        color: #f2f2f2;
        text-align: center;
        padding: 14px;
        text-decoration: none;
        font-size: 17px;
        width: 80px;
        font-weight: bold;
        }

        .topnav .search-container {
        float: right;
        }

        .topnav .navigations:hover {
        background-color: rgb(196, 195, 195);
        color: black;
        }

        .topnav .search-container button {
        float: right;
        padding: 6px 10px;
        margin-top: 8px;
        margin-right: 16px;
        background: #ddd;
        font-size: 17px;
        border: none;
        cursor: pointer;
        }

        .topnav .search-container button:hover {
        background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }

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
        <a href="">
            <img src="images/brain_logo2.png" style="width:120px;margin-left:50px;">
        </a>
        <!-- <div class="search-container">
            <form action="">
              <input type="text" placeholder="Search.." name="search">
              <button type="submit" class="gosearch">?</button>
            </form>
        </div> -->
        <a class="navigations" href="#">Course</a>
        <a class="navigations" href="#">Join Quiz</a>
        <a class="navigations" href="#">View</a>
    </div>
</body>
</html>