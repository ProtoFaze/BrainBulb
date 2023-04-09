<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBulb</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.scroll-link').click(function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 500);
        });
    });
    </script>
    <style>
        *{
            box-sizing: border-box;
        }

        body {
        margin: 0%;
        font-family: Helvetica, sans-serif;
        }

        .topnav {
        overflow: hidden;
        background-color: lightgrey;
        width: 100%;
        top: 0%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .navigations{
        float: right;
        color: black;
        text-align: center;
        text-decoration: none;
        font-size: 17px;
        font-weight: bold;
        padding: 20px 15px;
        margin: 0 10px;
        border-radius: 4px;
        }

        .navcontainer{
            float:right;
            padding: 10px 10px;
        }

        .topnav .navigations:hover {
        background-color: rgb(196, 195, 195);
        color: black;
        }

        @media screen and (max-width: 600px) {
            .topnav a, .topnav .search-container button {
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
        <a href="#"><img src="../../images/brain_logo2.png" style="width:auto; height:75px; margin-left:45px;"></a>
        <div class="navcontainer">
            <?php if(isset($_SESSION['user_id'])){ 
                echo'
                <a class="navigations" href="logout.php">Logout</a>
                <a class="navigations" href="#">View</a>
                <a class="navigations" href="#">Join Quiz</a>
                <a class="navigations" href="#">Course</a>
                ';
            }else{
                echo'
                <a class="navigations scroll-link" href="manageAccount.php">Get Started</a>
                <a class="navigations scroll-link" href="#useCaseScroll">Use cases</a>
                <a class="navigations scroll-link" href="#featuresScroll">Features</a>
                <a class="navigations scroll-link" href="#coursesScroll">Courses</a>
                ';
            } ?>
        </div>
    </div>
</body>
</html>