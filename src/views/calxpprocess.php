<?php
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        var myArray = ["apple", "banana", "cherry"];

        function submitForm() {
            fetch('myphpscript.php', {
                method: 'POST',
                body: JSON.stringify(myArray)
            }).then(response => response.text())
            .then(data => {
                console.log(data);
            }).catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
    <form action="#" method="post" onsubmit="submitForm(); return false;">
        <!-- other form fields go here -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>
