<?php

session_start();

if (!empty($_SESSION['curentUserId'])) {
    $userId = $_SESSION['curentUserId'];
}

include_once '../../Src/Admin/Profile/Profile.php';

use App\Admin\Profile\profile;

$profile = new Profile();

if (!empty($userId)) {

    if (!empty($_SESSION['donationDateError'])) {
        $donationDateError = $_SESSION['donationDateError'];
        unset($_SESSION['donationDateError']);
    }
    if (!empty($_SESSION['thankYouDonationMessage'])) {
        $thankYouDonationMessage = $_SESSION['thankYouDonationMessage'];
        unset($_SESSION['thankYouDonationMessage']);
    }


    if (!empty($_SESSION['days'])) {
        $already_days = $_SESSION['days'];
        unset($_SESSION['days']);
    }

    if (!empty($_SESSION['donationApproveMessageSuccess'])) {
        $donationApproveMessageSuccess = $_SESSION['donationApproveMessageSuccess'];
        unset($_SESSION['donationApproveMessageSuccess']);
    }
    if (!empty($_SESSION['donationApproveErrorMessageSuccess'])) {
        $donationApproveErrorMessageSuccess = $_SESSION['donationApproveErrorMessageSuccess'];
        unset($_SESSION['donationApproveErrorMessageSuccess']);
    }


//    header area
    include_once '../include/header.php';

//Valied user login


    $singleUserValue = $profile->showingSingleUser($userId);
    $totalDonation = $profile->totalDonationSingleUser($singleUserValue['id']);
    $admin = $singleUserValue['priority'];

//    echo "<pre>";
//    print_r($singleUserValue['id']);

    if (!empty($userId) and $admin == 1) {

        ?>
        <!--Profile Banner-->
        <div class="profile-banner-area">
            <div class="container profile-img-area">
                <div class="profile-img">
                    <img src="../assets/images/profile.jpeg" alt="">
                </div>
            </div>
        </div>
        <div class="profile-informaiton-area">
            <div class="container">
                <div class="profile-information">
                    <h2>Welcome to admin <span><?php echo $singleUserValue['firstName']; ?></span></h2>
                    <form action="store.php" method="post">
                        <input name="days" type="text" id="mdp-demo" placeholder="Select for donation">
                        <!--                <div name="value"  class="calender" id="mdp-demo"></div>-->

                        <input type="hidden" name="id" value="<?php echo $singleUserValue['id']; ?>">
                        <input type="submit" value="Request for donation" name="submit">
                    </form>
                    <div class="profile-message">
                        <?php

                        echo (!empty($donationDateError)) ? $donationDateError : "";
                        echo (!empty($thankYouDonationMessage)) ? $thankYouDonationMessage : "";
                        echo (!empty($donationApproveMessageSuccess)) ? $donationApproveMessageSuccess : "";

                        if (!empty($already_days)) {
                            echo "<p style='color: red'>This <span style='color: green'>" . $already_days . "</span> already you donated or wait for approval</p>";
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>

        <?php

        $unApproves = $profile->unApproveDoantion();
//    echo "<pre>";
//    print_r($unApproves);
//    die();





        if (!empty($unApproves)) {
            ?>

            <div class="approval-ara">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Please acknowldeg and approve donation </h1>
                        </div>

                    </div>
                    <!--  Start Table-->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Donation date</th>
                            <th>Donation ammount</th>
                            <th>Approve</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        foreach ($unApproves as $unApprove) {
                            ?>

                            <tr>
                                <td><?php echo $unApprove['userName']; ?></td>
                                <td><?php echo $unApprove['donation_date']; ?></td>
                                <td><?php echo $unApprove['donation']; ?></td>
                                <td>
                                    <form action="approve-store.php" method="post">
                                        <input type="hidden" name="donationId" value="<?php echo $unApprove['id'] ?>">
                                        <input type="hidden" name="doantionDate"
                                               value="<?php echo $unApprove['donation_date']; ?>">

                                        <input type="submit" value="Approve" class="btn btn-success">

                                    </form>
                                </td>

                            </tr>

                        <?php } ?>

                        </tbody>

                    </table>

                    <!-- End-->

                </div>
            </div>

        <?php } ?>

        <div class="profile-details-area">
            <div class="container">
                <div class="row">
                    <div class="profile-details col-xs-12 col-md-12 col-sm-12">
                        <h1> Profile Information </h1>
                        <!-- tabs -->
                        <div class="tabbable tabs-left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">General</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                <li><a href="#about" data-toggle="tab">About</a></li>
                                <li><a href="#comments" data-toggle="tab">Comments</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">

                                    <div class="profile-information">
                                        <h2>Your Personal information</h2>

                                        <?php if (!empty($totalDonation["SUM(`donation`)"])) { ?>
                                            <p>Your total donation :
                                                <span> <?php echo $totalDonation["SUM(`donation`)"]; ?>
                                                    taka</span></p>

                                        <?php } else { ?>
                                            <p>Your balance is 0 . <span style="color:red">If you already donated please wait for approval</span>
                                            </p>
                                        <?php } ?>


                                        <p>Full Name :
                                            <span><?php echo $singleUserValue['firstName'] . " " . $singleUserValue['lastName'] ?></span>
                                        </p>
                                        <p>User Name : <span><?php echo $singleUserValue['userName']; ?></span></p>
                                        <p>E-mail: <span><?php echo $singleUserValue['email']; ?></span></p>
                                    </div>

                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="profile-information">
                                        <h2>Change Your Personal Settings</h2>
                                        <form action="">
                                            <p><input class="form-control" type="text"
                                                      placeholder="Change your first Name">
                                            </p>
                                            <p><input class="form-control" type="text"
                                                      placeholder="Change your Last Name">
                                            </p>
                                            <p><input class="form-control" type="password"
                                                      placeholder="Change your password">
                                            </p>
                                            <p><input class="form-control" type="password"
                                                      placeholder="Retype your password">
                                            </p>
                                            <P><input type="submit" value="Update"></P>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about">
                                    <div class="profile-information">
                                        <h2>Write about yourself</h2>
                                        <form action="">
                                            <p><textarea name="textarea" class="form-control"
                                                         placeholder="Write something yourself"></textarea></p>
                                            <p><input type="submit" value="Submit"></p>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="comments">
                                    <div class="profile-information">
                                        <h2>Comments</h2>
                                        <form action="">
                                            <p><textarea name="textarea" class="form-control"
                                                         placeholder="Put your comments here"></textarea></p>
                                            <p><input type="submit" value="Send"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tabs -->
                    </div>
                </div>
            </div>
        </div>

        <!--    Normal user-->
        <?php

    } else {
        ?>
        <div class="profile-banner-area">
            <div class="container profile-img-area">
                <div class="profile-img">
                    <img src="../assets/images/profile.jpeg" alt="">
                </div>
            </div>
        </div>
        <div class="profile-informaiton-area">
            <div class="container">
                <div class="profile-information">
                    <h2>Welcome to <span><?php echo $singleUserValue['firstName']; ?></span></h2>
                    <form action="store.php" method="post">
                        <input name="days" type="text" id="mdp-demo" placeholder="Select for donation">
                        <!--                <div name="value"  class="calender" id="mdp-demo"></div>-->

                        <input type="hidden" name="id" value="<?php echo $singleUserValue['id']; ?>">
                        <input type="submit" value="Request for donation" name="submit">
                    </form>
                    <div class="profile-message">
                        <?php

                        echo (!empty($donationDateError)) ? $donationDateError : "";
                        echo (!empty($thankYouDonationMessage)) ? $thankYouDonationMessage : "";

                        if (!empty($already_days)) {
                            echo "<p style='color: red'>This <span style='color: green'>" . $already_days . "</span> already you donated or wait for approval</p>";
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="profile-details-area">
            <div class="container">
                <div class="row">
                    <div class="profile-details col-xs-12 col-md-12 col-sm-12">
                        <h1> Profile Information </h1>
                        <!-- tabs -->
                        <div class="tabbable tabs-left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">General</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                <li><a href="#about" data-toggle="tab">About</a></li>
                                <li><a href="#comments" data-toggle="tab">Comments</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">

                                    <div class="profile-information">
                                        <h2>Your Personal information</h2>

                                        <?php if (!empty($totalDonation["SUM(`donation`)"])) { ?>
                                            <p>Your total donation :
                                                <span> <?php echo $totalDonation["SUM(`donation`)"]; ?>
                                                    taka</span></p>

                                        <?php } else { ?>
                                            <p>Your balance is 0 . <span style="color:red">If you already donated please wait for approval</span>
                                            </p>
                                        <?php } ?>


                                        <p>Full Name :
                                            <span><?php echo $singleUserValue['firstName'] . " " . $singleUserValue['lastName'] ?></span>
                                        </p>
                                        <p>User Name : <span><?php echo $singleUserValue['userName']; ?></span></p>
                                        <p>E-mail: <span><?php echo $singleUserValue['email']; ?></span></p>
                                    </div>

                                </div>
                                <div class="tab-pane" id="settings">
                                    <div class="profile-information">
                                        <h2>Change Your Personal Settings</h2>
                                        <form action="">
                                            <p><input class="form-control" type="text"
                                                      placeholder="Change your first Name">
                                            </p>
                                            <p><input class="form-control" type="text"
                                                      placeholder="Change your Last Name">
                                            </p>
                                            <p><input class="form-control" type="password"
                                                      placeholder="Change your password">
                                            </p>
                                            <p><input class="form-control" type="password"
                                                      placeholder="Retype your password">
                                            </p>
                                            <P><input type="submit" value="Update"></P>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="about">
                                    <div class="profile-information">
                                        <h2>Write about yourself</h2>
                                        <form action="">
                                            <p><textarea name="textarea" class="form-control"
                                                         placeholder="Write something yourself"></textarea></p>
                                            <p><input type="submit" value="Submit"></p>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="comments">
                                    <div class="profile-information">
                                        <h2>Comments</h2>
                                        <form action="">
                                            <p><textarea name="textarea" class="form-control"
                                                         placeholder="Put your comments here"></textarea></p>
                                            <p><input type="submit" value="Send"></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /tabs -->
                    </div>
                </div>
            </div>
        </div>

        <?php


    }

    include_once '../include/footer.php';

} else {

    header('location:../user/login.php');

}

