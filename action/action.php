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
                $_SESSION['message'] = "Teacher Registration  successful!";
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
        } else if ($this->postParams['action'] == 'registerStudent') {
            $userDataHandlerObj = new userDataHandler();
            $result = $userDataHandlerObj->registerStudent($this->postParams);
            if (!empty($result)) {
                    $_SESSION['message'] = "Student List Added Successfully...";
                    header("location: ../studentList.php");
            }
        }
    }

}

$ActionObj = new Action();
$ActionObj->execute();
?>
