<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = 'php_water_supply';


// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];
    $type = $_POST['type'];
    
    // File Upload Handling
    $image_url = '';

    if (isset($_FILES["picture"]) && $_FILES["picture"]["error"] === UPLOAD_ERR_OK) {
        $uploadDir = "frontend/img/";  // Choose the directory to save the uploaded files
        $uploadFile = $uploadDir . basename($_FILES["picture"]["name"]);

        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $uploadFile)) {
            echo "File is valid, and was successfully uploaded.\n";
            $image_url = $uploadFile;
        } else {
            echo "Upload failed.\n";
        }
    }

    // Insert Data into the Database
    $sql = "INSERT INTO products (product_name, description, price, product_type, image_url) VALUES ('$product_name', '$description', $cost, '$type', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Product added successfully!";
    } else {
        $errorMessage = "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AQUA DROPS :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="frontend/plugins/fontawesome-free/css/all.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="frontend/css/adminlte.min.css">
		<link rel="stylesheet" href="frontend/css/custom.css">
		 <!-- bootstrap -->
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<style>
    form {
        max-width: 600px;
        width: 100%;
        margin: 3% auto;
        padding: 20px;
        background-color: #fff;
        border: 2px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    form label {
        display: block;
        margin-top: 10px;
    }

    form input[type="text"],
    form textarea,
    form input[type="number"],
    form select,
    form input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    form select {
        height: 40px;
    }

    form button {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        margin: 0 auto; /* Center the button */
    }
</style>


		
	</head>
	<body class="hold-transition sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<!-- Right navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
					  	<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
					</li>					
				</ul>
				<div class="navbar-nav pl-2">
					<!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
				</div>
				
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" data-widget="fullscreen" href="#" role="button">
							<i class="fas fa-expand-arrows-alt"></i>
						</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
							<img src="frontend/img/avatar5.png" class='img-circle elevation-2' width="40" height="40" alt="">
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
							<h4 class="h4 mb-0"><strong>ADMIN</strong></h4>
							<div class="mb-3">admin@egmail.com</div>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-user-cog mr-2"></i> Settings								
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">
								<i class="fas fa-lock mr-2"></i> Change Password
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item text-danger" id="logout-button">
    						<i class="fas fa-sign-out-alt mr-2"></i> Logout
							</a>

					</li>
				</ul>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="#" class="brand-link">
					<img src="frontend/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light">AQUA DROPS</span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user (optional) -->
					<nav class="mt-2">
						<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
							<!-- Add icons to the links using the .nav-icon class
								with font-awesome or any other icon font library -->
							<li class="nav-item">
							<a href="adminLogin.php" class="nav-link">
									<i class="nav-icon fas fa-tachometer-alt"></i>
									<p> Admin Dashboard</p>
								</a>																
							</li>
							<li class="nav-item">
								<a href="categories.html" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Category</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="subcategory.html" class="nav-link">
									<i class="nav-icon fas fa-file-alt"></i>
									<p>Sub Category</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="brands.html" class="nav-link">
									<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
									  </svg>
									<p>Brands</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="./add_product.php" class="nav-link">
									<i class="nav-icon fas fa-tag"></i>
									<p>Add Products</p>
								</a>
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link">
									<!-- <i class="nav-icon fas fa-tag"></i> -->
									<i class="fas fa-truck nav-icon"></i>
									<p>Shipping</p>
								</a>
							</li>							
							<li class="nav-item">
								<a href="orders.html" class="nav-link">
									<i class="nav-icon fas fa-shopping-bag"></i>
									<p>Orders</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="./discount_coupon.php" class="nav-link">
									<i class="nav-icon  fa fa-percent" aria-hidden="true"></i>
									<p>Discount</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="users.html" class="nav-link">
									<i class="nav-icon  fas fa-users"></i>
									<p>Users</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages.html" class="nav-link">
									<i class="nav-icon  far fa-file-alt"></i>
									<p>Pages</p>
								</a>
							</li>							
						</ul>
					</nav>
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
         	</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Add Products</h1>
							</div>
							
						</div>
					</div>					

		<div class="container mt-5">

        <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" required><br>

            <label for="description">Description</label>
            <textarea name="description" required></textarea><br>

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" required><br>

            <label for="cost">Cost</label>
            <input type="number" step="0.01" name="cost" required><br>
            
            <label for="type">Type</label>
            <select name="type" required>
                <option value="Marchents">Marchents</option>
                <option value="Soft Drinks">Soft Drinks</option>
                <option value="Water Bottles">Water Bottles</option>
            </select><br>

            <label for="picture">Picture</label>
            <input type="file" name="picture"><br>

            <button type="submit" class="btn btn-primary d-block mx-auto">Submit</button>
			<?php
    if (isset($successMessage)) {
        echo '<div id="success-message" class="alert alert-success" role="alert">' . $successMessage . '</div>';
    } elseif (isset($errorMessage)) {
        echo '<div id="error-message" class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
    }
    ?>
        </form>
    </div>


    </section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2023 @shohan All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="frontend/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="frontend/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="frontend/js/demo.js"></script>



		<script>
document.getElementById('logout-button').addEventListener('click', function() {
    // Redirect to the logout page
    window.location.href = 'logout.php'; // Change 'logout.php' to the actual path of your logout script
});
function hideMessages() {
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        var errorMessage = document.getElementById('error-message');
        
        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 1000); // 1000 milliseconds = 1 second
}

// Call the hideMessages function when the page loads
document.addEventListener('DOMContentLoaded', hideMessages);




</script>

	</body>
</html>