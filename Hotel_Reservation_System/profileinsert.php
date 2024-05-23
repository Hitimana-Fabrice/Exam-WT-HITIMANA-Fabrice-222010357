<?php
// Check if form is submitted

                // Insert image details into database
                require_once "dbconnect.php"; // Include database connection file

                // Retrieve form data
<!-----HITIMANA FABRICE 222010357---->
if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_id = $_POST['user_id'];
                $full_name = $_POST['full_name'];
                $phone = $_POST['phone'];
                $profile_picture_url = $_POST['profile_picture_url'];
                $social_media_links = $_POST['social_media_links'];
                $website_url = $_POST['website_url'];

                // Prepare SQL statement to insert into profile table
                $sql = "INSERT INTO profile (user_id, full_name, phone, profile_picture_url, social_media_links, website_url) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isssss", $user_id, $full_name, $phone,$profile_picture_url, $social_media_links, $website_url);

        // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
