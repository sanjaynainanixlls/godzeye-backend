<?php

class userDataHandler {

    public static function authenticateUser($user, $pwd) {
        $query = "SELECT user_name FROM user WHERE user_name = '" . $user . "' AND password = '" . ($pwd) . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function checkTeacher($email, $insId) {
        $query = "SELECT email FROM teachers WHERE email = '" . $email . "' AND institution_id = '" . ($insId) . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function registerTeacher($data) {

        $checkTeacher = self::checkTeacher($data['email'], $data['institution']);
        if (empty($checkTeacher)) {
            if ($_FILES["timage"]["error"] == 4) {
                $query = "INSERT INTO teachers SET  first_name='" . $data['f_name'] . "' ,last_name='" . $data['l_name'] . "', age= '" . $data['age'] . "',sex='" . $data['sex'] . "'"
                        . ",specialization = '" . $data['specialization'] . "',address = '" . $data['address'] . "',highest_qual = '" . $data['h_quali'] . "',contact = '" . $data['contact'] . "'"
                        . ", institution_id = '" . $data['institution'] . "' ,image='',email='" . $data['email'] . "',is_featured='" . $data['is_featured'] . "'";
                $result = queryRunner::doInsert($query);
                return $result;
            } else {
                $uploadOk = 1;
                $target_file = "../media/" . basename($_FILES["timage"]["name"]);
                $imagename = implode("_", explode(" ", $data['f_name'])) . "_" . $data['l_name'];
                $fileData = pathinfo(basename($_FILES["timage"]["name"]));
                $insName = self::getInstitutionName($data['institution']);
                
                $dirPath = "../media/institution/" . $insName[0]['institute'];
                if (!file_exists($dirPath)) {
                    mkdir($dirPath, 0777, true);
                }
                $fileName = $imagename . '.' . $fileData['extension'];

                $target_path = ("../media/institution/" . $insName[0]['institute'] . '/' . $fileName);
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                if (file_exists($target_path)) {
                    $uploadOk = 0;
                }
                $check = getimagesize($_FILES["timage"]["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                if ($_FILES["timage"]["size"] > 500000) {
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $uploadOk = 0;
                }
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["timage"]["tmp_name"], $target_path)) {
                        $query = "INSERT INTO teachers SET  first_name='" . $data['f_name'] . "' ,last_name='" . $data['l_name'] . "', age= '" . $data['age'] . "',sex='" . $data['sex'] . "'"
                                . ",specialization = '" . $data['specialization'] . "',address = '" . $data['address'] . "',highest_qual = '" . $data['h_quali'] . "',contact = '" . $data['contact'] . "'"
                                . ", institution_id = '" . $data['institution'] . "' ,image='" . $fileName . "',email='" . $data['email'] . "',is_featured='" . $data['is_featured'] . "'";
                        $result = queryRunner::doInsert($query);
                        return $result;
                    } else {
                        return 0;
                    }
                }
            }
        } else {
            return 2;
        }
    }

    public static function checkInstitute($iName, $iEmail) {
        $query = "SELECT institute FROM institutions WHERE email = '" . $iEmail . "' AND institute = '" . ($iName) . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    //register New Institution
    //handling Institution actions
    public static function registerInstitution($data) {
        //print_r($data);exit;
        $checkIns = self::checkInstitute($data['email'], $data['institute']);
        if ($_FILES["instImage"]["error"] == 4) {
            if (isset($data['institute']) && isset($data['subjects'])) {
                //to register institution without image
                if ($data['action'] == 'registerInstitution') {
                    if (empty($checkIns)) {
                        $query = 'INSERT INTO institutions (institute,subjects,description,contact,email,address,status,is_featured)values("' . $data["institute"] . '","' . $data["subjects"] . '","' . $data["description"] . '","' . $data["contact"] . '","' . $data['email'] . '","' . $data["address"] . '","' . $data["status"] . '","' . $data['is_featured'] . '")';
                        $result = queryRunner::doInsert($query);
                    } else {
                        return 2;
                    }
                } else {
                    //to update institution without image
                    $query = 'UPDATE institutions SET institute= "' . $data["institute"] . '",subjects= "' . $data["subjects"] . '",description="' . $data["description"] . '" ,contact= "' . $data["contact"] . '",address= "' . $data["address"] . '",status= "' . $data["status"] . '",is_featured="' . $data['is_featured'] . '",email= "'.$data['email'].'"  WHERE id="' . $data['editInstituteId'] . '"';
                    $result = queryRunner::doUpdate($query);
                }
                return $result;
            }
        } else {
            $uploadOk = 1;
            $target_file = "../media/" . basename($_FILES["instImage"]["name"]);
            $imagename = implode("_", explode(" ", $data['institute']));
            $fileData = pathinfo(basename($_FILES["instImage"]["name"]));
            $dirPath = "../media/institution/" . $data['institute'];
            if (!file_exists($dirPath)) {
                mkdir($dirPath, 0777, true);
            }
            $fileName = $imagename . '.' . $fileData['extension'];

            $target_path = ("../media/institution/" . $data["institute"] . '/' . $fileName);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if (file_exists($target_path)) {
                $uploadOk = 0;
            }
            $check = getimagesize($_FILES["instImage"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($_FILES["instImage"]["size"] > 500000) {
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $uploadOk = 0;
            }
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["instImage"]["tmp_name"], $target_path)) {
                    //to register institution with image
                    if ($data['action'] == 'registerInstitution') {
                        if (empty($checkIns)) {
                            $query = 'INSERT INTO institutions (institute,subjects,description,contact,email,address,image,status,is_featured)values("' . $data["institute"] . '","' . $data["subjects"] . '","' . $data["description"] . '","' . $data["contact"] . '","' . $data['email'] . '","' . $data["address"] . '","' . $fileName . '","' . $data["status"] . '","' . $data['is_featured'] . '")';
                            $result = queryRunner::doInsert($query);
                        } else {
                            return 2;
                        }
                    } else {
                        //to update institution with image
                        $query = 'UPDATE institutions SET institute= "' . $data["institute"] . '",subjects= "' . $data["subjects"] . '",description="' . $data["description"] . '" ,contact= "' . $data["contact"] . '",address= "' . $data["address"] . '",image= "' . $fileName . '",status= "' . $data["status"] . ',email="' . $data['email'] . '",is_featured = "' . $data['is_featured'] . '" WHERE id="' . $data['editInstituteId'] . '"';
                        $result = queryRunner::doUpdate($query);
                    }
                    return $result;
                } else {
                    return 0;
                }
            }
        }
    }

