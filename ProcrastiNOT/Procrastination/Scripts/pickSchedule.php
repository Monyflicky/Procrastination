<?php
    include("session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../Styles/main.css">
    <link rel="stylesheet" type="text/css" href="../Styles/mainStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="myScript.js"></script> 
	<link rel="stylesheet" type="text/css" href="../Styles/todos.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    
    
</head>

<style>
/* Style buttons */
.btn {
  background-color: DodgerBlue; /* Blue background */
  border: none; /* Remove borders */
  color: white; /* White text */
  padding: 0px 17px; /* Some padding */
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

    <?php
        $host = "localhost"; 
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "procrastination";
        $userID = $_SESSION['userID'];

        //create connection

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        $RemoveOld = "DELETE FROM createtask WHERE createtask.dueDate < date('Y-m-d')";
        $conn->query($RemoveOld);
 
        $stack = array();
        

		$sql= "SELECT  createlist.listTitle, createtask.taskTitle, createtask.priorityLVL, createtask.taskID, createtask.dueDate 
		From createtask 
		INNER JOIN createlist 
		ON createtask.listTitle =createlist.listTitle
        AND createlist.userID = $userID
        AND createtask.userID = $userID
        ORDER BY createlist.listTitle";



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
                array_push($stack, $row['listTitle']);
                echo "<div id= 'grid-item' >";
                echo "<h1>" . $row['listTitle'] . " <i class='fa fa-plus' style='cursor: pointer;' data-toggle='tooltip' title='Add Task'></i> </h1>";
                echo "<u1 style='list-style: none;'>";
                
            }

            $string = str_replace(' ', '-', $row['taskTitle']);

            echo "<li > <span><i class='fa fa-trash task' id= " . $row['taskID'] . " value= ' $string ' ></i></span> " . $row['taskTitle'] ."</li>";

        }

        $sql2= "SELECT  listTitle From createlist Where userID = $userID ORDER BY listTitle";



        $result = $conn->query($sql2);
        


        while($row = $result->fetch_assoc())

		{

            if ($Title != $row['listTitle'] && !in_array($row['listTitle'], $stack) ){

                // close list unless it is the first one
                if  ($Title != ""){

                    echo "</div>";
                }

                $Title = $row['listTitle'];
                echo "<div id= 'grid-item' >";
                echo "<h1>" . $row['listTitle'] . " <i class='fa fa-plus' style='cursor: pointer;' data-toggle='tooltip' title='Add Task'></i> </h1>";
                
                
            }

        }

    ?>



	
</div>


</body>
</html>
