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
    <?php
        $studentid = "ST00000002";
        $c = $_SESSION['course'];
        include "../database/connect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $myVariable = $_POST['myVariable'];
            $t = $_POST['my'];
            $t2 = $_POST['my2'];
            $_SESSION['xp'] = $myVariable;
            $_SESSION['ctime'] = $t;
            $_SESSION['etime'] = $t2; 
            $myArray = json_decode($_POST["myArray"]);
            $myArray = explode(",",$myArray);
            $Array = array();
            foreach ($myArray as $data){
                if($data == "true"){
                    array_push($Array,1);
                }
                else{
                    array_push($Array,0);
                }
            }
            // var_dump($myArray);
            // var_dump($Array);
            $q = "SELECT * FROM studentquestionresponse_seq ORDER BY id DESC LIMIT 1";
            $r = mysqli_query($connection, $q);
            $ro = mysqli_fetch_assoc($r);
            $num = "RP" . str_pad($ro['id']+1, 8, '0', STR_PAD_LEFT);
            // echo $num;
            $sql1 = "INSERT INTO studentquestionresponse (`response_ID`,`course_ID`,`student_ID`) VALUES ('$num','$c','$studentid')";
            mysqli_query($connection, $sql1);
            for ($i = 1; $i <= count($Array); $i++){
                $value = mysqli_real_escape_string($connection, $Array[$i-1]);    
                $columnName = "question$i";
                $sql = "UPDATE `studentquestionresponse` SET `$columnName` = '$value' WHERE `response_ID` = '$num'";
                mysqli_query($connection, $sql);
            }
            echo "<script>window.history.back();</script>";
           
        }
        mysqli_close($connection);  
    ?>
</body>
</html>
