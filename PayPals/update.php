<?php
require 'src/start.php';
if(isset($_POST['submit']))
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$desc = $_POST['desc'];
		$add = $_POST['add'];
		$cno = $_POST['cno'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		$sql = "UPDATE restaurants SET restaurant_name=?,restaurant_desc=?,restaurant_addr=?,restaurant_contact=?,username=?,password=? WHERE restaurant_id = ?";
		$s = $db->prepare($sql);
		$s->execute(array($name,$desc,$add,$cno,$user,$pass,$id));
		header("Location: resinfo.php");

	}