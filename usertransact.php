
<?php 

	
	include 'connection.php';

	if(isset($_GET['name'])){
		$Name=$_GET['name'];
	}

	$q="SELECT * From customer WHERE Name='$Name'";
	$result=mysqli_query($con,$q);
?>


<!DOCTYPE HTML>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
		<title>MONEY TRANSACTION</title>
		 <link rel="stylesheet" href="customers.css">
		 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>

	<body>

	<div class="navbar">
  <div class="logo">
    <img src="logo.jpg" id="logoimg" height="60px" width="70px">
  </div>

<ul id="navlist">
  
  <li class="navlist"><a href="index.php"><i class='fa fa-home' aria-hidden='true'></i>Home</a></li>
   <li class="navlist"><a href="customers.php"><i class='fa fa-users' aria-hidden='true'></i>View Customers</a></li>
   <li class="navlist"><a class='active' href="transfer.php"><i class="fa fa-money" aria-hidden="true"></i> Payment Transfer</a></li>
    <li class="navlist"><a href="transactionhistory.php"><i class='fa fa-exchange' aria-hidden='true'></i>Transaction History</a></li>

</ul>
</div>

<div>
  	
 <h1 class="title" style="color:white">User Payment Transaction</h1>
 
 <h4 class="text"> Below are the User Account Details </h4>

 </div>
 <br>

 <br>

 <div>
		
		<table style="background-color:grey; font-weight: bold;">
           <th>CUSTOMER ID</th>
           <th>NAME </th>
           <th>EMAIL</th>
		   <th>CURRENT BALANCE</th>
           <tr>
		   
			<?php  
				$row=mysqli_fetch_array($result)
			?>
			
             
			<td><?php echo  $row["id"]; ?></td>
			<td><?php echo  $row["name"]; ?></td>
			<td><?php echo  $row["email"]; ?></td>
			<td><?php echo  $row["current-balance"]; ?></td>
           </tr>

        </table>
	</div>
        
	<form method='post' action='successtransfer.php'>
<br><br>
	
	<table border="0px" style="background-color:black; color: white;">
		<tr>
		<td>Transfer To:</td>
		<input type="text" name="name" value="<?php echo $row['name'];?>" hidden>
		<td><select name="user">
			<option>--Select--</option>
   
			<?php  
				$q1="select * from customer";
				$result1=mysqli_query($con,$q1);
				while($row=mysqli_fetch_array($result1)){
			?>

			<option value="<?php echo $row['name']; ?>"> <?php echo $row["name"]; ?></option>

			<?php }
			?>
			
            </select></td></tr> 
			<tr><td>Amount:</td><td><input type="text" name="amount"></td></tr>
			<tr><td></td><td><input type="submit" class="button2" name="submit" value="submit"></td></tr>
	</table>

</form>

<footer>
  <p>Developed by Disha Jakasaniya</p><br>
  	<ul class="foot">
  	Contact Me:
   <li><a target="_blank" class="github" href="https://github.com/Disha241221"><i class="fa fa-github fa-2x"></i></a></li>	
   <li><a target="_blank" class="linkedin" href="https://www.linkedin.com/in/dishajakasaniya24/"><i class="fa fa-linkedin fa-2x"></i></a></li> 
</ul>

</footer>

</body>
</html>