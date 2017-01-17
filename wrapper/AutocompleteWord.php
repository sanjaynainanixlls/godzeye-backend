<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AutoCompleteWord {

    public function getToken($token) {
        $query = "SELECT institute FROM institutions WHERE institute LIKE '" . $token . "%' ORDER BY id ASC";
        $result = queryRunner::doSelect($query);
        if (count($result) < 5) {
            $qry = "SELECT institute FROM institutions WHERE institute LIKE '%" . $token . "%' ORDER BY id ASC";
            $result = queryRunner::doSelect($qry);
        }
        if ($result) {
            foreach ($result as $key => $value) {
                $res[] = $value['institute'];
            }
            return $res;
        }
        return false;
    }

}

?>