<?php
session_start();
if(!$_SESSION['u_name']){
	header('location:index.php');
	exit();
}	
?>
<html>
<head><title>About Us</title></head>
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
The Church Missionary Society (CMS) with the assistance of Sir Herbert Edwardes, the British commissioner of Peshawar, established Edwardes College in 1900 in the most beautiful part of the Peshawar Cantonment. The institution was named Edwardes in recognition of the commissioner's meritorious contribution. Symmetrical and balanced, the Mughal-style buildings amidst sprawled lush green lawns symbolizing rich cultural heritage of the region were designed by its first Principal, the Reverend J. H. Hoare. The Principal's bungalow remarkable for its unadorned beauty in style is the oldest building that was bought in 1885, long before founding of the college, by the CMS as the centre for its local work .

The college started its educational services in 1900 in the Province. Since then it has been a worthy seat of learning and has produced icons and idols in different walks of life. Its efforts never went unappreciated and is graced with visits and commendations from dignitaries of their times. Flanked by Principal, Rev. Dalaya and Khan Abdul Ghaffar Khan  (Bacha Khan), Mahatma Gandhi visited Edwardes college on May 18, 1933. During the same era, distinguished visitors to the college included Liaquat Ali Khan (First Prime Minister to Pakistan), Pundit Jawaharlal Nehru (First Prime Minister to India), Khawaja Nazimuddin (Second Governor General and later second Prime Minister to Pakistan), and Dr. Khan Sahib (First Chief Minister to the then N.W.F.P now Khyber Pukhtunkhwa Province). Quaid-e-Azam Muhammad Ali Jinnah, founder of the nation, visited this institution thrice specifically asking students ?to keep your heads up as citizens of a free and independent sovereign state? in his visit on April 18, 1948.

During early days, the college was affiliated with the University of Punjab. In late 1950s, the College associated itself with the University of Peshawar for various courses. The nationalization of the college in 1970s was questioned and the then provincial Governor in collaboration with all the respective stakeholders constituted a Board of Governors for this prestigious college. The existing Board of Governors, is a resourceful body that is chaired by the Governor of the Province.  
Edwardes College is the oldest institution of higher education in Khyber Pakhtunkhwa. It has been encouraging students? talents in drama, debates, sports and writing. Apart from contribution to higher education in the most impoverished and troubled region of Pakistan, its greatest service and pride is imparting the much required message of our challenging times?human life and reason are sacred. With this understanding, it lifts every bar of distinction and discrimination against class, caste and creed. Edwardes College promotes interfaith harmony and peaceful co-existence as people of different faiths are teaching and studying here since its establishment. It has evolved a culture that resists ignorance and extremism and inculcates love for humanity through service to humanity. Edwardes College welcomes respects and nourishes eclectic ideas and beliefs with an understanding that diversity is the design of God and beauty of the universe.

</td>
</tr>
</table>
</body>
</html>