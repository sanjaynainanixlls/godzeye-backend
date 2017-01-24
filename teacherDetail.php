<?php
include_once 'header.php';
include_once 'config/config.php';
if (!$_REQUEST['teacherId']) {
    header('Location: ' . '/teacherList.php');
}
$teacherDetail = getTeacherData('', $_REQUEST['teacherId']);
$instituteData = getInstituteData($teacherDetail[0]['institution_id']);
?>
<!-- Main Content -->
<div class="content-wrapper">
    <!-- Hero Section -->
    <section class="section-hero">
        <div class="hero-content instructors">
            <div class="container">
                <h1 class="heading">Instructor</h1>
            </div>
        </div>
    </section>

    <!-- Members Section -->
    <section class="section-members">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if ($teacherDetail[0]) { ?>
                        <div class="single-member-box">
                            <div class="member-social-box">
                                <div class="row">
                                    <div class="col-sm-8 col-md-9 col-lg-8">
                                        <div class="profile">
                                            <?php
                                            if ($teacherDetail[0]['institution_id'] == 'null' || $teacherDetail[0]['entity'] == '0') {
                                                $profileImg = 'admin/media/independent/' . $teacherDetail[0]["image"];
                                            } else {
                                                $profileImg = 'admin/media/institution/' . toSlug($instituteData[0]["institute"]) . '/' . $teacherDetail[0]["image"];
                                            }
                                            ?>
                                            <div class="avatar">
                                                <img src="<?php echo $profileImg; ?>" alt="<?php echo $teacherDetail[0]['first_name'] . ' ' . $teacherDetail[0]['last_name']; ?>" />
                                            </div>
                                            <div class="short-info">
                                                <h3 class="name"><?php echo $teacherDetail[0]['first_name'] . ' ' . $teacherDetail[0]['last_name']; ?></h3>
                                                <p class="covered-areas"><?php echo $teacherDetail[0]['highest_qual']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($teacherDetail[0]['institution_id'] == 'null' || $teacherDetail[0]['entity'] == '0') {
                                        $address = $teacherDetail[0]['address'];
                                        $phone = $teacherDetail[0]['contact'];
                                        $email = $teacherDetail[0]['email'];
                                    } else {
                                        $address = $instituteData[0]['address'];
                                        $phone = $instituteData[0]['contact'];
                                        $email = $instituteData[0]['email'];
                                    }
                                    ?>
                                    <div class="col-sm-4 col-md-3 col-lg-4">
                                        <div class="profile-info">
                                            <ul>
                                                <?php if ($address) { ?><li class="office"><?php echo $address ?></li> <?php } ?>
                                                <?php if ($phone) { ?><li class="phone"><?php echo $phone; ?></li> <?php } ?>
                                                <?php if ($email) { ?><li class="mail"><?php echo $email; ?></li> <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($teacherDetail[0]['specialization']) {
                                $specializations = explode(",", $teacherDetail[0]['specialization']);
                                ?>
                                <div>
                                    <h3>Specialization</h3>
                                    <ul>
                                        <?php foreach ($specializations as $key => $specialization) { ?>
                                            <li><?php echo $specialization; ?></li> 
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="single-member-box">
                            <div class="member-social-box">
                                <div class="row">
                                    <div class="col-sm-8 col-md-9 col-lg-8">
                                        <div class="profile">
                                            <div class="avatar">
                                                <img src="img/single-avatar.jpg" alt="single member avatar" />
                                            </div>
                                            <div class="short-info">
                                                <h3 class="name">John isner</h3>
                                                <p class="covered-areas">Education</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4 col-md-3 col-lg-4">
                                        <div class="profile-info">
                                            <ul>
                                                <li class="office">Everingham Road Sheffield, 15/2</li>
                                                <li class="phone">+1-234-567-89</li>
                                                <li class="mail">john.isner@levelup.com</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Duis mollis, est non commodo luctus.</p>

                            <h3>Specialization</h3>

                            <ul>
                                <li class="office">Everingham Road Sheffield, 15/2</li>
                                <li class="phone">+1-234-567-89</li>
                                <li class="mail">john.isner@levelup.com</li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include_once 'footer.php'; ?>