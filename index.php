<!DOCTYPE html>
<html>
<head>
	<title>Do something today?</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/projects/todo/styles/style.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js" ></script> /
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="http://localhost/projects/todo/scripts/script.js"></script>

</head>
<body>

<button id = "new" > Add a task </button> <br>
<span id = "fm">
<form class="pure-form pure-form-aligned" method="POST" action="taskManager.php">
    <fieldset>
        <div class="pure-control-group">
            <!-- <label for="title">Task Title</label> -->
            <input type="text" placeholder="Title"  name = "title" class="in">
        </div>

        <div class="pure-control-group">
            <!-- <label for="content">Task Details</label> -->
            <textarea  placeholder="Content"   name = "content" class="in"></textarea>
        </div>

        <div class="pure-control-group" >
        	<label for="priority">Task Priority</label>
        	
                <input type="radio" name="priority" value="Low">
                <span class = "b">Low</span>
                <input type="radio" name="priority" value="Medium">
                <span class="b">Medium</span>
                <input type="radio" name="priority" value="High">
                <span class = "b">High</span>
        </div>
        <div class="pure-control-group">
            <!-- <label for="todoDate"> Task Date</label> -->
            <input type="date"   name="todoDate" placeholder "mm/dd/yyyy" class="in">
        </div>
        <div class="pure-control-group">
      
            <input type="submit" class="pure-button in pure-button-primary" value = "Add this task" id= "btn">
        </div>
    </fieldset>
</form>
</span>
<div id = "accordion">

<?php
		include 'config.php';
		$query = "SELECT * FROM task";
		$today = date("Y-m-d", strtotime("now"));
		if($result= $conn->query($query))
		{	
			while($row = $result->fetch_assoc())
			{
				$sqltime = $row['dobydate'];   //Use dateTime objects alternatively
				$tym = date("M d", strtotime($sqltime));
				?>
				<h3 class = "heads" prio = "<?=$row['value']?>" tdate = "<?=$sqltime?>" today = "<?=$today?>"> <?php print($row['title']); ?> 
				<input type="button" class = "rem" value="&#x2717" --id="<?=$row['id']?>"> 
				<br>
				<span class="dte"> Do by <?php echo $tym ?> </span>
				</h3>
				
				<div class = "content" >
					<?php print($row['content']); ?>
					<br> 
					
				</div>
		
				<?php
			}
		}

		else
		{
			echo "Can't display";
		}
	mysql_close($conn);
?>
</div>

</body>
</html>