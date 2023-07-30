<?php
class Connect {

    protected function conn() {
        try {
            $user = 'root';
            $pass = '';
            $dbh = new PDO('mysql:host=localhost;dbname=users', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
        } 
        catch (PDOexception $e){
            echo 'error:' . $e->getMessage();
            die();
        }
       
    }
}

?>