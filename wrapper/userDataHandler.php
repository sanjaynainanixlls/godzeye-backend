<?php

class userDataHandler {

    public static function authenticateUser($user, $pwd) {
        $query = "SELECT user_name FROM user WHERE user_name = '" . $user . "' AND password = '" . ($pwd) . "'";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function registerTeacher($data) {

        if ($_FILES["timage"]["error"] == 4) {
            $query = "INSERT INTO teachers SET  first_name='" . $data['f_name'] . "' ,last_name='" . $data['l_name'] . "', age= '" . $data['age'] . "',sex='" . $data['sex'] . "'"
                    . ",specialization = '" . $data['specialization'] . "',address = '" . $data['address'] . "',highest_qual = '" . $data['h_quali'] . "',contact = '" . $data['contact'] . "'"
                    . ", institution_id = '" . $data['institution'] . "' ,image=''";
            $result = queryRunner::doInsert($query);
            return $result;
        } else {
            $uploadOk = 1;
            $target_file = "../media/" . basename($_FILES["timage"]["name"]);
            $imagename = implode("_", explode(" ", $data['f_name']));
            $fileData = pathinfo(basename($_FILES["timage"]["name"]));

            $fileName = $imagename . '.' . $fileData['extension'];

            $target_path = ("../media/" . $fileName);
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
                            . ", institution_id = '" . $data['institution'] . "' ,image='" . $fileName . "'";
                    $result = queryRunner::doInsert($query);
                    return $result;
                } else {
                    return 0;
                }
            }
        }
    }
    
    public function getTeacherList() {
        $query = "SELECT * FROM teachers where status=1";
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
    
    //register New Institution
    //handling Institution actions
    public static function registerInstitution($data) {
        //print_r($data);exit;

        if ($_FILES["instImage"]["error"] == 4) {
            if (isset($data['institute']) && isset($data['subjects'])) {
                //to register institution without image
                if($data['action'] == 'registerInstitution'){
                    $query = 'INSERT INTO institutions (institute,subjects,founder,contact,status)values("' . $data["institute"] . '","' . $data["subjects"] . '","' . $data["founder"] . '","' . $data["contact"] . '","' . $data["status"] . '")';
                    $result = queryRunner::doInsert($query);
                }else{
                    //to update institution without image
                    $query = 'UPDATE institutions SET institute= "' . $data["institute"] . '",subjects= "' . $data["subjects"] . '",founder="' . $data["founder"] . '" ,contact= "' . $data["contact"] . '",status= "' . $data["status"] . '" WHERE id="'.$data['editInstituteId'].'"';
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
                    if($data['action'] == 'registerInstitution'){
                        $query = 'INSERT INTO institutions (institute,subjects,founder,contact,image,status)values("' . $data["institute"] . '","' . $data["subjects"] . '","' . $data["founder"] . '","' . $data["contact"] . '","' . $fileName . '","' . $data["status"] . '")';
                        $result = queryRunner::doInsert($query);
                    }else{
                        //to update institution with image
                        $query = 'UPDATE institutions SET institute= "' . $data["institute"] . '",subjects= "' . $data["subjects"] . '",founder="' . $data["founder"] . '" ,contact= "' . $data["contact"] . '",image= "' . $fileName . '",status= "' . $data["status"] . '" WHERE id="'.$data['editInstituteId'].'"';
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
                    . ", institution_id = '" . $data['institution'] . "'  WHERE id = '".$data['tid']."'";
            $result = queryRunner::doInsert($query);
            return $result;
        } else {
            $uploadOk = 1;
            $target_file = "../media/" . basename($_FILES["timage"]["name"]);
            $imagename = implode("_", explode(" ", $data['f_name']));
            $fileData = pathinfo(basename($_FILES["timage"]["name"]));

            $fileName = $imagename . '.' . $fileData['extension'];

            $target_path = ("../media/" . $fileName);
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
                    $query = "UPDATE teachers SET  first_name='" . $data['f_name'] . "' ,last_name='" . $data['l_name'] . "', age= '" . $data['age'] . "',sex='" . $data['sex'] . "'"
                            . ",specialization = '" . $data['specialization'] . "',address = '" . $data['address'] . "',highest_qual = '" . $data['h_quali'] . "',contact = '" . $data['contact'] . "'"
                            . ", institution_id = '" . $data['institution'] . "' ,image='" . $fileName . "' WHERE id = '".$data['tid']."'";
                    $result = queryRunner::doInsert($query);
                    return $result;
                } else {
                    return 0;
                }
            }
        }
    }    
    
    public function getTeacherList() {
        $query = "SELECT * FROM teachers where status=1";
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
    
}

?>