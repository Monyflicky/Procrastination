<?php
    
    if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $password = md5($_POST['password']);
    
    $email = $_POST['email'];
   

    //$firstname = mysqli_real_escape_string($db,$firstname);
    //$password = mysqli_real_escape_string($db,$password); 
   // $password = md5($password);

   if(!empty($firstname) || !empty($password) || !empty($email) ){
       $host = "localhost";
       $dbFirstname = "root";
       $dbPassword = "";
       $dbname    = "procrastination";
       
       
      
}
else{
    echo "All fields are required";
    die();
}


   $conn= new mysqli($host,$dbFirstname,$dbPassword,$dbname);
    if(mysqli_connect_error()){
         die('Connect_Error('.mysqli_connect_errno().')'.mysqli_connect());
    }else{
         $SELECT = "SELECT email From register Where email = ? Limit 1";
         $INSERT = "INSERT Into register (username, password, email) VALUES(?,?,?)";


       $stmt = $conn->prepare($SELECT);
       $stmt->bind_param("s",$email);
       $stmt->execute();
       $stmt->bind_result($email);
       $stmt->store_result();
       $rnum = $stmt->num_rows;

       if($rnum==0){
       $stmt->close();


       $stmt = $conn->prepare($INSERT);
       $stmt->bind_param("sss", $firstname, $password, $email);
       $stmt ->execute();
       //echo "New record inserted successfully";
         //echo "<script type='text/javascript'>alert('New record inserted successfully! Please go ahead click Log In');</script>";
         //echo " <script> w </script>"
         echo "<script>alert('Your Record Sucessfully Inserted.Now Login');window.location.href = 'login.php';</script>";
         //header("location: login.php");
         
        }
         else{
              echo "Someone already registered";
      } $stmt->close();
        $conn->close();
   
  }
  
 }
 
   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

      <style>
          body{
              padding-top: 110px;
              padding-bottom: 20px;
              
          }
          .container{
              
          }
          form{
            
              
            }
      </style>
    
  </head>
  <body>
    
     <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #72BBED;">
         <div class="container">
             <button type="button" class="navbar-toggle" data-toggle="collapse"
               data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <h1 class="navbar-brand">You are welcomed to sign below<h1>
         <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav navbar-right">
                 <li class="active"><a href="login.php">Log In</a></li>

             </ul>

         </div>
         </div>
     </nav>
     <!--This is the content area-->
     
     <div class="container text-center">
         
        
         <div class="page-header">
            <p >
                    <form class="form-horizontal" action = " " method="POST" id="reg_form">
                            <div class="form-group">
                               <label class="col-md-4 control-label" for="firstname">Username</label>
                               <div class="col-xs-6 inputGroupContainer">
                                   <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                     <input type="text" class="form-control" id="firstname" placeholder="Enter username" name="firstname" required/>
                                   </div>
                            </div>
                            </div>
                            <div class="form-group">
                               <label class="col-md-4 control-label" for="password">Password</label>
                                  <div class="col-xs-6 inputGroupContainer">
                                  <h6>Password is between 5 to 10 characters</h6>
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        
                                       <input type="password" pattern=".{5,10}" class="form-control" id="password" placeholder="Enter password" name="password"
                                       required/><br>
                                    </div>
                                   </div>
                                  </div>
                        

                          <div class="form-group">
                               <label class="col-md-4 control-label" for="email">Email</label>
                                  <div class="col-xs-6 inputGroupContainer">
                                    <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required/>
                                    </div>
                                   </div>
                                  </div>

                        <div class="form-group">
                               
                                  <div class="col-md-12">
                                    
                                    <input type="submit" class="btn btn-warning" name="submit" value="Submit">
                                    
                                   </div>
                                  </div>
                          
                            
                       </form>
            </p>
         </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    

     <div class="navbar navbar-inverse navbar-fixed-bottom" style="background-color: #AAAAAA;">
        <div class="container">
            <div class="navbar-text pull-left">
            <p style="color:black;">Copyright@ Procrastination 2018</p>
            </div>
        </div>
     </div>
    
  </body>
</html>
