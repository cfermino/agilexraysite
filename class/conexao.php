<?php
 
 try{
    $conn = new PDO("mysql:host=localhost;dbname=agenc215_agilexray", "agenc215_agile", "y7k3x678@@#$%"); 
 }catch(Exception $e){
    echo $e->getMessage();
 }
?>