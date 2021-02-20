<?php

require_once 'laibery/db.php';
include_once 'laibery/func.php';
require_once 'laibery/auth.php';
include 'laibery/session_start.php';

if(islogged())
{
    header("location:admin.php");
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="height: 50px">
    <?php
    include 'nav.php';
    ?>
</div>
<h3 style="background-color: rgba(188,207,214,0.49)" align="center">Student Registration</h3>

?>

<div class="container">
    <form action="student_reg_errors.php" method="post">
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                <label >Student Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name"
                value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['name']; ?>">
                <?= er_msg('name');?>
                </div>
                <div class="form-group">
                <label >Program</label>
                <input type="text" class="form-control" name="program" placeholder="Ex: BSC/MSC"
                       value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['program']; ?>">
                <?= er_msg('program');?>
                </div>
                <div class="form-group">
                    <label >ID</label>
                    <input type="text" class="form-control" name="id" placeholder="Ex: UG02-41-16-046"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['id']; ?>">
                    <?= er_msg('id');?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Batch</label>
                            <input type="text" class="form-control" name="batch" placeholder="Ex: 41"
                                   value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['batch']; ?>">
                            <?= er_msg('batch');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Instructor ID</label>
                            <input type="text" class="form-control" required name="insid" placeholder="Must enter"
                                   value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['insid']; ?>">
                            <?= er_msg('insid');?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter phone number"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['phone']; ?>">
                    <?= er_msg('phone');?>
                </div>
                <div class="form-group">
                    <label >Department</label>
                    <input type="text" class="form-control" name="dept" placeholder="Ex: CSE"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['dept']; ?>">
                    <?= er_msg('dept');?>
                </div>
            </div>   <!--col 1-->


            <div class="col-md-4">
                <label style="margin-left: 9%">Mailing Address:</label>
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >House</label>
                                    <input type="text" class="form-control" name="house" placeholder="Enter House No."
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['house']; ?>">
                                    <?= er_msg('house');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Road</label>
                                    <input type="text" class="form-control" name="road" placeholder="Enter Road"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['road']; ?>">
                                    <?= er_msg('road');?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Area</label>
                                    <input type="text" class="form-control" name="area" placeholder="Enter Area Name"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['area']; ?>">
                                    <?= er_msg('house');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >City</label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter City Name"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['city']; ?>">
                                    <?= er_msg('road');?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Postal Code</label>
                            <input type="text" class="form-control" name="pcode" placeholder="Enter Postal Code"
                                   value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['pcode']; ?>">
                            <?= er_msg('pcode');?>
                        </div>
                    </div>  <!-- mailing col -->
                </div> <!-- mailing row -->

                <label style="margin-top: 2%;margin-left: 9%">Permanent Address:</label>
                <div class="row" style="margin-top: 2%">
                    <div class="col-md-1"></div>
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Village</label>
                                    <input type="text" class="form-control" name="village" placeholder="Enter Village"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['village']; ?>">
                                    <?= er_msg('village');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Post</label>
                                    <input type="text" class="form-control" name="post" placeholder="Enter Post"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['post']; ?>">
                                    <?= er_msg('road');?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >District</label>
                                    <input type="text" class="form-control" name="district" placeholder="Enter District"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['district']; ?>">
                                    <?= er_msg('district');?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >P.S</label>
                                    <input type="text" class="form-control" name="ps" placeholder="Enter P.S"
                                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['ps']; ?>">
                                    <?= er_msg('ps');?>
                                </div>
                            </div>
                        </div>
                    </div>  <!-- permanent col -->
                </div> <!-- permanent row -->

            </div> <!-- col 2 -->

            <div class="col-md-4">
                <div class="form-group">
                    <label >Guardian's Name</label>
                    <input type="text" class="form-control" name="gname" placeholder="Enter name"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['gname']; ?>">
                    <?= er_msg('gname');?>
                </div>
                <div class="form-group">
                    <label >Relationship with Guardian</label>
                    <input type="text" class="form-control" name="grs" placeholder="Ex: Father/Mother/Uncle"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['grs']; ?>">
                    <?= er_msg('grs');?>
                </div>
                <div class="form-group">
                    <label >Guardian's Phone Number</label>
                    <input type="text" class="form-control" name="gphone" placeholder="Enter phone number"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['gphone']; ?>">
                    <?= er_msg('gphone');?>
                </div>
                <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email"
                           value="<?php if(isset($_SESSION['val'])) echo $_SESSION['val']['email']; ?>">
                    <?= er_msg('email');?>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter password">
                    <?= er_msg('pass');?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" name="cpass" placeholder="Confirm password">
                    <?= er_msg('cpass');?>
                </div>
            </div> <!--col 3 -->
            <?php
                unset($_SESSION['val']);
            ?>
        </div> <!-- full row -->
        <button style=" margin-left: 84%" type="submit" class="btn btn-primary">Register</button>
        <a href="student_login.php">
            <button type="button" style=" margin-left: 1%" class="btn btn-success">Login</button>
        </a>
    </form>

</div>
<?php
if(isset($_SESSION['error']))
{
    unset($_SESSION['error']);
}
?>
</body>
</html>