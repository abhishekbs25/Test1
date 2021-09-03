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
	$result=mysqli_query($conn,"SELECT * from student");
	/* $fname=$result['FName'];
	$lname=$result['LName'];
	$mail=$result['Email'];
	$pno=$result['Contact']; */
?>
<html><body>
	<table border=1>
        <tr>
	    <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Contact</th>
            <th colspan="3">Action</th>
        </tr>
<?php
while($data = mysqli_fetch_array($result))
{
?>
<form action="view.php" method="POST">
	<tr>
		<td><input type="text" id="id" name=id value="<?php echo $data['ID'];?>"></td> 
		<td contenteditable='false'><?php echo $data['FName']; ?></td>
		<td contenteditable='false'><?php echo $data['LName'];?></td>
                <td contenteditable='false'><?php echo $data['Email'];?></td>
                <td contenteditable='false'><?php echo $data['Contact'];?></td>
                <td contenteditable='false'><input type="submit" name=Btn value="View"></button></td>
                <td contenteditable='false'><input type="submit" name=Btn value="Edit"></button></td>
                <td><input type="submit" name=Btn value="Delete"></button></td>
	</tr>
</form>
<?php
}
?>
	
</table>
</body>
</html>
	