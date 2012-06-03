<?php

interface Database {
    public function connect($host, $user, $pass, $db);
    public function query( $sql );
    public function fetch();
    public function close();
}

class MySQL implements Database {

    public function connect($host, $user, $pass, $db) {

           $this->link = mysql_connect($host, $user, $pass);

           if(!$this->link) {
               throw new Exception("Could not connect to database: ", $db); 
           }

           $db = mysql_select_db($db, $this->link);
           if(!$db) {
               throw new Exception("Could not select database: ", $db); 
           }
    }

    public function query( $sql ) {
         
           $this->results = mysql_query( $sql );

           if(!$this->results) {

               throw new Exception("mysql error: ". mysql_error());
           }
    }

    public function fetch() {

           if(false !== ($row = mysql_fetch_assoc($this->results))) {

                 return $row;

           } else {

                 return false;
           }

        return $arr;
    }

    public function close() {

          mysql_close($this->link);
    }
}

?>