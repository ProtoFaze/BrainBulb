<!-- Updates the profile of the teacher, student,parent -->
<!-- submit button names:
    save_teacher_details
    save_student_details
    save_parent_details
    save_account_details
    save_qualification_details -->
<?php 
require_once "../database/connect.php";
//get user id from session
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['user_id'];
//    check for empty fields
//    regex check to make sure the input is valid, has right data type and prevents sql injection

//ititialize array to store inputs
$arrInputs=null;

if(isset($_POST["save_account_details"])){

    //validate input
    //initialize array to store inputs
    $arrInputs = array(
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "ic" => $_POST["ic"]
    );
    //run for loop to check for empty fields,
    // if empty, remove from array,
    // else if fail regex, remove from array and assign value to error variable
    foreach($arrInputs as $inputName => $values){
        if(empty($values)){
            unset($arrInputs[$inputName]);
            continue;
        }
        mysqli_real_escape_string($connection, $values);
        if($inputName == "username"){
            if(!preg_match("/^[a-zA-Z0-9]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Only letters and numbers allowed";
            }
        }else if($inputName == "email"){
            if(!filter_var($values, FILTER_VALIDATE_EMAIL)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Invalid email format";
            }
        }else if($inputName == "ic"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Invalid characters detected";
            }
        }
    }
    //build sql query from remaining array values
    $sql = "UPDATE user SET ";
    foreach($arrInputs as $inputName => $values){
        $sql .= "$inputName = '$values', ";
    }
    $sql = rtrim($sql, ", ");
    $idField = null;
    if (substr($user_id, 0, 2) == 'ST') {
        $idField = "student_ID";
        $fileName = "editStudent.php";
    } else if(substr($user_id, 0, 2) == 'PT') {
        $idField = "parent_ID";
    } else if(substr($user_id, 0, 2) == 'TC') {
        $idField = "teacher_ID";
    }
    $sql .= " WHERE $idField = '$user_id'";
}