    public function getInstitutionDetails() {
        $query = "SELECT * FROM institutions where status=1";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    //update Teacher 
    public static function updateTeacher($data) {

        if ($_FILES["timage"]["error"] == 4) {
            $query = "UPDATE teachers SET  first_name='" . $data['f_name'] . "' ,last_name='" . $data['l_name'] . "', age= '" . $data['age'] . "',sex='" . $data['sex'] . "'"
                    . ",specialization = '" . $data['specialization'] . "',address = '" . $data['address'] . "',highest_qual = '" . $data['h_quali'] . "',contact = '" . $data['contact'] . "'"
                    . ", institution_id = '" . $data['institution'] . "',email='" . $data['email'] . "',is_featured='" . $data['is_featured'] . "'  WHERE id = '" . $data['tid'] . "'";
            $result = queryRunner::doInsert($query);
            return $result;
        } else {
            
            $uploadOk = 1;
            $target_file = "../media/" . basename($_FILES["timage"]["name"]);
            $imagename = implode("_", explode(" ", $data['f_name'])) . "_" . $data['l_name'];
            $fileData = pathinfo(basename($_FILES["timage"]["name"]));
            $insName = self::getInstitutionName($data['institution']);
            
            $dirPath = "../media/institution/" . $insName[0]['institute'];
            
            $fileName = $imagename . '.' . $fileData['extension'];
            $target_path = ("../media/institution/" . $insName[0]['institute'] . '/' . $fileName);
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            
            if (file_exists($target_path)) {
                $uploadOk = 0;
            }
            $check = getimagesize($_FILES["timage"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($_FILES["timage"]["size"] > 500000) {
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $uploadOk = 0;
            }
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["timage"]["tmp_name"], $target_file)) {
                    $query = "UPDATE teachers SET  first_name='" . $data['f_name'] . "' ,last_name='" . $data['l_name'] . "', age= '" . $data['age'] . "',sex='" . $data['sex'] . "'"
                            . ",specialization = '" . $data['specialization'] . "',address = '" . $data['address'] . "',highest_qual = '" . $data['h_quali'] . "',contact = '" . $data['contact'] . "'"
                            . ", institution_id = '" . $data['institution'] . "' ,image='" . $fileName . "',email='" . $data['email'] . "',is_featured='" . $data['is_featured'] . "' WHERE id = '" . $data['tid'] . "'";
                    $result = queryRunner::doInsert($query);
                    return $result;
                } else {
                    return 0;
                }
            }
        }
    }

