<?php
require_once 'laibery/db.php';
require_once 'laibery/auth.php';
require_once 'laibery/func.php';
include_once 'laibery/session_start.php';

if(!islogged() && $_SESSION['log_users']!='student')
{
    header('location:student_login.php');
}
if(!empty($_POST))
{

    $uid= htmlentities($_POST['id'],ENT_QUOTES);
    $pass= htmlentities($_POST['pass'],ENT_QUOTES);


    $pass= md5($pass);
    $query = "select * from students where uid='$uid' AND status='a'";
    $result = mysqli_query($link,$query);
    $data = mysqli_fetch_assoc($result);


    if(!empty($uid) && !empty($pass))
    {

        if(!empty($data))
        {
                    if($pass==$data['pass'])
                    {
                        login($data['name']);
                        $_SESSION['user_info']=$data;
                        $_SESSION['log_user']='student';
                        header('location: student_home.php');
                    }
                    else
                    {
                        $_SESSION['error']['login']="ID or Password is incorrect";
                        header('location:student_login.php');
                    }
        }
        else
        {
            $_SESSION['error']['login']="ID or Password is incorrect";
            header('location:student_login.php');
        }

    }
    else
    {
        header('location:student_login.php');
    }
}
?>