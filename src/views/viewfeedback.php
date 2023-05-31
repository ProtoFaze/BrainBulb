<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['sourceage']) && $_SESSION['sourceage'] == "searchUser" && isset($_SESSION['management_id']) && isset($_SESSION['delete_id'])){
    unset($_SESSION['sourceage']);
    unset($_SESSION['delete_id']);
    unset($_SESSION['management_id']);
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
        height: auto;
        width: 100%;
        position: absolute;
    }   

    .con{
        margin: 50px 100px;
    }

    .idea{
        margin: 30px auto;
        background-color: #b1defc;
        text-align: center;
        padding: 10px 25px;
        font-size: 30px;
        border-radius: 5px;
        text-align: justify;
        line-height: 1.5;
        display:flex;
    }

    .sub{
        float:left;
        display:flex; 
        flex-direction:column; 
        margin:20px;
    }
    .sub a{
        color:black;
        text-decoration: none;
    }

    .filter{
        text-align: center;
        padding: 15px;
        font-size: 20px;
        border-radius: 7px;
        border:none;
        font-weight: bold;
        cursor: pointer;
        margin:0 10px;
        outline: none;
        background-color: #2e424d;
        color:white;
    }

    .filter option{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    #filterbtn:hover{
        transform: scale(1.06);
    }

    #filterbtn:active{
        transform: scale(0.95);
    }

    #choice2{
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url('../../images/dropdown-arrow2.png');
        background-position: right;
        background-repeat: no-repeat;
        padding-right: 45px;
    }

</style>
<?php
    include "../database/connect.php";
    include("../components/nav.php");
    if(isset($_SESSION['sort'])){
        if($_SESSION['sort'] == "date"){
            $query = "SELECT * FROM `feedback` INNER JOIN user ON user.account_ID = feedback.account_ID ORDER BY feedback.feedback_Post_Datetime DESC";
        }
        else if($_SESSION['sort'] == "long"){
            $query = "SELECT * FROM `feedback` INNER JOIN user ON user.account_ID = feedback.account_ID ORDER BY LENGTH(feedback.feedback_Content) DESC";
        }
        else{
            $query = "SELECT * FROM `feedback` INNER JOIN user ON user.account_ID = feedback.account_ID";
        }
    }
    else{
        $query = "SELECT * FROM `feedback` INNER JOIN user ON user.account_ID = feedback.account_ID";
    }
    
    $results = mysqli_query($connection,$query);
    $count = mysqli_num_rows($results);
?>
<body>
    <div class="main">
        <div class="con">
        <div style="margin:50px auto; padding:10px; display: flex;">
            <div style="width: 72%; display:flex; float:left;">
                <h1 style='font-size:35px;'>Feedback List</h1>
            </div>
            <div style="width: 28%; display:flex; float:left;">
                <form action="" method="post">
                    <select name="select2" id="choice2" class="filter">
                        <option value="">Sort</option>
                        <option value="date">Newest</option>
                        <option value="long">Longest Feedback</option>
                    </select>
                    <input type="submit" value="Filter" name="filbtn" class="filter" id="filterbtn">
                </form>
            </div>
        </div>
        <?php
            if($count > 0){
                while ($row = mysqli_fetch_assoc($results)) {
                    ?>
                    <div class="idea">
                        <p><b style="font-size:32px;"><?php echo $row['user_Type'];?> &nbsp;&nbsp;(<?php echo $row['account_ID'];?>)</b>
                        <br>
                        <?php echo $row['feedback_Content'];?></p>
                    </div>
                    <?php
                }
            }
            else{
                echo "<center><h1 style='font-size: 40px;'>No Feedback Found</h1></center>";
            }

            if(isset($_POST['filbtn'])){
                $_SESSION['sort'] = $_POST['select2'];
                echo "<script> location.href='viewfeedback.php'</script>";
            }
        ?>
            <div style="clear:both;"></div>
        </div>
    </div>
</body>
</html>