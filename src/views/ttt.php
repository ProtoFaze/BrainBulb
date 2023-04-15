<html>
<head>
<title>Pass JS array to PHP.</title>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

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