<?php
require_once "dbconnect.php";

if (isset($_GET['query'])) {
    $searchTerm = $conn->real_escape_string($_GET['query']);
    $output = "";
//<!-----HITIMANA FABRICE 222010357---->
    $queries = [
        'customers' => "SELECT customer_id, names, contact_number,email, nationality FROM customers WHERE customer_id LIKE '%$searchTerm%'",
        ' rooms' => "SELECT room_id, room_number, room_type, capacity, price_per_night, description FROM  rooms WHERE  room_id LIKE '%$searchTerm%'",
        'users' => "SELECT user_id ,username, email, password,user_type FROM users WHERE user_id LIKE '%$searchTerm%'",
        'services' => "SELECT service_id, service_name, description, price, availability FROM services WHERE service_id LIKE '%$searchTerm%'",
        'staff' => "SELECT staff_id,names, position,contact_number, hire_date FROM staff WHERE staff_id LIKE '%$searchTerm%'",
        'reviews' => "SELECT review_id, customer_id, room_id, rating, review_text FROM reviews WHERE review_id LIKE '%$searchTerm%'",
        'payment' => "SELECT payment_id, reservation_id, payment_date, amount, payment_method FROM payment WHERE payment_id LIKE '%$searchTerm%'",
        'reservation' => "SELECT reservation_id, customer_id, room_id, check_in_date,check_out_date FROM reservation WHERE reservation_id LIKE '%$searchTerm%'",
        'amenities' => "SELECT amenity_id, amenity_name, description, category, price FROM amenities WHERE amenity_id LIKE '%$searchTerm%'",
        'profile' => "SELECT profile_id, user_id, full_name, phone, profile_picture_url,social_media_links,website_url FROM profile WHERE profile_id LIKE '%$searchTerm%'",
        'housebooking' => "SELECT housebooking_id,customer_id, check_in_date, check_out_date, total_cost FROM fun_review WHERE housebooking_id LIKE '%$searchTerm%'"
    ];

    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        $output .= "<h3>Table of $table:</h3>";
        
        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $output .= "<li>";
                    foreach ($row as $key => $value) {
                        $output .= "$key: $value, ";
                    }
                    $output .= "</li>";
                }
                $output .= "</ul>";
            } else {
                $output .= "<p>No results found in $table paymenting the search term: '$searchTerm'</p>";
            }
        } else {
            $output .= "<p>Error executing query: " . $conn->error . "</p>";
        }
    }

    echo $output;

    $conn->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>

