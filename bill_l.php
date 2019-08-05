<?php 
	if(isset($_POST["Add"])){
		if(!empty($_POST["item"]) && !empty($_POST["quantity"]) && !empty($_POST["cost"]) ){
		$name = $_POST["item"];
		$quantity = $_POST["quantity"];		
		$cost = $_POST["cost"];

		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'bill_software';

		$con = mysqli_connect($host, $user, $pass, $db);
		if($con)
			$sql = "insert into bill (Item_name, Item_quantity, Item_cost) values ('$name', '$quantity', '$cost')";
		$query = mysqli_query($con, $sql);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="exCSS.css" />
	<title>BILLING SOFTWARE</title>
	<script type="text/javascript">
		function valid(){
			var x1 = document.forms["bill_item"]["item"].value;
			if(x1 == "")
			{
				alert("Item must not be empty");
				return false;
			}
			var x3 = document.forms["bill_item"]["quantity"].value;
			if(x3 == "")
			{
				alert("Quantity field must not be empty");
				return false;
			}
			var x4 = document.forms["bill_item"]["cost"].value;
			if(x4 == "")
			{
				alert("Cost field must not be empty");
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
</head>
<body>
	<center>
		<div class="f"><div class="card">
			<h1>ENTER DETAILS!</h1>
			<form method = "POST" name="bill_item" action="bill_l.php" onsubmit="return valid();">
	<input type="text" name="item" placeholder="Enter item name"><br><br>
	<input type="number" name="quantity" placeholder="Enter quantity"><br><br>
	<input type="number" name="cost" placeholder="Enter cost"><br><br>
	<input type="submit" name="Add" class="button" value="Add"> 
	</form>
</div>
	<button id = "done" class="button1" name = "done" >Done </button>
	<script type="text/javascript">
    document.getElementById("done").onclick = function () {
        location.href = "calculate_l.php";
    };
</script>
</div>
<button id="new" 
class="button2" >CREATE NEW BILL</button>
<script type="text/javascript">
    document.getElementById("new").onclick = function () {
        location.href = "bill_software_l.php";
    };
</script>
</center>
</body>
</html>