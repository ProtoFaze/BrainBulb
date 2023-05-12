<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <title>Search User</title>
    <link rel="stylesheet" href="../styles/layout.css">
    <link rel="stylesheet" href="../styles/inputs.css">
    <style>
        main{
            padding: 0px;
        }
        .grid_box{
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            padding: 20px 60px;
            gap: 30px;
        }
        .profile {
            background-color: var(--box-primary);
            min-width: 300px;
            height: 300px;
            float: left;
            box-shadow: 0 12px 10px rgba(0, 0, 0, 0.2);
            padding: 15px;
            /* padding-top: 45px; */
            box-sizing: border-box;
            border: none;
            transition: transform 0.4s;
            border-radius: 5px;
        }

        .prof_pic{
            width: 120px;
            height: 120px;
            border-radius: 75%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            display: block;
            z-index: 1;
            background-color: antiquewhite;
        }
        .profile:hover {
            transform: scale(0.9);
        }
        th {
            text-align: left;
        }
        th,td {
            padding: 6px;
        }
        td{
            border-bottom: 1px solid black;
            border-radius: 8px;
            word-break: break-all;
        }
        .response,.search{
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 50px;
            background-color: var(--box-secondary);
            border-radius: var(--border-radius);

            flex: none;
            order: 0;
            flex-grow: 0;
            
            /* to fix response row to top */
            position: sticky;
            position: -webkit-sticky;
            top: 0;
            align-self: flex-start;
            z-index: 21795;
        }
        .response{
            height: 80px;
            padding: 15px 20px;
            border-top-left-radius:0px;
            border-top-right-radius:0px;
        }
        .search{
            width: auto;
            gap: 10px;
        }

        #back,{
            padding: 10px 20px;
            align-self: center; 
        }
    </style>
