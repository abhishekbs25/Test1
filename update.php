<?php
$host='localhost';
	$username='root';
	$password='';
	$dbname = "studentdb";
	$conn=mysqli_connect($host,$username,$password,"$dbname");
	if(!$conn)
        {
          die('Could not Connect MySql Server:' .mysql_error());
        }
	$ID=$_POST['id'];
	$FN=$_POST['fname'];
	$LN=$_POST['lname'];
	$Mail=$_POST['email'];
	$pno=$_POST['phone'];


	mysqli_query($conn,"UPDATE student SET Fname='$FN', Lname='$LN', Email='$Mail', Contact='$pno' where ID='$ID'");
	echo "Record Updated successfully......."
?>