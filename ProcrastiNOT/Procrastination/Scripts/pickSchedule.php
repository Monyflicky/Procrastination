<!DOCTYPE html>
<html> 
<head>
	<title>List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Styles/todos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
	<script type="text/javascript" src="../Scripts/jquery-2.1.4.min.js"></script>
</head>

<style>
/* Style buttons */
.btn {
  background-color: DodgerBlue; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 0px 14px; /* Some padding */
  font-size: 24px; /* Set a font size */
  cursor: pointer; /* Mouse pointer on hover */
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>

<body> 

<h1 style="text-transform: capitalize;">Enter the list name to generate a schedule: <i class='fa fa-plus'><a href="home-page.php"><button class="btn">HOME</button></a> </i> </h1>

<form action="buildSched.php" method="POST">
    <input type="text" id="taskT" name="taskT" placeholder="Enter list name here">
    <input type="submit" value="Submit" style="text-transform: capitalize; font-size:24px;">
</form>   
 
<div class="grid-container">
    <!--<div id="grid-item">
        <h1 id= "header">List Test<i class="fa fa-plus"></i></h1>

        <ul>
            <li><span><i class="fa fa-trash"></i></span> Biology Quiz</li>
            <li><span><i class="fa fa-trash"></i></span> Algebra Final</li>
            <li><span><i class="fa fa-trash"></i></span> Comp Assignment 1</li>
        </ul>
    </div> -->

    <?php
        $host = "localhost"; 
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "procrastination";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

		$sql= "SELECT  createlist.listTitle, createtask.taskTitle, createtask.priorityLVL 
		From createtask 
		INNER JOIN createlist 
		ON createtask.listTitle=createlist.listTitle
		ORDER BY createtask.listTitle";

        $result = $conn->query($sql);
        $Title = "";
        
		while($row = $result->fetch_assoc())

		{
            if ($Title != $row['listTitle'] ){

                // close list unless it is the first one
                if  ($Title != ""){
                    echo "</u1>";

                    echo "</div>";
                } 
                
                $Title = $row['listTitle'];
                echo "<div id= 'grid-item' ></i>"; 
                echo "<h1> " . $row['listTitle'] . "</form><i class='fa fa-plus'></i></h1>";
                echo "<u1 style='list-style: none;'>";
                
            }

            echo "<li><span><i class='fa fa-trash'></i></span>" . $row['taskTitle'] . "</li>";

        }

    ?>


	
</div>

<script type="text/javascript" src="Scripts/todos.js"></script>

</body>
</html>