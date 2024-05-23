<?php
require_once "dbconnect.php";
//<!-----HITIMANA FABRICE 222010357---->
if (isset($_GET['query'])) {
    $searchTerm = $conn->real_escape_string($_GET['query']);
    $output = "";

    $queries = [
        'customers' => "SELECT customer_id, names, contact_number, email, nationality FROM customers WHERE customer_id LIKE '%$searchTerm%'",
    ];

    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $conn->query($sql);
        $output .= "<h3>Table of $table:</h3>";

        if ($result) {
            if ($result->num_rows > 0) {
                $output .= "<table border='1'>";
                $output .= "<tr><th>Customer ID</th><th>Names</th><th>Contact Number</th><th>Email</th><th>Nationality</th></tr>";
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
