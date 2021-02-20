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

    <div class="blank" style="height: 70px; width: 100%"></div>
    <div class="row">

        <div class="col-md-1">

        </div>
        <div class="col-md-8" >
            <h3><b><u>Profile:</u></h3>
            <?php if(isset($_SESSION['s_msg'])):?>
                <div class="alert alert-success">
                    <?=$_SESSION['s_msg'];?>
                </div>
            <?php endif; unset($_SESSION['s_msg'])?>
            <h4><b>Name : </b><?= $data['name']?></h4>
            <h4><b>Instructor ID : </b><?= $data['insid']?></h4>
            <h4><b>Phone : </b><?= $data['phone']?></h4>
            <h4><b>Email : </b><?= $data['email']?></h4>
            <h4><b>Address : </b><?= $data['address']?></h4>
            <h4><b>Position : </b><?= $data['position']?></h4>
            <h4><b>Educational Background : </b><?= $data['edu']?></h4>
            <a href="teacher_profile_edit.php">
                <button class="btn btn-primary">Edit</button>
            </a>
        </div>
    </div>
</div>
</body>
</html>