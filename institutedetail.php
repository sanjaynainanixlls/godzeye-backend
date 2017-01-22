<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Godzeye</title>
        <meta name="description" content="Here goes description" />
        <meta name="author" content="author name" />
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />

        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- Style CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
        <link rel="stylesheet" href="css/lightbox.css" />
        <link rel="stylesheet" href="css/icomoon.css" />
        <link rel="stylesheet" href="css/screen.css" />
    </head>
    <body data-smooth-scroll="on">
        <form class="global-search-form">
            <div class="container">
                <input type="text" name="search-input" class="search-input js-input" placeholder="Type here ..." />
            </div>
        </form>

        <!-- Page Wrapper -->
        <div id="page">
            <!-- Register Poup -->
            <div class="register-popup">
                <div class="popup-wrapper">
                    <span class="close-popup-btn icon-cross"></span>

                    <form id="register-form">
                        <div class="section-header">
                            <h1>Register</h1>
                        </div>

                        <label>
                            <span>First Name *</span>
                            <input type="text" class="js-input" name="register-first-name" />
                        </label>

                        <label>
                            <span>Last Name *</span>
                            <input type="text" class="js-input" name="register-last-name" />
                        </label>

                        <label>
                            <span>E-mail address *</span>
                            <input type="text" class="js-input" name="register-email" />
                        </label>

                        <label>
                            <span>Password *</span>
                            <input type="password" class="js-input" name="register-password" />
                        </label>

                        <label>
                            <span>Confirm Password *</span>
                            <input type="password" class="js-input" name="register-password" />
                        </label>

                        <div class="btn-wrapper">
                            <button class="btn theme-btn-3">Register</button>
                        </div>

                        <div class="section-header small">
                            <h1><span>or</span></h1>
                        </div>

                        <div class="social-buttons">
                            <a href="#" class="facebook">facebook</a>
                            <a href="#" class="google-plus">google+</a>
                        </div>

                        <p><a href="#" class="forgot-password">Forgot password?</a></p>
                        <p>Have an account already? <a href="#" class="login-btn">Login here</a></p>
                    </form>

                    <form id="login-form">
                        <div class="section-header">
                            <h1>Login</h1>
                        </div>

                        <label>
                            <span>E-mail address *</span>
                            <input type="text" class="js-input" name="login-email" />
                        </label>

                        <label>
                            <span>Password *</span>
                            <input type="password" class="js-input" name="login-password" />
                        </label>

                        <div class="btn-wrapper">
                            <button class="btn theme-btn-3">Login</button>
                        </div>

                        <div class="section-header small">
                            <h1><span>or</span></h1>
                        </div>

                        <div class="social-buttons">
                            <a href="#" class="facebook">facebook</a>
                            <a href="#" class="google-plus">google+</a>
                        </div>

                        <p><a href="#" class="forgot-password">Forgot password?</a></p>
                        <p>Don't have an account? <a href="#" class="register-btn">Register here</a></p>
                    </form>
                </div>
            </div>

            <!-- Header -->
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2">
                            <a class="brand" href="index.html">
                                <img src="img/identity.png" alt="identity" />
                            </a>
                        </div>

                        <div class="col-xs-8 col-sm-10">
                            <div class="action-bar">
                                <ul class="social-block">
                                    <li><a href="https://www.facebook.com/TeslaThemes"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/TeslaThemes"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.pinterest.com/teslathemes/"><i class="fa fa-pinterest"></i></a></li>
                                    <li><a href="https://dribbble.com/TeslaThemes/"><i class="fa fa-dribbble"></i></a></li>
                                </ul>

                                <span class="search-box-toggle no-select">
                                    <i class="icon fa fa-search"></i>
                                </span>

                                <span class="menu-toggle no-select">Menu
                                    <span class="hamburger">
                                        <span class="menui top-menu"></span>
                                        <span class="menui mid-menu"></span>
                                        <span class="menui bottom-menu"></span>
                                    </span>
                                </span>

                                <div class="shopping-cart">
                                    <span class="shopping-cart-toggle icon-carticon">
                                        <span class="cart-items-total">2</span>
                                    </span>

                                    <div class="cart">
                                        <ul>
                                            <li class="cart-course">
                                                <a href="#" class="remove-from-cart"><i class="icon-cross"></i></a>
                                                <a class="cover" href="course.html">
                                                    <img src="img/cart-course.jpg" alt="cart course cover" />
                                                </a>
                                                <p class="title">
                                                    <a href="course.html">Technology for kids</a>
                                                </p>
                                                <span class="price">$59</span>
                                            </li>

                                            <li class="cart-course">
                                                <a href="#" class="remove-from-cart"><i class="icon-cross"></i></a>
                                                <a class="cover" href="course.html">
                                                    <img src="img/cart-course-2.jpg" alt="cart course cover" />
                                                </a>
                                                <p class="title">
                                                    <a href="course.html">Best measurement course</a>
                                                </p>
                                                <span class="price">$39</span>
                                            </li>
                                        </ul>

                                        <div class="cart-action">
                                            <a href="cart.html" class="cart-btn">View cart</a>
                                        </div>
                                    </div>
                                </div>

                                <a class="my-account" href="myaccount.html"><span class="icon icon-MyAccount"></span><span class="popup">My account</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <nav>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>
                            <a href="courses-grid.html">Courses</a>
                            <ul>
                                <li><a href="courses-grid.html">Grid overlay</a></li>
                                <li><a href="courses-list.html">List overlay</a></li>
                                <li><a href="course-online.html">Online Course</a></li>
                                <li class="current-menu-item"><a href="course.html">Offline Course</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li><a href="members.html">Members</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="404.html">Error Page</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="myaccount.html">My Account</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                            <ul>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-sidebar.html">Blog with sidebar</a></li>
                                <li><a href="blogpost.html">Blog post</a></li>
                                <li><a href="blogpost-sidebar.html">Blog post with sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </header>

            <!-- Main Content -->
            <div class="content-wrapper">
                <!-- Hero Section -->
                <section class="section-hero">
                    <div class="hero-content courses-list">
                        <div class="container">
                            <h1 class="heading">Institute Name</h1>
                        </div>
                    </div>
                </section>

                <!-- Courses Section -->
                <section class="section-courses">
                    <div class="container">
                        <div class="single-course-page">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="main-content">
                                        <div class="course-cover">
                                            <img src="img/single-course-cover.jpg" alt="course cover" />
                                        </div>

                                        <div class="course-body">
                                            <h2>Institute Name</h2>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio.</p>

                                            <p>Maecenas sodales, nisl eget dignissim molestie, ligula est consectetur metus, et mollis justo urna sit amet nulla. Etiam lectus arcu, pellentesque eu tellus tempor, tristique ultrices leo. Nullam at felis mauris. Aenean in neque eu ligula tempor ornare. Mauris tristique in elit a blandit. Nam laoreet vulputate nisi eu accumsan. Sed faucibus arcu nec est facilisis dignissim. Fusce risus leo, euismod ut cursus vitae, imperdiet id quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce mollis mi vulputate leo vestibulum, quis scelerisque libero condimentum. Praesent rutrum consequat lacus quis suscipit. Proin dapibus mi non semper lobortis.</p>

                                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce mollis mi vulputate leo vestibulum, quis scelerisque libero condimentum. Praesent rutrum consequat lacus quis suscipit. Proin dapibus mi non semper lobortis.</p>

                                            <h2>Aenean in neque</h2>

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio.</p>

                                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio.</p>

                                            <h4>Subjects</h4>
                                            <ul class="course-description-list">
                                                <li class="lesson">
                                                    <div class="heading">
                                                        <span class="lesson-nr no-select">Maths</span>
                                                    </div>

                                                    <div class="body">

                                                    </div>

                                                    <ul class="lesson-description">
                                                        <li>

                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="lesson">
                                                    <div class="heading">
                                                        <span class="lesson-nr no-select">Chemistry</span>
                                                    </div>

                                                    <div class="body">
                                                    </div>

                                                    <ul class="lesson-description">

                                                    </ul>
                                                </li>

                                                <li class="lesson">
                                                    <div class="heading">
                                                        <span class="lesson-nr no-select">Biology</span>
                                                    </div>

                                                    <div class="body">
                                                    </div>

                                                    <ul class="lesson-description">
                                                    </ul>
                                                </li>

                                                <li class="lesson">
                                                    <div class="heading">
                                                        <span class="lesson-nr no-select">Physics</span>
                                                    </div>

                                                    <div class="body">
                                                    </div>
                                                </li>
                                            </ul>

                                            <div class="share-block">
                                                <div class="row row-fit-10">
                                                    <div class="col-xs-6 col-sm-3">
                                                        <a class="facebook" href="#">facebook</a>
                                                    </div>

                                                    <div class="col-xs-6 col-sm-3">
                                                        <a class="twitter" href="#">twitter</a>
                                                    </div>

                                                    <div class="col-xs-6 col-sm-3">
                                                        <a class="pinterest" href="#">pinterest</a>
                                                    </div>

                                                    <div class="col-xs-6 col-sm-3">
                                                        <a class="dribbble" href="#">dribbble</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="sidebar-description">
                                        <div class="location-box">
                                            <h3 class="box-title">Address</h3>

                                            <p><span>Dickenson street 37/2</span><br />Old Valyria, New Zealand</p>
                                            <div class="map" id="map-canvas"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="heading text-center" style="text-align:center"><strong>Teachers</strong></h1>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="team-member">
                                        <div class="photo">
                                            <a href="member.html">
                                                <img src="img/member-1.jpg" alt="member avatar" />
                                            </a>
                                        </div>

                                        <h4><a href="member.html">Zack Thoumb</a></h4>
                                        <p class="expertise-area">Specialization</p>

                                        <p class="member-info">Maecenas sed diam eget risus varius blandit sit amet non magna. Donec  nulla non metus auctor fringilla. Nulla non metus auctor fringilla.</p>

                                        <!-- <ul class="social-block">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul> -->
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="team-member">
                                        <div class="photo">
                                            <a href="member.html">
                                                <img src="img/member-1.jpg" alt="member avatar" />
                                            </a>
                                        </div>

                                        <h4><a href="member.html">Zack Thoumb</a></h4>
                                        <p class="expertise-area">Specialization</p>

                                        <p class="member-info">Maecenas sed diam eget risus varius blandit sit amet non magna. Donec  nulla non metus auctor fringilla. Nulla non metus auctor fringilla.</p>

                                        <!-- <ul class="social-block">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul> -->
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6">
                                    <div class="team-member">
                                        <div class="photo">
                                            <a href="member.html">
                                                <img src="img/member-1.jpg" alt="member avatar" />
                                            </a>
                                        </div>

                                        <h4><a href="member.html">Zack Thoumb</a></h4>
                                        <p class="expertise-area">Specialization</p>

                                        <p class="member-info">Maecenas sed diam eget risus varius blandit sit amet non magna. Donec  nulla non metus auctor fringilla. Nulla non metus auctor fringilla.</p>

                                        <!-- <ul class="social-block">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Call to Action Box -->
                <div class="call-to-action-box" data-parallax-bg="img/call-to-action-bg.jpg">
                    <div class="box-img"><span></span></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h2>Get all the information you need !</h2>
                            </div>

                            <div class="col-md-5">
                                <div class="button-wrapper">
                                    <a href="#" class="btn theme-btn-3">Get in touch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="fixed">
                <div class="container">
                    <div class="footer-wrapper">
                        <img src="img/director.png" alt="footer brand" class="footer-brand" />

                        <ul class="social-block">
                            <li><a href="https://twitter.com/TeslaThemes"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://dribbble.com/TeslaThemes/"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://www.facebook.com/TeslaThemes"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.pinterest.com/teslathemes/"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="https://www.facebook.com/TeslaThemes/photos_stream"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/grp/home?gid=5039596"><i class="fa fa-linkedin"></i></a></li>
                        </ul>

                        <div class="main-area">
                            <div class="menu">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="courses-grid.html">Courses</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li><a href="course.html">Single Course</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="footer-widget widget_info">
                                        <p><span>Godzeye</span><br /><br /></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-widget widget_contact">
                                        <p> Braavos Department of Education<br />877-644-6338 |<br /><a href="#">contact@courses.com</a></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="footer-widget widget_tagcloud">
                                        <div class="tagcloud">
                                            <a href="#">Education</a>
                                            <a href="#">Courses</a>
                                            <a href="#">Design</a>
                                            <a href="#">Health</a>
                                            <a href="#">Hospitality</a>
                                            <a href="#">Business</a>
                                            <a href="#">Instruction</a>
                                            <a href="#">Skills</a>
                                            <a href="#">Professor</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="copyrights">
                            <p>Copyright 2015. Designed by <a href="http://www.teslathemes.com" target="blank">TeslaThemes</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Scripts -->
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/lightbox.js"></script>
        <script src="js/velocity.js"></script>
        <script src="js/modernizr.js"></script>
        <script src="js/smooth-scroll.js"></script>
        <script src="js/bxslider.js"></script>
        <script src="js/options.js"></script>
    </body>
</html>
