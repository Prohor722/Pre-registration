<?php
require_once 'laibery/db.php';
require_once 'laibery/auth.php';
require_once 'laibery/func.php';
include_once 'laibery/session_start.php';

if(!islogged() && $_SESSION['log_users']!='teacher')
{
    header('location:teacher_login.php');
}
if(!empty($_POST))
{

    $email= htmlentities($_POST['email'],ENT_QUOTES);
    $pass= htmlentities($_POST['pass'],ENT_QUOTES);


    $pass= md5($pass);
    $query = "select * from teachers where email='$email' AND status='a'";
    $result = mysqli_query($link,$query);
    $data = mysqli_fetch_assoc($result);


    if(!empty($email) && !empty($pass))
    {

        if(!empty($data))
        {
            if($pass==$data['pass'])
            {
                login($data['name']);
                $_SESSION['user_info']=$data;
                $_SESSION['log_user']='teacher';
                header('location: teacher_home.php');
            }
            else
            {
                $_SESSION['error']['login']="Email or Password is incorrect";
                header('location: teacher_login.php');
            }
        }
        else
        {
            $_SESSION['error']['login']="Email or Password is incorrect";
            header('location: teacher_login.php');
        }

    }
    else
    {
        header('location:teacher_login.php');
    }
}
?>