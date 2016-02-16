<?php
	include 'config.php';
	if(isset($_POST['Delete']))
	{
		$tit = $_POST['titl'];
		$query = "DELETE FROM task WHERE id = {$tit} ";
		//echo $query;
	
		if($conn->query($query)==true)
		{
			echo "Task deleted successfully";
			//header("refresh:3;url=http://localhost/projects/todo/index.php");
		}
		else
		{
			echo "Naa ho paega";
		}
	}
	else
	{
		$tdate= $_POST['todoDate'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$priority = $_POST['priority'];
		$query = "INSERT INTO task (title, content, value, dobydate)
					VALUES ('{$title}', '{$content}', '{$priority}', '{$tdate}')";
		if($conn->query($query)==TRUE)
		{
			//echo "task added successfully";
			header("refresh:0;url=http://localhost/projects/todo/index.php");
		}
		else
		{
			echo "Naa ho paega";
		}
	
	}
	
?>
