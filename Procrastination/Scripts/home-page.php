<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

/* Style the body */
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    transition: background-color .5s;
}

/* Header/logo Title */
.header { 
    padding: 50px;
    text-align: left;
    background: #72bbed;
    color: white;
}  

/* Increase the font size of the heading */
.header h1 {
    font-size: 50px;
}

/* Sticky navbar - toggles between relative and fixed, depending on the scroll position. It is positioned relative until a given offset position is met in the viewport - then it "sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 and earlier versions. However, for these versions the navbar will inherit default position */
.sidenav{
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.35s;
    padding-top: 40px;
}

/* Style the navigation bar links */
.sidenav a {
    padding: 8px 8px 8px 28px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

/* Change colour on hover */
.sidenav a:hover {
    color: #f1f1f1;
}

/* Close sidebar */
.sidenav .closebtn{
    position: absolute;
    top: 0;
    right: 20px;
    font-size: 34px;
    margin-left: 40px;
}

/* Column container */
.row {  
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
}

/* Main */
.main {   
    flex: 80%;
    background-color: white;
    padding: 20px;
}

/* Borders for text */
.border {
    display: inline-block;
    width: 95%;
    height: 150px;
    margin: 16px;
} 

/* Footer */
.footer {
    position: fixed;
    width: 100%;
    height: 50px;
    bottom: 0;
    font-size: 15px;
    padding: 17px;
    text-align: right;
    background: #72bbed;
    color: white;
} 

#mainScreen {
    transition: margin-left .5s;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
    .row {   
        flex-direction: column;
    }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
    .navbar a {
        float: none;
        width: 100%;
    }
}
</style>
</head>
<body>

    <div id="mainScreen">
    <div class="header">
        <h1>Welcome <?php echo $login_session; ?></h1>
    </div> 

    <span style="font-size:37px;cursor:pointer" onclick="openNav()">&#9776; Navigate
    </span>

    <div id = "homeSideNav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Home</a>
        <a href="list.php">Lists</a>
        <!-- <a href="#">Create New TO-DO List</a> -->
        <a href="task.php">Generate New Task</a>
        <a href="pickSchedule.php">Generate a Schedule</a>
        <a href="#">Userboard</a>
        <a href="#">Sign Out</a>
    </div>

   <div class="main">
      <span class="border border-primary" style="text-align:center;padding: 20px;"><p id="quote"></p></span> 
      
      <span class="border border-primary" style="text-align:left;padding: 20px;height: 230px;">
      <h3>You have the following tasks coming up:</h3>
        
        <?php
            $host = "localhost"; 
            $dbUsername = "root";
            $dbPassword = "";
            $dbname = "procrastination";
            $ID = $_SESSION['userID'];
    
            //create connection
            $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

            $sql= "SELECT userID, taskTitle, dueDate 
            FROM createtask
            WHERE createtask.userID = $ID 
            ORDER BY dueDate ASC 
            LIMIT 0,5";   

            $result = $conn->query($sql);
            
            while($row = $result->fetch_assoc()){
            
                    echo "<h5>" . $row['taskTitle'] . " is due on " . $row['dueDate'] . "</i> </h5>"; 
            }
        ?>
        </span> 

  </div> 
  </div>

<div class="footer">
    <p><b>Version 1.0</b> created by Ginika, Monnie, and Priscilia.</p> 
</div>

<script>
    //Display a random motivational quote
    function randomtext() {   
        var randomtxt = [
            '<h2><b><i>"One day you will wake up and there won\'t be any more time to do the things you\'ve always wanted... Do it now."</i></b></h2> <h4>- Paulo Coelho</h4>',
            '<h2><b><i>"It always seems impossible until it\'s done."</i></b></h2> <h4>- Nelson Mandela</h4>',
            '<h2><b><i>"It does not matter how slowly you go as long as you do not stop."</i></b></h2> <h4>- Confucius</h4>',
            '<h2><b><i>"The secret of getting ahead is getting started."</i></b></h2> <h4>- Mark Twain</h4>',
            '<h2><b>"Without hard work, nothing grows but weeds."</i></b></h2> <h4>- Gordon B. Hinckley</h4>',
            '<h2><b><i>"What you do today can improve all your tomorrows."</i></b></h2> <h4>- Ralph Marston</h4>',
            '<h2><b><i>"In order to succeed, we must first believe that we can."</i></b></h2> <h4>- Nicos Kazantzakis</h4>',
            '<h2><b><i>"You may delay, but time will not, and lost time is never found again."</i></b></h2> <h4>- Benjamin Franklin</h4>',
            '<h2><b><i>"Things may come to those who wait, but only the things left by those who hustle."</i></b></h2> <h4>- Abraham Lincoln</h4>',
            '<h2><b><i>"Tomorrow is often the busiest day of the week."</i></b></h2> <h4>- Spanish Proverb</h4>'];
        return randomtxt[Math.floor((Math.random() * 9.99))];
    }
    
    document.getElementById("quote").innerHTML = randomtext();
    
    function openNav() {
        document.getElementById("homeSideNav").style.width = "250px";
        document.getElementById("mainScreen").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
    }

    function closeNav() {
        document.getElementById("homeSideNav").style.width = "0";
        document.getElementById("mainScreen").style.marginLeft= "0";
        document.body.style.backgroundColor = "white";
    }

    /*function openNav() {
        document.getElementById("homeSideNav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("homeSideNav").style.width = "0";
    }*/
</script>


</body>
</html>
