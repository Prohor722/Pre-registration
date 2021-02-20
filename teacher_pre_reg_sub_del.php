<?php

include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';
include_once 'laibery/db.php';

if(!islogged() && $_SESSION['log_users']!='teacher')
{
    header("location:teacher_login.php");
}

$id= $_GET['id'];
print_r($id);

$insid=$_SESSION['user_info']['insid'];
$query="SELECT * from pre_reg where id='$id'";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);

if($data['insid']!=$_SESSION['user_info']['insid'])
{
    exit('Sorry !! You do not have access to this ID !!');
}


$query="delete from pre_reg where id='$id'";
$result = mysqli_query($link,$query);
header('location: teacher_pre_reg_info.php');
?>
