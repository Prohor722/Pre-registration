<?php
include_once 'laibery/db.php';
include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';

if(islogged() && $_SESSION['log_user']=='admin')
{
    header("location:admin_login.php");
}
$query="SELECT * from admin";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);

$name=htmlentities($_POST['name'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$pass= htmlentities($_POST['npass'],ENT_QUOTES);
$opass= htmlentities($_POST['opass'],ENT_QUOTES);

if(!empty($_POST))
{
    if( ($opass==$data['pass']) && !empty($_POST['opass']))
    {

        if( (empty($_POST['name']) || empty($_POST['email'])))
        {
            $_SESSION['error_msg']="Field can not be empty !!";
            header('location:admin_profile.php');
        }
        else if(!empty($_POST['npass']))
        {
            $query="update admin set name='$name',email='$email',pass='$pass' where id='1'";
            $result=mysqli_query($link,$query);
            header('location:admin_profile.php');
        }
        else
        {
            $query="update admin set name='$name',email='$email' where id ='1'";
            $result=mysqli_query($link,$query);
            header('location:admin_profile.php');
        }

    }
    else
    {
        $_SESSION['error_msg']="Incorrect Password";
        header('location:admin_profile.php');
    }
}
else
{
    header('location:admin_profile.php');
}



