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


?>

    <!--Banner area-->
    <div class="login-area">
        <div class="shado"></div>
        <div class="container">
            <div class="login-form">
                <div class="login-content">
                    <p>User Name &amp; Password does not match</p>
                    <h4>login Form</h4>
                    <form action="login-store.php" method="post">
                        <label for="userName">User Name</label>
                        <input placeholder="User Name" id="userName" type="text" name="userName">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                echo (!empty($loginUserEmptyField) ? $loginUserEmptyField:'' );
                                ?>
                            </div>
                        </div>
                        <label for="password">Password</label>
                        <input placeholder="Password" type="password" id="password" name="password">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo (!empty($passwordEmpty) ? $passwordEmpty:''); ?>
                            </div>
                        </div>
                        <input type="submit" value="login" name="login">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once '../include/footer.php' ?>