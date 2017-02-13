<?php

$dbhost = getenv("DB_SERVICE_HOST");
$dbport = getenv("DB_SERVICE_PORT");
$dbname = getenv("DB_NAME");
$dbuser = getenv("DB_USER");
$dbpassword = getenv("DB_PASSWORD");

$host= gethostname();
$ip = gethostbyname($host);
echo "Just hit container '" . $host . "' (" . $ip . ")<br><br>";

$connection = mysqli_connect($dbhost . ":" . $dbport, $dbuser, $dbpassword, $dbname);

if (!$connection) {
	echo "Failed to connect to the database using these info:<br>";
	echo "dbhost = " . $dbhost . "<br>";
	echo "dbport = " . $dbport . "<br>";
	echo "dbname = " . $dbname . "<br>";
	echo "dbuser = " . $dbuser . "<br>";
	echo "dbpassword = " . $dbpassword . "<br>";
} else {
	echo "Successfully connected to the database '" . $dbname . "'.<br>";
	echo "Funny, how things can, sometimes, go as planned :)<br><br><b> Here is version 2</b><br><br>";

	$rs = $connection->query("SELECT * FROM users");
	if ($rs){
		while ($row = mysqli_fetch_assoc($rs)) {
			echo "id.: " . $row['user_id'] . " / naime: " . $row['username'] . "<br>";
		}
	}
	mysqli_close($connection);
}

?>
