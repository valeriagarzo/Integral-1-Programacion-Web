<?php
session_start(); 

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}

//no he echo esta wea
?>