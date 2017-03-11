<?php
class NewChat extends DB{
    
   public function insert($name,$detail){
       $str1="INSERT INTO NewChat (NewChat_date, NewChat_name,NewChat_detail,NewChat_status) VALUES ('";
       $str2="', '";
       $str3="')";
       $date=date("Y-m-d H:i:s");
       $status='1';
        $sql = $str1.$date.$str2.$name.$str2.$detail.$str2.$status.$str3;

   if($this->query($sql)){
       return true;
   }else{
       return false;
   }
           
    }
    public function logout($name){
        $sql="update NewChat set NewChat_status='0' where NewChat_name='".$name."'";

        if($this->query($sql)){
         echo "dfasdfsa";   
        }
        else{
            echo "adsfafsd";
        }
        echo "<meta http-equiv='refresh' content='0;url=homepage.html' />";
    }

}
    


?>