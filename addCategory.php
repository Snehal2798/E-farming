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
	<title>Add Category</title>


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

	<fieldset><legend><b>Add a category</b></legend>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='get'>
			<label for='cName'> Category Name: </label><input id='cName' type=text class='formInputItem' name='cName' required><br>
			<label for='catID'>Category ID: </label><input id='catID' type=text class='formInputItem' name='catID' required><br>
			
			<label for='submit'></label><input class='goBtn' type=submit name='submit' value='Add Category'>
		</form>
	</fieldset>
	<?php
		$conn=mysqli_connect("localhost","root","","farm");
		if(isset($_GET['submit'])){
				$sql="insert into categories(category_name,category_id) values('$cName','$catID')";
				$result=mysqli_query($conn,$sql);
				echo "<script>alert('Category  added');</script>";
				header("refresh:0;url=addCategory.php");
			}
		
	?>



</div>
</body>
</html>