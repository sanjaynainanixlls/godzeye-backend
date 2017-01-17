<?php 

include dirname(dirname(__FILE__)) . '/godzeye-backend/config/config.php';
$userDataHandlerObj = new userDataHandler();
$result = $userDataHandlerObj->getTeacherList();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Institution List</title>

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
                            Teacher List
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-edit"></i> Teacher List
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
                                        <th>Id</th>  
                                        <th>Teacher Name</th>  
                                        <th>Age</th>  
                                        <th>Sex</th> 
                                        <th>Address</th>
                                        <th>Specialization</th>
                                        <th>Contact</th>
                                        <th>Institute Name</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>  
                                </thead>  
                                <tbody>  
                                    <?php foreach ($result as $key => $value) { ?>
                                        <tr>  
                                            <td><?php echo $value['id']; ?></td>  
                                            <td><?php echo $value['first_name']." ".$value['last_name']; ?></td>  
                                            <td><?php echo $value['age']; ?></td>  
                                            <td><?php echo $value['sex']; ?></td>
                                            <td><?php echo $value['address']; ?></td>
                                            <td><?php echo $value['specialization']; ?></td>                                            
                                            <td><?php echo $value['contact']; ?></td>
                                            <td><?php echo $value['institution_id']; ?></td>
                                            <td><img src="media/<?php echo $value['image']; ?>" style="height: 20px;width: 20px;"></td>
                                            <td><?php echo $value['status']; ?></td>
                                            
                <!--<input type="hidden" name="action" value='editInstitution'>-->
                                            <td>
                                                <form role="form" action="registerTeacher.php" method="post">
                                                    <input type="hidden" name="editId" value="<?php echo $value['id'];?>">
                                                    <input type="hidden" name="action" value="editTeacher">
                                                    <input type="submit" value="EDIT">
                                                </form>
                                            </td>
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
