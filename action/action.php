<?php
if(!isset($_SESSION))
    session_start();
include dirname(dirname(__FILE__)) . '/config/config.php';

class Action {

    private $postParams;

    public function execute() {
        $this->postParams = Functions::getPostParams();
        if ($this->postParams['action'] == 'login') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->authenticateUser($this->postParams['username'], $this->postParams['pwd']);
            if (!empty($result)) {
                $_SESSION["user"] = $result[0]['user_name'];
                header("location: ../home.php");
            } else {
                $_SESSION['error'] = "Invalid Username or Password!";
                header("location: ../index.php");
            }
        } else if ($this->postParams['action'] == 'registerTeacher') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->registerTeacher($this->postParams);
            if (!empty($result)) {
                session_start();
                echo '<script>alert("Teacher Registration  successful!");</script>';
                //$_SESSION['message'] = "User with ID: " . $result[0]['id'] . " Added Successfully!";
                header("location: ../home.php");
            } else {
                echo '<script>alert("Teacher Registration  not successful!");</script>';
                $_SESSION['error'] = "Invalid Username or Password!";
                header("location: ../registerTeacher.php");
            }
        }  else if ($this->postParams['action'] == 'registerInstitution') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->registerInstitution($this->postParams);
            if (!empty($result)) {
                    $_SESSION['message'] = "Institute Added Successfully...";
                    header("location: ../institutionList.php");
            }
        } else if ($this->postParams['action'] == 'editInstitution') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->registerInstitution($this->postParams);
            if (!empty($result)) {
                    $_SESSION['message'] = "Institute Updated Successfully...";
                    header("location: ../institutionList.php");
            }
        } else if ($this->postParams['action'] == 'checkOutUser') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->checkOutUser($this->postParams);
            if ($result['status'] == 1) {
                if ($_SESSION['role'] == 'ADMIN') {
                    header("location: ../home.php");
                } elseif ($_SESSION['role'] == 'RECEPTION') {
                    header("location: ../dataEntry.php");
                }
            }
        } else if ($this->postParams['action'] == 'addNewUser') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->addNewUser($this->postParams);
            if ($result) {
                session_start();
                $_SESSION['message'] = "New User Added Successfully";
                header("location: ../home.php");
            } else {
                session_start();
                $_SESSION['message'] = "User Name Already Exists!!!";
                header("location: ../addUser.php");
            }
        } elseif ($this->postParams['action'] == 'checkoutUsers') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->checkoutUsers($this->postParams);
            if ($result['status'] == 1) {
                if ($_SESSION['role'] == 'ADMIN') {
                    header("location: ../home.php");
                } elseif ($_SESSION['role'] == 'RECEPTION') {
                    header("location: ../dataEntry.php");
                }
            }
        } else if ($this->postParams['action'] == 'allotInventory') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->allotInventoryToUser($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Inventory Alloted to User: " . $result[0] . ', Please Collect ' . $result[1] . ' INR';
                header("location: ../inventoryById.php");

                }
            else{
                session_start();
                $_SESSION['message'] = "Inventory has been already alloted to this User. Please check.";
                header("location: ../inventoryById.php");
            }
        } else if($this->postParams['action'] == 'returnInventory') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->releaseInventory($this->postParams);
            if (!empty($result)) {
                session_start();
                $_SESSION['message'] = "Return ".$result[0].' INR to UserId: '.$result[1];
                header("location: ../returnInventoryById.php");
                }
        } else if($this->postParams['action'] == 'tallyCash') {
                $userDataHandlerObj = new userDataHandler();
                $result = $userDataHandlerObj->tallyCash($this->postParams);
            if (isset($result)) {
                session_start();
                $_SESSION['tallyCash'] = $result;
                header("location: ../tallyCash.php");
                }
        }
    }

}

$ActionObj = new Action();
$ActionObj->execute();
?>
