<?php

include ("includes/db.php");   
$d = @$_GET['d'];
$query = ("DELETE FROM login WHERE id='$d'") or die(mysql_error());
if(mysql_query($query)){
	echo "<script>window.open('memberview.php?del=Selected Record has been Deleted!','_self')</script>";
	}

	else{
		echo "<script>alert('Sorry, Not Deleted, Try again!')</script>";
	}
?>