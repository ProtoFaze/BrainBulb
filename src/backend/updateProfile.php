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

//ititialize error variables
$sGradeError=$sNameError=$pNameError=$sDOBError=$sRegionError=$sSchoolError
=$tNameError=$tDOBError=$tRegionError=$tSchoolError
=$highest_QualificationError=$professionality_DescriptionError
=$pNameError=$pDOBError
=$sNameError=$sDOBError=$sRegionError=$sSchoolError
=$usernameError=$emailError=$icError=null;
$arrInputs=null;

//check if save account button is clicked
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
                ${$inputName."Error"} = "Only letters and numbers allowed";
            }
        }else if($inputName == "email"){
            if(!filter_var($values, FILTER_VALIDATE_EMAIL)){
                unset($arrInputs[$inputName]);
                ${$inputName."Error"} = "Invalid email format";
            }
        }else if($inputName == "ic"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                ${$inputName."Error"} = "Invalid characters detected";
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

    echo <<<JS
    $.ajax({
        type: "POST",
        url: "../view/{$fileName}",
        data: {
            usernameError: "{$usernameError}",
            emailError: "{$emailError}",
            icError: "{$icError}"
        },
        success: function(response) {
            var data = JSON.parse(response);
            document.getElementById("usernameError").textContent = data.usernameError;
            document.getElementById("emailError").textContent = data.emailError;
            document.getElementById("icError").textContent = data.icError;
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    JS;
    echo $sql;
}

//check if save teacher button is clicked
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
                ${$inputName."Error"} = "Only letters and white space allowed";
            }
        }else if($inputName == "tDOB"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                ${$inputName."Error"} = "Invalid characters detected";
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
    echo <<<JS
    $.ajax({
        type: "POST",
        url: "../view/editTeacher.php",
        data: {
            tNameError: "{$tNameError}",
            tDOBError: "{$tDOBError}",
            tRegionError: "{$tRegionError}",
            tSchoolError: "{$tSchoolError}"
        },
        success: function(response) {
            var data = JSON.parse(response);
            document.getElementById("tNameError").textContent = data.tNameError;
            document.getElementById("tDOBError").textContent = data.tDOBError;
            document.getElementById("tRegionError").textContent = data.tRegionError;
            document.getElementById("tSchoolError").textContent = data.tSchoolError;

        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    JS;
    echo $sql;
}

//check if save student button is clicked
if(isset($_POST['save_student_details'])){
    //validate input
    //initialize array to store inputs
    $arrInputs = array(
        "sGrade" => $_POST["sGrade"],
        "sName" => $_POST["sName"],
        "pName" => $_POST["pName"],
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
        if($inputName == "sName" || $inputName == "pName"|| $inputName == "sSchool" || $inputName == "sRegion"){
            if(!preg_match("/^[a-zA-Z ]*$/", $values)){
                unset($arrInputs[$inputName]);
                ${$inputName."Error"} = "Only letters and white space allowed";
            }
        }else if($inputName == "sDOB"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                ${$inputName."Error"} = "Invalid characters detected";
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
    echo <<<JS
    $.ajax({
        type: "POST",
        url: "../view/editStudent.php",
        data: {
            sGradeError: "{$sGradeError}",
            sNameError: "{$sNameError}",
            pNameError: "{$pNameError}",
            sDOBError: "{$sDOBError}",
            sRegionError: "{$sRegionError}",
            sSchoolError: "{$sSchoolError}"
        },
        success: function(response) {
            var data = JSON.parse(response);
            document.getElementById("sGradeError").textContent = data.sGradeError;
            document.getElementById("sNameError").textContent = data.sNameError;
            document.getElementById("pNameError").textContent = data.pNameError;
            document.getElementById("sDOBError").textContent = data.sDOBError;
            document.getElementById("sRegionError").textContent = data.sRegionError;
            document.getElementById("sSchoolError").textContent = data.sSchoolError;
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    JS;
    echo $sql;
}

//check if save parent button is clicked
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
                ${$inputName."Error"} = "Only letters and white space allowed";
            }
        }else if($inputName == "pDOB"){
            if(!preg_match("/^[0-9\-]*$/", $values)){
                unset($arrInputs[$inputName]);
                ${$inputName."Error"} = "Invalid characters detected";
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
    echo <<<JS
    $.ajax({
        type: "POST",
        url: "../view/editParent.php",
        data: {
            pNameError: "{$pNameError}",
            pDOBError: "{$pDOBError}",
        },
        success: function(response) {
            var data = JSON.parse(response);
            document.getElementById("pNameError").textContent = data.pNameError;
            document.getElementById("pDOBError").textContent = data.pDOBError;
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    JS;
    echo $sql;
}

//check if save qualification button is clicked
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
            ${$inputName."Error"} = "Only letters, digits and white space allowed";
        }
    }
    //build sql query from remaining array values
    $sql = "UPDATE teacher SET ";
    foreach($arrInputs as $inputName => $values){
        $sql .= "$inputName = '$values', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE qualification_ID = '$user_id'";
    echo <<<JS
    $.ajax({
        type: "POST",
        url: "../view/editTeacher.php",
        data: {
            highest_QualificationError: "{$highest_QualificationError}",
            professionality_DescriptionError: "{$professionality_DescriptionError}"
        },
        success: function(response) {
            var data = JSON.parse(response);
            document.getElementById("highest_QualificationError").textContent = data.highest_QualificationError;
            document.getElementById("professionality_DescriptionError").textContent = data.professionality_DescriptionError;
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
    JS;
    echo $sql;
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
//check session user id's first 2 characters to determine which page to redirect to
// if (substr($user_id, 0, 2) == 'ST') {
//     echo "<script>window.location.href='../views/editStudent.php'</script>";
// } else if(substr($user_id, 0, 2) == 'PT') {
//     echo "<script>window.location.href='../views/editParent.php'</script>";
// } else if(substr($user_id, 0, 2) == 'TC') {
//     echo "<script>window.location.href='../views/editTeacher.php'</script>";
// }




