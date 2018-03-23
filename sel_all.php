<?php
//connect to database
	include 'login.php';
	$db_name = $login['DB_DATABASE'];
	$table_name = $login['DB_TABLE'];
	$display_block = "";
	$host = $login['DB_HOST'];
	$connection = @mysqli_connect($host, $login['DB_USERNAME'], $login['DB_PASSWORD']) or die(mysql_error());
	$db = @mysqli_select_db($connection, $db_name) or die(mysql_error());
    
    //select everything from table
	$sql = "SELECT * FROM $table_name";
	$result = @mysqli_query($connection, $sql) or die(mysqli_error($connection));
	while ($row = mysqli_fetch_array($result)) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $phone = $row['phone'];
        $email = $row['email'];
        $mail = $row['mail'];
        $city = $row['city'];
        $province = $row['province'];
        $postal = $row['postal'];
        $birthday = $row['birthday'];
        
        //display it all on the page
        $display_block .= "<p>$firstName, $lastName, $phone, $email, $mail, $city, $province, $postal, $birthday</p>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>All Clients</title>
	</head>
	<body>
		<h1>All clients</h1>
		<?php echo "$display_block"; ?>
		<p><a href="index.html">Back</a></p>
	</body>
</html>
