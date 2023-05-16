<?php
    session_start();
    include "../database/connect.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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

        /* form {
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
        } */

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
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .titlebox {  
            margin-left: 36%;
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

        /* .entireForm {
            display: inline-flex;
            justify-content: space-between;
            width: 100%;
            } */


        .formAction {
            max-width: 500px;
            padding: 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .entireForm {
        display: flex;
        justify-content: space-between;
        width: 100%;
        
        }

        .form1,
        .form2 {
        width: 100%;
        
        }

        .form1{
            margin-left: 20%;
        }

        .form2{
            margin-left: -16%;
        }

        textarea{
            height: 50%;
        }

        #professionalityDiv{
            margin-bottom: -75px;
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
            margin-right: 100%;
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
            margin-left: -105px;
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

        .dropdown {
        position: relative;
        display: inline-block;
        margin-top: 1px;
        width: 50px;
        }

        label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        }

        h4 {
        margin: 0 0 10px;
        }

        select {
        appearance: none;
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 3px;
        color: #333;
        font-size: 16px;
        padding: 8px 12px;
        width: 100%;
        max-width: 300px;
        cursor: pointer;
        }

        select:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        select option {
        background-color: #f2f2f2;
        color: #333;
        }

        .dropdown select {
            width: 150px;
            
        }



        </style>
    </head>
    <body>
        <div class="titlebox">
            <h1>Add Student Account</h1>
        </div>
        <form action="" method="post">
        <div class="entireForm">
            <div class="form1">
                <div class="formAction">
                    <div class="usernameInput">
                        <label for="username">Username:</label>
                        <h4>Please enter username for your account.</h4>
                        <input type="text" id="username" name="username" placeholder="Eg.emmaMe@0110" required>
                    </div>
                    
                    <div class="passwordInput">
                        <label for="password">Password:</label>
                        <h4>For security purposes, please create a 6 digits password with at least 1 symbol, 1 big letter, 1 small letter, and 1 digit.</h4>
                        <input type="password" id="password" name="password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$">
                    </div>

                    <div class="passwordInput">
                        <label for="password">Confirm Password:</label>
                        <h4>Password Validation</h4>
                        <input type="password" id="password" name="password2" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$">
                    </div>

                    <div class="icNumberInput">
                        <label for="icnumber">IC Number:</label>
                        <h4>Please enter your IC number in the format YYMMDDXXXXXX. WITHOUT -</h4>
                        <input type="text" id="icnumber" name="icnumber"  placeholder="Eg.030220201928" required pattern="[0]{1}[0-9]{11}">
                    </div>

                    <div class="emailInput">
                        <label for="email">Email:</label>
                        <h4>Please enter a valid email address for your account.</h4>
                        <input type="email" id="email" name="email" placeholder="Eg.emmaMe@gmail.com" required>
                    </div>  
                </div>
            </div>
            
            <div class="form2">
                <div class="formAction">
                    <div class="profileInput">
                        <div>
                            <label for="name">Name:</label>
                            <h4>Please enter FULLNAME for your account.</h4>
                            <input type="text" id="name" name="name" required pattern="[A-Za-z ]+">
                        </div>
                        <div>
                            <label for="dob">DOB:</label>
                            <h4>Please enter your Date of Birth</h4>
                            <input type="date" id="dob" name="dob"  placeholder="DD/MM/YYYY" required>
                        </div>
                    </div>

                    <div class="profileInput2">
                        <div>
                            <label for="region">Region:</label>
                            <h4>Please enter the region you studying</h4>
                            <input type="text" id="region" name="region" placeholder="Eg. " required pattern="[A-Za-z ]+">
                        </div>
                        <div class="schoolInput">
                            <label for="school">School:</label>
                            <h4>Please enter your school name</h4>
                            <input type="text" id="school" name="school" placeholder="Eg. SJK(C)Asia Pacific Primary Education" required>
                        </div>
                    </div>

                    <div class="profileInput">
                        <div class="dropdown">
                            <label for="school">Grade:</label>
                            <h4>Please enter your current study grade</h4>
                            <select name="grade" id="grade">
                                <option value="Standard 1">Standard 1</option>
                                <option value="Standard 2">Standard 2</option>
                                <option value="Standard 3">Standard 3</option>
                                <option value="Standard 4">Standard 4</option>
                                <option value="Standard 5">Standard 5</option>
                                <option value="Standard 6">Standard 6</option>
                            </select>
                        </div>
                    </div>

                    
                </div>  
            </div>
        </div>

        <div class="buttons-container">
            <div class="submitRegister">
                <div class="buttons">
                    <button class="cancelBtn"><a href="mainpage.php"  style="text-decoration:none; color:#fff;">Cancel</a></button>
                    <button class="registerBtn" name="register">Register</button>
                </div>
            </div>
        </div>
        </form>

        <?php
            if(isset($_POST['register'])){
                $userID = $_SESSION['user_id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $icnumber = $_POST['icnumber'];
                $email = $_POST['email'];
                $name = $_POST['name'];
                $dob = $_POST['dob'];
                $region = $_POST['region'];
                $school = $_POST['school'];
                $grade = $_POST['grade'];
                $userType = "Student";
               

                if ($password == $password2){
                    $sql_insertStudent = "INSERT INTO `student`(`parent_ID`, `sName`, `sDOB`, `sRegion`, `sSchool`, `sGrade`, `level`, `aFrequency`, `experience`) VALUES ('$userID','$name','$dob','$region','$school','$grade',1,0,0)";
                    $result_insertStudent  = mysqli_query($connection, $sql_insertStudent);
                
                    if($result_insertStudent){
                        $sql_lastStudentID = "SELECT MAX(student_id) AS last_student_id FROM student";
                        $result_lastStudentID = mysqli_query($connection, $sql_lastStudentID);
                        $row_lastStudentID = mysqli_fetch_assoc($result_lastStudentID);
                        $lastStudentID = $row_lastStudentID['last_student_id'];

                        $sql_insertUser = "INSERT INTO `user`( `username`, `password`, `ic`, `email`,`state`,  `user_Type`,  `student_ID`) VALUES ('$username','$password','$icnumber','$email','1','$userType','$lastStudentID')";
                        $result_insertUser = mysqli_query($connection, $sql_insertUser);
                        if($result_insertUser){
                            echo "<script>alert('Registration Success!')</script>";
                            echo "<script>window.location.href='mainpage.php'</script>";
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