    public function getTeacherList() {
        $query = "SELECT t.*,i.institute FROM teachers AS t INNER JOIN institutions AS i ON i.id = t.institution_id where t.status=1";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function getTeacherDetails($id) {
        if (isset($id) && !empty($id)) {
            $query = "SELECT * FROM teachers WHERE id= '" . $id . "' AND status=1";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function getInstituteDetails($id) {
        if (isset($id) && !empty($id)) {
            $query = "SELECT * FROM institutions WHERE id= '" . $id . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function getInstituteid($name) {

        $query = "SELECT DISTINCT id FROM institutions WHERE institute= '" . $name . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function registerStudent($data) {
        $id = $this->getInstituteid($data['ins_name']);
        $id = $id[0]['id'];
        //debug($_FILES);exit();
        //$path = $_FILES['studentSheet']['name'];
        $csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/comma-separated-values', 'text/tsv');
        if (!empty($_FILES['studentSheet']['name']) && in_array($_FILES['studentSheet']['type'], $csvMimes)) {
            if (is_uploaded_file($_FILES['studentSheet']['tmp_name'])) {

                //open uploaded csv file with read only mode
                $csvFile = fopen($_FILES['studentSheet']['tmp_name'], 'r');

                //skip first line
                fgetcsv($csvFile);

                //parse data from csv file line by line
                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    //check whether member already exists in database with same email
                    //for($i = 0 ;$i<count($line);$i++)
                    //debug($line);exit();
                    $query = "INSERT INTO students SET  institute_id ='" . $id . "', first_name = '" . $line[0] . "',last_name='" . $line[1] . "'"
                            . ",fathers_name  = '" . $line[2] . "',address = '" . $line[5] . "',email='$line[4]',contact_number = '" . $line[3] . "'";
                    $result = queryRunner::doInsert($query);
                    //return $result;
                }

                //close opened csv file
                fclose($csvFile);
                return $result;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

    //function for student listing
    public function getStudentList() {
        $query = "SELECT * FROM students where status=1";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function addTest($test) {
        if ((isset($test['test_name']) && !empty($test['test_name'])) && (isset($test['institution']) && !empty($test['institution']))) {
            $query = "SELECT * FROM tests WHERE test_name= '" . $test['test_name'] . "' AND institute_id='" . $test['institution'] . "'";
        }
        $result = queryRunner::doSelect($query);
        if (empty($result)) {
            $sql = "INSERT INTO tests (test_name,institute_id,max_marks) values ('" . $test['test_name'] . "','" . $test['institution'] . "','" . $test['max_marks'] . "')";
            $result = queryRunner::doInsert($sql);
            return $result;
        } else {
            return false;
        }
    }

    public function uploadResult($data) {
        //debug($_FILES);
        //$path = $_FILES['studentSheet']['name'];
        //debug($data);exit;
        $csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/comma-separated-values', 'text/tsv');
        if (!empty($_FILES['resultSheet']['name']) && in_array($_FILES['resultSheet']['type'], $csvMimes)) {
            if (is_uploaded_file($_FILES['resultSheet']['tmp_name'])) {

                //open uploaded csv file with read only mode
                $csvFile = fopen($_FILES['resultSheet']['tmp_name'], 'r');

                //skip first line
                fgetcsv($csvFile);
                //parse data from csv file line by line
                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    //check whether member already exists in database with same email
                    //for($i = 0 ;$i<count($line);$i++)
                    $query = "INSERT INTO result SET institute_id = '" . $data['institution'] . "', test_id = '" . $data['test'] . "',student_reg_no = '" . $line['0'] . "',marks_obtained = '" . $line['1'] . "'";
                    $result = queryRunner::doInsert($query);
                    //return $result;
                }

                //close opened csv file
                fclose($csvFile);
                return $result;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

    public function uploadAttendance($data) {
        $csvMimes = array('application/vnd.ms-excel', 'text/plain', 'text/csv', 'text/comma-separated-values', 'text/tsv');
        if (!empty($_FILES['uploadAttendance']['name']) && in_array($_FILES['uploadAttendance']['type'], $csvMimes)) {
            if (is_uploaded_file($_FILES['uploadAttendance']['tmp_name'])) {
                $csvFile = fopen($_FILES['uploadAttendance']['tmp_name'], 'r');
                fgetcsv($csvFile);
                while (($line = fgetcsv($csvFile)) !== FALSE) {
                    //check whether member already exists in database with same email
                    //for($i = 0 ;$i<count($line);$i++)

                   $query = "INSERT INTO student_attendance SET institute_id = '" . $data['institution'] . "', student_reg_no = '" . $line['0'] . "',month = '" . $data['month'] . "',present = '" . $line['1'] . "',absent ='" . $line['2'] . "'";
                   $result = queryRunner::doInsert($query);
                    //return $result;
                }
                fclose($csvFile);
                return $result;
            } else {
                return 0;
            }
        } else {
            return -1;
        }
    }

    public static function getInstitutionName($id) {
        $query = "SELECT institute FROM institutions where id = '" . $id . "' AND status=1";
        $result = queryRunner::doSelect($query);
        if ($result) {
            return $result;
        }
        return false;
    }

    public function getTestListAsPerInstitute($instituteId) {
        $query = "SELECT * FROM tests where institute_id = '" . $instituteId . "'";
        $result = queryRunner::doSelect($query);
        if ($result) {
            return $result;
        }
        return false;
    }

}

?>