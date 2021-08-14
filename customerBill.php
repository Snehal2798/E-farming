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
	<title>View Transactions</title>


</head> 
<body>
	<div class="topStyle">
		<h2 style="color:white;">E-Farming</h2>
		<a class='userNameDisplay'><?php echo $_SESSION['loginUser']; ?></a>
	</div>
	<div class='sidebar'>
		<button onclick="location.href='adminHome.php'">Home</button>
		<button onclick="location.href='viewProducts.php'">View Products</button>
		<button onclick="location.href='addProduct.php'">Add New Product</button>
		<button onclick="location.href='customers.php'">Customers</button>
		<button onclick="location.href='customerBill.php'">Customer Bill</button>
		<button onclick="location.href='logout.php'">Logout</button>
	</div>
<div class='container'>

	<fieldset><legend><b>Customers Bill</b></legend>
		<table class='tableLarge'><tr><th>Customer ID</th><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Price</th></tr>
		<?php 
			$conn=mysqli_connect("localhost","root","","farm");
			$sql="select * from cart";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['customer_id']."</td><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['quantity']."</td><td>".$row['price']."</td></tr>";
			}
			echo "</table><br>";
		?>
	</fieldset>
	



</div>
</body>
</html>