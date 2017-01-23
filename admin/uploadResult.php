<?php
include dirname(dirname(__FILE__)) . '/config/config.php';
$instituteData = getInstituteList();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Upload Marks</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php include_once 'leftSidebar.php'; ?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Upload Marks
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Marks
                                </li>
                            </ol>
                            <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                                </div>
                            <?php } unset($_SESSION['message']); ?>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" action="action/action.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="uploadResult">                            
                                
                                <div class="form-group">
                                    <label>Select Institution</label>
                                    <select class="form-control" name="institution" id="institution">
                                        <option value="" selected disabled>--SELECT INSTITUTION--</option>
                                        <?php foreach ($instituteData as $key => $value) { ?>
                                            <option name="institution_id" id="institution_id" value="<?php echo $value['id']; ?>"><?php echo $value['institute']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>Select Test</label>
                                    <select class="form-control test" name="test" >
                                        <option value=""  selected disabled>--SELECT TEST--</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Student List Sheet</label>
                                    <input id="studentSheet" type="file" class="form-control" name="resultSheet" >
                                </div>

                                <button type="submit" class="btn btn-success">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>

                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Additional JavaScript -->
        <script src="js/upload_result.js"></script>

    </body>

</html>
