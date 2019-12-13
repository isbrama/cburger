<?php

class Database
{
  public static function connect(){
    //local
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "burgercodedb";
    $db = new mysqli($servername, $username, $password, $dbname);*/
    $db = new mysqli('localhost', 'isbramac_admin', 'KZQEecVEbGLR', 'isbramac_cburger');

    $db->Query("SET NAMES'utf8'");

    return $db;

  }

}
 ?>
