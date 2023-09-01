<header class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(19, 182, 151); z-index: 1000;">
    <a class="navbar-brand" href="http://localhost/water_supply_php_version/index.php">
        <img src="frontend/img/download.jpg" alt="Company Logo" class="navbar-logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if ($userLoggedIn) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/water_supply_php_version/cart.php">
                        <img src="frontend/img/grocery-store.png" alt="Cart"> Cart
                    </a>
                </li>
                <div class="dropdown nav-link p-0 pr-3">
                    <a class="dropdown-toggle d-flex align-items-center text-dark" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="frontend/img/avatar.png" alt="Dashboard" class="mr-1" style="max-height: 40px;">
                        <?php echo $user_name; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h3 mb-0"><strong style="color: #333;"><?php echo $user_name; ?></strong></h4>
                        <div class="mb-3" style="color: #333;"><?php echo $user_email; ?></div>
                        <div class="dropdown-divider"></div>
                        <a href="http://localhost/water_supply_php_version/adminLogin.php" class="dropdown-item" style="color: #333;">
                            <i class="fas fa-user-cog mr-2"></i> Dashboard
                        </a>
                        <a href="#" class="dropdown-item" style="color: #333;">
                            <i class="fas fa-lock mr-2"></i> Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item text-danger" id="logout-button" style="color: #333;">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </div>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/water_supply_php_version/login.php">
                        <img src="frontend/img/avatar.png" alt="Login"> Log In
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/water_supply_php_version/products.php">
                    <img src="frontend/img/product.png" alt="Products"> Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/water_supply_php_version/aboutUs.php">
                    <img src="frontend/img/contact-us.png" alt="About Us"> ABOUT US
                </a>
            </li>
        </ul>
    </div>
</header>