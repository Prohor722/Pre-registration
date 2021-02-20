<?php

include_once 'laibery/session_start.php';
require_once "laibery/db.php";

$pattern="/^(088||\+088)?01[15-9]\d{8}$/";
$p="/^(UG)\d{2}-\d{2}-\d{2}-\d{3}$/";

$_SESSION['val']=$_POST;
$name= htmlentities($_POST['name'],ENT_QUOTES);
$email=  htmlentities($_POST['email'],ENT_QUOTES);
$phone=  htmlentities($_POST['phone'],ENT_QUOTES);
$id=  htmlentities($_POST['id'],ENT_QUOTES);
$pass=  htmlentities($_POST['pass'],ENT_QUOTES);
$cpass=  htmlentities($_POST['cpass'],ENT_QUOTES);
$insid= htmlentities($_POST['insid'],ENT_QUOTES);
$program= htmlentities($_POST['program'],ENT_QUOTES);
$batch= htmlentities($_POST['batch'],ENT_QUOTES);
$dept= htmlentities($_POST['dept'],ENT_QUOTES);
$house= htmlentities($_POST['house'],ENT_QUOTES);
$area= htmlentities($_POST['area'],ENT_QUOTES);
$road= htmlentities($_POST['road'],ENT_QUOTES);
$city= htmlentities($_POST['city'],ENT_QUOTES);
$pcode= htmlentities($_POST['pcode'],ENT_QUOTES);
$village= htmlentities($_POST['village'],ENT_QUOTES);
$district= htmlentities($_POST['district'],ENT_QUOTES);
$post= htmlentities($_POST['post'],ENT_QUOTES);
$ps= htmlentities($_POST['ps'],ENT_QUOTES);
$gname= htmlentities($_POST['gname'],ENT_QUOTES);
$gphone= htmlentities($_POST['gphone'],ENT_QUOTES);
$grs= htmlentities($_POST['grs'],ENT_QUOTES);

$phone= str_ireplace([' ','.',',','/'],'',$phone);
$gphone= str_ireplace([' ','.',',','/'],'',$gphone);

///Registration error checking:

if(!empty($_POST))
{
//other all empty:
    if(empty($gname))
    {
        $_SESSION['error']['gname']="This field is required!!";
    }
    if(empty($gphone))
    {
        $_SESSION['error']['gphone']="This field is required!!";
    }
    if(empty($grs))
    {
        $_SESSION['error']['grs']="This field is required!!";
    }
    if(empty($village))
    {
        $_SESSION['error']['village']="This field is required!!";
    }
    if(empty($district))
    {
        $_SESSION['error']['district']="This field is required!!";
    }
    if(empty($post))
    {
        $_SESSION['error']['post']="This field is required!!";
    }
    if(empty($ps))
    {
        $_SESSION['error']['ps']="This field is required!!";
    }
    if(empty($pcode))
    {
        $_SESSION['error']['pcode']="This field is required!!";
    }
    if(empty($house))
    {
        $_SESSION['error']['house']="This field is required!!";
    }
    if(empty($area))
    {
        $_SESSION['error']['area']="This field is required!!";
    }
    if(empty($road))
    {
        $_SESSION['error']['road']="This field is required!!";
    }
    if(empty($insid))
    {
        $_SESSION['error']['insid']="This field is required!!";
    }
    if(empty($program))
    {
        $_SESSION['error']['program']="This field is required!!";
    }
    if(empty($batch))
    {
        $_SESSION['error']['batch']="This field is required!!";
    }
    if(empty($dept))
    {
        $_SESSION['error']['dept']="This field is required!!";
    }

//name:
    if(empty($name))
    {
        $_SESSION['error']['name']="Name is required!!";
    }
    elseif(strlen($name)<3)
    {
        $_SESSION['error']['name']="Enter a valid Name";
    }

//email:
    if(empty($email))
    {
        $_SESSION['error']['email']="Email is required!!";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $_SESSION['error']['email']="Enter a valid Name";
    }

//phone
    if(empty($phone))
    {
        $_SESSION['error']['phone']="Name is required!!";
    }
    elseif(!preg_match($pattern,$phone))
    {
        $_SESSION['error']['phone']="Enter a valid Phone Number";
    }
//password
    if(empty($pass))
    {
        $_SESSION['error']['pass']="Password is required!!";
    }
    elseif(strlen($pass)<6)
    {
        $_SESSION['error']['pass']="Password must be at least 6 characters";
    }
//confirm password
    if($pass!==$cpass)
    {
        $_SESSION['error']['cpass']="Confirm password and Password must be same!!";
    }
//ID
    if(empty($id))
    {
        $_SESSION['error']['id']="ID is required!!";
    }
    elseif(!preg_match($p,$id))
    {
        $_SESSION['error']['id']="Invalid ID !!";
    }

    //checking email ,phone or id does exists or not
    else
    {
        $query = "select email,phone,uid from students where email='$email' or uid='$id' or phone='$phone'";
        $result = mysqli_query($link,$query);
        $data = mysqli_fetch_assoc($result);
        print_r($data);
        if($email==$data['email'])
        {
            $_SESSION['error']['email']="This Email is already been used";
        }
        if($phone==$data['phone'])
        {
            $_SESSION['error']['phone']="This Phone Number is already been used";
        }
        if($id==$data['uid'])
        {
            $_SESSION['error']['id']="This ID is already been used";
        }
    }

    ///Inserting Data in database Successfully:

    if(empty($_SESSION['error']))
    {
        $_SESSION['student']='1';

        $pass= md5($pass);
        $query = "INSERT INTO students
(name, email, pass, phone,status,insid,uid,program,batch,dept,house,road,area,city,pcode,village,post,district,ps,gname,gphone,grs) 
    values ('$name','$email','$pass','$phone','h','$insid','$id','$program','$batch','$dept','$house','$road','$area','$city',
    '$pcode','$village','$post','$district','$ps','$gname','$gphone','$grs')";
        mysqli_query($link,$query);
        header("location:student_login.php");
    }

    /// Registration failure:

    elseif(!empty($_SESSION['error']))
    {
        header("location:student_reg.php");
    }
}

