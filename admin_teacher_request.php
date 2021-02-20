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

    if(!islogged() && $_SESSION['log_users']!='admin')
    {
        header('location:admin_login.php');
    }
    ?>
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div style="height: 120px" class="header">
    <?php
    include_once 'admin_nav.php';
    ?>
</div>
<div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-6">

        <table class="table">
            <thead>
            <tr>
                <?php
                $query="SELECT * from teachers WHERE status='h'";
                $result=mysqli_query($link,$query);
                $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=1;
                ?>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Instructor ID</th>
                <th scope="col">Options</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $data_items):
                ?>
                <tr>
                    <th scope="row"><?= $i++?></th>
                    <td><?= $data_items['name']?></td>
                    <td><?= $data_items['insid']?></td>
                    <td><a style="text-decoration: none" href="admin_teacher_accept.php?insid=<?= $data_items['insid']?>">
                            <button class="btn btn-primary">Accept</button>
                        </a>

                        <a style="text-decoration: none" href="admin_teacher_request_delete.php?insid=<?= $data_items['insid']?>">
                            <button onclick="return confirm('Are you sure?')" class="btn btn-warning">delete</button>
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