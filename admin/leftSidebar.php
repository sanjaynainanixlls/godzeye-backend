<?php 
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">GODZEYE</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="logout.php">
                Logout
            </a>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="registerInstitution.php"><i class="fa fa-fw fa-plus"></i>Register Institution</a>
                </li>
                <li>
                    <a href="institutionList.php"><i class="fa fa-fw fa-minus"></i>Institute List</a>
                </li>
                <li>
                    <a href="registerTeacher.php"><i class="fa fa-fw fa-plus"></i>Register Teacher</a>
                </li>
                <li>
                    <a href="teacherList.php"><i class="fa fa-fw fa-minus"></i>Teacher List</a>
                </li>
                <li>
                    <a href="registerStudent.php"><i class="fa fa-fw fa-plus"></i>Register Student</a>
                </li>
                <li>
                    <a href="studentList.php"><i class="fa fa-fw fa-minus"></i>Student List</a>
                </li>
                <li>
                    <a href="addTests.php"><i class="fa fa-fw fa-plus"></i>Add Tests</a>
                </li>
                <li>
                    <a href="uploadResult.php"><i class="fa fa-fw fa-plus"></i>Upload Results</a>
                </li>
                <li>
                    <a href="uploadAttendance.php"><i class="fa fa-fw fa-plus"></i>Upload Attendance</a>
                </li>
                <li>
                    <a href="user_contact.php"><i class="fa fa-fw fa-plus"></i>User Contact</a>
                </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>