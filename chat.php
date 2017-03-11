<?php
    include('db.php');
    include('NewChat.php');

    $db=new NewChat ();
    $db->connect();
    $db->query("select * from NewChat");
    

    //"id: " . $row["Post_id"]. 
    // output data of each row
    
    while($row = mysqli_fetch_array($db->result)) {
        
        echo $row["NewChat_name"]." : ". "  " . $row["NewChat_detail"]. "<br>"."<span style='font-size:10px;'>(".$row['NewChat_date'] .")</span><br>";
       
    }
    

?>