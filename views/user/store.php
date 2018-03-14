<?php
/**
 * Created by PhpStorm.
 * User: mahmud120520@gmail.com
 * skye:mamun2074
 * Date: 3/13/2018
 * Time: 3:38 PM
 */

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['SignUp'] == "Sign Up") {
        include_once '../../src/Admin/User/User.php';

        $users=new User();

        $users->storeAllInformations($_POST);
        echo $users->getFirstName();


    }
}
