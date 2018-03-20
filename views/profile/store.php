<?php
//Only donation submit
//include_once '../../Src/Admin/Profile/Profile.php';
include_once '../../vendor/autoload.php';
use App\Admin\Profile\profile;
$profile = new profile();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['submit'] == "Request for donation" and (!empty($_POST['days']))) {

        $day = $_POST['days'];
        $id = $_POST['id'];
        $days = explode(",", $day);

        $flag = false;
        $alreayHavedays=array();
        foreach ($days as $findday) {
//            Finding date
            $value = $profile->searchDonationDate($id, $findday);
            if (!empty($value)) {
                $alreayHavedays[]=$findday;
                $flag = true;
            }
        }
        if ($flag==true){
            $alreayHavedays=implode(" , ",$alreayHavedays);
            session_start();
            $_SESSION['days'] = $alreayHavedays;
            header('Location: index.php');
        }

        if ($flag == false) {
            $total_donation = count($days) * 5;
            $check = $profile->singleUserDonation($id, $total_donation, $day);
            if (!empty($check)) {
                session_start();
                $_SESSION['thankYouDonationMessage'] = "<p style='color: green;'>Thank you for donation. Please wait for confirmation</p>";
                header('Location: index.php');

            } else {
                session_start();
                $_SESSION['check'] = 3;
                header('Location: index.php');
            }
        }

    } else {
        session_start();
        $_SESSION['donationDateError'] = "<p style='color: red;'>Please give your donation date</p>";
        header('Location: index.php');
    }

} else {
    header('Location: index.php');
}

