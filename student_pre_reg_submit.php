<?php
include_once 'laibery/session_start.php';
include_once 'laibery/db.php';

$sub=$_POST['sub'];
$sem=$_SESSION['sem'];
$uid=$_SESSION['user_info']['uid'];

$id=$_SESSION['user_info']['uid'];
$query="SELECT * from subjects";
$result=mysqli_query($link,$query);
$data=mysqli_fetch_all($result,MYSQLI_ASSOC);

$query="SELECT * from students where uid='$id'";
$result=mysqli_query($link,$query);
$data1=mysqli_fetch_assoc($result);

$insid=$data1['insid'];
$name=$data1['name'];
$i=0;
foreach ($sub as $subs)
{
    foreach ($data as $dataitems)
    {
        if($subs==$dataitems['code'])
        {
            $code=$dataitems['code'];
            $sub=$dataitems['sub'];
            $credit=$dataitems['credit'];
            $query = "INSERT INTO pre_reg (code, sub, semester, status, credit,uid,insid,stu_name) 
                      values ('$code','$sub','$sem','R','$credit','$uid','$insid','$name')";
            mysqli_query($link,$query);
        }
    }

}
$_SESSION['msg']='You have successfully Submit your Pre-Registration form.';
header('location:student_home.php');