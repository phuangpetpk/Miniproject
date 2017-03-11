<?php 
class DB {
	
	protected $db_name = 'it58160628';
	protected $db_user = 'it58160628';
	protected $db_pass = '0850862915mn';
	protected $db_host = 'localhost';
    public $link;
    public $result;
	
	// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
	
	public function connect() {
		$this->link = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
", mysqli_connect_error());
			exit();
		}
        //echo "connect succless";
		return true;
		
	}

    public function query($sql){
        if ($this->result=mysqli_query($this->link, $sql)) {
   // echo "Database query successfully";
   return true;
} else {
    //echo "Error query database: " . $this->link->error;
	return false;
}
    }
    public function close_connect(){
       mysqli_close($this->link);
    }

}
?>