<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $city = $_POST['city'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO posts (sender_name, recipient_name, city, message ) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $from, $to, $city, $message);

    if ($stmt->execute()) {
        header("Location: index.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
