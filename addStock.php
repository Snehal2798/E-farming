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
	<title>Add Stock</title>


</head> 
<body>
	<div class="topStyle">
		<h2 style="color:white;">E-Farming</h2>
		<a class='userNameDisplay'><?php echo $_SESSION['loginUser']; ?></a>
	</div>
	<div class='sidebar'>
		<button onclick="location.href='adminHome.php'">Home</button>
		<button onclick="location.href='viewProducts.php'">View Products</button>
		<button onclick="location.href='addStock.php'">Add Stock</button>
		<button onclick="location.href='addProduct.php'">Add New Product</button>
		<button onclick="location.href='customers.php'">Customers</button>
		<button onclick="location.href='customerBill.php'">Customer Bill</button>
		<button onclick="location.href='logout.php'">Logout</button>
	</div>
<div class='container'>

	<fieldset><legend><b>Categories</b></legend>
		<table><tr><th>Category ID</th><th>Category Name</th></tr>
		<?php 
			$conn=mysqli_connect("localhost","root","","farm");
			$sql="select * from categories";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr><td>".$row['category_id']."</td><td>".$row['category_name']."</td></tr>";
			}
			echo "</table><br>";
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
			<input class='formInputItem' type=text name="catID" placeholder="Enter Category ID" required><input class='goBtn' type=submit name='submit' value='Go'>
		</form><br><br>
	</fieldset>
		<?php 
			if(isset($_GET['submit'])){
				$catID=$_GET['catID'];
				$sql="select * from products where category_id='$catID'";
				$result=mysqli_query($conn,$sql);
				echo "<fieldset><legend><b>Products</b></legend>
					<table><tr><th>Product ID</th><th>Product Name</th><th>Price</th><th>Stock Left</th></tr>";
				while($row=mysqli_fetch_assoc($result)){
					echo "<tr><td>".$row['product_id']."</td><td>".$row['product_name']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td></tr>";
				}
				echo "</table>
		    <form action='updateStock.php' method='get'>
		    	<input class='formInputItem' type=text name='productID' placeholder='Enter Product ID' required><input class='formInputItem' type=text name='quantity' placeholder='Enter Quantity' required><input class='goBtn' type=submit name='submit' value='Update Stock'>
		    </form>
		</fieldset><br>";
				
			}
			
		?>
		



</div>
</body>
</html>