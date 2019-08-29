<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "sb_realestate"); 
if(isset($_POST["member_email"]))
{
 $member_email = mysqli_real_escape_string($connect, $_POST["member_email"]);
 $query = "SELECT * FROM member WHERE member_email = '".$member_email."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
?>
