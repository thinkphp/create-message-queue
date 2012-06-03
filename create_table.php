<?php

    require_once('database.class.php');

    $obj = new MySQL();

    $obj->connect("localhost","root","","aldovet");

$table = "queue";

$sql = <<<SQL
 DROP TABLE IF EXISTS `queue`;
 CREATE TABLE `queue`(
    id MEDIUMINT NOT NULL AUTO_INCREMENT,
    func TEXT,
    args TEXT,
    PRIMARY KEY(id)     
 );
SQL;

try{
    //$obj->query("insert into $table(func,args) VALUES('asdas','asdasda')");
$obj->query("select * from $table");
print_r($row = $obj->fetch());

}catch(Exception $e){

    echo$e->getMessage();
}
    $obj->close();

?>