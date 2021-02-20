<?php
include_once 'laibery/auth.php';
include_once 'laibery/session_start.php';
include_once 'laibery/db.php';
if(!islogged() && $_SESSION['log_users']!='teacher')
{
    header('location:teacher_login.php');
}
$id=$_SESSION['s_id'];
$query="SELECT * from students where uid='$id'";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);

$insid=$_SESSION['user_info']['insid'];
$query="SELECT * from teachers where insid='$insid'";
$result=mysqli_query($link,$query);
$data1=mysqli_fetch_assoc($result);
$pass= md5(htmlentities($_POST['pass'],ENT_QUOTES));

if($data['insid']!=$_SESSION['user_info']['insid'])
{
    exit('Sorry !! You do not have access to this ID !!');
}
elseif ($pass==$data1['pass'])
{
    $query="delete from students where uid='$id'";
    $result = mysqli_query($link,$query);
    $_SESSION['s_msg']="Successfully Deleted !!";
    header('location:student_list.php');
}
else
{
    $_SESSION['error_msg']="Incorrect Password !!";
    header('location:student_list.php');
}
?>