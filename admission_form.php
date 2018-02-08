<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>Admission Form</title></head>
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


<tr bgcolor='#8CFF8C'>
<td colspan='6'>
<!-- Body Begins -->
<br><br><br><br>
<form method='post' action='admission_form.php' enctype='multipart/form-data'>

<table border='2' width='50%' align='center' cellspacing='5' cellpadding='5'>

<tr><td colspan='2' align='center'><h3 style="color:red">

<?php echo @$_GET['rol']; ?>
<?php echo @$_GET['name']; ?>
<?php echo @$_GET['father']; ?>
<?php echo @$_GET['gen']; ?>
<?php echo @$_GET['dateob']; ?>
<?php echo @$_GET['nic']; ?>
<?php echo @$_GET['mob']; ?>
<?php echo @$_GET['mail']; ?>
<?php echo @$_GET['paddress']; ?>
<?php echo @$_GET['taddress']; ?>
<?php echo @$_GET['yea']; ?>
<?php echo @$_GET['uni']; ?>
<?php echo @$_GET['obt']; ?>
<?php echo @$_GET['tot']; ?>
<?php echo @$_GET['gpa']; ?>
<?php echo @$_GET['sub']; ?>
<?php echo @$_GET['img']; ?>
</h3>
<h3 style="color:green"><?php echo @$_GET['msg']; ?></h3>
</td></tr>
<tr><td align='left' colspan='2'><font size='5'>Personal Information</font></td></tr>
<tr><td>Roll No:</td><td><input type='text' name='roll' maxlength='10'></td></tr>
<tr><td>Student_Name:</td><td><input type='text' name='s_name' maxlength='30'></td></tr>
<tr><td>Father_Name:</td><td><input type='text' name='f_name' maxlength='30'></td></tr>
<tr><td>Gender:</td><td><input type='radio' name='gender' value='Male'>Male
       <input type='radio' name='gender' value='Female'>Female</td></tr>
<tr><td>DOB:</td><td><input type='date' name='dob'></td></tr>
<tr><td>CNIC:</td><td><input type='text' name='cnic' maxlength='15' placeholder='42102-3454567-5'></td></tr>
<tr><td>Mobile_No:</td><td><input type='text' name='mobile' maxlength='15' placeholder='+92-333-3465987'></td></tr>
<tr><td>Email:</td><td><input type='email' name='email' placeholder="example@gmail.com"></td></tr>
<tr><td>Permanent_Address:</td><td><input type='text' name='p_address' maxlength='100'></td></tr>
<tr><td>Temporary_Address:</td><td><input type='text' name='t_address' maxlength='100'></td></tr>

<tr><td align='left' colspan='2'><font size='5'>Previous Academic Record</font></td></tr>

<tr><td>Qualification:</td><td><select name='qualification'>
<option value="SSC" selected>Matric
<option value="HSSC">HSSC
<option value="BS">BS
<option value="BSC">BSC
<option value="MS">MS
<option value="MSC">MSC
</select></td></tr>

<tr><td>Year_of_Passing:</td><td><input type='number' name='year' maxlength='4' placeholder='2015'>

<tr><td>From_Which_Institute:</td><td><input type='text' name='university' maxlength='30' placeholder='Peshawar University'></td></tr>
<tr><td>Marks_Obtained:</td><td><input type='number' name='obtained' maxlength='5'></td></tr>
<tr><td>Total_Marks:</td><td><input type='number' name='total' maxlength='5'></td></tr>
<tr><td>CGPA:</td><td><input type='text' name='cgpa' maxlength='5' placeholder='3.0'></td></tr>
<tr><td>Subject_In_Which_Admission_is_Reqiured:</td><td><input type='text' name='subject' maxlength='30' placeholder='Computer Science'></td></tr>
<tr><td>Attach_Your_Photo:</td><td><input type='file' name='image'></td></tr>
<tr><td align='center' colspan='2'><input type='submit' name='submit' value='Send'></td></tr>

