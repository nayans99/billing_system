<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<style type="text/css">
  table {
   width: 50%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: center;
     }
	</style>
</head>
<body><center>
	<table>
	<tr>
		<th>Name</th>
		<th>Quantity</th>
		<th>Cost</th>
		<th>Total</th>
	</tr>
	<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'bill_software';

	$con = mysqli_connect($host, $user, $pass, $db);
	if($con)
		$sql = "SELECT Item_name, Item_quantity, Item_cost, (Item_quantity*Item_cost) as total from bill";
	$result = $con -> query($sql);

	if($result-> num_rows > 0){
		while($row = $result -> fetch_assoc()){
			echo "<tr><td>". $row["Item_name"] ."</td><td>". $row["Item_quantity"] ."</td><td>". $row["Item_cost"] ."</td><td>". $row["total"] ." </td></tr>";
		}
			echo "</table>";
	}
	echo "</center>";
	$sql1 = mysqli_query($con, "SELECT SUM(Item_quantity*Item_cost) as value_sum FROM bill");
	$sql2 = mysqli_query($con, "SELECT SUM(Item_quantity*Item_cost)*0.18 as gst_sum FROM bill");
	$row = mysqli_fetch_assoc($sql1);
	$row2 = mysqli_fetch_assoc($sql2);
	$sum = $row['value_sum']; 
	$sum2 = $row2['gst_sum'];
	$sumt = $sum + $sum2;
	echo "<center> <br> <br>";
	echo "TOTAL COST : ";
	echo "$sum";
	echo "<br>";
	echo "GST : ";
	echo "$sum2";
	echo "<br>";
	echo "TOTAL : ";
	echo "$sumt";
	echo "</center>";

?>

<CENTER>
	<button id="new" 
class="button2" >CREATE NEW BILL</button>
<script type="text/javascript">
    document.getElementById("new").onclick = function () {
        location.href = "bill_software_l.php";
    };
</script>
</CENTER>
</table>
</body>
</html>