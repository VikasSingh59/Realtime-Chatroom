<?php
// getting the value of post parameters
$room = $_POST['room'];


// checking for string size
if (strlen($room)>20 or strlen($room)<2)
 {		
	$message = "please choose a name between 2 to 20 characters";
	echo '<script language="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/chatroom";';
	echo '</script>';
}

// checking whether room name is alphanumeric
else if(!ctype_alnum($room))
{
	$message = "please choose an alphanumeric room name";
	echo '<script language="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/chatroom";';
	echo '</script>';
}

else
{
	// connect to the database
	include 'db_connect.php';
}
  
// check if room already exists

$sql = "SELECT * FROM `rooms` WHERE roomname = '$room'";
$result = mysqli_query($conn, $sql);
if($result)
{
	if(mysqli_num_rows($results) >0)
	{
	$message = "please choose a different room name. this room is already claimed";
	echo '<script language="javascript">';
	echo 'alert("'.$message.'");';
	echo 'window.location="http://localhost/chatroom";';
	echo '</script>';	
	}

	else
	{
		$sql =" INSERT INTO `rooms` (`Roomname`, `stime`) VALUES ( '$room', CURRENT_TIMESTAMP);";
		if (mysqli_query($conn, $sql))
		 {	
			$message = "Your room is ready and you can chat now!";
			echo '<script language="javascript">';
			echo 'alert("'.$message.'");';
			echo 'window.location="http://localhost/chatroom/rooms.php?roomname=' . $room. '";';
			echo '</script>';
		}
	}
}

else
{
	echo "Error: ". mysql_error($conn);
}

?>