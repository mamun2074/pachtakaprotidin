<?php
include_once '../include/header.php';
include_once '../../vendor/autoload.php';
//use App\Admin\Home\Home;
//new Home();
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
                <h1>DONATION <span>STATICS</span></h1>
            </div>
            <div class="tabs-section">
                <div id="tab">
                    <ul>
                        <li><a href="#tabs-1">Total Donated</a></li>
                        <li><a href="#tabs-2">Today's Donated</a></li>
                        <li><a href="#tabs-3">Total Doner</a></li>
                    </ul>
                    <div id="tabs-1">
                        <div class="incremental-counter" data-value="100"><img src="assets/images/taka.png" alt=""></div>
                    </div>
                    <div id="tabs-2">
                        <div class="incremental-counter" data-value="100"><img src="assets/images/taka.png" alt=""></div>
                    </div>
                    <div id="tabs-3">
                        <div class="incremental-counter" data-value="10"><img src="assets/images/people.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

include_once '../include/footer.php';

?>