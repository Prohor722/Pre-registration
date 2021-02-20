<?php
include_once 'laibery/db.php';
include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';

if(islogged() && $_SESSION['log_user']=='teachers')
{
    header("location:teacher_login.php");
}
$name=htmlentities($_POST['name'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$phone=htmlentities($_POST['phone'],ENT_QUOTES);
$position= htmlentities($_POST['position'],ENT_QUOTES);
$address= htmlentities($_POST['address'],ENT_QUOTES);
$edu= htmlentities($_POST['edu'],ENT_QUOTES);
$pass= md5(htmlentities($_POST['opass'],ENT_QUOTES));
$id= $_SESSION['user_info']['insid'];

$query = "select * from teachers where insid='$id' AND status='a'";
$result = mysqli_query($link,$query);
$data = mysqli_fetch_assoc($result);


    if(!empty($_POST))
    {
        if($pass==$data['pass'])
        {
            if(!empty($_POST['npass']) && !empty($_POST['cpass']))
            {
                if($_POST['npass']==$_POST['cpass'])
                {
                    $pass= md5(htmlentities($_POST['npass'],ENT_QUOTES));
                    $query="update teachers set name='$name',email='$email',phone='$phone',pass='$pass',
                    position='$position',address='$address',edu='$edu' WHERE insid='$id'";
                    $result=mysqli_query($link,$query);
                    $_SESSION['s_msg']="Successfully Updated !!";
                    header('location:teacher_profile.php');
                }
                else
                {
                    $_SESSION['error_msg']="New Password and Confirm did not match";
                    header('location:teacher_profile_edit.php');
                }

            }
            else if(empty($_POST['name']) || empty($_POST['email'])|| empty($_POST['phone']) ||
                empty($_POST['position']) || empty($_POST['address']) || empty($_POST['edu']))
            {
                $_SESSION['error_msg']="Field can not be empty";
                header('location:teacher_profile_edit.php');
            }
            else
            {
                $query="update teachers set name='$name',email='$email',phone='$phone',position='$position',
                        address='$address',edu='$edu' WHERE insid='$id'";
                $result=mysqli_query($link,$query);
                $_SESSION['s_msg']="Successfully Updated !!";
                header('location:teacher_profile.php');
            }
        }
        else
        {
            $_SESSION['error_msg']="Incorrect Password !!";
            header('location:teacher_profile_edit.php');
        }
    }
    else
    {
        $_SESSION['error_msg']="Field can not be empty";
        header('location:teacher_profile_edit.php');
    }





