<?php
	require_once 'app/init.php';
 
	if($_GET['id']){
		$task_id = $_GET['id'];
 
		$db->query("DELETE FROM `items` WHERE `id` = $task_id") or die(mysqli_errno($conn));
		header("location: index.php");
	}	
?>