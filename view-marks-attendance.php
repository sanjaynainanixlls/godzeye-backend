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
                            <span id="checkMarksButton" class="button selectedOption">Check Marks</span>
                        </button>
                        <button class="text-center btn theme-btn-1 " >
                            <span id="checkAttendanceButton" class="button selectedOption">Check Attendance</span>
                        </button>
                    </div>
                </div>
                <div class="row" id="marksForm" style="display:none">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-form">
                            <label>
                                <input name="institute" id="institute" class="form-input js-input" />
                                <span>Name of the Institute</span>
                                <input type="hidden" id="instituteName" name="instituteName">
                            </label>

                            <label>
                                <input class="form-input js-input" id="testName" name="testName" />
                                <span>Name of the test</span>
                                <input type="hidden" id="testsName" name="testsName">
                            </label>

                            <label>
                                <input type="text" class="form-input js-input" id="regNumber" name="regNumber" />
                                <span>Roll Number</span>
                            </label>

                            <button class="btn theme-btn-1">
                                <span class="button" id="viewDetailsLabel">Check Marks</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row" id="AttendanceForm" style="display:none">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="contact-form">
                            <label>
                                <input name="institute" id="institute1" class="form-input js-input" />
                                <span>Name of the Institute</span>
                                <input type="hidden" id="instituteName1" name="instituteName1">
                            </label>

                            <label>
                                <input type="number" max="12" min="1" class="form-input js-input" id="mothId" name="mothId" />
                                <span>Select Month</span>
                            </label>

                            <label>
                                <input type="text" class="form-input js-input" id="regNumber1" name="regNumber1" />
                                <span>Roll Number</span>
                            </label>

                            <button class="btn theme-btn-1">
                                <span class="button" id="viewDetailsLabel1">Check Attendance</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-bottom:50px;" id="viewMarksAttendanceDetails">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="table-responsive text-center" style="text-align:center;">
                            <table id="resultTable" class="table table-bordered" style="text-align:center;width:100%;display:none"></table>
                            <table id='attendanceTable' class="table table-bordered" style="text-align:center;width:100%;display:none"></table>
                        </div>
                        <div id='noResult' class='text-center' style="text-align: center"></div>
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
