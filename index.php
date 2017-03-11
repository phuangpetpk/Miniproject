<html>

<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" type='text/css' href='style.css'>
    
</head>

<body bgcolor="black">
    <?php



session_start();



if($_GET['logout']){//logout
include('db.php');
include('NewChat.php');
    $db=new NewChat ();
    $db->connect();
    $db->logout($_SESSION['name']);
    $db->close_connect();
    session_destroy();
    header("Location: index.php");
}
if(isset($_POST['submitname'])){ //check login button
    if(isset($_POST['name'])){
        $_SESSION['name']=$_POST['name'];
        
    }
}

if(!isset($_SESSION['name'])){ //login page 
    ?>
        <br>
        <br>      
          
        <div class="login-wrap">
	<div class="login-html">
		<center><label for="tab-1" class="tab"><font color="white">LOGIN PAGE</font></label></center>
		<form class="login-form" action="index.php" method="post">
			
				<div class="group">
					<label for="user" class="label">Name</label>
					<input id="user" type="text" class="input" name="name">
				</div>
				<div class="group">
					<label for="user" class="label">E-Mail</label>
					<input id="user" type="email" class="input" data-type="password" name="email">
				</div>				
				<div class="group">
					<input type="submit" class="button" value="ENTER CHAT" name="submitname">
				</div>
				<div class="hr"></div>				
			
		</form>
	</div>
</div>
       
        

        <?php 
}else{//in the chat room
 ?>
       <br>
       <br>
       <br>
       <br>
        <div id='paper'>

            <div id='header'>
                <div id='name'>
                    <?php echo "Name : ".$_SESSION['name']; ?>
                </div>
                <div id='logout'><a href='index.php?logout=true'>logout</a></div>
            </div>

            <div id='chatbox'></div>
            <div id='listname'></div>
            <div id='sendform'>
                
                <center><input type='text' name='detail' id='detail' onkeyup="count()" maxlength="100" placeholder="Your comment..."></center>
                <center><button type='button' id="send" onclick="detailsend()">send</button><br>
					<sub id='counttxt'>You can input lenght string : 100</sub>
				</center>
            </div>

            
        </div>
        
        <script>
            var higthchatbox=document.getElementById('chatbox').clientHeight;
            var send=document.getElementById('detail');
            send.addEventListener("keydown",function (e){
                if(e.keyCode==13){
                    detailsend();
                }
            });
           function count() {
                 var l=document.getElementById('detail').value.length;
                 document.getElementById('counttxt').innerHTML="You can input lenght string : "+(100-l);
            }
            function autoscroll(){
                 document.getElementById('chatbox').scrollTop=document.getElementById('chatbox').scrollHeight;
            }
            function detailsend() {
                var txt = "";
                txt += document.getElementById('detail').value;
                document.getElementById('detail').value="";
                insertData(txt);
                
            }


            function insertData(txt) {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('s1').innerHTML = ajax.responseText;
                    }
                }
                ajax.open('POST', 'insert.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                ajax.send("name=<?php echo $_SESSION['name']; ?>&detail=" + txt);
            }
             function showlistname() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('listname').innerHTML = ajax.responseText;
                    }
                }
                ajax.open('POST', 'listname.php', true);
                ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                ajax.send("name=<?php echo $_SESSION['name']; ?>");
            }
            function ajax() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function() {
                    if (ajax.readyState == 4 && ajax.status == 200) {
                        document.getElementById('chatbox').innerHTML = ajax.responseText;
                        autoscroll();
                    }
                }
                ajax.open('POST', 'chat.php', true);
                ajax.send();
            }
            
            setInterval(ajax,1000);
            setInterval(showlistname,1000);
        </script>
        <?php
}
?>
</body>

</html>