
<?php
include_once 'laibery/db.php';
include_once 'laibery/session_start.php';
include_once 'laibery/auth.php';


if(!islogged() || $_SESSION['log_user']!='teacher')
{
    header('location:teacher_login.php');
}

$id=htmlentities($_GET['id'],ENT_QUOTES);
$query="SELECT * from students where uid='$id'";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_assoc($result);

if($data['insid']!=$_SESSION['user_info']['insid'])
{
    exit('Sorry !! You do not have access to this ID !!');
}

    $query="update students set status='a' WHERE uid='$id'";
    $result=mysqli_query($link,$query);
    header('location: student_request.php');



