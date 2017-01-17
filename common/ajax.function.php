<?php

include dirname(dirname(__FILE__)) . '/config/config.php';
$postParams = Functions::getPostParams();

if(isset($postParams['instituteId']) && !empty($postParams['instituteId'])){
    getTestList($postParams['instituteId']);
}

function getTestList($instituteId) {
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getTestListAsPerInstitute($instituteId);
    echo json_encode($result);
}

