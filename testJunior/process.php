<?php

$mysqli = new mysqli('localhost', 'root', '', 'testJunior') or die(mysqli_error($mysqli));

if(isset($_POST['save'])){
	$lastname = $_POST['lastname'];
	$fisrtname = $_POST['firstname'];
	$birthdate = $_POST['birthdate'];
	$phone = $_POST['phone'];

	$mysqli->query("INSERT INTO clients (lastname, firstname, birthdate, phone) VALUES('$lastname', '$fisrtname', '$birthdate', '$phone')") or die($mysqli->error);

	header("location: index.php");
}