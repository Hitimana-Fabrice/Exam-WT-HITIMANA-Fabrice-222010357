<?php
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs (you can add more validation if needed)
    $profile_id = $_POST['profile_id'];
   $user_id = $_POST['user_id'];
                $full_name = $_POST['full_name'];
                $phone = $_POST['phone'];
                $profile_picture_url = $_POST['profile_picture_url'];
                $social_media_links = $_POST['social_media_links'];
                $website_url = $_POST['website_url'];

    // Update query
    $sql = "UPDATE profile SET  user_id='$user_id',full_name='$full_name', phone='$phone', profile_picture_url='$profile_picture_url', social_media_links='$social_media_links',website_url='$website_url' WHERE profile_id='$profile_id'";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect or show an error message
    echo "Form submission method not allowed.";
}
?>
