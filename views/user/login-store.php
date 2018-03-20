<?php
/**
 * Created by PhpStorm.
 * Skype:mamun2074
 * Date: 3/15/2018
 * Time: 4:43 PM
 */

//include_once '../../Src/Admin/User/User.php';

include_once '../../vendor/autoload.php';

use App\Admin\User\User;
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['login'] == "login") {

        if (empty($_POST['userName'])) {
            session_start();
            $_SESSION['loginUserEmptyField'] = "<p style='color: red;font-weight: bold;letter-spacing: 1px; margin-bottom: 5px;'>Give your user name</p>";
            header('location:login.php');
        } else {
            session_start();
            $_SESSION['userValue'] = $_POST['userName'];
        }
        if (empty($_POST['password'])) {
            session_start();
            $_SESSION['passwordEmpty'] = "<p style='color: red;font-weight: bold;letter-spacing: 1px;'>Give your password</p>";
            header('location:login.php');
        } else {

            $_SESSION['passwordValue'] = $_POST['password'];
        }

        if (!empty($_POST['userName']) and !empty($_POST['password'])) {

            $user->userLogin($_POST);
        }

    }
} else {
    header('location:login.php');
}


