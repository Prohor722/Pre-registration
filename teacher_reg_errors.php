<?php

include_once 'laibery/session_start.php';
require_once "laibery/db.php";

$pattern="/^(088||\+088)?01[15-9]\d{8}$/";


$name= htmlentities($_POST['name'],ENT_QUOTES);
$email=  htmlentities($_POST['email'],ENT_QUOTES);
$phone=  htmlentities($_POST['phone'],ENT_QUOTES);
$pass=  htmlentities($_POST['pass'],ENT_QUOTES);
$cpass=  htmlentities($_POST['cpass'],ENT_QUOTES);
$id= htmlentities($_POST['id'],ENT_QUOTES);
$edu= htmlentities($_POST['edu'],ENT_QUOTES);
$position= htmlentities($_POST['position'],ENT_QUOTES);
$address= htmlentities($_POST['address'],ENT_QUOTES);

$phone= str_ireplace([' ','.',',','/'],'',$phone);

///Registration error checking:

if(!empty($_POST))
{
//address,position,edu background
    if(empty($address))
    {
        $_SESSION['error']['address']="This field is required!!";
    }
    if(empty($position))
    {
        $_SESSION['error']['position']="This field is required!!";
    }
    if(empty($edu))
    {
        $_SESSION['error']['edu']="This field is required!!";
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
    if(!empty($id) && !($id>='0' && $id<='99' ))
    {
        $_SESSION['error']['id']="invalid Instructor ID!!";
    }

    //checking email ,phone or id does exists or not
    else //if(empty($_SESSION['error']))
    {

        $query = "select email,phone,insid from teachers where email='$email' or insid='$id' or phone='$phone'";
        $result = mysqli_query($link,$query);
        $data = mysqli_fetch_assoc($result);

        if($email==$data['email'])
        {
            $_SESSION['error']['email']="This Email is already been used";
        }
        if($phone==$data['phone'])
        {
            $_SESSION['error']['phone']="This Phone Number is already been used";
        }
        if($id==$data['insid'])
        {
            $_SESSION['error']['id']="This ID is already been used";
        }
    }

    ///Inserting Data in database Successfully:

    if(empty($_SESSION['error']))
    {

        $pass= md5($pass);
        $query = "INSERT INTO teachers(name, email, pass, phone,insid,status,address,position,edu) 
                  values ('$name','$email','$pass','$phone','$id','h','$address','$position','$edu')";
        mysqli_query($link,$query);
        header("location:teacher_login.php");
    }

    /// Registration failure:

    elseif(!empty($_SESSION['error']))
    {
        header("location:teacher_reg.php");
    }
}

