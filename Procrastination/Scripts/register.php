<?php
    
    if(isset($_POST['submit'])){

    $firstname = $_POST['firstname'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //$firstname = mysqli_real_escape_string($db,$firstname);
    //$password = mysqli_real_escape_string($db,$password); 
   // $password = md5($password);

   if(!empty($firstname) || !empty($password) || !empty($gender) || !empty($email) || !empty($phone)){
       $host = "localhost";
       $dbFirstname = "root";
       $dbPassword = "";
       $dbname    = "mydb2";
       
       
      
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
         $INSERT = "INSERT Into register (username, password, gender, email, phone) VALUES(?,?,?,?,?)";


       $stmt = $conn->prepare($SELECT);
       $stmt->bind_param("s",$email);
       $stmt->execute();
       $stmt->bind_result($email);
       $stmt->store_result();
       $rnum = $stmt->num_rows;

       if($rnum==0){
       $stmt->close();


       $stmt = $conn->prepare($INSERT);
       $stmt->bind_param("ssssi", $firstname, $password, $gender, $email, $phone);
       $stmt ->execute();
       //echo "New record inserted successfully";
         //header("location: InsertToDatabaseNewRegisters.php");
         echo '<script language="javascript">';
         echo 'alert("New record inserted successfully")';
         echo '</script>';
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
              width: 20%;
              display: inline-block;
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
                    <form action = " " method="POST">
                            <div class="form-group">
                               <label for="firstname">First</label>
                               <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname" required>
                            </div>
                            <div class="form-group">
                               <label for="password">Password</label>
                             <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required><br>
                            </div>
                 
                           <div class="checkbox">
                              <label><input type="radio" id="gender" name="gender" value="m" checked required>Male</label>
                             <label><input type="radio" id="gender" name="gender" value="f" required>Female</label>
                           </div>
                 
                           <div class="form-group">
                             <label for="email">Email</label>
                             <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" required>
                          </div>
                          <div class="form-group">
                             <label for="telephone">PhoneNumber</label>
                             <input type="text" class="form-control" id="phone" placeholder="Enter phonenumber" name="phone" required>
                         </div>
                            <input type="submit" class="btn btn-default" name="submit" value="Submit">
                       </form>
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