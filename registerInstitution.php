<?php

include dirname(dirname(__FILE__)) . '/godzeye-backend/config/config.php';
$postParams = Functions::getPostParams();print_r($postParams);
$userDataHandlerObj = new userDataHandler();
if ($postParams['action'] == 'editInstitution') {
    $id = $postParams['editId'];
    $data = $userDataHandlerObj->getInstituteDetails($id);
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register Institution</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                                Register Institution
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Institution
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">
                            
                            <form role="form" action="action/action.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="action" value='registerInstitution'>
                                <?php if (isset($_SESSION['message']) && $_SESSION['message'] != '') { ?>
                                    <div class="alert alert-success fade in">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong style="font-size:16px"><?php echo $_SESSION['message']; ?></strong>
                                    </div>
                                <?php } unset($_SESSION['message']); ?>
                                <div class="form-group">
                                    <label>Institution Name</label>
                                    <input type="text"  class="form-control" name="institute" value="<?php if (isset($data[0]['institute'])) echo $data[0]['institute']; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Founder Name</label>
                                    <input type="text"  class="form-control" name="founder" value="<?php if (isset($data[0]['founder'])) echo $data[0]['founder'];
                                else echo ''; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="tel"  class="form-control" name="contact" value="<?php if (isset($data[0]['contact'])) echo $data[0]['contact'];
                                else echo ''; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Subjects</label>
                                    <input type="text" class="form-control" id="subjects" name="subjects" value="<?php if (isset($data[0]['subjects'])) echo $data[0]['subjects'];
                                echo ''; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <!--<input id="comingDate" type="date" class="form-control" name="comingDate" value="<?php if (isset($data[0]['image'])) echo $data[0]['image'];
                                else echo ''; ?>" required="required">-->
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1" selected>Active</option>
                                        <option value="" >Discontinued</option>
                                    </select>
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
        <script src="js/script.js"></script>
        <script src="js/roomStatus.js"></script>

    </body>

</html>