</head>
<body>
    <header>
        <?php 
        include "../database/connect.php";
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        function detectsearch(){
            $sql_queries=null;
            if (isset($_POST['display']) && !empty($_POST['txtSearch'])) {
                $searchby = $_POST['searchby'];
                $searchterm = $_POST['txtSearch'];
                if($searchby == "Name"){
                    $sql_queries = array(
                    "SELECT `user`.`account_id`, `user`.`user_Type`, `user`.`username`, `teacher`.`tName` AS `name`, `user`.`profile_Picture`, `teacher`.`teacher_ID` AS `user_ID` FROM `user` INNER JOIN `teacher` ON `user`.`teacher_ID` = `teacher`.`teacher_ID` 
                    WHERE `user`.`state` = 1 AND t$searchby LIKE '%$searchterm%'",
                    "SELECT `user`.`account_id`, `user`.`user_Type`, `user`.`username`, `parent`.`pName` AS `name`, `user`.`profile_Picture`, `parent`.`parent_ID` AS `user_ID` FROM `user` INNER JOIN `parent` ON `user`.`parent_ID` = `parent`.`parent_ID` 
                    WHERE `user`.`state` = 1 AND p$searchby LIKE '%$searchterm%'",
                    "SELECT `user`.`account_id`, `user`.`user_Type`, `user`.`username`, `student`.`sName` AS `name`, `user`.`profile_Picture`, `student`.`student_ID` AS `user_ID` FROM `user` INNER JOIN `student` ON `user`.`student_ID` = `student`.`student_ID` 
                    WHERE `user`.`state` = 1 AND s$searchby LIKE '%$searchterm%'");
                }else{
                    $sql_queries = array(
                //join user table with either student, parent or teacher table
                "SELECT `user`.`account_id`, `user`.`user_Type`, `user`.`username`, `teacher`.`tName` AS `name`, `user`.`profile_Picture`, `teacher`.`teacher_ID` AS `user_ID` FROM `user` INNER JOIN `teacher` ON `user`.`teacher_ID` = `teacher`.`teacher_ID` 
                WHERE `user`.`state` = 1 AND `user`.`$searchby` LIKE '%$searchterm%'",
                "SELECT `user`.`account_id`, `user`.`user_Type`, `user`.`username`, `parent`.`pName` AS `name`, `user`.`profile_Picture`, `parent`.`parent_ID` AS `user_ID` FROM `user` INNER JOIN `parent` ON `user`.`parent_ID` = `parent`.`parent_ID` 
                WHERE `user`.`state` = 1 AND `user`.`$searchby` LIKE '%$searchterm%'",
                "SELECT `user`.`account_id`, `user`.`user_Type`, `user`.`username`, `student`.`sName` AS `name`, `user`.`profile_Picture`, `student`.`student_ID` AS `user_ID` FROM `user` INNER JOIN `student` ON `user`.`student_ID` = `student`.`student_ID` 
                WHERE `user`.`state` = 1 AND `user`.`$searchby` LIKE '%$searchterm%'");}
            }else{
                $sql_queries = array(
                "SELECT `user`.`account_id`, `user`.`username`, `teacher`.`tName` AS `name`, `user`.`user_Type`, `user`.`profile_Picture`, `teacher`.`teacher_ID` AS `user_ID` FROM `user` INNER JOIN `teacher` ON `user`.`teacher_ID` = `teacher`.`teacher_ID` WHERE `user`.`state` = 1",
                "SELECT `user`.`account_id`, `user`.`username`, `parent`.`pName` AS `name`, `user`.`user_Type`, `user`.`profile_Picture`, `parent`.`parent_ID` AS `user_ID` FROM `user` INNER JOIN `parent` ON `user`.`parent_ID` = `parent`.`parent_ID` WHERE `user`.`state` = 1",
                "SELECT `user`.`account_id`, `user`.`username`, `student`.`sName` AS `name`, `user`.`user_Type`, `user`.`profile_Picture`, `student`.`student_ID` AS `user_ID` FROM `user` INNER JOIN `student` ON `user`.`student_ID` = `student`.`student_ID` WHERE `user`.`state` = 1");
            }
            return $sql_queries;
        }
        $queries = detectsearch();
        include "../components/nav.php"; ?>
    </header>
    <main>
        <div class="response">
            <button onclick="window.location.href = 'mainpage.php'" id='back' class="flex_button"><span class="material-symbols-outlined">arrow_back_ios</span>Back</button>
            <form class="search" method="post">
                <h5>Search by:<select name="searchby" id="dropdowninput"></h5>
                    <option value="account_ID">Account ID</option>
                    <option value="Name">Legal name</option>
                    <option value="username">Username</option>
                    <option value="email">Email</option>
                    <option value="ic">IC number</option>
                </select>
                <h5>Enter search data:</h5> <input type="text" name="txtSearch" id="txtSearch">
                <input class="flex_button" type="submit" value="Search" name= "display">
            </form>
        </div>
    <div class="grid_box">
<?php $noResults = true;
foreach ($queries as $query){
    // echo $query;
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // var_dump($row);
            $data = $row['profile_Picture'];
            $account_ID = $row['account_id'];
            $user_ID = $row['user_ID'];
            $user_type = $row['user_Type'];
            if ($user_type === "Teacher"){
                $bg = "var(--bg);";
            }
            elseif ($user_type === "Parent"){
                $bg = "var(--box-primary);";
            }
            elseif ($user_type === "Student"){
                $bg = "var(--box-secondary);";
            }
            echo $user_type;
            echo
                "<form method='POST'>
                <button type='submit' name='profile' class='profile' style='background-color: $bg'>
                <input type='hidden' name='delete_id' value='".$account_ID."'>
                <input type='hidden' name='user_id' value='".$user_ID."'>
                <input type='hidden' name='user_type' value='".$user_type."'>";
            if(empty($data) || $data == NULL){
                echo "<img class='prof_pic' src='../../images/anonymousUser.png'>";
                }else{
                echo "<img class='prof_pic' src='$data'>";
                }
            echo"  
                <table style='margin: 0 auto;'>
                    <tr>
                        <th>User Type</th>
                        <td class='uType'>".$user_type."</td>
                    <tr>
                        <th>Username</th>
                        <td>".$row['username']."</td>
                    </tr>
                </table>
            </button></form>";
            if(isset($_POST['profile'])){
                $_SESSION['sourcepage'] = "searchUser";
                $_SESSION['management_id'] = $_POST['user_id'];
                $_SESSION['delete_id'] = $_POST['delete_id'];
                $type = $_POST['user_type'];
                echo "<script>
                    window.location.href = './Profile$type.php';
                    </script>";

            }
        }
        $noResults = False;
    }
    //  elseif($noResults == False){
    //     $noResults = True;
    // }
}if($noResults == True){echo "<h1>No results found</h1>";}?>
</main>
</body>
</html>