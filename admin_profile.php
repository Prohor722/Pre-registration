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
    if(!islogged() || $_SESSION['log_user']!='admin')
    {
        header('location:admin_login.php');
    }

    $query="SELECT * from admin";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_assoc($result);
    ?>
</head>
<body style="background-color:#e6ffef">

<div class="container">

    <div class="header" style="height: 60px; width: 100%">
        <?php
        include_once 'admin_nav.php';
        ?>
    </div>

    <div class="blank" style="height: 70px; width: 100%"></div>
    <form method="post" action="admin_profile_query.php">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h3><b><u>Profile:</u></h3>
                <div class="form-group">
                    <label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $data['name']?>" >
                </div>
                <div class="form-group">
                    <label">Email</label>
                    <input type="text" name="email" class="form-control" value="<?= $data['email']?>" >
                </div>
                <div class="form-group">
                    <label">New Password</label>
                    <input type="password" name="npass" class="form-control" placeholder="Enter New Password" >
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input type="password" name="opass" class="form-control" placeholder="Enter old Password to confirm">
                </div>
                <?php if(isset($_SESSION['error_msg'])) : ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error_msg']; ?>
                    </div>
                <?php endif; unset($_SESSION['error_msg']);?>
                <a href="teacher_profile_edit.php">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </a>
            </div>
        </div>
    </form>

</div>
</body>
</html>