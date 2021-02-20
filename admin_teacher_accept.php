
<?php
include_once 'laibery/db.php';
include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';


if(!islogged() || $_SESSION['log_user']!='admin')
{
    header('location:admin_login.php');
}

$insid =htmlentities($_GET['insid'],ENT_QUOTES);


$query="update teachers set status='a' WHERE insid='$insid'";
$result=mysqli_query($link,$query);
header('location:admin_teacher_request.php');



