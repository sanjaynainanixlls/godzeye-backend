<?php
//include 'includeSession.php';
//include dirname(dirname(__FILE__)) . '/anras/config/config.php';
//$postParams = Functions::getPostParams();
//$userDataHandlerObj = new userDataHandler();
//if ($postParams['action'] == 'completeStatus') {
//    $id = $postParams['userId'];
//    $result = $userDataHandlerObj->getCompleteStatusById($id);
//}
//$roomData = $userDataHandlerObj->allRoomStatus();
//isset($result[0]) ? $data = $result[0] : '';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Register Teacher</title>

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
                                Register Teacher
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-edit"></i> Teacher
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" action="action/action.php" method="post" enctype="multipart/form-data">
                               <input type="hidden" name="action" value='registerTeacher'>
                               <!-- <?php if (!isset($data)) { ?>
                                    <input type="hidden" name="status" value="newInstitute">
                                <?php } ?>
                                <input type="hidden" name="id" value="<?php if (isset($data['id']))
                                    echo $data['id'];
                                else
                                    echo '';
                                ?>">-->
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text"  class="form-control" name="f_name" value="<?php if (isset($data['institute'])) echo $data['institute']; ?>" >
                                </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text"  class="form-control" name="l_name" value="<?php if(isset($data['founder']))echo $data['founder'];else echo '';?>" >
                            </div>
                            
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number"  class="form-control" name="age" value="<?php if(isset($data['contact']))echo $data['contact']; else echo '';?>" >
                            </div>
                            
                            <div class="form-group">
                                <label>Sex</label>
                                <select class="form-control" name="sex">
                                    <option value="">--SELECT SEX--</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
 							
                            <div class="form-group">
                                <label>Specialization</label>
                                <input id="specialization" type="text" class="form-control" name="specialization" value="<?php if(isset($data['dateOfArrival']))echo $data['dateOfArrival'];else echo '';?>" >
                            </div>
 				
                            <div class="form-group">
                                <label>Address</label>
                                <input id="address" type="text" class="form-control" name="address" value="<?php if(isset($data['dateOfArrival']))echo $data['dateOfArrival'];else echo '';?>" >
                            </div>
                                
                            <div class="form-group">
                                <label>Image</label>
                                <input id="image" type="file" class="form-control" name="timage" >
                            </div>
                            
                            <div class="form-group">
                                <label>Highest Qualification</label>
                                <input id="h_quali" type="text" class="form-control" name="h_quali" >
                            </div> 
                                
                            <div class="form-group">
                                <label>Contact</label>
                                <input id="contact" type="tel" class="form-control" name="contact" >
                            </div> 
                                
                            <div class="form-group">
                                <label>Institution</label>
                                <select class="form-control" id="institution" name="institution">
                                    <option value="">--Select Institution--</option>
                                    <option value="1" >A</option>
                                    <option value="0" >B</option>
                                </select>
                            </div>                                
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Discontinued</option>
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
