<?php

include dirname(dirname(__FILE__)) . '/godzeye-backend/config/config.php';
$postParams = Functions::getPostParams();
$userDataHandlerObj = new userDataHandler();
if ($postParams['action'] == 'editTeacher') {
    $id = $postParams['editId'];
    $result = $userDataHandlerObj->getTeacherDetails($id);
    $data = $result[0];
    $tid = $data['id'];
}
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

        <title><?php if(!empty($data)){ ?>Edit<?php } else { ?> Register <?php } ?> Teacher</title>

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
                                <?php if(!empty($data)){ ?>Edit 
                                <?php } else { ?> Register 
                                <?php } ?> Teacher
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
                               
                               <?php if (!empty($data)) { ?>
                                    <input type="hidden" name="action" value='editTeacher'>
                                    <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                                <?php } else { ?>
                                    <input type="hidden" name="action" value='registerTeacher'>
                                <?php } ?>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text"  class="form-control" name="f_name" value="<?php if (isset($data['first_name'])) echo $data['first_name']; else echo '';?>" >
                                </div>

                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text"  class="form-control" name="l_name" value="<?php if(isset($data['last_name']))echo $data['last_name'];else echo '';?>" >
                            </div>
                            
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number"  class="form-control" name="age" value="<?php if(isset($data['age']))echo $data['age']; else echo '';?>" >
                            </div>
                            
                            <div class="form-group">
                                <label>Sex</label>
                                <select class="form-control" name="sex">
                                    <option value="">--SELECT SEX--</option>
                                    <option value="male" <?php if(isset($data['sex'])){ if($data['sex'] == 'male'){ echo "selected";}}?> >Male</option>
                                    <option value="female"  <?php if(isset($data['sex'])){ if($data['sex'] == 'female'){ echo "selected";}}?>>Female</option>
                                </select>
                            </div>
 							
                            <div class="form-group">
                                <label>Specialization</label>
                                <input id="specialization" type="text" class="form-control" name="specialization" value="<?php if(isset($data['specialization']))echo $data['specialization'];else echo '';?>" >
                            </div>
 				
                            <div class="form-group">
                                <label>Address</label>
                                <input id="address" type="text" class="form-control" name="address" value="<?php if(isset($data['address']))echo $data['address'];else echo '';?>" >
                            </div>
                                
                            <div class="form-group">
                                <label>Image</label>
                                <input id="image" type="file" class="form-control" name="timage" >
                            </div>
                            
                            <?php if(!empty($data)) { ?>
                            <div class="form-group">
                                <img src="media/<?php echo $data['image']; ?>" style="height: 50px;width: 50px;">
                            </div>
                            <?php } ?>   
                                    
                            <div class="form-group">
                                <label>Highest Qualification</label>
                                <input id="h_quali" type="text" class="form-control" name="h_quali" value="<?php if(isset($data['highest_qual']))echo $data['highest_qual'];else echo '';?>" >
                            </div> 
                                
                            <div class="form-group">
                                <label>Contact</label>
                                <input id="contact" type="tel" class="form-control" name="contact" value="<?php if(isset($data['contact']))echo $data['contact'];else echo '';?>" >
                            </div> 
                                
                            <div class="form-group">
                                <label>Institution</label>
                                <select class="form-control" id="institution" name="institution">
                                    <option  selected disabled>--Select Institution--</option>
                                    <?php foreach ($instituteData as $key => $value) { ?>
                                    <option value="<?php echo $value['id']; ?>" <?php if(isset($data['institution_id'])){ if($data['institution_id'] == $value['id']){ echo "selected";}}?>>
                                    <?php echo $value['institute']; ?>
                                    </option>
                                    <?php } ?>
                                    
                                </select>
                            </div>                                
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" <?php if(isset($data['status'])){ if($data['status'] == 1){ echo "selected";}}?>>Active</option>
                                    <option value="0" <?php if(isset($data['status'])){ if($data['status'] == 1){ echo "selected";}}?>>Discontinued</option>
                                </select>
                            </div>
                            							
                            <button type="submit" class="btn btn-success"><?php if(!empty($data)){ ?>
                                Edit
                            <?php } else { ?>
                                Submit
                            <?php } ?>
                            </button>
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
