<?php

     require_once('database.class.php');
     $obj = new MySQL(); 
     $obj->connect("localhost","root","","aldovet");

     function add_to_queue($func, $args) {
           global $obj;

           $dom = new DomDocument();
           $root = $dom->createElement("arguments");
                   foreach($args as $argtext) {
                         $arg = $dom->createElement("argument");
                         $arg->appendChild($dom->createTextNode($argtext));
                         $root->appendChild($arg);
                   } 

           $dom->appendChild($root);
           $xml = $dom->saveXML();

           $sql = "INSERT INTO `queue`(func, args) VALUES('$func','$xml')";
           $obj->query($sql); 
     }

     function run_queue() {
           global $obj;
    }

    add_to_queue("mail",array("adrian","statescu")); 
?>