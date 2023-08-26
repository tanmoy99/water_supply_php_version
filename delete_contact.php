<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = 'watersupplyphp';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Delete data from the database
    $sql = "DELETE FROM contacts WHERE id = $id";
    if ($conn->query($sql)) {
        // Redirect back to the admin panel
        header("Location: adminLogin.php");
        exit();
    } else {
        echo "Error deleting data: " . $conn->error;
    }
}
?>
