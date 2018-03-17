<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PachTakaProtidin</title>

<!--    Table plugin cdn-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!--fonts -->
    <link href="https://fonts.googleapis.com/css?family=Khula|Roboto|Saira+Condensed" rel="stylesheet">

    <!--fontawesome-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Normalizer cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">
    <!--bootsrap cdn-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--jquery ui css-->
    <link rel="stylesheet" href="../assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.theme.min.css">

    <link rel="stylesheet" href="../assets/css/jquery-ui.multidatespicker.css">

    <!--    ui fornts-->
    <link rel="stylesheet" href="../assets/css/jquery-ui-1.12.icon-font.css">

    <!--Countdown css-->
    <link rel="stylesheet" href="../assets/css/jquery.incremental-counter.css">
    <!--main css-->
    <link rel="stylesheet" href="../assets/css/style.css">


</head>
<body>
<div class="menu-top">
    <div class="container">
        <div class="row">
            <div class="col-md-5 social">
                <ul class="text-left">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-md-7 accaunt ">
                <ul class="text-right">

                    <?php

                    if ($_SERVER['PHP_SELF'] == "/pachtakaprotidin/views/user/login.php") {
                        ?>

                        <li><a href="../user/login.php">Login</a></li>
                        <li><a href="../user/create.php">Sign Up</a></li>
                        <?php
                    } elseif ($_SERVER['PHP_SELF'] == "/pachtakaprotidin/views/user/create.php") {
                        ?>

                        <li><a href="../user/login.php">Login</a></li>
                        <li><a href="../user/create.php">Sign Up</a></li>

                        <?php
                    } else {

                        ?>

                        <li><a href="../profile/index.php">Profile</a></li>
                        <li><a href="../user/logout.php">Logout</a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-4 logo-area">
                <div class="logo">
                    <a href="index.html">Pach <Span>Taka</Span> Protidin</a>
                </div>
            </div>
            <div class="col-md-8 menu-area">
                <ul class="text-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>