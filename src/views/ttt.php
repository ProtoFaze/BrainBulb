<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="testform" action="#" method="post">
        <input type="hidden" name="myArray" value="">
        <!-- other form fields go here -->
        <input type="submit" value="Submit">
    </form>
    <script>
        var myArray = ["apple", "banana", "cherry"];
        var form = document.getElementById("testform");
        var hiddenInput = form.querySelector('input[name="myArray"]');
        hiddenInput.value = JSON.stringify(myArray);
    </script>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $myArray = json_decode($_POST["myArray"]);
            var_dump($myArray);
        }   
    ?>
</body>
</html>
