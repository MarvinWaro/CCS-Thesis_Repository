<?php

    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to login page
    if (isset($_SESSION['user_type']) == 'admin'){
        header('location: admin/dashboard.php');
    }
    else if (isset($_SESSION['user_type']) == 'faculty'){
        header('location: faculty/faculty.php');
    }
    else if (isset($_SESSION['user_type']) == 'student'){
        header('location: student/student.php');
    }
    else{
        header('location: login/login.php');
    }

?>