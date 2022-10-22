<?php

$server = 'localhost3306';
$username = 'root';
$password = '';
$database = 'databasealdair';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }



?>