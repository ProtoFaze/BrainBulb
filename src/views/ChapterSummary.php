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

    

</style>
<?php
    // $a = $_SESSION['lists'];
?>
<script>
    let CValue = localStorage.getItem('correct');
    let WValue = localStorage.getItem('wrong');
</script>
<body>
    <h1>Correct Answers: <span id="cAmount"></span></h1>
    <h1>Wrong Answers: <span id="wAmount"></span></h1>
    <h2>Exit</h2>
</body>
<script>
    document.getElementById('cAmount').textContent = CValue.toString();
    document.getElementById('wAmount').textContent = WValue.toString();
    localStorage.clear();
</script>
</html>