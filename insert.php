<?php
include('db.php');
    include('NewChat.php');

    if(isset($_POST['name'])&&isset($_POST['detail'])){
    $db=new NewChat ();
    $db->connect();
    $db->insert($_POST['name'],$_POST['detail']);
    echo 'sss';
    }
    else{
        echo 'not';
    }


?>