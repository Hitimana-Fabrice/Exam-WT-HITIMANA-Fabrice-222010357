<?php
session_start();
//<!-----HITIMANA FABRICE 222010357---->
// Include database connection file
require_once "dbconnect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"]; // Note: You should hash passwords for security
    $user_type = $_POST["user_type"];
    $email = $_POST["email"];

    // Validate form data (you may add more validation as needed)
    if (empty($username) || empty($password) || empty($user_type) || empty($email)) {
        // Handle validation errors
        echo "All fields are required.";
    } else {
        // Prepare SQL statement to insert data into the user table
        $sql = "INSERT INTO users (username, password, user_type, email) VALUES (?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ssss", $username, $password, $user_type, $email);

            // Execute the statement
            if ($stmt->execute()) {
                // Data inserted successfully
                echo "User registered successfully.";
                header("Location: login.html");
                exit();
            } else {
                // Handle execution error
                echo "Error: " . $conn->error;
            }

            // Close statement
            $stmt->close();
        } else {
            // Handle statement preparation error
            echo "Error preparing statement: " . $conn->error;
        }
    }
}

// Close database connection
$conn->close();
?>
