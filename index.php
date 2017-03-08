
<?php
include_once 'header.php';
include_once 'config/config.php';
$institute = getInstituteList();
?>

		<!-- Main Content -->
		<div class="content-wrapper">
			<!-- Hero Section -->
			<section class="section-hero">
				<!-- Main Slider -->
				<div class="hero-slider">
					<ul class="container custom-nav">
						<li class="prev">
							<i class="icon-arrowleft"></i>
						</li>
						<li class="next">
							<i class="icon-arrowright"></i>
						</li>
					</ul>
					<ul class="slides">
						<li class="slide">
							<div class="container">
								<div class="slide-content">
									<h1 class="heading slider-component">Build your future. Join us <a class="popup-holder" href="#">
										<span class="typed">Today</span>
										<span class="popup">
											<span class="title">Best Institutes</span>
											One Stop for your all your education related queries.
										</span>
									</a></h1>

									<a href="institutesGrid.php" class="slider-component second-row btn theme-btn-1">
										<span class="button">Browse Institutes</span>
									</a>
								</div>
							</div>
						</li>

						<li class="slide">
							<div class="container">
								<div class="slide-content">
									<h1 class="heading slider-component">Build your future. Join us <a class="popup-holder" href="#">
										<span class="typed">Today</span>
										<span class="popup">
											<span class="title">Best Teachers</span>
											One Stop for your all your education related queries.
										</span>
									</a></h1>

									<a href="teachersGrid.php" class="slider-component second-row btn theme-btn-1">
										<span class="button">Browse Teachers</span>
									</a>
								</div>
							</div>
						</li>

						<li class="slide">
							<div class="container">
								<div class="slide-content">
									<h1 class="heading slider-component">Build your future. Join us <a class="popup-holder" href="#">
										<span class="typed">Today</span>
										<span class="popup">
											<span class="title">Best Services</span>
											Manage your students marks and attendance with the help of godzeye.
										</span>
									</a></h1>

									<a href="view-marks-attendance.php" class="slider-component second-row btn theme-btn-1">
										<span class="button">View Marks &amp; Attendance</span>
									</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>

			<!-- Services Section -->
			<section class="section-services">
				<div class="container">
					<div class="section-header">
						<h1>Services</h1>
					</div>

					<div class="row">
						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-book-open"></i>
								<h4 class="title">INSTITUTES</h4>
								<p>Discover highly rated wide range of institutes near you.</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-gears"></i>
								<h4 class="title">HOME TUTORS</h4>
								<p>Effortlessly…..Now get Best Home Tutors at your door-step.</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-calendar"></i>
								<h4 class="title">STUDENTS</h4>
								<p>Sort-out any queries regarding your subjects in a flash.</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-flag"></i>
								<h4 class="title">PARENTS</h4>
								<p>Stay updated about your child’s performance and presence in a single click.</p>
							</div>
						</div>
					</div>

					<div class="services-description">
						<div class="row">
							<div class="col-md-6">
								<p class="highlighted-start">We at Godzeye religiously believe in the proverb 'Necessity is the Mother of Invention', which drove us to  visualize and create an extensive platform to radically transform the tutorial world. Our team has "been there" "Done that" and encountered the various challenges faced by students and parents starting from choosing the institute, enrollment and monitoring the performance. These crisis motivated us to develop "Godzeye", thus putting an end to all possible and recurrent difficulties faced during the entire process of assisted learning.</p>

								
							</div>

							<div class="col-md-6 col-lg-offset-1 col-lg-5">
								<div class="showcase-box">
									<div class="box-wrapper" data-parallax-bg="img/showcase-bg.jpg">
										<div class="box-img"><span></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Courses Section -->
			<section class="section-courses">
                <div class="projects">
                    <div class="container">
                        <div class="main-loader">
                            <div class="loader-front">
                                <img src="img/loader-front.png" alt="loader front" />
                            </div>
                        </div>
                        <div class="section-header"><h1>Popular Institutes</h1></div>
                        <div class="ajax-target">
                            <div class="row">
                                <!-- Grid View Starts -->
                                <?php
                                if (isset($institute) && !empty($institute)) {
                                    foreach ($institute as $key => $values) {
                                        ?>

                                        <div class="col-md-4 col-sm-6">
                                            <div class="single-course grid-course">
                                                <div class="course-thumbnail">
<!--
                                                        <div class="text">
                                                            <h4><?php echo $values['institute']; ?></h4>
                                                            <p><?php echo $values['description']; ?></p>
                                                        </div>
-->
                                                    <img src="<?php echo "admin/media/institution/" . $values['institute'] . "/" . $values['image']; ?>" alt="<?php echo $values['institute']; ?>" />
                                                </div>

                                                <div class="course-details">
                                                    <h3 class="title">
                                                        
                                                            <?php echo $values['institute']; ?>
                                                        
                                                    </h3>

                                                    <ul class="course-meta">
                                                        <li>
                                                            <span>Subjects :</span>
                                                            <span><?php echo $values['subjects']; ?></span>
                                                        </li>
                                                        <li>
                                                            <span>Contact :</span>
                                                            <span><?php echo $values['contact']; ?></span>
                                                        </li>
                                                    </ul>

                                                    <form id="institutesId" action="instituteDetail.php" method="post">
                                                        <input type="hidden" id="instituteId" name="instituteId" value="<?php echo $values['id']; ?>">
                                                        <div class="course-action">
                                                            <button type="submit" style="padding:17px 23px;background-color:white" class="button btn theme-btn-1">View Details</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <!-- Grid View Ends -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>

			<!-- Links Box -->
<!--
			<div class="links-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div class="links-box">
								<h3 class="caption">Technology</h3>

								<ul class="links">
									<li><a href="course.html">Straight A Fund</a></li>
									<li><a href="course.html">Financial Information Data</a></li>
									<li><a href="course.html">Performance Data</a></li>
									<li><a href="course.html">Race to the Top</a></li>
									<li><a href="course.html">School Safety Plans</a></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="links-box">
								<h3 class="caption">Culinary</h3>

								<ul class="links">
									<li><a href="course-online.html">Straight A Fund</a></li>
									<li><a href="course-online.html">Financial Information Data</a></li>
									<li><a href="course-online.html">Performance Data</a></li>
									<li><a href="course-online.html">Race to the Top</a></li>
									<li><a href="course-online.html">School Safety Plans</a></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="links-box">
								<h3 class="caption">Education</h3>

								<ul class="links">
									<li><a href="course-online.html">Straight A Fund</a></li>
									<li><a href="course-online.html">Financial Information Data</a></li>
									<li><a href="course-online.html">Performance Data</a></li>
									<li><a href="course-online.html">Race to the Top</a></li>
								</ul>
							</div>
						</div>

						<div class="col-sm-6 col-md-3">
							<div class="links-box">
								<h3 class="caption">Sports</h3>

								<ul class="links">
									<li><a href="course.html">Straight A Fund</a></li>
									<li><a href="course.html">Financial Information Data</a></li>
									<li><a href="course.html">Performance Data</a></li>
									<li><a href="course.html">Race to the Top</a></li>
									<li><a href="course.html">School Safety Plans</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
-->

			<!-- Call to Action Box -->
			<div class="call-to-action-box" data-parallax-bg="img/call-to-action-bg.jpg">
				<div class="box-img"><span></span></div>
				<div class="container">
					<div class="row">
						<div class="col-md-7">
							<h2>Join Godzeye Today</h2>
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
		<?php include_once 'footer.php'; ?>


	
