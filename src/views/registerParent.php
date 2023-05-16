<?php
    include "../database/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent and Student Registration</title>
    <link rel="stylesheet" href="../styles/design.css">
    <style>
        body {
            background-color: #f2f5f7;
            font-family: 'Open Sans', sans-serif;
        }

        h4{
            font-size: 11px;
            padding: 0px;
            margin: 1px;
            color: #6D5D6E;
        }

        label{
            font-weight:bolder;
        }

        .formAction {
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] ,
        textarea,
        input[type="date"]{
            width: 100%;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 2%;
        }

        button {
            font-family: 'Open Sans', sans-serif;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            flex-direction: column;
            margin-left: 80%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .titlebox {  
            margin-left: 31%;
        }

        ::placeholder{
            font-size: 13px;
        }

        .profileInput {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .profileInput div {
            flex-grow: 1;
            margin-right: 2%;
        }

        .submitRegister{
            max-width: 0;
            padding: 0px;
            background-color: none;
            border: none;
            margin-left: 74%;
        }

        .buttons {
            display: flex;
            flex-direction: row;
            margin-top: 20px;
            margin-right: 20%;
        }

        .cancelBtn {
            background-color: #bbb;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            margin-left: -385px;
        }

        .registerBtn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .addStudentButtonForRegister button {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            margin-left: 70%;
        }

        .addStudentButtonForRegister button span {
            display: flex;
            flex-direction: row;
            margin-right: 10px;
        }

        .alert{
            text-align: center;
            margin-top: 15px;
        }

    </style>
</head>
<body>
        <div class="titlebox">
            <h1>BrainBulb Parent Registration</h1>
        </div>
        <form action="" method="post">
            <div class="form1">
                <div class="formAction">
                <div class="usernameInput">
                        <label for="username">Username:</label>
                        <h4>Please enter username for your account.</h4>
                        <input type="text" id="username" name="username" required placeholder="Eg.emmaMe@0110">
                    </div>
                    
                    <div class="passwordInput">
                        <label for="password">Password:</label>
                        <h4>For security purposes, please create a 6 digits password with at least 1 symbol, 1 big letter, 1 small letter, and 1 digit.</h4>
                        <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$" required>
                    </div>

                    <div class="passwordInput">
                        <label for="password">Confirm Password:</label>
                        <h4>Password Validation</h4>
                        <input type="password" id="password" name="password2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$" required>
                    </div>

                    <div class="icNumberInput">
                        <label for="icnumber">IC Number:</label>
                        <h4>Please enter your IC number in the format YYMMDDXXXXXX. WITHOUT -</h4>
                        <input type="text" id="icnumber" name="icnumber" required placeholder="Eg.030220201928" pattern="[0]{1}[0-9]{11}">
                    </div>

                    <div class="emailInput">
                        <label for="email">Email:</label>
                        <h4>Please enter a valid email address for your account.</h4>
                        <input type="email" id="email" name="email" required placeholder="Eg.emmaMe@gmail.com">
                    </div>  

                    <div class="profileInput">
                            <div>
                                <label for="name">Name:</label>
                                <h4>Please enter FULLNAME for your account.</h4>
                                <input type="text" id="name" name="name" required pattern="[A-Za-z ]+">
                            </div>
                            <div>
                                <label for="dob">DOB:</label>
                                <h4>Please enter your Date of Birth</h4>
                                <input type="date" id="dob" name="dob" required placeholder="DD/MM/YYYY">
                            </div>
                    </div>
                    <h4 class="alert">Please login into BrainBulb to add STUDENT account</h4>
                </div>               
            </div>
                <div class="buttons-container">
                    <div class="submitRegister">
                        <div class="buttons">
                            <button class="cancelBtn"><a href="loginAndRegister.php"  style="text-decoration:none; color:#fff;">Cancel</a></button>
                            <button class="registerBtn" name="register">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
            if(isset($_POST['register'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $icnumber = $_POST['icnumber'];
                $email = $_POST['email'];
                $name = $_POST['name'];
                $dob = $_POST['dob'];
                $userType = "Parent";
    
                if ($password == $password2){

                    $sql_insertParent = "INSERT INTO `parent`( `pName`, `pDOB`) VALUES ('$name','$dob')";
                    $result_insertParent = mysqli_query($connection, $sql_insertParent);
                
                    if($result_insertParent){
                        $sql_lastParentID = "SELECT MAX(parent_id) AS last_parent_id FROM parent";
                        $result_lastParentID = mysqli_query($connection, $sql_lastParentID);
                        $row_lastParentID = mysqli_fetch_assoc($result_lastParentID);
                        $lastParentID = $row_lastParentID['last_parent_id'];

                        $sql_insertUser = "INSERT INTO `user`( `username`, `password`, `ic`, `email`,`state`, `user_Type`, `parent_ID`) VALUES ('$username','$password','$icnumber',' $email',1,'$userType','$lastParentID')";
                        $result_insertUser = mysqli_query($connection, $sql_insertUser);
                        if($result_insertUser){
                            echo "<script>alert('Registration Success!')</script>";
                            echo "<script>window.location.href='loginAndRegister.php'</script>";
                        }else{
                            echo "<script>alert('Registration Failed to User!')</script>";
                        }
                    }else{
                        echo "<script>alert('Registration Failed')</script>";
                        
                    }
                }else{
                    echo "<script>alert('Password Incorrect')</script>";
                }
            }
    ?>
</body>
</html>