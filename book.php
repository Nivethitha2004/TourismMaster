<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['tour_id'])) {
    $tour_id = $_GET['tour_id'];
    $user_id = $_SESSION['user_id'];
    
    $sql = "INSERT INTO bookings (user_id, tour_id, booking_date, status) VALUES ('$user_id', '$tour_id', NOW(), 'booked')";
    if ($conn->query($sql) === TRUE) {
        echo "Booking successful";
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
