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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="myScript.js"></script> 
	<link rel="stylesheet" type="text/css" href="../Styles/todos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <script type="text/javascript" src="jquery-2.1.4.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<button type="return" class="btn btn-secondary mx-2" onclick="location.href='home-page.php';" > &#8592; Back to Home Page  </button>
<button type="return" class="btn btn-secondary mx-5" onclick="location.href='createList.html';" > New List </button>
<button type="return" class="btn btn-secondary mx-2" onclick="location.href='task.php';" > New task </button>
</nav>

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
        

		$sql= "SELECT  createlist.listTitle, createtask.taskTitle, createtask.priorityLVL, createtask.dueDate 
		From createtask 
		INNER JOIN createlist 
		ON createtask.listTitle =createlist.listTitle
        AND createlist.userID = $userID
        ORDER BY createlist.listTitle";
        //createtask.listTitle =createlist.listTitle
        //AND 



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

            echo "<li style='padding-left: 20px;'>" . $row['taskTitle'] ."</li>";

        }

        $sql2= "SELECT  createlist.listTitle, createtask.taskTitle
		From createtask 
		INNER JOIN createlist 
		ON createlist.listTitle !=createtask.listTitle
        AND createlist.userID = $userID
        ORDER BY createlist.listTitle";



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
<script >
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });

    $(".fa-plus").click(function(){
	window.location = "task.php";
    });

    $(".fa-trash").click(function(){

	window.location = "list.php";
    });


</script>


</body>
</html>