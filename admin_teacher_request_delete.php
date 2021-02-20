<?php
include_once 'laibery/auth.php';
include_once 'laibery/session_start.php';
include_once 'laibery/db.php';



if(!islogged() && $_SESSION['log_users']!='admin')
{
    header('location:admin_login.php');
}
$insid=$_GET['insid'];

$query="delete from teachers where insid='$insid'";
$result = mysqli_query($link,$query);
header('location:admin_teacher_request.php');
?>