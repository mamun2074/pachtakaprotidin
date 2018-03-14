<?php
/**
 * Created by PhpStorm.
 * User: mahmud120520@gmail.com
 * skype:mamun2074
 * Date: 3/13/2018
 * Time: 3:45 PM
 */
include_once '../include/header.php';

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
                        <input name="firstName" id="firstName" type="text" placeholder="First Name *">
                        <input name="lastName" id="lastName" type="text" placeholder="Last Name *">
                    </div>
                    <label for="userName">User Name</label>
                    <input placeholder="User Name" id="userName" type="text" name="userName" >
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" placeholder="Email">
                    <label for="password">Password</label>
                    <input placeholder="Password" type="password" id="password" name="password">
                    <label for="confirmPassword">Confirm Password</label>
                    <input name="confirmPassword" id="confirmPassword" type="password" placeholder="Confirm Passwrod">
                    <input type="submit" value="Sign Up" name="SignUp">
                </form>
            </div>
        </div>
    </div>
</div>


<?php

include_once '../include/footer.php';

?>