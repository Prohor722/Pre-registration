<?php
include_once 'laibery/auth.php';
include_once 'laibery/session_start.php';
logout();
if($_SESSION['log_user']=='admin')
{
    unset($_SESSION['log_user']);
    header("location:admin_login.php");
}
else if($_SESSION['log_user']=='student')
{
    unset($_SESSION['log_user']);
    header("location:student_login.php");
}
else if($_SESSION['log_user']=='teacher')
{
    unset($_SESSION['log_user']);
    header("location:teacher_login.php");
}

