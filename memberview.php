<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>View Registered Members</title></head>
<body link='white'>

<table border='2' width='100%' height='30%' valign='top'>

<!--Header-->
<tr>
<td bgcolor='green' colspan='6'>
<table border='0' width='100%'>
<tr>
<td><h3 style='color:white' align='left'>&emsp;<?php echo "Welcome, " . $_SESSION['u_name']; echo "!"; ?></td>

<td><h3 style='color:white' align='right'><a href='logout.php'>
<font color='white'>Logout</font></a>&emsp;|&emsp;<a href='editpass.php'>
<font color='white'>Change Password</font></a></h3>
</td>
</tr>

</table>

<?php
include ("includes/db.php");
$u = $_SESSION['u_name']; 
$query = mysql_query("SELECT * FROM login WHERE username='$u'") or die(mysql_error());
while($result = mysql_fetch_assoc($query)) {
$id = $_SESSION['id'] = $result['id'];
$Username = $result['username'];
$Password = $result['password'];
}
?>

<h1 style='color:white' align='center'>Welcome To Edwardes College <br>(TEACHER PANEL)</h1>
</td>
</tr>

<!--Menu Bar-->
<tr height='25%' align='center'>
<td><a href='viewstudentinfo.php'>Student Record</a></td>
<td><a href=''>Registered Members</a></td>
</tr>
</table>

<table border='2' width='100%' height='70%' valign='bottom'>
<tr bgcolor='#8CFF8C'>
<td colspan='6'>

<!-- Body Begins -->

<?php
include ("includes/db.php"); 

$query = mysql_query("SELECT * FROM login") or die(mysql_error());
echo "<table border='2' align='center'>";
echo "<tr><td colspan='4' align='center'>";echo "<font color='red' size='5'><b>"; echo @$_GET['del']; echo "</b></font></td></tr>";
echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Role</th></tr>";
while($result = mysql_fetch_assoc($query))
{
echo "<tr><td>"; echo $id= $result['id']; echo "</td>";
echo "<td>"; echo $username= $result['username']; echo "</td>";
echo "<td>"; echo $password= $result['password']; echo "</td>";
echo "<td>"; echo $role= $result['role']; echo "</td>";
echo "<td>"; echo "<a href='deletemember.php?d=$id'><font color='blue'>Delete</font></a>"; echo "</td>";
echo "<td>"; echo "<a href='editmemberpass.php?d=$id'><font color='blue'>Edit</font></a>"; echo "</td></tr>";
}
echo "</table>";
?>

<!-- End of Body   -->

</td>
</tr>
</table>
</body>
</html>