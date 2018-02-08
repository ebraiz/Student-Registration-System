<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>Change Password Here</title></head>
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

<h1 style='color:white' align='center'>Change Your Password Here!</h1>
</td>
</tr>

</table>

<table border='2' width='100%' height='70%' valign='bottom'>

<!--Body-->
<tr bgcolor='#8CFF8C'>
<td colspan='6'>

<?php
include ("includes/db.php");   

$d = $_SESSION['id'];
$query = mysql_query("SELECT * FROM login WHERE id='$d'") or die(mysql_error());;
$run = mysql_fetch_assoc($query);
$Id= $run['id'];
$Username= $run['username'];
$Password= $run['password'];
?>

<html>
<body>
<form method='post' action='editpass.php'>
<table border='2' align='center'>
<tr><td>Username: </td><td><input type='text' name='username' value='<?php echo $Username; ?>'/></td></tr>
<tr><td>Password: </td><td><input type='password' id="showPass" name='password' value='<?php echo $Password; ?>' /><span onmouseleave="document.getElementById('showPass').type = 'password';" onmouseover="document.getElementById('showPass').type = 'text';" >Show</span></td></tr>
<tr><td align='center' colspan='2'><input type='submit' name='update' value='Update'></td></tr>
</form>

</body>
</html>

<!--Update Section-->
<?php
if(isset($_POST['update']))
{
include ("includes/db.php");  
$ID = $_SESSION['id'];
$User_name = $_POST['username'];
$Pass = $_POST['password'];
$query= "UPDATE login SET username='$User_name', password='$Pass' WHERE id='$ID'"; 

if(mysql_query($query)){
	echo "<script>window.open('index.php?Upd=Your Username or Password has been Updated!','_self')</script>";
	}

	else{
		echo "<script>alert('Username or Password is Incorrect!')</script>";
	}
}
?>

</td>
</tr>
</table>
</body>
</html>