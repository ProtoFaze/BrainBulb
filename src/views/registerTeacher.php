<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
            margin-left: 74%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .titlebox {  
            margin-left: 32%;
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


            form {
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
            margin-left: -9%;
        }

        textarea{
            height: 50%;
        }

        #professionalityDiv{
            margin-bottom: -75px;
        }



        </style>
    </head>
    <body>
        <div class="titlebox">
            <h1>BrainBulb Teacher Registration</h1>
        </div>
        <div class="entireForm">
            <div class="form1">
                <form action="" method="post" >
                    <div class="usernameInput">
                        <label for="username">Username:</label>
                        <h4>Please enter username for your account.</h4>
                        <input type="text" id="username" name="username" required placeholder="Eg.emmaMe@0110">
                    </div>
                    
                    <div class="passwordInput">
                        <label for="password">Password:</label>
                        <h4>For security purposes, please create a password with symbols</h4>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="passwordInput">
                        <label for="password">Confirm Password:</label>
                        <h4>Password Validation</h4>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="icNumberInput">
                        <label for="icnumber">IC Number:</label>
                        <h4>Please enter your IC number in the format YYMMDDXXXXXX. WITHOUT -</h4>
                        <input type="text" id="icnumber" name="icnumber" required placeholder="Eg.030220201928">
                    </div>

                    <div class="emailInput">
                        <label for="email">Email:</label>
                        <h4>Please enter a valid email address for your account.</h4>
                        <input type="email" id="email" name="email" required placeholder="Eg.emmaMe@gmail.com">
                    </div>  
                </form>
            </div>
            
            <div class="form2">
                <form action="" method="post"  class="form2">
                    <div class="profileInput">
                        <div>
                            <label for="name">Name:</label>
                            <h4>Please enter FULLNAME for your account.</h4>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div>
                            <label for="dob">DOB:</label>
                            <h4>Please enter your Date of Birth</h4>
                            <input type="date" id="dob" name="dob" required placeholder="DD/MM/YYYY">
                        </div>
                    </div>

                    <div class="profileInput2">
                        <div>
                            <label for="region">Region:</label>
                            <h4>Please enter the region you teaching</h4>
                            <input type="text" id="region" name="region" required>
                        </div>
                        <div class="schoolInput">
                            <label for="school">School:</label>
                            <h4>Please enter your school name</h4>
                            <input type="text" id="school" name="school" required>
                        </div>
                    </div>

                    <div class="profileInput">
                        <div>
                            <label for="education">Highest Education:</label>
                            <h4>Please enter your highest Education level</h4>
                            <input type="text" id="education" required>
                        </div>
                    </div>

                    <div class="profileInput">
                        <div id="professionalityDiv">
                            <label for="professionality">Professionality Description:</label>
                            <h4>Please describe yourself. You may mention about awards or achievement here.</h4>
                            <textarea name="professionalityDesc" id="" cols="20" rows="10" placeholder="BALBALBAL"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <button type="submit">Register</button>
  </body>
</html>
