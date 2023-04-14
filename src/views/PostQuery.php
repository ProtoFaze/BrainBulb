<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Query</title>
    <link rel="stylesheet" href="../styles/design.css">
    <style>
    body{
            background-color:#f2f5f7 ;
    }

    .form, .subTitle {
    max-width: 1300px;
    margin: auto;
    }

    .form-group {
    margin-bottom: 45px;
    }

    label {
    display: block;
    margin-bottom: 14px;
    font-weight: bold;
    font-size: 18px;
    }

    input[type="text"], textarea {
    display: block;
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-family: 'Open Sans', sans-serif;
    letter-spacing: 1px;
    }

    textarea{
        height: 200px;
    }

    button {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    background-color: #808080;
    color: #fff;
    font-weight: bold;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
    transform: scale(1.05);
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    }

    .form-group:last-child {
    text-align: right;
    margin-bottom: 0;
    }

    .form {
    background-color: #f5f5f5;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0px 3px 20px rgba(0, 0, 0, 0.2);
    }

    label {
        font-family: 'Open Sans', sans-serif;
    }

    input[type="text"],
    textarea {
    border: 2px solid #ccc;
    transition: all 0.2s ease-in-out;
    }
    .subTitle {
    font-family: 'Open Sans', sans-serif;
    font-style: italic;
    font-size: 20px;
    }

    #submit-btn {
        cursor: not-allowed;
    }

    #submit-btn.enabled {
        background-color: #3a4b61;
        cursor: pointer;
    }

    </style>
</head>
<body>
    <?php
        include("../components/nav.php");
        include "../database/connect.php";
    ?>
    <div class="titlebox">
        <h1>QNA Discussion</h1>
    </div>
    <div class="subTitle">
        <h2>Ask A Question From Teachers And Friends</h2>
    </div>
    <div class="form">
        <form action="#" method="post">
        <div class="form-group">
            <label>Question</label>
            <input type="text" id="question" name="question" placeholder="Insert your question here" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="content" name="content" placeholder="Further describe your question" autocomplete="off"></textarea>
        </div>
        <div class="form-group">
            <label>Tagline</label>
            <input type="text" id="tagline" name="tagline" placeholder="Put a simple tagline to classify your question. EG: ScienceIsHard" autocomplete="off">
        </div>
        <div class="form-group">
            <button><a href="#" class="btn btn-secondary btn" style="text-decoration:none; color:#fff;">Cancel</a></button>
            <button class="btn btn-primary btn" id="submit-btn" disabled>Post</button>
        </div>
        </form>
    </div>
    <script>
        const studentQuery = document.getElementById("question");
        const queryDetails = document.getElementById("content");
        const queryTagline = document.getElementById("tagline");
        const submitButton = document.getElementById("submit-btn");

        function validateInputs() {
            if (studentQuery.value !== "" && queryDetails.value !== "" && queryTagline.value !== "") {
                submitButton.classList.add("enabled");
                submitButton.removeAttribute("disabled");
            } else {
                submitButton.classList.remove("enabled");
                submitButton.setAttribute("disabled", "disabled");
            }
        }
        
        studentQuery.addEventListener("input", validateInputs);
        queryDetails.addEventListener("input", validateInputs);
        queryTagline.addEventListener("input", validateInputs);
    </script>
</body>
</html>