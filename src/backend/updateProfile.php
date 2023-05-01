<!-- Updates the profile of the teacher, student,parent -->
<!-- submit button names:
    save_teacher_details
    save_student_details
    save_parent_details
    save_account_details -->
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
=$usernameError=$emailError=$icError=null;

    if(isset($_POST["save_account_details"])){

        //validate input
        //initialize array to store inputs
        $accInputs = array(
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "ic" => $_POST["ic"]
        );
        //run for loop to check for empty fields,
        // if empty, remove from array,
        // else if fail regex, remove from array and assign value to error variable
        foreach($accInputs as $inputName => $values){
            if(empty($values)){
                unset($accInputs[$inputName]);
            }else{
                if($inputName == "username"){
                    if(!preg_match("/^[a-zA-Z0-9]*$/", $values)){
                        unset($accInputs[$inputName]);
                        ${$inputName."Error"} = "Only letters and numbers allowed";
                    }
                }else if($inputName == "email"){
                    if(!filter_var($values, FILTER_VALIDATE_EMAIL)){
                        unset($accInputs[$inputName]);
                        ${$inputName."Error"} = "Invalid email format";
                    }
                }else if($inputName == "ic"){
                    if(!preg_match("/^[0-9\-]*$/", $values)){
                        unset($accInputs[$inputName]);
                        ${$inputName."Error"} = "Invalid characters detected";
                    }
                }
            }
        }
        //build sql query from remaining array values
        $accsql = "UPDATE user SET ";
        foreach($accInputs as $inputName => $values){
            $accsql .= $inputName." = '".$values."', ";
        }
        $accsql = substr($accsql, 0, -2);
        $idField = null;
        if (substr($user_id, 0, 2) == 'ST') {
            $idField = "student_ID";
        } else if(substr($user_id, 0, 2) == 'PT') {
            $idField = "parent_ID";
        } else if(substr($user_id, 0, 2) == 'TC') {
            $idField = "teacher_ID";
        }
        $accsql .= "WHERE $idField = '"$user_id"'";
    }


    if(isset($_POST["save_teacher_details"])){
        //validate input
        $editsql = "UPDATE teacher SET tName = '".$_POST["tName"]."', tDOB = '".$_POST["tDOB"]."', tSchool = '".$_POST["tSchool"]."', tRegion = '".$_POST["tRegion"]."', highest_Qualification = '".$_POST["highest_Qualification"]."', professionality_Description = '".$_POST["professionality_Description"]."' WHERE teacher_ID = '".$_SESSION["teacher_ID"]."';
        UPDATE user SET username = '".$_POST["username"]."', email = '".$_POST["email"]."', ic = '".$_POST["ic"]."' WHERE teacher_ID = '".$_SESSION["teacher_ID"]."'";
        if(mysqli_query($connection, $editsql)){
            echo '<script>alert("Profile updated successfully")</script>';
            echo "<script>window.location.href='mainpageTeacher.php'</script>";
        }else{
            echo '<script>alert("Profile update failed")</script>';
        }
    }
    //run query
    if(mysqli_query($connection, $accsql)){
        echo '<script>alert("Account details updated successfully")</script>';
    }else{
        echo '<script>alert("Account details update failed")</script>';
    }
    //check session user id's first 2 characters to determine which page to redirect to
    if (substr($user_id, 0, 2) == 'ST') {
        echo "<script>window.location.href='profileStudent.php'</script>";
    } else if(substr($user_id, 0, 2) == 'PT') {
        echo "<script>window.location.href='profileParent.php'</script>";
    } else if(substr($user_id, 0, 2) == 'TC') {
        echo "<script>window.location.href='profileTeacher.php'</script>";
    }



