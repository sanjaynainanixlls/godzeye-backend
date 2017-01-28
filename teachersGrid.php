<?php
include_once 'header.php';
include_once 'config/config.php';
$teacherDetail = getTeacherData(); 
?>

<!-- Main Content -->
<div class="content-wrapper">
    <!-- Hero Section -->
    <section class="section-hero">
        <div class="hero-content instructors">
            <div class="container">
                <h1 class="heading">Instructors list</h1>
            </div>
        </div>
    </section>

    <!-- Members Section -->
    <section class="section-members">
        <?php //debug($teacherDetail);
        if ($teacherDetail) {
            foreach ($teacherDetail as $key => $value) {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="team-member">
                                <?php
                                if ($value['institution_id'] == NULL && $value['entity_type'] == '0') {
                                    $profileImg = 'admin/media/independent/' . $value["image"];
                                } else {
                                    $instituteData = getInstituteData($value['institution_id']);
                                    $profileImg = 'admin/media/institution/' . toSlug($instituteData[0]["institute"]) . '/' . $value["image"];
                                }
                                ?>
                                <div class="photo">
                                    <img src="<?php echo $profileImg; ?>" alt="<?php echo $value['first_name'] . ' ' . $value['last_name']; ?>" />
                                </div>

                                <h4><?php echo $value['first_name'] . ' ' . $value['last_name']; ?></h4>

                                <p class="expertise-area"><?php echo $value['highest_qual']; ?></p>

                                <?php
                                if ($value['specialization']) { ?>
                                    <p class="member-info">
                                        <?php  echo $value['specialization']; ?>
                                    </p> 
                                <?php } ?>
                                <form class="teachersGrid" id="teachersGrid" method="post" action="teacherDetail.php">
                                    <input type="hidden" id="teacherId" name="teacherId" value="<?php echo $value['id'];?>">
                                    <button type="submit" class="button btn theme-btn-1">View Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } ?>
    </section>
</div>

<?php include_once 'footer.php'; ?>