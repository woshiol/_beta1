<!DOCTYPE HTML>
<html>

<body>
	    
<?php include_once("_header.php"); ?>
       

        <!-- TOP AREA -->
        <div class="top-area show-onload">
            <div class="bg-holder full">
                <div class="bg-front full-height bg-front-mob-rel">
                    <div class="container full-height">
                        <div class="rel full-height">
                            <div class="tagline visible-lg" id="tagline"><span>It's time to</span>
                                <ul>
                                    <li>live</li>
                                    <li>have fun</li>
                                    <li>relax</li>
                                    <li>meet</li>
                                    <li>being lost</li>
                                    <li>run away</li>
                                    <li>go</li>
                                    <li>explore</li>
                                    <li>find new friends</li>
                                    <li class="active">discover</li>
                                    <li>play</li>
                                </ul>
                            </div>
                            <div class="search-tabs search-tabs-bg search-tabs-bottom mb50">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-plane"></i> <span >Club</span></a>
                                        </li>
                                        <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-bolt"></i> <span >Prime</span></a>
                                        </li>
                                        <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-home"></i> <span >Homestay</span></a>
                                        </li>
                                        <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-building-o"></i> <span >Magazine</span></a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-1">
                                            <h2>Search for Activities</h2>
                                            <form>
                                                <div class="tabbable">
                                                    <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                                        <li class="active"><a href="#flight-search-1" data-toggle="tab">Columbia University</a>
                                                        </li>
                                                        <li><a href="#club-search" data-toggle="tab">New York University</a>
                                                        </li>
                                                        <li><a href="#club-search" data-toggle="tab">State University of New York</a>
                                                        </li>
                                                        <li><a href="#club-search" data-toggle="tab">University of Georgia</a>
                                                        </li>
                                                        <li><a href="#club-search" data-toggle="tab">University of Illinois</a>
                                                        </li>
                                                        <li><a href="#club-search" data-toggle="tab">University of Rochester</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="tab">More...</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="club-search">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-search input-icon input-icon-tada"></i>
                                                                                <label>Search</label>
                                                                                <input class="typeahead form-control" placeholder="Search event titles and descriptions" type="text" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>From</label>
                                                                                    <input class="form-control" name="start" type="text" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>To</label>
                                                                                    <input class="form-control" name="end" type="text" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group form-group-lg form-group-select-plus">
                                                                                    <label>Meal Option</label>
                                                                                    <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                                                                        <label class="btn btn-primary active">
                                                                                            <input type="radio" name="options" />N</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />S</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />M</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />?</label>
                                                                                    </div>
                                                                                    <select class="form-control hidden">
                                                                                        <option>N = No Meal</option>
                                                                                        <option>S = Snack</option>
                                                                                        <option>M = Meal</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-lg" type="submit">Search for Club Activities</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="tab-2">
                                            <h2>Search for Odyssey Events at Your School</h2>
                                            <form>
                                                <div class="tabbable">
                                                    <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                                        <li class="active"><a href="#flight-search-1" data-toggle="tab">University of Rochester</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="tab">More...</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="club-search">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-search input-icon input-icon-tada"></i>
                                                                                <label>Search</label>
                                                                                <input class="typeahead form-control" placeholder="Search event titles and descriptions" type="text" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>From</label>
                                                                                    <input class="form-control" name="start" type="text" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>To</label>
                                                                                    <input class="form-control" name="end" type="text" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group form-group-lg form-group-select-plus">
                                                                                    <label>Meal Option</label>
                                                                                    <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                                                                        <label class="btn btn-primary active">
                                                                                            <input type="radio" name="options" />N</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />S</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />M</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />?</label>
                                                                                    </div>
                                                                                    <select class="form-control hidden">
                                                                                        <option>N = No Meal</option>
                                                                                        <option>S = Snack</option>
                                                                                        <option>M = Meal</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-lg" type="submit">Search for Club Activities</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3">
                                            <h2>Search for Odyssey Events at Your School</h2>
                                            <form>
                                                <div class="tabbable">
                                                    <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                                        <li class="active"><a href="#flight-search-1" data-toggle="tab">University of Rochester</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="tab">More...</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="club-search">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-search input-icon input-icon-tada"></i>
                                                                                <label>Search</label>
                                                                                <input class="typeahead form-control" placeholder="Search event titles and descriptions" type="text" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>From</label>
                                                                                    <input class="form-control" name="start" type="text" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>To</label>
                                                                                    <input class="form-control" name="end" type="text" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group form-group-lg form-group-select-plus">
                                                                                    <label>Meal Option</label>
                                                                                    <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                                                                        <label class="btn btn-primary active">
                                                                                            <input type="radio" name="options" />N</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />S</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />M</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />?</label>
                                                                                    </div>
                                                                                    <select class="form-control hidden">
                                                                                        <option>N = No Meal</option>
                                                                                        <option>S = Snack</option>
                                                                                        <option>M = Meal</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-lg" type="submit">Search for Club Activities</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="tab-4">
                                            <h2>Search for Odyssey Events at Your School</h2>
                                            <form>
                                                <div class="tabbable">
                                                    <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                                        <li class="active"><a href="#flight-search-1" data-toggle="tab">University of Rochester</a>
                                                        </li>
                                                        <li><a href="#" data-toggle="tab">More...</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="club-search">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-search input-icon input-icon-tada"></i>
                                                                                <label>Search</label>
                                                                                <input class="typeahead form-control" placeholder="Search event titles and descriptions" type="text" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>From</label>
                                                                                    <input class="form-control" name="start" type="text" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>To</label>
                                                                                    <input class="form-control" name="end" type="text" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group form-group-lg form-group-select-plus">
                                                                                    <label>Meal Option</label>
                                                                                    <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                                                                        <label class="btn btn-primary active">
                                                                                            <input type="radio" name="options" />N</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />S</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />M</label>
                                                                                        <label class="btn btn-primary">
                                                                                            <input type="radio" name="options" />?</label>
                                                                                    </div>
                                                                                    <select class="form-control hidden">
                                                                                        <option>N = No Meal</option>
                                                                                        <option>S = Snack</option>
                                                                                        <option>M = Meal</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-lg" type="submit">Search for Club Activities</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-slider owl-carousel-area visible-lg" id="owl-carousel-slider" data-nav="false">
                    <div class="bg-holder full">
                        <div class="bg-mask"></div>
                        <div class="bg-img" style="background-image:url(img/background-starrysky.jpg);"></div>
                    </div>
                    <div class="bg-holder full">
                        <div class="bg-mask"></div>
                        <div class="bg-img" style="background-image:url(img/background-people.jpg);"></div>
                    </div>
                    <div class="bg-holder full">
                        <div class="bg-mask"></div>
                        <div class="bg-img" style="background-image:url(img/background-nyc.jpg);"></div>
                    </div>
                </div>
                <div class="bg-img hidden-lg" style="background-image:url(img/background-starrysky.jpg);"></div>
                <div class="bg-mask hidden-lg"></div>
            </div>
        </div>
        <!-- END TOP AREA  -->

        <div class="gap"></div>


        <div class="container">
            <div class="row row-wrap" data-gutter="60">
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header"><i class="fa fa-briefcase box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="#">First Cultural Tutoring Agency</a></h5>
                            <p class="thumb-desc">We have introduced the concept of "cultural tutoring" to the world in 2011. Since 2013, we've started helping international students in the U.S. to better adapt themselves to the campus environment.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header"><i class="fa fa-thumbs-o-up box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="#">Guaranteed Customer Satisfaction</a></h5>
                            <p class="thumb-desc">Our services have been highly praised by our customers. Most of them have referred us to their friends. That's the reason why we've been able to expand to six campuses within one year.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumb">
                        <header class="thumb-header"><i class="fa fa-lock box-icon-md round box-icon-black animate-icon-top-to-bottom"></i>
                        </header>
                        <div class="thumb-caption">
                            <h5 class="thumb-title"><a class="text-darken" href="#">Trust & Safety</a></h5>
                            <p class="thumb-desc">We provide the legal framework that protects your class quality. You only need to pay when you are satisfied with our service.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>
        <div class="bg-holder">
            <div class="bg-mask"></div>
            <div class="bg-parallax" style="background-image:url(img/backgroud-statue.jpg);"></div>
            <div class="bg-content">
                <div class="container">
                    <div class="gap gap-big text-center text-white">
                        <h2 class="text-uc mb20">Our Previous Customer Says:</h2>
                        <ul class="icon-list list-inline-block mb0 last-minute-rating">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                        <h5 class="last-minute-title">Coming to OdysseyLife turns out to be the best decision in my life.</h5>
                        <p class="last-minute-date">-- Lily Zhang</p>
                        <p class="mb20"><b>Sailor at OdysseyLife University of Rochester</p><a class="btn btn-lg btn-white btn-ghost" href="#">Become a Sailor Now <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="gap"></div>
            <h2 class="text-center">More Information About Us</h2>
            <div class="gap">
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="http://www.rochester.edu/thebuzz/2014/06/skys-the-limit-with-odysseylife/">
                                    <img src="img/logo-buzz.jpg" alt="Image Alternative text"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">The Sky's the Limit with OdysseyLife</h4>
                                <p class="thumb-desc">Scelerisque montes class curabitur class aenean aliquam eu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="https://www.linkedin.com/company/3343225">
                                    <img src="img/logo-linkedin.jpg" alt="Image Alternative text"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">LinkedIn</h4>
                                <p class="thumb-desc">Connect with us, professionally.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="img/logo-weibo.jpg" alt="Image Alternative text"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">Weibo</h4>
                                <p class="thumb-desc">Hear about what we gotta say about U.S.-China cultural differences.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="img/logo-wechat.jpg" alt="Image Alternative text"/><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                </a>
                            </header>
                            <div class="thumb-caption">
                                <h4 class="thumb-title">WeChat</h4>
                                <p class="thumb-desc">Get updated with us right in your pocket.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>




<?php include_once ("_footer.php"); ?>




        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/slimmenu.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-timepicker.js"></script>
        <script src="js/nicescroll.js"></script>
        <script src="js/dropit.js"></script>
        <script src="js/ionrangeslider.js"></script>
        <script src="js/icheck.js"></script>
        <script src="js/fotorama.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script src="js/typeahead.js"></script>
        <script src="js/card-payment.js"></script>
        <script src="js/magnific.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/tweet.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/gridrotator.js"></script>
        <script src="js/custom.js"></script>
    </div>
</body>

</html>


