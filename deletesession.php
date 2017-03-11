<?php 
session_start();
include('db.php');
include('NewChat.php');
    $db=new NewChat ();
    $db->connect();
    $db->logout($_SESSION['name']);
    $db->close_connect();
session_destroy();
?>