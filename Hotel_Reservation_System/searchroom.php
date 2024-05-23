<?php
require_once "dbconnect.php";

if (isset($_GET['query'])) {
    $searchTerm = $conn->real_escape_string($_GET['query']);
    $output = "";
//<!-----HITIMANA FABRICE 222010357---->
    $queries = [
        'rooms' => "SELECT room_id, room_number, room_type, capacity, price_per_night,description FROM rooms WHERE room_id LIKE '%$searchTerm%'",
    ];

    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        $output .= "<h3>Table of $table:</h3>";

        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<table border='1'>";
                $output .= "<tr><th>room ID</th><th>room_number</th><th>room_type</th><th>capacity</th><th>price_per_night</th><th>description</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    $output .= "<tr>";
                    foreach ($row as $key => $value) {
                        $output .= "<td>$value</td>";
                    }
                    $output .= "</tr>";
                }
                $output .= "</table>";
            } else {
                $output .= "<p>No results found in $table matching the search term: '$searchTerm'</p>";
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
