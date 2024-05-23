<?php
session_start();

// Include database connection file
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate form data (you may add more validation as needed)
    if (empty($username) || empty($password)) {
        // Handle validation errors
        echo "Username and password are required.";
    } else {
        // Prepare SQL statement to fetch user from the database
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters to the statement
            $stmt->bind_param("ss", $username, $password);

            // Execute the statement
            $stmt->execute();

            // Get result set
            $result = $stmt->get_result();

            // Check if user exists
            if ($result->num_rows == 1) {
                // User found, set session variables
                $_SESSION["username"] = $username;

                // Redirect to dashboard or home page
                header("Location: Dashboard.html");
                exit();
            } else {
                // User not found
                echo "Invalid username or password.";
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
