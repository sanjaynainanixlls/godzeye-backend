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

    //register New Institution
    public static function registerInstitution($data) {
//        debug($data);exit;
//        $data['userId'] = $_SESSION['userId'];
        $city = '';
        if (isset($data['institute']) && isset($data['subjects'])) {
            echo $query = 'INSERT INTO institutions (institute,subjects,founder,contact,image,status)values("' . $data["institute"] . '","' . $data["subjects"] . '","' . $data["founder"] . '","' . $data["contact"] . '","' . $data["image"] . '","' . $data["status"] . '")';
            $result = queryRunner::doInsert($query);
            return $result;
        }
//            $sql1 = "SELECT DISTINCT city FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAlloted'] . "' AND isCheckout = '0'";
//            $cityData = queryRunner::doSelect($sql1);
//            if (isset($cityData)) {
//                for ($i = 0; $i < count($cityData); $i++) {
//                    $city .= $cityData[$i]['city'] . ",";
//                }
//                $city = rtrim($city, ",");
//                $qry = "update rooms set occupied = occupied + " . $data['numberOfPeople'] . " , city = '" . $city . "' where roomNumber = '" . $data['roomNumberAlloted'] . "'";
//                $res = queryRunner::doUpdate($qry);
//            }
//        } else {
//            $query = "UPDATE guest SET roomNumberAllotted = '" . $data['roomNumberAlloted'] . "' WHERE id ='" . $data['id'] . "'";
//            $result = queryRunner::doUpdate($query);
//            $sql1 = "SELECT DISTINCT city FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAlloted'] . "' AND isCheckout = '0'";
//            $cityData = queryRunner::doSelect($sql1);
//            if (isset($cityData)) {
//                for ($i = 0; $i < count($cityData); $i++) {
//                    $city .= $cityData[$i]['city'] . ",";
//                }
//                $city = rtrim($city, ",");
//                $qry = "update rooms set occupied = occupied + " . $data['numberOfPeople'] . " , city = '" . $city . "' where roomNumber = '" . $data['roomNumberAlloted'] . "'";
//                $res = queryRunner::doUpdate($qry);
//            }
//        }
//        if (!empty($result)){
//            $query = "SELECT id,roomNumberAllotted FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAlloted'] . "' AND isCheckout = '0' AND name = '".$data['name']."' AND phoneNumber = '".$data['phoneNumber']."'";
//            $result = queryRunner::doSelect($query);
//            if(!empty($result)){
//                return $result;
//            }
//        }
    }

    public function getInstitutionDetails() {
        $query = "SELECT * FROM institutions";
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function getCompleteStatusById($id) {
        if (isset($id) && !empty($id)) {
            $query = "SELECT * FROM guest Where id= '" . $id . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function checkIfInventoryAlloted($id) {
        if (isset($id) && !empty($id)) {
            $query = "SELECT * FROM inventory Where isReturned = '0' AND guestUserId= '" . $id . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public function checkoutUserById($id) {
        if (isset($id['checkoutId']) && !empty($id['checkoutId'])) {
            $query = "SELECT * FROM guest Where id= '" . $id['checkoutId'] . "'";
        }
        $result = queryRunner::doSelect($query);
        return $result;
    }

    public static function entryRoom($data) {

        $query = "UPDATE rooms SET ";
    }

    public function checkOutUser($data) {
        $city = '';
        if ((isset($data['userId']) && !empty($data['userId']))) {
            $query1 = "UPDATE guest SET isCheckout = '1' WHERE id = '" . $data['userId'] . "'";
            $userData = queryRunner::doUpdate($query1);
            if ($userData['status'] == 1) {
                $sql1 = "SELECT DISTINCT city FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAllotted'] . "' AND isCheckout = '0'";
                $cityData = queryRunner::doSelect($sql1);
                for ($i = 0; $i < count($cityData); $i++) {
                    $city .= $cityData[$i]['city'] . ",";
                }
                $city = rtrim($city, ",");
                $qry = "update rooms set occupied = occupied - " . $data['numberOfPeople'] . " , city = '" . $city . "' where roomNumber = '" . $data['roomNumberAllotted'] . "'";
                $res = queryRunner::doUpdate($qry);
                return $res;
            }
        }
    }

    public function addNewUser($data) {
        $query = "SELECT username FROM user WHERE username ='" . $data['username'] . "'";
        $result = queryRunner::doSelect($query);
        if (empty($result)) {
            $query = "INSERT into user (name,username,password,role) values ('" . $data['name'] . "','" . $data['username'] . "','" . $data['password'] . "','" . $data['role'] . "')";
            $result = queryRunner::doInsert($query);
            return $result;
        }
        return false;
    }

    public function allotInventoryToUser($data) {
        $query = "INSERT INTO inventory (guestUserId,mattress,pillow,bedsheet,quilt,lockNkey,dasCards,isReturned,createdBy,createdTime)"
                . " values('" . $data['userId'] . "','" . $data['mattress'] . "','" . $data['pillow'] . "','" . $data['bedsheet'] . "','" . $data['blanket'] . "','" . $data['lock'] . "','" . $data['dasCards'] . "','0','" . $data['createdBy'] . "',now())";
        $result = queryRunner::doInsert($query);
        if (!empty($result)) {
            $totalAmount = $data['mattress'] + ($data['pillow'] / 2) + $data['bedsheet'] + $data['blanket'] + $data['lock'] + ($data['dasCards'] / 2);
            $totalAmount = $totalAmount * 100;
            $result = array($data['userId'], $totalAmount);
            return $result;
        }
        return false;
    }

    public function allRoomStatus() {
        $query = "SELECT * FROM rooms";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function todayCheckOutData() {
        $today = date('d/n/Y');
        $query = "SELECT * FROM guest WHERE dateOfDeparture = '" . $today . "' AND isCheckout = '0'";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function checkoutUsers($data) {
        $city = '';
        if ((isset($data['id']) && !empty($data['id']))) {
            $query1 = "UPDATE guest SET isCheckout = '1' WHERE id IN ('" . implode("','", $data['id']) . "')";
            $userData = queryRunner::doUpdate($query1);
            if ($userData['status'] == 1) {
                for ($i = 0; $i < count($data['roomNumberAllotted']); $i++) {
                    $sql1 = "SELECT DISTINCT city FROM guest WHERE roomNumberAllotted = '" . $data['roomNumberAllotted'][$i] . "' AND isCheckout = '0'";
                    $cityData = queryRunner::doSelect($sql1);
                    $city = '';
                    for ($j = 0; $j < count($cityData); $j++) {
                        $city .= $cityData[$j]['city'] . ",";
                    }
                    $city = rtrim($city, ",");
                    $qry = "update rooms set occupied = occupied - " . $data['numberOfPeople'][$i] . " , city = '" . $city . "' where roomNumber = '" . $data['roomNumberAllotted'][$i] . "'";
                    $res = queryRunner::doUpdate($qry);
                    unset($cityData);
                }
                return $res;
            }
        }
    }

    public function allCheckOutData() {
        $query = "SELECT * FROM guest WHERE isCheckout = '1'";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function notCheckedOutData() {
        $query = "SELECT * FROM guest WHERE isCheckout = '0'";
        $result = queryRunner::doSelect($query);
        if (!empty($result)) {
            return $result;
        } else {
            return FALSE;
        }
    }

    public function getinventoryDetailsById($id) {
        $query = "SELECT *,(((pillow/2))+(mattress)+(quilt)+(bedsheet)+(lockNkey)+(dasCards/2))*100 as totalAmount FROM inventory where guestUserId='" . $id . "' AND isReturned='0' ";
        $result = queryRunner::doSelect($query);
        if (!empty($result))
            return $result;

        return false;
    }

    public function releaseInventory($data) {
        $query = "UPDATE inventory set isReturned='1' where guestUserId='" . $data['userId'] . "'";
        $result = queryRunner::doUpdate($query);
        $returnArray = array($data['returnAmount'], $data['userId']);
        return $returnArray;
    }

    public function tallyCash($data) {
        $query1 = "SELECT (sum(pillow)/2)+SUM(mattress)+SUM(quilt)+SUM(bedsheet)+SUM(lockNkey)+SUM(dasCards) as moneyDeposits FROM inventory WHERE isReturned='0' AND createdBy='" . $data['userId'] . "'";
        $result1 = queryRunner::doSelect($query1);
        //$result = (($result1[0]['moneyDeposits']) - ($result2[0]['moneyDeposits']));
        //
        if (is_null($result1[0]['moneyDeposits'])) {
            $result = 0;
        } else {
            $result = ($result1[0]['moneyDeposits'] * 100);
        }
        return $result;
    }

}

?>