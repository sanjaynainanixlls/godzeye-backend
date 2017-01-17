<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include dirname(dirname(__FILE__)) . '/config/config.php';
class Autocomplete{
    public function execute($token){
        $AutoObj = new AutoCompleteWord();
        $result = $AutoObj->getToken($token);
        echo json_encode($result);
    }
}
$token = $_GET['term'];
$AutoCompleteObj = new Autocomplete();
$AutoCompleteObj->execute($token);
?>