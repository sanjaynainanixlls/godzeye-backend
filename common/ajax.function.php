<?php

include dirname(dirname(__FILE__)) . '/config/config.php';
$postParams = Functions::getPostParams();

if((isset($postParams['institute']) && !empty($postParams['institute'])) && (isset($postParams['testTerm']) && !empty($postParams['testTerm']))){
    getTests($postParams['institute'],$postParams['testTerm']);
}

function getTests($institute,$testTerm) {
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getTestList($institute,$testTerm);
    echo json_encode($result);
}

if((!empty($postParams['selectedInst'])) && (!empty($postParams['selectedTest'])) && (!empty($postParams['regNo']))){
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getMarks($postParams['selectedInst'],$postParams['selectedTest'],$postParams['regNo']);
    echo json_encode($result);
}
if((!empty($postParams['selectedInst'])) && (!empty($postParams['selectedMonth'])) && (!empty($postParams['regNo']))){
    $userDataHandlerObj = new userDataHandler();
    $result = $userDataHandlerObj->getAttendance($postParams['selectedInst'],$postParams['selectedMonth'],$postParams['regNo']);
    echo json_encode($result);
}
    