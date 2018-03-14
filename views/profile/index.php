<?php

session_start();
if (!empty($_SESSION['check'])) {

    if ($_SESSION['check'] == 4) {
        $message = 1;
        session_unset();
    } elseif ($_SESSION['check'] == 2) {
        $message1 = 1;
        session_unset();
    }
}

if (!empty($_SESSION['days'])) {
    $already_days = $_SESSION['days'];
    session_unset();
}

//    header area
include_once '../include/header.php';
include_once '../../src/Admin/profile/profile.php';

$profile = new profile();
$singleUserValue = $profile->showingSingleUser(1);
$totalDonation = $profile->totalDonationSingleUser($singleUserValue['id']);

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
                <h2>Welcome to <span><?php echo $singleUserValue['firstName']; ?></span></h2>
                <form action="store.php" method="post">
                    <input name="days" type="text" id="mdp-demo" placeholder="Select for donation">
                    <!--                <div name="value"  class="calender" id="mdp-demo"></div>-->

                    <input type="hidden" name="id" value="<?php echo $singleUserValue['id']; ?>">
                    <input type="submit" value="Request for donation" name="submit">
                </form>
                <div class="profile-message">
                    <?php

                    echo (!empty($message)) ? "<p style='color: red;'>Please give your donation date</p>" : "";
                    echo (!empty($message1)) ? "<p style='color: green;'>Thank you for donation. Please wait for confirmation</p>" : "";

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
                                        <p>Your total donation : <span> <?php echo $totalDonation["SUM(`donation`)"]; ?>
                                                taka</span></p>

                                    <?php } else { ?>
                                        <p>Your balance is 0 . <span style="color:red">If you already donated please wait for approval</span></p>
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
                                        <p><input class="form-control" type="text" placeholder="Change your first Name">
                                        </p>
                                        <p><input class="form-control" type="text" placeholder="Change your Last Name">
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

    <!--Footer area -->
<?php
include_once '../include/footer.php';

?>