<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
    <?php
    include_once 'laibery/session_start.php';
    include_once 'laibery/db.php';
    include_once 'laibery/auth.php';
    if(!islogged() || $_SESSION['log_user']!='teacher')
    {
        header('location:teacher_login.php');
    }

    $insid=$_SESSION['user_info']['insid'];
    $query="SELECT * from teachers where insid='$insid'";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_assoc($result);
    ?>
</head>
<body style="background-color:#e6ffef">

<div class="container">

    <div class="header" style="height: 60px; width: 100%">
        <?php
        include_once 'teacher_nav.php';
        ?>
    </div>

    <h3 style="margin-top: 1%; margin-bottom: 2%; text-align: center"><b><u>Profile:</u></h3>
    <?php if(isset($_SESSION['error_msg'])):?>
        <div class="alert alert-danger">
            <?=$_SESSION['error_msg'];?>
        </div>
    <?php endif; unset($_SESSION['error_msg'])?>
    <form action="teacher_update_query.php" method="post">

    <div class="row">

        <div class="col-md-2">

        </div>
        <div class="col-md-4" >

                <div class="form-group">
                    <label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $data['name']?>" >
                </div>
                <div class="form-group">
                    <label">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $data['email']?>" >
                </div>
                <div class="form-group">
                    <label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?= $data['phone']?>" >
                </div>
                <div class="form-group">
                    <label">Instructor ID</label>
                    <input type="text" name="insid" class="form-control" value="<?= $data['insid']?>" readonly >
                </div>
                <div class="form-group">
                    <label">Position</label>
                    <input type="text" name="position" class="form-control" value="<?= $data['position']?>" >
                </div>
        </div>

        <div class="col-md-4" >

            <div class="form-group">
                <label">Address</label>
                <input type="text" name="address" class="form-control" value="<?= $data['address']?>" >
            </div>

            <div class="form-group">
                <label">Educational Background</label>
                <input type="text" name="edu" class="form-control" value="<?= $data['edu']?>" >
            </div>
            <div class="form-group">
                <label">Old Password</label>
                <input type="password" name="opass" class="form-control" placeholder="Needed to make any changes" >
            </div>
            <div class="form-group">
                <label">New Password</label>
                <input type="password" name="npass" class="form-control" placeholder="New Password" >
            </div>
            <div class="form-group">
                <label">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" placeholder="Re-write New Password" >
            </div>
            <button type="submit" style="margin-left: 84%" class="btn btn-primary">Save</button>
        </div>
    </div>

    </form>
</div>
</body>
</html>