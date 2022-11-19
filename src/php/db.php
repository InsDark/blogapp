<?php 

function connectDB () {
    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'blogpp';

    $db = NEW PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    return $db;
}