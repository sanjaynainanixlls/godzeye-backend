<?php 

include dirname(dirname(__FILE__)) . '/admin/config/config.php';
$userDataHandlerObj = new userDataHandler();
$result = $userDataHandlerObj->getTeacherList();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teacher List</title>

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
                                        <th>Email</th>
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
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php $result =  $userDataHandlerObj->getInstituteDetails($value['contact']); echo $result[0]['institute'];  ?></td>
                                            <td>
                                                <?php $img = $value['institute'];
                                                //debug($img);
                                                $dirPath = 'media/institution/'.$img.'/';
                                                ?>
                                                <img width="100px" height="100px" src='<?php echo $dirPath.$value['image']; ?>'/>
                                            </td>
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
