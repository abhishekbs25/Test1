<?php
	$ID=$_POST['id'];
	$ch=$_POST['Btn'];
	$host='localhost';
	$username='root';
	$password='';
	$dbname = "studentdb";
	$conn=mysqli_connect($host,$username,$password,"$dbname");
	if(!$conn)
        {
          die('Could not Connect MySql Server:' .mysql_error());
        }
	
	$result=mysqli_query($conn,"SELECT * from student where ID='$ID'");
	/* $fname=$result['FName'];
	$lname=$result['LName'];
	$mail=$result['Email'];
	$pno=$result['Contact']; */


	if($ch=='View')
	{	
		?>
				<html><body border=1>
				<table border=1>
        			<tr>
				    <th>ID</th>
        			    <th>First name</th>
        			    <th>Last name</th>
        			    <th>Email</th>
        			    <th>Contact</th>
				</tr>
				<?php
				while($data = mysqli_fetch_array($result))
				{
				?>
				
				<tr>
					<td contenteditable='false'><input type="text" id="id" name="id" value="<?php echo $data['ID'];?>"></td> 
					<td contenteditable='false'><input type="text" id="fname" name="fname" value="<?php echo $data['FName']; ?>"></td>
					<td contenteditable='false'><input type="text" id="lname" name="lname" value="<?php echo $data['LName'];?>"></td>
					<td contenteditable='false'><input type="text" id="email" name="email" value="<?php echo $data['Email'];?>"></td>
                			<td contenteditable='false'><input type="text" id="phone" name="phone" value="<?php echo $data['Contact'];?>"></td>
				
				</tr>

				<?php
				}
				?>
				</table>
				</body>
				</html>
<?php
	}
	else if($ch=="Edit")
	{
?>
		<html><body border=1>
				<table border=1>
        			<tr>
				    <th>ID</th>
        			    <th>First name</th>
        			    <th>Last name</th>
        			    <th>Email</th>
        			    <th>Contact</th>
				    
				</tr>
				<?php
				while($data = mysqli_fetch_array($result))
				{
				?>
				<form action="update.php" method="POST">
				<tr>
					<td contenteditable='true'><input type="text" id="id" name="id" value="<?php echo $data['ID'];?>"></td> 
					<td contenteditable='true'><input type="text" id="fname" name="fname" value="<?php echo $data['FName']; ?>"></td>
					<td contenteditable='true'><input type="text" id="lname" name="lname" value="<?php echo $data['LName'];?>"></td>
					<td contenteditable='true'><input type="text" id="email" name="email" value="<?php echo $data['Email'];?>"></td>
                			<td contenteditable='true'><input type="text" id="phone" name="phone" value="<?php echo $data['Contact'];?>"></td>
					
				</tr>
				<tr text-align: center>
				<td text-align: center colspan=6><input type="submit" name=Btn value="Update" align: center></button></td>
				</tr>
				</form>
				<?php
				}
				?>
				
				</table>
				</body>
				</html>	
<?php
	}
	else if($ch=="Delete")
	{	
		$conn=mysqli_connect($host,$username,$password,"$dbname");
		if(!$conn)
     	 	{
      			die('Could not Connect MySql Server:' .mysql_error());
		}
		mysqli_query($conn,"DELETE FROM student where student.ID='$ID'");
		echo "Record deleted Successfully";	
	}
?>