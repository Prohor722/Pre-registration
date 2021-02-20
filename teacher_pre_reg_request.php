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

    if(!islogged() && $_SESSION['log_users']!='teacher')
    {
        header("location:teacher_login.php");
    }
    ?>
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div style="height: 120px" class="header">
    <?php
    include_once 'teacher_nav.php';
    ?>
</div>
<div class="row" style="width: 100%">

    <div class="col-md-2"></div>
    <div class="col-md-8">

        <table class="table">
            <thead>
            <tr>
                <?php
                $insid =$_SESSION['user_info']['insid'];
                $query="SELECT * from pre_reg WHERE insid='$insid' AND status='R' group by uid";
                $result=mysqli_query($link,$query);
                $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=1;
                ?>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">ID</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $data_items):
                ?>
                <tr>
                    <th scope="row"><?= $i++?></th>
                    <td><?= $data_items['stu_name']?></td>
                    <td><?= $data_items['uid']?></td>
                    <td><a style="text-decoration: none" href="teacher_pre_reg_info.php?id=<?= $data_items['uid']?>">
                            <button class="btn btn-primary">Check</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>