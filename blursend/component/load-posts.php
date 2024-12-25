<?php
include 'conn.php'; // Include the database connection

// Get the offset from the URL, defaulting to 0
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 10; // Number of posts to load per request

// Prepare the query to fetch posts
$query = $conn->prepare("SELECT id, sender_name, recipient_name, city, message, created_at 
                         FROM posts 
                         ORDER BY created_at DESC 
                         LIMIT ?, ?");
$query->bind_param('ii', $offset, $limit);
$query->execute();
$result = $query->get_result();

// Fetch and display posts
while ($row = $result->fetch_assoc()) {
    include 'post-card.php'; // Reuse the post-card.php template
}

$query->close();
$conn->close();
?>
