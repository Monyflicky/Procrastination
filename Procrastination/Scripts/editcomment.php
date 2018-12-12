<?php
    
    include 'comments.inc.php';
    date_default_timezone_set('Asia/Bangkok');
   
    $id='';
    $firstname='';
    $date='';
    $message='';
    
    
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

      <style type = "text/css">
      body{
           padding-top: 110px;
           padding-bottom: 20px;
           width: 100%;
           height: 100%;
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
             <h1 class="navbar-brand">You can edit your comment below<h1>
         <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav navbar-right">
                 <li class="active"><a href="logout.php">Sign Out</a></li>

             </ul>

         </div>
         </div>
     </nav>

     <!--This is the content area-->
     
     <div class="container-fluid">
         <div class="row">
             <div class="col-xs-12">


<?php
$id= $_POST['id'];
$firstname= $_SESSION['login_user'];
$date = $_POST['date'];
$message = $_POST['message'];


echo "<form method='POST' style='width: 500px;height: 20px;' action='".editComments($db)."'>
   <input type='hidden' name='id' value='".$id."'>
   <input type='hidden' name='firstname' value='".$firstname."'>
   <input type='hidden' name='date' value='".$date."'>
   <textarea name='message'>".$message."</textarea><br>
   <button name='commentSubmit' type='submit'>Edit</button>
</form>";


?>
 </div>
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