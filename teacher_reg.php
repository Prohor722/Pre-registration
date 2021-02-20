<?php

require_once 'laibery/db.php';
include_once 'laibery/func.php';
require_once 'laibery/auth.php';
include 'laibery/session_start.php';

if(islogged())
{
    header("location:admin.php");
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet" ;>
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="height: 50px">
    <?php
    include 'nav.php';
    ?>
</div>
<h1 style="background-color: rgba(17,165,181,0.19)" align="center">Teacher Registration</h1>
<div class="container">
    <form action="teacher_reg_errors.php" method="post">

    <div class="row" style="margin-left: 24%; margin-top: 2%">

        <div class="col-md-4">
            <div class="form-group">
                <label >Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
                <?= er_msg('name');?>
            </div>
            <div class="form-group">
                <label >Instructor ID</label>
                <input type="text" class="form-control" name="id" placeholder="Enter ID if provided , Example:01">
                <?= er_msg('id');?>
            </div>
            <div class="form-group">
                <label >Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                <?= er_msg('phone');?>
            </div>
            <div class="form-group">
                <label >Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter Full Address">
                <?= er_msg('address');?>
            </div>

        </div>
        <div class="col-md-4">

                <div class="form-group">
                    <label >Position</label>
                    <input type="text" class="form-control" name="position" placeholder="Enter Your Post or position">
                    <?= er_msg('position');?>
                </div>
                <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                    <?= er_msg('email');?>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter password">
                    <?= er_msg('pass');?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" name="cpass" placeholder="Confirm password">
                    <?= er_msg('cpass');?>
                </div>
        </div>
    </div>
        <div class="form-group" style="margin-left: 25%; width: 49%">
            <label >Educational Background</label>
            <input type="text" class="form-control" name="edu" placeholder="Enter Educational Background">
            <?= er_msg('edu');?>
        </div>
        <button  style="margin-left: 58%" type="submit" class="btn btn-primary">Register</button>
        <a href="teacher_login.php">
            <button type="button" style="margin-left: 2%" class="btn btn-success">Login</button>
        </a>
    </form>
</div>

<?php
if(isset($_SESSION['error']))
{
    unset($_SESSION['error']);
}
?>
</body>
</html>