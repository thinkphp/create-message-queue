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
           $obj->query( $sql ); 
     }

     function run_queue() {
           global $obj;
           $sql = "select * from `queue`";
           $obj->query( $sql ); 

           while(($row=$obj->fetch()) !== false)  {
                  $id = $row['id'];  
                  $func = $row['func'];
                  $argsxml = $row['args'];

                  $dom = new DomDocument();
                  $dom->loadXML($argsxml);

                  $args = array();

                  foreach($dom->getElementsByTagName("argument") as $node) {

                          $args[] = $node->nodeValue;
                  }  
echo"<pre>";
print_r($args);
echo"</pre>";
                  //call_user_func_array($func, args);           
           }
    }

    run_queue(); 
?>