<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('../database/connect.php');
    
    if(isset($_GET['sub'])){
        $subs = $_GET['sub'];
        $sq = "DELETE FROM `learning_material` WHERE material_ID = '$subs'";
        $results = mysqli_query($connection,$sq);
        if($results){
            echo "<script>alert('File Deleted Successfully');</script>";
        }
        else{
            echo "<script>alert('File Deleted Unsuccessfully');</script>";
        }
        echo "<script>location.href='viewlearningmaterial.php' </script>";
    }
    else{
        echo "<script>location.href='viewlearningmaterial.php' </script>";
    }
?>
</body>
</html> 