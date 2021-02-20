
<?php
include_once 'laibery/db.php';
include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';

if(!islogged() || $_SESSION['log_user']!='admin')
{
    header('location:admin_login.php');
}
$pass=htmlentities($_POST['pass'],ENT_QUOTES);
$code=htmlentities($_POST['code'],ENT_QUOTES);
$sub=htmlentities($_POST['sub'],ENT_QUOTES);
$semester=htmlentities($_POST['semester'],ENT_QUOTES);
$credit= htmlentities($_POST['credit'],ENT_QUOTES);

if(!empty($_POST))
{
    if(empty($_POST['pass']) || empty($_POST['code']) || empty($_POST['sub']) ||
        empty($_POST['semester']) || empty($_POST['credit']))
    {
        $_SESSION['error_msg']='Field can not be empty !!';
        header('location:admin_sub_add.php');
    }

    else if($pass == $_SESSION['user_info']['pass'])
    {
        $query="INSERT INTO subjects(sub,semester,code,credit) values ('$sub','$semester','$code','$credit')";
        $result = mysqli_query($link,$query);
        $_SESSION['s_msg']='Successfully Added !!';
        header('location:admin_subject_list.php');
    }
    else if($pass != $_SESSION['user_info']['pass'])
    {
        $_SESSION['error_msg']='Wrong Password !!';
        header('location:admin_sub_add.php');
    }

}
else
{
    header('location:admin_subject_edit.php');
}





