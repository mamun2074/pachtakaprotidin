<?php
include_once '../include/header.php';
include_once '../../vendor/autoload.php';

use App\Admin\Doner\Doner;

$donerInfo = new Doner();
$donerInfos = $donerInfo->totalDoner();
$doners = count($donerInfos);
$donated = $donerInfo->totalDonated();
$todaysdonated = $donerInfo->todaysDonated();

$todasTotalDonatin = count($todaysdonated) * 5;

//echo "<pre>";
//print_r();
//die();

?>
    <!--Slider area-->
    <div class="slider-area">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="../assets/images/sl5.jpg" alt="Los Angeles" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Los Angeles</h3>
                            <p>LA is always so much fun!</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../assets/images/sl2.jpeg" alt="Chicago" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>Chicago</h3>
                            <p>Thank you, Chicago!</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../assets/images/sl3.jpeg" alt="New York" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="../assets/images/sl4.jpeg" alt="New York" style="width:100%;">
                        <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>We love the Big Apple!</p>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="donation-area">
        <div class="container">
            <div class="header-title">
                <h1>DONATION <span>statistics </span></h1>
            </div>
            <div class="tabs-section">
                <div id="tab">
                    <ul>
                        <li><a href="#tabs-1">Total Donated</a></li>
                        <li><a href="#tabs-2">Today's Donated</a></li>
                        <li><a href="#tabs-3">Total Doner</a></li>
                    </ul>
                    <div id="tabs-1">
                        <div class="incremental-counter" data-value="<?php echo $donated['SUM(`donation`)']; ?>"><img
                                    src="../assets/images/taka.png" alt=""></div>
                    </div>
                    <div id="tabs-2">
                        <div class="incremental-counter" data-value="<?php echo $todasTotalDonatin; ?>"><img
                                    src="../assets/images/taka.png" alt=""></div>
                    </div>
                    <div id="tabs-3">
                        <div class="incremental-counter" data-value="<?php echo $doners; ?>"><img
                                    src="../assets/images/people.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="donar-list">
        <div class="container">
            <div class="header-title">
                <h1>Doner <span>Information</span></h1>
            </div>

            <table id="donarInformation" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Joining Date</th>
                    <th>Total Donation</th>
                    <th>Profile Status</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>Md Al-Mahmud</td>
                    <td>mamun120520@gmail.com</td>
                    <td>Khilkhet Dhaka</td>
                    <td>02/03/2018</td>
                    <td> 1250</td>
                    <td class="bg-primary text-center">Active</td>
                </tr>
                <tr>
                    <td>Duke Costa</td>
                    <td>duke.costa@gmail.com</td>
                    <td>Kuril flyover</td>
                    <td>02/03/2018</td>
                    <td> 1250</td>
                    <td  class="bg-danger text-center">Inactive</td>
                </tr>


                </tbody>
            </table>

        </div>
    </div>


<?php

include_once '../include/footer.php';

?>