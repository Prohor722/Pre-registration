<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="laibery/bootstrap.min.css" rel="stylesheet">
    <link href="laibery/nav.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top" >
    <a href="student_home.php"><img src="img/s.jpg" class="brand-image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div style="height: 50px;width: 40px"></div>     <!--to make some space between logo and menu options-->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" >
                <a class="nav-link" id="item" href="student_profile.php">Profile<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="item" href="sub_list.php">Subject List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="item" href="student_pre_reg.php">Pre-registration submit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="item" href="student_pre_reg_accept.php">Submissions</a>
            </li>

        </ul>

        <a href="logout.php" id="user" class="nav-link">Log Out</a>
    </div>
</nav>
</body>


</html>