<?php
   session_start();
   include("Config.php");
   $error='';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      

      $firstname = $_POST['firstname'];
      $password = $_POST['password'];
      
      $myusername = mysqli_real_escape_string($db,$firstname);
      $mypassword = mysqli_real_escape_string($db,$password); 
      
      $sql = "SELECT * FROM register WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if(!$result){
        printf("Error:%s\n", mysqli_error($db));
        exit();
      }
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
		
      if($count == 1) {
        $_SESSION['login_user'] = $row['username']; 
	$_SESSION["password"] = $row['password'];
        
         //header("location: welcome.php");
           header("location: home-page.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>FirstName  :</label><input type = "text" name = "firstname" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>