<?php 
if(!isset($_SESSION)){
    session_start();
} if(!$_SESSION){
    header('Location: ./../index.php');
}?>