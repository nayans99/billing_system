<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'bill_software';

	$con = mysqli_connect($host, $user, $pass, $db);
	if($con)
		$truncatetable= mysqli_query($con, "TRUNCATE TABLE bill");
		echo "Truncated!";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="exCSS.css" />
	<title>BILLING SOFTWARE</title>
</head>
<body>
	<div class="container"><center>
	<button class="button" onclick="window.location.href = 'bill_l.php';">Create Bill</button>
	</center></div>
</body>
</html>