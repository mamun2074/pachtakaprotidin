<?php
/**
 * Created by PhpStorm.
 * Skype:mamun2074
 * Date: 3/15/2018
 * Time: 4:43 PM
 */

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['login'] == "login") {

        if (empty($_POST['userName'])) {
            session_start();
            $_SESSION['loginUserEmptyField'] = "<p style='color: red;font-weight: bold;letter-spacing: 1px; margin-bottom: 5px;'>Give your user name</p>";
            header('location:login.php');
        }
        if (empty($_POST['password'])) {
            session_start();
            $_SESSION['passwordEmpty'] = "<p style='color: red;font-weight: bold;letter-spacing: 1px;'>Give your password</p>";
            header('location:login.php');
        }

        if (!empty($_POST['userName']) and !empty($_POST['password'])) {

            include_once '../../src/Admin/User/User.php';
            $user = new User();
//            $user->userLogin($_POST);
        }


    }
} else {
    header('location:login.php');
}


