
<?php
include_once 'laibery/db.php';
include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';


if(!islogged() || $_SESSION['log_user']!='student')
{
    header('location:student_login.php');
}

$uid= $_SESSION['user_info']['uid'];

$name=htmlentities($_POST['name'],ENT_QUOTES);
$email=htmlentities($_POST['email'],ENT_QUOTES);
$phone=htmlentities($_POST['phone'],ENT_QUOTES);
$id= htmlentities($_POST['insid'],ENT_QUOTES);
$program = htmlentities($_POST['program'],ENT_QUOTES);
$batch= htmlentities($_POST['batch'],ENT_QUOTES);
$dept= htmlentities($_POST['dept'],ENT_QUOTES);
$house= htmlentities($_POST['house'],ENT_QUOTES);
$road= htmlentities($_POST['road'],ENT_QUOTES);
$area= htmlentities($_POST['area'],ENT_QUOTES);
$city= htmlentities($_POST['city'],ENT_QUOTES);
$pcode= htmlentities($_POST['pcode'],ENT_QUOTES);
$village= htmlentities($_POST['village'],ENT_QUOTES);
$post= htmlentities($_POST['post'],ENT_QUOTES);
$district= htmlentities($_POST['district'],ENT_QUOTES);
$ps= htmlentities($_POST['ps'],ENT_QUOTES);
$gname= htmlentities($_POST['gname'],ENT_QUOTES);
$grs= htmlentities($_POST['grs'],ENT_QUOTES);
$gphone= htmlentities($_POST['gphone'],ENT_QUOTES);
$pass = md5( htmlentities($_POST['opass'],ENT_QUOTES));


$phone= str_ireplace([' ','.',',','/'],'',$phone);
$gphone= str_ireplace([' ','.',',','/'],'',$gphone);

$query = "select * from students where uid='$uid' AND status='a'";
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

                $query="update students set name='$name',email='$email',phone='$phone',insid='$id',pass='$pass',program='$program',
batch='$batch',dept='$dept',house='$house',road='$road',area='$area',city='$city',pcode='$pcode',village='$village',
post='$post',district='$district',ps='$ps',gname='$gname', gphone='$gphone',grs='$grs' WHERE uid='$uid'";

                $result=mysqli_query($link,$query);

                $_SESSION['s_msg']="Successfully Updated !!";
                header('location:student_profile.php');
            }
            else
            {
                $_SESSION['error_msg']="New Password and Confirm did not match";
                header('location:student_profile_edit.php');
            }

        }
        else if(empty($_POST['name']) || empty($_POST['email'])|| empty($_POST['phone']) ||
                empty($_POST['program'] || empty($_POST['house']) ||
                empty($_POST['road'])|| empty($_POST['batch']) || empty($_POST['dept']) || empty($_POST['area']) ||
                empty($_POST['city']) || $_POST['pcode']) || empty($_POST['village']) || empty($_POST['post'] )||
                empty($_POST['district']) || empty($_POST['gname'])|| empty($_POST['grs']) ||
                empty($_POST['gphone']) || empty($_POST['ps']))
        {
            $_SESSION['error_msg']="Field can not be empty";
            header('location:student_profile_edit.php');
        }
        else
        {
            $query="update students set name='$name',email='$email',phone='$phone',insid='$id',program='$program',
batch='$batch',dept='$dept',house='$house',road='$road',area='$area',city='$city',pcode='$pcode',village='$village',
post='$post',district='$district',ps='$ps',gname='$gname',gphone='$gphone',grs='$grs' WHERE uid='$uid'";
            $result=mysqli_query($link,$query);
            $_SESSION['s_msg']="Successfully Updated !!";
            header('location:student_profile.php');
        }
    }
    else
    {
        $_SESSION['error_msg']="Incorrect Password !!";
        header('location:student_profile_edit.php');
    }
}
else
{
    $_SESSION['error_msg']="Field can not be empty";
    header('location:teacher_profile_edit.php');
}

