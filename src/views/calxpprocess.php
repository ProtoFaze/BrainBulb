<?php
    session_start();
    if(isset($_POST['myVariable'])) {
        $myVariable = $_POST['myVariable'];
        $_SESSION['xp'] = $myVariable;
        echo "<script>window.history.back();</script>";
    }
