<?php
   if(!isset($_SESSION)) 
   { 
      session_start(); 
   } 
   //include("Config.php");
   $error='';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $firstname = $_POST['firstname'];
      $password = $_POST['password'];
      
      $myusername = mysqli_real_escape_string($db,$firstname);
      $mypassword = mysqli_real_escape_string($db,$password); 
      $mypassword = md5($mypassword);
      echo $mypassword;
      
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Log In</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

      <style type = "text/css">
        body {
           font-family:Arial, Helvetica, sans-serif;
           font-size:14px;
           padding-top: 110px;
           padding-bottom: 20px;
           width: 100%;
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
    
     <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #72BBED;">
         <div class="container">
             <button type="button" class="navbar-toggle" data-toggle="collapse"
               data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <h1 class="navbar-brand">You are welcomed to Log In below<h1>
         <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav navbar-right">
                 <li class="active s"><a href="register.php">Register</a></li>
                 <li class="active"><a href="logout.php">Sign Out</a></li>
             </ul>

         </div>
         </div>
     </nav>
     <!--This is the content area-->
     
     <div class="container text-center">
         
        
         <div class="page-header">
            <p >
                    <div align = "center">
                            <div style = "width:300px; border: solid 1px #72BBED; " align = "left">
                               <div style = "background-color:#72BBED; color:#333333; padding:3px;"><b>Login</b></div>
                                   
                               <div style = "margin:30px">
                                  
                                  <form action = "" method = "post">
                                     <label>Username  :</label><input type = "text" name = "firstname" class = "box"/><br /><br />
                                     <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                                     <input type = "submit" value = " Submit "/><br />
                                  </form>
                                  
                                  <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
                                       
                               </div>
                                   
                            </div>
                               
                         </div>
                   
            </p>
         </div>
    </div>
     <!--This is the footer-->
     <div class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: #AAAAAA;">
        <div class="container">
            <div class="navbar-text pull-left">
            <p style="color:black;">Copyright@ Procrastination 2018</p>
            </div>
        </div>
     </div>
    
  </body>
</html>