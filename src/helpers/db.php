<?php 

function connectDB () {
    $host = 'containers-us-west-114.railway.app';
    $user = 'root';
    $password = '3o42AtNsB8hrUmzzoHBN';
    $dbname = 'railway';

    $db = NEW PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    return $db;
}