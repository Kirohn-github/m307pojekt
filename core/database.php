<?php

$dbConnection = null;
function db()
{
  global $dbConnection;
  if(!$dbConnection){
    try {
        $dbConnection = new PDO('mysql:host=localhost;dbname=kurseictbz_30712;charset=utf8;', 'kurseictbz_30712', 'db_307_pw_12');
        //$dbConnection = new PDO('mysql:host=localhost;dbname=videothek;charset=utf8;', 'root', '');
    } catch (PDOException $e) {
        die('Keine Verbindung zur Datenbank möglich: ' . $e->getMessage());
    }

    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  return $dbConnection;
}
