<?php
    include('db.php');
    include('NewChat.php');

    $db=new NewChat ();
    $db->connect();
    $db->query("select NewChat_name from NewChat where NewChat_status='1' and NewChat_name!='".$_POST['name']."' group by NewChat_name");
    echo '<center>Listname</center>';
    echo '*'.$_POST['name']."*<br>";

    //"id: " . $row["Post_id"]. 
    // output data of each row
    while($row = mysqli_fetch_array($db->result)) {
        
        echo   $row["NewChat_name"]."<br>";
        
    }

?>