</table>
</form>

</td>
</tr>


</table>
</body>
</html>


<?php
include ("includes/db.php"); 
if(isset($_POST['submit']))
{
$Roll = $_POST['roll'];
$Student_Name = $_POST['s_name'];
$Father_Name = $_POST['f_name'];
$Gender = $_POST['gender'];
$Dob = $_POST['dob'];
$Cnic = $_POST['cnic'];
$Mobile_No = $_POST['mobile'];
$Email = $_POST['email'];
$P_Address = $_POST['p_address'];
$T_Address = $_POST['t_address'];
$Qualification = $_POST['qualification'];
$Year = $_POST['year'];
$University = $_POST['university'];
$Obtained = $_POST['obtained'];
$Total = $_POST['total'];
$Cgpa = $_POST['cgpa'];
$Subject = $_POST['subject'];

$img_name=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
//$org_path="images/$img_name";
move_uploaded_file($tmp,$org_path);


if($Roll==''){
	echo 
	"<script>window.open('admission_form.php?rol=Roll No is Required','self')</script>";
	exit();
}

if($Student_Name==''){
	echo 
	"<script>window.open('admission_form.php?name=Student_Name is Required','self')</script>";
	exit();
}
if($Father_Name==''){
	echo 
	"<script>window.open('admission_form.php?father=Father_Name is Required','self')</script>";
	exit();
}
if($Gender==''){
	echo 
	"<script>window.open('admission_form.php?gen=Gender is Required','self')</script>";
	exit();
}
if($Dob==''){
	echo 
	"<script>window.open('admission_form.php?dateob=DOB is Required','self')</script>";
	exit();
}
if($Cnic==''){
	echo 
	"<script>window.open('admission_form.php?nic=CNIC is Required','self')</script>";
	exit();
}
if($Mobile_No==''){
	echo 
	"<script>window.open('admission_form.php?mob=Mobile_No is Required','self')</script>";
	exit();
}
if($Email==''){
	echo 
	"<script>window.open('admission_form.php?mail=Email is Required','self')</script>";
	exit();
}
if($P_Address==''){
	echo 
	"<script>window.open('admission_form.php?paddress=Permanent_Address is Required','self')</script>";
	exit();
}
if($T_Address==''){
	echo 
	"<script>window.open('admission_form.php?taddress=Temporary_Address is Required','self')</script>";
	exit();
}

if($Year==''){
	echo 
	"<script>window.open('admission_form.php?yea=Year_of_Passing is Required','self')</script>";
	exit();
}
if($University==''){
	echo 
	"<script>window.open('admission_form.php?uni=University is Required','self')</script>";
	exit();
}
if($Obtained==''){
	echo 
	"<script>window.open('admission_form.php?obt=Obtained_Marks is Required','self')</script>";
	exit();
}
if($Total==''){
	echo 
	"<script>window.open('admission_form.php?tot=Total_Marks is Required','self')</script>";
	exit();
}
if($Cgpa==''){
	echo 
	"<script>window.open('admission_form.php?gpa=CGPA is Required','self')</script>";
	exit();
}
if($Subject==''){
	echo 
	"<script>window.open('admission_form.php?sub=Subject is Required','self')</script>";
	exit();
}
if($org_path==''){
	echo 
	"<script>window.open('admission_form.php?img=Image is Required','self')</script>";
	exit();

	}

$que="INSERT INTO admission_form(roll,s_name,f_name,gender,dob,cnic,mobile,email,paddress,taddress,qualification,year,university,obtained,total,cgpa,subject,image)
VALUES('$Roll','$Student_Name','$Father_Name','$Gender','$Dob','$Cnic','$Mobile_No','$Email','$P_Address','$T_Address','$Qualification','$Year','$University','$Obtained','$Total','$Cgpa','$Subject','$org_path')";

if(mysql_query($que)){
echo "<script>window.open('admission_form.php?msg=Registered Successfully!','_self')</script>";
    exit();
}
}
?>
