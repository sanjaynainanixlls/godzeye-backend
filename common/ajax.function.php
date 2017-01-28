<?php

include dirname(dirname(__FILE__)) . '/config/config.php';
$postParams = Functions::getPostParams();

if(isset($postParams['institute']) && !empty($postParams['institute']) && !isset($postParams['testTerm'])){
    getTestList($postParams['institute']);
}
if((isset($postParams['institute']) && !empty($postParams['institute'])) && (isset($postParams['testTerm']) && !empty($postParams['testTerm']))){
    getTests($postParams['institute'],$postParams['testTerm']);
}

function getTestList($institute) {
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getTestListByInstitute($institute);
    echo json_encode($result);
}

function getTests($institute,$testTerm) {
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getTestList($institute,$testTerm);
    echo json_encode($result);
}

