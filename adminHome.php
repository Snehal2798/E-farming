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
	<title>Admin Home</title>


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

	<fieldset><legend><b>You can</b></legend>
<p>- View Products
- Add New Product
- View Customers
- View Customers Bill
</p>
</fieldset>



</div>
</body>
</html>