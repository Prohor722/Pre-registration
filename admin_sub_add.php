<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
    <?php
    include_once 'laibery/session_start.php';
    include_once 'laibery/db.php';
    include_once 'laibery/auth.php';
    if(!islogged() || $_SESSION['log_user']!='admin')
    {
        header('location:admin_login.php');
    }
    ?>
</head>
<body style="background-color:#e6ffef">

<div class="container">

    <div class="header" style="height: 60px;">
        <?php
        include_once 'admin_nav.php';
        ?>
    </div>

    <div class="blank" style="height: 40px;"></div>

    <div class="row">

        <div class="col-md-1">

        </div>
        <div class="col-md-4" >
            <h3><b><u>Add Subject :</u></h3>
            <form action="admin_sub_add_query.php" method="post">
                <div class="form-group">
                    <label">Code</label>
                    <input type="text" name="code" class="form-control"
                           placeholder="Enter Subject Code" >
                </div>
                <div class="form-group">
                    <label">Subject</label>
                    <input type="text" name="sub" class="form-control"
                           placeholder="Enter Subject Name">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Semester</label>
                            <input type="number" name="semester" class="form-control"
                                   placeholder="Semester No">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Credit</label>
                            <input type="text" name="credit" class="form-control"
                                   placeholder="Enter Credit No.">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" >
                </div>
                <?php if(isset($_SESSION['error_msg'])) : ?>
                    <div class="alert alert-danger"><?=$_SESSION['error_msg'];?></div>
                <?php endif;  unset($_SESSION['error_msg']);?>
                <button type="submit" class="btn btn-warning">Add</button>
            </form>
        </div>

    </div>

</div>
</body>
</html>