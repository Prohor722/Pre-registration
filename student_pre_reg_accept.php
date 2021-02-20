<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
    <?php
    include_once 'laibery/session_start.php';
    include_once 'laibery/auth.php';
    include_once 'laibery/db.php';

    if(!islogged() && $_SESSION['log_users']!='student')
    {
        header("location:student_login.php");
    }
    ?>
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div style="height: 120px" class="header">
    <?php
    include_once 'student_nav.php';
    ?>
</div>

    <?php

    $uid= $_SESSION['suid'];
    $uid =$_SESSION['user_info']['uid'];
    $query="SELECT * from pre_reg WHERE uid='$uid' AND status='A'";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $i=1;
    $s=0;
    ?>

<div class="row" style="width: 100%">

    <div class="col-md-2"></div>
    <div class="col-md-8">

        <table class="table">
            <thead>
            <tr class="table-success">

                <th scope="col">No.</th>
                <th scope="col">Code</th>
                <th scope="col">Subject</th>
                <th scope="col">Semester No.</th>
                <th scope="col">Credit</th>
                <td></td> <td></td>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($data as $data_items):
                ?>
                <tr>
                    <th scope="row"><?= $i++?></th>
                    <td><?= $data_items['code']?></td>
                    <td><?= $data_items['sub']?></td>
                    <td><?= $data_items['semester']?></td>
                    <td><?php $s=$s+$data_items['credit']; echo $data_items['credit']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <h5 style="margin:20px 0% 10% 60%">Total Credit Completed : <b><?= $s; ?></b></h5>
    </div>
</div>


</body>
</html>