<?php

class autoCompleteWord {

    public function getToken($token) {
        echo $query = "SELECT institute FROM institutions WHERE institute LIKE '" . $token . "%' ORDER BY id ASC";
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