<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link rel="stylesheet" type="text/css" href="../Styles/todos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <script type="text/javascript" src="jquery-2.1.4.min.js"></script>
    
</head>
<body>

<div class="grid-container">

    <?php
    include("session.php");
        $host = "localhost"; 
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "procrastination";
        $userID = $_SESSION['userID'];

        //create connection

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

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

            echo "<li><span><i class='fa fa-trash' value=". $row['taskTitle'] ."></i></span>" . $row['taskTitle'] ."</li>";

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