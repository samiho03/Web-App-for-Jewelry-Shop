<?php
$email = $_POST['email'];
$password = $_POST['password'];

// Establish database connection
$con = new mysqli("localhost", "root", "", "jewelry");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM form WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        // Verify the password using password_verify() if the passwords are hashed
        // Replace the following line with appropriate password verification logic
        if ($data['password'] === $password) {
            header("Location: index.php");
        } else {
            echo "<h2> Email or password</h2>";
        }
    } else {
        echo "<h2>password</h2>";
    }
    // Close the database connection
    $con->close();
}
?>