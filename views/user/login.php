<?php include_once '../include/header.php';

session_start();
if (!empty($_SESSION['loginUserEmptyField'])){
    $loginUserEmptyField=$_SESSION['loginUserEmptyField'];
    unset($_SESSION['loginUserEmptyField']);
}
if (!empty($_SESSION['passwordEmpty'])){
    $passwordEmpty=$_SESSION['passwordEmpty'];
    unset($_SESSION['passwordEmpty']);
}

if (!empty($_SESSION['userValue'])){
    $userValue=$_SESSION['userValue'];
    unset($_SESSION['userValue']);
}

if (!empty($_SESSION['passwordValue'])){
    $passwordValueValue=$_SESSION['passwordValue'];
    unset($_SESSION['passwordValue']);
}

if (!empty($_SESSION['invalidUser'])){
    $invalidUser=$_SESSION['invalidUser'];
    unset($_SESSION['invalidUser']);
}
if (!empty($_SESSION['thankYou'])){
    $thankYou=$_SESSION['thankYou'];
    unset($_SESSION['thankYou']);
}

?>

    <!--Banner area-->
    <div class="login-area">
        <div class="shado"></div>
        <div class="container">
            <div class="login-form">
                <div class="login-content">
                    <?php echo (!empty($invalidUser) ? $invalidUser: ''); ?>
                    <?php echo (!empty($thankYou) ? $thankYou: ''); ?>
                    <h4>login Form</h4>
                    <form action="login-store.php" method="post">
                        <label for="userName">User Name</label>
                        <input value="<?php echo (!empty($userValue) ? $userValue:''); ?>" placeholder="User Name" id="userName" type="text" name="userName">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                echo (!empty($loginUserEmptyField) ? $loginUserEmptyField:'' );
                                ?>
                            </div>
                        </div>
                        <label for="password">Password</label>
                        <input value="<?php echo (!empty($passwordValueValue) ? $passwordValueValue:''); ?>" placeholder="Password" type="password" id="password" name="password">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo (!empty($passwordEmpty) ? $passwordEmpty:''); ?>
                            </div>
                        </div>
                        <input type="submit" value="login" name="login">
                    </form>
                    <p style="color: black; margin-top:10px;">If you have no account <a style="color: white; margin-left:2px;" href="create.php">create </a></p>
                </div>
            </div>
        </div>
    </div>
<?php include_once '../include/footer.php' ?>