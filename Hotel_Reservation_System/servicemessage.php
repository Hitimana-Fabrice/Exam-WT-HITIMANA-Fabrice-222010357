<?php
session_start();
//<!-----HITIMANA FABRICE 222010357---->
// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_id = $_POST['service_id'];
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
$availability = $_POST['availability'];
    // Prepare and bind the SQL statement
    $sql = "INSERT INTO contacts (service_id, service_name, description, price,availability) VALUES (?, ?, ?, ?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssss", $service_id, $service_name, $description, $price,$availability);

    // Execute the statement
    if ($stmt->execute()) {
        // Success price
        $response = "<p style='color: green;'>Thank you for your response.</p>";
    } else {
        // Error price
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
    <!---NIYONSHUTI Jean Pierre 222003223--->
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
        RUKUNDO
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

    <label for="service_name">service_name:</label><br>
    <input type="service_name" id="service_name" name="service_name" required><br>

    <label for="description">Teledescription:</label><br>
    <input type="tel" id="description" name="description"><br>

    <label for="price">price:</label><br>
    <textarea id="price" name="price" rows="4" required></textarea>

    <input type="submit" value="Send">
</form>

<div id="priceContainer"></div>

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
                // Display the response price inside the priceContainer div
                document.getElementById("priceContainer").innerHTML = xhr.responseText;
            } else {
                // Display an error price if the request was not successful
                document.getElementById("priceContainer").innerHTML = "An error occurred. Please try again later.";
            }
        }
    };
    xhr.send(formData); // Send the form data
});
</script>