if(isset($_POST['save_teacher_details'])){
    //validate input
    //initialize array to store inputs
    $arrInputs = array(
        "tName" => $_POST["tName"],
        "tDOB" => $_POST["tDOB"],
        "tRegion" => $_POST["tRegion"],
        "tSchool" => $_POST["tSchool"]
    );
    //run for loop to check for empty fields,
    // if empty, remove from array,
    // else if fail regex, remove from array and assign value to error variable
    foreach($arrInputs as $inputName => $values){
        if(empty($values)){
            unset($arrInputs[$inputName]);
            continue;
        }
        mysqli_real_escape_string($connection, $values);
        if($inputName == "tName" || $inputName == "tSchool" || $inputName == "tRegion"){
            if(!preg_match("/^[a-zA-Z ]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Only letters and white space allowed for names";
            }
        }else if($inputName == "tDOB"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Invalid characters detected in date";
            }
        }
    }
    //build sql query from remaining array values
    $sql = "UPDATE teacher SET ";
    foreach($arrInputs as $inputName => $values){
        $sql .= "$inputName = '$values', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE teacher_ID = '$user_id'";
}

if(isset($_POST['save_student_details'])){
    //validate input
    //initialize array to store inputs
    $arrInputs = array(
        "sGrade" => $_POST["sGrade"],
        "sName" => $_POST["sName"],
        "sDOB" => $_POST["sDOB"],
        "sRegion" => $_POST["sRegion"],
        "sSchool" => $_POST["sSchool"]
    );
    //run for loop to check for empty fields,
    // if empty, remove from array,
    // else if fail regex, remove from array and assign value to error variable
    foreach($arrInputs as $inputName => $values){
        if(empty($values)){
            unset($arrInputs[$inputName]);
            continue;
        }
        mysqli_real_escape_string($connection, $values);
        if($inputName == "sName" || $inputName == "sSchool" || $inputName == "sRegion"){
            if(!preg_match("/^[a-zA-Z ]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Only letters and white space allowed in names";
            }
        }else if($inputName == "sDOB"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Invalid characters detected";
            }
        }
    }
    //build sql query from remaining array values
    $sql = "UPDATE student SET ";
    foreach($arrInputs as $inputName => $values){
        $sql .= "$inputName = '$values', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE student_ID = '$user_id'";
}

if(isset($_POST['save_parent_details'])){
    //validate input
    //initialize array to store inputs
    $arrInputs = array(
        "pName" => $_POST["pName"],
        "pDOB" => $_POST["pDOB"],
        "pRegion" => $_POST["pRegion"],
        "pSchool" => $_POST["pSchool"]
    );
    //run for loop to check for empty fields,
    // if empty, remove from array,
    // else if fail regex, remove from array and assign value to error variable
    foreach($arrInputs as $inputName => $values){
        if(empty($values)){
            unset($arrInputs[$inputName]);
            continue;
        }
        mysqli_real_escape_string($connection, $values);
        if($inputName == "pName" || $inputName == "pSchool" || $inputName == "pRegion"){
            if(!preg_match("/^[a-zA-Z ]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Only letters and white space allowed in names";
            }
        }else if($inputName == "pDOB"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                $_SESSION[$inputName."Error"] = "Invalid characters detected in date";
            }
        }
    }
    //build sql query from remaining array values
    $sql = "UPDATE parent SET ";
    foreach($arrInputs as $inputName => $values){
        $sql .= "$inputName = '$values', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE parent_ID = '$user_id'";
}

if(isset($_POST['save_qualification_details'])){
    //validate input
    //initialize array to store inputs
    $arrInputs = array(
        "highest_Qualification" => $_POST["highest_Qualification"],
        "professionality_Description" => $_POST["professionality_Description"]
    );
    //run for loop to check for empty fields,
    // if empty, remove from array,
    // else if fail regex, remove from array and assign value to error variable
    foreach($arrInputs as $inputName => $values){
        if(empty($values)){
            unset($arrInputs[$inputName]);
            continue;
        }
        mysqli_real_escape_string($connection, $values);
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $values)){
            unset($arrInputs[$inputName]);
            $_SESSION[$inputName."Error"] = "Only letters, digits and white space allowed for professional description";
        }
    }
}
if(isset($_FILES['profile_Picture']) && $_FILES['profile_Picture'] != null && (isset($_POST['save_student_details']) || isset($_POST['save_parent_details']) || isset($_POST['save_teacher_details']))){
    //validate input
    //get temp location and type from input
    $temp = $_FILES['profile_Picture']['tmp_name'];
    $type = $_FILES['profile_Picture']['type'];

    $data = file_get_contents($temp);
    $readable = base64_encode($data);
    $fullData = "data:$type;base64,$readable";
    //perform regex to check for valid dataurl
    if(!preg_match("/^data:image\/(png|jpg|jpeg);base64,/", $fullData)){
        $_SESSION["profile_PictureError"] = "Invalid file type";
        echo "<script>alert('invalid file type')</script>";
    }elseif($_FILES['profile_Picture']['size'] > 500000){
        $_SESSION["profile_PictureError"] = "File size too large";
        echo "<script>alert('file size too large')</script>";
    } else {
        //declare $sql variable
        $query = "";
        // initialize parameterized sql for uploading image
        if(isset($_POST['save_student_details'])){
            $query = "UPDATE user SET profile_Picture = ? WHERE student_ID = ?";
        } else if(isset($_POST['save_parent_details'])){
            $query = "UPDATE user SET profile_Picture = ? WHERE parent_ID = ?";
        } else if(isset($_POST['save_teacher_details'])){
            $query = "UPDATE user SET profile_Picture = ? WHERE teacher_ID = ?";
        }
        //prepare statement
        $stmt = $pdo->prepare($query);
        //execute statement
        if($stmt->execute([$fullData, $user_id])){
            echo "<script>alert('Profile picture updated successfully')</script>";
        } else {
            echo "<script>alert('Profile picture update failed')</script>";
        };
    }
}




if($arrInputs!=null){
    if(mysqli_query($connection, $sql)){
        echo '<script>alert("Account details updated successfully")</script>';
    }else{
        echo '<script>alert("Account details update failed")</script>';
    }
}else{
    echo '<script>alert("No changes detected")</script>';
}
// check session user id's first 2 characters to determine which page to redirect to

if (substr($user_id, 0, 2) == 'ST') {
    echo "<script>window.location.href='../views/editStudent.php'</script>";
} else if(substr($user_id, 0, 2) == 'PT') {
    echo "<script>window.location.href='../views/editParent.php'</script>";
} else if(substr($user_id, 0, 2) == 'TC') {
    echo "<script>window.location.href='../views/editTeacher.php'</script>";
}