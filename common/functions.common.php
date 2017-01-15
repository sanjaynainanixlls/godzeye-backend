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

function getFileDelimiter($file, $checkLines = 2) {
    //$file = new SplFileObject($file);
    $delimiters = array(
        'comma' => ',',
        'tab' => '\t',
        'semicolon' => ';',
        'sep' => '|',
        'colon' => ':'
    );
    $results = array();
    //for($i = 0; $i <= $checkLines; $i++){
    $line = fgetcsv($file);
    $rawLine = $line;
    $count = 0;
    foreach ($delimiters as $key => $delimiter) {
        $regExp = '/[' . $delimiter . ']/';
        $fields = preg_split($regExp, $line[0]);
        if (count($fields) > 1) {
            if (!empty($results[$delimiter])) {
                $results[$delimiter] ++;
            } else {
                $results[$key] = 1;
            }
        }
        $count++;
    }
    //}
    $results = array_keys($results, max($results));
    return array('delem' => $results[0], 'rawCols' => $rawLine);
}

function filterArrayKeysSpace($array) {
    $response = array();
    foreach ($array as $key => $value) {
        $response[] = trim($value);
    }
    return $response;
}

function getTestNameAndId(){
    $query = "SELECT id,test_name FROM tests";
    $result = queryRunner::doSelect($query);
    return $result;
}
