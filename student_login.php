<?php

require_once "laibery/func.php";
require_once "laibery/auth.php";
require_once "laibery/session_start.php";


if(islogged())
{
    header("location:admin.php");
}
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="height: 150px">
    <?php
    include 'nav.php';
    ?>
</div>

<h1 align="center">Student Login</h1>

<div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4">

        <form method="post" action="student_login_error.php"'>
        <div class="form-group">
            <label >ID</label>
            <input type="text" class="form-control" name="id" placeholder="Enter ID">
        </div>
        <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
        <button class="btn" style="background-color: #ffad00">
            <a href="student_reg.php" style="color: #ffffff; text-decoration: none">Register</a>
        </button>
        </form>
        <?= "<p style='color: rgba(226,50,25,0.98)'>".er_msg('login')."</p>" ?>
    </div>
</div>

<?php
if(isset($_SESSION['error']))
{
    unset($_SESSION['error']);
}
?>
</body>
</html>