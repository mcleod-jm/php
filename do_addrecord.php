<?php
	include 'login.php';
	$db_name = $login['DB_DATABASE'];
	$table_name = $login['DB_TABLE'];
	$display_block = "";
	$host = $login['DB_HOST'];
	$connection = @mysqli_connect($host, $login['DB_USERNAME'], $login['DB_PASSWORD']) or die(mysql_error());
	$db = @mysqli_select_db($connection, $db_name) or die(mysql_error());

	   $sql = "INSERT INTO $table_name 
	   (firstName, lastName, phone, email, mail, city, province, postal, birthday) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
	   $stmt = mysqli_prepare($connection, $sql);

	   echo $stmt;

	//$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

	$result = mysqli_stmt_bind_param($stmt, 'sssssssss', $_POST['firstName'], $_POST['lastName'], $_POST['phone'], $_POST['email'], $_POST['mail'], $_POST['city'], $_POST['province'], $_POST['postal'], $_POST['birthday']);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add a Record</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
	</head>
	<body>
		<h1>Adding a Record to <?php echo "$table_name"; ?></h1>
		<table cellspacing=3 cellpadding=3>
			<tr>
				<td valign=top>
					<p><strong>First Name:</strong><br>
					<?php echo "$_POST[firstName]"; ?></p>
					<p><strong>Last Name:</strong><br>
					<?php echo "$_POST[lastName]"; ?></p>
				</td>
				<td valign=top>
					<p><strong>Phone Number:</strong><br>
					<?php echo "$_POST[phone]"; ?>
					</p>
				</td>
				<td valign=top>
					<p><strong>Email Address:</strong><br>
					<?php echo "$_POST[email]"; ?>
					</p>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<p><strong>Mailing Address:</strong><br>
					<?php echo "$_POST[mail]"; ?></p>
				</td>
				<td valign=top>
					<p><strong>City:</strong><br>
					<?php echo "$_POST[city]"; ?></p>
				</td>
				<td valign=top>
					<p><strong>Province:</strong><br>
					<?php echo "$_POST[province]"; ?></p>
				</td>
				<td valign=top>
					<p><strong>Postal Code:</strong><br>
					<?php echo "$_POST[postal]"; ?></p>
				</td>
			</tr>
			<tr>
				<td valign=top>
					<p><strong>Birthday:</strong><br>
					<?php echo "$_POST[birthday]"; ?></p>
				</td>
			</tr>
		</table>
	</body>
</html>

