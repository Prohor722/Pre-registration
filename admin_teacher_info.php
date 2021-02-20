<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teachers Profile</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
    <?php
    include_once 'laibery/session_start.php';
    include_once 'laibery/db.php';
    include_once 'laibery/auth.php';
    if(!islogged() || $_SESSION['log_user']!='admin')
    {
        header('location:admin_login.php');
    }


    $insid=$_GET['insid'];
    $query="SELECT * from teachers where insid='$insid'";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_assoc($result);
    ?>

</head>
<body style="background-color: #e6ffef">

<div class="header" style="height: 140px">
    <?php
    include_once 'admin_nav.php';
    ?>
</div>
<form action="admin_teacher_delete.php" method="post">

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" value="<?= $data['name']?>" readonly>
        </div>
        <div class="form-group">
            <label>Instructor ID</label>
            <input type="text" class="form-control" value="<?= $data['insid']?>" name="id" readonly>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" class="form-control" value="<?= $data['phone']?>" readonly>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" value="<?= $data['email']?>" readonly>
        </div>
    </div>
    <div class="col-md-3" >
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" value="<?= $data['address']?>" readonly>
        </div>
        <div class="form-group">
            <label>Position</label>
            <input type="text" class="form-control" value="<?= $data['position']?>" readonly>
        </div>
        <div class="form-group">
            <label>Educational Background</label>
            <textarea style="height: 40px" class="form-control" readonly><?= $data['edu']?></textarea>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="pass" placeholder="Enter Your Password ">
        </div>
        <button style="margin-left: 80%" type="submit" class="btn btn-warning">Delete</button>

    </div>
</div>

</form>
</body>
</html>