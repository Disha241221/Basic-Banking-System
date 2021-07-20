<?php 
	include 'connection.php';

	if(isset($_POST['submit'])){
		$to = $_POST['user'];
		$amount = $_POST['amount'];
		$from = $_POST['name'];
	
	
	if ($amount <= 0) {
		printf("Error: ammount should be greater than 0");
		exit();
	}

	$result1 = mysqli_query($con,"SELECT * FROM customer where name='$to'");
	if (!$result1) {
		printf("Error: account not found");
		exit();
	}

	$result2 = mysqli_query($con,"SELECT * FROM customer where name='$from'");
	if (!$result2) {
		printf("Error: account not found");
		exit();
	}
	

	$c = "UPDATE customer SET `current-balance`=`current-balance`+'$amount' WHERE name='$to'";
	mysqli_query($con,$c);
	
	
	$e = "UPDATE customer SET `current-balance`=`current-balance`-'$amount' WHERE name='$from'";
	mysqli_query($con,$e);
	
	$history = "INSERT INTO transaction(`sender`, `receiver`, `amount`) VALUES('$from', '$to', $amount)";
	mysqli_query($con,$history);

}
	
?>

<html>
<head>
<script>
alert("Your Transaction has been Successful");
window.location.href="customers.php";
</script>
</head>
<html>