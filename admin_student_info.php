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


    $id=$_GET['id'];
    $query="SELECT * from students where uid='$id'";
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
<div class="row" style="margin-left: 5%">
    <div class="col-md-4">
        <h4><b>Name : </b><?= $data['name']?></h4>
        <h4><b>ID : </b><?= $data['uid']?></h4>
        <h4><b>Instructor ID : </b><?= $data['insid']?></h4>
        <h4><b>Phone : </b><?= $data['phone']?></h4>
        <h4><b>Email : </b><?= $data['email']?></h4>
        <h4><b>Program : </b><?= $data['program']?></h4>
        <h4><b>Batch : </b><?= $data['batch']?></h4>
        <h4><b>Department : </b><?= $data['dept']?></h4>
    </div>
    <div class="col-md-3">
        <h4><b>House : </b><?= $data['house']?></h4>
        <h4><b>Area : </b><?= $data['area']?></h4>
        <h4><b>Road : </b><?= $data['road']?></h4>
        <h4><b>City : </b><?= $data['city']?></h4>
        <h4><b>Postal Code : </b><?= $data['pcode']?></h4>
        <h4><b>Village : </b><?= $data['village']?></h4>
        <h4><b>Post : </b><?= $data['post']?></h4>
        <h4><b>District : </b><?= $data['district']?></h4>
    </div>
    <div class="col-md-4" >
        <h4><b>P.S : </b><?= $data['ps']?></h4>
        <h4><b>Guardian Name : </b><?= $data['gname']?></h4>
        <h4><b>Relationship with Guardian : </b><?= $data['grs']?></h4>
        <h4><b>Guardian's Phone No : </b><?= $data['gphone']?></h4>

    </div>
</div>
</body>
</html>