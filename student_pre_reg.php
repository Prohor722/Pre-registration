<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
    $query="SELECT * from subjects";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    ?>
</head>
<body style="background-color:#e6ffef">

<div class="container">

    <div class="header" style="height: 60px; width: 100%">
        <?php
        include_once 'student_nav.php';
        ?>
    </div>
    <?php if(isset($_SESSION['error_msg'])): ?>
        <div class="alert alert-warning">
            <?php echo $_SESSION['error_msg'];
            unset($_SESSION['error_msg']);?>
        </div>
    <?php endif; ?>
    <h3 style="margin-bottom:1%; text-align: center"><b><u>Pre-Registration:</u></h3>
            <form action="student_pre_registration_check.php" method="post">
    <div class="row">
        <div class="col-md-6" style="padding-left: 20%;padding-right: 5%; padding-bottom: 0%">
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
        </div> <!--left col-->


        <div class="col-md-6" style="padding-left: 2%;padding-right: 20%; padding-bottom: 0%">
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
            <div class="form-group">
                <label>Subject Code</label>
                <input type="text" class="form-control" name="code[]" placeholder="Enter Subject Code">
            </div>
        </div> <!--right col-->
                <div class="form-group" style="margin-left: 52%">
                    <label>Semester No.</label>
                    <input type="number" class="form-control" name="semester" placeholder="Ex: 1/2/3">
                </div>

                <button type="submit" style="margin-left: 2%; height: 10%; margin-top: 2.7%" class="btn btn-primary">Check</button>
    </div>        <!--right col-->

            </form>
</div>
</body>
</html>