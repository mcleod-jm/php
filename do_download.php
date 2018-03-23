<?php
//connect to databse
	include 'login.php';
	$db_name = $login['DB_DATABASE'];
	$table_name = $login['DB_TABLE'];
	$CSV;
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
        
        //put it in a string
        $CSV .= "$firstName,$lastName,$phone,$email,$mail,$city,$province,$postal,$birthday\n";
    }

    //create and populate file
    $fileName = "./clients.CSV";
    $newFile = fopen($fileName, "w+");
    @fwrite($newFile, $CSV);
    fclose($newFile);

    //download it to user
    header("Location: ./clients.csv");
?>