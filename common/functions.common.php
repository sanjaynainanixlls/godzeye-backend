<?php
include dirname(dirname(__FILE__)) . '/config/config.php';

//function to debug
function debug($val) {
    echo '<pre>';
    print_r($val);
}

function getInstituteList() {
    $query = "SELECT id,institute FROM institutions WHERE status=1";
    $result = queryRunner::doSelect($query);
    return $result;
}
