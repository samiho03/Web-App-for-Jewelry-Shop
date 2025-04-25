<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "jewelry";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Insert data into database
$sql = "INSERT INTO contact_form (name, email, phone, subject, message) 
        VALUES ('$name', '$email', '$phone', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Form data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

