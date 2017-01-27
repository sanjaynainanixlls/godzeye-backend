<?php

include dirname(dirname(__FILE__)) . '/config/config.php';

//function to debug
function debug($val) {
    echo '<pre>';
    print_r($val);
}

//convert to slug
function toSlug($value){
   $slugVal = implode("_", explode(" ", $value));
   return $slugVal;
}
//get all details of Institutes
function getInstituteList() {
    $query = "SELECT * FROM institutions WHERE status=1";
    $result = queryRunner::doSelect($query);
    if(!empty($result)){
        return $result;
    }
    return false;
}

function getInstituteData($id){
    $query = "SELECT * FROM institutions WHERE status=1 AND id='$id'";
    $result = queryRunner::doSelect($query);
    if(!empty($result)){
        return $result;
    }
    return false;
    
}

function getTeacherData($instituteId,$teacherId){
    $cond = '';
    if($instituteId != '' && $teacherId == ''){
        $cond = "AND institution_id='$instituteId'";
    }
    if($instituteId == '' && $teacherId != ''){
        $cond = "AND id='$teacherId'";
    }
    $query = "SELECT * FROM teachers WHERE status=1 $cond";
    $result = queryRunner::doSelect($query);
    if(!empty($result)){
        return $result;
    }
    return false;
    
}
