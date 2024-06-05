<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Car Rental</title>
    <link rel="stylesheet" href="../css/services.css">
</head>
<body>
    <div class="hai">
        <div class="content">
            <h1>Our <span>Services</span></h1>
            <p class="par">Explore the range of services we offer to make your journey unforgettable.</p>
            <div class="services-section">
            <?php
            // Include the database connection script
            require_once 'connection.php';

            // SQL query to fetch services from database
            $sql = "SELECT * FROM services";
            $result = $con->query($sql);

            if ($result) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="service">';
                    echo '<h2>' . $row["service_name"] . '</h2>';
                    echo '<p>' . $row["description"] . '</p>';
                    echo '</div>';
                }
            }
            ?>

            </div>
        </div>
    </div>
</body>
</html>
