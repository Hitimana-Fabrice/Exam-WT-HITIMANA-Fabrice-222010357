<!DOCTYPE html>
<html lang="en">
<head>
    <!-----HITIMANA FABRICE 222010357---->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel reservation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <link rel="stylesheet" href="css/style5.css">
</head>
<body>    <header> 
        <h1><img src="image/icon.jpg" alt="icon"> Hotel reservation</h1>
                        <div class="col-3 offset">
    <form class="d-flex" action="searchcustomer.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</header>
<header>
      <nav>
        <ul>
            <li><a href="home.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="rooms.html">rooms</a></li>
            <li><a href="reservation.html">Reservation</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="amenities.html">Amenities</a></li>
            <li><a href="staff.html">Staff</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="customer.html">Customer</a></li>

        </ul>
    </nav>
      
    <div class="signout">
        <a href="loginout.php">Sign Out</a>
    </div>
    <div>
            <button type="button" onclick="window.location.href='reservation.html'">Back</button>
    </div> 
</header>

<?php
require_once "dbconnect.php";

// Display any alert messages
if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation Management</title>
    <!-- Include any necessary CSS files -->
</head>
<body>
    <!-- Display the table -->
    <br><br><br>
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>ID</th>
            <th>customer_id  </th>
            <th>room_id</th>
            <th>check_in_date</th>
            <th>check_out_date</th>
            <th>Actions</th>
        </tr>
        <?php
        // Fetch data from the customers table
        $sql = "SELECT * FROM reservation";
        $result = $conn->query($sql);

        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["reservation_id"] . "</td>"; // reservation_id
                echo "<td>" . $row["customer_id"] . "</td>"; // customer_id 
                echo "<td>" . $row["room_id"] . "</td>"; // room_id
                echo "<td>" . $row["check_in_date"] . "</td>"; // check_in_date
                echo "<td>" . $row["check_out_date"] . "</td>"; // check_out_date
                echo "<td>";
                // Edit and delete actions
                echo "<a href='updatereservation.html?id=" . $row["reservation_id"] . "'><i class='fas fa-edit'></i></a>";
                echo "<a href='deletereservation.html?id=" . $row["reservation_id"] . "'><i class='fas fa-trash'></i></a>";
            
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <!-- Include any necessary JavaScript files -->
</body>
</html>
