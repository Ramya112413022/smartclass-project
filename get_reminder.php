<?php

$conn = new mysqli("localhost", "root", "", "smart_class");

if ($conn->connect_error) {
    die("Database connection failed");
}

$sql = "SELECT
            id,
            student,
            class_name,
            staff,
            subject,
            message,
            reminder_time,
            status
        FROM reminders
        ORDER BY id DESC";

$result = $conn->query($sql);

$reminders = [];

while ($row = $result->fetch_assoc()) {
    $reminders[] = $row;
}

header("Content-Type: application/json");

echo json_encode($reminders);

$conn->close();

?>
