<?php
// fetch-event.php
session_start();
include('includes/dbconnection.php');

$sql = "SELECT BookingID, Name, EventDate, EventStartingtime, EventEndingtime FROM tblbooking";
$query = $dbh->prepare($sql);
$query->execute();
$bookings = $query->fetchAll(PDO::FETCH_ASSOC);

$events = [];

foreach ($bookings as $booking) {
    // Convert start and end times to 24-hour format
    $startTime = date("H:i", strtotime($booking['EventStartingtime']));
    $endTime = date("H:i", strtotime($booking['EventEndingtime']));

    // Format the start and end datetime in ISO format for FullCalendar
    $events[] = [
        'id' => $booking['BookingID'],
        'title' => $booking['Name'],
        'start' => $booking['EventDate'] . 'T' . $startTime,
        'end' => $booking['EventDate'] . 'T' . $endTime,
        'allDay' => false,
    ];
}

// Output JSON formatted events data
header('Content-Type: application/json');
echo json_encode($events);
exit;
