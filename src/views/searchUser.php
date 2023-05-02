<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inputs.css">
    <title>Search User</title>
    <style>
        .titlebox{
            margin-bottom: 0px;
        }
        .main{
            display: flex;
            flex-direction: row;
            overflow-x: auto;
            margin: 0 auto;
            height: max-content;
            width: 98%;
            margin: 0 30px;
        }
        .profile {
            background-color: var(--box-primary);
            min-width: 350px;
            height: 550px;
            float: left;
            margin: 30px;
            box-shadow: 2px 5px 10px 1px #867b75;
            padding: 25px;
            padding-top: 45px;
            box-sizing: border-box;
            border: none;
            transition: transform 0.4s;
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
            border: 1px solid black;
            border-radius: 8px;
            word-break: break-all;
        }
        .response,.search{
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: auto;
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
    <script>
    function viewprofile(employee_id) {
        window.location.href = "viewprofile.php?employee_id=" + employee_id;
    }
</script>
</head>
<body>
    <header>
        <?php 
        include "../database/connect.php";
        function detectsearch(){
            if (isset($_POST['display'])) {
                $searchby = $_POST['searchby'];
                $searchterm = $_POST['txtSearch'];
                $sql = "SELECT `application`.`employee_id`, `application`.`full_name`, `application`.`workmode`, `application`.`email`, `application`.`contact_number`, `application`.`personal_image` FROM `application` INNER JOIN `employee` ON `application`.`employee_id` = `employee`.`employee_id` WHERE `employee`.`status` = 1
    
                AND $searchby LIKE '%$searchterm%'";
                return $sql;
            }else{
                $sql = 
                "SELECT `application`.`employee_id`, `application`.`full_name`, `application`.`workmode`, `application`.`email`, `application`.`contact_number`, `application`.`personal_image` 
                FROM `application` INNER JOIN `employee` ON `application`.`employee_id` = `employee`.`employee_id` WHERE `employee`.`status` = 1";
                return $sql;
                
            }}
        $query = detectsearch();
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
        include "../components/header.php"; ?>
    </header>
    <main>
    <div class="response">
            <button onclick="window.location.href = 'admin_homepage.php'" id='back'><span class="material-symbols-outlined">arrow_back_ios</span>Back</button>
            <form class="search" method="post">
                <h5>Search by:<select name="searchby" id="dropdowninput"></h5>
                    <option value="account_ID">Account ID</option>
                    <option value="full_name">Name</option>
                    <option value="contact_number">Contact Number</option>
                    <option value="ic_number">IC number</option>
                    <option value="Email">Email</option>
                    <option value="Country">Country</option>
                    <option value="Workmode">Workmode</option>
                </select>
                <h5>Enter search data: <input type="text" name="txtSearch" id="txtSearch"></h5>
                <input type="submit" value="Search" name= "display">
            </form>
        </div>
    <div class="main">
<?php
        while($row = mysqli_fetch_assoc($result)) {
            $data = $row['personal_image'];
            $employee_id = $row['employee_id'];
            echo
                "<button onclick='window.location.href=\"./viewProfile.php?employee_id=$employee_id\"' class='profile'>";
            if(empty($data) || $data == NULL){
                echo "<img class='prof_pic' src='./pictureForLogiaid/userheadshot.png'>";
                }else{
                echo "<img class='prof_pic' src='./logiaid_uploads_images/$data'>";
                }
            echo"  
                <table>
                    <tr>
                        <th>Employee ID </th>
                        <td>".$row['employee_id']."</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>".$row['full_name']."</td>
                        
                    </tr>
                    <tr>
                        <th>Employment Type</th>
                        <td>".$row['workmode']."</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>".$row['email']."</td>
                    </tr>
                    <tr>
                        <th>Contact No</th>
                        <td>".$row['contact_number']."</td>
                    </tr>
                </table>
            </button>";
        }
    } else {
        echo "<h2>0 results</h2>";
    }  
?>
    </main>
</body>
</html>