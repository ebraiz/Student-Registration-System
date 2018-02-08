<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>Contact Us</title></head>
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

<h1 style='color:white' align='center'>Welcome To Edwardes College</h1>
</td>
</tr>

<!--Menu Bar-->
<tr height='25%' align='center'>
<td><a href='admission_form.php'>Home</a></td>
<td><a href='admission_form.php'>Admission Form</a></td>
<td><a href='about.php'>About Us</a></td>
<td><a href='contact.php'>Contact Us</a></td>

</tr>

</table>

<table border='2' width='100%' height='70%' valign='bottom'>

<!--Body-->
<tr bgcolor='#8CFF8C'>
<td colspan='6'>
</br></br><h3>ADDRESS:</h3>

<h4>The Mall Peshawar Cantonment, Khyber Pakhtunkhwa Pakistan.</h4>

</br></br><h3>NORMAL OFFICE HOURS:</h3>
<h4>Monday to Friday: 8:00am to 5:00pm.</h4>

</br></br><h3>RAMDAN TIMINGS:</h3>

<h4>Monday to Friday: 8:00am to 1:00pm.</h4>

</br></br><h3>PHONE NUMBERS:</h3>

<h4>
</br>-Edwardes College Office(inquiry): 091-5275154 Ext 0, 091-5275211 Ext 0.
</br>-Secretary to the Principal: 091-5275154 Ext 103, 091-5275211 Ext 103, 091-5276765.
</br>-Admin Office: 091-5275154 Ext 109, 0915275211 Ext 109, 5276268.
</br>-Finance Department: 091-5275154 Ext 115-120, 0915275211 Ext 115-120, 091-5275236, 091-5273021.
</br>-Estate Department: 091-5275154 Ext 136, 091-5272233.
</br>-College Fax: 091-5274172.
</h4>

</br></br><h3>ADMISSION INQUIRY:</h3>

<h4>
</br>-Inter Year Head (FSc / FA) : 091-5275154 Ext 333 / 133 , 091-5275211 Ext 333 / 133, 091-5285803.
</br>-Degree Year Head (BA / BSc) : 091-5275154 Ext 141, 091-5275211 Ext 141, 091-5274488.
</br>-Head Department of Computer Science (BS-CS): 091-5275154  Ext 123, 091-5275211 Ext 123, 091-5284033.
</br>-Director A Levels:  091-5275154  Ext 122 / 124, 091-5275211 Ext 122 / 124, 091-5274673.
</br>-HoD Professional Studies (HND / MBA): 091-5275154  Ext 125 / 127, 091-5275211 Ext 125 / 127, 091-5274653.
</h4>

</br></br><h3>WEBSITE:</h3><h4>Incharge College Website / HoD Computer Sc: 5284033.</h4>

</td>
</tr>
</table>
</body>
</html>