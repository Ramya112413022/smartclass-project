<?php

// Database connection
$conn = new mysqli("localhost", "root", "", "smart_class");

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


// Get data sent from home.html
$student = $_POST['student'] ?? '';
$className = $_POST['className'] ?? '';
$staff = $_POST['staff'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';


// Insert data into database
$sql = "INSERT INTO reminders
        (student, class_name, staff, subject, message)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssss",
    $student,
    $className,
    $staff,
    $subject,
    $message
);


// Check whether insert worked
if ($stmt->execute()) {

    echo "success";

} else {

    echo "ERROR: " . $stmt->error;

}


$stmt->close();
$conn->close();

?>
