<?php

include dirname(dirname(__FILE__)) . '/config/config.php';

//function to debug
function debug($val) {
    echo '<pre>';
    print_r($val);
}

//get all details of Institutes
function getInstituteList() {
    $query = "SELECT * FROM institutions WHERE status=1";
    $result = queryRunner::doSelect($query);
    return $result;
}

