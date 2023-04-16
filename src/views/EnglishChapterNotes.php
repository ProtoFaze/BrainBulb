<?php
    session_start();
?>
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
        position: fixed;
        top: 10;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        background-image: url('../../images/seabg.png');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .main{
        text-align: center;
        margin-top: 30px;
    }

    .c{
        margin: 45px auto;
        padding: 30px;
        border-radius: 7px;
        background-image:linear-gradient(to bottom right,#F29C1F,#E57E25);
        width: 600px;
        
    }
</style>
<?php
    // $a = $_SESSION['lists'];
    include "../database/connect.php";
    include("../components/nav.php");
?>
<body>
    <div class="main">
    
    </div>
</body>
</html>