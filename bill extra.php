<?php
	session_start(); 
	if(!isset($_SESSION['loginUser'])){
		header("Location:logout.php");
	}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel='stylesheet' href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Bill</title>


</head> 
<body>
	<div class="topStyle">
		<h2 style="color:white;">Farm Management System</h2>
		<a class='userNameDisplay'><?php echo $_SESSION['loginUser']; ?></a>
	</div>
	<div class='sidebar'>
		<button onclick="location.href='customerHome.php'">Home</button>
		<button onclick="location.href='viewProductsCustomer.php'">View Products</button>
		<button onclick="location.href='order.php'">Order</button>
		<button onclick="location.href='bill.php'">Bill</button>
		<button onclick="location.href='logout.php'">Logout</button>
	</div>
<div class='container'>

	<fieldset><legend><b>Bill</b></legend>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'><table><tr><th>Product Name</th><th>Quantity</th><th>Price</th></tr>
		
		<?php 
			$conn=mysqli_connect("localhost","root","","farm");
			$curUser=$_SESSION['loginUser'];
			$sql="select * from bill where customer_id='$curUser'";
			$result=mysqli_query($conn,$sql);
			$totPrice=0;
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['product_name']."</td><td>".$row['quantity']."</td><td>".$row['price']."</td><td><button type='submit' class='goBtn' name='submit' value='".$row['product_id']."'>Remove</button></td></tr>";
				$totPrice+=$row['price'];
			}
			echo "</table><br><legend>Total Price: </legend>".$totPrice."</form>";
			?>
			<form action='customerHome.php' method='get'>
		<button style='float:right;width:200px;height:5em;' type='submit' name='submit' value='submit' class='goBtn'>Ok</button></form>		
	</fieldset>
		<?php 
			if(isset($_GET['submit'])){
				$prodID=$_GET['submit'];
				$sql="select * from bill where product_id='$prodID' and customer_id='$curUser'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$quan=$row['quantity'];
				$sql="select * from products where product_id='$prodID'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				$remQuan=$row['quantity'];
				$remQuan+=$quan;
				$sql="update products set quantity='$remQuan' where product_id='$prodID'";
				$result=mysqli_query($conn,$sql);
				$sql="delete from bill where product_id='$prodID' and customer_id='$curUser'";
				$result=mysqli_query($conn,$sql);
				header("Location:bill.php");
				
			}
		?>
		
		



</div>
</body>
</html>