<!DOCTYPE html>
<html>
<head>
	<title>table with database</title>
</head>
<body>
	<table>
		<tr>
			<th>name</th>
			<th>email</th><br>
			<th>message</th><br>
		</tr>
		<?php
		$conn = mysqli_connect("localhost","root","","csscontact_form") ;
		if ($conn->  connect_error){
		die("connection failed:". $conn-> connect_error);
	}
		$sql = "SELECT name, email,message from form";
		$result = $conn-> query($sql);

		if($result-> num_rows > 0){
			while ($row = $result-> fetch_assoc()) {
				echo "<tr><td>". $row["name"] ."<td><tr>". $row["email"] ."<tr><td>". $row["message"] ."<td><tr>";
			}
          echo "</table>";
		}
		else{
			echo "0 result";
	}
	$conn-> close(); 
		?>
	</table>

</body>
</html>