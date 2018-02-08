<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>View Student Information</title></head>
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

<?php /*
include ("includes/db.php");
$u = $_SESSION['u_name']; 
$query = mysql_query("SELECT * FROM login WHERE username='$u'") or die(mysql_error());
while($result = mysql_fetch_assoc($query)) {
$id = $_SESSION['id'] = $result['id'];
$Username = $result['username'];
$Password = $result['password'];
}*/
?>

<h1 style='color:white' align='center'>Welcome To Edwardes College <br>(TEACHER PANEL)</h1>
</td>
</tr>

<!--Menu Bar-->
<tr height='25%' align='center'>
<td><a href='viewstudentinfo.php'><font color='blue'>Student Record</font></a></td>
<td><a href='memberview.php'><font color='blue'>Registered Members</font></a></td>
</tr>
</table>

<table border='2' width='100%' height='70%' valign='bottom'>
<tr bgcolor='#8CFF8C'>
<td colspan='6'>

<!-- Body Begins -->

<?php
include ("includes/db.php");
$query = mysql_query("SELECT * FROM admission_form") or die(mysql_error());
echo "<br><br><table border='2' align='center'>";
echo "<tr><td colspan='4' align='center'>";echo "<font color='red' size='5'><b>"; echo @$_GET['Upd'];echo @$_GET['del']; echo "</b></font></td></tr>";

while($result = mysql_fetch_assoc($query))
{

$org_path = $result['image'];	

$id = $result['id'];

echo "<tr><td colspan='2' align='center'><b>ROLL NUMBER:</b>"; 
echo $roll = $result['roll']; echo "</td>

<th colspan='2'><img src='$org_path' height='125px' width='125px' /></th></tr>";

echo "<tr><th colspan='2'>Student Info</th><th colspan='2'>Academic Record</th></tr>";

echo "<tr><td><b>Student Name: </b></td><td>"; echo $s_name = $result['s_name']; 

echo "</td><td><b>Qualification: </b></td><td>"; echo $qualification = $result['qualification']; echo "</td></tr>";

echo "<tr><td><b>Father Name: </b></td><td>"; echo $f_name = $result['f_name']; 

echo "</td><td><b>Year of Passing: </b></td><td>"; echo $year = $result['year']; echo "</td></tr>";

echo "<tr><td><b>Gender: </b></td><td>"; echo $gender = $result['gender']; 

echo "</td><td><b>Institute: </b></td><td>"; echo $university = $result['university']; echo "</td></tr>";

echo "<tr><td><b>Date of Birth: </b></td><td>"; echo $dob = $result['dob']; 

echo "</td><td><b>Obtained Marks: </b></td><td>"; echo $obtained = $result['obtained']; echo "</td></tr>";

echo "<tr><td><b>CNIC: </b></td><td>"; echo $cnic = $result['cnic']; 

echo "</td><td><b>Total Marks: </b></td><td>"; echo $total = $result['total']; echo "</td></tr>";

echo "<tr><td><b>Mobile No: </b></td><td>"; echo $mobile = $result['mobile']; 

echo "</td><td><b>CGPA: </b></td><td>"; echo $cgpa = $result['cgpa']; echo "</td></tr>";

echo "<tr><td><b>Email: </b></td><td>"; echo $email = $result['email']; 

echo "</td><td><b>Subject: </b></td><td>"; echo $subject = $result['subject']; echo "</td></tr>";

echo "<tr><td colspan='2'><b>Permanent Address : </b></td><td colspan='2'>"; echo $paddress = $result['paddress']; echo "</td></tr>";

echo "<tr><td colspan='2'><b>Temporary Address: </b></td><td colspan='2'>"; echo $taddress = $result['taddress']; echo "</td></tr>";

echo "<tr align='center'><td colspan='2'><a href='deleteinfo.php?d=$id'><font color='blue'>Delete</font></a></td>";

echo "<td colspan='2'>"; echo "<a href='editstudentinfo.php?d=$id'><font color='blue'>Edit</font></a>"; echo "</td></tr>";

echo "<tr><td colspan='4' align='center'><br>X=X=X=X=X=X=X=X=X=X=X=X=X=X=X<br></td></tr>";
}
echo "</table>";
?>

<!-- End of Body   -->

</td>
</tr>
</table>
</body>
</html>