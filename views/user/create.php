<?php
/**
 * Created by PhpStorm.
 * User: mahmud120520@gmail.com
 * skype:mamun2074
 * Date: 3/13/2018
 * Time: 3:45 PM
 */
include_once '../include/header.php';

session_start();

if (!empty($_SESSION['firstName'])) {
    $firstName = $_SESSION['firstName'];
    unset($_SESSION['firstName']);
}

if (!empty($_SESSION['firstNameValue'])) {
    $firstNameValue = $_SESSION['firstNameValue'];
    unset($_SESSION['firstNameValue']);
}

if (!empty($_SESSION['lastName'])) {
    $lastName = $_SESSION['lastName'];
    unset($_SESSION['lastName']);
}

if (!empty($_SESSION['lastNameValue'])) {
    $lastNameValue = $_SESSION['lastNameValue'];
    unset($_SESSION['lastNameValue']);
}

if (!empty($_SESSION['userName'])) {
    $userName = $_SESSION['userName'];
    unset($_SESSION['userName']);
}

if (!empty($_SESSION['userError'])) {
    $userError = $_SESSION['userError'];
    unset($_SESSION['userError']);
}

if (!empty($_SESSION['userNameValoue'])) {
    $userNameValoue = $_SESSION['userNameValoue'];
    unset($_SESSION['userNameValoue']);
}


if (!empty($_SESSION['emailError'])) {
    $emailError=$_SESSION['emailError'];
    unset($_SESSION['emailError']);
}

if (!empty($_SESSION['email'])) {
    $email=$_SESSION['email'];
    unset($_SESSION['email']);
}
if (!empty($_SESSION['emailValoue'])) {
    $emailValoue = $_SESSION['emailValoue'];
    unset($_SESSION['emailValoue']);
}


if (!empty($_SESSION['password'])) {
    $password=$_SESSION['password'];
    unset($_SESSION['password']);
}
if (!empty($_SESSION['passwordValue'])) {
    $passwordValue = $_SESSION['passwordValue'];
    unset($_SESSION['passwordValue']);
}

if (!empty($_SESSION['passwordLength'])) {
    $passwordLength=$_SESSION['passwordLength'];
    unset($_SESSION['passwordLength']);
}

if (!empty($_SESSION['confirmPasswordError'])) {
    $confirmPasswordError=$_SESSION['confirmPasswordError'];
    unset($_SESSION['confirmPasswordError']);
}
if (!empty($_SESSION['confirmPasswordValue'])) {
    $confirmPasswordValue = $_SESSION['confirmPasswordValue'];
    unset($_SESSION['confirmPasswordValue']);
}

if (!empty($_SESSION['matchPasswordError'])) {
    $matchPasswordError=$_SESSION['matchPasswordError'];
    unset($_SESSION['matchPasswordError']);
}


?>

    <!--Banner area-->
    <div class="login-area">
        <div class="shado"></div>
        <div class="container">
            <div class="login-form">
                <div class="login-content">
                    <h4>Sign Up</h4>
                    <form action="store.php" method="post">
                        <div class="firstLastName">
                            <input name="firstName"
                                   value="<?php echo !empty($firstNameValue) ? $firstNameValue : '' ?>" id="firstName"
                                   type="text" placeholder="First Name *">
                            <input value="<?php echo !empty($lastNameValue) ? $lastNameValue : '' ?>" name="lastName"
                                   id="lastName" type="text" placeholder="Last Name *">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo !empty($firstName) ? "<p style='color: red;margin-bottom:5px; font-weight: bold;letter-spacing: 1px;'>" . $firstName . "</p>" : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <?php echo !empty($lastName) ? "<p style='color: red;margin-bottom:5px; font-weight: bold;letter-spacing: 1px;'>" . $lastName . "</p>" : ''; ?>
                            </div>

                        </div>

                        <label for="userName">User Name</label>
                        <input value="<?php echo !empty($userNameValoue) ? $userNameValoue : ''; ?>"
                               placeholder="User Name *" id="userName" type="text" name="userName">

                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                if (!empty($userName)) {
                                    ?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $userName; ?> </p>
                                <?php } elseif (!empty($userError)) {
                                    ?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $userError; ?> </p>
                                <?php } else {
                                    ?>

                                <?php } ?>

                            </div>
                        </div>

                        <label for="email">Email</label>
                        <input value="<?php echo !empty($emailValoue) ? $emailValoue : ''; ?>" name="email" id="email"
                               type="email" placeholder="Email *">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($emailError)){?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $emailError; ?> </p>
                                <?php }elseif(!empty($email)){?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $email; ?> </p>
                                <?php }else{?>

                                <?php } ?>
                            </div>
                        </div>

                        <label for="password">Password</label>
                        <input value="<?php echo !empty($passwordValue) ? $passwordValue : ''; ?>"
                               placeholder="Password *" type="password" id="password" name="password">

                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($password)){?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $password; ?> </p>
                                <?php }elseif(!empty($passwordLength)){ ?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $passwordLength; ?> </p>
                                <?php }else{?>

                                <?php } ?>
                            </div>
                        </div>

                        <label for="confirmPassword">Confirm Password</label>
                        <input value="<?php echo !empty($confirmPasswordValue) ? $confirmPasswordValue : ''; ?>"
                               name="confirmPassword" id="confirmPassword" type="password"
                               placeholder="Confirm Password *">

                        <div class="row">
                            <div class="col-md-12">
                                <?php if (!empty($confirmPasswordError)){?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $confirmPasswordError; ?> </p>
                                <?php }elseif(!empty($matchPasswordError)){ ?>
                                    <p style='color: red; margin-bottom:5px; font-weight: bold; letter-spacing: 1px;'> <?php echo $matchPasswordError; ?> </p>
                                <?php }else{?>

                                <?php } ?>
                            </div>
                        </div>

                        <input type="submit" value="Sign Up" name="SignUp">
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php

include_once '../include/footer.php';

?>