<?php
include_once 'header.php';
include_once 'config/config.php';
$institute = getInstituteList();
?>

<!-- Main Content -->
<div class="content-wrapper">
    <!-- Hero Section -->
    <section class="section-hero">
        <div class="hero-content contact">
            <div class="container">
                <h1 class="heading">View Marks and Attendance</h1>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section-contact">
        <div class="contact-info-wrapper">
            <div class="container">
                <div class="row" style="margin:20px 0px;text-align:center">

                    <div class="text-center col-md-6 col-md-offset-3">
                        <button class="btn theme-btn-1 ">
                            <span id="checkMarksButton" class="button">Check Marks</span>
                        </button>
                        <button class="text-center btn theme-btn-1 " >
                            <span id="checkAttendanceButton" class="button">Check Attendance</span>
                        </button>
                    </div>
                </div>
                <div class="row" id="marksAttendanceForm" style="display:none">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-form">
                            <label>
                                <input name="institute" id="institute" class="form-input js-input" />
                                <span>Name of the Institute</span>
                                <input type="hidden" id="instituteName" name="instituteName">
                            </label>

                            <label>
                                <input type="text" class="form-input js-input" id="testName" name="testName" />
                                <span>Name of the test</span>
                            </label>

                            <label>
                                <input type="text" class="form-input js-input" name="subject" />
                                <span>Roll Number</span>
                            </label>

                            <button class="btn theme-btn-1">
                                <span class="button" id="viewDetailsLabel"></span>
                            </button>
                        </div>
                    </div>


                </div>
                <div class="row" style="margin-bottom:50px;display:none" id="viewMarksAttendanceDetails">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="table-responsive text-center" style="text-align:center">
                            <table class="table table-bordered" style="text-align:center;width:100%">
                                <thead>
                                    <tr class="text-center" style="text-align:center">
                                        <th style="padding:10px;border:1px solid black">Name of Student</th>
                                        <th style="padding:10px;border:1px solid black">Name of Test</th>
                                        <th style="padding:10px;border:1px solid black">Maximum Marks</th>
                                        <th style="padding:10px;border:1px solid black">Marks Obtained</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center" style="text-align:center">
                                        <td style="padding:10px;border:1px solid black">Sanjay Nainani</td>
                                        <td style="padding:10px;border:1px solid black">Mid term 1</td>
                                        <td style="padding:10px;border:1px solid black">100</td>
                                        <td style="padding:10px;border:1px solid black">85</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>
<script>

</script>

<?php include_once 'footer.php'; ?>
<!-- Additional JS -->
<script src="js/view-marks-attendance.js"></script>
