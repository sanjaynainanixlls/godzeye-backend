<?php

include dirname(dirname(__FILE__)) . '/config/config.php';
$postParams = Functions::getPostParams();
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
                                <?php if($postParams['action'] != 'editInstitution'){?>
                                    <input type="hidden" name="action" value='registerInstitution'>
                                <?php }else{ ?>
                                    <input type="hidden" name="action" value='editInstitution'>
                                    <input type="hidden" name="editInstituteId" value="<?php echo $postParams['editId']; ?>"> 
                                <?php } ?>
                                
                                <div class="form-group">
                                    <label>Institution Name</label>
                                    <input type="text"  class="form-control" name="institute" value="<?php if (isset($data[0]['institute'])) echo $data[0]['institute']; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text"  class="form-control" name="description" value="<?php if (isset($data[0]['description'])) echo $data[0]['description'];
                                else echo ''; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="tel"  class="form-control" name="contact" value="<?php if (isset($data[0]['contact'])) echo $data[0]['contact'];
                                else echo ''; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email"  class="form-control" name="email" value="<?php if (isset($data[0]['email'])) echo $data[0]['email'];
                                else echo ''; ?>" required="required">
                                </div>
                                    
                                <div class="form-group">
                                    <label>Subjects</label>
                                    <input type="text" class="form-control" id="subjects" name="subjects" value="<?php if (isset($data[0]['subjects'])) echo $data[0]['subjects'];
                                echo ''; ?>" required="required">
                                </div>
                                    
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="tel"  class="form-control" name="address" value="<?php if (isset($data[0]['address'])) echo $data[0]['address'];
                                else echo ''; ?>" required="required">
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <?php if(isset($data[0]['image'])){
                                        $dirPath = 'media/institution/'.$data[0]['institute'].'/';?>
                                        <img width="100px" height="100px" src='<?php echo $dirPath.$data[0]['image']; ?>'/>
                                        <input type="file" class="form-control" id="instImage" name="instImage">
                                    <?php }else{ ?>
                                        <input type="file" class="form-control" id="instImage" name="instImage">
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label>Featured</label>
                                    <select class="form-control" id="is_featured" name="is_featured">
                                        <option value="1" >Featured</option>
                                        <option value="0" selected>Not Featured</option>
                                    </select>
                                </div>
                                    
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php if(isset($data[0]['status'])){ if($data[0]['status'] == 1){ echo "selected";}}?>>Active</option>
                                    <option value="0" <?php if(isset($data[0]['status'])){ if($data[0]['status'] == 0){ echo "selected";}}?>>Discontinued</option>
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

    </body>

</html>
