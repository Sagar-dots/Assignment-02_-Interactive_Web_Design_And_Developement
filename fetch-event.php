<?php
// Include your database connection file
require_once 'dbconnection.php';

// Query the database for approved bookings
$sql = "SELECT 
    Name AS 'title'
FROM tblbooking
WHERE Status = 'Approved'";

$result = $conn->query($sql);

$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add only the event name to the events array
        $events[] = [
            'title' => $row['title'] // Only fetch and store the event name
        ];
    }
}

// Return events as JSON
echo json_encode($events);

$conn->close();
?>
