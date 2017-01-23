<?php include_once 'header.php';?>
<!-- Courses Section -->
<section class="section-courses">
    <div class="filters-box">
        <div class="box-heading">
            <div class="container">
                <ul class="courses-filters">
                    <li>
                        <a class="current" href="#" data-target="grid-all"><span>All courses</span></a>
                    </li>

                    <li>
                        <a href="#" data-target="grid-online"><span>Online</span></a>
                    </li>

                    <li>
                        <a href="#" data-target="grid-offline"><span>Offline</span></a>
                    </li>
                </ul>

                <div class="advanced-filters-toggle">
                    <a href="#">
                        <p>Show advanced filters</p>
                    </a>

                    <span class="icon">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class="advanced-filters-box">
            <div class="container">
                <h2>Advanced filters</h2>

                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <div class="filter-input-box">
                            <span class="caption">Course category</span>
                            <div class="input-box selext-box">
                                <input type="text" value="" readonly class="js-input no-select" data-selection="all" placeholder="All categories (95)" name="course-category" />

                                <div class="dropdown">
                                    <ul class="list">
                                        <li data-option="all">All categories <span>(95)</span></li>
                                        <li data-option="culinary">Culinary <span>(34)</span></li>
                                        <li data-option="web-design">Web design <span>(17)</span></li>
                                        <li data-option="technology">Technology <span>(11)</span></li>
                                        <li data-option="sport">Sports <span>(9)</span></li>
                                        <li data-option="education">Education <span>(7)</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="filter-input-box">
                            <span class="caption">Sort by</span>
                            <div class="input-box selext-box">
                                <input type="text" value="" readonly class="js-input no-select" data-selection="new" placeholder="Newest courses" name="course-sorting" />

                                <div class="dropdown">
                                    <ul class="list">
                                        <li data-option="new">Newest courses</li>
                                        <li data-option="low-to-high">Price low to high</li>
                                        <li data-option="high-to-low">Price high to low</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <div class="filter-input-box">
                            <span class="caption">Keywords</span>
                            <div class="input-box">
                                <input type="text" value="" class="js-input" name="course-keywords" />
                            </div>
                        </div>

                        <div class="filter-input-box">
                            <span class="caption">Offline courses by date</span>
                            <div class="input-box selext-box date-select">
                                <input type="text" value="" readonly class="js-input no-select" data-selection="new" placeholder="Newest courses" name="course-date" />

                                <div class="dropdown">
                                    <div id="calendar" class="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <div class="filter-input-box">
                            <span class="caption">Course instructor</span>
                            <div class="input-box selext-box">
                                <input type="text" value="" readonly class="js-input no-select" data-selection="all" placeholder="All instructors" name="course-instructor" />

                                <div class="dropdown">
                                    <ul class="list">
                                        <li data-option="zack">Zack Thoumb</li>
                                        <li data-option="john">John Isner</li>
                                        <li data-option="barry">Barry Allen</li>
                                        <li data-option="armstrong">Joe Armstrong</li>
                                        <li data-option="cage">Elena Cage</li>
                                        <li data-option="chase">Alexandr Chase</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6 col-md-3">
                        <div class="filters-action">
                            <a href="#" class="apply btn theme-btn-1 blue">
                                <span class="button">Apply filters</span>
                            </a>
                            <a class="reset" href="#">Reset filters</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'config/config.php';
    $institute = getInstituteList();
    ?>
    <div class="projects">
        <div class="container">
            <div class="main-loader">
                <div class="loader-front">
                    <img src="img/loader-front.png" alt="loader front" />
                </div>
            </div>

            <div class="ajax-target">
                <div class="row">
                    <!-- Grid View Starts -->
                    <?php foreach ($institute as $key => $values) { ?>
                        
                        <div class="col-md-4 col-sm-6">
                            <div class="single-course grid-course">
                                <div class="course-thumbnail">
                                    <a href="course.html" class="cover-info">
                                        <div class="text">
                                            <h4><?php echo $values['institute']; ?></h4>
                                            <p><?php echo $values['description']; ?></p>
                                        </div>
                                    </a>
                                    <img src="<?php echo "admin/media/institution/".$values['institute']."/".$values['image'];?>" alt="<?php echo $values['institute'];?>" />
                                </div>

                                <div class="course-details">
                                    <h3 class="title">
                                        <a href="course.html">
                                            <?php echo $values['institute']; ?>
                                        </a>
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
                                    
                                    <form id="institutesId" action="institutedetail.php" method="post">
                                        <input type="hidden" id="instituteId" name="instituteId" value="<?php echo $values['id'];?>">
                                        <div class="course-action">
                                            <button type="submit" class="button btn theme-btn-1">View Details</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Grid View Ends -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'footer.php';?>

<!-- Including JS Files-->
<script src="js/institutesGrid.js"></script>