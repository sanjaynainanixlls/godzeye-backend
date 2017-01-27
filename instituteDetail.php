<?php
session_start();
include_once 'config/config.php';
$instituteData = getInstituteData($_POST['instituteId']);
$teacherData = getTeacherData($_POST['instituteId'],'');
$insName = explode(",", $instituteData[0]['subjects']);
include_once 'header.php';
?>

            <!-- Main Content -->
            <div class="content-wrapper">
                <!-- Hero Section -->
                <section class="section-hero">
                    <div class="hero-content courses-list">
                        <div class="container">
                            <h1 class="heading"><?php echo $instituteData[0]['institute']; ?></h1>
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
                                            <img src="<?php echo "admin/media/institution/" . $instituteData[0]['institute'] . "/" . $instituteData[0]['image']; ?>" alt="course cover" />
                                        </div>

                                        <div class="course-body">
                                            <h2><?php echo $instituteData[0]['institute']; ?></h2>

                                            <p><?php echo $instituteData[0]['description']; ?></p>

                                            <h4>Subjects</h4>
                                            <?php for ($i = 0; $i < count($insName); $i++) { ?>
                                                <ul class="course-description-list">
                                                    <li class="lesson">
                                                        <div class="heading">
                                                            <span class="lesson-nr no-select"><?php echo $insName[$i]; ?></span>
                                                        </div>

                                                        <div class="body">

                                                        </div>

                                                        <ul class="lesson-description">
                                                            <li>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                <?php } ?>

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

                                            <p><span><?php echo $instituteData[0]['address']; ?></span></p>
                                            <div class="map" id="map-canvas"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($teacherData) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="heading text-center" style="text-align:center"><strong>Teachers</strong></h1>
                                </div>
                                <?php   foreach ($teacherData as $key => $value) {
                                        ?>
                                        <form id="teacherData" name="teacherData" action="teacherDetail.php" method="post">
                                            <input type="hidden" id="teacherId" name="teacherId" value="<?php echo $value['id']; ?>">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="team-member">
                                                    <div class="photo">
                                                        <div>
                                                            <img src="<?php echo "admin/media/institution/" . $instituteData[0]['institute'] . "/" . $value['image']; ?>" alt="member avatar" />
                                                        </div>
                                                    </div>

                                                    <h4><a href="member.html"><?php echo $value['first_name'] . " " . $value['last_name']; ?></a></h4>
                                                    <p class="expertise-area"><?php echo $value['specialization']; ?></p>

                                                    <button type="submit" class="button btn theme-btn-1">View Detail</button>
                                                </div>
                                            </div>
                                        </form>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <?php include_once 'footer.php';?>

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
