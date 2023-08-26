<?php

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = 'watersupplyphp';

$conn = new mysqli($host, $username, $password, $database);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productsData = [
    // Marchents
    ["Unilever Pureit Classic Water Purifier 23L", 5000, "Water Purifier 23L", "frontend/img/pure_it.png", "Marchents"],
    ["Water Dispenser", 3000, "25L Bottle Water Dispenser", "frontend/img/water_dispensar.png", "Marchents"],
    ["Recyclable Paper Cup", 50, "100 pcs", "frontend/img/paper_cup.png", "Marchents"],
    ["Black Mug", 550, "1 pcs", "frontend/img/black_mug.png", "Marchents"],
    ["One time Coffee Cup", 100, "12 pcs", "frontend/img/paper_coffee_cup.png", "Marchents"],
    ["Metal Water Bottle", 800, "1L Metal body thermoflask bottle", "frontend/img/metal_bottle.png", "Marchents"],
    
    // Soft Drinks
    ["7up 1 Ltr Bottle", 100, "Single", "frontend/img/7up.png", "Soft Drinks"],
    ["7up can 125 ml", 60, "Single", "frontend/img/7up_can.png", "Soft Drinks"],
    ["Coca-Cola 1.25L", 110, "Single", "frontend/img/coke_1L.png", "Soft Drinks"],
    ["Mountain Dew", 550, "Case Of 6 Bottles", "frontend/img/dew_1L.png", "Soft Drinks"],
    ["Fanta 1L", 90, "Single", "frontend/img/fanta_1L.png", "Soft Drinks"],
    ["Sprite 1L", 90, "Single", "frontend/img/sprite.png", "Soft Drinks"],
    
    // Water Bottles
    ["10 Liter Water Bottle", 80, "10 Ltr.", "frontend/img/20 litter.jpg", "Water Bottles"],
    ["30 Liter Water Can", 90, "30 Ltr", "frontend/img/30 litter.jpg", "Water Bottles"],
    ["40 Liter Water Can", 110, "40 Ltr", "frontend/img/40 litter.jpg", "Water Bottles"],
    ["1 Liter Water Bottles", 225, "Case Of 9 Bottles", "frontend/img/1litter.jpg", "Water Bottles"],
    ["2 Liter Water Bottles", 240, "Case Of 6 Bottles", "frontend/img/2ltr.jpg", "Water Bottles"],
    ["500 ML Water Bottles", 480, "Case Of 24 Bottles", "frontend/img/500-ml-.jpg", "Water Bottles"],
];

// Insert data into products table
foreach ($productsData as $product) {
    $productName = $product[0];
    $price = $product[1];
    $description = $product[2];
    $imageURL = $product[3];
    $productType = $product[4];

    $sql = "INSERT INTO products (product_name, price, description, image_url, product_type)
            VALUES ('$productName', $price, '$description', '$imageURL', '$productType')";

    if ($conn->query($sql) === TRUE) {
        echo "Product inserted successfully: $productName<br>";
    } else {
        echo "Error inserting product: " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
?>
