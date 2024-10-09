<?php
// Database connection
$servername = "localhost"; // Change if necessary
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ta_mental_health_consulting"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO user_data (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

// Execute the statement
if ($stmt->execute()) {
    // Redirect or display success message
    header("Location: index.html?success=1");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
