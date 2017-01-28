<?php

include dirname(dirname(__FILE__)) . '/config/config.php';
class autocomplete{
    public function execute($token){
        $AutoObj = new autoCompleteWord();
        $result = $AutoObj->getToken($token);
        echo json_encode($result);
    }
}
$token = $_GET['term'];
$AutoCompleteObj = new autocomplete();
$AutoCompleteObj->execute($token);
?>