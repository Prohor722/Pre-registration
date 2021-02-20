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
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query="SELECT * from subjects where id='$id'";
        $result=mysqli_query($link,$query);
        $data=mysqli_fetch_assoc($result);
    }
    ?>
</head>
<body style="background-color:#e6ffef">

<div class="container">

    <div class="header" style="height: 60px; width: 100%">
        <?php
        include_once 'admin_nav.php';
        ?>
    </div>

    <div class="blank" style="height: 40px; width: 100%"></div>

    <div class="row">

        <div class="col-md-1">

        </div>
        <div class="col-md-4" >
            <h3><b><u>Edit Subject :</u></h3>
            <form action="admin_sub_delete_query.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Code</label>
                            <input type="text" name="code" class="form-control"
                                   value="<?php if(isset($data['code'])) echo $data['code']?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">No.</label>
                            <input type="text" name="id" class="form-control"
                                   value="<?php if(isset($data['id'])) echo $data['id']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label">Subject</label>
                    <input type="text" name="sub" class="form-control"
                           value="<?php if(isset($data['sub'])) echo $data['sub']?>" readonly>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Semester</label>
                            <input type="text" name="semester" class="form-control"
                                   value="<?php if(isset($data['semester'])) echo $data['semester']?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Credit</label>
                            <input type="text" name="credit" class="form-control"
                                   value="<?php if(isset($data['credit'])) echo $data['credit']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label">Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" >
                </div>
                <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>

    </div>

</div>
</body>
</html>