<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>Change Student Information</title></head>
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
<td><a href='memberview.php'>Registered Members</a></td>
</tr>
</table>

<table border='2' width='100%' height='70%' valign='bottom'>
<tr bgcolor='#8CFF8C'>
<td colspan='6'>

<!-- Body Begins -->

<!-- Selecting Personal Data From Database for Editing -->
<?php
include ("includes/db.php");
$d= @$_GET['d'];
$query = mysql_query("SELECT * FROM admission_form WHERE id='$d'") or die(mysql_error());;
$run = mysql_fetch_assoc($query);
$id = $run['id'];
$roll = $run['roll'];
$s_name = $run['s_name'];
$f_name = $run['f_name'];
$gender = $run['gender'];
$dob = $run['dob'];
$cnic = $run['cnic'];
$mobile = $run['mobile'];
$email = $run['email'];
$paddress = $run['paddress'];
$taddress = $run['taddress'];
$qualification = $run['qualification'];
$year = $run['year'];
$university = $run['university'];
$obtained = $run['obtained'];
$total = $run['total'];
$cgpa = $run['cgpa'];
$subject = $run['subject'];
$image = $run['image'];
?>

<!-- Showing Selected Information into Form -->
<html>
<body>
<form method='post' action='editstudentinfo.php'>
<br><br><table border='2' align='center'>

<tr><td>Roll No: </td><td><input type='text' name='roll' value='<?php echo $roll; ?>'/></td></tr>
<tr><td>Student Name: </td><td><input type='text' name='s_name' value='<?php echo $s_name; ?>'/></td></tr>
<tr><td>Father Name: </td><td><input type='text'  name='f_name' value='<?php echo $f_name; ?>'/></td></tr>
<tr><td>Gender: </td><td><input type='text'  name='gender' value='<?php echo $gender; ?>'/></td></tr>
<tr><td>DOB: </td><td><input type='text'  name='dob' value='<?php echo $dob; ?>'/></td></tr>
<tr><td>CNIC: </td><td><input type='text'  name='cnic' value='<?php echo $cnic; ?>'/></td></tr>
<tr><td>Mobile NO: </td><td><input type='text'  name='mobile' value='<?php echo $mobile; ?>'/></td></tr>
<tr><td>Email: </td><td><input type='text'  name='email' value='<?php echo $email; ?>'/></td></tr>
<tr><td>Permanent Address: </td><td><input type='text' name='paddress' value='<?php echo $paddress; ?>'/></td></tr>
<tr><td>Temporary Address: </td><td><input type='text' name='taddress' value='<?php echo $taddress; ?>'/></td></tr>
<tr><td>Qualification: </td><td><input type='text' name='qualification' value='<?php echo $qualification; ?>'/></td></tr>
<tr><td>Year: </td><td><input type='text' name='year' value='<?php echo $year; ?>'/></td></tr>
<tr><td>Institute: </td><td><input type='text' name='university' value='<?php echo $university; ?>'/></td></tr>
<tr><td>Obtained Marks: </td><td><input type='text' name='obtained' value='<?php echo $obtained; ?>'/></td></tr>
<tr><td>Total Marks: </td><td><input type='text' name='total' value='<?php echo $total; ?>'/></td></tr>
<tr><td>CGPA: </td><td><input type='text' name='cgpa' value='<?php echo $cgpa; ?>'/></td></tr>
<tr><td>Subject: </td><td><input type='text' name='subject' value='<?php echo $subject; ?>'/></td></tr>
<tr><td>Photo: </td><td><input type='text' name='image' value='<?php echo $image; ?>'/></td></tr>
<tr><td align='center' colspan='2'><input type='submit' name='update' value='Update'></td></tr>
</table>
</form>
</body>
</html>

<!-- Update Section -->
<?php
if(isset($_POST['update']))
{
include ("includes/db.php");
$Roll = $_POST['roll'];
$S_name = $_POST['s_name'];
$F_name = $_POST['f_name'];
$Gender = $_POST['gender'];
$Dob = $_POST['dob'];
$Cnic = $_POST['cnic'];
$Mobile = $_POST['mobile'];
$Email = $_POST['email'];
$P_address = $_POST['paddress'];
$T_address = $_POST['taddress'];
$Qualification = $_POST['qualification'];
$Year = $_POST['year'];
$University = $_POST['university'];
$Obtained = $_POST['obtained'];
$Total = $_POST['total'];
$Cgpa = $_POST['cgpa'];
$Subject = $_POST['subject'];
$org_path = $_POST['image'];

$query= "UPDATE admission_form SET roll='$Roll', s_name='$S_name', f_name='$F_name', gender='$Gender', dob='$Dob', cnic='$Cnic', mobile='$Mobile', email='$Email', paddress='$P_address', taddress='$T_address', qualification='$Qualification', year='$Year', university='$University', obtained='$Obtained', total='$Total', cgpa='$Cgpa', subject='$Subject', image='$org_path' WHERE roll='$Roll'"; 

if(mysql_query($query)){
	echo "<script>window.open('viewstudentinfo.php?Upd=Updated!','_self')</script>";
	}

	else{
		echo "<script>alert('Sorry Not Updated Please Try Again!')</script>";
	}
}
?>

<!-- End of Body   -->

</td>
</tr>
</table>
</body>
</html>