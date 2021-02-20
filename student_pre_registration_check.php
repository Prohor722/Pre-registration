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
    <h3 style="margin-top: 1%; margin-bottom:1%; text-align: center"><b><u>Pre-Registration:</u></h3>
    <form method="post" action="student_pre_reg_submit.php">
        <?php
        if(!empty($_POST))
        {
        if(empty($_POST['semester']) || empty($_POST['code']) || $_POST['semester'] < 0 || $_POST['semester'] > 12)
        {
            $_SESSION['error_msg'] = 'Please Check again !! Something is Wrong...';
            header('location:student_pre_reg.php');
        }
        else
        {
        $sem = $_POST['semester'];
        $_SESSION['sem']=$sem;
        $codes = $_POST['code'];
        $i = 0;
        $sum = 0;
        $s = $i;
        $c=0;
        for ($i = 9; $i >= 1; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if (!empty($codes[$i]) && !empty($codes[$j])) {
                    if ($codes[$i] == $codes[$j]) {
                        $codes[$i] = "";
                    }
                }
            }
        }
        foreach($codes as $code_number):
        foreach($data as $code){
        // print_r($code);
        // print_r($codes);
        if($code['code'] == $codes[$i]){

        ?>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Subject Code</label>
                    <input type="text" value="<?= $code['code'] ?>" name="sub[]" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="exampleInputPassword1">Subject Name</label>
                    <input type="text" value="<?= $code['sub'] ?>" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputPassword1">Credit</label>
                    <input type="text" value="<?php echo $code['credit'];
                    $sum = $code['credit'] + $sum; ?>" class="form-control" readonly>
                </div>
            </div>
        </div>     <!--row-->

        <?php }
                else
                    { $c++;}  //counting all subjects
        }  //end of for each for checking subjects
            if($c==72)  //checks all the subjects
            {
                $_SESSION['error_msg']='You have entered Wrong Subject Code !!';
                $c=0;
                header('location:student_pre_reg.php');
            }

        $i++; endforeach;
        } //end of else condition
        } //end of main if condition
            else
            {
                header('location:student_pre_reg.php');
            }
        ?>
        <div class="form-group" style="margin-left: 40%; height: 20px; margin-bottom: 100px; margin-top: 16px">
            <h5 style="display: inline">Semester No: <?= $sem?></h5>
            <h5 style="display: inline; margin-left: 13%">Total Credit : <?=$sum?></h5>
            <button style="margin-left: 18%" type="submit" class="btn btn-success">Submit</button>
        </div>
        <!--<h5 style="margin-left: 86%;">Total Credit : <?=$sum?></h5>
        <button style="margin-left: 90%" type="submit" class="btn btn-success">Submit</button> -->
    </form>
</div>
</body>
</html>