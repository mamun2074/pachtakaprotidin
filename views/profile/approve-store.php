<?php
/**
 * Created by PhpStorm.
 * User: TRY-BPO
 * Date: 3/19/2018
 * Time: 12:44 PM
 */
require_once '../../vendor/autoload.php';

use App\Admin\Profile\profile;
$objForProfile=new profile();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $result= $objForProfile->changeDonationStatus($_POST);
   if (!empty($result)){
       session_start();
       $_SESSION['donationApproveMessageSuccess']="<p style='color: green;'> Successfuly Approved </p>";
       header('location:index.php');

   }else{
       session_start();
       $_SESSION['donationApproveErrorMessageSuccess']="<p style='color: red;'>Something went wrong</p>";
       header('location:index.php');
   }
}else{
    header('location:../user/login.php');
}





