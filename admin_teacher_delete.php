<?php
include_once 'laibery/auth.php';
include_once 'laibery/session_start.php';
include_once 'laibery/db.php';

$query="SELECT * from admin";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);

if(!islogged() && $_SESSION['log_users']!='admin')
{
    header('location:admin_login.php');
}
$insid=$_POST['id'];
$pass=$_POST['pass'];
if($pass==$data['pass'])
{
    $query="delete from teachers where insid='$insid'";
    $result = mysqli_query($link,$query);
    $_SESSION['s_msg']="Successfully Deleted !!";
    header('location:admin_teacher_list.php');
}
else
{
    $_SESSION['error_msg']="Incorrect Password";
    header('location:admin_teacher_list.php');
}
?>