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
    if(!islogged() || $_SESSION['log_user']!='student')
    {
        header('location:student_login.php');
    }

    $id=$_SESSION['user_info']['uid'];
    $query="SELECT * from students where uid='$id'";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_assoc($result);
    ?>
</head>
<body style="background-color:#e6ffef">

<div class="container">

    <div class="header" style="height: 60px; width: 100%">
        <?php
        include_once 'student_nav.php';
        ?>
    </div>

        <h3 style="margin-top: 2%; margin-bottom: 1%; text-align: center"><b><u>Profile:</u></h3>

        <form action="student_update_query.php" method="post">

    <div class="row">

        <div class="col-md-4" >

                <div class="form-group">
                    <label">Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $data['name']?>" >
                </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label">ID</label>
                        <input type="text" name="uid" class="form-control" value="<?= $data['uid']?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label">Instructor ID</label>
                        <input type="text" name="insid" class="form-control" value="<?= $data['insid']?>" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="<?= $data['phone']?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label">Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $data['email']?>" >
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Guardian's Name</label>
                            <input type="text" name="gname" class="form-control" value="<?= $data['gname']?>" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label">Guardian's Phone</label>
                            <input type="text" name="gphone" class="form-control" value="<?= $data['gphone']?>" >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label">Relationship with Guardian</label>
                    <input type="text" name="grs" class="form-control" value="<?= $data['grs']?>" >
                </div>
        </div>   <!-- col 1 -->
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label">Program</label>
                        <input type="text" name="program" class="form-control" value="<?= $data['program']?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label">Batch</label>
                        <input type="text" name="batch" class="form-control" value="<?= $data['batch']?>" >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label">Department</label>
                        <input type="text" name="dept" class="form-control" value="<?= $data['dept']?>" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label">House</label>
                        <input type="text" name="house" class="form-control" value="<?= $data['house']?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label">Area</label>
                        <input type="text" name="area" class="form-control" value="<?= $data['area']?>" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label">Road</label>
                <input type="text" name="road" class="form-control" value="<?= $data['road']?>" >
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label">City</label>
                        <input type="text" name="city" class="form-control" value="<?= $data['city']?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label">Postal Code</label>
                        <input type="text" name="pcode" class="form-control" value="<?= $data['pcode']?>" >
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label">Password</label>
                <input type="password" name="opass" class="form-control" placeholder="Enter Password to make changes" >
            </div>

        </div>  <!-- col 2 -->
        <div class="col-md-4">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label">Village</label>
                        <input type="text" name="village" class="form-control" value="<?= $data['village']?>" >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label">District</label>
                        <input type="text" name="district" class="form-control" value="<?= $data['district']?>" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label">Post</label>
                <input type="text" name="post" class="form-control" value="<?= $data['post']?>" >
            </div>

            <div class="form-group">
                <label">PS</label>
                <input type="text" name="ps" class="form-control" value="<?= $data['ps']?>" >
            </div>
            <div class="form-group">
                <label">New Password</label>
                <input type="password" name="npass" class="form-control" placeholder="Enter New Password">
            </div>
            <div class="form-group">
                <label">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" placeholder="Re-write New Password">
            </div>
        </div>   <!-- col 3 -->

    </div>
            <?php if(isset($_SESSION['error_msg'])):?>
                <div class="alert alert-danger">
                    <?=$_SESSION['error_msg'];?>
                </div>
            <?php endif; unset($_SESSION['error_msg'])?>
            <button style="margin-left: 34.2%; width: 31.5%" type="submit" class="btn btn-primary">Edit</button>
        </form>

</div>
</body>
</html>