<?php
session_start();
?>
<html>
	<head>
		<title>Login Page</title>
	</head>
<body>

<table border='0' align='center' width='100%' height='100%' cellpadding='20'>

<tr>	
<td bgcolor='green'>
		
<form method='post' action='index.php'>

<table border='0' width='100%' align='right' bgcolor='green'>

<tr><td rowspan='3'>
<font size='6' face='tahoma' color='white'><b>Welcome To Edwardes College</b></font>
</td></tr>

<tr>
<td><h4 style='color:white' align='left'>Username:</h4></td>
<td><h4 style='color:white' align='left'>Password:</h4></td>
</tr>

<tr>
<td><input type='text' name='u_name'></td>
<td><input type='password' name='u_password'></td>
<td><input type='submit' name='login' value='Log In'></td>
</tr>

</tr>
</table>

</form>
	
		</td>
	</tr>

	<tr><td colspan='0' height='10%' align='center' bgcolor='#8CFF8C'><font size='4' color='red'>
<?php echo @$_GET['Upd']; ?>
<?php echo @$_GET['name']; ?>
<?php echo @$_GET['pass']; ?>
</font>

<font color='green'><?php echo @$_GET['msg']; ?></font>
</td></tr>
	<tr><td bgcolor='#8CFF8C'>

<table border='0' width='100%'>
	<tr><td>
<table border='0' align='left' cellpadding='10' height='75%' width='55%' bgcolor='#8CFF8C'>
<tr><td>
<font size='4' face='verdena'>
<b>Online Student Registration System</b>
</font>
<font size='3' face='verdena'>
<ul type='square'>
<li>A PHP & MySQL Website Project 
<li>First SignUp For New Account
<li> Then Submit The Registration Form
</ul></font>
</td></tr>
</table>
	</td><td>
<form method='post' action='index.php'>
<table border='0' align='left' cellpadding='10' bgcolor='#8CFF8C'>

<tr><th colspan='2'><font size='5'><center><u>Create An Account</u></center></font></th><tr>
<tr><td>Enter Username:</td><td><input type='text' name='enterusername'></td></tr>
<tr><td>Enter Password:</td><td><input type='password' name='enterpassword'></td></tr>
<tr><td colspan='2' align='center'><input type='submit' name='submit' value='Sign Up'></td></tr>
</table>
</form>	
</td>
	</table>	
		</td>
	</tr>
</table>


</body>
</html>

<?php

include ("includes/db.php"); 
if(isset($_POST['submit']))
{
$Username = $_POST['enterusername'];
$Password = $_POST['enterpassword'];

if($Username==''){
	echo 
	"<script>window.open('index.php?name=Username is Required','self')</script>";
	exit();
}
if($Password==''){
	echo 
	"<script>window.open('index.php?pass=Password is Required','self')</script>";
	exit();
}

$que="INSERT INTO login(username,password,role) VALUES('$Username','$Password','student')"; 
if(mysql_query($que)){
echo "<script>window.open('index.php?msg=Registered Successfully!','self')</script>";
    exit();
}
}
?>


<?php
/*PHP Script for Login Form */
include ("includes/db.php");  
if(isset($_POST['login']))
{
$Username = $_SESSION['u_name'] = $_POST['u_name'];	
$Password = $_POST['u_password'];
	
$student_panel = "SELECT * FROM login WHERE username='$Username' AND password='$Password' AND role='student'";
$teacher_panel = "SELECT * FROM login WHERE username='$Username' AND password='$Password' AND role='teacher'";
	
	if($run=mysql_query($student_panel)){
	
	if(mysql_num_rows($run)>0){
		echo "<script>window.open('admission_form.php','_self')</script>";	
		exit(0);
		}
	}

	if($run=mysql_query($teacher_panel)){
	
		if(mysql_num_rows($run)>0){
		echo "<script>window.open('viewstudentinfo.php','_self')</script>";
		exit(0);
		}
	
		else{
		echo "<script>alert('Username or Password is Incorrect!')</script>";
		}	
	}
}
?>