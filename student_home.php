<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
    <?php
    include_once 'laibery/auth.php';
    include_once 'laibery/session_start.php';
    if(!islogged() && $_SESSION['log_users']!='student')
    {
        header('location:student_login.php');
    }
    ?>
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="width: 100%;height: 60px">
    <?php
    include_once 'student_nav.php';
    ?>
</div>

<div class="container">

    <div class="blank" style="height: 70px;width: 100%"></div>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <h1>Welcome <?= $_SESSION['user_info']['name']?></h1>
            <p>This is a Student user interface to monitor your information and request for
                 pre-registration.</p>
            <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['msg'];
                unset($_SESSION['msg']);?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>