<?php
/**
 * Created by PhpStorm.
 * User: mahmud120520@gmail.com
 * skye:mamun2074
 * Date: 3/13/2018
 * Time: 3:38 PM
 */
include_once '../../src/Admin/User/User.php';
$users=new User();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['SignUp'] == "Sign Up") {
        $users->storeAllInformations($_POST);
        $users->storeSignupValuesInDatabase();
    }
}


