<?php
session_start();
//<!-----HITIMANA FABRICE 222010357---->
// Connect to database (replace dbname, username, password with actual credentials)
require_once "dbconnect.php";
//niyonshuti jean pierre 2222003223 on 18th april 2024
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Prepare and bind the SQL statement
    $sql = "INSERT INTO message (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Success message
        $response = "<p style='color: green;'>Thank you for your response.</p>";
    } else {
        // Error message
        $response = "<p style='color: red;'>Error adding record: " . $stmt->error . "</p>";
    }

    // Output the response
    echo $response;
    exit; // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up of coacher</title>
    <!----Add your CSS styles here --->
      <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<header style="font: Arial Rounded  MT Bold; font-size: 20;">
    <div style="display: flex; align-items: center;">
    <div>  <img src="./image/p.png" width="100" height="80" alt="Logo">
        Jean Pierre NIYONSHUTI
        <button class="back-button" onclick="window.location.href='Dashboard.html'">Back</button>
    </div></div>
    <hr>
<main style="color:grey;">
    <center>
 <section">
    <form id="contactForm" method="post" action="contactusmessege.php">
         <h1>SEND FORM</h1>
<body>

    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="phone">Telephone:</label><br>
    <input type="tel" id="phone" name="phone"><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" required></textarea>

    <input type="submit" value="Send">
</form>

<div id="messageContainer"></div>

<script></section></center></main></hr>
</body></html>
document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent the default form submission

    var formData = new FormData(this); // Create a FormData object to send form data

    // Send form data to the PHP script using AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "contactusmessege.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Request is complete
            if (xhr.status === 200) { // Request was successful
                // Display the response message inside the messageContainer div
                document.getElementById("messageContainer").innerHTML = xhr.responseText;
            } else {
                // Display an error message if the request was not successful
                document.getElementById("messageContainer").innerHTML = "An error occurred. Please try again later.";
            }
        }
    };
    xhr.send(formData); // Send the form data
});
</script>
