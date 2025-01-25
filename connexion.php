<?php

define("DATABASE_HOST" , "localhost");
define("DATABASE_NAME" , "anatt");
define("DATABASE_USER" , "root");
define("DATABASE_PASSWORD" , "");

try {
    $db = new PDO("mysql:host=".DATABASE_HOST.";dbname=".DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de donnée");
}

?>