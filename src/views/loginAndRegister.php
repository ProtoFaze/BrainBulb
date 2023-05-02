<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <title>BrainBulb</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body{
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            /* height: 100vh; */
            margin: -20px 0 50px;
        }

        .heavytitle {
            font-weight: bold;
            font-size: 40px;
            margin: 0;
        }

        .normaltext {
            font-size: 18px;
            font-weight: 110;
            line-height: 1.3;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        .alink{
            color: #333;
            font-size: 17px;
            text-decoration: none;
            margin: 15px 0;
        }

        .ghost, .login-btn {
            border-radius: 23px;
            border: 1px solid lightseagreen;
            background-color: lightseagreen;
            color: #FFFFFF;
            font-size: 15px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            cursor: pointer;
        }

        .ghost:active, .login-btn:active {
            transform: scale(0.90);
        }

        .ghost:focus, .login-btn:focus {
            outline: none;
        }

        .ghost{
            background-color: transparent;
            border-color: #FFFFFF;
        }

        .lrform {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        .input-field{
            background-color: #eee;
            border: none;
            padding: 15px 15px;
            margin: 8px 0;
            width: 100%;
            outline: none;
            font-size: 17px;
            font-weight: bold;
            border-radius: 4px;
        }

        .contain {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            position: relative;
            overflow: hidden;
            width: 850px;
            max-width: 100%;
            min-height: 550px;
            margin: 50px 0;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .contain.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .contain.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {
            0%, 49.99% {
                opacity: 0;
                z-index: 1;
            }
            
            50%, 100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .contain.right-panel-active .overlay-container{
            transform: translateX(-100%);
        }

        .overlay {
            background: #FF416C;
            background: -webkit-linear-gradient(to right, #448C88, #62c9c3);
            background: linear-gradient(to right, #448C88, #62c9c3);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .contain.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .contain.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .contain.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .registeroptions{
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 40px;
            text-align: center;
            border-radius: 7px;
            background-color: #eee;
            font-size: 15px;
            line-height: 1.3;
        }

        .registeroptions:active{
            transform: scale(0.90);
        }
    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
        include "../database/connect.php";

    ?>
        <div class="contain" id="container">
            <div class="form-container sign-up-container">
                <div class="lrform">
                    <h1 class="heavytitle">Create Account</h1>
                    <br>
                    <a href="" class="alink">
                        <div class="registeroptions">
                            <img src="../../images/parent_and_children.png" style="width:85px; height:auto;">
                            <p style="padding:0 20px; font-size:17px;">Register as Parent and Student</p>
                        </div>
                    </a>
                    <a href="" class="alink">
                        <div class="registeroptions">
                            <img src="../../images/Teacher2.png" style="width:85px; height:auto;">
                            <p style="padding:0 20px; font-size: 17px;">Register as Teacher</p>
                        </div>
                    </a>
                    <br>
                    <p class="normaltext">to unlock the full potential of BrainBulb</p>
                </div>
            </div>
            <div class="form-container sign-in-container">
                <form action="" class="lrform" method="post">
                    <h1 class="heavytitle">Login</h1>
                    <br>
                    <input type="text" name="username" placeholder="Username" class="input-field" required/>
                    <input type="password" name="pass" placeholder="Password" class="input-field" required />
                    <a href="forgotpassword.php" class="alink">Forgot your password?</a>
                    <br>
                    <input type="submit" name="enter" class="login-btn" value="Login"></input>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1 class="heavytitle">Choose your role</h1>
                        <p class="normaltext">Already sign up? Please login to BrainBulb</p>
                        <button class="ghost" id="signIn">Login</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1 class="heavytitle">Welcome User!</h1>
                        <p class="normaltext">Not sign up yet? Register now!</p>
                        <button class="ghost" id="signUp">Register</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
        if(isset($_POST['enter'])){
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $sql = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            if($count > 0){
                if($row['user_Type'] == "Admin"){
                    $_SESSION['user_id'] = $row['admin_ID'];
                }
                elseif($row['user_Type'] == "Teacher"){
                    $_SESSION['user_id'] = $row['teacher_ID'];
                }
                elseif($row['user_Type'] == "Student"){
                    $_SESSION['user_id'] = $row['student_ID'];
                    echo $_SESSION['user_id'];
                }
                else{
                    $_SESSION['user_id'] = $row['parent_ID'];
                }
                echo "<script> location.href='mainpage.php'</script>";
            }
            else{
                echo "<script> alert('No username and password exist'); </script>";
            }
        }
    ?>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
    <?php mysqli_close($connection);?>
</body>
</html>