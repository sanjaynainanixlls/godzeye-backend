<?php 
if(!isset($_SESSION))
    session_start();
include 'includeSession.php';
include dirname(dirname(__FILE__)) . '/admin/config/config.php';
$userDataHandlerObj = new userDataHandler();
$result = $userDataHandlerObj->getUserComments();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact</title>

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
                            Institution List
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Contact Details
                            </li>
                        </ol>
                        
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="data datatable table table-striped table-bordered table-hover" id="institution">  
                                <thead>  
                                    <tr>  
                                        <th >Id</th>  
                                        <th class="col-md-2">User Name</th>  
                                        <th class="col-md-3">Email</th>  
                                        <th class="col-md-2">Mobile</th> 
                                        <th class="col-md-2">Comments</th>
                                    </tr>  
                                </thead>  
                                <tbody>  
                                    <?php foreach ($result as $key => $value) { ?>
                                        <tr>  
                                            <td class="col-md-1"><?php echo $value['id']; ?></td>  
                                            <td class="col-md-3"><?php echo $value['username']; ?></td> 
                                            <td class="col-md-2"><?php echo $value['email']; ?></td>
                                            <td class="col-md-2"><?php echo $value['mobile']; ?></td>  
                                            <td class="col-md-2"><?php echo $value['query']; ?></td>
                                        </tr>  
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>            

                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Additional JavaScript -->
