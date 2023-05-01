<?php 
    //load page
        include "src/database/connect.php";
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // $student_id = $_SESSION['user_id'];
        $teacher_id; $parent_id; $student_id;
        $user_id = 'PT00000001';
        if (substr($user_id, 0, 2) == 'ST') {
            $student_id = $user_id;
        } else if(substr($user_id, 0, 2) == 'PT') {
            $parent_id = $user_id;
        }else if (substr($user_id, 0, 2) == 'TC') {
            $teacher_id = $user_id;
        }
        echo  $user_id,$teacher_id;