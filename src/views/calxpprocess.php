<?php
    session_start();
    if(isset($_POST['myVariable'])) {
        $myVariable = $_POST['myVariable'];
        $t = $_POST['my'];
        $t2 = $_POST['my2'];
        $_SESSION['xp'] = $myVariable;
        $_SESSION['ctime'] = $t;
        $_SESSION['etime'] = $t2;
        echo "<script>window.history.back();</script>";
    }
