<?php
/**
 * Created by PhpStorm.
 * skype:mamun2074
 * Date: 3/16/2018
 * Time: 1:20 PM
 */


include_once '../../Src/Admin/User/User.php';

use App\Admin\User\User;

$user = new User();
$user->userLogout();

echo "helo world";