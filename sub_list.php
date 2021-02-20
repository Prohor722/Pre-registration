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
    include_once 'laibery/db.php';
    if(!islogged() && $_SESSION['log_users']!='student')
    {
        header('location:student_login.php');
    }
    ?>
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div style="height: 100px" class="header">
    <?php
    include_once 'student_nav.php';
    ?>
</div>
<div class="row">

    <div class="col-md-2"></div>
    <div class="col-md-8">

        <table class="table">
            <thead>
            <tr>
                <?php
                $query="SELECT * from subjects order by semester";
                $result=mysqli_query($link,$query);
                $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
                $i=1;
                ?>
                <th scope="col">No.</th>
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Credit</th>
                <th scope="col"></th>
                <th scope="col">Semester</th>
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
                    <td><?= $data_items['credit']?></td>
                    <td></td>
                    <td><?= $data_items['semester']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>